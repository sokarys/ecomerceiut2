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

include_once("Article.php");

class ArticlePanier{
    private $article;
    private $quantite;

    public function __construct(Article $art, $quantite) {
        $this->setArticle($art, $quantite);
    }

    public function getArticle(){
        return $this->article;
    }
    public function getStock(){
        return $this->getArticle()->getStock();
    }

    public function setArticle(Article $art, $quantite){
        $this->article = $art;
        $this->quantite = $quantite;
    }

    public function getQuantite(){
        return $this->quantite;
    }

    public function getPrix() {
        return $this->article->getPrix() * $this->quantite;
    }

      public function getNom(){
        return $this->article->getNom();
    }

    public function setQuantite($qt){
        if($qt>=0 ){
            if($qt > $this->article->getStock()){
                $this->quantite = $this->article->getStock();
                return true;
            }else {
                $this->quantite = $qt;
                return false;
            }
        }else{
            $this->quantite = 0 ;
            return true;
        }
    }

    public function __toString() {
        $this->article + " * " + $this->quantite;
    }
}
?>
