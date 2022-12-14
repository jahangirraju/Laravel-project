<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="profile-image"> <img src="/images/faces/face4.jpg" alt="image" /> <span
                        class="online-status online"></span> </div>
                <div class="profile-name">
                    <p class="name">Richard V.Welsh</p>
                    <p class="designation">Manager</p>
                    <div class="badge badge-teal mx-auto mt-3">Online</div>
                </div>
            </div>
        </li>
        <li class="nav-item"><a class="nav-link" href="{{ route('admin.index') }}"><img class="menu-icon"
                    src="/images/menu_icons/01.png" alt="menu icon"><span class="menu-title">Dashboard</span></a></li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false"
                aria-controls="general-pages"> <img class="menu-icon" src="/images/menu_icons/08.png" alt="menu icon">
                <span class="menu-title">Manage Products</span><i class="menu-arrow"></i></a>
            <div class="collapse" id="general-pages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.products.index') }}">Manage
                            Products</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.attributes.index') }}">Manage
                            Attributes</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.shelfs.index') }}">Manage Shelfs</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.units.index') }}">Manage Units</a>
                    </li>

                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#category-pages" aria-expanded="false"
                aria-controls="general-pages"> <img class="menu-icon" src="/images/menu_icons/08.png" alt="menu icon">
                <span class="menu-title">Manage Category</span><i class="menu-arrow"></i></a>
            <div class="collapse" id="category-pages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.categories.index') }}">Manage
                            Category</a></li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
