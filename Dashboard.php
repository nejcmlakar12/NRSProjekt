<?php
session_start();

if (isset($_SESSION["uname"]) && $_SESSION["pass"]) {
} else {
    header("location:PlayNow.php");
}

$newpassworderror="";

$sessionUsername = $_SESSION["uname"];
$sessionPassword = $_SESSION["pass"];
$servername = "localhost";
$Serverusername = "projekt";
$Serverpassword = "gesloprojekta";
$dbname = "uporabniki";
$result;
$conn = new mysqli($servername, $Serverusername, $Serverpassword, $dbname);
$ime = "";
$priimek = "";
$username = "";
$Email = "";
$ProfilePicture = "";
$userrank = "";
$previousrankname = "";
$nextrankname = "";
if (isset($_POST["update_image"]))
{

    if(isset($_FILES["file"]["name"])) {
        $file_name = $_FILES["file"]["name"];
        $file_tmp = $_FILES["file"]["tmp_name"];
        $file_error = $_FILES["file"]["error"];
    
        $upload_dir = "userprofilepictures/";
    
        if ($file_error === 0) {
            if (move_uploaded_file($file_tmp, $upload_dir . $file_name)) {
               
                    $sql = "UPDATE uporabniki.podatkiuporabnika AS podatki
                    JOIN uporabniki.uporabnik AS uporabnik
                    ON podatki.uporabnik = uporabnik.id_uporabnika
                    SET podatki.ProfilePicture ='$upload_dir$file_name'
                    WHERE uporabnik.Username = '$sessionUsername'";
            $result = mysqli_query($conn, $sql);
                
    
            } else {
                echo "Failed to move uploaded file.";
            }
        } else {
            echo "File upload error: " . $file_error;
        }
    }
    else{
        echo"nedela";
    }
    
}
else{
    echo"nedela2";  
}

if (isset($_POST["newpasswordsubmit"])) {
    if(isset($_POST["newpassword"]) && isset($_POST["newpasswordrepeat"])) {
        $newpassword = $_POST["newpassword"];
        $newpasswordrepeat = $_POST["newpasswordrepeat"];
        if($newpassword == "" && $newpasswordrepeat == ""){
            $newpassworderror = "empty new password";       
        } else {
            if($newpassword == $newpasswordrepeat) {
                
                $hashed_password = password_hash($newpassword, PASSWORD_DEFAULT);

                
                $sql = "UPDATE uporabniki.uporabnik 
                        SET password = '$hashed_password'
                        WHERE uporabnik.Username = '$sessionUsername'";
                $result = mysqli_query($conn, $sql);
                if($result) {
                    $newpassworderror = "Password changed!";  
                } else {
                    $newpassworderror = "Failed to change password!";  
                }
            } else {
                $newpassworderror = "Passwords don't match!";  
            }
        }
    }
}

$displayuname;
$displaynameandsuranme;
$displaynumofwins;
$displayphoto;
$userposition = 0;
$displayrankscore;
$ranks = [
    0 => 'slike/Ranks/Rank1/stage1/1.png',
    100 => 'slike/Ranks/Rank1/stage1/2.png',
    300 => 'slike/Ranks/Rank1/stage1/3.png',
    600 => 'slike/Ranks/Rank1/stage1/4.png',
    1000 => 'slike/Ranks/Rank1/stage1/5.png',
    1500 => 'slike/Ranks/Rank1/stage2/1.png',
    2100 => 'slike/Ranks/Rank1/stage2/2.png',
    2800 => 'slike/Ranks/Rank1/stage2/3.png',
    3600 => 'slike/Ranks/Rank1/stage2/4.png',
    4500 => 'slike/Ranks/Rank1/stage2/5.png',
    5500 => 'slike/Ranks/Rank2/stage1/1.png',
    6600 => 'slike/Ranks/Rank2/stage1/2.png',
    7800 => 'slike/Ranks/Rank2/stage1/3.png',
    9100 => 'slike/Ranks/Rank2/stage1/4.png',
    10500 => 'slike/Ranks/Rank2/stage1/5.png',
    12000 => 'slike/Ranks/Rank2/stage2/1.png',
    13600 => 'slike/Ranks/Rank2/stage2/2.png',
    15300 => 'slike/Ranks/Rank2/stage2/3.png',
    17100 => 'slike/Ranks/Rank2/stage2/4.png',
    19000 => 'slike/Ranks/Rank2/stage2/1.png',
    21000 => 'slike/Ranks/Rank3/stage1/1.png',
    23100 => 'slike/Ranks/Rank3/stage1/2.png',
    25300 => 'slike/Ranks/Rank3/stage1/3.png',
    27600 => 'slike/Ranks/Rank3/stage1/4.png',
    30000 => 'slike/Ranks/Rank3/stage1/6.png',
    32500 => 'slike/Ranks/Rank3/stage1/7.png',
    35100 => 'slike/Ranks/Rank3/stage2/1.png',
    37800 => 'slike/Ranks/Rank3/stage2/2.png',
    40600 => 'slike/Ranks/Rank3/stage2/3.png',
    43500 => 'slike/Ranks/Rank3/stage2/4.png',
    46500 => 'slike/Ranks/Rank3/stage2/5.png',
    49600 => 'slike/Ranks/Rank3/stage2/6.png',


];

