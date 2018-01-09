<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once('DB.php');
class Cistella {
    protected $productes = array();
    // Introdueix un nou article en la cistella de la compra
    public function nou_article($codi) {
        $producte = DB::obteProducte($codi);
        $this->productes[] = $producte;
    }
    // Obté els articles de la cistella.
    public function get_productes() { return $this->productes; }
    // Obté el cost total dels articles de la cistella
    public function get_cost() {
        $cost = 0;
        foreach($this->productes as $p) $cost += $p->getPVP();
        return $cost;
    }
    // Retorna verdader si la cistella es buida.
    public function buida() {
        if(count($this->productes) == 0) return true;
        return false;
    }
  
// Guarda la cistella de la compra en la sessió de l'usuari
    public function guarda_cistella() { $_SESSION['cistella'] = $this; }
// Recupera la cistella de la compra emmagatzemada en la sessió d'usuari.    
    public static function carrega_cistella() {
        if (!isset($_SESSION['cistella'])) return new Cistella();
        else return ($_SESSION['cistella']);
    }
  
// Mostra l'HTML de la cistella de la compra, amb tots els productes    
    public function mostra() {
        // Si la cistella es buida, mostrem un missatge.
        if (count($this->productes)==0){ 
          print "<p>Cistella buida</p>";
        }
        // i si no es buida, mostrem el seu contingut
        else{
          ?>
            <table id="taula">
              <tr>
                <th>Codi</th>
                <th>Producte</th>
                <th>Preu</th>
              </tr>
          <?php
          foreach ($this->productes as $producte) 
            $producte->mostra();
          echo "</table>";
          echo "<br>";
        }
    }
}
?>    