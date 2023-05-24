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
                $count = DB::table('blog')->count();
                @endphp
                <p class="fs-30 mb-2">0</p>

              </div>

            </div>

          </div>

          <div class="col-md-3 mb-4 stretch-card transparent">

            <div class="card card-dark-blue">

              <div class="card-body">

                <p class="mb-4">Total Leads</p>

                @php
                $count = DB::table('property_list')->count();
                @endphp
                <p class="fs-30 mb-2">0</p>

              </div>

            </div>

          </div>

          <div class="col-md-3 mb-4 stretch-card transparent">

            <div class="card card-light-blue">

              <div class="card-body">

                <p class="mb-4">Total Follow-Ups</p>

                @php
                $count = DB::table('property_enquiry')->count();
                @endphp
                <p class="fs-30 mb-2">0</p>

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
            labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
            datasets: [{ 
                data: [86,114,106,106,107,111,133],
                label: "Total",
                borderColor: "#3e95cd",
                backgroundColor: "rgb(62,149,205)",
                borderWidth:2,
                type: 'line',
                fill:false
              }, { 
                data: [70,90,44,60,83,90,100],
                label: "Accepted",
                borderColor: "#3cba9f",
                backgroundColor: "#3cba9f",
                borderWidth:2
              }, { 
                data: [10,21,60,44,17,21,17],
                label: "Pending",
                borderColor: "#ffa500",
                backgroundColor:"#ffa500",
                borderWidth:2,
              }, { 
                data: [6,3,2,2,7,0,16],
                label: "Rejected",
                borderColor: "#c45850",
                backgroundColor:"#c45850",
                borderWidth:2
              }
            ]
          },
        });

    </script>

    </div>

  </div>

@endsection