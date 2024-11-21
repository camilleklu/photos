@extends('app') 
@section('content')

<h1>Page d'accueil</h1>
<style>
    @import url(https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css);
.header {
    display: grid;
    grid-template-columns: 1fr auto;
    align-items: center;
    padding: 10px 20px;
    height: 50px;
    background-color: #4d2d33 ;
    color: #fff3ea ;
    font-size: 20px;
}

.nav-gauche a {
    color: #fff3ea;
    margin-right: 15px;
    text-decoration: none;
}

.input {
    background-color: #fff3ea;
    border-radius: 20px;
    color: #4d2d33;
    padding: 5px 10px;
    border: none;
}

.bx-search {
    color: #fff3ea;
    margin-left: 5px;
    cursor: pointer;
}
</style>
@endsection
