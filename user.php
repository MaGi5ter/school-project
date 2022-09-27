<?php
    session_start();
    if($_SESSION['status'] == 1)
    {
        if($_SESSION['admin'] == 1)
        {
            header('Location: /stronka_/admin.php');   
        }
        else{

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
                $imie = $row['name'];
                $nazwisko = $row['surname'];
                $email = $row['email'];
                $pesel = $row['pesel'];
                $data = $row['start_date'];
            }
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
    <meta name="description" content="Done by MaGi5ter#0411">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="user.css">
    <title>Witaj user</title>
</head>
<body>
    <div class='container'>
        <div class = 'top'>
            <h1>WITAJ KOLEGO</h1>
            <?php
            echo "<h2>$login</h2>";
            ?>
        </div>

        <div class="twoje_dane">
            <h2>Twoje dane</h2>

            <div class ='twoje_dane_po_lewo_byc_maja'>
                <?php
                    echo "
                     <h2>Imie : $imie</h2>
                     <h2>Nazwisko : $nazwisko</h2>
                     <h2>PESEL : $pesel</h2>
                     <h2>E-MAIL : $email</h2>
                     <h2>Data rozpoczęcia : $data</h2>
                    ";
                ?>
            </div>
        </div>

        <div class='nizej_niz_top'>
            <?php
                echo "
                <form action='user.php' method='post'>
                    <h2>Tu możesz edytować twoje dane</h2>

                    Nie możesz edytować PESELU i daty, bo to się nie zmienia przecież :D <br><br>
                    Imie
                    <input type='text' name='edit_name' value = '$imie' required><br>
                    Nazwisko
                    <input type='text' name='edit_surname' value = '$nazwisko' required><br>
                    E-mail
                    <input type='text' name='edit_email' value = '$email' required><br>";
                ?>

            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    $name_e = $_POST['edit_name'];
                    $surname_e = $_POST['edit_surname'];
                    $email_e = $_POST['edit_email'];

                    $sqloo ="UPDATE users_data SET `name` = '$name_e' , `surname` = '$surname_e' , `email` = '$email_e' WHERE ID = {$_SESSION['user_id']} ";
                    $conn->query($sqloo);

                    echo "<input type='submit' value='ZAPISZ'>
                    </form> 
                    <div class='kwadracik'>
                    ZAPISUJE
                    </div>";

                    header("Refresh:2");
                }
                else
                {
                    echo "<input type='submit' value='ZAPISZ'>
                    </form> ";
                }
            ?>
            
        </div>

        <div class = 'tu_haselo_mozesz_zmienic'>
                <h2>Tu możesz zmienić hasło</h2>

                <form action='user.php' method='post'>
                    Podaj nowe hasło
                    <input type='text' name='edit_pwd1'  required><br>
                    Potwierdź hasło
                    <input type='text' name='edit_pwd2'  required><br><br>
                    <input type='submit' value='ZAPISZ'>
                </form>
        </div>
    </div>
</body>
</html>