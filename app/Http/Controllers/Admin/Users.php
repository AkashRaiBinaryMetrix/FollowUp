<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class Users extends Controller
{
     public function index() {
        /*---------------------- get per page paging record show ------------------------------*/
           $iPerPagePagination  = perPagePaging();
        /*---------------------- get per page paging record show ------------------------------*/

         /*-------------- count data------------------*/
           $aListCount = DB::table('users')
                            ->where('is_deleted',N)
                            ->orderBy('id','desc')
                            ->count();
         /*-------------- count data------------------*/

         /*-------------- get data------------------*/
           $aListData = DB::table('users')
                        ->where('is_deleted',N)
                        ->orderBy('id','desc')
                        ->paginate($iPerPagePagination);
         /*-------------- get data------------------*/
         return view('admin.users.index',['aTotalData'=>$aListCount,'aLists'=>$aListData]);
     }


      public function saveUsersList(Request $request){
         $post = $request->input();
         $assoc_name = $post['assoc_name'];
         $email = $post['email'];
         $mobile = $post['mobile'];
        
         //insert data
         $id = DB::table('users')->insertGetId([
                        'name'      => $assoc_name,
                        'email'     => $email,
                        'mobile'    => $mobile,
                        'password'  => Crypt::encryptString($mobile),
                    ]);

         /*---------------------- get per page paging record show ------------------------------*/
         $iPerPagePagination  = perPagePaging();
         /*---------------------- get per page paging record show ------------------------------*/

         /*-------------- count data------------------*/
         $aListCount = DB::table('users')
                            ->where('is_deleted',N)
                            ->orderBy('id','desc')
                            ->count();
         /*-------------- count data------------------*/

         /*-------------- get data------------------*/
         $aListData = DB::table('users')
                        ->where('is_deleted',N)
                        ->orderBy('id','desc')
                        ->paginate($iPerPagePagination);
         /*-------------- get data------------------*/
         return view('admin.users.index',['aTotalData'=>$aListCount,'aLists'=>$aListData]);
     }




     public function fetchUserData(Request $request) 
     {
           if($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $search = $request->get('search');
            $filterStatus = $request->get('filterStatus');
            

             /*------------------- filter ----------------------*/
              if($filterStatus == ACTIVE) {
                 $filterStatusType  = [ACTIVE];
              } else if($filterStatus == INACTIVE) {
                 $filterStatusType  = [INACTIVE];
              } else {
                 $filterStatusType  = [ACTIVE,INACTIVE];
              }
              

             /*------------------- filter ----------------------*/
             /*---------------------- get per page paging record show ------------------------------*/
               $iPerPagePagination  = perPagePaging();
           /*---------------------- get per page paging record show ------------------------------*/

            /*------------ get paginate data ------------------*/
           
            $sListQuery = DB::table('users')
                ->select('users.*')
                ->where('users.is_deleted', N)
                ->whereIn('users.status',$filterStatusType)
                ->where(function ($query) use ($search) {
                    $query->where('users.name', 'LIKE', '%' . $search . '%')
                        ->orWhere('users.email', 'LIKE', '%' . $search . '%');
                        

                })
                ->orderBy('users.'.$sort_by, $sort_type);
                
                $aLists  = $sListQuery->paginate($iPerPagePagination);
            /*------------ get paginate data ------------------*/

            /*------------ get total data ------------------*/

            $sTotalDataQuery = DB::table('users')
                ->select('users.*')
                ->where('users.is_deleted', N)
                ->whereIn('users.status',$filterStatusType)
                ->where(function ($query) use ($search) {
                     $query->where('users.name', 'LIKE', '%' . $search . '%')
                         ->orWhere('users.email', 'LIKE', '%' . $search . '%');
                         
                })
                ->orderBy('users.'.$sort_by, $sort_type);
               
                $aTotalData = $sTotalDataQuery->count();

            /*------------ get total data ------------------*/
            return view('admin.users.list', ['aLists' => $aLists, 'aTotalData' => $aTotalData])->render();
           }
     }

     public function propertyEnquiry() {
        /*---------------------- get per page paging record show ------------------------------*/
           $iPerPagePagination  = perPagePaging();
        /*---------------------- get per page paging record show ------------------------------*/

         /*-------------- count data------------------*/
           $aListCount = DB::table('property_enquiry')
                            //->where('is_deleted',N)
                            ->orderBy('id','desc')
                            ->count();
         /*-------------- count data------------------*/

         /*-------------- get data------------------*/
           $aListData = DB::table('property_enquiry')
                        //->where('is_deleted',N)
                        ->orderBy('id','desc')
                        ->paginate($iPerPagePagination);
         /*-------------- get data------------------*/
         return view('admin.users.propertyEnquiry',['aTotalData'=>$aListCount,'aLists'=>$aListData]);
     }

     public function agentEnquiry() {
        /*---------------------- get per page paging record show ------------------------------*/
           $iPerPagePagination  = perPagePaging();
        /*---------------------- get per page paging record show ------------------------------*/

         /*-------------- count data------------------*/
           $aListCount = DB::table('agent_profile')
                            ->orderBy('id','desc')
                            ->count();
         /*-------------- count data------------------*/

         /*-------------- get data------------------*/
           $aListData = DB::table('agent_profile')
                        ->orderBy('id','desc')
                        ->paginate($iPerPagePagination);
         /*-------------- get data------------------*/
         return view('admin.agent.agentEnquiry',['aTotalData'=>$aListCount,'aLists'=>$aListData]);
     }

    public function contactEnquiry() {
        /*---------------------- get per page paging record show ------------------------------*/
           $iPerPagePagination  = perPagePaging();
        /*---------------------- get per page paging record show ------------------------------*/

         /*-------------- count data------------------*/
           $aListCount = DB::table('contact_us')
                            ->orderBy('id','desc')
                            ->count();
         /*-------------- count data------------------*/

         /*-------------- get data------------------*/
           $aListData = DB::table('contact_us')
                        ->orderBy('id','desc')
                        ->paginate($iPerPagePagination);
         /*-------------- get data------------------*/
         return view('admin.contact.contactEnquiry',['aTotalData'=>$aListCount,'aLists'=>$aListData]);
     }

     public function createBlog(){
                 return view('admin.blog.createBlog',[]);
     }

     public function createSocialLinks(){
        $facebook_value = DB::table('cms_content')
                              ->where('cms_key','facebook')
                              ->get();

        $linkedin_value = DB::table('cms_content')
                              ->where('cms_key','linkedin')
                              ->get();

        $twitter_value = DB::table('cms_content')
                              ->where('cms_key','twitter')
                              ->get();

        $instagram_value = DB::table('cms_content')
                              ->where('cms_key','instagram')
                              ->get();

        $youtube_value = DB::table('cms_content')
                              ->where('cms_key','youtube')
                              ->get();

        $tiktok_value = DB::table('cms_content')
                              ->where('cms_key','tiktok')
                              ->get();

        return view('admin.blog.createSocialLinks',[
                    'facebook_value'  => $facebook_value[0]->value,
                    'linkedin_value'  => $linkedin_value[0]->value,
                    'twitter_value'   => $twitter_value[0]->value,
                    'instagram_value' => $instagram_value[0]->value,
                    'youtube_value'   => $youtube_value[0]->value,
                    'tiktok_value'   => $tiktok_value[0]->value,
        ]); 
     }

     public function createBlogProcess(Request $request){
         $post = $request->input();
         $title = !empty($post['title']) ? $post['title'] : '';
         $long_description = !empty($post['long_description']) ? $post['long_description'] : '';
         $status = !empty($post['status']) ? $post['status'] : '';

         //insert data
         $id = DB::table('blog')->insertGetId([
                        'title'                   => $title,
                        'long_description'        => $long_description,
                        'status'                  => $status,
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
                $file->move(public_path().'/blog/', $name);  
                
                //insert data
                DB::table('blog')
                        ->where('id', $id)  // find your user by their email
                        ->update(array('file' => $name));  // update the record in the DB.
            }
         }

        return view('admin.blog.createBlog',['message'=>"Blog created successfully"]);
     }

     function createHouseRuleProcess(Request $request){
        $post = $request->input();
        $rule_name = $post['rule_name'];

        //insert data
        $id = DB::table('house_rules')->insertGetId([
                        'house_rule_name'                   => $rule_name,
                    ]);

        /*---------------------- get per page paging record show ------------------------------*/
        $iPerPagePagination  = perPagePaging();
        /*---------------------- get per page paging record show ------------------------------*/

        /*-------------- count data------------------*/
        $aListCount = DB::table('house_rules')
                            ->orderBy('id','desc')
                            ->count();
        /*-------------- count data------------------*/

        /*-------------- get data------------------*/
        $aListData = DB::table('house_rules')
                        ->orderBy('id','desc')
                        ->paginate($iPerPagePagination);
        /*-------------- get data------------------*/

        return view('admin.blog.manageHouseRules',['aTotalData'=>$aListCount,'aLists'=>$aListData, 'message' => "Rule created successfully"]);
     }

     function deleteHouseRule(Request $request){
        $id = $request->id;
        DB::table('house_rules')->where('id', $id)->delete();
     }

     function createSocialLinksProcess(Request $request){
        $post      =  $request->input();
        $facebook  = $post['facebook'];
        $linkedin  = $post['linkedin'];
        $twitter   = $post['twitter'];
        $instagram = $post['instagram'];
        $youtube   = $post['youtube'];
        $tiktok   = $post['tiktok'];

        DB::table('cms_content')
        ->where('cms_key', 'facebook')  
        ->update(array('value' => $facebook));

        DB::table('cms_content')
        ->where('cms_key', 'linkedin')  
        ->update(array('value' => $linkedin));

        DB::table('cms_content')
        ->where('cms_key', 'twitter')  
        ->update(array('value' => $twitter));

        DB::table('cms_content')
        ->where('cms_key', 'instagram')  
        ->update(array('value' => $instagram));

        DB::table('cms_content')
        ->where('cms_key', 'youtube')  
        ->update(array('value' => $youtube));

        DB::table('cms_content')
        ->where('cms_key', 'tiktok')  
        ->update(array('value' => $tiktok));

        $facebook_value = DB::table('cms_content')
                              ->where('cms_key','facebook')
                              ->get();

        $linkedin_value = DB::table('cms_content')
                              ->where('cms_key','linkedin')
                              ->get();

        $twitter_value = DB::table('cms_content')
                              ->where('cms_key','twitter')
                              ->get();

        $instagram_value = DB::table('cms_content')
                              ->where('cms_key','instagram')
                              ->get();

        $youtube_value = DB::table('cms_content')
                              ->where('cms_key','youtube')
                              ->get();

        $tiktok_value = DB::table('cms_content')
                              ->where('cms_key','tiktok')
                              ->get();

        return view('admin.blog.createSocialLinks',[
                    'facebook_value'  => $facebook_value[0]->value,
                    'linkedin_value'  => $linkedin_value[0]->value,
                    'twitter_value'   => $twitter_value[0]->value,
                    'instagram_value' => $instagram_value[0]->value,
                    'youtube_value'   => $youtube_value[0]->value,
                    'tiktok_value'   => $tiktok_value[0]->value,
        ]); 
     }

     function manageHouseRules(Request $request){
        /*---------------------- get per page paging record show ------------------------------*/
        $iPerPagePagination  = perPagePaging();
        /*---------------------- get per page paging record show ------------------------------*/

        /*-------------- count data------------------*/
        $aListCount = DB::table('house_rules')
                            ->orderBy('id','desc')
                            ->count();
        /*-------------- count data------------------*/

        /*-------------- get data------------------*/
        $aListData = DB::table('house_rules')
                        ->orderBy('id','desc')
                        ->paginate($iPerPagePagination);
        /*-------------- get data------------------*/

        return view('admin.blog.manageHouseRules',['aTotalData'=>$aListCount,'aLists'=>$aListData]);
     }

     function manageTestimonial(Request $request){
        /*---------------------- get per page paging record show ------------------------------*/
      $iPerPagePagination  = perPagePaging();
      /*---------------------- get per page paging record show ------------------------------*/

        /*-------------- count data------------------*/
        $aTotalData = DB::table('testimonial')
        // ->where('is_deleted',N)
        ->orderBy('id','desc')
        ->count();
        /*-------------- count data------------------*/

        /*-------------- get data------------------*/
        $aLists = DB::table('testimonial')
           // ->where('is_deleted',N)
           ->orderBy('id','desc')
           ->paginate($iPerPagePagination);
        /*-------------- get data------------------*/

        return view('admin.testimonial.manageTestimonial', ['aLists' => $aLists]);
     }





     function manageCms(Request $request){
      $post      =  $request->input();
      
      $data_privacy = DB::table('cms_content')
                            ->where('cms_key','privacy_policy')
                            ->get();

      $data_about = DB::table('cms_content')
                            ->where('cms_key','about_us')
                            ->get();


      return view('admin.cmspages.managecmspages',["data_privacy" => $data_privacy, "data_about" => $data_about]);
   }

     function updateCmsProcess(Request $request){
        $post             =  $request->input();
        $long_description =  $post["long_description"];
        $val              =  $post["val"];

        if($val == "privacy_policy"){
            DB::table('cms_content')
                        ->where('cms_key', 'privacy_policy')  // find your user by their email
                        ->update(array('value' => $long_description));  // update the record in the DB.
        }else if($val == "about_us"){
            DB::table('cms_content')
                        ->where('cms_key', 'about_us')  // find your user by their email
                        ->update(array('value' => $long_description));  // update the record in the DB.
        }

        $data_privacy = DB::table('cms_content')
                              ->where('cms_key','privacy_policy')
                              ->get();


        $data_about = DB::table('cms_content')
                              ->where('cms_key','about_us')
                              ->get();

        return view('admin.cmspages.managecmspages',["data_privacy" => $data_privacy, "data_about" => $data_about]);
     }


}