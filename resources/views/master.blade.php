<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Minimarket</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('template/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <!-- <link rel="stylesheet" href="{{asset('template/dist/css/adminlte.min.css')}}"> -->

    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    
    <!-- Bootstrap -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->
    @stack('style')
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light fixed-top">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>          
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4 float-left min-vh-100">
            <!-- Brand Logo -->
            <a class="brand-link ">
            <span class="brand-text font-weight-light mx-4">Minimarket</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="/" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            List Produk
                        </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/product/create" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Tambah Produk 
                        </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/category" class="nav-link">
                        <i class="nav-icon fas fa-user-secret"></i>
                        <p>
                            Category 
                        </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/transaction/precreate" class="nav-link">
                        <i class="nav-icon fas fa-user-secret"></i>
                        <p>
                            Buat Transaksi 
                        </p>
                        </a>
                    </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <!-- /.Main Sidebar Container -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>@yield('title')</h1>
                    </div>
                    </div>
                </div>
            </section>
            <!-- /.Content Header (Page header -->

            <!-- Main content -->
            <section class="content">
                <!-- card -->
                <div class="card">

                    <!-- card-body -->
                    <div class="card-body">
                        @yield('content')
                    </div>                  
                    <!-- /.card-body -->

                </div>
                <!-- /.card -->

            </section>
            <!-- /.content -->

        </div>
        <!-- /.content-wrapper -->

    <footer class="main-footer fixed-bottom">
        <div class="float-right d-none d-sm-block">
        <b>Created By</b> Fitria
        </div>
        <strong>Minimarket</strong> Elevate your shop!
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    @stack('script')
    </body>
</html>
