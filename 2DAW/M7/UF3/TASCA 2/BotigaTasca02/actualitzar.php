<?php
//Incluir la clase CistellaClass
include 'CistellaClass.php';
//Recuperar la información de la sesión
session_start();
//Comprobamos que el usuario se ha identificado
if (!isset($_SESSION['usuari'])) {
    die("Error - t'has <a href='login.php'>d'identificar</a>.<br />");
}
//Si pulsamos actualizar entonces ejecuta...
if(isset($_POST['actualitzar'])){
    try {
         //Se crea una clase del tipo DB
        $DataBase = new DB();
    }catch (PDOException $e) {
        $error = $e->getCode();
        $missatge = $e->getMessage();
    }
    //Llamamos al método Actualizar Producto y se le assignan los cambios que hemos introducido
    $DataBase->ActualitzarProducte($_POST['codi'], $_POST['nom_curt'], $_POST['nom'], $_POST['descripcio'], $_POST['pvp']);
}
//Si se le da a actualizar una vez realizado lo del if,guarda los cambios y retorna al listado
//En caso de que no se pulse actualizar (Se pulse cancelar) te devuelve al listado
header("Location: llistat.php");
?>