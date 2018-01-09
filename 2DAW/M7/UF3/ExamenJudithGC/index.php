<?php

 include 'DB.php';
 
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Examen Judith Gutiérrez</title>
    </head>
    <body>
      
        <!--Botones para clicar y que salga el resultado-->
        <form action="index.php" method="post">
            <input type="submit" name="ex" value="1">
            <input type="submit" name="ex" value="2">
            <input type="submit" name="ex" value="3">
          
            
        </form>  
         <?php
       
        if(isset($_POST['ex'])){
            $BaseDades = new DB();
         
            switch ($_POST['ex']){
                case 1: 
                    $BaseDades->ex1();
                    break;
                case 2:
                    $BaseDades->ex2();
                    break;
                case 3:
                    $BaseDades->ex3();
                    break;
            }
        }
               
        ?>
    </body>
</html>