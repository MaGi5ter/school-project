<?php

$login = $_POST['login'];
$passwd = $_POST['passwd'];

/*#####*/  //MYSQL
/*#####*/  $servername = "localhost";
/*#####*/  $username = "root";
/*#####*/  $password = "";
/*#####*/  $dbname = "administracja";
/*#####*/  
/*#####*/  $conn = new mysqli($servername, $username, $password, $dbname);
/*#####*/  if ($conn->connect_error) {
/*#####*/    die("Connection failed: " . $conn->connect_error);
/*#####*/  }  ;mysqli_set_charset($conn,"utf8");
/*#####*/  //MYSQL

$sql = "SELECT * FROM users WHERE login = '$login' AND passwd = '$passwd'";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
  session_start();

  while($row = $result->fetch_assoc()) {
    $_SESSION['user_id'] = $row['ID'];
    $_SESSION['admin'] = $row['admin'];
    echo $row['admin'];
    echo $row['ID'];
    echo "<br>";
  }

  echo $_SESSION['admin'];
  echo $_SESSION['user_id'];

    $_SESSION['username'] = $login;
    $_SESSION['status']=true; //1

    $log = "INSERT INTO `log` (`user`, `action`) VALUES ('{$_SESSION['user_id']}', 'Zalogował sie');"; $conn->query($log);

    if($_SESSION['admin'] == 1)
    {
      header('Location: /stronka_/admin.php');
    }
    else
    {
      header('Location: /stronka_/user.php');
    }
  
} else {
  echo "Błędne hasło";
}
$conn->close();

?>