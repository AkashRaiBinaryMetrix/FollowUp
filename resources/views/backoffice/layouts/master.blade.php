<!DOCTYPE html>

<html lang="en">



<head>

  <!-- Required meta tags -->

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title></title>

  <!-- plugins:css -->

  <link rel="stylesheet" href="{{ asset('backend/vendors/feather/feather.css') }}">

  <link rel="stylesheet" href="{{ asset('backend/vendors/ti-icons/css/themify-icons.css') }}">

  <link rel="stylesheet" href="{{ asset('backend/vendors/css/vendor.bundle.base.css') }}">

  <!-- endinject -->

  <!-- Plugin css for this page -->

  <link rel="stylesheet" href="{{ asset('backend/vendors/mdi/css/materialdesignicons.min.css') }}">

  <link rel="stylesheet" href="{{ asset('backend/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">

  <link rel="stylesheet" href="{{ asset('backend/vendors/ti-icons/css/themify-icons.css') }}">

  <link rel="stylesheet" type="text/css" href="{{ asset('backend/js/select.dataTables.min.css') }}">

  <!-- End plugin css for this page -->

  <!-- inject:css -->

  <link rel="stylesheet" href="{{ asset('backend/css/vertical-layout-light/style.css')}}">

  <link rel="stylesheet" href="{{ asset('backend/css/custom.css') }}">

  <!-- endinject -->

  <link rel="shortcut icon" href="{{ asset('backend/images/favicon.png')}}" />

  <link rel="stylesheet" href="{{ asset('css/jquery.datetimepicker.min.css') }}">

  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

  <script>

            let BASE_URL = '<?php echo BASE_URL?>';



  </script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>

  <div class="container-scroller">

    <!-- partial:partials/_navbar.html -->

    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">

      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">

        <a class="navbar-brand brand-logo mr-5" href="{{ url('admin/dashboard') }}"><img src="https://uilogos.co/img/logotype/treva.png" class="mr-2" alt="logo"/></a>

        <a class="navbar-brand brand-logo-mini" href="{{ url('admin/dashboard') }}"><img src="https://uilogos.co/img/logotype/treva.png" alt="logo"/></a>

      </div>

      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">

      <!--   <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">

          <span class="icon-menu"></span>

        </button> -->

        {{-- <ul class="navbar-nav mr-lg-2">

          <li class="nav-item nav-search d-none d-lg-block">

            <div class="input-group">

              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">

                <span class="input-group-text" id="search">

                  <i class="icon-search"></i>

                </span>

              </div>

              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">

            </div>

          </li>

        </ul> --}}

        <ul class="navbar-nav navbar-nav-right">

          {{-- <li class="nav-item dropdown">

            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">

              <i class="icon-bell mx-0"></i>

              <span class="count"></span>

            </a>

            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">

              <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>

              <a class="dropdown-item preview-item">

                <div class="preview-thumbnail">

                  <div class="preview-icon bg-success">

                    <i class="ti-info-alt mx-0"></i>

                  </div>

                </div>

                <div class="preview-item-content">

                  <h6 class="preview-subject font-weight-normal">Application Error</h6>

                  <p class="font-weight-light small-text mb-0 text-muted">

                    Just now

                  </p>

                </div>

              </a>

              <a class="dropdown-item preview-item">

                <div class="preview-thumbnail">

                  <div class="preview-icon bg-warning">

                    <i class="ti-settings mx-0"></i>

                  </div>

                </div>

                <div class="preview-item-content">

                  <h6 class="preview-subject font-weight-normal">Settings</h6>

                  <p class="font-weight-light small-text mb-0 text-muted">

                    Private message

                  </p>

                </div>

              </a>

              <a class="dropdown-item preview-item">

                <div class="preview-thumbnail">

                  <div class="preview-icon bg-info">

                    <i class="ti-user mx-0"></i>

                  </div>

                </div>

                <div class="preview-item-content">

                  <h6 class="preview-subject font-weight-normal">New user registration</h6>

                  <p class="font-weight-light small-text mb-0 text-muted">

                    2 days ago

                  </p>

                </div>

              </a>

            </div>

          </li> --}}

          <li class="nav-item nav-profile dropdown">

            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" id="profileDropdown">

              <img src="{{ asset('backend/images/faces/face28.jpg') }}" alt="profile"/>

            </a>

            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">

              {{-- <a class="dropdown-item">

                <i class="ti-settings text-primary"></i>

                Profile

              </a> --}}

              <a href="{{ url('admin/logout') }}" class="dropdown-item">

                <i class="fa fa-power-off"></i>

                Logout

              </a>

            </div>

          </li>

          {{-- <li class="nav-item nav-settings d-none d-lg-flex">

            <a class="nav-link" href="#">

              <i class="icon-ellipsis"></i>

            </a>

          </li> --}}

        </ul>
