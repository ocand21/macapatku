@include('user.partials._head')

  <div id="wrapper">
    @include('user.partials._navbar')
    @include('user.partials._sidebar')

    <div id="page-wrapper">
      @include('user.partials._message')
      <div class="container-fluid">
        @yield('content')
      </div>
    </div>

  </div>

@include('user.partials._js')
