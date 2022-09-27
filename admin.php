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
    <meta name="description" content="Done by MaGi5ter#0411">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Admin Panel</title>
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
          /*##Ł##*/  //MYSQL
          /*##A##*/  $servername = "localhost";
          /*##T##*/  $username = "root";
          /*##W##*/  $password = "";
          /*##O##*/  $dbname = "administracja";
          /*#####*/  
          /*##0##*/  $conn = new mysqli($servername, $username, $password, $dbname);
          /*##4##*/  if ($conn->connect_error) {
          /*##1##*/    die("Connection failed: " . $conn->connect_error);
          /*##1##*/  }
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
          <h3><b>LISTA KONT I EDYCJA ICH</b></h3>
      <table>
        <tr>
          <th>ID</th>
          <th>Imię</th>
          <th>Nazwisko</th>
          <th>PESEL</th>
          <th>E-Mail</th>
          <th>Data rozpoczęcia Nauki</th>
          <th>Edytuj</th>
        </tr> 
        <?php

          $sql = "SELECT * FROM users_data";
          $result = $conn->query($sql);

          while($row = $result->fetch_assoc()) {
            echo "<tr> <th>{$row['ID']}</th> <th>{$row['name']}</th>  
            <th>{$row['surname']}</th> <th>{$row['pesel']}</th>
            <th>{$row['email']}</th> <th>{$row['start_date']}</th> 
            <th><a href='/stronka_/edit.php?name={$row['name']}&surname={$row['surname']}&pesel={$row['pesel']}&email={$row['email']}&start_date={$row['start_date']}&id={$row['ID']}'>tu edytuj</a></th>
            </tr>";
          }
        ?>
      </table>
    </div>

</body>
</html>