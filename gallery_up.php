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
}
//MYSQL


// Upload and Rename File

if (isset($_POST['submit']))
{
    $id = $_GET['id'];

	$filename = $_FILES["file"]["name"];
	$file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
	$file_ext = substr($filename, strripos($filename, '.')); // get file name
	$filesize = $_FILES["file"]["size"];
	$allowed_file_types = array('.jpg','.png','.jpeg');	

	if (in_array($file_ext,$allowed_file_types) && ($filesize < 10000000))
	{	

        $n=20;
        function getRandomString($n) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randomString = '';
          
            for ($i = 0; $i < $n; $i++) {
                $index = rand(0, strlen($characters) - 1);
                $randomString .= $characters[$index];
            }
          
            return $randomString;
        }
          
        $name =  getRandomString($n);
        $newfilename = $name. $file_ext;

        $sql ="INSERT INTO `gallery` (`ID`, `user`, `link`) VALUES (NULL, '$id', 'g/$newfilename');";
        $conn->query($sql);
				
		move_uploaded_file($_FILES["file"]["tmp_name"], "g/" . $newfilename);
		echo "File uploaded successfully.";		

		;mysqli_set_charset($conn,"utf8"); $log = "INSERT INTO `log` (`user`, `action`) VALUES ('{$_SESSION['user_id']}', 'Dodał nowe zdjęcie do galerii o nazwie $newfilename');"; $conn->query($log);
        header('Location: /stronka_/gallery.php');
	}
	elseif (empty($file_basename))
	{	
		// file selection error
		echo "Please select a file to upload.";
	} 
	elseif ($filesize > 200000)
	{	
		// file size error
		echo "The file you are trying to upload is too large.";
	}
	else
	{
		// file type error
		echo "Only these file typs are allowed for upload: " . implode(', ',$allowed_file_types);
		unlink($_FILES["file"]["tmp_name"]);
	}
}

?>