<!-- 
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">

          <span class="icon-menu"></span>

        </button>
 -->
      </div>

    </nav>

    <!-- partial -->

    <div class="container-fluid page-body-wrapper">

      <!-- partial:partials/_settings-panel.html -->

      <div class="theme-setting-wrapper">

        <div id="settings-trigger"><i class="ti-settings"></i></div>

        <div id="theme-settings" class="settings-panel">

          <i class="settings-close ti-close"></i>

          <p class="settings-heading">SIDEBAR SKINS</p>

          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>

          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>

          <p class="settings-heading mt-2">HEADER SKINS</p>

          <div class="color-tiles mx-0 px-4">

            <div class="tiles success"></div>

            <div class="tiles warning"></div>

            <div class="tiles danger"></div>

            <div class="tiles info"></div>

            <div class="tiles dark"></div>

            <div class="tiles default"></div>

          </div>

        </div>

      </div>

      <div id="right-sidebar" class="settings-panel">

        <i class="settings-close ti-close"></i>

        <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">

          <li class="nav-item">

            <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>

          </li>

          <li class="nav-item">

            <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>

          </li>

        </ul>

        <div class="tab-content" id="setting-content">

          <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">

            <div class="add-items d-flex px-3 mb-0">

              <form class="form w-100">

                <div class="form-group d-flex">

                  <input type="text" class="form-control todo-list-input" placeholder="Add To-do">

                  <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>

                </div>

              </form>

            </div>

            <div class="list-wrapper px-3">

              <ul class="d-flex flex-column-reverse todo-list">

                <li>

                  <div class="form-check">

                    <label class="form-check-label">

                      <input class="checkbox" type="checkbox">

                      Team review meeting at 3.00 PM

                    </label>

                  </div>

                  <i class="remove ti-close"></i>

                </li>

                <li>

                  <div class="form-check">

                    <label class="form-check-label">

                      <input class="checkbox" type="checkbox">

                      Prepare for presentation

                    </label>

                  </div>

                  <i class="remove ti-close"></i>

                </li>

                <li>

                  <div class="form-check">

                    <label class="form-check-label">

                      <input class="checkbox" type="checkbox">

                      Resolve all the low priority tickets due today

                    </label>

                  </div>

                  <i class="remove ti-close"></i>

                </li>

                <li class="completed">

                  <div class="form-check">

                    <label class="form-check-label">

                      <input class="checkbox" type="checkbox" checked>

                      Schedule meeting for next week

                    </label>

                  </div>

                  <i class="remove ti-close"></i>

                </li>

                <li class="completed">

                  <div class="form-check">

                    <label class="form-check-label">

                      <input class="checkbox" type="checkbox" checked>

                      Project review

                    </label>

                  </div>

                  <i class="remove ti-close"></i>

                </li>

              </ul>

            </div>

            <h4 class="px-3 text-muted mt-5 font-weight-light mb-0">Events</h4>

            <div class="events pt-4 px-3">

              <div class="wrapper d-flex mb-2">

                <i class="ti-control-record text-primary mr-2"></i>

                <span>Feb 11 2018</span>

              </div>

              <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>

              <p class="text-gray mb-0">The total number of sessions</p>

            </div>

            <div class="events pt-4 px-3">

              <div class="wrapper d-flex mb-2">

                <i class="ti-control-record text-primary mr-2"></i>

                <span>Feb 7 2018</span>

              </div>

              <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>

              <p class="text-gray mb-0 ">Call Sarah Graves</p>

            </div>

          </div>

          <!-- To do section tab ends -->

          <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">

            <div class="d-flex align-items-center justify-content-between border-bottom">

              <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>

              <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See All</small>

            </div>

            <ul class="chat-list">

              <li class="list active">

                <div class="profile"><img src="{{ asset('backend/images/faces/face1.jpg') }}" alt="image"><span class="online"></span></div>

                <div class="info">

                  <p>Thomas Douglas</p>

                  <p>Available</p>

                </div>

                <small class="text-muted my-auto">19 min</small>

              </li>

              <li class="list">

                <div class="profile"><img src="{{ asset('backend/images/faces/face2.jpg') }}" alt="image"><span class="offline"></span></div>

                <div class="info">

                  <div class="wrapper d-flex">

                    <p>Catherine</p>

                  </div>

                  <p>Away</p>

                </div>

                <div class="badge badge-success badge-pill my-auto mx-2">4</div>

                <small class="text-muted my-auto">23 min</small>

              </li>

              <li class="list">

                <div class="profile"><img src="{{ asset('backend/images/faces/face3.jpg') }}" alt="image"><span class="online"></span></div>

                <div class="info">

                  <p>Daniel Russell</p>

                  <p>Available</p>

                </div>

                <small class="text-muted my-auto">14 min</small>

              </li>

              <li class="list">

                <div class="profile"><img src="{{ asset('backend/images/faces/face4.jpg') }}" alt="image"><span class="offline"></span></div>

                <div class="info">

                  <p>James Richardson</p>

                  <p>Away</p>

                </div>

                <small class="text-muted my-auto">2 min</small>

              </li>

              <li class="list">

                <div class="profile"><img src="{{ asset('backend/images/faces/face5.jpg') }}" alt="image"><span class="online"></span></div>

                <div class="info">

                  <p>Madeline Kennedy</p>

                  <p>Available</p>

                </div>

                <small class="text-muted my-auto">5 min</small>

              </li>

              <li class="list">

                <div class="profile"><img src="{{ asset('backend/images/faces/face6.jpg') }}" alt="image"><span class="online"></span></div>

                <div class="info">

                  <p>Sarah Graves</p>

                  <p>Available</p>

                </div>

                <small class="text-muted my-auto">47 min</small>

              </li>

            </ul>

          </div>

          <!-- chat tab ends -->

        </div>

      </div>

      <!-- partial -->

      <!-- partial:partials/_sidebar.html -->

       @include('backoffice.layouts.leftbar')

      <!-- partial -->

      <div class="main-panel">

      @yield('content')

      <!-- main-panel ends -->
