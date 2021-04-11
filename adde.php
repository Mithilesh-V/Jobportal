<?php
require_once "config.php";

function open_window($url){
 header("Location: $url");
 exit();
};

function check_done(){
    $sql = "SELECT * FROM loge 
    WHERE name='$name' AND password='$password' ";

    foreach ($conn->query($sql) as $row) {
        $cnt += 1;
    }
};

try {
    
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $phno = $_POST['phno'];
    $email = $_POST['email'];
 
      $sql = "INSERT INTO empdet(f_name,l_name,phno,email)
      VALUES ('$f_name','$l_name','$phno','$email')";
      // use exec() because no results are returned
      $conn->exec($sql);
      $txt = "New record created successfully";

  } catch(PDOException $e) {
    header("Location: err.html");
    //sleep(5);
    //open_window('register.html');
  }
  if(strcmp($txt,"New record created successfully") == 0)
  {
    open_window('index.html');
  }
  $conn = null;
?>