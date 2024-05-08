<?php 


session_start();

if (isset($_SESSION["uname"]) && $_SESSION["pass"]){
  
}
else{
    header("location:PlayNow.php");
}

$sessionUsername = $_SESSION["uname"];
$sessionPassword = $_SESSION["pass"];

$test ="test";
$_SESSION["test"]=$test;
function Izpis(){
    session_destroy();
    header("location:main.html");
}

if(isset($_POST['Izpis'])){
    Izpis();
    exit(); 
}

if(isset($_SESSION["sessionwon"]))
{
    $sessionwon = $_SESSION["sessionwon"];
    $sessiondraw =  $_SESSION["sessiondraw"];
    $sessiongames =$_SESSION["sessiongames"];
    $sessionloss=  $_SESSION["sessionloss"];
    $BlackJack=  $_SESSION["BlackJack"];

}
else{

    $sessionwon = 0;
    $sessiondraw = 0;
    $sessiongames = 0;
    $sessionloss=  0;
    $BlackJack=0;

}



$servername = "localhost";
$Serverusername = "projekt";
$Serverpassword = "gesloprojekta";
$dbname = "uporabniki";
$result;
$conn =new mysqli($servername, $Serverusername, $Serverpassword, $dbname);

$sql = "SELECT Username,balance,ProfilePicture,stevilo_iger,zmage,porazi,SteviloIzenacenih FROM uporabniki.uporabnik JOIN uporabniki.podatkiuporabnika ON uporabniki.uporabnik.id_uporabnika=uporabniki.podatkiuporabnika.uporabnik WHERE Username = '" . $sessionUsername."'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
        $balance = $row['balance'];
        $stevilo_iger = $row['stevilo_iger'];
        $totalwondb = $row['zmage'];
        $totallossdb = $row['porazi'];
        $totaldrawdb = $row['SteviloIzenacenih'];
        $ProfilePicture = $row['ProfilePicture'];
        }
}

$sql = "SELECT RankScore FROM uporabniki.rank JOIN uporabniki.uporabnik ON uporabniki.rank.UserID=uporabniki.uporabnik.id_uporabnika WHERE Username = '" . $sessionUsername."'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
        $rankdisplay = $row['RankScore'];
       
        }
}


$rankimage = $_SESSION["currentimage"];


?>

<script>
    var blackjack = <?php echo $BlackJack ?>;
    var sessionwon = <?php echo $sessionwon ?>;
    var sessionloss = <?php echo $sessionloss ?>;
    var sessionDraw = <?php echo $sessiondraw ?>;
    var sessionGames =<?php echo $sessiongames ?>;
</script>


