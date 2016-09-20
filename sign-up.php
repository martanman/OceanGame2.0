<?php
include "config.php";
session_start();

$username = $_POST['username'];
    $password = ($_POST['password']);
    $password = md5($password);
    $password = crypt($password, $username);
 $db = $_SESSION['dbName'];   



$query = pg_query($db, "SELECT username FROM users WHERE username='".$username."'");


if (pg_num_rows($query) != 0)
  {     
        die("Username exists");
  }
else
  {
    $query = 'INSERT INTO `Users` (`id`, `username`, `password`, `points`) VALUES ("NULL","'.$username.'", "'.$password.'", 0)';
      pg_query($db, $query)or trigger_error(pg_last_error()."in".$query);
    if(!isset ($_SESSION['username'])){
        $_SESSION['username'] = $username;
    }
    if(!isset ($_SESSION['points'])){
        $quer = pg_fetch_array(pg_query($db, "SELECT points FROM users WHERE username='".$username."' and passowrd='".$password."'"),NULL, PGSQL_ASSOC);
        foreach ($quer as $value){
            $value = $value;
        }
        $_SESSION['points'] = $value;
    }
    if(!isset ($_SESSION['password'])){
        $_SESSION['password'] = $password;
    }
    header("Location: profilepage.php");
  }
?>