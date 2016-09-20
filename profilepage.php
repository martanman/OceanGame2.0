<?php
session_start();
include "config.php";
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$points = $_SESSION['points'];
$db = $_SESSION['dbName'];

if(!isset($_SESSION['username'])){
    header("Location: index.html");
    die("Not logged in");
    
}

?>
<!DOCTYPE HTML>
<html lang="en">
    <!-- \(^.^)/\(^.^)/\(^.^)/\(^.^)/\(^.^)/-->
    <head>
    <meta name="viewport" content="width=device-width">
     <link rel="stylesheet" href="css/profile.css">
    <meta charset="UTF-8">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet" type="text/css">
    <link rel='shortcut icon' href='favicon.ico' type='image/x-icon'/>
    </head>
    <body>
        <div class="banner">
            <div class="points">
                <p class="num">
                    
                    <?php 
                        if ($_SESSION['points'] == 0){
                        echo 0;
                        }
                        else{
                            echo $points;
                        }
                        
                    
                    
                    ?>
                
                </p>
            </div>
           <div class="userinf">
            <b><p class="profilename"><?php echo $username; ?></p></b>
            <a href="logout.php" class="logout">Logout</a>
        </div>
        </div>
        
        <div class="leaderboard">
                   <p class="leaderboardtxt">Leaderboard</p>
            <div class="pos1">
                <div class="spread1">
                    <p class="first">1. |  </p><p>    </p>
                    <div class="des1">
                    <p>
                        <?php 
                          $quer = pg_query($db,"SELECT MAX(points) FROM users");
                            $playername = pg_fetch_array($quer, NULL, PGSQL_ASSOC);
                            foreach ($playername as $value){
                                $value = $value;
                            }
                             $quer2 = pg_fetch_array(pg_query($db,"SELECT username FROM users WHERE points='".$value."'"), NULL, PGSQL_ASSOC);
                        foreach ($quer2 as $val2){
                            $val2 = $val2;
                        }
                            echo $val2;
                        ?>
                    </p>
                    </div>
                
                </div>
            
            </div>
                        <div class="pos2">
                <div class="spread2">
                    <p class="snd">2. |  </p><p>    </p>
                    <div class="des2">
                    <p>
                        <?php 
                            $quer7 = pg_query($db,"SELECT username FROM users ORDER BY points DESC LIMIT 1 , 1");
                            $int = pg_fetch_array($quer7, NULL, PGSQL_ASSOC);
                        foreach ($int as $eval3){
                            $eval3 = $eval3;
                        }
                        echo $eval3;
                            
                        ?>
                    </p>
                    </div>
                
                </div>
            
            </div>
            <div class="pos3">
            <div class="spread3">
                    <p class="thirs">3. |  </p><p>    </p>
                    <div class="des3">
                    <p>
                        <?php 
                            $quer18 = pg_query($db,"SELECT username FROM users ORDER BY points DESC LIMIT 2 , 1");
                        $querans = pg_fetch_array($quer18, NULL, PGSQL_ASSOC);
                        foreach ($querans as $eval4){
                            $eval4 = $eval4;
                        }
                        echo $eval4;
                        
                        ?>
                    </p>
                    </div>
            
            </div>
        
        
        </div>
        <div class="pos4">
            <div class="spread4">
                    <p class="fourth">4. |  </p><p>    </p>
                    <div class="des4">
                    <p>
                        <?php 
                            $quer21 = pg_query($db,"SELECT username FROM users ORDER BY points DESC LIMIT 3 , 1");
                        $querans2 = pg_fetch_array($quer21, NULL, PGSQL_ASSOC);
                        foreach ($querans2 as $eval21){
                            $eval21 = $eval21;
                        }
                        echo $eval21;
                        
                        ?>
                    </p>
                    </div>
            
            </div>
        
        
        </div>
            <div class="pos5">
            <div class="spread5">
                    <p class="fifth">5. |  </p><p>    </p>
                    <div class="des5">
                    <p>
                        <?php 
                            $quer51 = pg_query($db,"SELECT username FROM users ORDER BY points DESC LIMIT 4 , 1");
                        $querans5 = pg_fetch_array($quer51, NULL, PGSQL_ASSOC);
                        foreach ($querans5 as $eval51){
                            $eval51 = $eval51;
                        }
                        echo $eval51;
                        
                        
                        ?>
                    </p>
                </div>
            </div>
        
        
        </div> 
        </div>
        <div class="games">
            <p class="gamesTxt">Games</p>
         <a href="textAdventure.php"><div class="gme1" id="de"><p class="dd3">Human Impact(Choose your own adventure)</p></div></a>
            <div class="gme2" id="de"><p class="dd3">The food chain(Eating game)</p></div>
        <div class="gme3" id="de"><p class="dd3">The climate change Quiz.</p></div>
        
        </div>
    </body>


</html>