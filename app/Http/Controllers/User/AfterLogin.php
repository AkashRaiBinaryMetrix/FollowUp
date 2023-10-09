<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;
use phpseclib\Crypt\RSA;
use Illuminate\Support\Facades\Crypt;

class Base64{
                            public static function urlsafe_b64encode($string) {
                                $data = base64_encode($string);
                                $data = str_replace(array('+','/','='),array('-','_',''),$data);
                                return $data;
                            }

                            public static function urlsafe_b64decode($string) {
                                $data = str_replace(array('-','_'),array('+','/'),$string);
                                $mod4 = strlen($data) % 4;
                                if ($mod4) {
                                    $data .= substr('====', $mod4);
                                }
                                return base64_decode($data);
                            }
                          }

class AfterLogin extends Controller
{
     public function index() {
        $iUserId = getLoggedInUserId();

        //get user details
        $profileDetails = DB::table('users')
                              ->where('id',$iUserId)
                              ->first();

        //get user agent details
        $profileDetails1 = DB::table('users')
                              ->where('id',$iUserId)
                              ->first();

        return view('myuser.inspirational_feed.afterlogin',['profileDetails'=>$profileDetails,'profileDetails1' => $profileDetails1]);
     }

     public function changepassword() {
        $iUserId = getLoggedInUserId();

        //get user details
        $profileDetails = DB::table('users')
                              ->where('id',$iUserId)
                              ->first();

        //get user agent details
        $profileDetails1 = DB::table('users')
                              ->where('id',$iUserId)
                              ->first();

        return view('myuser.inspirational_feed.changepassword',['profileDetails'=>$profileDetails,'profileDetails1' => $profileDetails1]);
     }

     function changepasswordprocess(Request $request){
        $iUserId = getLoggedInUserId();

        //get user details
        $profileDetails = DB::table('users')
                              ->where('id',$iUserId)
                              ->first();

        //get user agent details
        $profileDetails1 = DB::table('users')
                              ->where('id',$iUserId)
                              ->first();

        $post = $request->input();

        //print_r($post);

        $new_password = $post['new_password'];
        $confirm_password = $post['confirm_password'];        
        $sEncPwd = Crypt::encryptString($new_password);

        if($confirm_password !== $new_password){
            $error = "Password and confirm password does not match";
        }else if($confirm_password == $new_password){
            DB::table('users')
                    ->where('id', $iUserId)  
                    ->update(
                        array(
                            'password' => $sEncPwd
                    ));
            $message = "Password changed successfully";
        }

        return view('myuser.inspirational_feed.changepassword',['profileDetails'=>$profileDetails,'profileDetails1' => $profileDetails1,"message" => isset($message) ? $message : "", "error" => isset($error) ? $error : ""]);
     }

     public function updateProcess(Request $request) {
        $iUserId = getLoggedInUserId();

        $full_name    = $request->full_name;
        $title        = $request->title;
        $position     = $request->position;
        $company_name = $request->company_name;
        $phone_number = $request->phone_number;
        $email        = $request->email;
        $address      = $request->address;
        $bio          = $request->bio; 
        $preflang     = $request->preflang;
        $country      = $request->country;
        
        $state        = $request->state;
        $city         = $request->city;
        $zipcode      = $request->zipcode;
        $gender       = $request->gender;  

        DB::table('users')
        ->where('id', $iUserId)
        ->update(array(
            'name'         => $full_name,
            'title'        => $title,
            'position'     => $position,
            'company_name' => $company_name,
            'mobile'       => $phone_number,
            'email'        => $email,
            'address'      => $address,
            'bio'          => $bio,
            'preflang'     => $preflang,
            'country'      => $country,
            'city'         => $city,
            'state'        => $state,
            'zipcode'      => $zipcode,
            'gender'       => $gender 
        ));

        //get user details
        $profileDetails = DB::table('users')
                              ->where('id',$iUserId)
                              ->first();

        //get user agent details
        $profileDetails1 = DB::table('users')
                              ->where('id',$iUserId)
                              ->first();

        return view('myuser.inspirational_feed.afterlogin',['profileDetails'=>$profileDetails,'message'=>"Profile udated successfully",'profileDetails1' => $profileDetails1]);
     }

     public function userBecomeAgent() {
        $iUserId = getLoggedInUserId();

        //get user agent details
        $profileDetails = DB::table('agent_profile')
                              ->where('user_id',$iUserId)
                              ->first();

        //get user agent details
        $profileDetails1 = DB::table('users')
                              ->where('id',$iUserId)
                              ->first();

        return view('myuser.inspirational_feed.user_becomeagent',['profileDetails' => $profileDetails,'profileDetails1' => $profileDetails1]);
     }

     function followUnfollow(Request $request){
        $condition = $request->condition;
        $agent_id = $request->agent_id;
        $iUserId = getLoggedInUserId();

        if($condition == 1){
              $id = DB::table('agent_follow_unfollow')->insertGetId([
                            'user_id'     => $iUserId,
                            'agent_id'    => $agent_id,
                        ]);
        }else{
             DB::table('agent_follow_unfollow')->where('user_id', $iUserId)->where('agent_id', $agent_id)->delete();
        }
    }

     public function updateBecomeAgentProcess(Request $request){
        $iUserId = getLoggedInUserId();

        $comp = $request->comp;
        $company_name = $request->company_name;
        $license_no = $request->license_no;
        $services = $request->services;

        $agent_id = $request->agent_id;
        $message = "";
        $error   = "";
 
        if(empty($agent_id)){
            //insert data
            if($request->hasfile('filenames'))
            {   
                foreach($request->file('filenames') as $file)
                {
                    $name = time().'.'.$file->extension();
                    $file->move(public_path().'/agentfiles/', $name);

                    $id = DB::table('agent_profile')->insertGetId([
                            'user_id'       => $iUserId,
                            'comp'          => $comp,
                            'company_name'  => $company_name,
                            'license_no'    => $license_no,
                            'file'          => $name,
                            'services'      => $services,
                        ]);

                    $message = "Agent profile created successfully";
                }
            }
        }else{
            //update data
            if($request->hasfile('filenames'))
            {   
                foreach($request->file('filenames') as $file)
                {
                    $name = time().'.'.$file->extension();
                    $file->move(public_path().'/agentfiles/', $name);


                    DB::table('agent_profile')
                    ->where('id', $agent_id)  
                    ->update(
                        array(
                            'comp'          => $comp,
                            'company_name'  => $company_name,
                            'license_no'    => $license_no,
                            'file'          => $name,
                            'services'      => $services,
                    ));
                }
                $message = "Agent profile updated successfully";
            }else{
                    $error = "Please upload attachment also";
            }
        }

        //get user agent details
        $profileDetails = DB::table('agent_profile')
                              ->where('user_id',$iUserId)
                              ->first();

        //get user agent details
        $profileDetails1 = DB::table('users')
                              ->where('id',$iUserId)
                              ->first();

        return view('myuser.inspirational_feed.user_becomeagent',['message'=>$message,'error'=>$error,'profileDetails' => $profileDetails,'profileDetails1' => $profileDetails1]);
     }

     public function usercreateanadd(){
        $iUserId = getLoggedInUserId();

        //get user agent details
        $profileDetails1 = DB::table('users')
                              ->where('id',$iUserId)
                              ->first();

        //get house rules
        $house_rules = DB::table('house_rules')->get();

        $aDetail = DB::table('country_master')->get();

        return view('myuser.inspirational_feed.user_createanadd',['profileDetails1'=>$profileDetails1,'house_rules'=>$house_rules,'country_data'=>$aDetail]);

     }

     public function userListNewProperty() {
        $iUserId = getLoggedInUserId();

        //get user agent details
        $profileDetails1 = DB::table('users')
                              ->where('id',$iUserId)
                              ->first();

        //get house rules
        $house_rules = DB::table('house_rules')->get();
        // Country Master
        $aDetail = DB::table('country_master')->get();

        return view('myuser.inspirational_feed.user_listnewproperty',['profileDetails1'=>$profileDetails1,'house_rules'=>$house_rules,'country_data'=>$aDetail]);
       
       
    
    }

