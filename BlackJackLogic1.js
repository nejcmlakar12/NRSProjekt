const karte = [
    { name: 'Ace of Hearts', value: 11 , img:'slike/Cards/ace_of_hearts.png' },
    { name: '2 of Hearts', value: 2, img: 'slike/Cards/2_of_hearts.png' },
    { name: '3 of Hearts', value: 3, img: 'slike/Cards/3_of_hearts.png' },
    { name: '4 of Hearts', value: 4, img: 'slike/Cards/4_of_hearts.png' },
    { name: '5 of Hearts', value: 5, img: 'slike/Cards/5_of_hearts.png' },
    { name: '6 of Hearts', value: 6, img: 'slike/Cards/6_of_hearts.png' },
    { name: '7 of Hearts', value: 7, img: 'slike/Cards/7_of_hearts.png' },
    { name: '8 of Hearts', value: 8, img: 'slike/Cards/8_of_hearts.png' },
    { name: '9 of Hearts', value: 9, img: 'slike/Cards/9_of_hearts.png' },
    { name: '10 of Hearts', value: 10, img: 'slike/Cards/10_of_hearts.png' },
    { name: 'Jack of Hearts', value: 10, img: 'slike/Cards/jack_of_hearts2.png' },
    { name: 'Queen of Hearts', value: 10, img: 'slike/Cards/queen_of_hearts2.png' },
    { name: 'King of Hearts', value: 10, img: 'slike/Cards/king_of_hearts2.png' },
    { name: 'Ace of Diamonds', value: 11, img: 'slike/Cards/ace_of_diamonds.png' },
    { name: '2 of Diamonds', value: 2, img: 'slike/Cards/2_of_diamonds.png' },
    { name: '3 of Diamonds', value: 3, img: 'slike/Cards/3_of_diamonds.png' },
    { name: '4 of Diamonds', value: 4, img: 'slike/Cards/4_of_diamonds.png' },
    { name: '5 of Diamonds', value: 5, img: 'slike/Cards/5_of_diamonds.png' },
    { name: '6 of Diamonds', value: 6, img: 'slike/Cards/6_of_diamonds.png' },
    { name: '7 of Diamonds', value: 7, img: 'slike/Cards/7_of_diamonds.png' },
    { name: '8 of Diamonds', value: 8, img: 'slike/Cards/8_of_diamonds.png' },
    { name: '9 of Diamonds', value: 9, img: 'slike/Cards/9_of_diamonds.png' },
    { name: '10 of Diamonds', value: 10, img: 'slike/Cards/10_of_diamonds.png' },
    { name: 'Jack of Diamonds', value: 10, img: 'slike/Cards/jack_of_diamonds2.png' },
    { name: 'Queen of Diamonds', value: 10, img: 'slike/Cards/queen_of_diamonds2.png' },
    { name: 'King of Diamonds', value: 10, img: 'slike/Cards/king_of_diamonds2.png' },
    { name: 'Ace of Clubs', value: 11, img: 'slike/Cards/ace_of_clubs.png' },
    { name: '2 of Clubs', value: 2, img: 'slike/Cards/2_of_clubs.png' },
    { name: '3 of Clubs', value: 3, img: 'slike/Cards/3_of_clubs.png' },
    { name: '4 of Clubs', value: 4, img: 'slike/Cards/4_of_clubs.png' },
    { name: '5 of Clubs', value: 5, img: 'slike/Cards/5_of_clubs.png' },
    { name: '6 of Clubs', value: 6, img: 'slike/Cards/6_of_clubs.png' },
    { name: '7 of Clubs', value: 7, img: 'slike/Cards/7_of_clubs.png' },
    { name: '8 of Clubs', value: 8, img: 'slike/Cards/8_of_clubs.png' },
    { name: '9 of Clubs', value: 9, img: 'slike/Cards/9_of_clubs.png' },
    { name: '10 of Clubs', value: 10, img: 'slike/Cards/10_of_clubs.png' },
    { name: 'Jack of Clubs', value: 10, img: 'slike/Cards/jack_of_clubs2.png' },
    { name: 'Queen of Clubs', value: 10, img: 'slike/Cards/queen_of_clubs2.png' },
    { name: 'King of Clubs', value: 10, img: 'slike/Cards/king_of_clubs2.png' },
    { name: 'Ace of Spades', value: 11, img: 'slike/Cards/ace_of_spades.png' },
    { name: '2 of Spades', value: 2, img: 'slike/Cards/2_of_spades.png' },
    { name: '3 of Spades', value: 3, img: 'slike/Cards/3_of_spades.png' },
    { name: '4 of Spades', value: 4, img: 'slike/Cards/4_of_spades.png' },
    { name: '5 of Spades', value: 5, img: 'slike/Cards/5_of_spades.png' },
    { name: '6 of Spades', value: 6, img: 'slike/Cards/6_of_spades.png' },
    { name: '7 of Spades', value: 7, img: 'slike/Cards/7_of_spades.png' },
    { name: '8 of Spades', value: 8, img: 'slike/Cards/8_of_spades.png' },
    { name: '9 of Spades', value: 9, img: 'slike/Cards/9_of_spades.png' },
    { name: '10 of Spades', value: 10, img: 'slike/Cards/10_of_spades.png' },
    { name: 'Jack of Spades', value: 10, img: 'slike/Cards/jack_of_spades2.png' },
    { name: 'Queen of Spades', value: 10, img: 'slike/Cards/queen_of_spades2.png' },
    { name: 'King of Spades', value: 10, img: 'slike/Cards/king_of_spades2.png' }
];


