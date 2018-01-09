<?php
// incluir la clase Cistella
include 'CistellaClass.php';
// Recuperem la informació de la sessió
session_start();
// I comprovem que l'usuari s'ha identificat
if (!isset($_SESSION['usuari'])) {
    die("Error - T'has <a href='login.php'>d'identificar</a>.<br />");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- Desenvolupament web en entorn servidor -->
<!-- Tema 3: Desenvolupament web amb PHP -->
<!-- Exemple botiga Web: cistella.php -->
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Exemple Tema 3: Cistella de la compra</title>
        <link href="botiga.css" rel="stylesheet" type="text/css">
    </head>
    <body class="pagcistella">
        <div id="contenidor">
            <div id="encapçalament">
                <h1>Cistella de la compra</h1>
            </div>
            <div id="productes">
                <?php
                    $_SESSION['cistella']->mostra();
              
                    $total = 0;
              
                    $prodCistella= $_SESSION['cistella']->get_productes();
                    foreach($prodCistella as $valor){
                      $total += $valor->getPVP();
                      
                    }
                ?>
                <hr />
                <p><span class='pagar'>Preu total: <?php print $total; ?> €</span></p>
                <form action='pagar.php' method='post'>
                    <p>
                    <span class='pagar'>
                    <input type='submit' name='pagar' value='Pagar'/>
                    </span>
                    </p>
                </form>
            </div>
                <br class="divisor" />
            <div id="peu">
                <form action='logoff.php' method='post'>
                    <input type='submit' name='desconnectar' value='Desconnectar l'usuari <?php echo $_SESSION['usuari']; ?>'/>
                </form>
            </div>
        </div>
    </body>
</html>