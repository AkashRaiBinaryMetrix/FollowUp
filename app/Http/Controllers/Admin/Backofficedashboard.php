<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use Session;

class Backofficedashboard extends Controller
{
    public function index()
    {
        return view('backoffice.dashboard.index');
    }

    public function viewLList(Request $request){
         $details = Session::get('isBackofficeLoggedIn');
         $id = $details->id; 
        
         /*---------------------- get per page paging record show ------------------------------*/
         $iPerPagePagination  = perPagePaging();
         /*---------------------- get per page paging record show ------------------------------*/

         /*-------------- count data------------------*/
         $aListCount = DB::table('leads')
                            ->where('assoc_id','=',$id)
                            ->orderBy('id','desc')
                            ->count();
         /*-------------- count data------------------*/

         /*-------------- get data------------------*/
         $aListData = DB::table('leads')
                        ->where('assoc_id','=',$id)
                        ->orderBy('id','desc')
                        ->paginate($iPerPagePagination);
         /*-------------- get data------------------*/

         return view('backoffice.list.index',['aTotalData'=>$aListCount,'aLists'=>$aListData]);
    }

     public function viewfollowupDetails(Request $request, $id){
        /*---------------------- get per page paging record show ------------------------------*/
        $iPerPagePagination  = perPagePaging();
        /*---------------------- get per page paging record show ------------------------------*/

         /*-------------- count data------------------*/
           $aListCount = DB::table('follow_up_details')
                            ->where('lead_id','=',$id)
                            ->orderBy('id','desc')
                            ->count();
         /*-------------- count data------------------*/

         /*-------------- get data------------------*/
           $aListData = DB::table('follow_up_details')
                        ->where('lead_id','=',$id)
                        ->orderBy('id','desc')
                        ->paginate($iPerPagePagination);

         /*-------------- get data------------------*/
         return view('backoffice.list.view_assign_lead_details',[
            'aTotalData'=>$aListCount,'aLists'=>$aListData, 'id' => $id]);
     }

     public function savefollowupDetails(Request $request){
        $frecord_id = $request->frecord_id;
        $p_name    = $request->p_name;
        $p_details = $request->p_details;
        $followup_date = date("Y-m-d");
        $p_date    = $request->p_date;

        //insert data in table
        DB::table('follow_up_details')->insert(
             array(
                    'lead_id'             =>   $frecord_id,
                    'property_name'       =>   $p_name,
                    'other_details'       =>   $p_details,
                    'followup_date'       =>   $followup_date,
                    'next_followup_date'  =>   $p_date, 
             )
        );
        
        /*---------------------- get per page paging record show ------------------------------*/
        $iPerPagePagination  = perPagePaging();
        /*---------------------- get per page paging record show ------------------------------*/

         /*-------------- count data------------------*/
         $aListCount = DB::table('follow_up_details')
                            ->where('lead_id','=',$frecord_id)
                            ->orderBy('id','desc')
                            ->count();
         /*-------------- count data------------------*/

         /*-------------- get data------------------*/
         $aListData = DB::table('follow_up_details')
                        ->where('lead_id','=',$frecord_id)
                        ->orderBy('id','desc')
                        ->paginate($iPerPagePagination);

         /*-------------- get data------------------*/
         return view('backoffice.list.view_assign_lead_details',[
            'aTotalData'=>$aListCount,'aLists'=>$aListData, 'id' => $frecord_id]);
     }

     public function upcoming(Request $request){
         $details = Session::get('isBackofficeLoggedIn');
         
         $id = $details->id;
         $dddDate = $request->dddDate; 
        
         /*---------------------- get per page paging record show ------------------------------*/
         $iPerPagePagination  = perPagePaging();
         /*---------------------- get per page paging record show ------------------------------*/

         /*-------------- count data------------------*/
         $aListCount = DB::table('leads')
                       ->select('leads.*','follow_up_details.*')
                       ->join('follow_up_details','leads.id','=','follow_up_details.lead_id')
                       ->where(['leads.assoc_id' => $id, 'follow_up_details.next_followup_date' => $dddDate])
                       ->count();
         /*-------------- count data------------------*/
         
         /*-------------- get data------------------*/
         $aListData = DB::table('leads')
                        ->select('leads.*','follow_up_details.*')
                        ->join('follow_up_details','leads.id','=','follow_up_details.lead_id')
                        ->where(['leads.assoc_id' => $id, 'follow_up_details.next_followup_date' => $dddDate])->paginate($iPerPagePagination);
         /*-------------- get data------------------*/

         return view('backoffice.list.upcoming',[
            'aTotalData'=>$aListCount,'aLists'=>$aListData, 'id' => $id]);
     }

     function fetchUpcoming(Request $request){
         $aListData = DB::table('follow_up_details')
                        ->where('next_followup_date','like','%'.$request->ddate.'%')
                        ->get();

         return count($aListData);
     }
}