<?php
  session_start();
  
  if($_SESSION['status'] == 1)
  {
    if($_SESSION['admin'] == 1){

        //MYSQL
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "administracja";
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        //MYSQL

      $name = $_GET['name'];
      $surname = $_GET['surname'];
      $email = $_GET['email'];
      $pesel = $_GET['pesel'];
      $date = $_GET['start_date'];
      $id = $_GET['id'];

        $sql = "SELECT * FROM users WHERE ID = '$id'";
        $result = $conn->query($sql);

        while($row = $result->fetch_assoc()) {
            $login = $row['login'];
            $admin = $row['admin'];
        }


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
                $id = $_GET['id'];
            
                $name = $_POST['name'];
                $surname = $_POST['surname'];
                $email = $_POST['email'];
                $pesel = $_POST['pesel'];
                $date = $_POST['date'];
            
                if(@$_POST['yes']){$admin = 1;}else{$admin = 0;}
        
        
            if(empty($_POST['passwd']))
            {
                $sql = "UPDATE users SET `admin` = '$admin' WHERE ID = '$id'";
            }
            else 
            {
                $passwd = $_POST['passwd'];
                $sql = "UPDATE users SET `passwd` = '$passwd' , `admin` = '$admin' WHERE ID = '$id'";
            }
        
            $sql2 ="UPDATE users_data SET `name` = '$name' , `surname` = '$surname' , `email` = '$email' , `start_date` = '$date', `pesel` = '$pesel' WHERE ID = '$id' ";
        
            ;mysqli_set_charset($conn,"utf8"); $log = "INSERT INTO `log` (`user`, `action`) VALUES ('{$_SESSION['user_id']}', 'zaktualizował dane usera $id na name $name surname = $surname , email = $email start_date = $date pesel = $pesel ');"; $conn->query($log);

            $conn->query($sql);
            $conn->query($sql2);

           // header('Location: /stronka_/admin.php');
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
    <link rel="stylesheet" href="edit.css">

</head>
<body>
    <div class = 'container'>

        <?php

            if($admin == 1)
            {
                echo "
            <form action='/stronka_/edit.php?id={$id}' method='post'>
                <h1>Edytujesz Użytkownika <b><i>$login</i></b></h1>
                <p>Wszystko jest uzupełnione o aktualne dane</p><br>
                Hasło
                <input type='text' name='passwd'><br><br>
                <label for='yes_no_radio'>Użytkownik ma mieć admina?</label>
                <p><input type='checkbox' checked name='yes'>Tak</input></p>
                Imie
                <input type='text' name='name' required value='$name'><br>
                Nazwisko
                <input type='text' name='surname' value='$surname' required><br>
                E-mail
                <input type='text' name='email' value='$email' required><br>
                Pesel
                <input type='text' name='pesel' value='$pesel' required><br>
                Data Rozpoczęcia nauki
                <input type='date' name='date' value='$date' required><br>
                <input type='submit' value='ZAPISZ ZMIANY'>
            </form> 
            ";
            }
            else {
                echo "
            <form action='/stronka_/edit.php?id={$id}' method='post'>
                <h1>Edytujesz Użytkownika <b><i>$login</i></b></h1>
                <p>Wszystko jest uzupełnione o aktualne dane</p><br>
                Hasło
                <input type='text' name='passwd'><br><br>
                <label for='yes_no_radio'>Użytkownik ma mieć admina?</label>
                <p><input type='checkbox' name='yes'>Tak</input></p>
                Imie
                <input type='text' name='name' required value='$name'><br>
                Nazwisko
                <input type='text' name='surname' value='$surname' required><br>
                E-mail
                <input type='text' name='email' value='$email' required><br>
                Pesel
                <input type='text' name='pesel' value='$pesel' required><br>
                Data Rozpoczęcia nauki
                <input type='date' name='date' value='$date' required><br>
                <input type='submit' value='ZAPISZ ZMIANY'>
            </form> 
            ";
            }
        ?>

        <div class='linkacz'><br>
            <a href="/stronka_/admin.php">
                <div class='test'>
                ANULUJ
                </div>
            </a>
        </div>
    </div>
</body>
</html>