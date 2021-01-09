<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="{{asset('backendadmin/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    @if (app()->getLocale() == 'ar')
    <!-- Font Awesome -->
<link href="{{asset('backendadmin/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="https://fonts.googleapis.com/css?family=Cairo:400,700" rel="stylesheet">

    <link href="{{asset('backendadmin/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{asset('backendadmin/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="{{asset('backendadmin/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{asset('backendadmin/vendors/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{asset('backendadmin/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('backendadmin/build/css/custom.min.css')}}" rel="stylesheet">
    <style>
        body, h1, h2, h3, h4, h5, h6 {
            font-family: 'Cairo', sans-serif !important;
        }
    </style>
@else
 <!-- Font Awesome -->
 <link href="{{asset('backendadmin/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
 <!-- NProgress -->
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

 <link href="{{asset('backendadmin/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
 <!-- iCheck -->
 <link href="{{asset('backendadmin/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">

 <!-- bootstrap-progressbar -->
 <link href="{{asset('backendadmin/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
 <!-- JQVMap -->
 <link href="{{asset('backendadmin/vendors/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet"/>
 <!-- bootstrap-daterangepicker -->
 <link href="{{asset('backendadmin/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">

 <!-- Custom Theme Style -->
 <link href="{{asset('backendadmin/build/css/custom.min.css')}}" rel="stylesheet">
 @endif

  </head>
