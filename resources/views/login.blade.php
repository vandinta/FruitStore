<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login</title>
  <link rel="stylesheet" href="{{ asset('assets/corona/template/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/corona/template/assets/vendors/css/vendor.bundle.base.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/corona/template/assets/css/style.css') }}">
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="row w-100 m-0">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
          <div class="card col-lg-4 mx-auto">
            <div class="card-body px-5 py-5">
              @if ($message = Session::get('success'))
              <div class="alert alert-success">
                <p>{{ $message }}</p>
              </div>
              @endif
              @if ($message = Session::get('error'))
              <div class="alert alert-danger">
                <p>{{ $message }}</p>
              </div>
              @endif
              @if ($message = Session::get('belum_login'))
              <div class="alert alert-danger">
                <p>{{ $message }}</p>
              </div>
              @endif
              <h3 class="card-title text-left mb-3">Login</h3>
              <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="email" id="email" class="form-control p_input">
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="password" id="password" class="form-control p_input">
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
                </div>
                <p class="sign-up">Don't have an Account?<a href="{{ route('register.form') }}"> Sign Up</a></p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('assets/corona/template/assets/vendors/js/vendor.bundle.base.js') }}"></script>
  <script src="{{ asset('assets/corona/template/assets/js/off-canvas.js') }}"></script>
  <script src="{{ asset('assets/corona/template/assets/js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('assets/corona/template/assets/js/misc.js') }}"></script>
  <script src="{{ asset('assets/corona/template/assets/js/settings.js') }}"></script>
  <script src="{{ asset('assets/corona/template/assets/js/todolist.js') }}"></script>
</body>

</html>