     public function listNewPropertyProcess(Request $request){

            $iUserId = getLoggedInUserId();

            $aDetail = DB::table('country_master')->get();

            //get form data
            $property_title = $request->property_title;
            $status         = $request->status;
            $ptype          = $request->ptype;
            $price          = $request->price;
            $area           = $request->area;
            $address        = $request->address;
            $country        = $request->country;
            $state          = $request->state;
            $city           = $request->city;
            $currency       = $request->currency;
            $zipcode        = $request->zipcode;
            $desc           = $request->desc;
            $buildage       = $request->buildage;
            $rooms          = $request->rooms;
            $bath           = $request->bath;
            $time_period    = $request->time_period;

            $ameni          = $request->ameni;
            $final_ameni    = implode(',',$ameni);
            $property_for   = $request->property_for;
            $cancellation   = $request->cancellation;

            $house_rules    = $request->house_rules;

            $property_type_other = $request->property_type_other;
            $is_featured         = $request->is_featured; 

            //insert data in table and get id
            $aData = [
                  "ameni" => $final_ameni,
                  'property_title' => $property_title,
                  'status'         => $status,
                  'ptype'          => $ptype,
                  'price'          => $price,
                  'area'           => $area,
                  'address'        => $address,
                  'country'        => $country,
                  'city'           => $city,
                  'currency'       => $currency,
                  'time_period'       => $time_period,
                  'state'          => $state,
                  'zipcode'        => $zipcode,
                  'description'    => $desc,
                  'buildage'       => $buildage,
                  'rooms'          => $rooms,
                  'bath'           => $bath,
                  'user_id'        => $iUserId,
                  'property_for'   => $property_for,
                  'cancellation'   => $cancellation,
                  'property_type_other' => $property_type_other,
                  'is_featured'         => $is_featured
            ];
        
            $iLastInsertedId = DB::table('property_list')->insertGetId($aData);

            //insert house rules
            foreach($house_rules as $rule_list){
                $option_value = $rule_list;
                $property_list_id = $iLastInsertedId;
                $option_explode = explode('_', $option_value);

                $aDataHouseRules = [
                  "property_list_id" => $property_list_id,
                  'house_rule_id'    => $option_explode[0],
                  'option_value'     => $option_explode[1], 
                ];
        
                DB::table('property_list_house_rules')->insertGetId($aDataHouseRules);
            }

            // Count # of uploaded files in array
            $total = count($_FILES['upload']['name']);

            // Loop through each file
            for( $i=0 ; $i < $total ; $i++ ) {

              //Get the temp file path
              $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

              //Make sure we have a file path
              if ($tmpFilePath != ""){
                //Setup our new file path
                $newFilePath = public_path()."/property_images/" . $_FILES['upload']['name'][$i];

                //Upload the file into the temp dir
                if(move_uploaded_file($tmpFilePath, $newFilePath)) {

                  $file_array[] = $newFilePath;

                }
              }
            }

            //insert file details in the db
            foreach($file_array as $furl){
                    $aData1 = [
                      "list_id" => $iLastInsertedId,
                      "url"     => $furl
                ];
            
                DB::table('property_list_images')->insert($aData1);
            }

            //get user agent details
            $profileDetails1 = DB::table('users')
                              ->where('id',$iUserId)
                              ->first();

            //get house rules
            $house_rules = DB::table('house_rules')->get();

            return view('myuser.inspirational_feed.user_listnewproperty',["message" => "Property created successfully",'profileDetails1'=>$profileDetails1,'house_rules' => $house_rules,'country_data'=>$aDetail]);
     }

     public function userListNewadd() {
        $iUserId = getLoggedInUserId();

        //get user agent details
        $profileDetails1 = DB::table('users')
                              ->where('id',$iUserId)
                              ->first();

        //get house rules
        $house_rules = DB::table('house_rules')->get();

        return view('myuser.inspirational_feed.user_listnewadd',['profileDetails1'=>$profileDetails1,'house_rules'=>$house_rules]);
     }

     public function listnewaddprocess(Request $request){

        $iUserId = getLoggedInUserId();

        //get form data
        $property_title = $request->property_title;
        $status         = $request->status;
        $ptype          = $request->ptype;
        $price          = $request->price;
        $area           = $request->area;
        $address        = $request->address;
        $city           = $request->city;
        $currency       = $request->currency;
        $state          = $request->state;
        $zipcode        = $request->zipcode;
        $desc           = $request->desc;
        $buildage       = $request->buildage;
        $rooms          = $request->rooms;
        $bath           = $request->bath;

        $ameni          = $request->ameni;
        $final_ameni    = implode(',',$ameni);
        $property_for   = $request->property_for;
        $cancellation   = $request->cancellation;

        $house_rules    = $request->house_rules;

        $property_type_other = $request->property_type_other;

        //insert data in table and get id
        $aData = [
              "ameni" => $final_ameni,
              'property_title' => $property_title,
              'status'         => $status,
              'ptype'          => $ptype,
              'price'          => $price,
              'area'           => $area,
              'address'        => $address,
              'city'           => $city,
              'currency'       => $currency,
              'state'          => $state,
              'zipcode'        => $zipcode,
              'description'    => $desc,
              'buildage'       => $buildage,
              'rooms'          => $rooms,
              'bath'           => $bath,
              'user_id'        => $iUserId,
              'property_for'   => $property_for,
              'cancellation'   => $cancellation,
              'property_type_other' => $property_type_other
        ];
    
        $iLastInsertedId = DB::table('create_add')->insertGetId($aData);

        //insert house rules
        foreach($house_rules as $rule_list){
            $option_value = $rule_list;
            $property_list_id = $iLastInsertedId;
            $option_explode = explode('_', $option_value);

            $aDataHouseRules = [
              "property_list_id" => $property_list_id,
              'house_rule_id'    => $option_explode[0],
              'option_value'     => $option_explode[1], 
            ];
    
            DB::table('create_an_add_rules')->insertGetId($aDataHouseRules);
        }

        // Count # of uploaded files in array
        $total = count($_FILES['upload']['name']);

        // Loop through each file
        for( $i=0 ; $i < $total ; $i++ ) {

          //Get the temp file path
          $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

          //Make sure we have a file path
          if ($tmpFilePath != ""){
            //Setup our new file path
            $newFilePath = public_path()."/add_images/" . $_FILES['upload']['name'][$i];

            //Upload the file into the temp dir
            if(move_uploaded_file($tmpFilePath, $newFilePath)) {

              $file_array[] = $newFilePath;

            }
          }
        }

        //insert file details in the db
        foreach($file_array as $furl){
                $aData1 = [
                  "list_id" => $iLastInsertedId,
                  "url"     => $furl
            ];
        
            DB::table('create_add_list_images')->insert($aData1);
        }

        //get user agent details
        $profileDetails1 = DB::table('users')
                          ->where('id',$iUserId)
                          ->first();

        //get house rules
        $house_rules = DB::table('house_rules')->get();

        return view('myuser.inspirational_feed.user_listnewadd',["message" => "Property created successfully",'profileDetails1'=>$profileDetails1,'house_rules' => $house_rules]);
 }

     public function createanaddProcess(Request $request){

        $iUserId = getLoggedInUserId();

        $aDetail = DB::table('country_master')->get();

        //get form data
        $property_title = $request->property_title;
        $status         = $request->status;
        $ptype          = $request->ptype;
        $price          = $request->price;
        $area           = $request->area;
        $address        = $request->address;
        $country        = $request->country;
        $city           = $request->city;
        $state          = $request->state;
        $zipcode        = $request->zipcode;
        $desc           = $request->desc;
        $buildage       = $request->buildage;
        $rooms          = $request->rooms;
        $bath           = $request->bath;

        $ameni          = $request->ameni;
        $final_ameni    = implode(',',$ameni);
        $property_for   = $request->property_for;
        $cancellation   = $request->cancellation;

        $house_rules    = $request->house_rules;

        $property_type_other = $request->property_type_other;

        //insert data in table and get id
        $aData = [
              "ameni" => $final_ameni,
              'property_title' => $property_title,
              'status'         => $status,
              'ptype'          => $ptype,
              'price'          => $price,
              'area'           => $area,
              'address'        => $address,
              'country'        => $country,
              'city'           => $city,
              'state'          => $state,
              'zipcode'        => $zipcode,
              'description'    => $desc,
              'buildage'       => $buildage,
              'rooms'          => $rooms,
              'bath'           => $bath,
              'user_id'        => $iUserId,
              'property_for'   => $property_for,
              'cancellation'   => $cancellation,
              'property_type_other' => $property_type_other
        ];
    
        $iLastInsertedId = DB::table('create_add')->insertGetId($aData);

        //insert house rules
        foreach($house_rules as $rule_list){
            $option_value = $rule_list;
            $property_list_id = $iLastInsertedId;
            $option_explode = explode('_', $option_value);

            $aDataHouseRules = [
              "property_list_id" => $property_list_id,
              'house_rule_id'    => $option_explode[0],
              'option_value'     => $option_explode[1], 
            ];
    
            DB::table('create_an_add_rules')->insertGetId($aDataHouseRules);
        }

        // Count # of uploaded files in array
        $total = count($_FILES['upload']['name']);

        // Loop through each file
        for( $i=0 ; $i < $total ; $i++ ) {

          //Get the temp file path
          $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

          //Make sure we have a file path
          if ($tmpFilePath != ""){
            //Setup our new file path
            $newFilePath = public_path()."/add_images/" . $_FILES['upload']['name'][$i];

            //Upload the file into the temp dir
            if(move_uploaded_file($tmpFilePath, $newFilePath)) {

              $file_array[] = $newFilePath;

            }
          }
        }

        //insert file details in the db
        foreach($file_array as $furl){
                $aData1 = [
                  "list_id" => $iLastInsertedId,
                  "url"     => $furl
            ];
        
            DB::table('create_add_list_images')->insert($aData1);
        }

        //get user agent details
        $profileDetails1 = DB::table('users')
                          ->where('id',$iUserId)
                          ->first();

        //get house rules
        $house_rules = DB::table('house_rules')->get();

        return view('myuser.inspirational_feed.user_listnewproperty',["message" => "Property created successfully",'profileDetails1'=>$profileDetails1,'house_rules' => $house_rules,'country_data'=>$aDetail]);
 }

