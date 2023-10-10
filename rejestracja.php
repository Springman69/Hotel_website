<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];

  if ($password != $confirm_password) {
    echo "Hasła się nie zgadzają";
    exit();
  }

  $sql = "INSERT INTO logowanie (username, password) VALUES ('$username', '$password')";

  if ($conn->query($sql) === TRUE) {
    echo "Rejestracja zakończona pomyślnie!";
    header('Location: index.php'); 
    exit; 
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  

}
$conn->close();
?>

