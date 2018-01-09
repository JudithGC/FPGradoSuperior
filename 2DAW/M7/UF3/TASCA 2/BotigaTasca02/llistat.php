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
            <h1>Llistat de productes d'una familia</h1>
       
            <!-- Menú de selección -->
             <form action='llistat.php' method='POST'>
                <select name="familia">
                <?php 
                //Comprobamos si isset es diferente de error si es asi ejecutamos obtenerfamilia
                    if (!isset($error)){
                        $families = $DataBase->obteFamilies();
                        //Creamos un formulario para mostrar cada familia obtenida
                        foreach($families as $valor){
                             echo "<option value='{$valor->getcodi()}'>{$valor->getnom()}</option>";
                        }
                    }
                ?>
             </select>
           
             <input type='submit' name='mostrarFamilia' value='Mostrar'/>
            </form>
       </div>
        <div id="cistella">
            <hr />
            <h3>Productes de la familia:</h3>
        </div>
        <div id="productes">
            <?php
              
            if(isset($_POST['mostrarFamilia'])){
               
            if (!isset($error)) {
                //Se le indica de donde tiene que coger los datos
                  $productes = $DataBase->obteProductesFamilia($_POST['familia']);
                
                    // creem un formulari per cada producte obtingut
                   foreach($productes as $valor){
                        echo "<p><form id='{$valor->getcodi()}' action='editar.php' method='POST'>";
                        echo "<input type='hidden' name='codi' value='".$valor->getcodi()."'/>";
                        echo "<input type='submit' name='editar' value='Editar'/>"; 
                            echo " ". $valor->getnomcurt() .": ";
                            echo " ". $valor->getPVP() ." euros.";
                        echo "</form>";
                        echo "</p>";
                    }
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

