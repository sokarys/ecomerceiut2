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

    public function addArticle(ArticlePanier $a){
        $this->articles
    }

    public function delArticle($index){
        unset($articles[$index]);
    }

    public function nbTotalArticle(){
        $nbArt = 0;
        foreach ( $this->articles as $article) {
           $quantite = $article->getQuantite();
           $nbArt += $quantite;
        }
           return $nbArt;
    }

    public function getPrixTotal(){
        $prix = 0.0;
        foreach ( $this->articles as $article) {
           $prix += $article->getPrix();
        }
           return $prix;
    }

    
    public function afficherPanier(){
        foreach( $this->articles as $a){
            print $a;
        }
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
