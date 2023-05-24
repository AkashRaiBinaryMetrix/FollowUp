@if (!empty($aLists))

     @foreach ($aLists as $aList)

          <tr id="tr_{{$aList->id}}">

            <td>{{$aList->first_name}} {{$aList->last_name}}</td>

            <td>{{ !empty($aList->email) ? $aList->email: ''}}</td>

            <td>{{ !empty($aList->phone) ? $aList->phone: ''}}</td>

            <td>
                @php
                    $country_id = $aList->country; 
                    $city_id    = $aList->city; 
                    $state_id   = $aList->state;

                    $countryData = DB::table('country_master')->where('id',$country_id)->first();
                    $stateData = DB::table('state_master')->where('id',$state_id)->first();
                    $cityData = DB::table('city_master')->where('id',$city_id)->first();
                @endphp
                
                {{$countryData->country_name}}, {{$stateData->state_name}}, {{$cityData->city_name}}-{{$aList->zipcode}}</td>

            <td>{{$aList->type_of_property}}</td>
            
            <td style="word-wrap: break-word;">{!! nl2br(e($aList->ameni))!!}</td>

            <td>{{$aList->created_on}}</td>

            <td>
                @php
                     $imagesData = DB::table('property_enquiry_images')->where('inquiry_id',$aList->id)->get();
                     $i=1;
                     foreach($imagesData as $result){
                @endphp
                    <p>Image{{$i}}-<a href="{{url('/public/enquiryfiles/'.$result->url)}}" target="_blank">Click here!</a></p><br/>
                @php
                    $i=$i+1;
                    }
                @endphp
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

