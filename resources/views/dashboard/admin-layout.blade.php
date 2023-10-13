<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
        @yield('title')
    </title>
    <!-- BOOTSTRAP STYLES-->
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="{{ asset('assets/css/font-awesome.css') }}" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>

    <div id="wrapper">
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    </button>
                    <a class="navbar-brand" href="/admin">
                        <img src="{{ asset('assets/img/logo.png') }}" />
                    </a>
                </div>
            </div>
            @auth
                <span class="text-light">
                    Mr. {{ ucwords(auth()->user()->name) }} is loged In
                    |   <a  class="text-light" href="/admin/logout">Logout</a>
                    @endauth
                </span>
        </div>

        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <div class="border-end bg-white" id="sidebar-wrapper">
                    <div class="list-group list-group-flush">
                        <a class="list-group-item list-group-item-action list-group-item-light p-1" href="/admin/products">
                            Products <span class="text-primary">({{ $products_count }})</span></a>
                        <a class="list-group-item list-group-item-action list-group-item-light p-1" href="/admin/orders">
                            Orders <span class="text-primary">({{ $orders_count }})</span></a>
                        <a class="list-group-item list-group-item-action list-group-item-light p-1" href="#!">Events</a>
                        <a class="list-group-item list-group-item-action list-group-item-light p-1" href="#!">Profile</a>
                        <a class="list-group-item list-group-item-action list-group-item-light p-1" href="/adminSessionDestroy">Logout</a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- /. NAV SIDE  -->

        <div id="page-wrapper">
        @if(session('success'))
        <h5 class="text-center text-danger p-5">
            {{ session('success') }}
        </h5>
        @endif
            @yield('content');
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <div class="footer">
        <div class="row">
            <div class="col-lg-12">
                &copy; 2014 yourdomain.com | Design by: <a href="http://binarytheme.com" style="color:#fff;" target="_blank">www.binarytheme.com</a>
            </div>
        </div>
    </div>

    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>


</body>

</html>