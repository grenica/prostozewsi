<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>

   <!-- Scripts -->
   <script src="{{ asset('js/app.js') }}" defer></script>

    {{-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> --}}
   
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
     --}}

     <!--Import jQuery before export.js-->
    {{-- <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script> --}}


    <!--Data Table-->
    <script type="text/javascript"  src=" https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript"  src=" https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>

    <!--Export table buttons-->
    <script type="text/javascript"  src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.24/build/pdfmake.min.js" ></script>
    <script type="text/javascript"  src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.24/build/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.1/js/buttons.print.min.js"></script>

<!--Export table button CSS-->

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css">
</head> 
<body>
<div class="app">
   <aside class="sidebar">
    <div class="about">
    </div>
    <div class="links">
        <ul class="lista">
            <li>Main</li> 
            <li><a href="{{route('panel')}}"><i class="icofont-dashboard icofont-2x"></i>Panel</a></li>
            <li><a href="{{route('farmer.order.index')}}"><i class="icofont-cart icofont-2x"></i>Zamówienia</a></li>
            <li><a href="{{ route('farmer.article.index')}}"><i class="icofont-pear icofont-2x"></i>Moje towary</a></li>
        <li><a href="{{route('history')}}"><i class="icofont-history icofont-2x"></i>Historia</a></li>
            <li><a href="{{route('stat')}}"><i class="icofont-chart-bar-graph icofont-2x"></i>Statystyki</a></li>
            <li><a href="{{ route('farmer.market.index')}}"><i class="icofont-handshake-deal icofont-2x"></i>Rynki</a></li>
            <li>Profil</li>
            <li><a href="{{ route('farmer.profil.index')}}"><i class="icofont-user icofont-2x"></i>Profil</a></li>
            <li><a href="{{ route('farmer.payment.index')}}"><i class="icofont-money-bag icofont-2x"></i>Płatności</a></li>
        </ul>
    </div>
   </aside>
   {{-- <main class="app_page"> --}}
    <main class="container">
        <div class="navbar">
            TODO
        </div>
        {{-- <div class="dashboard"> --}}
        <div class="dashboard">
            @yield('content')
        </div>
   </main>
   
   <script>
    $(document).ready(function() {
        //bo sa załadowane róznwe wersje jQuery
        $.noConflict();
        
    });
</script>
   @yield('js')
</body>

</html>