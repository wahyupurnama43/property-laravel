
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>@yield('title')</title>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.23/datatables.min.css"/>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="/style/main.css" rel="stylesheet" />
    @stack('add-style')
    <style>
        .notifications-item {
            display: flex;
            border-bottom: 1px solid #eee;
            padding: 6px 9px;
            margin-bottom: 0px;
            cursor: pointer
        }

        .notifications-item:hover {
            background-color: #eee
        }

        .notifications-item img {
            display: block;
            width: 50px;
            height: 50px;
            margin-right: 9px;
            border-radius: 50%;
            margin-top: 2px
        }

        .notifications-item .text h4 {
            color: #777;
            font-size: 16px;
            margin-top: 3px
        }

        .notifications-item .text p {
            color: #aaa;
            font-size: 12px;
        }
        .dropdown-menu-item {
            position: absolute !important;
            top: 100% !important;
            left: -160% !important; 
            
            min-width: 20rem !important;
            
        }
        .dropdown-menu-item h2 {
            font-size: 14px;
            padding: 10px;
            border-bottom: 1px solid #eee;
            color: #999
        }
    </style>

</head>

<body>

    <div class="page-dashboard">
        <div class="d-flex" id="wrapper" data-aos="fade-right">
        <!-- sidebar -->
        <div class="border-right" id="sidebar-wrapper">
            <div class="sidebar-heading text-center">
            <img src="{{ url('images/logo.svg') }}" alt="" class="my-4">
            </div>
            <div class="list-group list-group-flush">
            <a href="/admin" class="list-group-item list-group-item-action {{ (request()->is('admin')) ? 'active' : '' }}">Dashboard</a>
            <a href="{{ route('product.index') }}" class="list-group-item list-group-item-action {{ (request()->is('admin/product')) ? 'active' : '' }}">My Products</a>
            <a href="{{ route('categori.index') }}" class="list-group-item list-group-item-action">Category</a>
            <a href="/" class="list-group-item list-group-item-action">Message</a>
            <a href="{{ route('account.index') }}" class="list-group-item list-group-item-action">My Account</a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item" >{{ __('Logout') }}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            </div>
        </div>

        <!-- page content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top" data-aos="fade-down">
            <div class="container-fluid">
                <button class="btn btn-secondary d-md-none mr-auto mr-2" id="menu-toggle">
                &laquo; Menu
                </button>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedCountent">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedCountent">
                <ul class="navbar-nav d-none d-lg-flex ml-auto">
                    <li class="nav-link dropdown">
                        <a href="#" class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown">
                            <img src="/images/bell.svg" alt="">
                            <div class="card-badge">3</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-item">
                            <h2>Notifications - <span>2</span></h2>
                            <div class="notifications-item"> 
                                <img src="{{ url('images/user.jpg') }}" alt="img">
                                <div class="text">
                                    <h4>Samso aliao</h4>
                                    <p>Samso Nagaro Like your home work</p>
                                </div>
                            </div>
                            <div class="notifications-item"> 
                                <img src="{{ url('images/user.jpg') }}" alt="img">
                                <div class="text">
                                    <h4>Samso aliao</h4>
                                    <p>Samso Nagaro Like your home work</p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                    <a href="#" class="nav-link" id="DropdownNot" role="button" data-toggle="dropdown">
                        <img src="{{ url('images/user.jpg') }}" alt="" class="rounded-circle mr-2 profile-picture">
                        Hi,Wahyu
                    </a>
                    <div class="dropdown-menu">
                            <a href="" class="dropdown-item">Dashboard</a>
                            <a href="" class="dropdown-item">Setting</a>
                            <div class="dropdown-divider"></div>
                             <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item" >{{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    
                </ul>

                <ul class="navbar-nav d-block d-lg-none">
                    <li class="nav-item">
                        <a href="" class="nav-link">Hi,angga</a>
                    </li>
                    <li class="nav-link d-inline-block mt-2">
                        <a href="#" class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown">
                            <img src="/images/bell.svg" alt="">
                            <div class="card-badge">3</div>
                        </a>
                        <div class="dropdown-menu">
                            <div class="notifications-item"> 
                                <img src="{{ url('images/user.jpg') }}" alt="img">
                                <div class="text">
                                    <h4>Samso aliao</h4>
                                    <p>Samso Nagaro Like your home work</p>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                </div>
            </div>
            </nav>
            <!-- section content -->
            <div class="section-content section-dashboard-home" data-aos="fade-up">
            <div class="container-fluid">
                @yield('content')
            </div>
            </div>
        </div>

        </div>
    </div>

    <script src="/vendor/jquery/jquery.min.js"></script>
        <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.23/datatables.min.js"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        @include('sweetalert::alert')
        <script>
            AOS.init();
        </script>
        <script>
            $('#menu-toggle').click(function(e) {
            e.preventDefault();
            $('#wrapper').toggleClass("toggled");
            })
        </script>
    @yield('add-script')
</body>

</html>
