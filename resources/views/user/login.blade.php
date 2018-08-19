@include('user.partials.login._head')

<div class="limiter">
<div class="container-login100">
  <div class="wrap-login100">
    <div class="login100-form-title" style="background-image: url(/users/login/images/bg-01.jpg);">
      <span class="login100-form-title-1">
        Mulai Menulis Artikel
      </span>
    </div>

    <form class="login100-form validate-form" action="{{route('login')}}" method="POST">
      {{csrf_field()}}

      <div class="wrap-input100 validate-input m-b-26" data-validate="Harap masukkan email">
        <span class="label-input100">E-mail</span>
        <input class="input100" type="email" name="email" placeholder="Masukkan Email">
        <span class="focus-input100"></span>
      </div>

      <div class="wrap-input100 validate-input m-b-18" data-validate = "Harap masukkan password">
        <span class="label-input100">Password</span>
        <input class="input100" type="password" name="password" placeholder="Enter password">
        <span class="focus-input100"></span>
      </div>

      <div class="flex-sb-m w-full p-b-30">
        <div class="contact100-form-checkbox">
          <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
          <label class="label-checkbox100" for="ckb1">
            Remember me
          </label>
        </div>

        <div>
          <a href="#" class="txt1">
            Forgot Password?
          </a>
        </div>
      </div>

      <div class="container-login100-form-btn">
        <button class="login100-form-btn" type="submit">
          Login
        </button>
      </div>
    </form>
  </div>
</div>
</div>



@include('user.partials.login._js')
