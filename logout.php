<?php
  session_start();

  //MYSQL
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "administracja";
  
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } ;mysqli_set_charset($conn,"utf8");
  //MYSQL
  if($_SESSION['status'] == 1)
  {

    $log = "INSERT INTO `log` (`user`, `action`) VALUES ('{$_SESSION['user_id']}', 'Wylogował sie')"; $conn->query($log);

    $_SESSION['status'] == 0;
    session_destroy();
    header('Location: /stronka_');


  }
  else
  {
    header('Location: /stronka_');
  }
?>