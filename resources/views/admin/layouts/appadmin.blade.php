
<!DOCTYPE html>
<html lang="en">

@include('admin.includes.adminheader')
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    @include('admin.includes.adminsidebar.navbar1')
   </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
     @include('admin.includes.adminsidebar.navbar2')
   </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-5 mb-4 mb-xl-0">
                  <h4 class="font-weight-bold">Hi, Welcomeback!</h4>
                  <h4 class="font-weight-normal mb-0">JustDo Dashboard,</h4>
                </div>
                <div class="col-12 col-xl-7">
                  <div class="d-flex align-items-center justify-content-between flex-wrap">
                    <div class="border-right pr-4 mb-3 mb-xl-0">
                      <p class="text-muted">Balance</p>
                      <h4 class="mb-0 font-weight-bold">$40079.60 M</h4>
                    </div>
                    <div class="border-right pr-4 mb-3 mb-xl-0">
                      <p class="text-muted">Today’s profit</p>
                      <h4 class="mb-0 font-weight-bold">$175.00 M</h4>
                    </div>
                    <div class="border-right pr-4 mb-3 mb-xl-0">
                      <p class="text-muted">Purchases</p>
                      <h4 class="mb-0 font-weight-bold">4006</h4>
                    </div>
                    <div class="pr-3 mb-3 mb-xl-0">
                      <p class="text-muted">Downloads</p>
                      <h4 class="mb-0 font-weight-bold">4006</h4>
                    </div>
                    <div class="mb-3 mb-xl-0">
                      <button class="btn btn-warning rounded-0 text-white">Downloads</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          @yield('content')
@include('admin.includes.adminfooter')

</div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{asset('backend/js/vendor.bundle.base.js')}}"></script>
  <script src="{{asset('backendjs/vendor.bundle.addons.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{asset('backend/js/off-canvas.js')}}"></script>
  <script src="{{asset('backend/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('backend/js/template.js')}}"></script>
  <script src="{{asset('backend/js/settings.js')}}"></script>
  <script src="{{asset('backend/js/todolist.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{asset('backend/js/dashboard.js')}}"></script>
 
 <script src="{{asset('backend/js/form-validation.js')}}"></script>
 <script src="{{asset('backend/js/bt-maxLength.js')}}"></script>
<script src="{{asset('backend/js/bootbox.min.js')}}"></script>
 @yield('scripts')
 <script>
    $(document).on("click", "#delete", function(e){
    e.preventDefault();
    var link = $(this).attr("href");
    bootbox.confirm("Do you really want to delete this element ?", function(confirmed){
      if (confirmed){
          window.location.href = link;
        };
      });
    });
  </script>


  <!-- End custom js for this page-->
</body>

</html>

