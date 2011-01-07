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
class ArticlePanier extends Article{
    private $quantite;

    function setArticle(Article $a, $quantite){
        Article::$this = $a;
        $this->quantite = $quantite;
    }

    function getQuantite(){
        return $this->quantite;
    }

    function  getPrix() {
        return parent::getPrix()*$quantite;
    }
}
?>
