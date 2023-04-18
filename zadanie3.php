<?php

$servername = "localhost";
$username = "nazwa_uzytkownika";
$password = "haslo_uzytkownika";
$dbname = "nazwa_bazy_danych";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
  die("Nieudane połączenie z bazą danych: " . $conn->connect_error);
}


$username = $_POST["username"];
$password = $_POST["password"];


$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);

$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);


if ($result->num_rows == 1) {
  echo "Zostałeś zalogowany!";
} else {
  echo "Nieprawidłowy login lub hasło";
}


$conn->close();
?>