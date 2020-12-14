<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>پنل مدیریت | داشبورد اول</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="public/css/app.css">
    <link rel="stylesheet" href="/css/admin.css">
    <!-- Font Awesome -->
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <!-- iCheck -->
    <!-- Morris chart -->

    <!-- jvectormap -->

    <!-- Date Picker -->
    <!-- Daterange picker -->
    <!-- bootstrap wysihtml5 - text editor -->
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- bootstrap rtl -->
    <!-- template rtl version -->

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    @include('admin.section.header')

    @yield('content')


    @include('admin.section.footer')

</div>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('js/admin.js')}}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
@yield('script')
</body>
</html>
