@include('user.partials._head')

    <div class="container-scroller">
        @include('user.partials._navbar')

        <div class="container-fluid page-body-wrapper">
            <div class="row row-offcanvas row-offcanvas-right">
                @include('user.partials._sidebar')

                <div class="content-wrapper">
                    @include('user.partials._message')
                    @yield('content')
                </div>

                @include('user.partials._footer')
            </div>
        </div>
    </div>

@include('user.partials._js')