     public function uploadprofileProcess(Request $request){
        $iUserId = getLoggedInUserId();

        if($_FILES["file"]["name"] != '')
        {
         $test = explode('.', $_FILES["file"]["name"]);
         $ext = end($test);
         $name = rand(100, 999) . '.' . $ext;
         $location = public_path().'/profile_pics/' . $name;  
         move_uploaded_file($_FILES["file"]["tmp_name"], $location);
        }

        //insert data in table
         DB::table('users')
        ->where('id', $iUserId)
        ->update(array(
            'profile_pic'          => $location  
        ));
     }

     public function userMyProperty(Request $request){
        $iUserId = getLoggedInUserId();

        //get user agent details
        $profileDetails1 = DB::table('users')
                              ->where('id',$iUserId)
                              ->first();

        //get property details
        $propertyDetails = DB::table('property_list')
                              ->where('user_id',$iUserId)
                              ->get();

        return view('myuser.inspirational_feed.user_myproperty',['profileDetails1'=>$profileDetails1,'propertyDetails'=>$propertyDetails]);
     }

     public function useraddlisting(Request $request){
        $iUserId = getLoggedInUserId();

        //get user agent details
        $profileDetails1 = DB::table('users')
                              ->where('id',$iUserId)
                              ->first();

        //get property details
        $propertyDetails = DB::table('create_add')
                              ->where('user_id',$iUserId)
                              ->get();

        $aDetail = DB::table('country_master')->get();

        return view('myuser.inspirational_feed.user_addlisting',['profileDetails1'=>$profileDetails1,'propertyDetails'=>$propertyDetails,'country_data' => $aDetail]);
     }

     function deleteUserProperty(Request $request){
        $id = $request->id;

        DB::table('property_list')->where('id', $id)->delete();
        DB::table('property_list_images')->where('list_id', $id)->delete();
     }

     function deleteUserAddlisting(Request $request){
        $id = $request->id;

        DB::table('create_add')->where('id', $id)->delete();
        DB::table('create_add_list_images')->where('list_id', $id)->delete();
     }

     function deleteUserWishlist(Request $request){
        $id = $request->id;

        DB::table('add_wishlist')->where('id', $id)->delete();
        DB::table('create_add_list_images')->where('list_id', $id)->delete();

     }

     

     function userEditPropertyProcess(Request $request){
        $iUserId = getLoggedInUserId();
        $prop_id = $request->prop_id;

        //get user agent details
        $profileDetails1 = DB::table('users')
                              ->where('id',$iUserId)
                              ->first();

        $aDetail = DB::table('country_master')->get();

        //get property general details
        $property_title = $request->property_title;
        $status         = $request->status;
        $ptype          = $request->ptype;
        $price          = $request->price;
        $currency       = $request->currency;
        $area           = $request->area;

        //get property location
        $address = $request->address;
        $country = $request->country;
        $city    = $request->city;
        $state   = $request->state;
        $zipcode = $request->zipcode;

        //get property information
        $desc     = $request->desc;
        $buildage = $request->buildage;
        $rooms    = $request->rooms;
        $bath     = $request->bath; 
        $ameni          = $request->ameni;
        $final_ameni    = implode(',',$ameni); 

        $property_for   = $request->property_for;
        $cancellation   = $request->cancellation;

        $property_type_other = $request->property_type_other;
        $is_featured         = $request->is_featured;

        DB::table('property_list')
        ->where('id', $prop_id)  // find your user by their email
        ->update(
            array(
                 'property_title' => $property_title,
                 'status'         => $status,
                 'ptype'          => $ptype,
                 'price'          => $price,
                 'currency'       => $currency,
                 'area'           => $area,
                 'address'        => $address,
                 'country'        => $country,
                 'city'           => $city,
                 'state'          => $state,
                 'zipcode'        => $zipcode,
                 'description'    => $desc,
                 'buildage'       => $buildage,
                 'rooms'          => $rooms,
                 'bath'           => $bath,
                 'ameni'          => $final_ameni,
                 'property_for'   => $property_for,
                 'property_type_other' => $property_type_other,
                 'is_featured'         => $is_featured
            ));  // update the record in the DB.

        //get image details if any
        // Count # of uploaded files in array
        $total = count($_FILES['upload']['name']);

        //print_r($_FILES);
        $file_array = array();
        if(!empty($file_array)){
            if($total !=0){
                // Loop through each file
                for( $i=0 ; $i < $total ; $i++ ) {

                  //Get the temp file path
                  $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

                  //Make sure we have a file path
                  if ($tmpFilePath != ""){
                    //Setup our new file path
                    $newFilePath = public_path()."/property_images/" . $_FILES['upload']['name'][$i];

                    //Upload the file into the temp dir
                    if(move_uploaded_file($tmpFilePath, $newFilePath)) {

                      $file_array[] = $newFilePath;

                    }
                  }
                }

                //insert file details in the db
                foreach($file_array as $furl){
                        $aData1 = [
                          "list_id" => $prop_id,
                          "url"     => $furl
                    ];
                
                    DB::table('property_list_images')->insert($aData1);
                }
            }
        }

        //get user agent details
        $getPropById     = DB::table('property_list')
                              ->where('id',$prop_id)
                              ->first();

        unset($_FILES);

        //get house rules
        $house_rules = DB::table('house_rules')->get(); 

        return view('myuser.inspirational_feed.user_myproperty_edit',['profileDetails1'=>$profileDetails1,
            'getPropById' => $getPropById,'message' => 'Property updated successfully', 'house_rules' => $house_rules,'country_data'=>$aDetail]);
     }

     function editUseraddlisting(Request $request, $id){
        $iUserId = getLoggedInUserId();
        $prop_id = $id;
        $aDetail = DB::table('country_master')->get();

        //get user agent details
        $profileDetails1 = DB::table('users')
                              ->where('id',$iUserId)
                              ->first();

        //get user agent details
        $getPropById     = DB::table('create_add')
                              ->where('id',$prop_id)
                              ->first(); 

        unset($_FILES); 

        //get house rules
        $house_rules = DB::table('house_rules')->get();   

        return view('myuser.inspirational_feed.user_addlisting_edit',['profileDetails1'=>$profileDetails1,
            'getPropById' => $getPropById, 'house_rules' => $house_rules,'country_data'=>$aDetail]
        );
     }

     function usereditaddlistingprocess(Request $request){
        $iUserId = getLoggedInUserId();
        $prop_id = $request->prop_id;

        $aDetail = DB::table('country_master')->get();

        //get user agent details
        $profileDetails1 = DB::table('users')
                              ->where('id',$iUserId)
                              ->first();

        //get property general details
        $property_title = $request->property_title;
        $status         = $request->status;
        $ptype          = $request->ptype;
        $price          = $request->price;
        $currency       = $request->currency;
        $area           = $request->area;

        //get property location
        $address = $request->address;
        $country = $request->country;
        $city    = $request->city;
        $state   = $request->state;
        $zipcode = $request->zipcode;

        //get property information
        $desc     = $request->desc;
        $buildage = $request->buildage;
        $rooms    = $request->rooms;
        $bath     = $request->bath; 
        $ameni          = $request->ameni;
        $final_ameni    = implode(',',$ameni); 

        $property_for   = $request->property_for;
        $cancellation   = $request->cancellation;

        $property_type_other = $request->property_type_other;

        DB::table('create_add')
        ->where('id', $prop_id)  // find your user by their email
        ->update(
            array(
                 'property_title' => $property_title,
                 'status'         => $status,
                 'ptype'          => $ptype,
                 'price'          => $price,
                 'currency'       => $currency,
                 'area'           => $area,
                 'address'        => $address,
                 'country'        => $country,
                 'city'           => $city,
                 'state'          => $state,
                 'zipcode'        => $zipcode,
                 'description'    => $desc,
                 'buildage'       => $buildage,
                 'rooms'          => $rooms,
                 'bath'           => $bath,
                 'ameni'          => $final_ameni,
                 'property_for'   => $property_for,
                 'property_type_other' => $property_type_other
            ));  // update the record in the DB.

        //get image details if any
        // Count # of uploaded files in array
        $total = count($_FILES['upload']['name']);

        //print_r($_FILES);
        $file_array = array();
        if(!empty($file_array)){
            if($total !=0){
                // Loop through each file
                for( $i=0 ; $i < $total ; $i++ ) {

                  //Get the temp file path
                  $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

                  //Make sure we have a file path
                  if ($tmpFilePath != ""){
                    //Setup our new file path
                    $newFilePath = public_path()."/add_images/" . $_FILES['upload']['name'][$i];

                    //Upload the file into the temp dir
                    if(move_uploaded_file($tmpFilePath, $newFilePath)) {

                      $file_array[] = $newFilePath;

                    }
                  }
                }

                //insert file details in the db
                foreach($file_array as $furl){
                        $aData1 = [
                          "list_id" => $prop_id,
                          "url"     => $furl
                    ];
                
                    DB::table('create_add_list_images')->insert($aData1);
                }
            }
        }

        //get user agent details
        $getPropById     = DB::table('create_add')
                              ->where('id',$prop_id)
                              ->first();

        unset($_FILES);

        //get house rules
        $house_rules = DB::table('house_rules')->get(); 

        return view('myuser.inspirational_feed.user_addlisting_edit',['profileDetails1'=>$profileDetails1,
            'getPropById' => $getPropById,'message' => 'Property updated successfully', 'house_rules' => $house_rules,'country_data'=>$aDetail]);
     }

