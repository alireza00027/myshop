<html lang="fa"><head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>myShop</title>
    <link href="public/css/app.css">
    <link rel="stylesheet" href="/css/app.css">

</head>

<body class="rtl">
@include('app.layouts.header')

@yield('content')

@include('app.layouts.footer')
@yield('script')
<script src="{{asset('js/app.js')}}"></script>


</body></html>
