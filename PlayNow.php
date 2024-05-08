<?php
    $loginerror="";
    $erorr="";
    $servername = "localhost";
    $Serverusername = "projekt";
    $Serverpassword = "gesloprojekta";
    $dbname = "uporabniki";
    $result;
    $mysqli =new mysqli($servername, $Serverusername, $Serverpassword, $dbname);
    $id;
    $balance = 1000;
    $steviloiger=0;
    $zmage = 0;
    $porazi = 0;
    $rank = 0;
    $vredonsti_rank=0;
    $SteviloIzenacenih=0;
    $ProfilePicture="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png";
    $StartTime="01.01.2000";
    $EndTime="01.01.2000";
    $TotalWonAmount=0;
    $TotalLossAmount=0;
    $TotalDrawAmount=0;
    $TotalGames=0;
    $BlacJack = 0;
    session_start();

    
    if (isset($_SESSION["uname"]) && $_SESSION["pass"]){
        header('Location: Dashboard.php');
    }
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {

        if (isset($_POST['RegistrationButton'])) {
             
            
            $RegistrationName = $_POST["RegistratioName"];
            $Surname = $_POST["surname"];
            $Email = $_POST["email"];
            $RegistrationUsername = $_POST["RegistrationUsername"];
            $RegistrationPassword = $_POST["RegistrationPassword"];
            $ReTypePassword = $_POST["ReTypePassword"];


            $conn = new mysqli($servername, $Serverusername, $Serverpassword, $dbname);

            if(mysqli_connect_errno()){
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                exit(); 
            }
            else
            {

                if($RegistrationName == "" && $Surname == "" && $Email == "" && $RegistrationUsername =="" && $RegistrationPassword =="" && $ReTypePassword == "")
                {
                    $loginerror = "Fill all fields!";
                }
                else{
                    $sql = "SELECT Username FROM uporabniki.uporabnik WHERE Username = '" . $RegistrationUsername . "'";
                    $result =  mysqli_query($conn, $sql);
    
                    if(mysqli_num_rows($result)>0)
                    {
                       $loginerror = "User already exist!";
                    }
                    else{
    
                        $sql = "SELECT Email FROM uporabniki.uporabnik WHERE Email ="."'".$Email  . "'";
                        $result =  mysqli_query($conn, $sql);
    
                        if(mysqli_num_rows($result)>0)
                         {
                            $loginerror = "User already exist!";
                        }
                        else{
                            if(trim($RegistrationPassword) == trim($ReTypePassword))
                            {
                                $hashedPassword = password_hash($RegistrationPassword, PASSWORD_DEFAULT);
                                $sql = "INSERT INTO uporabniki.uporabnik (ime_uporabnika, priimek_uporabnika, Username, password, Email) VALUES ('".$RegistrationName."', '".$Surname."', '".$RegistrationUsername."', '".$hashedPassword."', '".$Email."')";        
        
        
                                if (mysqli_query($conn, $sql)) {
                                   
                                    $loginerror = "User sucsesfully created";
                                } else {
                                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                }
        
        
        
        
                             $sql = "SELECT id_uporabnika FROM uporabniki.uporabnik ORDER BY id_uporabnika DESC LIMIT 1;  ";
                             $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                
                                    while($row = mysqli_fetch_assoc($result)) {
                                    $id = $row["id_uporabnika"];
                                    }
    
                                    $sql = "INSERT INTO uporabniki.podatkiuporabnika (balance, stevilo_iger, zmage, porazi, SteviloIzenacenih,ProfilePicture,uporabnik,IDSeje) VALUES ('".$balance."', '".$steviloiger."', '".$zmage."', '".$porazi."', '".$SteviloIzenacenih."','".$ProfilePicture."','".$id."','".$id."')";
    
                                    if (mysqli_query($conn, $sql)) {
                                   
                                       
                                    } else {
                                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                    }
    
                                    
                                    $sql = "INSERT INTO uporabniki.rank (RankScore, UserID) VALUES ('".$vredonsti_rank."', '".$id."')";
    
                                    if (mysqli_query($conn, $sql)) {
                                   
                                       
                                    } else {
                                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                    }
    
                                    
                                    $sql = "INSERT INTO uporabniki.sejaigre (StartTime, EndTime, BlackJack, TotalWonAmount, TotalLossAmount,TotalDrawAmount,TotalGames,IDUporabnika,IDskupnostIger) VALUES ('".$StartTime."', '".$EndTime."', '".$BlacJack."', '".$TotalWonAmount."', '".$TotalLossAmount."','".$TotalDrawAmount."','".$TotalGames."','".$id."','".$id."')";
    
                                    if (mysqli_query($conn, $sql)) {
                                   
                                       
                                    } else {
                                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                    }
                                }  
        
                                  
                            }
                            else{
                                $loginerror = "Passwords dont match!";
                            }
                        }
    
                      
                    }

                }
               
            }

           
            


          } else if (isset($_POST['LoginButton'])) {
            $username = $_POST["username"];
            $password = $_POST["password"];
        
            $conn = new mysqli($servername, $Serverusername, $Serverpassword, $dbname);
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                exit();
            } else {
                $sql = "SELECT Username, password FROM uporabniki.uporabnik WHERE Username = '" . $username . "'";
                $result = mysqli_query($conn, $sql);
        
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $hashedPassword = $row["password"];
                    
                   
                    if (password_verify($password, $hashedPassword)) {
                        $_SESSION["uname"] = $username;
                        $_SESSION["pass"] = $password;
                        header('Location: Dashboard.php');
                    } else {
                        $erorr = "Wrong Username or Password!";
                    }
                } else {
                    $erorr = "Wrong Username or Password!";
                }
            }
        }




        
    }
      
    
    

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PlayNow</title>
    <style>
        <?php include "style.css" ?>
    </style>
  
