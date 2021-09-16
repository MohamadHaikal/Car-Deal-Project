<!DOCTYPE html>
<html lang="en">

<head>
  <title>Register</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
      <div class="wrap-login100 ">
        <form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
          @csrf
          <span class="login100-form-title p-b-55">
            Sign Up
          </span>

          <span class="login100-form-title p-b-55">
            {{-- ### show message with all Errors ### --}}
            @if ($errors->any())
              <div class="alert alert-danger" role="alert">
                @foreach ($errors->all() as $error)
                  <p>{{ $error }}</p>
                @endforeach
              </div>
            @endif


          </span>



          {{-- first name --}}
          <div class="wrap-input100 validate-input m-b-16">
            <input id="first_name" type="text" class="input100 @error('first_name') is-invalid @enderror" name="first_name"
              value="{{ old('first_name') }}" required autocomplete="first_name" autofocus placeholder="First Name">
            @error('first_name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror

            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <span class="lnr lnr-user"></span>
            </span>
          </div>


          {{-- last name --}}
          <div class="wrap-input100 validate-input m-b-16">
            <input id="last_name" type="text" class="input100 @error('last_name') is-invalid @enderror" name="last_name"
              value="{{ old('last_name') }}" required autocomplete="last_name" autofocus placeholder="Last Name">
            @error('last_name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <span class="lnr lnr-user"></span>
            </span>
          </div>


          {{-- Username --}}
          <div class="wrap-input100 validate-input m-b-16">
            <input id="username" type="text" class="input100 @error('username') is-invalid @enderror" name="username"
              value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="UserName">
            @error('username')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <span class="lnr lnr-user"></span>
            </span>
          </div>


          {{-- phone --}}
          <div class="wrap-input100 validate-input m-b-16">
            <input id="phone" type="text" class="input100 @error('phone') is-invalid @enderror" name="phone"
              value="{{ old('phone') }}" required autocomplete="phone" autofocus placeholder="phone">
            @error('phone')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <span class="lnr lnr-phone-handset"></span>
            </span>
          </div>

          {{-- address --}}
          <div class="wrap-input100 validate-input m-b-16">
            <input id="address" type="text" class="input100 @error('address') is-invalid @enderror" name="address"
              value="{{ old('address') }}" autocomplete="address" autofocus placeholder="Address">
            @error('address')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <span class="lnr lnr-home"></span>
            </span>
          </div>


          <div class="wrap-input100 validate-input m-b-16">
            <input id="email" type="email" class="input100 @error('email') is-invalid @enderror" name="email"
              value="{{ old('email') }}" autocomplete="email" autofocus placeholder="Email">
            @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <span class="lnr lnr-envelope"></span>
            </span>
          </div>

          {{-- ########################## need update ########################### --}}
          {{-- photo --}}
          <div class="wrap-input100 validate-input m-b-16">
            <input type="file" name="photo" placeholder="image">
          </div>
          {{-- ##########################  end need update ########################### --}}

          {{-- password --}}
          <div class="wrap-input100 validate-input m-b-16">
            <input id="password" type="password" class="input100 @error('password') is-invalid @enderror"
              name="password" required autocomplete="new-password" placeholder="Password">
            @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <span class="lnr lnr-lock"></span>
            </span>
          </div>

          {{-- password-confirm --}}
          <div class="wrap-input100 validate-input m-b-16">
            <input id="password-confirm" type="password" class="input100" name="password_confirmation" required
              autocomplete="new-password" placeholder="Confirm Password">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <span class="lnr lnr-lock"></span>
            </span>
          </div>



          <div class="container-login100-form-btn p-t-25">
            <button class="login100-form-btn" type="submit">
              Sign Up
            </button>
          </div>



          <div class="text-center w-full pt-30">
            <span class="txt1">
              Already a member?
            </span>

            <a class="txt1 bo1 hov1" href="{{ route('login') }}">
              Sign in now
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
