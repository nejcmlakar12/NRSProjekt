var item1 = document.querySelector(".item1");
var item2 = document.querySelector(".item2");
var item3 = document.querySelector(".item3");
var item4 = document.querySelector(".item4");
var item5 = document.querySelector(".item5");
var item6 = document.querySelector(".item6");

var sidebaritem3 = document.querySelector(".sidebar-item3");
var sidebaritem1 = document.querySelector(".sidebar-item1");
var sidebaritem2 = document.querySelector(".sidebar-item2");
var sidebaritem4 = document.querySelector(".sidebar-item4");
var sidebaritem5 = document.querySelector(".sidebar-item5");
var sidebaritem6 = document.querySelector(".sidebar-item6");

var item3naslov = document.querySelector(".item3-naslov");
var item3besedilo = document.querySelector(".item3-besedilo");

var item2naslov = document.querySelector(".item2-naslov");
var item2besedilo = document.querySelector(".item2-besedilo");

var item4naslov = document.querySelector(".item4-naslov");
var item4besedilo = document.querySelector(".item4-besedilo");

var item5naslov = document.querySelector(".item5-naslov");
var item5besedilo = document.querySelector(".item5-besedilo");


var xgumb = document.querySelector(".x");

function open3() {
    if(sidebaritem3.classList.contains("active")){

    }
    else{
        item3.style.transition = '0.5s';
        item1.style.display = "none";
        item2.style.display = "none";
        item4.style.display = "none";
        item5.style.display = "none";
        item6.style.display = "none";
        
    
        item3.style.width ="1195px";
        
        item3besedilo.style.display="block";
        item3naslov.style.display="none";
        sidebaritem3.classList.toggle("active");
        sidebaritem1.classList.remove("active");
        clicked=sessionStorage.setItem("clicked", "item3");
    }
  

}

function open2() {
    if(sidebaritem4.classList.contains("active")){

    }
    else{
        item2.style.transition = '0.5s';
        item1.style.display = "none";
        item3.style.display = "none";
        item4.style.display = "none";
        item5.style.display = "none";
        item6.style.display = "none";
        
    
        item2.style.width ="1195px";
        
        item2besedilo.style.display="block";
        item2naslov.style.display="none";
        sidebaritem4.classList.toggle("active");
        sidebaritem1.classList.remove("active");
        clicked=sessionStorage.setItem("clicked", "item2");
    }
  
   
}   

function open4() {
    if(sidebaritem5.classList.contains("active")){
        
    }
    else{
        item4.style.transition = '0.5s';
        item1.style.display = "none";
        item2.style.display = "none";
        item5.style.display = "none";
        item3.style.display = "none";
        item6.style.display = "none";
        
    
        item4.style.width ="1195px";
        item4.style.height ="660px";
        item4besedilo.style.display="block";
        item4naslov.style.display="none";
        sidebaritem5.classList.toggle("active");
        sidebaritem1.classList.remove("active");
        clicked=sessionStorage.setItem("clicked", "item4");
    }
  
 
}   


function open5() {

    if(sidebaritem6.classList.contains("active")){

    }
    else{
        item5.style.transition = '0.5s';
        item1.style.display = "none";
        item2.style.display = "none";
        item4.style.display = "none";
        item3.style.display = "none";
        item6.style.display = "none";
        
    
        item5.style.width ="1195px";
        item5.style.height ="660px";
        item5besedilo.style.display="block";
        item5naslov.style.display="none";
        sidebaritem6.classList.toggle("active");
        sidebaritem1.classList.remove("active");
        clicked=sessionStorage.setItem("clicked", "item5");
    }
  
   
}   


function close(){
  
    item3.style.transition = 'none';
    item4.style.transition = 'none';
    item5.style.transition = 'none';
    item2.style.transition = 'none';
    item3.style.width = "400px ";
    item2.style.width = "400px ";
    item4.style.width = "auto";
    item5.style.width = "auto";
    item4.style.height ="200px";
    item5.style.height ="200px";
    item1.style.display = "block";
    item2.style.display = "block";
    item4.style.display = "block";
    item5.style.display = "block";
    item6.style.display = "block";
    item3.style.display="block";
    item3besedilo.style.display = "none";
    item3naslov.style.display = "block";
    item4besedilo.style.display = "none";
    item4naslov.style.display = "block";
    item5besedilo.style.display = "none";
    item5naslov.style.display = "block";
    item2besedilo.style.display = "none";
    item2naslov.style.display = "block";
    
    sidebaritem1.classList.add("active");
    
    sidebaritem3.classList.remove("active");
    sidebaritem4.classList.remove("active");
    sidebaritem5.classList.remove("active");
    sidebaritem2.classList.remove("active");
    sidebaritem6.classList.remove("active");
    
    clicked=sessionStorage.setItem("clicked", "");

  
   
}

function play (){
    window.location.href = "blackjack1.php";
}

item3.addEventListener("click", open3);
item2.addEventListener("click", open2);
item4.addEventListener("click", open4);
item5.addEventListener("click", open5);


sidebaritem2.addEventListener("click",play);
sidebaritem3.addEventListener("click",isopen);
sidebaritem4.addEventListener("click",isopen);
sidebaritem5.addEventListener("click",isopen);
sidebaritem6.addEventListener("click",isopen);
xgumb.addEventListener("click", close);


function isopen(event){

    var className = event.target.className;
    if(className ==="i3")
    {
        console.log(clicked);
        if(sidebaritem3.classList.contains("active")){
            close();
        }
        else{
            close();
            open3();

        }
    }
    else if(className ==="i4"){
        console.log(clicked);
        if(sidebaritem4.classList.contains("active")){
            close();
        }
        else{
            close();
            open2();
        }
    }
    else if(className ==="i5"){
        console.log(clicked);
        if(sidebaritem5.classList.contains("active")){
            close();
        }
        else{
            close();
            open4();
        }
    }
 
    else if(className ==="i6"){
        console.log(clicked);
        if(sidebaritem6.classList.contains("active")){
            close();
        }
        else{
            close();
            open5();
        }
    }
}


clicked = sessionStorage.getItem("clicked");
if (clicked === "item3") {
    open3();
}
else if (clicked === "item4")
{
    open4();
}
else if (clicked === "item5")
{
    open5();
}
else if (clicked === "item2")
{
    open2();
}