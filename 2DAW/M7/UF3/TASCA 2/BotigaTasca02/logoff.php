<?php
// incluir la clase CistellaClass
include 'CistellaClass.php';

session_start();
// i comprovem que s'usuari s'ha identificat
if (!isset($_SESSION['usuari'])) {
    die("Error - t'has <a href='login.php'>d'identificar</a>.<br />");
}

try {
  $DataBase = new DB();
}catch (PDOException $e) {
  $error = $e->getCode();
  $missatge = $e->getMessage();
}
if (!isset($error)) {
  $DataBase->pujaCistella($_SESSION['cistella'], $_SESSION['usuari']);
}


session_destroy();
header("Location: login.php");
?>

session_destroy();
header("Location: login.php");
?>