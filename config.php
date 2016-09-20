<?php

session_start();


   $host        = "ec2-54-243-54-21.compute-1.amazonaws.com";
   $port        = "port=5432";
   $dbname      = "dbname=d9kbet4d8r95up";
   $credentials = "user=tlixopdynzjawy password=-DeKIuKpeyvssGWYbJCANH5hNy";

   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db){
      echo "Error : Unable to open database\n";
   } else {
      echo "Opened database successfully\n";
   }
   
   $sql =<<<EOF
      CREATE TABLE IF NOT EXISTS users
      (ID INT PRIMARY KEY     NOT NULL,
      username       TEXT     NOT NULL,
      password       CHAR(50),     NOT NULL,
      points         INT,
EOF;

   $ret = pg_query($db, $sql);
   if(!$ret){
      echo pg_last_error($db);
   } else {
      echo "Table created successfully\n";
   };
       
 $_SESSION['dbName'] = $db;
?>