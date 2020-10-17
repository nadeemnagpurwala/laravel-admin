<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.admin-theme-header')
</head>
@guest
    <body class="bg-primary">
        <div id="app">
            <div id="layoutAuthentication">
                <div id="layoutAuthentication_content">
                    <main>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-5 pt-3">
                                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                                         @yield('content')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
                <div id="layoutAuthentication_footer">
                    @include('includes.admin-theme-footer')
                </div>
            </div>
        </div>
@else
    <body class="sb-nav-fixed">
        <div id="app">
            @include('includes.admin-theme-navbar')
            <div id="layoutSidenav">
                <div id="layoutSidenav_nav">
                    @include('includes.admin-theme-sidebar')
                </div>
                <div id="layoutSidenav_content">
                    <main>
                        @yield('content')
                    </main>
                    @include('includes.admin-theme-footer')
                </div>
            </div>
        </div>
@endguest
    </body>
</html>
