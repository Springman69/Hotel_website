<?php
session_start();

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

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM logowanie WHERE username='$username' AND password='$password'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $_SESSION['username'] = $username;
  header('Location: index.php');
} else {
  echo "Nieprawidłowe dane logowania";
}
$conn->close();
?>