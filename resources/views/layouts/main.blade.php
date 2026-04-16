<?php
$title = 'Вкусно как дома';
?>
    <!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title_page}}</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('adminlte/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('adminlte/dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    {{--DropZone--}}
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<style>
    /* Стиль как в Windows 11 поиска*/
    .windows11-search {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-radius: 28px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1), 0 1px 2px rgba(0, 0, 0, 0.05);
        padding: 8px 12px 8px 20px;
        transition: all 0.3s ease;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .windows11-search:focus-within {
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
        transform: translateY(-1px);
    }

    .search-icon {
        color: #616161;
        font-size: 18px;
        transition: color 0.2s;
    }

    .windows11-input {
        border: none;
        background: transparent;
        padding: 12px 0;
        font-size: 16px;
        font-weight: 400;
        color: #202124;
        width: 100%;
        outline: none;
    }

    .windows11-input::placeholder {
        color: #9aa0a6;
        font-weight: 400;
    }

    .windows11-input:focus {
        outline: none;
        box-shadow: none;
    }

    .search-btn-windows {
        background: #0067c0;
        color: white;
        border: none;
        border-radius: 20px;
        padding: 8px 24px;
        font-size: 14px;
        font-weight: 500;
        transition: all 0.2s;
        white-space: nowrap;
    }

    .search-btn-windows:hover {
        background: #0054a3;
        transform: scale(1.02);
    }

    .search-btn-windows:active {
        transform: scale(0.98);
    }
    /* /Стиль как в Windows 11 поиска*/

</style>

<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">

        <p class="animation__shake" >{{$title}}</p>
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{route('main.index')}}" class="nav-link">Главная</a>
            </li>
        </ul>
        <div style="margin: 0 auto;" class="col-lg-4 ">
            <div class="windows11-search">
                <div class="row align-items-center g-0">
                    <div class="col-auto">
                        <i class="fas fa-search search-icon"></i>
                    </div>
                    <form action="{{route('search')}}" method="GET" style="display: flex; width: 335px; justify-content: space-between; align-items: center;">
                        <div class="col">
                            <input type="text"
                                   class="windows11-input"
                                   id="searchInput"
                                   placeholder="Поиск"
                                   autocomplete="off"
                                   name="seek"
                                   minlength="2"
                            >
                        </div>
                        <div class="col-auto">
                            <button type="submit" id="searchButton" class="search-btn-windows">
                                Поиск
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Right navbar links -->
        <ul class="navbar-nav">


            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-comments"></i>
                    <span class="badge badge-danger navbar-badge">3</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Brad Diesel
                                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">Call me whenever you can...</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    John Pierce
                                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">I got your message bro</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Nora Silvester
                                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">The subject goes here</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                </div>
            </li>

        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{route('main.index')}}" class="brand-link">
            <span class="brand-text font-weight-light">{{$title}}</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="{{route('category.index')}}" class="nav-link">
                            <i class="fas fa-list"></i>
                            <p>
                                категории
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('product.index')}}" class="nav-link">
                            <i class="fas fa-hamburger"></i>
                            <p>
                                продукты
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('tag.index')}}" class="nav-link">
                            <i class="fas fa-link"></i>
                            <p>
                                SEO
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @if(session()->has('success'))
            <div class="alert alert-success mx-1" role="alert" style="display: flex; height: 45px; margin-top: 8px; justify-content: space-between">
                <p style="color: #0a3622"><i class="icon fas fa-check"></i> {{ session('success') }}</p>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="border: 0; background:#d4edda; color: black;"><i class="fas fa-times" style="color: #000000;"></i></button>
            </div>
        @endif
        @if(session()->has('error'))
            <div class="alert alert-danger mx-1" role="alert" style="display: flex; height: 45px; margin-top: 8px; justify-content: space-between; align-items: center;">
                <p style="color: #000; margin: 0;"><i class="icon fas fa-exclamation-triangle"></i> {{ session('error') }}</p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style=" color: #000;">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
            </div>
        @endif
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Главное меню</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('main.index')}}">Главная</a></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            @yield('content')
        </section>
        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Все права защищены &copy; 2022-{{date('Y')}} </strong>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('adminlte/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminlte/dist/js/adminlte.js')}}"></script>

</body>
</html>
