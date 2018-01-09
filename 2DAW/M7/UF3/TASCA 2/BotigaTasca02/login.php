<?php
// incluir la clase CistellaClass, Producte.php,DB
include 'CistellaClass.php';
// Comprovem si ja s'ha enviat el formulari
   
if (isset($_POST['enviar'])) {
    //inicio una variable amb la calse de DB()
    $DataBase = new DB();
    
    $usuari = $_POST['usuari'];
    $password = $_POST['password'];
    if (empty($usuari) || empty($password)) {
        $error = "Has d'introduir un nom d'usuari i una contrasenya";
    } else {
// Executem la consulta per comprovar les credencials
        if ($DataBase->verificaClient($usuari, $password)) {
            session_start();
            $_SESSION['usuari'] = $usuari;
          
            try {
              $DataBase = new DB();
            }catch (PDOException $e) {
              $error = $e->getCode();
              $missatge = $e->getMessage();
            }
            if (!isset($error)) {
              $_SESSION['cistella'] = $DataBase->obteCistella($_SESSION['usuari']);
            }
          
          
          
          
          
            header("Location: productes.php");
        } else {
		   // Si les credencials no són correctes les tornem a demanar
            $error = "Usuari o contraseña no valids!";
        }
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- Desenvolupament web en entorn servidor -->
<!-- Tema 3 : Desenvolupament d'aplicacions web amb PHP -->
<!-- Exemple Botiga Web: login.php -->
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Exemple Tema 3: Login Botiga Web</title>
    <link href="botiga.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div id='login'>
        <form action='login.php' method='post'>
            <fieldset >
                <legend>Login</legend>
                <div><span class='error'> <?php if (!empty($error)) {echo $error;} ?> </span></div>
                <div class='camp'>
                    <label for='usuari' >Usuari:</label><br/>
                    <input type='text' name='usuari' id='usuari' maxlength="50" /><br/>
                </div>
                <div class='camp'>
                    <label for='password' >Contrasenya:</label><br/>
                    <input type='password' name='password' id='password' maxlength="50" /><br/>
                </div>
                <div class='camp'>
                    <input type='submit' name='enviar' value='Enviar' />
                </div>
            </fieldset>
        </form>
    </div>
</body>
</html>
