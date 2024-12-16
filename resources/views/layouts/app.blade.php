<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Album</title>
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link href="{{ asset('css/content.css') }}" rel='stylesheet' />
    <link rel="stylesheet" href="{{ asset('css/accueil.css') }}">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

    <header>

    

    <div id="desktopNav" class="desktop-nav">

                <a href="/accueil">Accueil</a>
                <a href="/accueil/albums">Albums</a>
                @auth
                <a href="/accueil/myalbums">Mes Albums</a>
                <a href="{{route("logout")}}" onclick="document.getElementById('logout').submit(); return false;">Logout</a>
                <form id="logout" action="{{route("logout")}}" method="post">
                @csrf
                </form>
                @else
                <a href="{{route("login")}}">Connexion</a>
                <a href="{{route("register")}}">S'inscrire</a>
                @endauth     


                <form action="{{ route('recherche') }}" method="GET" class="group">
                <input type="text" name="q" placeholder="Rechercher" value="{{ request('q') }}">
                <button type="submit"><i class='bx bx-search'></i></button>
                </form>
</div>


<div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <a href="/accueil">Accueil</a>
                <a href="/accueil/albums">Albums</a>
                @auth
                <a href="/accueil/myalbums">Mes Albums</a>
                <a href="{{route("logout")}}" onclick="document.getElementById('logout').submit(); return false;">Logout</a>
                <form id="logout" action="{{route("logout")}}" method="post">
                @csrf
                </form>
                @else
                <a href="{{route("login")}}">Connexion</a>
                <a href="{{route("register")}}">S'inscrire</a>

                @endauth     

                <form action="{{ route('recherche') }}" method="GET" class="group">
                <input type="text" name="q" placeholder="Rechercher" value="{{ request('q') }}">
                <button type="submit"><i class='bx bx-search'></i></button>
                </form>
</div>

<span onclick="openNav()"><i class='bx bx-menu'></i></span>

    </header>

<section class="app">
    @yield('content')
</section>

    <footer>
        <p>&copy; Camille Kluck & Justine Degrugillier </p>
    </footer>
</div>


<script src="{{ asset('js/header.js') }}"></script>
<script src="{{ asset('js/index.js') }}"></script>
</body>
</html>

















