<?php
// Incluir la clase Cistella
include 'CistellaClass.php';
// Recuperem la informació de la sessió
session_start();
// i comprovem que s'usuari s'ha identificat
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
        <link href="botiga.css" rel="stylesheet" type="text/css">
    </head>
    <body class="pagproductes">
        <div id="contenidor">
        <div id="encapçalament">
            <h1>Llistat de productes</h1>
        </div>
        <div id="cistella">
            <h3><img src="cistella.png" alt="Cistella" width="24" height="21">Cistella</h3>
            <hr />
            <?php
           
                // Comprovem si s'ha enviat el formulari de buidar la cistella
                if (!isset($_SESSION['cistella']) || isset($_POST['buidar'])) {
                  $_SESSION['cistella'] = new Cistella();
                }
                // Comprovem si s'ha enviat el formulari d'afegir
                 if (isset($_POST['enviar'])) {
                    // afegim el nou producte
                    $_SESSION['cistella']->nou_article($_POST['codi']);
                }              
                // MOSTRA EL CONTINGUT DE LA CISTELLA
                 $_SESSION['cistella']->mostra();
          
                $cistella_buida = true;
                if (!$_SESSION['cistella']->buida()) {
                    $cistella_buida = false;
                }
                
            ?>
            <form id='buidar' action='productes.php' method='post'>
                <input type='submit' name='buidar' value='Buidar cistella'
                <?php if ($cistella_buida) print "disabled='true'"; ?>
                />
            </form>
            <form id='comprar' action='cistella.php' method='post'>
                <input type='submit' name='comprar' value='Comprar'
                <?php if ($cistella_buida) print "disabled='true'"; ?>
            />
            </form>
        </div>
        <div id="productes">
            <?php
                 try {
                    $DataBase = new DB();
                }
                catch (PDOException $e) {
                    $error = $e->getCode();
                    $missatge = $e->getMessage();
                }
            if (!isset($error)) {
                  $productes = $DataBase->obteProductes();
                
                    // creem un formulari per cada producte obtingut
                  foreach($productes as $valor){
                    echo "<p><form id='{$valor->getcodi()}' action='productes.php' method='POST'>";
                    echo "<input type='hidden' name='codi' value='".$valor->getcodi()."'/>";
                    echo "<input type='submit' name='enviar' value='Afegir'/>"; 
                        echo " ". $valor->getnomcurt() .": ";
                        echo " ". $valor->getPVP() ." euros.";
                    echo "</form>";
                    echo "</p>";
                }
            }
           
        ?>
        </div>
            <br class="divisor" />
            <div id="peu">
                <form action='logoff.php' method='post'>
                <input type='submit' name='desconnectar' value='Desconnectar usuari <?php echo $_SESSION['usuari']; ?>'/>
                </form>
            <?php
            if (isset($error)) {
                print "<p class='error'>Error $error: $missatge</p>";
            }
            ?>
        </div>
    </div>
    </body>
</html>