var NormalBttn = document.querySelector(".buttonnormal");
var RankedBttn = document.querySelector(".buttonranked");
var displayrankprofile = document.querySelector(".displayrankprofile")




var DealerCardValue = 0;
var PlayerCardValue = 0;
var minNumber = 0;
var maxNumber = 53;
var DealerCardValue = 0;
var PlayerCardValue = 0;
var minNumber = 0;
var maxNumber = 52;
var playercardcount = 0;
var KarteDealerja = [];
var DenarIgralca = 1000;
var VlozenDenar = 100;

var zepovlecenekarte = [];
 
var DealerPrvakarta = document.querySelector(".dealerkarta1")
var DealerDrugaCartaFront = document.querySelector(".front1")
var DealerDrugaCartaBack = document.querySelector(".back1")
var cardcontainerdealer = document.querySelector(".card-container")
var playerkarta1 = document.querySelector(".card1")
var playerkarta2 = document.querySelector(".card2")
var cardcontainerplayer = document.querySelector(".player")
var displaykart = document.querySelector(".playerkarte")
const card = document.getElementById('blackjack-card');
var displaykartdealer = document.querySelector(".dealerkarte")
var hitbutton = document.querySelector(".hitbutton");
var standbutton = document.querySelector(".standbutton");

var bust = document.querySelector(".bust");
var win = document.querySelector(".win");
var draw = document.querySelector(".draw");

var displayplayerscroe = document.querySelector(".displayplayerscore");
var displaydealerscore = document.querySelector(".displaydealerscore");
var playagainbttn = document.querySelector(".playagainbttn");
var hidevsebina =  document.querySelector(".betting")

var totalgamesdb;
var totalwondb;
var totallossdb;
var totaldrawdb;

var playrank = false;

function NormalPlay(){
    NormalBttn.classList.remove("buttonranked");
    NormalBttn.classList.add("buttonnormal");
    RankedBttn.classList.add("buttonranked");
    displayrankprofile.style.display = "none";
    playrank = false;
    sessionStorage.setItem("type","normal");
}
function RankedPlay(){
    RankedBttn.classList.remove("buttonranked");
    RankedBttn.classList.add("buttonnormal");
    NormalBttn.classList.add("buttonranked");
    displayrankprofile.style.display = "grid";
    playrank = true;
    sessionStorage.setItem("type","ranked");

}



