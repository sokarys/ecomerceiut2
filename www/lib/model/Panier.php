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
include_once("ArticlePanier.php");

class Panier {
   
    private $articles;

    public function __construct() { 
         $this->articles = array();
    }


    public function addNewArticle(Article $a, $quantite){
        $art = new ArticlePanier($a, $quantite);
        return $this->addArticlePanier($art);
    }

    public function addArticlePanier(ArticlePanier $a){

         if (array_key_exists($a->getArticle()->getId(),$this->articles)){
            $this->articles[$a->getArticle()->getId()]->addQuantite($a->getQuantite());
         } else {
            $this->articles[$a->getArticle()->getId()] = $a;
         }
    }

    public function delArticle($idArticle){
        unset($this->articles[$idArticle]);
    }

    public function nbTotalArticle(){
        $nbArt = 0;
        foreach ( $this->articles as $a) {
           $nbArt += $a->getQuantite();
        }
        return $nbArt;
    }

    public function getPrixTotal(){
        $prix = 0.0;
        foreach ( $this->articles as $a) {
           $prix = $prix + $a->getPrix();
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
    
    public function toCommande(Client $client) {
        $commande = new Commande();
        $commande->setClient($client);
        foreach ($this->contenu as $id => $ligne) {
            $ligneCommande = new LigneCommande();
            $ligneCommande->setCommande($commande);
            $ligneCommande->setArticle($ligne["article"]);
            $ligneCommande->setQuantite($ligne["quantite"]);
            $ligneCommande->setPrix($ligne["article"]->getPrix());
        }
        $commande->save();
        $this->DelleteAll();
        return $commande;
    }

    public function __toString() {
        
    }

/*     private $contenu;
    //contenu[i] = array("article"  => Article avec id =i,
    //                   "quantite" => quantite d'article i dans le panier)

    public function __construct() {
        $this->contenu = array();
    }

    public function getContenu() {
        return $this->contenu;
    }

    public function ajoutArticle (Article $art, $qte = 1) {
        if (array_key_exists($art->getId(), $this->contenu))
            $this->contenu[$art->getId()]["quantite"]+=$qte;
        else
            $this->contenu[$art->getId()]=array("article"  => $art,
                                                "quantite" => $qte);
        if ($this->contenu[$art->getId()]["quantite"]==0)
          unset($this->contenu[$art->getId()]);
    }

    public function getPrixTotal() {
        $total=0;
        foreach ($this->contenu as $id => $ligne)
            $total += $ligne["quantite"]*$ligne["article"]->getPrix();
        return $total;
    }

    public function supprimeArticle(Article $art) {
        if (isset($this->contenu[$art->getId()]))
            unset($this->contenu[$art->getId()]);
    }

    public function viderPanier() {
        $this->contenu = array();
    }

    public function getCommande(Client $client) {
        $commande = new Commande();
        $commande->setClient($client);
        foreach ($this->contenu as $id => $ligne) {
            $ligneCommande = new LigneCommande();
            $ligneCommande->setCommande($commande);
            $ligneCommande->setArticle($ligne["article"]);
            $ligneCommande->setQuantite($ligne["quantite"]);
            $ligneCommande->setPrix($ligne["article"]->getPrix());
        }
        $commande->save();
        $this->viderPanier();
        return $commande;
    }
*/

}
?>
