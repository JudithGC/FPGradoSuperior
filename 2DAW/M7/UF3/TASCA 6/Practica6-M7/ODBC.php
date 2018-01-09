<?php
class ODBC {
	protected static $ODBC;
	public function __construct($dsn , $user=NULL, $pass=NULL){
		self::$ODBC = odbc_connect($dsn,$user,$pass);
		if(!self::$ODBC){
			die("No s'ha pogut connectar");
		}
	}
        
	public static function executaConsulta($sql) {
		$db = self::$ODBC;
		$resultats = odbc_exec($db,$sql);
                if(!$resultats){
                    die("No s'ha pogut fer la consulta");
                }
                return $resultats;
        }
        
        public static function ex1(){
            $sql= 'SELECT * FROM magatzems';
            $resultat = self::executaConsulta($sql);
            
        while ($row= odbc_fetch_array($resultat)) {
            echo "<p>". $row['Cod']. " ". $row['Nom']. " ". $row['Lloc'] . " ". $row['Capacitat'].  "</p>";
            
        }
        }
        public static function ex2(){
            $sql= 'SELECT * FROM productes WHERE valor > 150';
            $resultat = self::executaConsulta($sql);
            
        while ($row= odbc_fetch_array($resultat)) {
            echo utf8_encode("<p>". $row['NUM_REF']. " ". $row['Contingut']. " ". $row['Valor'] . " ". $row['Valor Importar'].  "</p>");
            
        }
        }
        public static function ex3(){
            $sql= 'SELECT Contingut FROM productes';
            $resultat = self::executaConsulta($sql);
            
        while ($row= odbc_fetch_array($resultat)) {
          
            echo utf8_encode("<p>". $row['Contingut'].   "</p>");
            
        }
        }
         public static function ex4(){
            $sql= 'SELECT AVG(valor) "mitja" FROM productes';
            $resultat = self::executaConsulta($sql);
            
        while ($row= odbc_fetch_array($resultat)) {
          
            echo utf8_encode("<p>". $row['mitja'].   "</p>");
            
        }
        }
        public static function ex5(){
            $sql= 'SELECT magatzems.Cod, magatzems.Nom, AVG(valor) "mitja" FROM productes, magatzems
                WHERE productes.Magatzem = magatzems.cod
                GROUP BY magatzems.Cod';
            $resultat = self::executaConsulta($sql);
            
        while ($row= odbc_fetch_array($resultat)) {
          
            echo utf8_encode("<p>". $row['Cod']. $row['Nom']. $row['mitja'].   "</p>");
            
        }
        }
        public static function ex6(){
            $sql= 'SELECT magatzems.Cod FROM productes, magatzems
                WHERE productes.Magatzem = magatzems.cod
                GROUP BY magatzems.Cod
                HAVING AVG(valor) > 100';
            $resultat = self::executaConsulta($sql);
            
        while ($row= odbc_fetch_array($resultat)) {
          
            echo utf8_encode("<p>". $row['Cod'].  "</p>");
            
        }
        }
        public static function ex7(){
            $sql= 'SELECT NUM_REF, Lloc FROM productes INNER JOIN magatzems ON productes.Magatzem = magatzems.cod';
            $resultat = self::executaConsulta($sql);
            
        while ($row= odbc_fetch_array($resultat)) {
          
            echo utf8_encode("<p>". $row['NUM_REF']." ".$row['Lloc'].  "</p>");
            
        }
        }
        public static function ex8(){
            $sql= 'SELECT cod, Nom, COUNT(*) "num_prod" FROM productes INNER JOIN magatzems ON productes.Magatzem = magatzems.cod
                  GROUP BY cod';
            $resultat = self::executaConsulta($sql);
            
        while ($row= odbc_fetch_array($resultat)) {
          
            echo utf8_encode("<p>". $row['cod']." ".$row['Nom']." ".$row['num_prod']."</p>");
            
        }
        }
        public static function ex9(){
            $sql= 'SELECT cod FROM magatzems
                WHERE Capacitat < (SELECT COUNT(*) FROM productes WHERE magatzem = cod)';
            $resultat = self::executaConsulta($sql);
            
        while ($row= odbc_fetch_array($resultat)) {
          
            echo utf8_encode("<p>". $row['cod']."</p>");
            
        }
        }
        public static function ex10(){
            $sql= 'SELECT NUM_REF FROM productes INNER JOIN magatzems ON productes.Magatzem = magatzems.cod
                WHERE Lloc LIKE "Bilbao"';
            $resultat = self::executaConsulta($sql);
            
        while ($row= odbc_fetch_array($resultat)) {
          
            echo utf8_encode("<p>". $row['NUM_REF']."</p>");
            
        }
        }
}