$ranknames = [
    0 => 'Novice',
    100 => 'Apprentice',
    300 => 'Rookie',
    600 => 'Beginner',
    1000 => 'Cadet',
    1500 => 'Trainee',
    2100 => 'Amateur',
    2800 => 'Learner',
    3600 => 'Enthusiast',
    4500 => 'Challenger',
    5500 => 'Competitor',
    6600 => 'Contender',
    7800 => 'Ace',
    9100 => 'Prodigy',
    10500 => 'Sharpshooter',
    12000 => 'Maverick',
    13600 => 'Virtuoso',
    15300 => 'Expert',
    17100 => 'Maestro',
    19000 => 'Grandmaster',
    21000 => 'Legend',
    23100 => 'Elite',
    25300 => 'Master',
    27600 => 'Shark',
    30000 => 'High Roller',
    32500 => 'Blackjack <br> King/Queen',
    35100 => 'VIP',
    37800 => 'High Stakes Player',
    40600 => 'Imortal',
    43500 => 'Blackjack Master',
    46500 => 'Casino Champion',
    49600 => "World Series <br>Contender",

];

$rankscore = 0;
$sql = "SELECT ime_uporabnika, priimek_uporabnika, Username, email FROM uporabniki.uporabnik 
WHERE Username = '" . $sessionUsername . "'";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
        $ime = $row['ime_uporabnika'];
        $priimek = $row['priimek_uporabnika'];
        $username = $row['Username'];
        $Email = $row['email'];
    }
}
$sql = "SELECT ProfilePicture FROM uporabniki.podatkiuporabnika 
JOIN uporabniki.uporabnik ON uporabniki.podatkiuporabnika.uporabnik = uporabniki.uporabnik.id_uporabnika 
WHERE Username = '" . $sessionUsername . "'";

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
        $ProfilePicture = $row['ProfilePicture'];
    }
}




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <style>
        <?php include "style2.css" ?>
    </style>

    </style>
</head>

