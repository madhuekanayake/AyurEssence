<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.urbanui.com/melody/template/pages/samples/login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:08:53 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Ayur Essence</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('AdminArea/vendors/iconfonts/font-awesome/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('AdminArea/vendors/css/vendor.bundle.base.css') }}">
  <link rel="stylesheet" href="{{ asset('AdminArea/vendors/css/vendor.bundle.addons.css') }}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('AdminArea/css/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('AdminArea/images/favicon.png') }} ">
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">

              <h4>Welcome back Ayur Essence!</h4>
              <h6 class="font-weight-light">Happy to see you again!</h6>
              <form class="pt-3" action="{{ route('AdminLogin.login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail">E Mail</label>
                    <div class="input-group">
                        <div class="input-group-prepend bg-transparent">
                            <span class="input-group-text bg-transparent border-right-0">
                                <i class="fa fa-user text-primary"></i>
                            </span>
                        </div>
                        <input type="email" name="email" class="form-control form-control-lg border-left-0" id="exampleInputEmail" placeholder="Email" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword">Password</label>
                    <div class="input-group">
                        <div class="input-group-prepend bg-transparent">
                            <span class="input-group-text bg-transparent border-right-0">
                                <i class="fa fa-lock text-primary"></i>
                            </span>
                        </div>
                        <input type="password" name="password" class="form-control form-control-lg border-left-0" id="exampleInputPassword" placeholder="Password" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="userRole">User Role</label>
                    <div class="input-group">
                        <div class="input-group-prepend bg-transparent">
                            <span class="input-group-text bg-transparent border-right-0">
                                <i class="fa fa-user-tag text-primary"></i>
                            </span>
                        </div>
                        <select class="form-control form-control-lg border-left-0" id="userRole" name="role" required>
                            <option value="" disabled selected>Select Role</option>
                            <option value="admin">Admin</option>

                        </select>
                    </div>
                </div>
                <div class="my-2">
                    @if ($errors->has('error'))
                        <div class="alert alert-danger">
                            {{ $errors->first('error') }}
                        </div>
                    @endif
                </div>
                <div class="my-3">
                    <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">LOGIN</button>
                </div>
            </form>

            </div>
          </div>
          <div class="col-lg-6 login-half-bg d-flex flex-row">
            <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2025 Ayur Essence.</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{ asset('AdminArea/vendors/js/vendor.bundle.base.js') }}"></script>
  <script src="{{ asset('AdminArea/vendors/js/vendor.bundle.addons.js') }}"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{ asset('AdminArea/js/off-canvas.js') }}"></script>
  <script src="{{ asset('AdminArea/js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('AdminArea/js/misc.js') }}"></script>
  <script src="{{ asset('AdminArea/js/settings.js') }}"></script>
  <script src="{{ asset('AdminArea/js/todolist.js') }}"></script>
  <!-- endinject -->
</body>


<!-- Mirrored from www.urbanui.com/melody/template/pages/samples/login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:08:53 GMT -->
</html>