     function viewUseraddlisting(Request $request, $id){
        $iUserId = getLoggedInUserId();
        $prop_id = $id;

        //get user agent details
        $getPropById     = DB::table('create_add')
                              ->where('id',$prop_id)
                              ->first();

        //house rules
        $house_rules = DB::table('create_an_add_rules')
                        ->select('create_an_add_rules.option_value','house_rules.house_rule_name')
                        ->join('house_rules','create_an_add_rules.house_rule_id','=','house_rules.id')
                        ->where(['create_an_add_rules.property_list_id' => $prop_id])
                        ->get();

        return view('myuser.inspirational_feed.user_addlisting_detail',['getPropById' => $getPropById, 'house_rules' => $house_rules
        ]);
     }

     function deleteUserPropertyImageById(Request $request){
        $id = $request->id;
        unset($_FILES);
        DB::table('property_list_images')->where('id', $id)->delete();
     }

     function deleteUserAddlistingImageById(Request $request){
        $id = $request->id;
        unset($_FILES);
        DB::table('create_add_list_images')->where('id', $id)->delete();
     }

     function viewUserProperty(Request $request, $id){
        $iUserId = getLoggedInUserId();
        $prop_id = $id;

        //get user agent details
        $getPropById     = DB::table('property_list')
                              ->where('id',$prop_id)
                              ->first();

        //house rules
        $house_rules = DB::table('property_list_house_rules')
                        ->select('property_list_house_rules.option_value','house_rules.house_rule_name')
                        ->join('house_rules','property_list_house_rules.house_rule_id','=','house_rules.id')
                        ->where(['property_list_house_rules.property_list_id' => $prop_id])
                        ->get();

        return view('myuser.inspirational_feed.user_myproperty_detail',['getPropById' => $getPropById, 'house_rules' => $house_rules
        ]);
     }

     function addToWishList(Request $request){
            $prop_id = $request->prop_id; 
            $user_id = $request->user_id;

            DB::table('property_wishlist')->insertGetId([
                            'user_id'       => $user_id,
                            'prop_id'          => $prop_id,
                        ]);
     }

     function removeFromWishList(Request $request){
            $id = $request->id; 

            DB::table('property_wishlist')->where('id', $id)->delete();
     }

     function removeaddFromWishList(Request $request){
        $id = $request->id; 

        DB::table('add_wishlist')->where('id', $id)->delete();
 }

     function getChatHistory(Request $request){
            $id = $request->id; 

            $chat_continue_id = DB::table('user_chats')
                              ->where('id',$id)
                              ->orWhere('chat_continue_id',$id)
                              ->get();

            $html = "";

            $html .='<div class="chatbox-head d-flex pb-4 bg-white">
                            <div class="avata position-relative me-3">
                                <img class="rounded-circle" src="https://binarymetrix.in/lineon/html/images/1.jpg" alt="" data-pagespeed-url-hash="3354840428" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                            </div>
                            <div class="chat-info py-1">
                                <span class="mb-1 d-block" style="display:none !important;" id="chatter_name">Malerie G. Terrones</span>
                                <div class="last-msg font-small">Last seen 10 hours ago</div>
                            </div>
                        </div>';

            $i = 1;   
                     
            foreach($chat_continue_id as $result){

                if($i % 2 == 0){
                  $class_name = "msg-replayer";
                }else{
                  $class_name = "msg-sender";    
                }
                
                $html .= '<li class="'.$class_name.'">
                                    <div class="avata">
                                        <img class="rounded-circle" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQD116U9ZCk8bEaanCeB5rSCC2uqY5Ka_2_EA&usqp=CAU" alt="" data-pagespeed-url-hash="3354840428" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                                    </div>
                                    <div class="chat-info">
                                        <div class="mb-2">'.$result->created_on.'</div>
                                        <div class="last-msg p-3 rounded bg-light">'.$result->message.'</div>
                                    </div>
                                </li>';

                $i++;
            }

            echo $html;
     }

     function AddFromWishList(Request $request){
        $add_id = $request->id; 
        $iUserId = getLoggedInUserId();


        DB::table('add_wishlist')->insertGetId([
                        'user_id'       => $iUserId,
                        'add_id'          => $add_id,
                    ]);
 }




     function getChatHistoryButton(Request $request){
            $id = $request->id; 

            $chat_continue_id = DB::table('user_chats')
                              ->where('id',$id)
                              ->orWhere('chat_continue_id',$id)
                              ->get();

            $html = "";
            $iUserId = getLoggedInUserId();

            //get property details
            $propertyDetails = DB::table('user_chats')
                              ->where('who_issending_iUserId',$iUserId)
                              ->orWhere('sendingto_user_id',$iUserId)
                              ->groupBy('chat_continue_id')
                              ->get();

            foreach($propertyDetails as $detail){
                $getUserDetails = DB::table('users')
                                        ->where('id',$detail->sendingto_user_id)
                                        ->first();
                $recordUserId = $getUserDetails->id;

                if($iUserId == $recordUserId){
                                  $getUserDetails = DB::table('users')
                                        ->where('id',$detail->who_issending_iUserId)
                                        ->first();
                }
            }

            foreach($chat_continue_id as $result){
                $prop_id = $result->prop_id;
            }

            $html .="<button class='btn btn-light' type='button' onclick='send_message(".$id.",".$iUserId.",".$getUserDetails->id.",".$prop_id.");'>Send</button>";

            echo $html;
     }

     function saveMessageReply(Request $request){
        $chat_id = $request->chat_id;
        $iUserId = $request->loggedin_userid;
        $sending_to_userid = $request->sending_to_userid;
        $chat_message = $request->chat_message;
        $prop_id = $request->prop_id;

        $aData = [
            "message"               => $chat_message,
            "prop_id"               => $prop_id,
            "sendingto_user_id"     => $sending_to_userid,
            "who_issending_iUserId" => $iUserId,
            "chat_continue_id"      => $chat_id

        ];

        $id = DB::table('user_chats')->insertGetId($aData);
     }

     public function savedMyProperty(Request $request){
        $iUserId = getLoggedInUserId();

        //get user agent details
        $profileDetails1 = DB::table('users')
                              ->where('id',$iUserId)
                              ->first();

        //get property details
        $propertyDetails = DB::table('property_wishlist')
                              ->where('user_id',$iUserId)
                              ->get();

        return view('myuser.inspirational_feed.saved_myproperty',['profileDetails1'=>$profileDetails1,'propertyDetails'=>$propertyDetails]);
     }


     public function savedadd(Request $request){
        $iUserId = getLoggedInUserId();

        //get user agent details
        $profileDetails1 = DB::table('users')
                               ->where('id',$iUserId)
                               ->first();

        //get property details
        $propertyDetails = DB::table('add_wishlist')
                              ->where('user_id',$iUserId)
                              ->get();                       


        return view('myuser.inspirational_feed.saved_add',['profileDetails1'=>$profileDetails1,'propertyDetails'=>$propertyDetails]);
     }

     public function messageList(Request $request){
        $iUserId = getLoggedInUserId();

        //get user agent details
        $profileDetails1 = DB::table('users')
                              ->where('id',$iUserId)
                              ->first();

        //get property details
        $propertyDetails = DB::table('user_chats')
                              ->where('who_issending_iUserId',$iUserId)
                              ->orWhere('sendingto_user_id',$iUserId)
                              ->groupBy('chat_continue_id')
                              ->get();

        return view('myuser.inspirational_feed.messageListView',['profileDetails1'=>$profileDetails1,'propertyDetails'=>$propertyDetails]);
     }

     public function subscription(Request $request){
        $iUserId = getLoggedInUserId();

        //get user agent details
        $profileDetails1 = DB::table('users')
                              ->where('id',$iUserId)
                              ->first();

        return view('myuser.inspirational_feed.subscriptionView',['profileDetails1'=>$profileDetails1]);
     }

     public function make_payment(Request $request){
        $iUserId = getLoggedInUserId();

        //get user agent details
        $profileDetails1 = DB::table('users')
                              ->where('id',$iUserId)
                              ->first();

        return view('myuser.inspirational_feed.make_payment',['profileDetails1'=>$profileDetails1]);
     }

     public function propertyDetailEnquiry(Request $request){
        $iUserId = getLoggedInUserId();
        
        //get data
        $request_name    = $request->request_name;
        $request_email   = $request->request_email;
        $request_phone   = $request->request_phone;
        $request_message = $request->request_message;
        $prop_id         = $request->prop_id;

        //get user agent details
        $getPropById     = DB::table('property_list')
                              ->where('id',$prop_id)
                              ->first();
        
        //insert data
        $id = DB::table('property_detail_enquiry')->insertGetId([
                           'user_id' => $iUserId,
                           'name'    => $request_name,
                           'email'   => $request_email,
                           'phone'   => $request_phone,
                           'prop_id' => $prop_id,
                           'enquiry_type' => 'Normal Enquiry'
                        ]);

        $message = "Thank you for your request, we will get in touch with you soon";

        return view('myuser.inspirational_feed.user_myproperty_detail',['getPropById' => $getPropById
        ]);
     }

