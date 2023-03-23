
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Project  | Assignment</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('backend/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('backend/assets/vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{asset('backend/assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('backend/assets/images/favicon.ico"')}}">
  <link rel="stylesheet" href="{{asset('backend/vendors/simple-line-icons/css/simple-line-icon')}}s.css">
  <link rel="stylesheet" href="{{asset('backend/vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('backend/css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('backend/images/favicon.png')}}"/>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <p style="font-size: 100%"><span>Project</span> | <span style="color: #2711ea" style="font-size: 120%">Assignment</span></p>
              </div>
              <h4>Hello! let's get started</h4>
              <x-input-error :messages="$errors->get('email')" class="mt-2" />
              <form class="pt-3" action="{{ route('register') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name" :value="__('Name')">Enter Your Name</label>
                  <input id="name"  type="text" name="name" :value="old('name')" required autofocus class="form-control form-control-lg" placeholder="Name">
                  <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div class="form-group">
                    <label for="email" :value="__('Email')">Enter Email Address</label>
                  <input class="form-control form-control-lg" id="email" type="email" name="email" :value="old('email')" placeholder="exmple@gmail.com" required>
                  <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div class="form-group">
                    <label for="password" :value="__('Password')">Enter Password</label>
                  <input type="password"
                  name="password"
                  required autocomplete="new-password" class="form-control form-control-lg" placeholder="Password">
                  <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div class="form-group">
                    <label for="password_confirmation" :value="__('Confirm Password')">Confirm Password</label>
                  <input id="password_confirmation" 
                  type="password" name="password_confirmation" required class="form-control form-control-lg" placeholder="Confirm Password">
                  <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
                <div class="mb-4">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input"> I agree to all Terms & Conditions </label>
                  </div>
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                </div>
                <div class="text-center mt-4 fw-light">
                  Already have an account? <a href="{{url('/login')}}" class="text-primary">Log in</a>
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
  <script src="{{asset('backend/vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{asset('backend/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{asset('backend/js/off-canvas.js')}}"></script>
  <script src="{{asset('backend/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('backend/js/template.js')}}"></script>
  <script src="{{asset('backend/js/settings.js')}}"></script>
  <script src="{{asset('backend/js/todolist.js')}}"></script>
  <!-- endinject -->
</body>

</html>
