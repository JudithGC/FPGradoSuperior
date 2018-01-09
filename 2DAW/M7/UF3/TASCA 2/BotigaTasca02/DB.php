<?php
//Este archivo es el que se encarga de la conexión entre el proyecto y la base de datos
require_once('Producte.php');
class DB {
    protected static function executaConsulta($sql) {
        $nombasedatos = "dwes";
        $host= "localhost";
        $usuari = 'dwes';
        $contrasenya = 'abc123';
        $dwes = mysqli_connect($host, $usuari, $contrasenya, $nombasedatos);
        $dwes->set_charset('utf8');
        $error= $dwes->connect_errno;
        $resultat = null;
        if ($error==null) $resultat = $dwes->query($sql);
            return $resultat;
    }
    public static function obteFamilies(){
        //Sentencia sql que se ejecutará para obtener la familia
        $sql = "SELECT cod, nom FROM familia;";
        $resultat = self::executaConsulta ($sql);
        $productes = array();
        if($resultat) {
        // Añadimos un elemento por cada producto obtenido
        $row = $resultat->fetch_array();
        while ($row != null) {
            $families[] = new Familia($row);
            $row = $resultat->fetch_array();
            }
        }
        return $families;
    }
   public static function obteProductes() {
        $sql = "SELECT cod, nom_curt, nom, descripcio, PVP FROM producte;";
        $resultat = self::executaConsulta ($sql);
        $productes = array();
        if($resultat) {
        // Añadimos un elemento por cada producto obtenido
        $row = $resultat->fetch_array();
        while ($row != null) {
            $productes[] = new Producte($row);
            $row = $resultat->fetch_array();
            }
        }
        return $productes;
    }
    public static function obteProductesFamilia($familia) {
        $sql = "SELECT cod, nom_curt, nom, descripcio, PVP FROM producte";
        $sql .= " WHERE familia LIKE '" . $familia . "'";
        $resultat = self::executaConsulta ($sql);
        $productes = array();
        if($resultat) {
        // Añadimos un elemento por cada producto obtenido
        $row = $resultat->fetch_array();
        while ($row != null) {
            $productes[] = new Producte($row);
            $row = $resultat->fetch_array();
            }
        }
        return $productes;
    }
    public static function obteProducte($codi) {
        $sql = "SELECT cod, nom_curt, nom, descripcio, PVP FROM producte";
        $sql .= " WHERE cod='" . $codi . "'";
        $resultat = self::executaConsulta ($sql);
        $producte = null;
        if(isset($resultat)) {
            $row = $resultat->fetch_array();
            $producte = new Producte($row);
        }
    return $producte;
    }
    public static function ActualitzarProducte($codi, $nom_curt, $nom, $descripcio, $PVP) {
        $sql = "UPDATE producte SET nom = '{$nom}', nom_curt = '{$nom_curt}', descripcio = '{$descripcio}', PVP = '{$PVP}' WHERE cod = '{$codi}'";
        self::executaConsulta ($sql);
    }
  
   public static function obteCistella($usuari) {
        $sql = "SELECT Cistella FROM usuaris WHERE usuari = '". $usuari ."'";
        $resultat = self::executaConsulta ($sql);
      
        $cistella = new Cistella();
        if(isset($resultat)) {
          $row = $resultat->fetch_array();
          if(!empty($row['Cistella']))
            $cistella = unserialize($row['Cistella']);
        }
     
        return $cistella;
    }
    public static function pujaCistella($cistella, $usuari) {
        if($cistella->buida()){
          $cistella = '';
        }else{
          $cistella = serialize($cistella);
        }
      
        $sql = "UPDATE usuaris SET Cistella = '" . $cistella . "' WHERE usuari = '". $usuari ."'";
        self::executaConsulta ($sql);
    }
  
    public static function verificaClient($nom, $contrasenya) {
        $sql = "SELECT usuari FROM usuaris ";
        $sql .= "WHERE usuari='$nom' ";
        $sql .= "AND contrasenya='" . md5($contrasenya) . "';";
        $resultat = self::executaConsulta ($sql);
        $verificat = false;
        if(isset($resultat)) {
            $fila = $resultat->fetch_array();
            if($fila !== false)
                $verificat=true;
        }
        return $verificat;
    }
}
?>

