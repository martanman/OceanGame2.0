<?php

include "config.php";

session_start();


$db = "d9kbet4d8r95up";

$username = $_POST['username']; 
$password = $_POST['password']; 
    $password = md5($password);
    $password = crypt($password, $username);

if (!isset $_SERVER['dbName']){
$_SERVER['dbName'] = $db;
}

$sql = pg_query($db, "SELECT * FROM users WHERE username = '".$username."' and password = '".$password."'");
$count= pg_num_rows($sql);

if($count == 1){
    
    //get username from database
    if (!isset ($_SESSION['username'])) {
            $_SESSION['username'] = $username;
        }
    if(!isset ($_SESSION['points'])){
        $num =  pg_fetch_array(pg_query($db, "SELECT points FROM users WHERE password='".$password."' and username='".$username."'"), NULL, PGSQL_ASSOC);
        foreach ($num as $value){
            $value = $value;
            $_SESSION['points'] = $value;
        }
    }                                  
    if(!isset($_SESSION['password'])){
        $_SESSION['password'] = $password;
    }
   
 header("Location: profilepage.php");
}
else {
    header("Location: index.html");
}
?>