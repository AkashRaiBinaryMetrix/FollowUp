@if (!empty($aLists))

     @foreach ($aLists as $aList)

          <tr id="tr_{{$aList->id}}">

            <td>{{$aList->comp}} {{$aList->comp}}</td>

            <td>{{ !empty($aList->company_name) ? $aList->company_name: ''}}</td>
            

            <td>{{ !empty($aList->license_no) ? $aList->license_no: ''}}</td>

            <td>{{ !empty($aList->verified_agent) ? $aList->verified_agent: ''}}</td>


            <td>
                 <a href="{{url('/public/agentfiles/'.$aList->file)}}" target="_blank" id="click_here">Click to open</a>
            </td>

            <td>
                 <a href="{{url('/view-agent-detail/'.$aList->id)}}" target="_blank" id="click_here">View Profile</a>
                <a href="" id="make_verified"style="text-decoration:none !important;">&nbsp;&nbsp;  {{$aList->verified_agent}}</a>
                <?php
                if($aList->verified_agent == ""){
                    $msg = "<a href=''>Make verified</a>";
                }
                else{
                    ?>
                    <?php
                    $msg = "<a href=''>Make Unverified</a>";
                }
                ?>
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

