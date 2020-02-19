<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="app">
   <aside class="sidebar">
    <div class="about">
    </div>
    <div class="links">
        <ul class="lista">
            <li><h4>Użytkownicy</h4>
            <ul>
                <li><a href="{{ url('/admin/user')}}">Użytkownicy</a></li>
                <li><a href="#">Klienci</a></li>
                <li><a href="#">Rolnicy</a></li>
            </ul>
            </li>
            
            <li><h4>słowniki</h4>
                <ul>
                    <li><a href="{{ route('admin.category.index') }}">Kategorie</a></li>
                    <li><a href="{{ route('admin.market.index') }}">Ryneczki</a></li>
                    <li><a href="{{ route('admin.plan.index') }}">Plany</a></li>
                    <li><a href="{{ route('admin.feature.index') }}">Cechy produktów</a></li>
                    <li><a href="{{ url('/admin/unit') }}">Jednostki</a></li>
                </ul>
        </li>
            
        </ul>
    </div>
   </aside>
   <main class="app_page">
        <div class="navbar">
            navbar
        </div>
        <div class="dashboard">
            @yield('content')
        </div>
   </main>

   @yield('js')
</body>
</html>