<html>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="shortcut icon" href={{ asset('favicon.svg') }} type="image/x-icon">

    <link rel="stylesheet" href={{ asset('css/app-admin.css') }}>
    <link rel="stylesheet" href={{ asset('css/dashboard.css') }}>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">    <title>Me-Shop - @yield('title')</title>

    <title>Me-Shop - @yield('title')</title>
</head>

<body>
    @section('sidebar')
        <!-- Header -->
        <header id="header" class="header fixed-top d-flex align-items-center">

            <!-- Logo -->
            <div class="d-flex align-items-center justify-content-between">
                <a href="" class="logo d-flex align-items-center">
                    <img src="{{asset('logo1.png')}}" alt="Profile" class="rounded-circle" style="width: 25px">
                    <span class="d-none d-lg-block">Me-SHop</span>
                </a>
                <i class="bi bi-list toggle-sidebar-btn"></i>
            </div>

            <!-- Left Nav -->
            <nav class="header-nav ms-auto">
                <ul class="d-flex align-items-center">
                    <!-- Profle -->
                    <li class="nav-item dropdown pe-3">

                        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                            data-bs-toggle="dropdown">
                            <img src="{{ asset('300.png') }}" alt="Profile" class="rounded-circle" style="width: 25px">
                            <span class="d-none d-md-block dropdown-toggle ps-2">{{ auth()->user()->name }}</span>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                            <li class="dropdown-header">
                                <h6>{{ auth()->user()->name }}</h6>
                                <span>{{ auth()->user()->roles }}</span>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a class="dropdown-item d-flex align-items-center">
                                    <i class="bi bi-person"></i>
                                    <span>My Profile</span>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a href="/logout" class="dropdown-item d-flex align-items-center">
                                    <i class="bi bi-box-arrow-right"></i>
                                    <span>Sign Out</span>
                                </a>
                            </li>

                        </ul>
                        <!-- End Profile Dropdown Items -->
                    </li>

                </ul>
            </nav>

        </header>

        <!-- Sidebar -->
        <aside id="sidebar" class="sidebar">

            <ul class="sidebar-nav" id="sidebar-nav">

                <li class="nav-item">
                    <a class="nav-link " href="/dashboard">
                        <i class="bi bi-grid"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-menu-button-wide"></i><span>Product</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="/product-create">
                                <i class="bi bi-circle"></i><span>+Add Product</span>
                            </a>
                        </li>
                    </ul>
                    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="/product">
                                <i class="bi bi-circle"></i><span>Product</span>
                            </a>
                        </li>
                    </ul>
                    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="/product-soldout">
                                <i class="bi bi-circle"></i><span>Product Soldout</span>
                            </a>
                        </li>
                    </ul>
                    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="/product-archive">
                                <i class="bi bi-circle"></i><span>Product Arcvhive</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="/category">
                        <i class="bi bi-tags"></i>
                        <span>Category</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="/data_transaction">
                        <i class="bi bi-clipboard2-pulse"></i>
                        <span>Transaction</span>
                    </a>
                </li>
            </ul>
        </aside>
    @show

    <div>
        <main id="main" class="main">

            @yield('content')
            <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                    class="bi bi-arrow-up-short"></i></a>
        </main>
    </div>

    <script>
        (function() {
            "use strict";

            /**
             * Easy selector helper function
             */
            const select = (el, all = false) => {
                el = el.trim()
                if (all) {
                    return [...document.querySelectorAll(el)]
                } else {
                    return document.querySelector(el)
                }
            }

            /**
             * Easy on scroll event listener 
             */
            const onscroll = (el, listener) => {
                el.addEventListener('scroll', listener)
            }


            /**
             * Back to top button
             */
            let backtotop = select('.back-to-top')
            if (backtotop) {
                const toggleBacktotop = () => {
                    if (window.scrollY > 100) {
                        backtotop.classList.add('active')
                    } else {
                        backtotop.classList.remove('active')
                    }
                }
                window.addEventListener('load', toggleBacktotop)
                onscroll(document, toggleBacktotop)
            }
        })();
    </script>
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    
    <script src="{{ asset('js/Chart.min.js') }}"></script>
    <script src="{{ asset('js/chart-area-demo.js') }}"></script>
    <script src="{{ asset('js/chart-pie-demo.js') }}"></script>
    <script src="{{ asset('js/app-admin.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

</body>

</html>