     public function userSendmessageProcess(Request $request){
        $message         = $request->request_message;
        $prop_id         = $request->prop_id;
        $sending_user_id = $request->sending_user_id;
        $iUserId         = getLoggedInUserId();

        //insert message
        
        $aData = [
            "message"               => $message,
            "prop_id"               => $prop_id,
            "sendingto_user_id"     => $sending_user_id,
            "who_issending_iUserId" => $iUserId
        ];

        $id = DB::table('user_chats')->insertGetId($aData);

         DB::table('user_chats')->where('id', $id)->update(array('chat_continue_id' => $id));  

         //get user agent details
        $getPropById     = DB::table('property_list')
                              ->where('id',$prop_id)
                              ->first();

        $message = "You message has been sent, keep checking your message corner";

        return view('myuser.inspirational_feed.user_myproperty_detail',['getPropById' => $getPropById, 'message' => $message
        ]);

     }

     function makeProcessPayment(Request $request){
        $payment_method = $request->payment_method;
        $user_id        = $request->user_id;
        $iUserId         = getLoggedInUserId();

        //check again for agent profile
        $checkAgentInfo = DB::table('agent_profile')
                                  ->where('user_id',$iUserId)
                                  ->get();

        if(count($checkAgentInfo) == 0){
            $message = "Please fill the agent form first and then subscribe";
        }else{
            //proceed for the payment
            if($payment_method == "moncash"){
                return view('myuser.inspirational_feed.user_monocash_form',['message' => ''
                    ]);
            }else if($payment_method == "paypal"){
                return view('myuser.inspirational_feed.user_paypal_form',['message' => ''
                    ]);
            }else if($payment_method == "cc_method"){
                return view('myuser.inspirational_feed.cc_method',['message' => ''
                    ]);
            }
        }

        //get user agent details
        $profileDetails1 = DB::table('users')
                              ->where('id',$iUserId)
                              ->first();
        
        return view('myuser.inspirational_feed.subscriptionView',['message' => isset($message) ? $message : "", 'profileDetails1'=>$profileDetails1
        ]);
     }

     public function makeOtherPayment(Request $request){
        $iUserId        = getLoggedInUserId();
        $phone_number   = $request->phone_number;
        $amount         = $request->amount;
        $pin            = $request->pin;
        $message        = $request->message;
        $payment_method = $request->payment_method;

         //update the payment entry in the table
        $aPaymentData = [
                                'created_on'    => date('Y-m-d'),
                                'user_id'       => $iUserId,
                                'phone'         => $phone_number,
                                'amount'        => $amount,
                                'pin'           => $pin,
                                'message'       => $message,
                                'type'          => 'other' 
        ];

        $iLastInsertedId = DB::table('subscription_master')->insertGetId($aPaymentData);

        //proceed for the payment
        return view('myuser.inspirational_feed.other_method',[
            'iUserId '       => $iUserId,
            'phone_number'   => $phone_number,
            'amount'         => $amount,
            'pin'            => $pin,
            'message'        => $message,
            'payment_method' => $payment_method,
            'type'           => 'other'   
        ]);
     }

     function userpaypalform(Request $request){
        $iUserId = getLoggedInUserId();
        $phone            = $request->phone_number;
        $amount           = $request->amount;
        $pin              = $request->pin;
        $message          = $request->message;

        //update the payment entry in the table
        $aPaymentData = [
                                'created_on'    => date('Y-m-d'),
                                'user_id'       => $iUserId,
                                'phone' => $phone,
                                'amount' => $amount,
                                'pin' => $pin,
                                'message' => $message,

            ];

        $iLastInsertedId = DB::table('subscription_master')->insertGetId($aPaymentData);


        //get user agent details
        $profileDetails1 = DB::table('users')
                              ->where('id',$iUserId)
                              ->first();

        return view('myuser.inspirational_feed.paypalpayment',['profileDetails1'=>$profileDetails1, 
            'message' => isset($message) ? $message : '', 
            'error' => isset($error) ? $error : '']);
     }

     function usermonocashform(Request $request){
        $iUserId = getLoggedInUserId();
        $phone            = $request->phone_number;
        $amount           = $request->amount;
        $pin              = $request->pin;
        $message          = $request->message;

        //update the payment entry in the table
        $aPaymentData = [
                                'created_on'    => date('Y-m-d'),
                                'user_id'       => $iUserId,
                                'phone' => $phone,
                                'amount' => $amount,
                                'pin' => $pin,
                                'message' => $message,

            ];

        $iLastInsertedId = DB::table('subscription_master')->insertGetId($aPaymentData);


        //get user agent details
        $profileDetails1 = DB::table('users')
                              ->where('id',$iUserId)
                              ->first();

        return view('myuser.inspirational_feed.moncashpayment',['profileDetails1'=>$profileDetails1, 
            'message' => isset($message) ? $message : '', 
            'error' => isset($error) ? $error : '']);
     }




     function getAndSetPaypalResponseCancel(Request $request){
        $iUserId = getLoggedInUserId();

        //get user agent details
        $profileDetails1 = DB::table('users')
                              ->where('id',$iUserId)
                              ->first();

        return view('myuser.inspirational_feed.subscriptionView',['profileDetails1'=>$profileDetails1]);
     }

     function getAndSetPaypalResponseReturn(Request $request){
        $payer_id = $_GET['PayerID'];
        $txn_id   = $_GET['tx']; 
        $payment_gross = $_GET['amt']; 
        $currency_code = $_GET['cc']; 
        $payment_status = $_GET['st'];

        $iUserId = getLoggedInUserId();

        //update the payment entry in the table
        if($payment_status = "Completed"){

            $aPaymentData = [
                                'created_on'    => date('Y-m-d'),
                                'user_id'       => $iUserId,
                                'payer_id'      => $payer_id,
                                'txn_id'        => $txn_id,
                                'payment_gross' => $payment_gross,
                                'currency_code' => $currency_code,
                                'payment_mode'  => 'paypal'     
            ];

            $iLastInsertedId = DB::table('subscription_master')->update($aPaymentData);

            //insert data
            $message = "You have been subscribed successfully";
        }else{
            $error = "Sorry, unable to proceed with the transaction. Please try again after sometime.";
        }

        //get user agent details
        $profileDetails1 = DB::table('users')
                              ->where('id',$iUserId)
                              ->first();

        return view('myuser.inspirational_feed.subscriptionView',['profileDetails1'=>$profileDetails1, 
            'message' => isset($message) ? $message : '', 
            'error' => isset($error) ? $error : '']);
     }

     public function savemoncashthankyou(Request $request){
        $transactionId = $_GET['transactionId'];
        $iUserId = getLoggedInUserId();

        //update the payment entry in the table
        if($payment_status = "Completed"){

            $aPaymentData = [
                                'created_on'    => date('Y-m-d'),
                                'user_id'       => $iUserId,
                                'payer_id'      => "",
                                'txn_id'        => $transactionId,
                                'payment_gross' => "10",
                                'currency_code' => "HTG",
                                'payment_mode'  => 'moncash'     
            ];

            $iLastInsertedId = DB::table('subscription_master')->update($aPaymentData);

            //insert data
            $message = "You have been subscribed successfully";
        }else{
            $error = "Sorry, unable to proceed with the transaction. Please try again after sometime.";
        }

        //get user agent details
        $profileDetails1 = DB::table('users')
                              ->where('id',$iUserId)
                              ->first();

        return view('myuser.inspirational_feed.subscriptionView',['profileDetails1'=>$profileDetails1, 
            'message' => isset($message) ? $message : '', 
            'error' => isset($error) ? $error : '']);
     }

     function makeprocesspaymentccmethod(Request $request){
        $iUserId = getLoggedInUserId();
        $card_holder_name = $request->card_holder_name;
        $card_number      = $request->card_number;
        $card_month       = $request->card_month;
        $card_year        = $request->card_year;
        $card_cvv         = $request->card_cvv;
        $phone         = $request->phone;
        $amount         = $request->amount;
        $pin         = $request->pin;
        $message         = $request->message;

        //update the payment entry in the table
        $aPaymentData = [
                                'created_on'    => date('Y-m-d'),
                                'user_id'       => $iUserId,
                                'payer_id'      => "",
                                'txn_id'        => "",
                                'payment_gross' => "10",
                                'currency_code' => "HTG",
                                'payment_mode'  => 'credit_card',
                                'card_holder_name' => $card_holder_name,
                                'card_holder_number' => $card_number,
                                'card_holder_cvv' => $card_cvv,
                                'card_holder_month' => $card_month,
                                'card_holder_year' => $card_year,
                                'phone' => $phone,
                                'amount' => $amount,
                                'pin' => $pin,
                                'message' => $message,

            ];

        $iLastInsertedId = DB::table('subscription_master')->insertGetId($aPaymentData);

        //insert data
        $message = "You have been subscribed successfully";

        //get user agent details
        $profileDetails1 = DB::table('users')
                              ->where('id',$iUserId)
                              ->first();

        return view('myuser.inspirational_feed.subscriptionView',['profileDetails1'=>$profileDetails1, 
            'message' => isset($message) ? $message : '', 
            'error' => isset($error) ? $error : '']);
     }

