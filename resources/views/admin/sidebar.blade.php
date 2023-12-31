<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}"> <img alt="image" src="/admin/assets/img/logo.png" class="header-logo" /> <span
                    class="logo-name">Otika</span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown">
                <a href="{{ route('admin.dashboard') }}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            {{-- <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i
              data-feather="briefcase"></i><span>Widgets</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="widget-chart.html">Chart Widgets</a></li>
            <li><a class="nav-link" href="widget-data.html">Data Widgets</a></li>
          </ul>
        </li> --}}

            <li class="dropdown">
                <a href="{{ route('admin.categories.index') }}"><i data-feather="image"></i><span>Product
                        Category</span></a>
            </li>
            <li class="dropdown">
                <a href="{{ route('admin.products.index') }}"><i data-feather="sun"></i><span>Products</span></a>
            </li>
            <li class="dropdown">
                <a href="{{ route('admin.menu.index') }}"><i data-feather="sun"></i><span>Menu</span></a>
            </li>
            <li class="dropdown">
                <a href="{{ route('admin.banners.index') }}"><i data-feather="sun"></i><span>Banner</span></a>
            </li>
            <li class="dropdown">
                <a href="{{ route('admin.blogProducts.index') }}"><i data-feather="sun"></i><span>Blogs</span></a>
            </li>
            
        </ul>
    </aside>
</div>
