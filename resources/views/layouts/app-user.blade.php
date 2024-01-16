<html>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="shortcut icon" href={{ asset('favicon.svg') }} type="image/x-icon">


    <link rel="stylesheet" href={{ asset('css/app-user.css') }}>
    <link rel="stylesheet" href={{ asset('css/index.css') }}>
    <link rel="stylesheet" href={{ asset('css/product-hover.css') }}>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Me-Shop - @yield('title')</title>
</head>

<body>
    @section('Header')
        <header id="header" class="header fixed-top d-flex align-items-center">

            <!-- Logo -->
            <div class="d-flex align-items-center justify-content-between">
                <a href="/home" class="logo d-flex align-items-center text-decoration-none">
                    <img src={{ asset('logo1.png') }} alt="" class="rounded-circle">
                    <span>Me-SHop</span>
                </a>
            </div>

            <!-- Left Nav -->
            <nav class="header-nav ms-auto">
                <ul class="d-flex align-items-center">

                    <!-- Badges Message -->
                    <li>
                        <a class="nav-link nav-icon text-dark" href="/transaction">
                            <i class="bi bi-clipboard2-data-fill"></i>
                        </a>
                    </li>

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
    @show

    <div class="container-fluid">
        @yield('content')
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
</body>

</html>
