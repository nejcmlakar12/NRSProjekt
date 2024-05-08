var chip5 = document.querySelector(".chip5");
var chip25 = document.querySelector(".chip25");
var chip100 = document.querySelector(".chip100");
var chip500 = document.querySelector(".chip500");
var chip1000 = document.querySelector(".chip1000");
var chip5000 = document.querySelector(".chip5000");
var redo1 = document.querySelector(".redo-slika");
var betchip = document.getElementById("betchip");
var betamounthtml = document.querySelector(".betamount");
var betammount = [];
var totalbetamount = 0;
var hidevsebina =  document.querySelector(".betting")
var play = document.querySelector(".player")
var dealerkarte = document.querySelector(".dealerkarte")
var redobutton = document.querySelector(".redo");
var betbttn = document.querySelector(".betbutton");

function updateBetAmount() {
    totalbetamount = betammount.reduce((acc, curr) => acc + curr, 0);
    if (totalbetamount < 25) {
        betchip.src = "slike/chips/5N.png";
        betchip.style.width = "150px";
        betamounthtml.style.fontSize = "35px";
    } else if (totalbetamount < 100) {
        betchip.src = "slike/chips/25N.png";
        betchip.style.width = "150px";
        betamounthtml.style.fontSize = "35px";
    } else if (totalbetamount < 500) {
        betchip.src = "slike/chips/100N.png";
        betchip.style.width = "150px";
        betamounthtml.style.fontSize = "35px";
    } else if (totalbetamount < 1000) {
        betchip.src = "slike/chips/500N.png";
        betchip.style.width = "150px";
        betamounthtml.style.fontSize = "35px";
    } else if (totalbetamount < 5000) {
        betchip.src = "slike/chips/1000N.png";
        betchip.style.width = "180px";
        betamounthtml.style.fontSize = "35px";
    } else if (totalbetamount >= 5000) {
        betchip.src = "slike/chips/5000N.png";
        betchip.style.width = "200px";
        betamounthtml.style.fontSize = "30px";
    }
    betamounthtml.innerHTML = totalbetamount + "$";
}

function bet(event) {
   
    var clickedChip = event.target;
    var className = clickedChip.className;
  
    if (className === "chipsslike chip5") {
        betammount.push(5);
    } else if (className === "chipsslike chip25") {
        betammount.push(25);
    } else if (className === "chipsslike chip100") {
        betammount.push(100);
    } else if (className === "chipsslike chip500") {
        betammount.push(500);
    } else if (className === "chipsslike chip1000") {
        betammount.push(1000);
    } else if (className === "chipsslike chip5000") {
        betammount.push(5000);
    } else if ((className == "redo" && betammount.length) > 0 || (className == "redo-slika" && betammount.length > 0) ) {
        betammount.pop();
        console.log(betammount);
        updateBetAmount(); 
    }

   
    updateBetAmount();
}

function hide () {
    if(totalbetamount == 0)
    {
        console.log("ni stave")
    }
    else if (totalbetamount>balance)
    {
        console.log("money to low")
    }
    else if((totalbetamount>0) && (totalbetamount <= balance)) {
        hidevsebina.style.display = "none";
        play.style.display="block";
        dealerkarte.style.display = "grid";
        GameStart();

    }
    
}

chip25.addEventListener("click", bet);
chip100.addEventListener("click", bet);
chip500.addEventListener("click", bet);
chip1000.addEventListener("click", bet);
chip5000.addEventListener("click", bet);
chip5.addEventListener("click", bet);
redobutton.addEventListener("click", bet);

betbttn.addEventListener("click", hide);

redo1.addEventListener("click", function(event) {
    bet(event); 
    event.stopPropagation();
});