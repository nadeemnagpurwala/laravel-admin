<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link" href="{{ url('/home') }}"
                ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard</a
            >
            <div class="sb-sidenav-menu-heading">Interface</div>
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts"
                ><div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                Content
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
            ></a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{ url('/page-configuration') }}">Pages</a>
                    <a class="nav-link" href="#">Blocks</a></nav>
            </div>
            <div class="sb-sidenav-menu-heading">Settings</div>
            <a class="nav-link" href="{{ url('/variable-configuration') }}"
                ><div class="sb-nav-link-icon"><i class="fas fa-cog"></i></div>
                System Variables</a
            >
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        {{ Auth::user()->name }}
    </div>
</nav>