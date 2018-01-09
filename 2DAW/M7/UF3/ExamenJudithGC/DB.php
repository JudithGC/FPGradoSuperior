<?php

class DB{
    protected static $PDO;
    public function __construct() {
        $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
        $dsn = "mysql:host=localhost;dbname=examen";
        $usuari = 'root';
        $contrasenya = 'root';
        self::$PDO = new PDO($dsn, $usuari, $contrasenya, $opc);
    }

    protected static function executaConsulta($sql,$array=null) {
        $examen=self::$PDO;
        $preparar = $examen->prepare($sql,array(PDO::ATTR_CURSOR=>PDO::CURSOR_FWDONLY));
        $preparar ->execute($array);
        $resultat = $preparar->fetchAll();
        
            return $resultat;
    }
    public static function ex1(){
        $sql= "SELECT name,dni FROM patient,prescription WHERE city LIKE 'Barcelona' AND prescription.visit_date like = :fecha order by name ASC";
         $array = array(":fecha"=>"2018-02-10");
         $resultat = self::executaConsulta ($sql,$array);
        foreach ($resultat as $row) {
            echo $row['nom']." ". $row['dni'];
        }
    }
    public static  function ex2(){
        $sql= "SELECT patient.name , COUNT(*) AS COUNT FROM patient,prescription WHERE patient.pat_number=prescription.pat_number AND prescription.drug = :medicina ORDER by patient.name";
        $array = array (":medicina"=>"Clorfenamina");
        $resultat = self::executaConsulta ($sql,$array);
        foreach ($resultat as $row) {
             echo $row['name']." ". $row['count'];
        }
    }
    
    public static  function ex3(){
        $sql= "SELECT doctor.name,doctor.specialty FROM doctor,prescription WHERE specialty != 'Pediatria' AND doctor.doc_number=prescription.doc_number AND prescription.drug = :medicina";
        $array = array (":medicina"=>"Clorfenamina");
        $resultat = self::executaConsulta ($sql,$array);
        foreach ($resultat as $row) {
             echo $row['name']." ". $row['specialty'];
        }
    }
   
    }
