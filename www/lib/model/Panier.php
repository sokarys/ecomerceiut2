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
    private $articles = array();

    public function __construct() {       
    }

    public function __destruct() {

    }

    public function addNewArticle(Article $a, $quantite){
        $art = new ArticlePanier();
        $art->setArticle($a, $quantite);
        return $this->addArticle($art);
    }

    public function addArticle(ArticlePanier $a){
        if(count($this->articles) == 0){
            $this->articles[] = $a;
            return true;
        }else{
            $act = $this->getArticle($a->getNom());
            print_r($act);
            if($act == NULL){
                $this->articles[] = $a;
              //  print_r($this->articles);
                return true;
            }else{
                $act->setQuantite($a->getQuantite());
                return true;
            }

        }
        return false;
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
            echo( $a+"<br/>");
        }
    }
    
    public function DelleteAll(){
       $this->articles = array();
    }

    public function getArticle($nomArticle){
        foreach ($this->articles as $art){
            if( strcmp($art->getNom() , $nomArticle) == 0){
                return $art;
            }
        }
        return NULL;
    }
    
    public function toCommande(){

    }

    public function __toString() {
        
    }
}
?>
