@if (!empty($aLists))

     @foreach ($aLists as $aList)

          @php
            $users = DB::table('property_list')->where('id','=',$aList->project_id)->get();
          @endphp

          <tr id="tr_{{$aList->id}}">

            <td>{{$users[0]->property_title}}</td>

            <td>{{$aList->plot_no}}</td>

            <td>{{$aList->gata_no}}</td>

            <td>{{$aList->status}}</td>

            <td>
                 <a href="#" target="_blank" id="click_here"><i class="fa fa-pencil" title="Edit"></i></a>

                 <a href="#" target="_blank" id="click_here"><i class="fa fa-trash" title="Delete"></i></a>


                    
                  <!-- <form  class

                ="icons-list" id="delete{{$aList->id}}" method="post" action="{{url('admin/deleteplots')}}">

                    @csrf

                    <input type="hidden" name="id" id="id{{$aList->id}}" value="{{$aList->id}}">

                    <div class="col-md-12">

                        <input type="submit" value="Delete">

                    </div>

                  </form> -->
            </td>

          </tr>

     @endforeach

@endif

@if ($aLists && $aLists->hasPages())

{{-- <tr>

    <td colspan="8" style="border:0px;">

        <nav aria-label="Page navigation example">

            <ul class="pagination">

                Showing {{ ($aLists->currentpage() - 1) * $aLists->perpage() + 1 }} to

                {{ $aLists->currentpage() != $aLists->lastpage() ? $aLists->currentpage() * $aLists->perpage() : $aTotalData }}

                of {{ $aTotalData }} Records

           

            <div class="">{!! $aLists->links() !!} </div>

            </ul>



        </div>

    </td>

</tr> --}}



@endif

