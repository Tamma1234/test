<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>AdminLTE 3 | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    @include('admin.templates.css')
</head>

<body class="fix-header fix-sidebar card-no-border">
<div id="main-wrapper">
    @include('admin.templates.header')
    @yield('content')
</div>
@include('admin.templates.script')
@yield('script')
</body>
</html>
