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

    function setArticle(Article $a, $quantite){
        $article = $a;
        $this->quantite = $quantite;
    }

    function getQuantite(){
        return $this->quantite;
    }

    function  getPrix() {
        return $this->article.getPrix() * $quantite;
    }

    function test(){
        
    }

    public function __toString() {
        $this->article + " * " + $this->quantite;
    }
}
?>
