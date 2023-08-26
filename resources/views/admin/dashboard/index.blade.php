@extends('admin.layouts.master')

@section('title','Dashboard')

@section('content')

       <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script> 



  <div class="content-wrapper">

    <div class="row">

      <div class="col-md-12 grid-margin">

        <div class="row">

          <div class="col-12 col-xl-8 mb-4 mb-xl-0">

            <h3 class="font-weight-bold">Welcome {{ session('isAdminLoggedIn') ? session('isAdminLoggedIn')->name : '' }}</h3>

            {{-- <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6> --}}

          </div>

          <div class="col-12 col-xl-4">

           <div class="justify-content-end d-flex">

            

           </div>

          </div>

        </div>

      </div>

    </div>

    <div class="row">

        <div class="col-md-3 mb-4 stretch-card transparent">

            <div class="card card-tale">

              <div class="card-body">

                <p class="mb-4">Total Active Associates</p>

                @php
                $count = DB::table('users')->count();
                @endphp
                <p class="fs-30 mb-2">{{$count}}</p>
              

              </div>

            </div>

          </div>

          <div class="col-md-3 mb-4 stretch-card transparent">

            <div class="card card-light-danger">

              <div class="card-body">

                <p class="mb-4">Total In-Active Associates</p>

                @php
                $cccount = DB::table('users')->where('status','=',0)->count();
                @endphp
                <p class="fs-30 mb-2">{{$cccount}}</p>

              </div>

            </div>

          </div>

          <div class="col-md-3 mb-4 stretch-card transparent">

            <div class="card card-dark-blue">

              <div class="card-body">

                <p class="mb-4">Total Leads</p>

                @php
                $leads = DB::table('leads')->count();
                @endphp
                <p class="fs-30 mb-2">{{$leads}}</p>

              </div>

            </div>

          </div>

          <div class="col-md-3 mb-4 stretch-card transparent">

            <div class="card card-light-blue">

              <div class="card-body">

                <p class="mb-4">Total Follow-Ups</p>

                @php
                $follow_up_details = DB::table('follow_up_details')->count();
                @endphp
                <p class="fs-30 mb-2">{{$follow_up_details}}</p>

              </div>

            </div>

          </div>

        <canvas id="myChart"></canvas>
    </div>

    <script>
      var ctx = document.getElementById('myChart').getContext('2d');
      var myChart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: ['Total Active Associates','Total In-Active Associates','Total Leads','Total Follow-Ups'],
            datasets: [{ 
                data: [{{$count}},{{$cccount}},{{$leads}},{{$follow_up_details}}],
                label: "Total Users",
                borderColor: "#3e95cd",
                backgroundColor: "rgb(62,149,205)",
                borderWidth:2,
                type: 'bar',
                fill:true
              }
            ]
          },
        });

    </script>

    </div>

  </div>

@endsection