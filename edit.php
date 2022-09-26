<?php
  session_start();
  if($_SESSION['status'] == 1)
  {
    if($_SESSION['admin'] == 1){

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

      $login = $_POST['login'];
      $passwd = $_POST['passwd'];

      $id   = $_POST['id'];
      $name = $_POST['name'];
      $surname = $_POST['surname'];
      $email = $_POST['email'];
      $pesel = $_POST['pesel'];
      $date = $_POST['date'];

      if(@$_POST['yes']){$admin = 1;}else{$admin = 0;}

      $sql = "UPDATE users SET login = '', passwd = '', admin  WHERE ID = "  ;  $conn->query($sql);
      $sql = "SELECT * FROM users WHERE login = '$login' AND passwd = '$passwd'";$result = $conn->query($sql);

      while($row = $result->fetch_assoc()) {
        $id = $row['ID'];
      }

      $sql = "INSERT INTO `users_data`(`ID`, `name`, `surname`, `email`, `pesel`, `start_date`) VALUES ('$id','$name','$surname','$email','$pesel','$date')";
      echo $sql;
      $result = $conn->query($sql);

      header('Location: /stronka_/admin.php');

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