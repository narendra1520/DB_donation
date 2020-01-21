<?php
error_reporting(E_ALL);
  function database_connect()
  {
   $DB_SERVER = "localhost";
   $DB_USERNAME = "root";
   $DB_PASSWORD = "";
   $DB ="donation_db";
   $conn= mysqli_connect("$DB_SERVER","$DB_USERNAME","$DB_PASSWORD",$DB) or 
          die ("could not connect to mysql");
   if (!$conn) {
   	return false;
   }
   else {
    return $conn;
   }
  }
?>