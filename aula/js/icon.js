const fav = document.getElementById("favicon");
document.addEventListener("visibilitychange", () => {
    if (document.hidden) {
        fav.href = "img/icon.gif";
        fav.type = "image/gif";
    } else {
        fav.href = "img/iconwhite.png";
        fav.type = "image/png";
    }
});