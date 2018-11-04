@include('user.partials.login._head')
@section('title', 'Login Pengguna')
    
<div class="limiter">
<div class="container-login100">
  <div class="wrap-login100">
    <div class="login100-form-title" style="background-image: url(/users/login/images/bg-01.jpg);">
      <span class="login100-form-title-1">
        Reset Password
      </span>
    </div>
    
    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

    @include('user.partials.login._message')
    <form class="login100-form validate-form" action="{{ route('password.request') }}" method="POST">
      {{csrf_field()}}
      <input type="hidden" name="token" value="{{ $token }}">
      <div class="wrap-input100 validate-input m-b-26" data-validate="Harap masukkan email">
        <span class="label-input100">E-mail Anda</span>
        <input class="input100{{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" name="email" value="{{ $email ?? old('email') }}" readonly>
        <span class="focus-input100"></span>
        @if ($errors->has('email'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif
      </div>

      <div class="wrap-input100 validate-input m-b-18" data-validate = "Harap masukkan password">
        <span class="label-input100">Password Baru</span>
        <input class="input100{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password" placeholder="Enter password" autofocus required>
        <span class="focus-input100"></span>
        @if ($errors->has('password'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
        @endif
      </div>

      <div class="wrap-input100 validate-input m-b-18" data-validate = "Harap masukkan password">
        <span class="label-input100">Konfirmasi Password Baru</span>
        <input class="input100{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password_confirmation" required placeholder="Konfirmasi Password">
        <span class="focus-input100"></span>
      </div>
      
      
      <div class="container-login100-form-btn">
        <button class="login100-form-btn" type="submit">
          Reset Password
        </button>
      </div>

      

    </form>
    <hr>
    <h5 align="center">Login atau daftar dengan</h5>
    <div class="login100-form" >

        
          <div class="btn btn-light btn-lg">
            <a href="{{url('/user/auth/google')}}" style="text-transform: none;">
              <span><img src="{{asset('users/login/images/icons/glogo.png')}}" alt="" width="20px">  Google</span>
            </a>
          </div>
          <div class="btn btn-light btn-lg">
            <a href="{{url('/user/auth/google')}}" style="text-transform: none;">
              <span><img src="{{asset('users/login/images/icons/fbicon.png')}}" alt="" width="20px">  Facebook</span>
            </a>
          </div>
          <div class="btn btn-light btn-lg">
            <a href="{{url('/user/auth/google')}}" style="text-transform: none;">
              <span><img src="{{asset('users/login/images/icons/twtlogo.png')}}" alt="" width="20px">  Twitter</span>
            </a>
          </div>
        

    </div>

  </div>
</div>
</div>



@include('user.partials.login._js')
