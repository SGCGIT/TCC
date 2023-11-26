var menu = document.getElementById("menu");
var contentWrapper = document.getElementById("content-wrapper");

function toggleMenu() {
    document.body.classList.toggle("menu-open");

    if (window.innerWidth < 800) {
        if (menu.style.width === "100%") {
            menu.style.width = "0";
            contentWrapper.style.display = "flex";
        } else {
            menu.style.width = "100%";
            contentWrapper.style.display = "none";
        }
    } else {
        if (menu.style.width === "200px") {
            menu.style.width = "0";
        } else {
            menu.style.width = "200px";
        }
    }
}

window.onresize = function() {
    if (window.innerWidth < 800 && menu.style.width === "200px") {
        menu.style.width = "0";
        contentWrapper.style.display = "flex";
    } else if (window.innerWidth >= 800) {
        menu.style.width = "0";
        contentWrapper.style.display = "flex";
    }
};

// Adiciona um evento de clique para cada item do menu
var menuItems = document.querySelectorAll("#menu a");
menuItems.forEach(function(item) {
    item.addEventListener("click", function() {
        if (window.innerWidth < 800) {
            toggleMenu();
        }
    });
});