     function saveReview(Request $request){
        $iUserId = getLoggedInUserId();

        $post      = $request->input();
        $comment   = $post['comment'];
        $full_name = $post['full_name'];
        $email     = $post['email'];
        $agent_id  = $post['agent_id'];

        $id = DB::table('agent_reviews')->insertGetId([
                            'agent_id'       => $agent_id,
                            'name'           => $full_name,
                            'email'          => $email,
                            'description'    => $comment,
                            'user_id'        => $iUserId   
                        ]);

        $message = "Agent review created successfully";

        //get agent review details
        $getAgentReviews = DB::table('agent_reviews')->select('*')->where('agent_id', '=' , $agent_id)->get();

        return view('myuser.signup.agentsListsDetail', ['id' => $agent_id, 'message' => $message, 'getAgentReviews' => $getAgentReviews]);  
     }

     function myreview(Request $request){
        $iUserId = getLoggedInUserId();

        //get user details
        $profileDetails = DB::table('users')
                              ->where('id',$iUserId)
                              ->first();

        //get user agent details
        $profileDetails1 = DB::table('users')
                              ->where('id',$iUserId)
                              ->first();

        $getAgentReviews = DB::table('agent_reviews')->select('*')->where('user_id', '=' , $iUserId)->get();

        return view('myuser.inspirational_feed.myreviews',[
            'profileDetails'  => $profileDetails,
            'profileDetails1' => $profileDetails1,
            'getAgentReviews' => $getAgentReviews
        ]);
     }

     function manageannouncement(Request $request){
        $iUserId = getLoggedInUserId();

        //get user details
        $profileDetails = DB::table('users')
                              ->where('id',$iUserId)
                              ->first();

        //get user agent details
        $profileDetails1 = DB::table('users')
                              ->where('id',$iUserId)
                              ->first();

        $agent_announcement = DB::table('agent_announcement')->select('*')->where('user_id', '=' , $iUserId)->orderBy('id','desc')->get();

        return view('myuser.inspirational_feed.manageannouncement',[
            'profileDetails'  => $profileDetails,
            'profileDetails1' => $profileDetails1,
            'agent_announcement' => $agent_announcement
        ]);
     }

     function addAnnouncement(Request $request){
        $iUserId = getLoggedInUserId();

        //get user details
        $profileDetails = DB::table('users')
                              ->where('id',$iUserId)
                              ->first();

        //get user agent details
        $profileDetails1 = DB::table('users')
                              ->where('id',$iUserId)
                              ->first();

        //add new
        $description = $request->description;
        $image = $request->image;

        $aData['user_id'] = $iUserId;
        $aData['description'] = $description;
        $id = DB::table('agent_announcement')->insertGetId($aData);
                 // Count # of uploaded files in array
                 $total = count($_FILES['image']['name']);

                 // Loop through each file
                 for( $i=0 ; $i < $total ; $i++ ) {
        
                   //Get the temp file path
                   $tmpFilePath = $_FILES['image']['tmp_name'][$i];
        
                   //Make sure we have a file path
                   if ($tmpFilePath != ""){
                     //Setup our new file path
                     $newFilePath1 = public_path()."/manage-annoucement/" . $_FILES['image']['name'][$i];
        
                     //Upload the file into the temp dir
                     if(move_uploaded_file($tmpFilePath, $newFilePath1)) {
        
                       $file_array[] = $newFilePath1;
        
                     }
                   }
                 }

                     //insert file details in the db
            foreach($file_array as $furl){
               
        
            DB::table('agent_announcement')
                    ->where('id', $id)  
                    ->update(
                        array(
                            "image"     => $furl
                    ));
        }

        $agent_announcement = DB::table('agent_announcement')->select('*')->where('user_id', '=' , $iUserId)->orderBy('id','desc')->get();

        return view('myuser.inspirational_feed.manageannouncement',[
            'profileDetails'  => $profileDetails,
            'profileDetails1' => $profileDetails1,
            'agent_announcement' => $agent_announcement
        ]);

     }

     function deleteAnnouncement(Request $request){
        
     }
     ////////////

