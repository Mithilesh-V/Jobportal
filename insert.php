<?php
$host = "localhost";
$user = "postgres";
$pass = "Joelmkarthick3";
$db = "mydata";

function open_window($url){
 // echo '<script>window.open ("'.$url.'", "mywindow","status=0,toolbar=0")</script>';
 
 //echo"<a href='.$url.'></a>";
 header("Location: index.html");
 exit();
};

try {
    $conn = new PDO("pgsql:host=$host;dbname=$db", $user, $pass);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $name = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO register
    VALUES ('$name','$password')";
    // use exec() because no results are returned
    $conn->exec($sql);
    $txt = "New record created successfully";
  } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }
  if(strcmp($txt,"New record created successfully") == 0)
  {
    open_window('http://www.google.com');
  }
  $conn = null;
?>