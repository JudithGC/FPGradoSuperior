<?php

 include 'DB.php';
 
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Tasca 03</title>
    </head>
    <body>
      
        <!--Botones para clicar y que salga el resultado-->
        <form action="index.php" method="post">
            <input type="submit" name="ex" value="1">
            <input type="submit" name="ex" value="2">
            <input type="submit" name="ex" value="3">
            <input type="submit" name="ex" value="4">
            <input type="submit" name="ex" value="5">
            <input type="submit" name="ex" value="6">
            <input type="submit" name="ex" value="7">
            <input type="submit" name="ex" value="8">
            <input type="submit" name="ex" value="9">
            <input type="submit" name="ex" value="10">
          
            
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
                case 4:
                    $BaseDades->ex4();
                    break;
                case 5:
                    $BaseDades->ex5();
                    break;
                case 6:
                    $BaseDades->ex6();
                    break;
                case 7:
                    $BaseDades->ex7();
                    break;
                case 8:
                    $BaseDades->ex8();
                    break;
                case 9:
                    $BaseDades->ex9();
                    break;
                case 10:
                    $BaseDades->ex10();
                    break;
                    
            }
        }
               
        ?>
    </body>
</html>
