<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name') }}</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('/assets/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendors/typicons/typicons.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendors/simple-line-icons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
        <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">

    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('/assets/images/btr-logo.png') }}" />
    
  </head>
  <style>
  .container-scroller {
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(to right, #4facfe, #00f2fe); /* Gradien hijau */
  }

  {{-- /* Card Form */ --}}
  .auth-form-light {
    background: #4f93c0;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    padding: 30px;
    text-align: center;
  }

  .auth-form-light h4 {
    color: #333;
    font-size: 1.8rem;
    margin-bottom: 10px;
  }

  .auth-form-light h6 {
    color: #555;
    font-weight: 400;
    margin-bottom: 20px;
  }

  .form-control {
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 10px;
  }

  .form-control:focus {
    border-color: #5079b6;
    box-shadow: 0 0 5px rgba(76, 130, 175, 0.5);
  }

  {{-- /* Tombol */ --}}
  .auth-form-btn {
    background-color: #48709e;
    border: none;
    border-radius: 8px;
    font-size: 1.1rem;
    padding: 10px;
    transition: background-color 0.3s ease;
  }

  .auth-form-btn:hover {
    background-color: #6283be;
  }
{{-- 
  /* Logo */ --}}
  .brand-logo img {
    display: block;
    margin: 0 auto 20px;
    max-width: 100px;
  }
</style>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
          <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                <div class="brand-logo">
                  <img src="{{ asset('/assets/images/btr.jpg') }}" alt="logo">
                </div>
                <h4>Sistem Informasi Absensi Guru</h4>
                <h6 class="fw-light">Sign in to continue.</h6>
                <form action="{{ route('login.authenticate') }}" class="pt-3" method="POST">
                  @csrf
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username" name="username">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="password">
                  </div>
                  <div class="mt-3 d-grid gap-2">
                    <button type="submit" class="btn btn-block btn-primary btn-lg fw-medium auth-form-btn" >SIGN IN</button>
                  </div>
                
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('/assets/js/template.js') }}"></script>
    <script src="{{ asset('/assets/js/settings.js') }}"></script>
    <script src="{{ asset('/assets/js/settings.js') }}"></script>
    <script src="{{ asset('../../assets/js/settings.js') }}"></script>
    <!-- endinject -->
  </body>
</html>