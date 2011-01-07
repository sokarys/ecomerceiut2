<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ArticlePanier
 *
 * @author sokarys
 */
class ArticlePanier{
    private $article;
    private $quantite;

    public function __construct() {
        $article = new Article();
    }

    public function setArticle(Article $art, $quantite){
        $article = $art;
        print_r($art);
        print_r($art);
        $this->quantite = $quantite;
    }

    public function getQuantite(){
        return $this->quantite;
    }

    public function getPrix() {
        return  $this->article->getPrix() * $this->quantite;
    }

    public function addQuantite($qt){
        $this->setQuantite($this->quantite + $qt);
    }

    public function getNom(){
        return "gelee"; //$this->article->getNom();
    }

    public function setQuantite($qt){
        if($qt>=0 ){
            if($qt > $article->getStock()){
                $this->quantite = $article->getStock();
            }else {
                $this->quantite = $qt;
            }
        }else{
            $this->quantite = 0 ;
        }
    }

    public function __toString() {
        $this->article + " * " + $this->quantite;
    }
}
?>
