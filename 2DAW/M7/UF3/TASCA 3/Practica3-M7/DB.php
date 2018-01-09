<?php


class DB{
    protected static $PDO;
    public function __construct() {
        $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
        $dsn = "mysql:host=localhost;dbname=practica3";
        $usuari = 'root';
        $contrasenya = 'root';
        self::$PDO = new PDO($dsn, $usuari, $contrasenya, $opc);
    }

    protected static function executaConsulta($sql,$array=null) {
        $practica3=self::$PDO;
        $preparar = $practica3->prepare($sql,array(PDO::ATTR_CURSOR=>PDO::CURSOR_FWDONLY));
        $preparar ->execute($array);
        $resultat = $preparar->fetchAll();
        
            return $resultat;
    }
    public static function ex1(){
        $sql= "SELECT cognom1,cognom2 FROM EMPLEATS;";
        $resultat = self::executaConsulta ($sql);
        foreach ($resultat as  $row) {
            echo "<p>". $row['cognom1'] . " ". $row['cognom2']. "</p>";
            
        }
    }
    public static  function ex2(){
        $sql= "SELECT DISTINCT cognom1,cognom2 FROM EMPLEATS;";
        $resultat = self::executaConsulta ($sql);
        foreach ($resultat as $row) {
            echo "<p>". $row['cognom1']." ". $row['cognom2']. "</p>";
        }
    }
    public static function ex3(){
       
        $sql = "SELECT * FROM EMPLEATS WHERE nom = :nom;";
        $array = array(":nom"=>"Pau");
        $resultat = self::executaConsulta ($sql,$array);
        foreach ($resultat as $row) {
            echo "<p>". $row['nom']." ". $row['cognom1']." ". $row['cognom2']." " .$row['departament']." " .$row['Salari']."</p>";
        }
    }
    public static function ex4(){
        $sql= "SELECT * FROM EMPLEATS WHERE nom = :nom1 OR nom = :nom2;";
        $array= array(":nom1"=>"Pau",":nom2"=>"Jordi");
        $resultat = self::executaConsulta ($sql,$array);
        foreach ($resultat as $row) {
            echo "<p>". $row['nom']." ". $row['cognom1']." ". $row['cognom2']." " .$row['departament']." " .$row['Salari']."</p>";
        }
    }
    public static function ex5(){
        $sql= "SELECT * FROM empleats WHERE departament = :departamento;";
        $array=array(":departamento"=>711);
        $resultat = self::executaConsulta ($sql,$array);
        foreach ($resultat as $row) {
            echo "<p>". $row['nom']." ". $row['cognom1']." ". $row['cognom2']." " .$row['departament']." " .$row['Salari']."</p>";
        }
    }
    public static function ex6(){
        $sql = "SELECT * FROM empleats WHERE departament = :departamento1 OR departament = :departamento2;";
        $array=array(":departamento1"=>711,":departamento2"=>700);
        $resultat = self::executaConsulta ($sql,$array);
        foreach ($resultat as $row) {
            echo "<p>". $row['nom']." ". $row['cognom1']." ". $row['cognom2']." " .$row['departament']." " .$row['Salari']."</p>";
        }
    }
    public static  function ex7(){
        $sql= "SELECT * FROM `empleats` WHERE cognom1 like :cognom;";
        $array=array(":cognom"=>"p%");
        $resultat = self::executaConsulta ($sql,$array);
        foreach ($resultat as $row) {
            echo "<p>". $row['nom']." ". $row['cognom1']." ". $row['cognom2']." " .$row['departament']." " .$row['Salari']."</p>";
        }
    }
    public static function ex8(){
        $sql= "SELECT SUM(pressupost) FROM `departaments`;";
        $resultat = self::executaConsulta ($sql);
        foreach ($resultat as $row) {
            echo "<p>". $row['SUM(pressupost)']."</p>";
        }
    }
    public static function ex9(){
        $sql= "SELECT departament, COUNT(*) FROM `EMPLEATS` GROUP BY departament;";
        $resultat = self::executaConsulta ($sql);
        foreach ($resultat as $row) {
            echo "<p>". $row['departament']."|| ". $row['COUNT(*)']."</p>";
        }
    }
    public static function ex10(){
        $sql= "SELECT * FROM empleats INNER JOIN departaments ON empleats.departament = departaments.codi;";
        $resultat = self::executaConsulta ($sql);
        foreach ($resultat as $row) {
            echo "<p>". $row['dni']." ". $row['nom']." ". $row['cognom1']." " .$row['cognom2']." " .$row['departament']." ".$row['Salari']." ".$row['codi']." ".$row['nom']." ".$row['pressupost']."</p>";
        }
    }
    
}

