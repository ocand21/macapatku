@include('public.partials._head')
  @include('public.partials._navbar')
  @yield('banner')

  <div class="main-content">
    <div class="container">
      <div class="mag-inner">
        @yield('content')
        </div>
        @include('public.partials._sidebar')
        @yield('news')
      </div>
    </div>
    
  @include('public.partials._footer')

@include('public.partials._js')
