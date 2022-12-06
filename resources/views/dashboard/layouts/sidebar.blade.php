<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
                    <span data-feather="monitor" class="align-text-bottom"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/products') ? 'active' : '' }}" href="/dashboard/products">
                    <span data-feather="layers" class="align-text-bottom"></span>
                    Products
                </a>
            </li>
        </ul>
    </div>
</nav>