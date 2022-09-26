<?php
  session_start();
  if($_SESSION['status'] == 1)
  {
    if($_SESSION['admin'] == 1)
    {
      
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

    <style>
        body {
            background: rgb(80, 77, 77);
        }
        .container {
            background: grey;
            width: 300px;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
            height: 100px;
            padding-top: 50px;
        }

        .forms {
          overflow: hidden;
          width: 100%;
          margin-left: auto;
          margin-right: auto;
          border: solid 1px;
        }

        .add {
          background: grey;
          float: left;
          margin: 40px;
          padding: 20px;
        }

        table, th, td {
          border: solid 1px;
          border-collapse: collapse;
          padding: 10px;
        }

        .tabelka {
          width: 700px;
          background:grey;
          padding: 50px;
          margin-left: auto;
          margin-right: auto;
          margin-top: 50px;
        }



    </style>
</head>
<body>

    <div class="container">
      <h1> Witaj <?php echo $_SESSION['username'];?></h1>
    </div>

  <div class="forms">
    <div class="add">
      <form action="add.php" method="post">
        <h1>Dodaj użytkownika</h1>
        Login
        <input type="text" name="login" required><br>
        Hasło
        <input type="text" name="passwd" required><br><br>
        <label for="yes_no_radio">Użytkownik ma mieć prawa admina?</label>
        <p><input type="checkbox" name="yes">Tak</input></p>
        Imie
        <input type="text" name="name" required><br>
        Nazwisko
        <input type="text" name="surname" required><br>
        E-mail
        <input type="text" name="email" required><br>
        Pesel
        <input type="text" name="pesel" required><br>
        Data Rozpoczęcia nauki
        <input type="date" name="date" required><br>
        <input type="submit" value="Dodaj">
      </form> 
    </div>

    <div class="add">
      <form action="delete.php" method="post">
        <h1>Usuń Użytkownika</h1>
      <label for="del">Wybierz użytkownika:</label>

      <select name="id" id="del">
        <option value="0">|--------------------|</option>
        <?php
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
          $sql = "SELECT * FROM users_data";
          $result = $conn->query($sql);

          while($row = $result->fetch_assoc()) {
            echo "<option value='{$row['ID']}'>{$row['ID']}-{$row['name']}-{$row['surname']}</option>";
          }
        ?>
      </select>
      <input type="submit" value="Usuń">
      </form> 
    </div>
  </div>

  <div class="tabelka">
      <table>
        <tr>
          <th>ID</th>
          <th>Imię</th>
          <th>Nazwisko</th>
          <th>PESEL</th>
          <th>E-Mail</th>
          <th>Data rozpoczęcia Nauki</th>
        </tr>
        <?php

          $sql = "SELECT * FROM users_data";
          $result = $conn->query($sql);

          while($row = $result->fetch_assoc()) {
            echo "<tr> <th>{$row['ID']}</th> <th>{$row['name']}</th>  
            <th>{$row['surname']}</th> <th>{$row['pesel']}</th>
            <th>{$row['email']}</th> <th>{$row['start_date']}</th> </tr>";
          }
        ?>
      </table>
    </div>

</body>
</html>