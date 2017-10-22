<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ $page_title or "Core Switch Statistics"}}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ asset ("/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css")}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset ("/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css") }}">
  <!-- jQuery library -->
  <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="{{ asset ("/AdminLTE/bower_components/jquery/dist/jquery.js")}}"></script>
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset ("/AdminLTE/bower_components/Ionicons/css/ionicons.min.css") }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset ("/AdminLTE/dist/css/AdminLTE.min.css") }}">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="{{ asset ("/AdminLTE/dist/css/skins/skin-blue.min.css") }}">
  <!-- additional css --> 
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="layout-top-nav skin-blue">
<div class="wrapper">
   
  @include('includes/header')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="min-height: 317px;">
    <!-- Container -->    
    <div class="container">
    <!--
    This container class is needed due to will create new row class inside this class, 
    Rows must be placed within a .container (fixed-width) or .container-fluid (full-width) for proper alignment and padding 
    -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ $page_title or "Core Switch Statistics"}}
        <small>{{ $page_title or null}}</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

       <!--------------------------
       | Your Page Content Here |
       -------------------------->
       @yield('content')
    </section>
    <!-- /.content -->
    </div>
    <!-- /.container -->

  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  @include('includes/footer')

</div><!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset ("/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js") }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset ("/AdminLTE/dist/js/adminlte.min.js") }}"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>
