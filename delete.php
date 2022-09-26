<?php
  session_start();
  if($_SESSION['status'] == 1)
  {
    if($_SESSION['admin'] == 1)
    {
      $id = $_POST['id'];

      if($id == $_SESSION['user_id'])
      {
        header('Location: /stronka_/admin.php');
      }
      else
      {
        $sql1 = "DELETE FROM users_data WHERE ID = $id";
      $sql2 = "DELETE FROM users WHERE ID = $id";

          /*#####*/  //MYSQL
          /*#####*/  $servername = "localhost";
          /*#####*/  $username = "root";
          /*#####*/  $password = "";
          /*#####*/  $dbname = "administracja";
          /*#####*/  
          /*#####*/  $conn = new mysqli($servername, $username, $password, $dbname);
          /*#####*/  if ($conn->connect_error) {
          /*#####*/    die("Connection failed: " . $conn->connect_error);
          /*#####*/  }
          /*#####*/  //MYSQL

      echo $sql1;

      $conn->query($sql1);
      $conn->query($sql2);

      header('Location: /stronka_/admin.php');
      }
    }
    else
    {
      header('Location: /stronka_/user.php');
    }
  }
  else
  {
    header('Location: /stronka_');
  }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
</head>
<body>

</body>
</html>