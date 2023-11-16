<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Register</title>
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
              @if ($message = Session::get('error'))
              <div class="alert alert-danger">
                <p>{{ $message }}</p>
              </div>
              @endif
              @if (count($errors) > 0)
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
              @endif
              <h3 class="card-title text-left mb-3">Register</h3>
              <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="username" id="username" class="form-control p_input">
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="email" id="email" class="form-control p_input">
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="password" id="password" class="form-control p_input">
                </div>
                <div class="form-group">
                  <label>Password Confirmed</label>
                  <input type="password" name="password confirmation" class="form-control p_input">
                </div>
                <div class="text-center mt-4">
                  <button type="submit" class="btn btn-primary btn-block enter-btn">Register</button>
                </div>
                <p class="sign-up text-center">Already have an Account?<a href="{{ route('login.form') }}"> Sign Up</a></p>
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