<?php


$host = "localhost";
$user = "postgres";
$pass = "Joelmkarthick3";
$db = "mydata";

try{
    
    $conn = new PDO("pgsql:host=$host;dbname=$db", $user, $pass);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
