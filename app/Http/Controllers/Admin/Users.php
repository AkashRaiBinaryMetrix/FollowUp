<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

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

     public function updateAssocStatus(Request $request,$id,$stat) {
        DB::table('users')
                ->where($id,1)
                ->update(array(
                                 'username'=>$username,
                        ));
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

     public function viewPlots(){
        /*---------------------- get per page paging record show ------------------------------*/
           $iPerPagePagination  = perPagePaging();
        /*---------------------- get per page paging record show ------------------------------*/

         /*-------------- count data------------------*/
           $aListCount = DB::table('plots_entry')
                            ->orderBy('id','desc')
                            ->count();
         /*-------------- count data------------------*/

         /*-------------- get data------------------*/
           $aListData = DB::table('plots_entry')
                        ->orderBy('id','desc')
                        ->paginate($iPerPagePagination);
         /*-------------- get data------------------*/

        return view('admin.plots.plotsListEdit',['aTotalData'=>$aListCount,'aLists'=>$aListData]);
     }

     public function addPlots(){
                 return view('admin.plots.createPlot',[]);
     }

     public function createPlotProcess(Request $request){
         $post = $request->input();
         $project_id = $post['project_id'];
         $plot_no = $post['plot_no'];
         $gata_no = $post['gata_no'];
         $booking_status = $post['booking_status'];

         foreach($plot_no as $key => $val) {
                $plotno  = $val;
                $gatano = $gata_no[$key];
                $bookingstatus = $booking_status[$key];

                $id = DB::table('plots_entry')->insertGetId([
                        'project_id'  => $project_id,
                        'plot_no'     => $plotno,
                        'gata_no'     => $gatano,
                        'status'      => $bookingstatus,
                    ]);    
         }

        return view('admin.plots.plotsListEdit',[]);
     }


     public function createLead(Request $request){
        /*---------------------- get per page paging record show ------------------------------*/
           $iPerPagePagination  = perPagePaging();
        /*---------------------- get per page paging record show ------------------------------*/

         /*-------------- count data------------------*/
           $aListCount = DB::table('leads')
                            ->orderBy('id','desc')
                            ->count();
         /*-------------- count data------------------*/

         /*-------------- get data------------------*/
           $aListData = DB::table('leads')
                        ->orderBy('id','desc')
                        ->paginate($iPerPagePagination);
         /*-------------- get data------------------*/
         return view('admin.leads.index',['aTotalData'=>$aListCount,'aLists'=>$aListData]);
     }

     public function assignLead(Request $request){
         /*---------------------- get per page paging record show ------------------------------*/
           $iPerPagePagination  = perPagePaging();
        /*---------------------- get per page paging record show ------------------------------*/

         /*-------------- count data------------------*/
           $aListCount = DB::table('leads')
                            ->orderBy('id','desc')
                            ->count();
         /*-------------- count data------------------*/

         /*-------------- get data------------------*/
           $aListData = DB::table('leads')
                        ->orderBy('id','desc')
                        ->where('assigned_status','=',0)
                        ->paginate($iPerPagePagination);

           $userListData = DB::table('users')
                        ->orderBy('id','desc')
                        ->paginate($iPerPagePagination);
         /*-------------- get data------------------*/
         return view('admin.leads.assign_lead',['userListData' => $userListData,
            'aTotalData'=>$aListCount,'aLists'=>$aListData,'msg' => '', 
            'er' => '']);
     }

     public function assignLeadToassociate(Request $request){
        $assoc_id  = $request->assoc_id;
        $lead_name_arr = array();
        $lead_name_arr = $request->lead_name;

        if (empty($lead_name_arr)) {
            /*---------------------- get per page paging record show ------------------------------*/
           $iPerPagePagination  = perPagePaging();
        /*---------------------- get per page paging record show ------------------------------*/

         /*-------------- count data------------------*/
           $aListCount = DB::table('leads')
                            ->orderBy('id','desc')
                            ->count();
         /*-------------- count data------------------*/

         /*-------------- get data------------------*/
           $aListData = DB::table('leads')
                        ->orderBy('id','desc')
                        ->where('assigned_status','=',0)
                        ->paginate($iPerPagePagination);

           $userListData = DB::table('users')
                        ->orderBy('id','desc')
                        ->paginate($iPerPagePagination);
         /*-------------- get data------------------*/
         return view('admin.leads.assign_lead',['userListData' => $userListData,
            'aTotalData'=>$aListCount,
            'aLists'=>$aListData, 
            'msg' => '', 
            'er' => 'Please select lead name']);
        }else{
              foreach($lead_name_arr as $lead){
                DB::table('leads')
                    ->where('id', $lead)  
                    ->update(
                        array(
                            'assigned_status' => 1,
                            'assoc_id' => $assoc_id,
                        )
                ); 
            }

            /*---------------------- get per page paging record show ------------------------------*/
           $iPerPagePagination  = perPagePaging();
           /*---------------------- get per page paging record show ------------------------------*/

           /*-------------- count data------------------*/
           $aListCount = DB::table('leads')
                            ->orderBy('id','desc')
                            ->count();
           /*-------------- count data------------------*/

           /*-------------- get data------------------*/
           $aListData = DB::table('leads')
                        ->orderBy('id','desc')
                        ->where('assigned_status','=',0)
                        ->paginate($iPerPagePagination);

           $userListData = DB::table('users')
                        ->orderBy('id','desc')
                        ->paginate($iPerPagePagination);
         /*-------------- get data------------------*/
         return view('admin.leads.assign_lead',['userListData' => $userListData,
            'aTotalData'=>$aListCount,
            'aLists'=>$aListData, 
            'msg' => 'Lead assigned successfully', 
            'er' => '']);
        }
     }

     public function viewAssignLeadToassociate(Request $request){
        /*---------------------- get per page paging record show ------------------------------*/
           $iPerPagePagination  = perPagePaging();
        /*---------------------- get per page paging record show ------------------------------*/

         /*-------------- count data------------------*/
           $aListCount = DB::table('leads')
                            ->orderBy('id','desc')
                            ->count();
         /*-------------- count data------------------*/

         /*-------------- get data------------------*/
           $aListData = DB::table('leads')
                        ->orderBy('id','desc')
                        ->where('assigned_status','=',1)
                        ->paginate($iPerPagePagination);

           $userListData = DB::table('users')
                        ->orderBy('id','desc')
                        ->paginate($iPerPagePagination);
         /*-------------- get data------------------*/
         return view('admin.leads.view_assign_lead',['userListData' => $userListData,
            'aTotalData'=>$aListCount,'aLists'=>$aListData]);
     }

     public function viewfollowupDetails(Request $request, $id){
        /*---------------------- get per page paging record show ------------------------------*/
        $iPerPagePagination  = perPagePaging();
        /*---------------------- get per page paging record show ------------------------------*/

         /*-------------- count data------------------*/
           $aListCount = DB::table('follow_up_details')
                            ->orderBy('id','desc')
                            ->count();
         /*-------------- count data------------------*/

         /*-------------- get data------------------*/
           $aListData = DB::table('follow_up_details')
                        ->orderBy('id','desc')
                        ->paginate($iPerPagePagination);

         /*-------------- get data------------------*/
         return view('admin.leads.view_assign_lead_details',[
            'aTotalData'=>$aListCount,'aLists'=>$aListData]);

     }

     public function SaveLeadList(Request $request){
         $post = $request->input();
         $lead_name = $post['lead_name'];
         $lead_mobile = $post['lead_mobile'];
         $lead_other_details = $post['lead_other_details'];
        
         //insert data
         $id = DB::table('leads')->insertGetId([
                        'name'      => $lead_name,
                        'mobile'    => $lead_mobile,
                        'other_details'    => $lead_other_details,
                        'created_date' => date('Y-m-d'),
                        'created_time' => date('H:i:s')
                    ]);

        /*---------------------- get per page paging record show ------------------------------*/
           $iPerPagePagination  = perPagePaging();
        /*---------------------- get per page paging record show ------------------------------*/

         /*-------------- count data------------------*/
           $aListCount = DB::table('leads')
                            ->orderBy('id','desc')
                            ->count();
         /*-------------- count data------------------*/

         /*-------------- get data------------------*/
           $aListData = DB::table('leads')
                        ->orderBy('id','desc')
                        ->paginate($iPerPagePagination);
         /*-------------- get data------------------*/

         return view('admin.leads.index',['aTotalData'=>$aListCount,'aLists'=>$aListData]);
     }

     public function UploadLeadList(Request $request){
        // Allowed mime types 
        $excelMimes = array('text/xls', 'text/xlsx', 'application/excel', 'application/vnd.msexcel', 'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); 
         
        // Validate whether selected file is a Excel file 
        if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $excelMimes)){ 
             
        // If the file is uploaded 
        if(is_uploaded_file($_FILES['file']['tmp_name'])){ 
            $reader = new Xlsx(); 
            $spreadsheet = $reader->load($_FILES['file']['tmp_name']); 
            $worksheet = $spreadsheet->getActiveSheet();  
            $worksheet_arr = $worksheet->toArray(); 
 
            // Remove header row 
            unset($worksheet_arr[0]); 
 
            foreach($worksheet_arr as $row){ 
                $lead_name = $row[0];
                $lead_mobile = $row[1];
                $lead_other_details = $row[2];
        
                //insert data
                $id = DB::table('leads')->insertGetId([
                        'name'      => $lead_name,
                        'mobile'    => $lead_mobile,
                        'other_details'    => $lead_other_details,
                        'created_date' => date('Y-m-d'),
                        'created_time' => date('H:i:s')
                    ]);
            }
         }
         }
         /*---------------------- get per page paging record show ------------------------------*/
           $iPerPagePagination  = perPagePaging();
        /*---------------------- get per page paging record show ------------------------------*/

         /*-------------- count data------------------*/
           $aListCount = DB::table('leads')
                            ->orderBy('id','desc')
                            ->count();
         /*-------------- count data------------------*/

         /*-------------- get data------------------*/
           $aListData = DB::table('leads')
                        ->orderBy('id','desc')
                        ->paginate($iPerPagePagination);
         /*-------------- get data------------------*/

         return view('admin.leads.index',['aTotalData'=>$aListCount,'aLists'=>$aListData]);
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