<!DOCTYPE html>
<html lang="en" class="backgroundtable" id="original">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
        <title>BlackJack</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <style>
            <?php include "style2.css" ?>
        </style>
       
    </head>

    <body class="backgroundtable">
    <nav class="sidebar" style="color:white;">
            <div class="logo-menu">
                <h2 style="color: white;" class="LOGOSIDEBAR">BLACKJACK</h1>
                <span><svg xmlns="http://www.w3.org/2000/svg" height="18"  width="50" fill="#ffffff"  class ="bttn"><path d="M21 6H3V5h36v1zm0 5H3v1h36v-1zm0 6H3v1h36v-1z"></path></svg></span>
            </div>
            <ul class="list">
                <li class="list-item sidebar-item1 " class="sidebar-povezava">
                    <div>
                        <img src="slike/home_7955459.png" alt="" >
                        <span class="Name">HOME</span>
                    </div>
                </li>
                <li class="list-item sidebar-item2 active" class="sidebar-povezava">
                    <div>
                        <img src="slike/blackjack.png" alt="" >
                        <span class="Name">PLAY</span>
                    </div>
                </li>
                <li class="list-item sidebar-item3" class="sidebar-povezava">
                    <div>
                        <img src="slike/račun.png" alt="" >
                        <span class="Name">ACCOUNT</span>
                    </div>
                
                    
                </li>
                <li class="list-item sidebar-item4 " class="sidebar-povezava">
                    <div>
                        <img src="slike/rank.png" alt="" >
                        <span class="Name">RANK</span>
                    </div>
                </li>
                <li class="list-item sidebar-item5" class="sidebar-povezava">
                    <div>
                        <img src="slike/leaderboard.png" alt="" >
                        <span class="Name">LEADERBOARD</span>
                    </div>
                </li>
                <li class="list-item sidebar-item6" class="sidebar-povezava">
                    <div>
                        <img src="slike/statistic.png" alt="" >
                        <span class="Name">STATISTICS</span>
                    </div>
                </li>


                <li class="list-item izpis" class="sidebar-povezava">

                    <div>   
                        <a href="logout.php" style="    font-size: 21px;color: white;text-decoration: none;font-family: FontBesedilo1;display: flex;align-items: center;border-radius: 6px;transition: .5s;" >
                            <img src="slike/logout.png" alt="" >
                            <span class="Name">LOG OUT</span>
                        </a>

                    </div>
                
                </li>
            
            
            </ul>

        </nav>
     
        <script src="sidebar.js"></script>
        <script src="dashboard2.js"></script>

        <div class="BlackJackButoons">
            <button class="buttonnormal" onclick="NormalPlay();">Normal</button>
            <button class="buttonranked" onclick="RankedPlay();">Ranked</button>
        </div>

        <div>
            <div class = "dealerkarte">
                    <div >
                        <img src=""  class="CardsDisplay dealerkarta1">
                    </div>
                    <div>
                        <div class="card-container">
                            <div class="card" id="blackjack-card" >
                                <div class="front">
                                    <img src="" alt="" class="CardsDisplay front1">
                                </div>
                                <div class="back">
                                    <div>
                                    <img src="" alt="" class="CardsDisplay back1" >
                                    </div>
                                    
                                </div>
                            </div>

                        
                        
                            
                        </div>
                        
                    
                    </div>
                    <div class="displaydealerscore">
                        Dealer score: 0
                    </div>

                
                    

            </div>
            
      
          
     

        </div>
      
      

       

        <div class="displayblackjack" >

            <div class="betting">
                
                    <div style="color:white;font-family:Pisava2;font-size:30px;margin-bottom:5px">
                        Place your bet!
                    </div>

                    <div class="chipsdisplay">

                        <img src="slike/chips/5.png" alt="" class="chipsslike chip5">
                        <img src="slike/chips/25.png" alt="" class="chipsslike chip25">
                        <img src="slike/chips/100.png" alt="" class="chipsslike chip100">
                        <img src="slike/chips/500.png" alt="" class="chipsslike chip500">
                        <img src="slike/chips/1000.png" alt="" class="chipsslike chip1000">
                        <img src="slike/chips/5000.png" alt="" class="chipsslike chip5000">


                    </div>
                        <div class="arrowdisplay">

                        

                            <div class="arrow-container" >
                                <svg class="arrow-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"   style=" stroke: rgba(255, 255, 255, 0.3);"><path d="M9 18l6-6-6-6"></path></svg>
                                <svg class="arrow-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"   style=" stroke: rgba(255, 255, 255, 0.5);"><path d="M9 18l6-6-6-6"></path></svg>
                                <svg class="arrow-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"   style=" stroke: rgba(255, 255, 255, 0.8);"><path d="M9 18l6-6-6-6"></path></svg>
                                <svg class="arrow-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"   style=" stroke: rgba(255, 255, 255, 1);margin-right: 10px;"><path d="M9 18l6-6-6-6"></path></svg>
                            
                            </div>
                            <div>
                                <div class="chipprikazbeta">
                                    <img src="slike/chips/0.png" alt="" class="chipsslike" id="betchip" style="width: 150px;">
                                    <div class="prikazbeta betamount">
                                        0$
                                    </div>
                                </div>
                              

                            </div>
                            <div class="arrow-container ">
                                <svg class="arrow-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  style=" stroke: rgba(255, 255, 255, 1);margin-left:10px;"><path d="M15 18l-6-6 6-6"></path></svg>
                                <svg class="arrow-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  style=" stroke: rgba(255, 255, 255, 0.8);"><path d="M15 18l-6-6 6-6"></path></svg>
                                <svg class="arrow-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  style=" stroke: rgba(255, 255, 255, 0.5);"><path d="M15 18l-6-6 6-6"></path></svg>
                                <svg class="arrow-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  style=" stroke: rgba(255, 255, 255, 0.3);"><path d="M15 18l-6-6 6-6"></path></svg>

                            </div>    

                        </div>
                        <div class="buttonbets">

                            <button class="betbutton" >BET!</button>
                            <button class="redo">
                                <div>
                                    <img src="slike/redo.png" alt="" class="redo-slika">
                                </div>
                                
                            </button>

                        </div>

            </div>


         


        </div>

        <div class="displayresult">

                
            <div class="bust">
                <div>
                    <img src="slike/bust.png" alt="">
                </div>
                <div>
                    LOSE!
                </div>
               
            </div>
            <div class="win">
                <div>
                    <img src="slike/win.png" alt="">
                </div>
                <div>
                    WIN!
                </div>

            </div>
            <div class="draw">
                <div>
                    <img src="slike/draw.png" alt="">
                </div>
                <div>
                    DRAW!
                </div>

            </div>
        
        </div>

        <div class="game">


        <div class="player">

                <div  class ="playerkarte">
                    <div>
                    <img src="" alt="" class="CardsDisplay card1">
                    </div>
                    <div>
                    <img src="" alt="" class="CardsDisplay card2">
                    </div>

                </div>

                <div class="displayplayerscore">
                    Player score: 0
                </div>
                <div class="hitstandbuttons">
                    <button onclick = "HitButtonClicked();" class="hitbutton">
                        <img src="slike/hiticon.png" alt="" style="width: 35px; position:absolute;top:50%;left:50%;transform: translate(-50%, -50%);">
                    </button>
                    <button onclick = "StandButtonClicked();" class ="standbutton">
                        <img src="slike/standicon.png"  style="width: 35px; position:absolute;top:50%;left:50%;transform: translate(-50%, -50%);">
                    </button>

                    <button class ="playagainbttn" onclick="reset();" >
                        <img src="slike/redo.png"  style="width: 35px; position:absolute;top:50%;left:50%;transform: translate(-50%, -50%);">
                    </button>
                </div>

        </div>
        
        </div>


        <div class="displayprofile">
           
            <div style="margin-right:10px; border:solid 2px transparent ">
                Balance: 
                <?php echo $balance ?>
                $
            </div>
            <a href="Dashboard.php" class="profilelink"> <img src="<?php echo $ProfilePicture ?>" alt="" class="blackjackprofilepicture"></a>

           
           

        </div>
        <div class="displayrankprofile">
                <div>
                    Rank: <?php echo $rankdisplay  ?>
                </div>
                <div>
                    <img src="<?php echo $rankimage  ?>" alt="" style=" width: 70px;">
                </div>
        </div>
           
     

        <script>
            var stringbalance = "<?php echo $balance; ?>";
            var rank = "<?php echo $rankdisplay; ?>";
            var stringtotalwondb = "<?php echo $totalwondb; ?>";
            var stringtotaldrawdb = "<?php echo $totallossdb; ?>";
            var stringstevilo_iger = "<?php echo $stevilo_iger; ?>";
            var stringtotallossdb = "<?php echo $totallossdb; ?>";
        </script>


        <script src="betscript.js"></script>
        <script src="BlackJackLogic1.js"> </script>


      
        

     
        

        <script>
            if(sessionStorage.getItem("type")=="normal")
            {
                NormalPlay();
            }
            else if (sessionStorage.getItem("type")=="ranked"){
                RankedPlay();
            }

        </script>
        
    </body>
</html>

<?php


?>