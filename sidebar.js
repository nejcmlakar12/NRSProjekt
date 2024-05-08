var sidebar = document.querySelector(".sidebar");
var bttn = document.querySelector(".bttn");
var logo = document.querySelector(".LOGOSIDEBAR");
var besedilo = document.querySelectorAll(".Name");
var listitem = document.querySelectorAll(".list-item")

function toggleSidebar() {
    sidebar.classList.toggle("open");
    bttn.classList.toggle("open");
    logo.classList.toggle("open");
    besedilo.forEach(function(element) {
        element.classList.toggle("open");
    });
}

bttn.addEventListener("click", toggleSidebar);