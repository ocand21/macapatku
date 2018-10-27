@include('user.partials._head')
  <div class="page home-page">
    @include('user.partials._navbar')
    <div class="page-content d-flex align-items-stretch">
      @include('user.partials._sidebar')
        <div class="content-inner">
          @include('user.partials._message')
          @yield('content')
        </div>
    </div>
  </div>
@include('user.partials._js')
