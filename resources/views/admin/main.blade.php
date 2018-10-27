@include('admin.partials._head')
  @include('admin.partials._navbar')
  <div id="wrapper">
  @include('admin.partials._sidebar')
    <div id="content-wrapper">
      <div class="container-fluid">
        @include('admin.partials._message')
        @yield('content')
      </div>
      @include('admin.partials._footer')
    </div>

  </div>
@include('admin.partials._js')
