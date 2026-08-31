<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}"
      dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="adminHMD professional admin dashboard template">

    <title>
        {{ __('messages.dashboard') }}
        | AWFAR
    </title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <link rel="stylesheet"
          href="{{ asset('vendors/bootstrap-icons/bootstrap-icons.css') }}">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @if(app()->getLocale() === 'ar')
        <style>
            body {
                direction: rtl;
                text-align: right;
            }

            .admin-sidebar {
                right: 0;
                left: auto;
            }

            .admin-main {
                margin-left: 0;
                margin-right: var(--sidebar-width);
            }

            .sidebar-toggle {
                margin-left: 0;
                margin-right: 0;
            }

            .navbar-actions {
                margin-left: 0 !important;
                margin-right: auto;
            }

            .search-input {
                text-align: right;
            }

            .pages-submenu .page-child {
                margin-left: 0;
                margin-right: 1.5rem;
            }

            @media (max-width: 991.98px) {

                .admin-main {
                    margin-right: 0;
                }

            }
        </style>
    @endif

</head>

<body>

<div class="admin-shell">

    <div class="sidebar-backdrop"
         data-sidebar-close>
    </div>


    <!-- =========================
         Sidebar
    ========================== -->

    <aside class="admin-sidebar"
           id="adminSidebar"
           aria-label="Main navigation">


        <!-- Sidebar Header -->

        <div class="sidebar-header">

            <a class="brand-mark"
               href="{{ route('dashboard',['locale' => app()->getLocale()]) }}"
               aria-label="AWFAR dashboard">

                <span class="brand-icon">
                    <i class="bi bi-grid-1x2-fill"></i>
                </span>

                <span class="brand-copy">

                    <span class="brand-title">
                        {{ __("messages.brand_title") }}
                    </span>

                    <span class="brand-subtitle">
                        {{ __("messages.admin_dashboard") }}
                    </span>

                </span>

            </a>

        </div>


        <!-- Sidebar Navigation -->

        <nav class="sidebar-nav">


            <!-- Dashboard -->

            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
               href="{{ route('dashboard', ['locale' => app()->getLocale()]) }}">

                <span class="nav-icon">
                    <i class="bi bi-speedometer2"></i>
                </span>

                <span class="nav-text">
                    {{ __('messages.dashboard') }}
                </span>

            </a>


            <!-- Users -->

            <a class="nav-link {{ request()->routeIs('user.*') ? 'active' : '' }}"
               href="{{ route('user.index',['locale' => app()->getLocale()]) }}">

                <span class="nav-icon">
                    <i class="bi bi-people-fill"></i>
                </span>

                <span class="nav-text">
                    {{ __('messages.users') }}
                </span>

            </a>


            <!-- Products -->

            <a class="nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}"
               href="{{ route('products.index',['locale' => app()->getLocale()]) }}">

                <span class="nav-icon">
                    <i class="bi bi-box-seam"></i>
                </span>

                <span class="nav-text">
                    {{ __('messages.products') }}
                </span>

            </a>


            <!-- Categories -->

            <a class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}"
               href="{{ route('categories.index',['locale' => app()->getLocale()]) }}">

                <span class="nav-icon">
                    <i class="bi bi-tags"></i>
                </span>

                <span class="nav-text">
                    {{ __('messages.categories') }}
                </span>

            </a>


            <!-- Banners -->

            <a class="nav-link {{ request()->routeIs('banners.*') ? 'active' : '' }}"
               href="{{ route('banners.index',['locale' => app()->getLocale()]) }}">

                <span class="nav-icon">
                    <i class="bi bi-image"></i>
                </span>

                <span class="nav-text">
                    {{ __('messages.banners') }}
                </span>

            </a>


            <!-- Brands -->

            <a class="nav-link {{ request()->routeIs('brands.*') ? 'active' : '' }}"
               href="{{ route('brands.index',['locale' => app()->getLocale()]) }}">

                <span class="nav-icon">
                    <i class="bi bi-building"></i>
                </span>

                <span class="nav-text">
                    {{ __('messages.brands') }}
                </span>

            </a>


            <!-- Cities -->

            <a class="nav-link {{ request()->routeIs('cities.*') ? 'active' : '' }}"
               href="{{ route('cities.index',['locale' => app()->getLocale()]) }}">

                <span class="nav-icon">
                    <i class="bi bi-geo-alt"></i>
                </span>

                <span class="nav-text">
                    {{ __('messages.cities') }}
                </span>

            </a>


            <!-- Orders -->

            <a class="nav-link {{ request()->routeIs('order.*') ? 'active' : '' }}"
               href="{{ route('order.index',['locale' => app()->getLocale()]) }}">

                <span class="nav-icon">
                    <i class="bi bi-cart-check"></i>
                </span>

                <span class="nav-text">
                    {{ __('messages.orders') }}
                </span>

            </a>


            <!-- =========================
                 Pages
            ========================== -->

            <div class="pages-wrapper">


                <button
                    type="button"
                    class="nav-link pages-toggle
                    {{ request()->routeIs('about.*', 'terms.*') ? 'active' : '' }}"

                    data-bs-toggle="collapse"
                    data-bs-target="#pagesMenu"

                    aria-expanded="{{ request()->routeIs('about.*', 'terms.*') ? 'true' : 'false' }}"

                    aria-controls="pagesMenu">


                    <span class="nav-icon">

                        <i class="bi bi-files"></i>

                    </span>


                    <span class="nav-text">

                        {{ __('messages.pages') }}

                    </span>


                    <i class="bi bi-chevron-down pages-arrow"></i>

                </button>


                <div
                    class="collapse pages-submenu
                    {{ request()->routeIs('about.*', 'terms.*') ? 'show' : '' }}"

                    id="pagesMenu">


                    <!-- About -->

                    <a
                        class="page-child {{ request()->routeIs('about.*') ? 'active' : '' }}"

                        href="{{ route('about.index',['locale' => app()->getLocale()]) }}">

                        <span class="nav-icon">

                            <i class="bi bi-info-circle"></i>

                        </span>

                        <span class="nav-text">

                            {{ __('messages.about') }}

                        </span>

                    </a>


                    <!-- Terms -->

                    <a
                        class="page-child {{ request()->routeIs('terms.*') ? 'active' : '' }}"

                        href="{{ route('terms.index',['locale' => app()->getLocale()]) }}">

                        <span class="nav-icon">

                            <i class="bi bi-file-text"></i>

                        </span>

                        <span class="nav-text">

                            {{ __('messages.terms') }}

                        </span>

                    </a>

                </div>

            </div>


            <!-- Settings -->

            <a
                class="nav-link {{ request()->is('settings*') ? 'active' : '' }}"

                href="#">

                <span class="nav-icon">

                    <i class="bi bi-gear"></i>

                </span>

                <span class="nav-text">

                    {{ __('messages.settings') }}

                </span>

            </a>


        </nav>


        <!-- Sidebar Footer -->

        <div class="sidebar-footer">

            <span class="status-dot"></span>

            <span class="sidebar-footer-text">

                {{ __('messages.system_running') }}

            </span>

        </div>

    </aside>


    <!-- =========================
         Main
    ========================== -->

    <div class="admin-main">


        <!-- Navbar -->

        <nav class="navbar admin-navbar navbar-expand bg-white">

            <div class="container-fluid px-3 px-lg-4">


                <!-- Sidebar Toggle -->

                <button
                    class="sidebar-toggle"

                    type="button"

                    data-sidebar-toggle

                    aria-controls="adminSidebar"

                    aria-expanded="true"

                    aria-label="Toggle sidebar">

                    <span></span>
                    <span></span>
                    <span></span>

                </button>


                <!-- Search -->

                <form
                    class="d-none d-md-flex ms-3 flex-grow-1"

                    role="search">

                    <input
                        class="form-control search-input"

                        type="search"

                        placeholder="{{ __('messages.search') }}"

                        aria-label="{{ __('messages.search') }}">

                </form>


                <!-- Navbar Actions -->

                <div class="navbar-actions ms-auto">


                    <!-- Language -->

                    <div class="dropdown">

                        <button
                            class="icon-button"

                            type="button"

                            data-bs-toggle="dropdown"

                            aria-expanded="false"

                            title="{{ __('messages.english') }} / {{ __('messages.arabic') }}">

                            <i class="bi bi-translate"></i>

                        </button>


                        <ul class="dropdown-menu dropdown-menu-end">


                            <!-- English -->

                            <li>

                                <a
                                    class="dropdown-item"

                                    href="{{ route(
                                        Route::currentRouteName(),
                                        array_merge(
                                            request()->route()->parameters(),
                                            ['locale' => 'en']
                                        )
                                    ) }}">

                                    🇬🇧 {{ __('messages.english') }}

                                </a>

                            </li>


                            <!-- Arabic -->

                            <li>

                                <a
                                    class="dropdown-item"

                                    href="{{ route(
                                        Route::currentRouteName(),
                                        array_merge(
                                            request()->route()->parameters(),
                                            ['locale' => 'ar']
                                        )
                                    ) }}">

                                    🇪🇬 {{ __('messages.arabic') }}

                                </a>

                            </li>


                        </ul>

                    </div>


                    <!-- Theme -->

                    <button
                        class="icon-button theme-toggle"

                        type="button"

                        data-theme-toggle

                        aria-label="{{ __("messages.switch_theme") }}"

                        title="{{ __("messages.switch_theme") }}">

                        <i
                            class="bi bi-moon-stars"
                            data-theme-icon>
                        </i>

                    </button>


                    <!-- Notifications -->




                    <!-- Profile -->

                    <div class="dropdown">

                        <button
                            class="profile-button dropdown-toggle"

                            type="button"

                            data-bs-toggle="dropdown"

                            aria-expanded="false">


                            <img
                                class="avatar-img avatar-sm"

                                src="{{ asset('assets/images/avatar/avatar.jpg') }}"

                                alt="{{ __("messages.admin") }}">


                            <span class="profile-name d-none d-sm-inline">

                                {{ __("messages.admin_hasan") }}

                            </span>

                        </button>


                        <ul class="dropdown-menu dropdown-menu-end">

                            <li>

                                <a class="dropdown-item" href="#">

                                    {{ __('messages.profile') }}

                                </a>

                            </li>


                            <li>

                                <a class="dropdown-item" href="#">

                                    {{ __('messages.account_settings') }}

                                </a>

                            </li>


                            <li>

                                <hr class="dropdown-divider">

                            </li>


                            <li>

                                <a class="dropdown-item" href="#">

                                    {{ __('messages.sign_out') }}

                                </a>

                            </li>

                        </ul>

                    </div>


                </div>

            </div>

        </nav>


        <!-- Page Content -->

        @yield('content')


        <!-- Footer -->

        <footer class="admin-footer">

            <div class="container-fluid px-3 px-lg-4">

                <span>

                    {{ __('messages.copyright') }}

                    <br>

                    {{ __('messages.developed_by') }}

                    <a
                        target="_blank"
                        class="fw-bold text-success"
                        href="#">

                        KHALED FARAG

                    </a>

                </span>


                <span>

                    {{ __('messages.professional_dashboard') }}

                </span>

            </div>

        </footer>


    </div>

</div>


<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
