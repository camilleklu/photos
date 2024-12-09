function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.querySelector(".app").style.filter = "blur(4px)";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.querySelector(".app").style.filter = "blur(0)";
}
