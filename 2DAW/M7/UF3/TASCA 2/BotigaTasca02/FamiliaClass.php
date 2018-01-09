<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Familia {
    protected $codi;
    protected $nom;
    
    public function getcodi() {return $this->codi; }
    public function getnom() {return $this->nom; }
    public function mostra(){
        //Cogemos el codigo y el nombre
        echo "<tr><td>".$this->codi."</td><td>".$this->nom."</td></tr>";
    }
    public function __construct($row) {
        $this->codi= $row['cod'];
        $this->nom= $row['nom'];
    }
}