<!-- 
      <footer class="footer">

        <div class="d-sm-flex justify-content-center justify-content-sm-between">

          <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © {{date('Y')}}. {{ SITE_NAME }} All rights reserved.</span>

         

        </div>

      </footer>  -->

      <!-- partial -->

      </div>

    </div>   

    <!-- page-body-wrapper ends -->

  </div>

  <!-- container-scroller -->



  <!-- plugins:js -->

  <script src="{{ asset('backend/vendors/js/vendor.bundle.base.js') }}"></script>

  <!-- endinject -->

  <!-- Plugin js for this page -->

  <script src="{{ asset('backend/vendors/chart.js/Chart.min.js') }}"></script>

  <script src="{{ asset('backend/vendors/datatables.net/jquery.dataTables.js') }}"></script>

  <script src="{{ asset('backend/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>

  <script src="{{ asset('backend/js/dataTables.select.min.js') }}"></script>



  <!-- End plugin js for this page -->

  <!-- inject:js -->

  <script src="{{ asset('backend/js/off-canvas.js') }}"></script>

  <script src="{{ asset('backend/js/hoverable-collapse.js') }}"></script>

  <script src="{{ asset('backend/js/template.js') }}"></script>

  <script src="{{ asset('backend/js/settings.js') }}"></script>

  <script src="{{ asset('backend/js/todolist.js') }}"></script>

  <!-- endinject -->

  <!-- Custom js for this page-->

  <script src="{{ asset('backend/js/dashboard.js') }}"></script>

  <script src="{{ asset('backend/js/Chart.roundedBarCharts.js') }}"></script>

  <!-- End custom js for this page-->



  {{-- <script src="{{ asset('backend/js/custom.js') }}"></script> --}}

  <script src="{{ asset('backend/js/ajax_form_submit.js') }}"></script>

  <script>

    $(function() {

        let sSuccessMsg = "{{ Session::has('successMsg') ? Session::get('successMsg') : '' }}";

        let sAnyError = "{{ Session::has('failureMsg') ? Session::get('failureMsg') : '' }}";

        if (sAnyError != '' && sAnyError != undefined && sAnyError != null) {

            $('.failure').show();

            $('.failure').toast('show');

            $('.failure .toast-body').html(`${sAnyError}`);

        }

        if (sSuccessMsg != '' && sSuccessMsg != undefined && sSuccessMsg != null) {

            $('.success').show();

            $('.success').toast('show');

            $('.success .toast-body').html(`${sSuccessMsg}`);

        }

    });

</script>



@php
 $date = date("Y-m-d");
@endphp
<input type="hidden" id="current_date" name="current_date" value="{{$date}}">
<script>
function formatAMPM(date) {
  var hours = date.getHours();
  var minutes = date.getMinutes();
  var ampm = hours >= 12 ? 'pm' : 'am';
  hours = hours % 12;
  hours = hours ? hours : 12; // the hour '0' should be '12'
  minutes = minutes < 10 ? '0'+minutes : minutes;
  var strTime = hours + ':' + minutes;
  return strTime;
}

function formatAMPMUnit(date) {
  var hours = date.getHours();
  var minutes = date.getMinutes();
  var ampm = hours >= 12 ? 'pm' : 'am';
  var strTime = ampm;
  return strTime;
}

//check if record for current system date exists
var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = today.getFullYear();

system_date = yyyy + '-' + mm + '-' + dd;
current_date = document.getElementById("current_date").value;
//alert(system_date);

          $.ajax({
            url:"{{route('backofice.fetchUpcoming')}}",
            type: "POST",
            data: {
              ddate: system_date,
              _token: '{{csrf_token()}}' 
            },
            //dataType : 'json',
            success: function(result){
                  if(result !=0){
                    $("#ddddate").val(system_date);
                    $("#cccount").text(result);
                    $("#button_alert").click();
                  }
            }
            });



</script>

<button style="display: none;float: right;margin-top: -38px;border-radius: 6px;border-color: darkolivegreen;" data-toggle="modal" data-target="#myModal12345" id="button_alert">Add New Follow-Up</button>

           

</body>



</html>



