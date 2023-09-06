@if (!empty($aLists))

     @foreach ($aLists as $aList)

          <tr id="tr_">

            <td>{{$aList->name}}</td>

            <td>{{$aList->mobile}}</td>

            <td>{{$aList->other_details}}</td>

            <td>
                <a href="#" target="_blank" id="click_here"><i class="fa fa-pencil" title="Edit Lead"></i></a>
                
                <a href="#" target="_blank" id="click_here">Activate</a>
            </td>

           

          </tr>

     @endforeach

@endif