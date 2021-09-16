<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!--===============================================================================================-->
  <link rel="icon" type="image/png" href="img/favicon.png" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/icon-font.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/animate.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/hamburgers.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/select2.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link href="https://fonts.googleapis.com/css?family=Mina" rel="stylesheet">
  <!--===============================================================================================-->
</head>

<body>

  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
          @csrf

          <div class="text-center w-full ">
            <span class="txt1">
              {{-- ### show message for operation success ### --}}
              @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                  {{ Session::get('success') }}
                </div>
              @endif

            </span>
          </div>

          <span class="login100-form-title p-b-55">
            Sign in
          </span>

          <div class="wrap-input100 validate-input m-b-16" data-validate="Valid email is required: ex@abc.xyz">
            {{-- <input class="input100" type="text" name="email" placeholder="Email"> --}}
            <input id="email" type="email" class="input100 @error('email') is-invalid @enderror" name="email"
              value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <span class="lnr lnr-envelope"></span>
            </span>

          </div>

          {{-- check for errors --}}
          @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror


          <div class="wrap-input100 validate-input m-b-16" data-validate="Password is required">
            {{-- <input class="input100" type="password" name="pass" placeholder="Password"> --}}
            <input id="password" type="password" class="input100 @error('password') is-invalid @enderror"
              name="password" required autocomplete="current-password" placeholder="Password">

            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <span class="lnr lnr-lock"></span>
            </span>
          </div>

          @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror


          <div class="container-login100-form-btn p-t-25">
            <button type="submit" class="login100-form-btn">
              Login
            </button>
          </div>



          <div class="text-center w-full pt-30">
            <span class="txt1">
              Not a member?
            </span>

            <a class="txt1 bo1 hov1" href="{{ route('register') }}">
              Sign up now
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>




  <!--===============================================================================================-->
  <script src="js/vendor/jquery-2.2.4.min.js"></script>
  <!--===============================================================================================-->
  <script src="js/popper.js"></script>
  <script src="js/vendor/bootstrap.min.js"></script>
  <!--===============================================================================================-->
  <script src="js/select2.min.js"></script>
  <!--===============================================================================================-->
  <script src="js/main.js"></script>

</body>

</html>
