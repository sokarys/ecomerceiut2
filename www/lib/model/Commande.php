<?php


/**
 * Skeleton subclass for representing a row from the 'magasin_commande' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 01/05/11 11:38:05
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class Commande extends BaseCommande {
    public function __toString(){
        return $this->getId();
    }
    public function getPrix(){
        $total =0;
        $c = new criteria();
        $c->add(LigneCommandePeer::COMMANDE_ID,$this->getId());
        $array = LigneCommandePeer::doSelect($c);
        foreach(  $array as $com){
            $total+=($com->getPrix()*$com->getQuantite());
        }
        return $total;
    }
    
} // Commande