</head>
<body class="loginBackground">

        <div class="GlowPozicija">
            <div class="NormalGlow">

            </div>
        </div>



    <div class="RegisterANDPLAYNOW">REGISTER AND PLAY!</div>

    <div class="registracija">

        <div class="RegisterText">
            Unlock the thrill of blackjack<br> and seize your chance to win big. <br> Register now<br> and dive into the heart-pounding action awaiting you!
        </div>

        <div>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="registration" >
                <div class="RegistrationData">
                    <div class="PrikazPodatkov">Name: </div><input type="text" name="RegistratioName" class="input"><br>
                    <div class="PrikazPodatkov">Surname: </div> <input type="text" name="surname" class="input"><br>
                    <div class="PrikazPodatkov">Email: </div><input type="email" name="email" class="input"><br>
                    <div class="PrikazPodatkov">Username: </div> <input type="text" name="RegistrationUsername" class="input"><br>
                    <div class="PrikazPodatkov">Password: </div> <input type="password" name="RegistrationPassword" class="input"><br>
                    <div class="PrikazPodatkov">Retype password: </div> <input type="password" name="ReTypePassword" class="input"><br>
                    <div style="font-family:FontBesedilo;">
                    <?php echo $loginerror; ?>
                    </div>
                    <input type="submit" name="RegistrationButton" class="submitbutton" value="REGISTER">

                    <div style="Color:white; font-family:FontBesedilo1; margin-top: 5%;">
                        Already a user? <br> <a href="#" onclick="Hide()">Click Here!</a>
                    </div>
                </div>

               
                
            </form>

          
            <div>
                
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="login">
                    <div class="RegistrationData">
                        <div class="PrikazPodatkov">Username </div> <input type="text" name="username"  class="input"><br>
                        <div class="PrikazPodatkov">  Password: </div> <input type="password" name="password"  class="input"><br>
                        <input type="submit" name="LoginButton" class="submitbutton" value="LOGIN">
                        <div style="font-family:FontBesedilo;margin-top:2%">
                            <?php echo $erorr; ?>
                        </div>
                        <div style="Color:white; font-family:FontBesedilo1; margin-top: 5%;">
                        Dont't have a account yet?<br> <a href="#" onclick="Hide()">Click here!</a>
                        </div>  
                    </div>

                    
                  
                </form>
                
            </div>

            
            <div>
                <div class="Registrationglow"></div>
            </div>

        </div>

      

       
    </div>    
    

    <div class="GlowPozicija">
            <div class="NormalGlow">

            </div>
    </div>
  
   

    
  
 


</body>
</html>


<script>


function Hide() {
  var element = document.getElementById("registration");
  var element1 = document.getElementById("login");
  if (element.style.display === "none") {
    element.style.display = "block";
    element1.style.display ="none";
  } else {
    element.style.display = "none";
    element1.style.display ="block";
  }
}



</script>