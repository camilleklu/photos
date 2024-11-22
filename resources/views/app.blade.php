<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Album</title>
    <link href="./public/css/style.css" rel="stylesheet">
    <link href="" rel="stylesheet">
    <link href="" rel="stylesheet">
</head>
<body>

<div class="page">
    <header>
        <nav class="header">
            <div class="nav-gauche">
                <a href="/accueil">Accueil</a>
                <a href="/accueil/albums">Albums</a>
                <!-- <a href="#connexion">Connexion</a> -->
            </div>
            <div class="nav-droite">
                <input placeholder="Search" type="search" class="input"><i class='bx bx-search'></i>
            </div>
        </nav>
    </header>

<section class="app">
    @yield('content')
</section>

    <footer>
        <p>&copy; Camille Kluck & Justine Degrugillier </p>
    </footer>
</div>

</body>
</html>















<!-- Rajoute ça dans le header pour le login et mot de passe -->


<!-- @auth
        Bonjour {{Auth::user()->name}}
        <a href="{{route("logout")}}"
           onclick="document.getElementById('logout').submit(); return false;">Logout</a>
        <form id="logout" action="{{route("logout")}}" method="post">
            @csrf
        </form>
    @else
        <a href="{{route("login")}}">Login</a>
        <a href="{{route("register")}}">Register</a>
    @endauth -->