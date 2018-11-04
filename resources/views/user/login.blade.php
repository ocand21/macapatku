@include('user.partials.login._head')
@section('title', 'Login Pengguna')
    
<div class="limiter">
<div class="container-login100">
  <div class="wrap-login100">
    <div class="login100-form-title" style="background-image: url(/users/login/images/bg-01.jpg);">
      <span class="login100-form-title-1">
        Mulai Menulis Artikel
      </span>
    </div>
    
    @include('user.partials.login._message')
    <form class="login100-form validate-form" action="{{route('login')}}" method="POST">
      {{csrf_field()}}

      <div class="wrap-input100 validate-input m-b-26" data-validate="Harap masukkan email">
        <span class="label-input100">E-mail</span>
        <input class="input100" type="email" name="email" placeholder="Masukkan Email">
        <span class="focus-input100"></span>
        @if ($errors->has('email'))
        <span class="invalid-feedback">
          <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif
      </div>
      
      <div class="wrap-input100 validate-input m-b-18" data-validate = "Harap masukkan password">
        <span class="label-input100">Password</span>
        <input class="input100" type="password" name="password" placeholder="Enter password">
        <span class="focus-input100"></span>
        @if ($errors->has('password'))
        <span class="invalid-feedback">
          <strong>{{ $errors->first('password') }}</strong>
        </span>
        @endif
      </div>

      <div class="flex-sb-m w-full p-b-30">
        <div class="contact100-form-checkbox">
          <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
          <label class="label-checkbox100" for="ckb1">
            Ingat Akun
          </label>
        </div>

        <div>
        <a href="{{ route('password.request')}}" class="txt1">
            Lupa Password?
          </a>
        </div>
      </div>

      <div class="container-login100-form-btn">
        <button class="login100-form-btn" type="submit">
          Login
        </button>
        <a href="{{route('register')}}" class="login100-form-btn">Register</a>
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
