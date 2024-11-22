<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevinstaAssignment</title>
    <style>

    </style>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>


</head>
<body>
    <div class="header">
        <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">Home</a>
        <a href="{{ url('/web') }}"  class="{{ request()->is('web') ? 'active' : '' }}">Web</a>
        <a href="{{ url('/social') }}"  class="{{ request()->is('social') ? 'active' : '' }}">Social</a>
        <a href="{{ url('/admin') }}"  class="super-admin {{ request()->is('admin') ? 'active' : '' }}">Super Admin</a>
    </div>

    <div class="content">
        @yield('content')
    </div>
</body>
</html>
