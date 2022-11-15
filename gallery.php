<?php
  session_start();
  if($_SESSION['status'] == 1)
  {
    

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

        $sql = "SELECT * FROM users WHERE ID = '{$_SESSION['user_id']}'";
        $result = $conn->query($sql);

        while($row = $result->fetch_assoc()) {
            $login = $row['login'];
        }

        $sql1 = "SELECT * FROM users_data WHERE ID = '{$_SESSION['user_id']}'";
        $wyniki = $conn->query($sql1);

        while($row = $wyniki->fetch_assoc()) {
        $image = $row['path'];
        }

        ;mysqli_set_charset($conn,"utf8"); $log = "INSERT INTO `log` (`user`, `action`) VALUES ('{$_SESSION['user_id']}', 'Załadował swoją Galerie');"; $conn->query($log);
    
  }
  else
  {
    header('Location: /stronka_');
  }
?>


<html>
<head>
<style>
div.gallery {
  border: 1px solid #ccc;
}

body {
    background: rgb(80, 77, 77);
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 100%;
  height: auto;
}

div.desc {
  padding: 15px;
  text-align: center;
}

* {
  box-sizing: border-box;
}

.responsive {
  padding: 0 6px;
  float: left;
  width: 24.99999%;
}

@media only screen and (max-width: 1000px) {
  .responsive {
    width: 80%;
    margin: 6px 0;
  }
}

@media only screen and (max-width: 600px) {
  .responsive {
    width: 100%;
  }
}

.clearfix:after {
  content: "";
  display: table;
  clear: both;
}

.dodaj {
  padding: 20px;
  text-align: center;
}

h2 {
  text-align: center;
}
</style>
</head>
<body>

<h2 style = "padding-top: 10px">GALERIA</h2>

<div class = 'dodaj'>
<h2> Dodaj Zdjecie do galeri</h2>
    <?php
        echo "
        <form action='gallery_up.php?id={$_SESSION['user_id']}' method='post' enctype='multipart/form-data'> 
            ";
        ?>
     <input id="file" name="file" type="file" />
    <input id="Submit" name="submit" type="submit" value="Submit" />
    </form>

</div>

<?php

    $sql = "SELECT * FROM gallery WHERE user = '{$_SESSION['user_id']}'";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()) {
        echo "
        <div class='responsive'>
        <div class='gallery'>
          <a target='_blank' href='{$row['link']}'>
            <img src='{$row['link']}' alt='Cinque Terre' width='600' height='400'>
          </a>
        </div>
      </div>  
        ";
    }

?>

<div class="clearfix"></div>


</body>
</html>