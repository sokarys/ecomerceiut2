<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Panier
 *
 * @author Michael
 */
class Panier {
    private $articles= array();

    public function __construct() {       
    }

    public function __destruct() {

    }

    public function addArticle(Article $a){
        $this->articles
    }

    public function delArticle($index){
        unset($articles[$index]);
    }

    public function nbTotalArticle(){

    }

    
    public function afficherPanier(){
        
    }
    public function DelleteAll(){
       $this->articles = array();
    }
    public function toCommande(){

    }

    public function __toString() {

    }
}
?>
