<?php
session_start();

if (isset($_SESSION["uname"]) && $_SESSION["pass"]){
  
}
else{
    header("location:PlayNow.php");
}

$sessionUsername = $_SESSION["uname"];
$sessionPassword = $_SESSION["pass"];


$servername = "localhost";
$Serverusername = "projekt";
$Serverpassword = "gesloprojekta";
$dbname = "uporabniki";
$result;
$conn =new mysqli($servername, $Serverusername, $Serverpassword, $dbname);

$balance = $_POST["postbalance"];
$totalgames = $_POST["totalgames"];
$totalwon = $_POST["totalwon"];
$totalloss = $_POST["totalloss"];
$totaldraw = $_POST["totaldraw"];

$rankscore = $_POST["rank"];

$sessiongames = $_POST["postsessiongames"];
$sessionwon = $_POST["possessionwin"];
$sessionloss = $_POST["postsessionloss"];
$sessiondraw = $_POST["postsessiondraw"];
$BlackJack = $_POST["postblackjack"];

$sql = "UPDATE uporabniki.podatkiuporabnika AS podatki
        JOIN uporabniki.uporabnik AS uporabnik
        ON podatki.uporabnik = uporabnik.id_uporabnika
        SET podatki.balance = $balance,
            podatki.stevilo_iger = $totalgames,
            podatki.zmage = $totalwon,
            podatki.porazi = $totalloss,
            podatki.SteviloIzenacenih = $totaldraw
        WHERE uporabnik.Username = '$sessionUsername'";
$result = mysqli_query($conn, $sql);

$sql = "UPDATE uporabniki.rank AS rank
        JOIN uporabniki.uporabnik AS uporabnik
        ON rank.UserID = uporabnik.id_uporabnika
        SET rank.RankScore = $rankscore
        WHERE uporabnik.Username = '$sessionUsername'";
$result = mysqli_query($conn, $sql);


$sql = "UPDATE uporabniki.sejaigre AS seja
        JOIN uporabniki.uporabnik AS uporabnik
        ON seja.IDUporabnika = uporabnik.id_uporabnika
        SET seja.BlackJack = $BlackJack,
            seja.TotalWonAmount = $sessionwon,
            seja.TotalLossAmount = $sessionloss,
            seja.TotalDrawAmount = $sessiondraw,
            seja.TotalGames = $sessiongames
        WHERE uporabnik.Username = '$sessionUsername'";
$result = mysqli_query($conn, $sql);

$_SESSION["sessionwon"]=$sessionwon;
$_SESSION["sessiondraw"]=$sessiondraw;
$_SESSION["sessiongames"]=$sessiongames;
$_SESSION["sessionloss"]=$sessionloss;
$_SESSION["BlackJack"]=$BlackJack;

echo "balance: ".$balance;

?>
