<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="adminHMD professional admin dashboard template">
    <title>Dashboard | adminHMD</title>

    <link rel="stylesheet" href="{{ asset('../css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('../css/style.css') }}">
</head>

<body>
<div class="admin-shell">
    <div class="sidebar-backdrop" data-sidebar-close></div>

    <aside class="admin-sidebar" id="adminSidebar" aria-label="Main navigation">
        <div class="sidebar-header">
            <a class="brand-mark" href="{{ route('dashboard') }}" aria-label="adminHMD dashboard">
                <span class="brand-icon"><i class="bi bi-grid-1x2-fill" aria-hidden="true"></i></span>
                <span class="brand-copy">
            <span class="brand-title">AWFAR</span>
            <span class="brand-subtitle">Admin DashBoard</span>
          </span>
            </a>
        </div>

        <nav class="sidebar-nav">
            <a class="nav-link active" href="{{ route('dashboard') }}" aria-current="page">
                <span class="nav-icon"><i class="bi bi-speedometer2" aria-hidden="true"></i></span>
                <span class="nav-text">Dashboard</span>
            </a>

            <a class="nav-link" href="{{ route('user.index') }}">
                <span class="nav-icon"><i class="bi bi-people-fill" aria-hidden="true"></i></span>
                <span class="nav-text">Users</span>
            </a>

            <a class="nav-link" href="{{ route('products.index') }}">
                <span class="nav-icon"><i class="bi bi-box-seam" aria-hidden="true"></i></span>
                <span class="nav-text">Products</span>
            </a>

            <a class="nav-link" href="{{ route('categories.index') }}">
                <span class="nav-icon"><i class="bi bi-tags" aria-hidden="true"></i></span>
                <span class="nav-text">Category</span>
            </a>

            <a class="nav-link" href="{{ route('banners.index') }}">
                <span class="nav-icon"><i class="bi bi-image" aria-hidden="true"></i></span>
                <span class="nav-text">Banners</span>
            </a>

            <a class="nav-link" href="{{ route('brands.index') }}">
                <span class="nav-icon"><i class="bi bi-building" aria-hidden="true"></i></span>
                <span class="nav-text">Brands</span>
            </a>

            <a class="nav-link" href="{{ route('cities.index') }}">
                <span class="nav-icon"><i class="bi bi-geo-alt" aria-hidden="true"></i></span>
                <span class="nav-text">City</span>
            </a>

            <a class="nav-link" href="{{ route('order.index') }}">
                <span class="nav-icon"><i class="bi bi-box-seam"></i></span>
                <span class="nav-text">Orders</span>
            </a>

            <!-- Pages dropdown -->
            <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#pagesMenu" role="button" aria-expanded="false" aria-controls="pagesMenu">
                <div>
                    <span class="nav-icon"><i class="bi bi-files" aria-hidden="true"></i></span>
                    <span class="nav-text">Pages</span>
                </div>
                <i class="bi bi-caret-down"></i>
            </a>
            <div class="collapse" id="pagesMenu">
                <a class="nav-link ms-4" href="{{ route('about.index') }}">
                    <span class="nav-icon"><i class="bi bi-info-circle" aria-hidden="true"></i></span>
                    <span class="nav-text">About</span>
                </a>
                <a class="nav-link ms-4" href="">
                    <span class="nav-icon"><i class="bi bi-file-text" aria-hidden="true"></i></span>
                    <span class="nav-text">Terms</span>
                </a>
            </div>

            <a class="nav-link" href="settings.html">
                <span class="nav-icon"><i class="bi bi-gear" aria-hidden="true"></i></span>
                <span class="nav-text">Settings</span>
            </a>
        </nav>


        <div class="sidebar-footer">
            <span class="status-dot"></span>
            <span class="sidebar-footer-text">System running smoothly</span>
        </div>
    </aside>

    <div class="admin-main">
        <nav class="navbar admin-navbar navbar-expand bg-white">
            <div class="container-fluid px-3 px-lg-4">
                <button class="sidebar-toggle" type="button" data-sidebar-toggle aria-controls="adminSidebar" aria-expanded="true" aria-label="Toggle sidebar">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

                <form class="d-none d-md-flex ms-3 flex-grow-1" role="search">
                    <input class="form-control search-input" type="search" placeholder="Search users, orders, reports" aria-label="Search">
                </form>

                <div class="navbar-actions ms-auto">
                    <button class="icon-button theme-toggle" type="button" data-theme-toggle aria-label="Switch color theme" title="Switch color theme">
                        <i class="bi bi-moon-stars" data-theme-icon aria-hidden="true"></i>
                    </button>
                    <div class="dropdown">
                        <button class="icon-button" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Notifications">
                            <span class="notification-dot"></span>
                            <i class="bi bi-bell" aria-hidden="true"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end notification-menu">
                            <div class="dropdown-header fw-bold text-body">Notifications</div>
                            <a class="dropdown-item" href="users.html">
                                <span class="notification-title">New user registered</span>
                                <span class="notification-time">4 minutes ago</span>
                            </a>
                            <a class="dropdown-item" href="charts.html">
                                <span class="notification-title">Revenue target reached</span>
                                <span class="notification-time">32 minutes ago</span>
                            </a>
                            <a class="dropdown-item" href="settings.html">
                                <span class="notification-title">Security review completed</span>
                                <span class="notification-time">1 hour ago</span>
                            </a>
                        </div>
                    </div>

                    <div class="dropdown">
                        <button class="profile-button dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img class="avatar-img avatar-sm" src="../assets/images/avatar/avatar.jpg" alt="Admin Hasan">
                            <span class="profile-name d-none d-sm-inline">Admin Hasan</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="profile.html">Profile</a></li>
                            <li><a class="dropdown-item" href="settings.html">Account settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="login.html">Sign out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        @yield('content')

        <footer class="admin-footer">
            <div class="container-fluid px-3 px-lg-4">
                <span>Copyright 2026 Awfar. <br> Developed by <a target="_blank" class="fw-bold text-success" href="">KHALED FARAG..</a>  </span>
                <span>Professional dashboard template.</span>
            </div>
        </footer>
    </div>
</div>

<script src=" {{ asset('../js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('../js/main.js') }}"></script>
</body>
</html>