function reset(){
    window.location.reload();
}
var balance;
balance = parseInt(stringbalance);
function konecigre(){
   
    totalgamesdb = parseInt(stringstevilo_iger);
    totalwondb = parseInt(stringtotalwondb);
    totallossdb = parseInt(stringtotallossdb);
    totaldrawdb = parseInt(stringtotaldrawdb);
    RankScore =  parseInt(rank);
    sessionGames++;
    totalgamesdb++;
    
    if(PlayerCardValue > 21)
        {
             
             balance -= totalbetamount;
            
             sessionloss++;
             totallossdb++;
             if(playrank == true){
                    RankScore -=50
            }
            bust.style.display="grid";
        }
        else if (PlayerCardValue<22)
        {
             if(PlayerCardValue == 21)
             {
                 if(DealerCardValue != 21)
                 {
                     if(playercardcount == 2 )
                     {
                         balance = balance + ( 2.5 * totalbetamount);
                 
                         blackjack++;
                         sessionwon++;
                         totalwondb++;
                         if(playrank == true){
                            RankScore +=150
                        }
                        win.style.display="grid";
                     }
                     else 
                     {
                         balance = balance + 2*totalbetamount;
                         
                         sessionwon++;
                         totalwondb++;
                         if(playrank == true){
                            RankScore +=100
                        }
                        win.style.display="grid";
                     }
                 }
                 else{
                    balance = balance
               
                    sessionDraw++;
                    totaldrawdb++;
                    if(playrank == true){
                        RankScore +=50
                    }
                    draw.style.display="grid";
                 }
             }
             else if( (PlayerCardValue > DealerCardValue) && DealerCardValue < 22)
             {
                 balance = balance + (2*totalbetamount);
                 
                 sessionwon++;
                 totalwondb++;
                 if(playrank == true){
                    RankScore +=100
                }
                win.style.display="grid";
             }
             else if( (PlayerCardValue < DealerCardValue) && DealerCardValue < 22)
             {
                 
                 
                 balance = balance - totalbetamount;
                 
                 sessionloss++;
                 totallossdb++;
                 if(playrank == true){
                    RankScore -=50
                }
                bust.style.display="grid";
            
             }
             else if(DealerCardValue > 21 && PlayerCardValue <22)
             {
                balance = balance + (2*totalbetamount);
             
                 sessionwon++;
                 totalwondb++;
                 if(playrank == true){
                    RankScore +=100
                }
                win.style.display="grid";
             }
             else if (PlayerCardValue == DealerCardValue)
             {
                balance = balance
               
                sessionDraw++;
                totaldrawdb++;
                if(playrank == true){
                    RankScore +=50
                }
                draw.style.display="grid";
             }
        }



        $.post('updatedb.php',{
            postbalance:balance,postblackjack:blackjack,postsessiongames:sessionGames,postsessionloss:sessionloss,possessionwin:sessionwon,postsessiondraw:sessionDraw, totalwon:totalwondb,totalloss:totallossdb,totaldraw:totaldrawdb,totalgames:totalgamesdb, rank:RankScore},
            function(data){
                console.log(data);
            });
        
        











    
    
    playagainbttn.style.display = "inline-block"
}


function GameStart(){
   


    

    var CardNumber =  RandomInt(minNumber,maxNumber);
    PlayerCardValue += karte[CardNumber].value;
    cardcontainerplayer.style.display = "grid"
    
    cardcontainerdealer.style.display = "block"
    
    displaydealerscore.style.display ="block";
   
    playerkarta1.src = karte[CardNumber].img;
    

    playercardcount++;
    zepovlecenekarte.push(CardNumber);
    displayplayerscroe.innerHTML = "Player score: " + PlayerCardValue;

   
    while(true)
    {
        var jezeuporabljena = false;
        var CardNumber =  RandomInt(minNumber,maxNumber);
        for(var z=0;z<zepovlecenekarte.length; z++) 
        {
            if(CardNumber == zepovlecenekarte[z])
            {
                jezeuporabljena == true
            }
        }
        if(jezeuporabljena == false){
            zepovlecenekarte.push(CardNumber)
            break;
        }

    
    }
    
    DealerCardValue += karte[CardNumber].value;
    DealerPrvakarta.src = karte[CardNumber].img;
    DealerPrvakarta.style.display="block";
    displaydealerscore.innerHTML = "Dealer score: " + DealerCardValue;
   
    
    while(true)
    {
        var jezeuporabljena = false;
        var CardNumber =  RandomInt(minNumber,maxNumber);
        for(var z=0;z<zepovlecenekarte.length; z++) 
        {
            if(CardNumber == zepovlecenekarte[z])
            {
                jezeuporabljena == true
            }
        }
        if(jezeuporabljena == false){
            zepovlecenekarte.push(CardNumber)
            break;
        }

    
    }
    

    if(karte[CardNumber].value == 11)
    {
        if(PlayerCardValue + karte[CardNumber].value >21)
        {
            PlayerCardValue += 1;
        }
        else PlayerCardValue += karte[CardNumber].value;
    }
    else{
        PlayerCardValue += karte[CardNumber].value    
    }
    playerkarta2.src = karte[CardNumber].img;
    playercardcount++;
    displayplayerscroe.innerHTML = "Player score: " + PlayerCardValue;

    while(true)
    {
        var jezeuporabljena = false;
        var CardNumber =  RandomInt(minNumber,maxNumber);
        for(var z=0;z<zepovlecenekarte.length; z++) 
        {
            if(CardNumber == zepovlecenekarte[z])
            {
                jezeuporabljena == true
            }
        }
        if(jezeuporabljena == false){
            zepovlecenekarte.push(CardNumber)
            break;
        }

    
    }
    
    if(karte[CardNumber].value == 11)
    {
        if(DealerCardValue + karte[CardNumber].value >21)
        {
            DealerCardValue += 1;
        }
        else DealerCardValue += karte[CardNumber].value;
    }
    else{
        DealerCardValue += karte[CardNumber].value    
    }
    DealerDrugaCartaFront.src = "slike/Cards/backofcard1.png";
    DealerDrugaCartaBack.src = karte[CardNumber].img;


   


}


