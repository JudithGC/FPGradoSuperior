<?php
//Incluir la clase CistellaClass
include 'CistellaClass.php';
//Recuperar la información de la sesión
session_start();
//Comprobamos que el usuario se ha identificado
if (!isset($_SESSION['usuari'])) {
    die("Error - t'has <a href='login.php'>d'identificar</a>.<br />");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- Desenvolupament web en entorn servidor -->
<!-- Tema 3 : Desenvolupament d'aplicacions web amb PHP -->
<!-- Exemple Botiga Web: productes.php -->
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Exemple Tema 3: llistat de productes</title>
        <link href="../botiga.css" rel="stylesheet" type="text/css">
    </head>
    <body class="pagproductes">
            <?php
                try {
                    //Se crea una clase del tipo DB
                    $DataBase = new DB();
                }
                catch (PDOException $e) {
                    $error = $e->getCode();
                    $missatge = $e->getMessage();
                }
            ?>
    <div id="contenidor">
        <div id="encapçalament">
            <h1>Edició d'un producte</h1>
            <hr>
        </div>
            <div id='producte'>
                <style>
                    form *{border-radius: 5px;}
                    form input{width: 500px;}
                    form input#pvp{width: 100px;}
                    form textarea#nom{resize: none; width: 500px; height: 15px;}
                    form textarea#descripcio{resize: none; width: 500px; height: 200px;}
                    form input#accan{width: 100px; float:left; margin: 10px;}
            
                </style>
                <?php
                if (isset($_POST['editar'])) {
                    $producte = $DataBase->obteProducte($_POST['codi']);
                    //Empieza el formulario de edición
                    echo "<form id='{$producte->getcodi()}' action='actualitzar.php' method='POST'>";
                    echo "<input type='hidden' name='codi' value='".$producte->getcodi()."'/>";
                    
                    echo "<p><strong>Nom Curt</strong></p>";
                    echo "<p><input type='text' name='nom_curt' value='".$producte->getnomcurt()."'/></p>";
                    echo "<p><strong>Nom</strong></p>";
                    echo "<p><textarea id='nom' name='nom'>{$producte->getnom()}</textarea></p>";
                    echo "<p><strong>Descripcio</strong></p>";
                    echo "<p><textarea id='descripcio' name='descripcio'>{$producte->getDescripcio()}</textarea></p>";
                    echo "<p><strong>PVP</strong></p>";
                    echo "<p><input id='pvp' type='text' name='pvp' value='".$producte->getPVP()."'/></p>";
                    //Botones de actualizar y de cancelar
                    echo "<p><input id='accan' type='submit' name='actualitzar' value='Actualitzar'/></p>"; 
                    echo "<p><input id='accan' type='submit' name='cancelar' value='Cancel·lar'/></p>"; 
                    //Cerramos el form
                    echo "</form>";
                }
            ?>
            </div>
            </div>
            
    </body>
</html>


