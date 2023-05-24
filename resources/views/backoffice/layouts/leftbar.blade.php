<style>
  .sidebar .nav .nav-item.active > .nav-link {
    background: #f2c103 !important;
}
#settings-trigger{
      background: #f2c103 !important;
      display: none;
}
</style>
<nav class="sidebar sidebar-offcanvas" id="sidebar">

  <ul class="nav">

    <li class="nav-item" id="leftDashboard">

      <a class="nav-link" href="{{ url('backoffice/dashboard') }}">

        <i class="fa fa-dashboard"></i>

        <span class="menu-title" style="margin: 5px;">Dashboard</span>

      </a>

    </li>

    <li class="nav-item" id="leftUsers">

      <a class="nav-link" href="{{ url('backoffice/create-lead') }}">

        <i class="fa fa-address-book"></i>

        <span class="menu-title" style="margin: 5px;">Create New Lead</span>

      </a>

    </li>

    <!-- <li class="nav-item" id="leftPropertyEnquiry">

      <a class="nav-link" href="{{ url('admin/propertyenquiry-list') }}">

        <i class="icon-head menu-icon"></i>

        <span class="menu-title">Property List Enquiries</span>

      </a>

    </li>

    <li class="nav-item" id="leftAgentEnquiry">

      <a class="nav-link" href="{{ url('admin/agent-list') }}">

        <i class="icon-head menu-icon"></i>

        <span class="menu-title">Manage Agents</span>

      </a>

    </li>

    test

    <li class="nav-item" id="leftContactEnquiry">

      <a class="nav-link" href="{{ url('admin/contact-list') }}">

        <i class="icon-head menu-icon"></i>

        <span class="menu-title">Manage Contact Enquiries</span>

      </a>

    </li>

    <li class="nav-item" id="leftCreateBlog">

      <a class="nav-link" href="{{ url('admin/create-blog') }}">

        <i class="icon-head menu-icon"></i>

        <span class="menu-title">Create Blog</span>

      </a>

    </li>

    <li class="nav-item" id="leftCreateSocialLinks">

      <a class="nav-link" href="{{ url('admin/create-sociallinks') }}">

        <i class="icon-head menu-icon"></i>

        <span class="menu-title">Manage Social Links</span>

      </a>

    </li>


    <li class="nav-item" id="leftManageHouseRules">

      <a class="nav-link" href="{{ url('admin/manage-houserules') }}">

        <i class="icon-head menu-icon"></i>

        <span class="menu-title">Manage House Rules</span>

      </a>

    </li>

    <li class="nav-item" id="leftManageCms">

      <a class="nav-link" href="{{ url('admin/manage-cms') }}">

        <i class="icon-head menu-icon"></i>

        <span class="menu-title">Manage CMS</span>

      </a>

    </li>
    
    <li class="nav-item" id="leftManageTestimonial">

      <a class="nav-link" href="{{ url('admin/manage-testimonial') }}">

        <i class="icon-head menu-icon"></i>

        <span class="menu-title">Manage Testimonial</span>

      </a>

    </li>

    <li class="nav-item" id="leftManageTestimonial">

      <a class="nav-link" href="#">

        <i class="icon-head menu-icon"></i>

        <span class="menu-title">Manage Permissions</span>

      </a>

    </li> -->

    <script>

         $(function(){

           setTimeout(() => {

            $('.nav-item').removeClass('active');

            let sSegment1 = '{{ Request::segment(1) }}';

            let sSegment2 = '{{ Request::segment(2) }}';

            let sCURL = sSegment1+'/'+sSegment2;

            if(sCURL=='admin/dashboard') {

                $('#leftDashboard').addClass('active');

            }else if(sCURL=='admin/manage-houserules') {

                $('#leftManageHouseRules').addClass('active');

            }else if(sCURL=='admin/manage-cms') {

                $('#leftManageCms').addClass('active');

            }else if(sCURL=='admin/manage-testimonial') {

                $('#leftManageTestimonial').addClass('active');

            }else if(sCURL=='admin/users-list') {

                $('#leftUsers').addClass('active');

            }else if(sCURL=='admin/propertyenquiry-list') {

                $('#leftPropertyEnquiry').addClass('active');

            }else if(sCURL=='admin/agent-list') {

                $('#leftAgentEnquiry').addClass('active');

            }else if(sCURL=='admin/contact-list') {

                $('#leftContactEnquiry').addClass('active');

            }else if(sCURL=='admin/create-blog') {

                $('#leftCreateBlog').addClass('active');

            }else if(sCURL=='admin/create-sociallinks') {

                $('#leftCreateSocialLinks').addClass('active');

            } else if(sCURL=='admin/edit-event' || sCURL=='admin/add-event' || sCURL=='admin/events-list') {

                $('#leftEvents').addClass('active');

            } else if(sCURL=='admin/edit-cms-page' || sCURL=='admin/add-cms-page' || sCURL=='admin/cms-page-list') {

                $('#leftCMS').addClass('active');

            }

            else if(sCURL=='admin/edit-banner' || sCURL=='admin/add-banner' || sCURL=='admin/banners-list') {

                $('#leftBanners').addClass('active');

            }

           }, 100);

             

         });

    </script>

    {{-- <li class="nav-item">

      <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">

        <i class="icon-layout menu-icon"></i>

        <span class="menu-title">UI Elements</span>

        <i class="menu-arrow"></i>

      </a>

      <div class="collapse" id="ui-basic">

        <ul class="nav flex-column sub-menu">

          <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>

          <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>

          <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>

        </ul>

      </div>

    </li>

    <li class="nav-item">

      <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">

        <i class="icon-columns menu-icon"></i>

        <span class="menu-title">Form elements</span>

        <i class="menu-arrow"></i>

      </a>

      <div class="collapse" id="form-elements">

        <ul class="nav flex-column sub-menu">

          <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Basic Elements</a></li>

        </ul>

      </div>

    </li>

    <li class="nav-item">

      <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">

        <i class="icon-bar-graph menu-icon"></i>

        <span class="menu-title">Charts</span>

        <i class="menu-arrow"></i>

      </a>

      <div class="collapse" id="charts">

        <ul class="nav flex-column sub-menu">

          <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">ChartJs</a></li>

        </ul>

      </div>

    </li>

    <li class="nav-item">

      <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">

        <i class="icon-grid-2 menu-icon"></i>

        <span class="menu-title">Tables</span>

        <i class="menu-arrow"></i>

      </a>

      <div class="collapse" id="tables">

        <ul class="nav flex-column sub-menu">

          <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Basic table</a></li>

        </ul>

      </div>

    </li>

    <li class="nav-item">

      <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">

        <i class="icon-contract menu-icon"></i>

        <span class="menu-title">Icons</span>

        <i class="menu-arrow"></i>

      </a>

      <div class="collapse" id="icons">

        <ul class="nav flex-column sub-menu">

          <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Mdi icons</a></li>

        </ul>

      </div>

    </li>

    <li class="nav-item">

      <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">

        <i class="icon-head menu-icon"></i>

        <span class="menu-title">User Pages</span>

        <i class="menu-arrow"></i>

      </a>

      <div class="collapse" id="auth">

        <ul class="nav flex-column sub-menu">

          <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>

          <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>

        </ul>

      </div>

    </li>

    <li class="nav-item">

      <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">

        <i class="icon-ban menu-icon"></i>

        <span class="menu-title">Error pages</span>

        <i class="menu-arrow"></i>

      </a>

      <div class="collapse" id="error">

        <ul class="nav flex-column sub-menu">

          <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>

          <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>

        </ul>

      </div>

    </li>

    <li class="nav-item">

      <a class="nav-link" href="pages/documentation/documentation.html">

        <i class="icon-paper menu-icon"></i>

        <span class="menu-title">Documentation</span>

      </a>

    </li> --}}

  </ul>

</nav>