function RandomInt(min, max)
{
    return  Math.floor(Math.random() * (max - min)) + min;
}


function HitButtonClicked(){

    if(PlayerCardValue <22)
    {

        if(PlayerCardValue == 21)
        {
            if(playercardcount == 2)
            {
                
                StandButtonClicked();
              
            }
            else{
                StandButtonClicked();
            }

        }
        else{

            if(displaykart.style.gridTemplateColumns == "")
            {
            displaykart.style.gridTemplateColumns="auto auto"
            }
    
            displaykart.style.gridTemplateColumns += " auto";
    
        
        
            while(true)
            {
                var jezeuporabljena = false;
                var CardNumber =  RandomInt(minNumber,maxNumber);
                for(var z=0;z<zepovlecenekarte.length; z++) 
                {
                    if(CardNumber == zepovlecenekarte[z])
                    {
                        jezeuporabljena == true
                    }
                }
                if(jezeuporabljena == false){
                    zepovlecenekarte.push(CardNumber)
                    break;
                }
        
            
            }
            
            if(karte[CardNumber].value == 11)
            {
                if(PlayerCardValue + karte[CardNumber].value >21)
                {
                    PlayerCardValue += 1;
                }
                else PlayerCardValue += karte[CardNumber].value;
            }
            else{
                PlayerCardValue += karte[CardNumber].value    
            }
            playercardcount++;
            displayplayerscroe.innerHTML = "Player score: " + PlayerCardValue;
            displaykart.innerHTML += "<div><img src='"+karte[CardNumber].img+"'  class='CardsDisplay'></div>"
       

            if(PlayerCardValue>21)
            {
            
            
                StandButtonClicked();
                
            }

            }

            

    }
    else{
        
        StandButtonClicked();

    }

   

}

function StandButtonClicked(){

    hitbutton.disabled="true";
    standbutton.disabled = "true";
    hitbutton.style.backgroundColor = "#555555"
    standbutton.style.backgroundColor = "#555555"
    
    card.classList.toggle('flipped');
  
    displaydealerscore.innerHTML = "Dealer score: " + DealerCardValue;
     
  
    
    while(true)
    {
        if(DealerCardValue < 17)
        {
            card.style.transition = "0.5s";
            
           
            if(displaykartdealer.style.gridTemplateColumns == "")
            {
                displaykartdealer.style.gridTemplateColumns="auto auto"
            }
        
            displaykartdealer.style.gridTemplateColumns += " auto";
       
    
    
            while(true)
            {
                var jezeuporabljena = false;
                var CardNumber =  RandomInt(minNumber,maxNumber);
                for(var z=0;z<zepovlecenekarte.length; z++) 
                {
                    if(CardNumber == zepovlecenekarte[z])
                    {
                        jezeuporabljena == true
                    }
                }
                if(jezeuporabljena == false){
                    zepovlecenekarte.push(CardNumber)
                    break;
                }
        
            
            }
     
            if(karte[CardNumber].value == 11)
            {
                if(DealerCardValue + karte[CardNumber].value >21)
                {
                    DealerCardValue += 1;
                }
                else DealerCardValue += karte[CardNumber].value;
            }
            else{
                DealerCardValue += karte[CardNumber].value    
            }
            displaydealerscore.innerHTML = "Dealer score: " + DealerCardValue;    
            var newDiv = document.createElement('div');
            var newImage = document.createElement('img');
            newImage.src = karte[CardNumber].img;
            newImage.classList.add('CardsDisplay');
            newDiv.appendChild(newImage);
            displaykartdealer.appendChild(newDiv);
         
    
        }
        else{
           
            break;
            
        }

    }

    konecigre();
   
}

