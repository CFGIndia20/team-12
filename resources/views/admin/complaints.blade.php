<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />


    <!-- CSS Files -->
    
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/light-bootstrap-dashboard.css') }}" rel="stylesheet">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Janaagraha') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    
</head>

<body>
    <div>
        <div class="sidebar" data-color="blue" data-image="img/sidebar-5.jpg">

            <div class="sidebar-wrapper">
                <div class="logo simple-text">
                </div>
                <ul class="nav">
                    <li class="nav-link">
                        <a href="/complaints">
                        <div class="nav-link">
                            <i class="nc-icon nc-notes"></i>
                            <p>Complaints</p>
                        </div>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="/dashboard">
                        <div class="nav-link">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Dashboard</p>
                        </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="main-panel">
        @yield('content')
    </div>
</body>
<!--   Core JS Files   -->
<script src="js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="js/core/popper.min.js" type="text/javascript"></script>
<script src="js/core/bootstrap.min.js" type="text/javascript"></script>
<script src="js/plugins/bootstrap-switch.js"></script>

<!--  Chartist Plugin  -->
<script src="js/plugins/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="js/plugins/bootstrap-notify.js"></script>

<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>

</html>
