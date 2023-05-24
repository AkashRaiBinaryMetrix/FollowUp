<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class SignUp extends Controller
{
    public function register()
    {
        return view('myuser.signup.register');
    }

    public function signIn(Request $request)
    {
        $post = $request->input();
        $fullName = !empty($post['fullName']) ? $post['fullName'] : '';
        $email = !empty($post['email']) ? $post['email'] : '';
        $password = !empty($post['password']) ? $post['password'] : '';
        $phone = !empty($post['phone']) ? $post['phone'] : '';

        $sEncPwd = !empty($password) ? Crypt::encryptString($password) : '';

        /*--------------------- check user already exists ---------------------*/
        $isExists = DB::table('users')->where([['email', $email], ['is_deleted', N]])->first();

        if (!empty($isExists)) {
            echo json_encode(['status' => 'failure', 'msg' => 'Email is already exists']);
            exit();
        }
        
        $sCurrentDateTime = getCurrentLocalDateTime();

        /*------------------- get current date time -------------------*/
        $aData = [
            'name' => $fullName,
            'email' => $email,
            'password' => $sEncPwd,
            'mobile' => $phone,
            'created_at' => $sCurrentDateTime,
        ];

        $iId = DB::table('users')->insertGetId($aData);

        if ($iId) {
            Mail::send('myuser.mail_template.signup_mail', ['sFullName' => $fullName], function ($message) use ($email) {
                $message->to($email)
                    ->subject('Lineon Group | Sign Up')
                    ->from(MAIL_FROM_ADDRESS);
            });
            echo json_encode(['status' => 'success', 'msg' => 'You have registered successfully']);
            exit();
        } else {
            echo json_encode(['status' => 'failure', 'msg' => 'You have not registered. Please try again']);
            exit();
        }
    }


    public function login(Request $request)
    {
        /*--------------- if user already logged in then redirect to home page -------------*/
        $isUserLoggedIn = Session('isUserLoggedIn');
        if (!empty($isUserLoggedIn)) {
            return redirect('/');
        }
        $userCookieDtl = Cookie::get('userGlowDtl');
        $userGlowDtl = !empty($userCookieDtl) ? explode('__*__', $userCookieDtl) : '';
        /*--------------- if user already logged in then redirect to home page -------------*/
        $post = $request->input();
        if (!empty($post)) {
            $request->validate([
                'email' => 'required',
                'password' => 'required',
            ],
                [
                    'email.required' => 'Email is required',
                    'password.required' => 'Password is required',
                ]
            );

            $email = !empty($post['email']) ? $post['email'] : '';
            $password = !empty($post['password']) ? $post['password'] : '';
            $isRememberMe = !empty($post['isRememberMe']) ? $post['isRememberMe'] : '';
            $aDetail = DB::table('users')
                          ->where([['email', $email], ['is_deleted', N]])
                          ->orWhere([['is_deleted', N]])
                          ->where([['username', $email]])
                          ->first();
            if (!empty($aDetail)) {
                $status = !empty($aDetail->status) ? $aDetail->status : '';
                if ($status && $status == ACTIVE) {
                    $sDecPassword = !empty($aDetail->password) ? Crypt::decryptString($aDetail->password) : '';
                    if (!empty($sDecPassword) && !empty($password) && $password == $sDecPassword) {
                        /*------------------ set session --------------*/
                        $request->session()->put('isUserLoggedIn', $aDetail);
                        /*------------------ set session --------------*/

                        /*------------------ set cookie --------------*/
                        $isCookieSet = Cookie::get('userGlowDtl');
                        if (!empty($isRememberMe) && $isRememberMe == Y) {

                            if (empty($isCookieSet)) {

                                $sEmailIdPassword = $email . '__*__' . $password;
                                $sEncEmailIdPassword = $sEmailIdPassword;
                                $expire = 30 * 24 * 3600;
                                Cookie::queue('userGlowDtl', $sEncEmailIdPassword, $expire);
                            }

                        } else {
                            Cookie::queue(Cookie::forget('userGlowDtl'));
                        }
                        /*------------------ set cookie --------------*/

                        $request->session()->flash('successMsg', 'You have logged in successfully');
                        return redirect('/');
                    } else {
                        return redirect()->back()->withInput($request->all())->with('failureMsg', 'Invalid credentials');
                    }
                } else {
                    return redirect()->back()->withInput($request->all())->with('failureMsg', 'Your account has inactivated');
                }
            } else {
                return redirect()->back()->withInput($request->all())->with('failureMsg', 'Invalid credentials');
            }
        }
        
        return view('myuser.signup.login', ['userGlowDtl' => $userGlowDtl]);
    }

    public function forgotPassword(Request $request)
    {
        $post = $request->input();
        if (!empty($post)) {
            $request->validate([
                'email' => 'required|email',
            ],
                [
                    'email.required' => 'Email is required',
                    'email.email' => 'Please enter valid email id',
                ]
            );

            $email = !empty($post['email']) ? $post['email'] : '';
            $aDetail = DB::table('users')->where([['email', $email], ['is_deleted', N]])->get();

            if (!empty($aDetail)) {
                $status = !empty($aDetail[0]->status) ? $aDetail[0]->status : '';
                if ($status && $status == ACTIVE) {
                    $sDecPassword = !empty($aDetail[0]->password) ? Crypt::decryptString($aDetail[0]->password) : '';

                    $sName = $aDetail[0]->name;
                    $sFullName = $sName;
                    Mail::send('myuser.mail_template.forgot_mail', ['sFullName' => $sFullName, 'password' => $sDecPassword], function ($message) use ($email) {
                        $message->to($email)
                            ->subject('Lineon Group | Forgot Password')
                            ->from(MAIL_FROM_ADDRESS);
                    });

                    $request->session()->flash('status', 'success');
                    $request->session()->flash('successMsg', 'Your password has been sent to your registered mail id');
                    return redirect('/login');
                } else {
                    return redirect()->back()->withInput($request->all())->with('failureMsg', 'Your account has inactivated');
                }
            } else {
                return redirect()->back()->withInput($request->all())->with('failureMsg', 'Invalid credentials');
            }
        }
        return view('myuser.signup.forgot_password');
    }
    public function userLogout(Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }

    public function searchQuery(Request $request){
        $post = $request->input();
        $search_query = $post["search_query"];
        $optradio = $post["optradio"];

        $result = DB::table('property_list')
                           ->orWhere('property_list.ameni', 'LIKE', "%".$search_query."%")
                           ->orWhere('property_list.property_title', 'LIKE', "%".$search_query."%")
                           ->orWhere('property_list.address', 'LIKE', "%".$search_query."%")
                           ->orWhere('property_list.city', 'LIKE', "%".$search_query."%")
                           ->orWhere('property_list.state', 'LIKE', "%".$search_query."%")
                           ->orWhere('property_list.zipcode', 'LIKE', "%".$search_query."%")
                           ->orWhere('property_list.description', 'LIKE', "%".$search_query."%")
                           ->orWhere('property_list.buildage', 'LIKE', "%".$search_query."%")
                           ->orWhere('property_list.rooms', 'LIKE', "%".$search_query."%")
                           ->orWhere('property_list.bath', 'LIKE', "%".$search_query."%")
                           ->where('property_list.property_for', 'LIKE', "%".$optradio."%")
                           ->get();

        return view('myuser.signup.searchresult', [ 'result' => $result,
                                                    'find_location' => "",
                                                    'minmaxprice'   => "",
                                                    'beds'          => "",
                                                    'baths'         => "",
                                                    'frentsale'     => ""
            ]);
    }

    function searchCityProperty(Request $request,$id){
        if($id == 2){
            //Dominican republic
            $result = DB::table('property_list')
                           ->where('property_list.country', '=','2')
                           ->get();

        return view('myuser.signup.searchresultCountyCity', [ 'result' => $result,
            ]);
        }else{
            //Other
            $result = DB::table('property_list')
                           ->where('property_list.city', '=',$id)
                           ->get();

            return view('myuser.signup.searchresultCountyCity', [ 'result' => $result,
            ]);
        }
    }

    function searchQueryFilters(Request $request){

        $frentsale      = "";

        $post           = $request->input();
        $find_location  = $post["find-location"];
        $frentsale      = $post["frentsale"];
        $minmaxprice    = $post["minmax-price"];
        $beds           = $post["beds"];
        $baths          = $post["baths"];

        $query = DB::table('property_list')->select('*');

        if(!empty($find_location)){
            $query->orWhere('property_list.address', 'LIKE', "%".$find_location."%")
                           ->orWhere('property_list.city', 'LIKE', "%".$find_location."%")
                           ->orWhere('property_list.state', 'LIKE', "%".$find_location."%")
                           ->orWhere('property_list.zipcode', 'LIKE', "%".$find_location."%");
                          
        }else{
            $find_location = "";
        }

        if(!empty($minmaxprice)){
            $price = explode('-', $minmaxprice);
            $minimum_price = str_replace("$","",$price[0]);
            $maximum_price = str_replace("$","",$price[1]);
            $query->whereBetween('price', [$minimum_price, $maximum_price]);                          
        }else{
            $minmaxprice = "";
        }

        if(!empty($beds)){
            $query->orWhere('rooms', '=' , $beds);                          
        }else{
            $beds = "";
        }

        if(!empty($baths)){
            $query->orWhere('bath', '=' , $baths);                          
        }else{
            $baths = "";
        }

        if($frentsale == "rent"){
            $query->where('property_for', '=' , $frentsale);    
        }else{
            $query->where('property_for', '=' , 'sell');
        }
        
        $result = $query->get();

        return view('myuser.signup.searchresult', [
            'result'        => $result,
            'find_location' => empty($find_location) ? "" : $find_location,
            'minmaxprice'   => $minmaxprice,
            'beds'          => $beds,
            'baths'         => $baths,
            'frentsale'     => isset($frentsale) ? $frentsale : ""
        ]);
    }

    function agentsLists(Request $request){
        $result = DB::table('agent_profile')->get();
        return view('myuser.signup.agentsLists', ['result' => $result]);    
    }

    function viewAgentDetail(Request $request, $id){
        $id = $id;

        //get agent review details
        $getAgentReviews = DB::table('agent_reviews')->select('*')->where('agent_id', '=' , $id)->get();

        //get follow-unfollow details
        $getFollowUnfollowDetails = DB::table('agent_follow_unfollow')->select('*')->where('agent_id', '=' , $id)->get();

        return view('myuser.signup.agentsListsDetail', ['id' => $id, 'getAgentReviews' => $getAgentReviews, 
            'getFollowUnfollowDetails' => $getFollowUnfollowDetails]);
    }

    function viewGeneralUserDetail(Request $request, $id){
        $id = $id;

        $getDetails = DB::table('users')->select('*')->where('id', '=' , $id)->get();

        return view('myuser.signup.generalUserListsDetail', ['getDetails' => $getDetails]);
    }
    /////////////////////

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();
            $aDetail = DB::table('users')->where('google_unique_id', $user->id)->first();
            if ($aDetail) {
                /*------------------ set session --------------*/
                session(['isUserLoggedIn' => $aDetail]);
                /*------------------ set session --------------*/
                return redirect('/');

            } else {
                $iId = DB::table('users')->insertGetId([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_unique_id' => $user->id,
                ]);
                $aDetail = DB::table('users')->where('id', $iId)->first();
                /*------------------ set session --------------*/
                session(['isUserLoggedIn' => $aDetail]);
                /*------------------ set session --------------*/
                return redirect('/');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToFB()
    {
        return Socialite::driver('facebook')->redirect();
    }
       
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleFacebookCallback()
    {
        try {
     
            $user = Socialite::driver('facebook')->user();
            $aDetail = DB::table('users')->where('facebook_unique_id', $user->id)->first();
            if($aDetail){
      
                /*------------------ set session --------------*/
                session(['isUserLoggedIn' => $aDetail]);
                /*------------------ set session --------------*/
                return redirect('/');
      
            }else{
                $iId = DB::table('users')->insertGetId([
                    'name' => $user->name,
                    'email' => $user->email,
                    'facebook_unique_id' => $user->id,
                ]);
                $aDetail = DB::table('users')->where('id', $iId)->first();
                /*------------------ set session --------------*/
                session(['isUserLoggedIn' => $aDetail]);
                /*------------------ set session --------------*/
                return redirect('/'); 
            }
     
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    public function redirectToInsta()
    {
        $appId = config('services.instagram.client_id');
        $redirectUri = urlencode(config('services.instagram.redirect'));
        return redirect()->to("https://api.instagram.com/oauth/authorize?app_id={$appId}&redirect_uri={$redirectUri}&scope=user_profile,user_media&response_type=code");
    }
    public function handleInstagramCallback(Request $request)
    {
                $code = $request->code;
                if (empty($code)) return redirect('/')->with('error', 'Failed to login with Instagram.');

                $appId = config('services.instagram.client_id');
                $secret = config('services.instagram.client_secret');
                $redirectUri = config('services.instagram.redirect');

                $client = new Client();

                // Get access token
                $response = $client->request('POST', 'https://api.instagram.com/oauth/access_token', [
                    'form_params' => [
                        'app_id' => $appId,
                        'app_secret' => $secret,
                        'grant_type' => 'authorization_code',
                        'redirect_uri' => $redirectUri,
                        'code' => $code,
                    ]
                ]);

                if ($response->getStatusCode() != 200) {
                    return redirect('/')->with('error', 'Unauthorized login to Instagram.');
                }

                $content = $response->getBody()->getContents();
                $content = json_decode($content);

                $accessToken = $content->access_token;
                $userId = $content->user_id;
                
                // Get user info
                $response = $client->request('GET', "https://graph.instagram.com/me?fields=id,username,account_type&access_token={$accessToken}");

                $content = $response->getBody()->getContents();
                $oAuth = json_decode($content);

                // Get instagram user name 
                  $username = $oAuth->username;
                // do your code here
                $aDetail = DB::table('users')->where('instagram_unique_id', $userId)->first();
                if($aDetail) {
        
                    /*------------------ set session --------------*/
                    session(['isUserLoggedIn' => $aDetail]);
                    /*------------------ set session --------------*/
                    return redirect('/');
        
                } else {
                        $iId = DB::table('users')->insertGetId([
                            'username' => $username,
                            'instagram_unique_id' => $userId,
                        ]);
                        $aDetail = DB::table('users')->where('id', $iId)->first();
                        /*------------------ set session --------------*/
                        session(['isUserLoggedIn' => $aDetail]);
                        /*------------------ set session --------------*/
                        return redirect('/');
                }
          }

    public function propertiesManagement()
    {
        $aDetail = DB::table('country_master')->get();
        return view('myuser.properties.property-management',['country_data'=>$aDetail]);
    }

    public function aboutUs(){
        return view('myuser.properties.about-us');
    }

    public function termsandconditions(){
        return view('myuser.properties.terms-and-conditions');
    }

    public function HouseinDominicanRepublic(){

        //get user agent details
        $profileDetails1 = DB::table('users')
                            ->first();
         
        $propertyDetails = DB::table('property_list')
                            ->where('country',1)
                            ->get();
        
        return view('myuser.properties.House-in-Dominican-Republic',['profileDetails1'=>$profileDetails1,'propertyDetails'=>$propertyDetails]);
    }


    public function salePropertyList(){
        $iUserId = getLoggedInUserId();

        //get user agent details
        $profileDetails1 = DB::table('users')
                            ->where('id',$iUserId)
                            ->first();
         
        $propertyDetails = DB::table('property_list')
                            ->where('property_for',"sell")
                            //->where('user_id',$iUserId)
                            ->get();
        
        return view('myuser.properties.propertyForSale',['profileDetails1'=>$profileDetails1,'propertyDetails'=>$propertyDetails]);
    }

     public function buyRentPropertyList(){
        $iUserId = getLoggedInUserId();

        //get user agent details
        $profileDetails1 = DB::table('users')
                            ->where('id',$iUserId)
                            ->first();
         
        $propertyDetails = DB::table('property_list')
                            ->where('property_for',"rent")
                            //->where('user_id',$iUserId)
                            ->get();
        
        return view('myuser.properties.buyRentPropertyList',['profileDetails1'=>$profileDetails1,'propertyDetails'=>$propertyDetails]);
    }

    public function getstatemaster(Request $request){
        $name = $request->name;
        $aDetail = DB::table('state_master')->where('country_id', $name)->get();
        $html = "";
        $html .="<option value='' id='State'>Select State</option>";
        foreach($aDetail as $value){
            $html .="<option value='".$value->id."'>".$value->state_name."</option>";            
        }
        echo $html;
    }

    public function getcitymaster(Request $request){
        $name = $request->name;
        $aDetail = DB::table('city_master')->where('state_id', $name)->get();
        $city = "";
        $city .="<option value='' id='city'>Select City</option>";
        
        foreach($aDetail as $value){
            $city .="<option value='".$value->id."'>".$value->city_name."</option>";            
        }

        echo $city;
    }

    public function privacyPolicy(){
        return view('myuser.properties.privacy-policy');
    }

    public function contactUs(){
        return view('myuser.properties.contact-us');
    }

    public function contactProcess(Request $request){
         $post = $request->input();
         $firstname = !empty($post['first_name']) ? $post['first_name'] : '';
         $lastname = !empty($post['last_name']) ? $post['last_name'] : '';
         $email = !empty($post['email']) ? $post['email'] : '';
         $phone_no = !empty($post['phone_no']) ? $post['phone_no'] : '';
         $message = !empty($post['message']) ? $post['message'] : '';
        
         //insert data
         $id = DB::table('contact_us')->insertGetId([
                        'first_name'       => $firstname,
                        'last_name'        => $lastname,
                        'email'            => $email,
                        'phone_no'         => $phone_no,
                        'message'          => $message,
                    ]);

        return view('myuser.properties.contact-us',['message'=>"Enquiry created successfully"]);
    }

    public function signupProcess(Request $request){
         $post = $request->input();
         $firstname = !empty($post['firstname']) ? $post['firstname'] : '';
         $lastname = !empty($post['lastname']) ? $post['lastname'] : '';
         $address = !empty($post['address']) ? $post['address'] : '';
         $city = !empty($post['city']) ? $post['city'] : '';
         $state = !empty($post['state']) ? $post['state'] : '';
         $zipcode = !empty($post['zipcode']) ? $post['zipcode'] : '';
         $state = !empty($post['state']) ? $post['state'] : '';
         $typepro = $post['typepro'];
         $example = !empty($post['example']) ? $post['example'] : '';
         $phone = !empty($post['phone']) ? $post['phone'] : '';
         $email = !empty($post['email']) ? $post['email'] : '';
         $country = !empty($post['country']) ? $post['country'] : '';

         //insert data
         $id = DB::table('property_enquiry')->insertGetId([
                        'first_name'       => $firstname,
                        'last_name'        => $lastname,
                        'address'          => $address,
                        'city'             => $city,
                        'state'            => $state,
                        'zipcode'          => $zipcode,
                        'type_of_property' => $typepro,
                        'ameni'            => implode(",",$example),
                        'phone'            => $phone,
                        'email'            => $email,
                        'country'          => $country
                    ]);

        $this->validate($request, [
                'filenames' => 'required',
                'photo' => 'mimes:jpg,jpeg,png',
        ]);

        if($request->hasfile('filenames'))
         {
            foreach($request->file('filenames') as $file)
            {
                $name = time().'.'.$file->extension();
                $file->move(public_path().'/enquiryfiles/', $name);  
                
                //insert data
                DB::table('property_enquiry_images')->insertGetId([
                        'inquiry_id'       => $id,
                        'url'        => $name,
                    ]);
            }
         }

        $aDetail = DB::table('country_master')->get();
        return view('myuser.properties.property-management',['message'=>"Enquiry created successfully", 'country_data'=>$aDetail]);
    }

    public function blog(Request $request){

        $aDetail = DB::table('blog')->where('status', '1')->get();

        return view('myuser.properties.blog_listing',['blogResult' => $aDetail]);
    }

    public function blogDetail(Request $request, $iBlogId) {
        $aDetail = DB::table('blog')->where('id', $iBlogId)->get();

        return view('myuser.properties.blog_details',['blogResult' => $aDetail]);
    }


}