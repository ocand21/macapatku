@include('user.partials.login._head')
@section('title', 'Daftar Baru')
<div class="limiter">
<div class="container-login100">
  <div class="wrap-login100">
    <div class="login100-form-title" style="background-image: url(/users/login/images/bg-01.jpg);">
      <span class="login100-form-title-1">
        Daftar Untuk Menulis Artikel
      </span>
    </div>

    <form class="login100-form validate-form" action="{{url('/user/register')}}" method="POST">
      {{csrf_field()}}
      <div class="wrap-input100 validate-input m-b-26" data-validate="Harap masukkan nama">
        <span class="label-input100">Nama Lengkap</span>
        <input class="input100" type="text" name="name" placeholder="Masukkan Nama">
        <span class="focus-input100"></span>
      </div>

      <div class="wrap-input100 validate-input m-b-26" data-validate="Harap masukkan email">
        <span class="label-input100">E-mail</span>
        <input class="input100" type="email" name="email" placeholder="Masukkan Email">
        <span class="focus-input100"></span>
      </div>

      <div class="wrap-input100 validate-input m-b-18" data-validate = "Harap masukkan password">
        <span class="label-input100">Password</span>
        <input class="input100" type="password" name="password" placeholder="Masukkan password">
        <span class="focus-input100"></span>
      </div>

      <div class="wrap-input100 validate-input m-b-18" data-validate = "Harap masukkan kembali password">
        <span class="label-input100">Konfirmasi Password</span>
        <input class="input100" type="password" name="password_confirmation" placeholder="Masukkan kembali password">
        <span class="focus-input100"></span>
      </div>


      <div class="container-login100-form-btn">
        <button class="login100-form-btn" type="submit">
          Daftar
        </button>
        <a href="{{route('login')}}" class="login100-form-btn">Login</a>
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
