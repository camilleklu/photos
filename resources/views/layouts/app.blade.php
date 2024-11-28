<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Album</title>
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

    <header>

    

    <div id="desktopNav" class="desktop-nav">

                <a href="/accueil">Accueil</a>
                <a href="/accueil/albums">Albums</a>
                @auth
                Bonjour {{Auth::user()->name}}
                <a href="{{route("logout")}}" onclick="document.getElementById('logout').submit(); return false;">Logout</a>
                <form id="logout" action="{{route("logout")}}" method="post">
                @csrf
                </form>
                @else
                <a href="{{route("login")}}">Connexion</a>
                <a href="{{route("register")}}">S'inscrire</a>
                @endauth     

                <span><input placeholder="Rechercher" type="search" name="search" class="input"><i class='bx bx-search'></i><span>
</div>


<div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <a href="/accueil">Accueil</a>
                <a href="/accueil/albums">Albums</a>
                @auth
                Bonjour {{Auth::user()->name}}
                <a href="{{route("logout")}}" onclick="document.getElementById('logout').submit(); return false;">Logout</a>
                <form id="logout" action="{{route("logout")}}" method="post">
                @csrf
                </form>
                @else
                <a href="{{route("login")}}">Connexion</a>
                <a href="{{route("register")}}">S'inscrire</a>

                @endauth     
                <input placeholder="Rechercher" type="search" name="search" class="input"><i class='bx bx-search'></i>
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
</body>
</html>

















