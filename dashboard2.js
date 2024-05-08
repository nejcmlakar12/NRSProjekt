var sidebaritem1 = document.querySelector(".sidebar-item1");
var sidebaritem2 = document.querySelector(".sidebar-item2");
var sidebaritem3 = document.querySelector(".sidebar-item3");
var sidebaritem4 = document.querySelector(".sidebar-item4");
var sidebaritem5 = document.querySelector(".sidebar-item5");
var sidebaritem6 = document.querySelector(".sidebar-item6");

function redirect(clicked) {
    sessionStorage.setItem("clicked", clicked);
    window.location.href = 'Dashboard.php';
}

sidebaritem1.addEventListener("click", function() {
    redirect("item1");
});

sidebaritem3.addEventListener("click", function() {
    redirect("item3");
});
sidebaritem4.addEventListener("click", function() {
    redirect("item2");
});
sidebaritem5.addEventListener("click", function() {
    redirect("item4");
});
sidebaritem6.addEventListener("click", function() {
    redirect("item5");
});