<body class="loginBackground">

    <nav class="sidebar" style="color:white;">
        <div class="logo-menu">
            <h2 style="color: white;" class="LOGOSIDEBAR">BLACKJACK</h1>
                <span><svg xmlns="http://www.w3.org/2000/svg" height="18" width="50" fill="#ffffff" class="bttn">
                        <path d="M21 6H3V5h36v1zm0 5H3v1h36v-1zm0 6H3v1h36v-1z"></path>
                    </svg></span>
        </div>
        <ul class="list">
            <li class="list-item sidebar-item1 x active " class="sidebar-povezava">
                <div class="i1">
                    <img src="slike/home_7955459.png" alt="" class="i1">
                    <span class="Name i1 ">HOME</span>
                </div>
            </li>
            <li class="list-item sidebar-item2" class="sidebar-povezava">
                <div class="i2">
                    <img src="slike/blackjack.png" alt="" class="i2">
                    <span class="Name i2">PLAY</span>
                </div>
            </li>
            <li class="list-item sidebar-item3" class="sidebar-povezava">
                <div class="i3">
                    <img src="slike/račun.png" alt="" class="i3">
                    <span class="Name i3">ACCOUNT</span>
                </div>


            </li>
            <li class="list-item sidebar-item4" class="sidebar-povezava">
                <div class="i4">
                    <img src="slike/rank.png" alt="" class="i4">
                    <span class="Name i4">RANK</span>
                </div>
            </li>
            <li class="list-item sidebar-item5" class="sidebar-povezava">
                <div class="i5">
                    <img src="slike/leaderboard.png" alt="" class="i5">
                    <span class="Name i5">LEADERBOARD</span>
                </div>
            </li>
            <li class="list-item sidebar-item6" class="sidebar-povezava">
                <div class="i6">
                    <img src="slike/statistic.png" alt="" class="i6">
                    <span class="Name i6">STATISTICS</span>
                </div>
            </li>


            <li class="list-item izpis" class="sidebar-povezava">

                <div>
                    <a href="logout.php" style="    font-size: 21px;color: white;text-decoration: none;font-family: FontBesedilo1;display: flex;align-items: center;border-radius: 6px;transition: .5s;">
                        <img src="slike/logout.png" alt="">
                        <span class="Name">LOG OUT</span>
                    </a>

                </div>

            </li>


        </ul>

    </nav>
    <script src="sidebar.js"></script>




    <div class="OstalaVesbina">


        <div class="displaydashboard">

            <div class="ImeIgralca">
                Welcome <?php echo $_SESSION["uname"] . "!" ?>
            </div>

            <div class="grid-container">
                <div class="item1">
                    <a href="blackjack1.php" style="position: absolute; top:5%;left:5%; cursor: pointer;  "><button class="playgumb">PLAY!</button></a>
                    


                </div>
                <div class="item2">

                    <div class="grid-naslov item2-naslov">
                        <img src="slike/rank.png" alt="" style="width: 35px;">
                        <span>RANK</span>
                    </div>
                    <div class="item2-besedilo">

                        <?php
                      $sql = "SELECT RankScore FROM uporabniki.rank 
                      JOIN uporabniki.uporabnik ON uporabniki.rank.UserID = uporabniki.uporabnik.id_uporabnika 
                      WHERE Username = '" . $sessionUsername . "'";
                        
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                        
                            while ($row = mysqli_fetch_assoc($result)) {
                                $rankscore = $row['RankScore'];
                            }
                        }
                   
                        
                        
                        
                        ?>

                        <br>
                        <?php
                        $previousPoints = null;
                        $previousImage = null;
                        $currentPoints = null;
                        $currentImage = null;
                        $nextPoints = null;
                        $nextImage = null;
                        $percentage = 0;

                        foreach ($ranks as $points => $image) {
                            if ($rankscore >= $points) {
                                $previousPoints = $currentPoints;
                                $previousImage = $currentImage;
                                $currentPoints = $points;
                                $currentImage = $image;
                                $closestRankPoints = $points;
                            } else {
                                $nextPoints = $points;
                                $nextImage = $image;
                                break;
                            }
                        }

                        foreach ($ranknames as $points => $rankName) {
                            if ($rankscore >= $points) {
                                $previousrankname = $userrank;
                            } else {
                                $nextrankname = $rankName;
                                break;
                            }
                            $userrank = $rankName;
                        }



                        if ($nextPoints !== null && $previousPoints !== null) {

                            $percentage = ((($rankscore - $closestRankPoints) * 100) / ($nextPoints - $closestRankPoints));
                        }
                        
                        if($rankscore<100)
                        {
                            
                            echo '
                            <div class="displayrank">
                                <img src="" alt="" style="width: 0px;filter:grayscale(1);">
                                <img src="' . $currentImage . '" alt="" style="width: 200px;">
                                <img src="' . $nextImage . '" alt="" style="width: 200px;filter:grayscale(1);">
                                <div style="margin-top:10px;">' . $previousrankname . '</div>
                                <div style="margin-top:10px;">' . $userrank . '</div>
                                <div style="margin-top:10px;">' . $nextrankname . '</div>
                            </div>
                            <div>
                                <div class="displayprogress" >
                                   
                                    <span class="closest" style="margin-right:2%">' . $closestRankPoints . '</span>
                                    <progress max="100" value="' . $rankscore . '" style="width: 80%;height:50px;"></progress>    
                                    <span  class="next" style="margin-left:2%">' . $nextPoints . '</span>

                                    
                                 
                                    
                                </div>
                                
                            </div>';
                            
                        }
                        else if ($rankscore >=49600)
                        {
                            echo '
                            <div class="displayrank">
                                <img src="' . $previousImage . '" alt="" style="width: 200px;filter:grayscale(1);">
                                <img src="' . $currentImage . '" alt="" style="width: 200px;">
                                <img src="' . $nextImage . '" alt="" style="width: 200px;filter:grayscale(1);">
                                <div style="margin-top:10px;">' . $previousrankname . '</div>
                                <div style="margin-top:10px;">' . $userrank . '</div>
                                <div style="margin-top:10px;">' . $nextrankname . '</div>
                            </div>
                            <div>
                                <div class="displayprogress" >
                                   
                                
                                    <span  class="next" style="margin-left:2%">' . $nextPoints . '</span>

                                    <div> Congratulations! You reached the max rank!</div>
                                 
                                    
                                </div>
                                
                            </div>';

                        }
                        else{
                            echo '
                            <div class="displayrank">
                                <img src="' . $previousImage . '" alt="" style="width: 200px;filter:grayscale(1);">
                                <img src="' . $currentImage . '" alt="" style="width: 200px;">
                                <img src="' . $nextImage . '" alt="" style="width: 200px;filter:grayscale(1);">
                                <div style="margin-top:10px;">' . $previousrankname . '</div>
                                <div style="margin-top:10px;">' . $userrank . '</div>
                                <div style="margin-top:10px;">' . $nextrankname . '</div>
                            </div>
                            <div>
                                <div class="displayprogress" >
                                   
                                    <span class="closest" style="margin-right:2%">' . $closestRankPoints . '</span>
                                    <progress max="100" value="' . $percentage . '" style="width: 80%;height:50px;"></progress>    
                                    <span  class="next1" style="margin-left:2%">' . $nextPoints . '</span>

                                    
                                 
                                    
                                </div>
                                
                            </div>';

                        }

                     
                       

                            $_SESSION["currentimage"] = $currentImage;
                            $_SESSION["currentrank"] = $userrank;
                        ?>

                        <div class="displaycurrent">
                            Current Points:
                            <?php echo $rankscore; ?>
                            <?php echo "<br>" ?>
                            <div style="margin-top: 8px;">
                                Your Rank is:
                                <?php echo $userrank; ?>
                            </div>

                            <?php echo "<br>" ?>

                        </div>

                        <div class="displaylearnmore">
                            Learn about ranks <a href="rank.html">more</a> here!
                        </div>

                    </div>

                </div>
                <div class="item3">

                    <div class="grid-naslov item3-naslov">
                        <img src="slike/račun.png" alt="" style="width: 40px;">
                        <div>ACCOUNT</div>
                        
                    </div>
                    <div class="item3-besedilo">

                        <div class="displayaccount">
                            <div >
                                
                                <img src="<?php echo $ProfilePicture?>" alt="" class="profilepicture">
                           
                            </div>
                           
                            <div>
                                 <div class="displayacountinfo" style="margin-bottom:20px">
                                    <span style="margin-left:13px">Username: <?php echo $username ?></span>
                                 </div>
                                 <div  class="displayacountinfo" style="margin-bottom:20px">
                                    <span style="margin-left:13px">Name: <?php echo $ime." ".$priimek ?></span>
                                 </div>
                                 <div class="displayacountinfo">
                                    <span style="margin-left:13px">Email: <?php echo $Email ?></span>
                                 </div>
                            </div>
                        </div>
                        <div class="newpassword">

                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

                                <span style="margin-left: 2%;">New Password:</span>
                                <input type="password" name="newpassword" id="" class="newgesloinput" ><br>
                                <span style="margin-left: 2%;">Repeat Password:</span>
                                <input type="password" name="newpasswordrepeat" id="" class="newgesloinput"><br>
                                <input type="submit" name="newpasswordsubmit" id="" class="newpasswordsubmitbttn">
                                <span style="font-size: 20px;">
                                    <?php echo $newpassworderror ?>
                                </span>    
                                
                            </form>
                            <div>
                                <div>
                                    Change Image
                                </div>
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
                                        <input type="file" name="file" accept="image/*" class="inputfile">
                                        <input type="submit" name="update_image" id=""  class="newpasswordsubmitbttn">
                                </form>
                            </div>
                         
                        
                        </div>


                        
                    
                        










                    </div>

                </div>
                <div class="item4">

                    <div class="grid-naslov item4-naslov">
                        <img src="slike/leaderboard.png" alt="" style="width: 40px;">
                        <span style="font-size:45px;">LEADERBOARD</span>
                    </div>
                    <div class="item4-besedilo">


                        <div class="hidewins">


                            <div class="displaypodium">

                                <?php


                                $sql = "SELECT ime_uporabnika,priimek_uporabnika,Username,ProfilePicture FROM uporabniki.uporabnik JOIN uporabniki.podatkiuporabnika ON uporabniki.uporabnik.id_uporabnika=uporabniki.podatkiuporabnika.uporabnik ORDER BY zmage DESC LIMIT 2  ";
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {

                                    $counter = 0;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $counter++;

                                        if ($counter = 2) {
                                            $displayuname = $row["Username"];
                                            $displaynameandsuranme = $row["ime_uporabnika"] . " " . $row["priimek_uporabnika"];
                                            $displayphoto = $row["ProfilePicture"];
                                        }
                                    }
                                }


                                $sql = "SELECT * FROM uporabniki.podatkiuporabnika ORDER BY zmage DESC LIMIT 2 ";
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {

                                    $counter = 0;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $counter++;

                                        if ($counter = 2) {
                                            $displaynumofwins = $row["zmage"];
                                        }
                                    }
                                }

                                echo "<div class='second'>
                                <div>
                                    <div class='dislpayprofilepicture'>
                                        <img src='" . $displayphoto . "' style='width:145px;height:145px;border-radius:50%;margin-top:4%' class='profilnaslika1'>
                                    </div>

                                    
                                    <div style='margin-right: 2%; margin-left:2%;border-radius:6px;margin-bottom:2%;' class='displaythename'>
                                        <div>
                                            2.
                                        </div>
                                        <div>
                                            Username: " . $displayuname . "
                                        </div>
                                        <div>
                                            Name: " . $displaynameandsuranme . "
                                        </div>
        
                                        <div>" . 'Wins: ' . $displaynumofwins . "</div>
                                    </div>
                                </div>
                                </div>";

                                $sql = "SELECT ime_uporabnika,priimek_uporabnika,Username, ProfilePicture FROM uporabniki.uporabnik JOIN uporabniki.podatkiuporabnika ON uporabniki.uporabnik.id_uporabnika=uporabniki.podatkiuporabnika.uporabnik ORDER BY zmage DESC LIMIT 1  ";
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {

                                    $counter = 0;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $counter++;

                                        if ($counter = 1) {
                                            $displayuname = $row["Username"];
                                            $displaynameandsuranme = $row["ime_uporabnika"] . " " . $row["priimek_uporabnika"];
                                            $displayphoto = $row["ProfilePicture"];
                                        }
                                    }
                                }

                                $sql = "SELECT * FROM uporabniki.podatkiuporabnika ORDER BY zmage DESC LIMIT 1 ";
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {

                                    $counter = 0;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $counter++;

                                        if ($counter = 1) {
                                            $displaynumofwins = $row["zmage"];
                                        }
                                    }
                                }
                                echo "<div class='first'>
                                 <div class='dislpayprofilepicture'>
                                     <img src='" . $displayphoto . "' style='width:145px;height:145px;border-radius:50%;margin-top:4%' class='profilnaslika1'>
                                 </div>
                                 <div style='margin-right: 2%; margin-left:2%;border-radius:6px;' class='displaythename'>
                                     <div>
                                         1.
                                     </div>
                                     <div>
                                         Username: " . $displayuname . "
                                     </div>
                                     <div>
                                         Name: " . $displaynameandsuranme . "
                                     </div>
         
                                     <div>" . 'Wins: ' . $displaynumofwins . "</div>
                                 </div>
                                </div>";

                                $sql = "SELECT ime_uporabnika,priimek_uporabnika,Username,ProfilePicture FROM uporabniki.uporabnik JOIN uporabniki.podatkiuporabnika ON uporabniki.uporabnik.id_uporabnika=uporabniki.podatkiuporabnika.uporabnik ORDER BY zmage DESC LIMIT 3  ";
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {

                                    $counter = 0;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $counter++;

                                        if ($counter = 3) {
                                            $displayuname = $row["Username"];
                                            $displaynameandsuranme = $row["ime_uporabnika"] . " " . $row["priimek_uporabnika"];
                                            $displayphoto = $row["ProfilePicture"];
                                        }
                                    }
                                }
                                $sql = "SELECT * FROM uporabniki.podatkiuporabnika ORDER BY zmage DESC LIMIT 3 ";
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {

                                    $counter = 0;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $counter++;

                                        if ($counter = 3) {
                                            $displaynumofwins = $row["zmage"];
                                        }
                                    }
                                }
                                echo "<div class='third'>
                                <div class='dislpayprofilepicture'>
                                    <img src='" . $displayphoto . "'  style='width:145px;height:145px;border-radius:50%;margin-top:4%' class='profilnaslika1'>
                                </div>

                                <div style='margin-right: 2%; margin-left:2%;border-radius:6px; ' class='displaythename'>
                                    <div>
                                        3.
                                    </div>
                                    <div>
                                       Username: " . $displayuname . "
                                    </div>
                                    <div>
                                       Name: " . $displaynameandsuranme . "
                                    </div>
        
                                    <div>" . 'Wins: ' . $displaynumofwins . "</div>
                                </div>
                            </div>";




                                ?>



                            </div>

                            <div class="leaderboard-display">
                                <div class="displaywin">
                                    <div class="leaderboardtoggle">
                                        <button class="buttontoggle" >Wins</button>
                                        <button class="buttontoggle2" onclick="Hide();">Rank</button>
                                    </div>
                                    <?php
                                    $sql = "SELECT ime_uporabnika,priimek_uporabnika,Username,ProfilePicture,zmage FROM uporabniki.uporabnik JOIN uporabniki.podatkiuporabnika ON uporabniki.uporabnik.id_uporabnika=uporabniki.podatkiuporabnika.uporabnik ORDER BY zmage DESC LIMIT 200  ";
                                    $result = mysqli_query($conn, $sql);

                                    if (mysqli_num_rows($result) > 0) {

                                        $counter = 0;
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $counter++;
                                            $displayuname = $row["Username"];
                                            $displaynameandsuranme = $row["ime_uporabnika"] . " " . $row["priimek_uporabnika"];
                                            $displayphoto = $row["ProfilePicture"];
                                            $displaynumofwins = $row["zmage"];



                                            if ($counter > 3) {

                                                if ($sessionUsername == $displayuname) {
                                                    echo "
                                                        <div class='position' style='background-color:#5AA0A9;'>
                                                            <div>
                                                                " . $counter . "
                                                            </div>
                                                            <div>
                                                                <img src='" . $displayphoto . "' class='leaderboard-slika'>
                                                            </div>
                                                            <div>
                                                                Username: " . $displayuname . "
                                                            </div>
                                                            <div>
                                                                Name: " . $displaynameandsuranme . "
                                                            </div>
                                                            <div>
                                                                Wins: " . $displaynumofwins . "
                                                            </div>
                                                        </div>";
                                                } else {
                                                    echo "
                                                        <div class='position'>
                                                            <div>
                                                                " . $counter . "
                                                            </div>
                                                            <div>
                                                                <img src='" . $displayphoto . "' class='leaderboard-slika'>
                                                            </div>
                                                            <div>
                                                                Username: " . $displayuname . "
                                                            </div>
                                                            <div>
                                                                Name: " . $displaynameandsuranme . "
                                                            </div>
                                                            <div>
                                                                Wins: " . $displaynumofwins . "
                                                            </div>
                                                        </div>";
                                                }
                                            }

                                            if ($sessionUsername == $displayuname) {
                                                $userposition = $counter;
                                            }
                                        }
                                    }


                                    if ($userposition == 0) {
                                        $unamecheck;
                                        $counter = 0;
                                        $sql = "SELECT Username,zmage FROM uporabniki.uporabnik JOIN uporabniki.podatkiuporabnika ON uporabniki.uporabnik.id_uporabnika=uporabniki.podatkiuporabnika.uporabnik ORDER BY zmage DESC";
                                        $result = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $counter++;

                                            if ($row["Username"] == $sessionUsername) {
                                                $userposition = $counter;
                                                echo $row["Username"];
                                                echo $sessionUsername;
                                            }
                                        }
                                    }


                                    ?>


                                    <div style="margin-left:2%">

                                        Your Position: <?php

                                                        echo $userposition; ?>

                                    </div>


                                </div>










                            </div>




                        </div>
                        <div class="showrank">
                        
                        <div>


                            <div class="displaypodium">

                                <?php


                                $sql = "SELECT ime_uporabnika,priimek_uporabnika,Username, ProfilePicture FROM uporabniki.uporabnik JOIN uporabniki.rank ON uporabniki.uporabnik.id_uporabnika=uporabniki.rank.UserID JOIN uporabniki.podatkiuporabnika ON uporabniki.rank.UserID = uporabniki.podatkiuporabnika.uporabnik  ORDER BY RankScore DESC LIMIT 2  ";
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {

                                    $counter = 0;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $counter++;

                                        if ($counter = 2) {
                                            $displayuname = $row["Username"];
                                            $displaynameandsuranme = $row["ime_uporabnika"] . " " . $row["priimek_uporabnika"];
                                            $displayphoto = $row["ProfilePicture"];
                                        }
                                    }
                                }


                                $sql = "SELECT * FROM uporabniki.rank ORDER BY RankScore DESC LIMIT 2 ";
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {

                                    $counter = 0;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $counter++;

                                        if ($counter = 2) {
                                            $displayrankscore = $row["RankScore"];
                                        }
                                    }
                                }

                                echo "<div class='second'>
                                <div>
                                    <div class='dislpayprofilepicture'>
                                        <img src='" . $displayphoto . "' style='width:145px;height:145px;border-radius:50%;margin-top:4%' class='profilnaslika1'>
                                    </div>

                                    
                                    <div style='margin-right: 2%; margin-left:2%;border-radius:6px;margin-bottom:2%;' class='displaythename'>
                                        <div>
                                            2.
                                        </div>
                                        <div>
                                            Username: " . $displayuname . "
                                        </div>
                                        <div>
                                            Name: " . $displaynameandsuranme . "
                                        </div>

                                        <div>" . 'Rank: ' . $displayrankscore . "</div>
                                    </div>
                                </div>
                                </div>";

                                $sql = "SELECT ime_uporabnika,priimek_uporabnika,Username, ProfilePicture FROM uporabniki.uporabnik JOIN uporabniki.rank ON uporabniki.uporabnik.id_uporabnika=uporabniki.rank.UserID JOIN uporabniki.podatkiuporabnika ON uporabniki.rank.UserID = uporabniki.podatkiuporabnika.uporabnik  ORDER BY RankScore DESC LIMIT 1  ";                                
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {

                                    $counter = 0;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $counter++;

                                        if ($counter = 1) {
                                            $displayuname = $row["Username"];
                                            $displaynameandsuranme = $row["ime_uporabnika"] . " " . $row["priimek_uporabnika"];
                                            $displayphoto = $row["ProfilePicture"];
                                        }
                                    }
                                }

                                $sql = "SELECT * FROM uporabniki.rank ORDER BY RankScore DESC LIMIT 1 ";
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {

                                    $counter = 0;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $counter++;

                                        if ($counter = 1) {
                                            $displayrankscore = $row["RankScore"];
                                        }
                                    }
                                }
                                echo "<div class='first'>
                                <div class='dislpayprofilepicture'>
                                    <img src='" . $displayphoto . "' style='width:145px;height:145px;border-radius:50%;margin-top:4%' class='profilnaslika1'>
                                </div>
                                <div style='margin-right: 2%; margin-left:2%;border-radius:6px;' class='displaythename'>
                                    <div>
                                        1.
                                    </div>
                                    <div>
                                        Username: " . $displayuname . "
                                    </div>
                                    <div>
                                        Name: " . $displaynameandsuranme . "
                                    </div>

                                    <div>" . 'Rank: ' . $displayrankscore . "</div>
                                </div>
                                </div>";

                                $sql = "SELECT ime_uporabnika,priimek_uporabnika,Username, ProfilePicture FROM uporabniki.uporabnik JOIN uporabniki.rank ON uporabniki.uporabnik.id_uporabnika=uporabniki.rank.UserID JOIN uporabniki.podatkiuporabnika ON uporabniki.rank.UserID = uporabniki.podatkiuporabnika.uporabnik  ORDER BY RankScore DESC LIMIT 3  ";                                
                              
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {

                                    $counter = 0;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $counter++;

                                        if ($counter = 3) {
                                            $displayuname = $row["Username"];
                                            $displaynameandsuranme = $row["ime_uporabnika"] . " " . $row["priimek_uporabnika"];
                                            $displayphoto = $row["ProfilePicture"];
                                        }
                                    }
                                }
                                $sql = "SELECT * FROM uporabniki.rank ORDER BY RankScore DESC LIMIT 3 ";
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {

                                    $counter = 0;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $counter++;

                                        if ($counter = 3) {
                                            $displayrankscore = $row["RankScore"];
                                        }
                                    }
                                }
                                echo "<div class='third'>
                                <div class='dislpayprofilepicture'>
                                    <img src='" . $displayphoto . "'  style='width:145px;height:145px;border-radius:50%;margin-top:4%' class='profilnaslika1'>
                                </div>

                                <div style='margin-right: 2%; margin-left:2%;border-radius:6px; ' class='displaythename'>
                                    <div>
                                        3.
                                    </div>
                                    <div>
                                    Username: " . $displayuname . "
                                    </div>
                                    <div>
                                    Name: " . $displaynameandsuranme . "
                                    </div>

                                    <div>" . 'Rank: ' . $displayrankscore . "</div>
                                </div>
                            </div>";




                                ?>



                            </div>

                            <div class="leaderboard-display">
                                <div >
                                    <div class="leaderboardtoggle">
                                        <button class="buttontoggle2" onclick="Hide1();" >Wins</button>
                                        <button class="buttontoggle" >Rank</button>
                                        
                                    </div>
                                    <?php
                                    $sql = "SELECT ime_uporabnika,priimek_uporabnika,Username, ProfilePicture,RankScore FROM uporabniki.uporabnik JOIN uporabniki.rank ON uporabniki.uporabnik.id_uporabnika=uporabniki.rank.UserID JOIN uporabniki.podatkiuporabnika ON uporabniki.rank.UserID = uporabniki.podatkiuporabnika.uporabnik  ORDER BY RankScore DESC LIMIT 200  ";                                
                                   

                                     $result = mysqli_query($conn, $sql);

                                    if (mysqli_num_rows($result) > 0) {

                                        $counter = 0;
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $counter++;
                                            $displayuname = $row["Username"];
                                            $displaynameandsuranme = $row["ime_uporabnika"] . " " . $row["priimek_uporabnika"];
                                            $displayphoto = $row["ProfilePicture"];
                                            $displayrankscore = $row["RankScore"];



                                            if ($counter > 3) {

                                                if ($sessionUsername == $displayuname) {
                                                    echo "
                                                        <div class='position' style='background-color:#5AA0A9;'>
                                                            <div>
                                                                " . $counter . "
                                                            </div>
                                                            <div>
                                                                <img src='" . $displayphoto . "' class='leaderboard-slika'>
                                                            </div>
                                                            <div>
                                                                Username: " . $displayuname . "
                                                            </div>
                                                            <div>
                                                                Name: " . $displaynameandsuranme . "
                                                            </div>
                                                            <div>
                                                                Rank: " . $displayrankscore . "
                                                            </div>
                                                        </div>";
                                                } else {
                                                    echo "
                                                        <div class='position'>
                                                            <div>
                                                                " . $counter . "
                                                            </div>
                                                            <div>
                                                                <img src='" . $displayphoto . "' class='leaderboard-slika'>
                                                            </div>
                                                            <div>
                                                                Username: " . $displayuname . "
                                                            </div>
                                                            <div>
                                                                Name: " . $displaynameandsuranme . "
                                                            </div>
                                                            <div>
                                                                Rank: " . $displayrankscore . "
                                                            </div>
                                                        </div>";
                                                }
                                            }

                                            if ($sessionUsername == $displayuname) {
                                                $userposition = $counter;
                                            }
                                        }
                                    }


                                    if ($userposition == 0) {
                                        $unamecheck;
                                        $counter = 0;
                                        $sql = "SELECT Username,RankScore FROM uporabniki.uporabnik JOIN uporabniki.rank ON uporabniki.uporabnik.id_uporabnika=uporabniki.rank.UserID ORDER BY RankScore DESC";                                
                                        
                                        $result = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $counter++;

                                            if ($row["Username"] == $sessionUsername) {
                                                $userposition = $counter;
                                                echo $row["Username"];
                                                echo $sessionUsername;
                                            }
                                        }
                                    }


                                    ?>


                                    <div style="margin-left:2%">

                                        Your Position: <?php

                                                    echo $userposition; ?>

                                    </div>


                                </div>










                            </div>
                        </div>
                        
                        </div>


                    
                    </div>

                </div>
                    <script src="leaderboard.js"></script>                 

               
                <div class="item5">

                    <div class="grid-naslov item5-naslov">
                        <img src="slike/statistic.png" alt="" style="width: 40px;">
                        <span>STATISTICS</span>
                    </div>
                    <div class="item5-besedilo">

                        <?php
                        $sql = "SELECT Username,balance,ProfilePicture,stevilo_iger,zmage,porazi,SteviloIzenacenih FROM uporabniki.uporabnik JOIN uporabniki.podatkiuporabnika ON uporabniki.uporabnik.id_uporabnika=uporabniki.podatkiuporabnika.uporabnik WHERE Username = '" . $sessionUsername."'";
                        $result = mysqli_query($conn, $sql);
                        
                        if (mysqli_num_rows($result) > 0) {
                        
                            while ($row = mysqli_fetch_assoc($result)) {
                                $balancestatistic= $row['balance'];
                                $stevilo_igerstatistic = $row['stevilo_iger'];
                                $totalwondbstatistic = $row['zmage'];
                                $totallossdbstatistic = $row['porazi'];
                                $totaldrawdbstatistic = $row['SteviloIzenacenih'];
                                $ProfilePicturestatistic = $row['ProfilePicture'];
                                }
                        }
                         
                         
                         
                         ?>
                        <div>
                            <div>
                                <img src="<?php echo $ProfilePicturestatistic ?>" style="width: 55px;height:55px;border-radius:50%;object-fit: cover; position: absolute; top:2%;left:2%; ">
                                <div style="position:absolute; top:2%;left:8%;line-height:55px; font-family: Pisava3;">
                                    <?php echo $sessionUsername ?>
                                </div>    
                            </div>
                        </div>
                        <div class="displaystatistic">
                            <div>
                                <div style="text-align: center;font-family:FontBesedilo; font-size:25px;margin-bottom:5%">
                                    ALL TIME
                                </div>
                                <div class="displaystatgrid">
                                    <div class="displaystat">
                                            Wins:
                                            <div class="displaystatnumbes wins">
                                                <?php echo $totalwondbstatistic ?>
                                            </div>
                                    </div>
                                    <div class="displaystat">
                                            Loses:
                                            <div class="displaystatnumbes loss">
                                            <?php echo $totallossdbstatistic ?>
                                            </div>
                                    </div>
                                    <div class="displaystat">
                                            Games:
                                            <div class="displaystatnumbes games">
                                                <?php echo $stevilo_igerstatistic ?>
                                            </div>
                                    </div>
                                    <div class="displaystat">
                                            Win rate:
                                            <div class="displaystatnumbes games">
                                                <?php

                                                    if($stevilo_igerstatistic == 0)
                                                    {
                                                        echo "0%";
                                                    }
                                                    else{
                                                        $WinRate = ($totalwondbstatistic/$stevilo_igerstatistic)*100;
                                                      $rounded = round($WinRate);
                                                      echo $rounded."%";

                                                    }
                                                      
                                                ?>
                                            </div>
                                    </div>
                                    <div class="displaystatrank">
                                            Rank:
                                            <div class="displayrankgrid">
                                                <div>
                                                    <img src="<?php echo $currentImage ?>" alt="" style="width:110px;height:110px">
                                                </div>
                                                <div >
                                                 <?php echo $userrank ?>
                                                </div>
                                              
                                            </div>
                                    </div>
                                </div>

                            </div>
                            <div>

                                <?php
                                    $sql = "SELECT BlackJack,TotalWonAmount,TotalLossAmount,TotalDrawAmount,TotalGames FROM uporabniki.sejaigre 
                                    JOIN uporabniki.uporabnik ON uporabniki.sejaigre.IDUporabnika = uporabniki.uporabnik.id_uporabnika 
                                    WHERE Username = '" . $sessionUsername . "'";
                                    
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                    
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $BlackJackStatistic = $row['BlackJack'];
                                            $WonStatistic = $row['TotalWonAmount'];
                                            $LossStatistics = $row['TotalLossAmount'];
                                            $DrawStatistics = $row['TotalDrawAmount'];
                                            $GamesStatistics = $row['TotalGames'];
                                        }
                                    }
                                
                                
                                
                                ?>
                                <div style="text-align: center;font-family:FontBesedilo; font-size:25px;margin-bottom:5%">
                                    LAST SESSION
                                </div>
                                <div class="displaystatgrid">
                                    <div class="displaystat">
                                            Wins:
                                            <div class="displaystatnumbes wins">
                                                <?php echo $WonStatistic; ?>
                                            </div>
                                    </div>
                                    <div class="displaystat">
                                            Loses:
                                            <div class="displaystatnumbes loss">
                                                <?php echo $LossStatistics; ?>
                                            </div>
                                    </div>
                                    <div class="displaystat">
                                            Games:
                                            <div class="displaystatnumbes games">
                                                <?php echo $GamesStatistics; ?>
                                            </div>
                                    </div>
                                    <div class="displaystat">
                                            Win rate:
                                            <div class="displaystatnumbes games">
                                                <?php 

                                                if($GamesStatistics == 0)
                                                {
                                                    echo "0%";
                                                }
                                                else{
                                                    $WinRate = ($WonStatistic/$GamesStatistics)*100;
                                                    $rounded = round($WinRate);
                                                    echo $rounded."%";
                                                    

                                                }
                                               
                                                ?> 
                                            </div>
                                    </div>
                                    <div class="displaystatrank">
                                            BlackJacks:
                                            <div>
                                            <?php echo $BlackJackStatistic; ?>
                                            </div>
                                    </div>
                                </div>

                            </div>


                        </div>

                       
                        

                    </div>
                    </a>
                </div>
                <div class="item6 x">

                    <div class="grid-naslov ">
                        <img src="slike/home_7955459.png" alt="" style="width: 40px;">
                        <span>HOME</span>
                    </div>
                    <div>

                    </div>

                </div>

            </div>
            <script src="dashboard.js"></script>
            <div>
                <div class="glow-container" style="position: absolute; top:50%; left:50%">

                    <div class="Glow"></div>
                </div>
                <div class="glow-container" style="position: absolute; top:20%; left:50%">

                    <div class="Glow"></div>
                </div>
                <div class="glow-container" style="position: absolute; top:80%; left:50%">

                    <div class="Glow"></div>
                </div>
                <div class="glow-container" style="position: absolute; top:50%; left:12%">

                    <div class="Glow"></div>
                </div>
                <div class="glow-container" style="position: absolute; top:50%; left:88%">

                    <div class="Glow"></div>
                </div>

                <div class="glow-container" style="position: absolute; top:20%; left:12%">

                    <div class="Glow"></div>
                </div>

                <div class="glow-container" style="position: absolute; top:20%; left:88%">

                    <div class="Glow"></div>
                </div>

                <div class="glow-container" style="position: absolute; top:80%; left:12%">

                    <div class="Glow"></div>
                </div>

                <div class="glow-container" style="position: absolute; top:80%; left:88%">

                    <div class="Glow"></div>
                </div>

            </div>


        </div>


    </div>




</body>

</html>