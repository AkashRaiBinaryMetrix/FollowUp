@if (!empty($aLists))

     @foreach ($aLists as $aList)

          <tr id="tr_{{$aList->id}}">

            <td>{{$aList->first_name}}</td>

            <td>{{ !empty($aList->last_name) ? $aList->last_name: ''}}</td>

            <td>{{ !empty($aList->email) ? $aList->email: ''}}</td>
            
            <td>{{ !empty($aList->phone_no) ? $aList->phone_no: ''}}</td>
            
            <td>{{ !empty($aList->message) ? $aList->message: ''}}</td>

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

