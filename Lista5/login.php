<?php
session_start();

$username = $_POST["username"];
$password = hash("sha256", $_POST["password"]);

$db = new PDO('sqlite:./app.db');

$result = $db->query("select password from users where username='$username'");


foreach ($result as $row) {
  if ($row['password'] == $password) {
    //setcookie("username", $username, time() + 5 * 60);

    $_SESSION["username"] = $username;

    header("Location: index.php");
    exit();
  }
}

echo "login error";