     public function createGroup(Request $request) {
         $post =  $request->input();
         $groupName = $post['groupName'] ?? '';
         $privacyType = $post['privacyType'] ?? '';
         $description = $post['description'] ?? '';
         /*-------------- check group exists --------------------*/
           $isExists = DB::table('groups')->where([['name',$groupName],['is_deleted',N]])->count();
           if($isExists) {
               echo json_encode(['status'=>'failure','msg'=>'Group name is already exists']);
               exit;
           }
         /*-------------- check group exists --------------------*/
         $isUserLoggedIn = Session('isUserLoggedIn');
         $iUserId = !empty($isUserLoggedIn->id) ? $isUserLoggedIn->id : '';
         /*------------------- get current date time -------------------*/
            $sCurrentDateTime = getCurrentLocalDateTime();
         /*------------------- get current date time -------------------*/
         $aData = [
              'user_id'=>$iUserId,
              'name'=>$groupName,
              'group_type'=>$privacyType,
              'description'=>$description,
              'created_at'=> $sCurrentDateTime
         ];
         if($request->file('image')){
          $file= $request->file('image');
          $filename= date('YmdHi').'_'.$file->getClientOriginalName();
          $file->move(public_path('public/images/groups'), $filename);
          $aData['image']= $filename;
        }
        $iLastInsertedId = DB::table('groups')->insertGetId($aData);
        if($iLastInsertedId) {
            /*------------- get all user event he have joined or created --------------------*/
            /*--------------- get user group created and joined -------------------*/
                $aPublicGroupLists = DB::table('groups')
                        ->where('group_type',PUBLIC_GROUP_TYPE)
                        ->where([['status',ACTIVE],['is_deleted',N]])
                        ->limit(3)
                        ->orderBy('id','desc')
                        ->get();

                $aPrivateGroupLists = DB::table('groups')
                ->where('group_type',PRIVATE_GROUP_TYPE)
                ->where('user_id',$iUserId)
                ->where([['status',ACTIVE],['is_deleted',N]])
                ->limit(3)
                ->orderBy('id','desc')
                ->get();

                $aGroupLists = array();
                if(($aPublicGroupLists && count($aPublicGroupLists) > 0) && ($aPrivateGroupLists && count($aPrivateGroupLists) > 0)) {
                    $aGroupLists = (object) array_merge($aPrivateGroupLists->toArray(),$aPublicGroupLists->toArray());
                } else if(($aPublicGroupLists && count($aPublicGroupLists) == 0) && ($aPrivateGroupLists && count($aPrivateGroupLists) > 0)) {
                    $aGroupLists = $aPrivateGroupLists;
                } else {
                     $aGroupLists = $aPublicGroupLists;
                }
            /*--------------- get user group created and joined -------------------*/
             $sOutput = '';
             if(!empty($aGroupLists)) {
                  foreach($aGroupLists as $key=> $aGroup) {
                      $iImage = 'public/images/groups/'.$aGroup->image;
                      $sName = !empty($aGroup->name) ? $aGroup->name : '';
                      $sURL  = url('group-detail/'.$aGroup->id);

                      $sCreatedDateTime = !empty($aGroup->created_at) ? $aGroup->created_at : '';
                      /*--------------- get current local Date Time from UTC ---------------*/
                       $sCurrentDate = getCurrentLocalDateTime();
                     /*--------------- get current local Date Time from UTC ---------------*/

                    $first_date = !empty($sCreatedDateTime) ? new DateTime($sCreatedDateTime) : "";
                    $second_date = !empty($sCurrentDate) ? new DateTime($sCurrentDate) : "";
                    $difference = !empty($first_date) && !empty($second_date) ? $first_date->diff($second_date) : "";
                    $sPosted     = !empty($difference) ? format_interval($difference) : "";   

                      $sOutput .= '<div class="aside-groups-col">
                      <a href="'.$sURL.'">
                        <div class="aside-groups-pic"><img src="'.$iImage.'" alt="" data-pagespeed-url-hash="624115584" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></div>
                        <div class="aside-groups-title">'.$sName.' <span class="event-post-time">Last active &bull; '.$sPosted.'</span></div>
                      </a>
                    </div>';
                  }
             }
            /*------------- get all user event he have joined or created --------------------*/
            echo json_encode(['status'=>'success','msg'=>'Group has been created successfully','sOutput'=>$sOutput]);
        } else {
            echo json_encode(['status'=>'failure','msg'=>'Group has not been created. Please try again']);
        }
     }
     public function hideEventOrReport(Request $request) {
           $post = $request->input();
           $id   = !empty($post['id']) ? $post['id'] : '';
           $type = !empty($post['type']) ? $post['type'] : '';
           /*------------------- get current date time -------------------*/
           $sCurrentDateTime = getCurrentLocalDateTime();
           /*------------------- get current date time -------------------*/

           $iUserId  = getLoggedInUserId();
           $aData = [
               'user_id'=>$iUserId,
               'event_id'=>$id,
               'created_at'=>$sCurrentDateTime
           ];
           if(!empty($type) && $type == 'hide') {
              $aData['is_event_hide'] = YES;
           } else {
              $aData['is_event_hide'] = YES;
              $aData['is_event_report'] = YES;
           }
           $iLastInsertedId = DB::table('events_hide_report')->insertGetId($aData);
           if($iLastInsertedId) {
              $sMsg = !empty($type) && $type == 'hide' ? 'Event has been hidden successfully' : 'Event has been hide and reported successfully';
              echo json_encode(['status'=>'success','msg'=>$sMsg]);
           } else {
              $sMsg = !empty($type) && $type == 'hide' ? 'Event has not been hidden' : 'Event has not been hide and reported';
              echo json_encode(['status'=>'failure','msg'=>$sMsg]);
           }
     }
  public function hideInspirationalFeed(Request $request) {
      $post = $request->input();
      $id   = !empty($post['id']) ? $post['id'] : '';
      $type = !empty($post['type']) ? $post['type'] : '';
      /*------------------- get current date time -------------------*/
      $sCurrentDateTime = getCurrentLocalDateTime();
      /*------------------- get current date time -------------------*/

      $iUserId  = getLoggedInUserId();
      $aData = [
          'user_id'=>$iUserId,
          'insprational_feed_id'=>$id,
          'created_at'=>$sCurrentDateTime
      ];
      if(!empty($type) && $type == 'hide') {
         $aData['is_insprational_feed_hide'] = YES;
      } else {
         $aData['is_insprational_feed_hide'] = YES;
         $aData['is_insprational_feed_report'] = YES;
      }
      $iLastInsertedId = DB::table('insprational_feed_hide_report')->insertGetId($aData);
      if($iLastInsertedId) {
         $sMsg = !empty($type) && $type == 'hide' ? 'Post has been hidden successfully' : 'Post has been hide and reported successfully';
         echo json_encode(['status'=>'success','msg'=>$sMsg]);
      } else {
         $sMsg = !empty($type) && $type == 'hide' ? 'Post has not been hidden' : 'Post has not been hide and reported';
         echo json_encode(['status'=>'failure','msg'=>$sMsg]);
      }
    }
     public function fellingSearch(Request $request) {
             $post = $request->input();
             $feeling_search = !empty($post['feeling_search']) ? $post['feeling_search'] : '';
            
             $aFeelingLists = DB::table('feelings')->where('name','like','%'.$feeling_search.'%')->where([['status',ACTIVE],['is_deleted',N]])->get();
             $sOutput = '';
             if($aFeelingLists && count($aFeelingLists) > 0) {
                 foreach($aFeelingLists as $key => $aFeeling) {
                   $sName = !empty($aFeeling->name) ? $aFeeling->name : '';
                   $sImage = !empty($aFeeling->image) ? asset($aFeeling->image) : '';
                   $iId = !empty($aFeeling->id) ?  $aFeeling->id : '';
                   $sFunName = "'$sName'";
                   $sFunImage = "'$sImage'";
                   $iFunId = "'$iId'";
                   $iActivityId = "''";
                   $sOutput .= '<li><a href="javascript:void(0)" onclick="showFeelingAndActivity('.$sFunName.','.$sFunImage.','.$iFunId.','.$iActivityId.')"><span class="feelsmilyicon"><img src="'.$sImage.'" alt="" data-pagespeed-url-hash="1699137061" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></span> <span class="feelsmilytxt">'.$sName.'</span></a></li>';
                 }
             }
             echo json_encode(['sOutput'=>$sOutput]); 
     }
      public function activitySearch(Request $request) {
        $post = $request->input();
        $activity_search = !empty($post['activity_search']) ? $post['activity_search'] : '';
        $aActivityLists = DB::table('activities')->where('name','like','%'.$activity_search.'%')->where([['status',ACTIVE],['is_deleted',N]])->get();
        $sOutput = '';
        if($aActivityLists && count($aActivityLists) > 0) {
            foreach($aActivityLists as $key => $aActivity) {
              $sName = !empty($aActivity->name) ? $aActivity->name : '';
              $sImage = !empty($aActivity->image) ? asset($aActivity->image) : '';
              $iId = !empty($aActivity->id) ?  $aActivity->id : '';
              $sFunName = "'$sName'";
              $sFunImage = "'$sImage'";
              $iFunId = "'$iId'";
              $iFeelingId = "''";

              $sOutput .= '<li><a href="javascript:void(0)" onclick="showFeelingAndActivity('.$sFunName.','.$sFunImage.','.$iFunId.','.$iFeelingId.')"><span class="feelsmilyicon"><img src="'.$sImage.'" alt="" data-pagespeed-url-hash="1592760396" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></span> <span class="feelsmilytxt">'.$sName.'</span> <i class="las la-angle-right"></i></a></li>';
            }
        }
        echo json_encode(['sOutput'=>$sOutput]); 
    }
    public function createInspirationalFeedPost(Request $request) {
        $post = $request->input();
        $whats_on_your_mind_post = !empty($post['whats_on_your_mind_post']) ? $post['whats_on_your_mind_post']: '';
        $feeling_id_post = !empty($post['feeling_id_post']) ? $post['feeling_id_post']: '';
        $activity_id_post = !empty($post['activity_id_post']) ? $post['activity_id_post']: '';

        /*------------------- get current date time -------------------*/
        $sCurrentDateTime = getCurrentLocalDateTime();
        /*------------------- get current date time -------------------*/
        $iUserId = getLoggedInUserId();
        $aData = [
              'user_id'=>$iUserId,
              'whats_on_your_mind'=>$whats_on_your_mind_post,
              'feeling_id'=>$feeling_id_post,
              'activity_id'=>$activity_id_post,
              'created_at'=>$sCurrentDateTime,
          ];
        if($request->file('file')){
            $file= $request->file('file');
            $filename= date('YmdHi').'_'.$file->getClientOriginalName();
            $file->move(public_path('images/inspirational_feed'), $filename);
            $aData['photo']= $filename;
        }
        $iLastInsertedId = DB::table('insprational_feed')->insertGetId($aData);
        if($iLastInsertedId) {
            echo json_encode(['status'=>'success','msg'=>'Inspirational feed has been posted successfully']);
        } else {
            echo json_encode(['status'=>'failure','msg'=>'Inspirational feed has not been posted. Please try again']);
        }
    }
    public function createInspirationalFeedTestimony(Request $request) {
      $post = $request->input();
      $whats_on_your_mind = !empty($post['whats_on_your_mind']) ? $post['whats_on_your_mind']: '';
      $feeling_id_testimony = !empty($post['feeling_id_testimony']) ? $post['feeling_id_testimony']: '';
      $activity_id_testimony = !empty($post['activity_id_testimony']) ? $post['activity_id_testimony']: '';

      /*------------------- get current date time -------------------*/
      $sCurrentDateTime = getCurrentLocalDateTime();
      /*------------------- get current date time -------------------*/
      $iUserId = getLoggedInUserId();
      $aData = [
            'user_id'=>$iUserId,
            'whats_on_your_mind'=>$whats_on_your_mind,
            'feeling_id'=>$feeling_id_testimony,
            'activity_id'=>$activity_id_testimony,
            'created_at'=>$sCurrentDateTime,
        ];
      if($request->file('testimony_videos')){
          $file= $request->file('testimony_videos');
          $filename= date('YmdHi').'_'.$file->getClientOriginalName();
          $file->move(public_path('videos/inspirational_feed'), $filename);
          $aData['videos']= $filename;
      }
      $iLastInsertedId = DB::table('insprational_feed')->insertGetId($aData);
      if($iLastInsertedId) {
          echo json_encode(['status'=>'success','msg'=>'Post has been posted successfully']);
      } else {
          echo json_encode(['status'=>'failure','msg'=>'Post has not been posted. Please try again']);
      }
  }
   public function likePost(Request $request) {
        $post = $request->input();
        $iUserId   = !empty($post['iUserId']) ? $post['iUserId'] : '';
        $iPostId = !empty($post['iPostId']) ? $post['iPostId'] : '';
        /*------------------- get current date time -------------------*/
        $sCurrentDateTime = getCurrentLocalDateTime();
        /*------------------- get current date time -------------------*/
        $isUserAlreadyLike = DB::table('insprational_feed_like')->where([['user_id',$iUserId],['insprational_feed_id',$iPostId]])->count();
        if($isUserAlreadyLike > 0) {
            echo json_encode(['status'=>'failure','msg'=>'You have already liked this post']);
            exit();
        }
        $aData = [
            'user_id'=>$iUserId,
            'insprational_feed_id'=>$iPostId,
            'created_at'=>$sCurrentDateTime
        ];
        $iLastInsertedId = DB::table('insprational_feed_like')->insertGetId($aData);
        if($iLastInsertedId) {
             $iTotalLikes = DB::table('insprational_feed_like')->where([['insprational_feed_id',$iPostId]])->count();
             $msg =  $iTotalLikes == 1 ? 'You like': 'You and '.$iTotalLikes.' others likes';
             echo json_encode(['status'=>'success','msg'=>'You have liked this post successfully','iTotalLikes'=>$msg]); 
        } else {
             echo json_encode(['status'=>'failure','msg'=>'You have not liked this post. Please try again']); 
        }
   }
   public function sharePostOnTimeLine(Request $request) {
    $post = $request->input();
    $iUserId   = !empty($post['iUserId']) ? $post['iUserId'] : '';
    $iPostId = !empty($post['iPostId']) ? $post['iPostId'] : '';
    /*------------------- get current date time -------------------*/
    $sCurrentDateTime = getCurrentLocalDateTime();
    /*------------------- get current date time -------------------*/
    $isUserAlreadyLike = DB::table('insprational_feed_share_on_timeline')->where([['user_id',$iUserId],['insprational_feed_id',$iPostId]])->count();
    if($isUserAlreadyLike > 0) {
        echo json_encode(['status'=>'failure','msg'=>'You have already share this post to your timeline']);
        exit();
    }
    $aData = [
        'user_id'=>$iUserId,
        'insprational_feed_id'=>$iPostId,
        'created_at'=>$sCurrentDateTime
    ];
    $iLastInsertedId = DB::table('insprational_feed_share_on_timeline')->insertGetId($aData);
    if($iLastInsertedId) {
         $iTotalShares = DB::table('insprational_feed_share_on_timeline')->where([['insprational_feed_id',$iPostId]])->count();
         $msg =  $iTotalShares == 1 ? 'You share': 'You and '.$iTotalShares.' others shares';
         echo json_encode(['status'=>'success','msg'=>'You have shared this post successfully','iTotalShares'=>$msg]); 
    } else {
         echo json_encode(['status'=>'failure','msg'=>'You have not shared this post. Please try again']); 
    }
  }
   public function commentOnPost(Request $request) {
        $post  = $request->input();
        $postId = $post['postId'];
        $comment = $post['comment'];
        $parentId = $post['parentId'];
        /*------------------- get current date time -------------------*/
          $iUserId = getLoggedInUserId();
          $sCurrentDateTime = getCurrentLocalDateTime();
        /*------------------- get current date time -------------------*/
         $aData = [
             'user_id'=>$iUserId,
             'insprational_feed_id'=>$postId,
             'parent_id'=>$parentId,
             'comment'=>$comment,
             'created_at'=>$sCurrentDateTime,
         ];
         $iLastInsertedId = DB::table('comments')->insertGetId($aData);
         if($iLastInsertedId) {
            $aCommentLists = getInspirationalFeedCommentLists($postId);
            
            $sOutput = '';
            /*------------------ get post comment and like ----------------------*/
                    if($aCommentLists && count($aCommentLists) > 0) {
                         foreach ($aCommentLists as $aComment) {
                              $sUserName = !empty($aComment->name) ? getName($aComment->name) : '';
                              $sCommentName = !empty($aComment->comment) && $aComment->comment == PRAYER ? '<img src="'.asset('images/prayer-icon.png').'">' : $aComment->comment;
                              $iCommentId = !empty($aComment->id) ? $aComment->id : '';
                              $iCommentedId = "'$iCommentId'";
                              $iPostedId = "'$postId'";

                              $iTotalike  = getTotaLikeComment($aComment->id) > 0 ? getTotaLikeComment($aComment->id) : '' ;
                              $sDate = !empty($aComment->created_at) ? date('d M Y', strtotime($aComment->created_at)) : '';
                              $sTime = !empty($aComment->created_at) ? date('H:i', strtotime($aComment->created_at)) : '';
                              $sUserProfilePic = !empty($aComment->profile_pic) ? asset('images/profile/'.$aComment->profile_pic) : asset('images/avtar1.png');

                              $sOutput .= '<div class="newsfeed-usercoments" id="commentSectionIndividualPost'.$iCommentId.'">
                              <div class="newsfeed-commenting-userpic"><a href="javascript:void(0)"><img src="'.$sUserProfilePic.'" alt="" data-pagespeed-url-hash="2514085572" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></a></div>    
                                <div class="newsfeed-commenting-comments">
                                 <div class="commenting-comments1"><a href="javascript:void(0)">'.$sUserName.'</a><span>'.$sCommentName.'</span></div>
                                    
                                  <div class="commenting-comments2">
                                      <a href="javascript:void(0)" onclick="likeComment('.$iCommentedId.', '.$iPostedId.')">Like</a>
                                      <a href="javascript:void(0)" onclick="replyOnComment('.$iCommentedId.', '.$iPostedId.')">Reply</a>
                                      <span id="commentLike'.$iCommentId.'">
                                         <a href="javascript:void(0)"><img src="'.asset('images/like-ico-blue.png').'" alt="" data-pagespeed-url-hash="64196249" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">'.$iTotalike.'</a></span>
                                      <span>'.$sDate.' at '.$sTime.'</span>';
                                /*--------------- called recursion function to show comment nested comment --------------------*/
                                      $aNestedCommentLists = getNestedComment($aComment->id);
                                      
                                      if($aNestedCommentLists && count($aNestedCommentLists) > 0) {
                                          foreach($aNestedCommentLists as $key => $aNestedComment) {
                                                $sUserName = !empty($aNestedComment->name) ? getName($aNestedComment->name) : '';
                                                $sComment = !empty($aNestedComment->comment) ? $aNestedComment->comment : '';
                                                $sDate = !empty($aNestedComment->created_at) ? date('d M Y', strtotime($aNestedComment->created_at)) : '';
                                                $sTime = !empty($aNestedComment->created_at) ? date('H:i', strtotime($aNestedComment->created_at)) : '';
                                                
                                                $icommentId = !empty($aNestedComment->id) ? $aNestedComment->id : '';
                                                $ipostId = !empty($aNestedComment->insprational_feed_id) ? $aNestedComment->insprational_feed_id : '';
                                                $iCommentedId = "'$icommentId'";
                                                $iPostedId = "'$ipostId'";

                                                $iTotalLiked = getTotaLikeComment($aNestedComment->id) > 0 ? getTotaLikeComment($aNestedComment->id) : '';

                                                $sUserProfilePic = !empty($aNestedComment->profile_pic) ? asset('images/profile/'.$aNestedComment->profile_pic) : asset('images/avtar1.png');

                                                $sOutput .= '<div class="newsfeed-usercoments mt-3">
                                                <div class="newsfeed-commenting-userpic"><a href="javascript:void(0)"><img src="'.$sUserProfilePic.'" alt="" data-pagespeed-url-hash="2808585493" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></a></div>    
                                                <div class="newsfeed-commenting-comments">
                                                    <div class="commenting-comments2"><a href="javascript:void(0)"> '.$sUserName.' </a> <span> '.$sComment.' </span></div>
                                                    
                                                    <div class="commenting-comments2">
                                                        <a href="javascript:void(0)" onclick="likeComment('. $iCommentedId.' ,'.$iPostedId.')">Like</a>
                                                        <a href="javascript:void(0)" onclick="replyOnComment('. $iCommentedId.' ,'.$iPostedId.')">Reply</a>
                                                        <span id="commentLike'.$icommentId.'"><a href="javascript:void(0)"><img src="'.asset('images/like-ico-blue.png').'" alt="" data-pagespeed-url-hash="64196249" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">'.$iTotalLiked.' </a></span></span>
                                                        <span> '.$sDate.' at '.$sTime.'</span>
                                                          '.getReplyNestedComment($aNestedComment->id).'
                                                    </div>    
                                                </div>  
                                            </div>';
                                         }
                                    }
                                 $sOutput .='</div>    
                                 </div>  
                             </div>';
                                /*--------------- called recursion function to show comment nested comment --------------------*/
                         }
                    }
            /*------------------ get post comment and like ----------------------*/
            $iTotalComment = getTotalCommentPost($iUserId,$postId);
            echo json_encode(['status'=>'success','sOutput'=>$sOutput,'iTotalComment'=>$iTotalComment]);
         } else {
            echo json_encode(['status'=>'failure']);
         }
    }
    public function likeComment(Request $request) {
        $post  = $request->input();
        $iCommentId = $post['iCommentId'];
        $parentId = $post['parentId'];
        /*------------------- get current date time -------------------*/
          $iUserId = getLoggedInUserId();
          $sCurrentDateTime = getCurrentLocalDateTime();
        /*------------------- get current date time -------------------*/
         $isAlreadyLike = DB::table('comments_like')->where([['user_id',$iUserId],['comment_id',$iCommentId]])->count();
         if($isAlreadyLike > 0) {
            echo json_encode(['status'=>'failure','msg'=>'You have already like this comment']);
            exit();
         }
         $aData = [
             'user_id'=>$iUserId,
             'comment_id'=>$iCommentId,
             'parent_id'=>$parentId,
             'created_at'=>$sCurrentDateTime,
         ];
         $iLastInsertedId = DB::table('comments_like')->insertGetId($aData);
         if($iLastInsertedId) {
            $iTotalCommentLikes = DB::table('comments_like')->where([['comment_id',$iCommentId]])->count();
            $sMsg = '<img src="'.asset('images/like-ico-blue.png').'" alt="" data-pagespeed-url-hash="64196249" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"> '.$iTotalCommentLikes.'';
            echo json_encode(['status'=>'success','iTotalCommentLikes'=>$sMsg]);
         } else {
            echo json_encode(['status'=>'failure']);
         }
    }
}
