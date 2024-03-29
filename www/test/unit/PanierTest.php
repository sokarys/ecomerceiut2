<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
// pour inclure la bibliothèque "LIME"
include(dirname(__FILE__).'/../bootstrap/unit.php');
// pour pouvoir accéder à la base de données de l'application vitrine via les classes générées par Propel
new sfDatabaseManager(ProjectConfiguration::getApplicationConfiguration('vitrine','test', true));
// instancier un nouveau test
$t = new lime_test(5, new lime_output_color()); // on s'apprête à faire 10 tests
// commencer ici les tests sur vos objets métier
$p = new Panier();

$a = new Article();
$a->setNom("Reve Gourmand");
$a->setPrix(50.1);
$a->setDescription("Reve ou l'on bouf bien!");
$a->setPopularite(0);
$a->setStock(10);
//$a->save();

$t->diag('Panier()');
$t->isa_ok(new Panier(), 'Panier', 'new Panier crée des objets de la bonne classe');

$p->addNewArticle($a,1);
//$t->diag('addNewArticle()');
//$t->is($p->addNewArticle($a,1),'addNewArticle() - renvoie true si l\'article est en stock');
$t->diag('nbTotalArticle()');
$t->is($p->nbTotalArticle(), 1, 'nbTotalArticle() - Nombre article correct');
$t->diag('getPrix()');
$t->is($a->getPrix(), 50.1, 'getPrix() - prix article correct');

//$t->diag('getPrixTotal()');
//

//print($a->getPrix());



$t->diag('getPrixTotal()');
$t->is($p->getPrixTotal(), 50.1, 'getPrixTotal()-Le total de la commande est bon');
//$t->diag('second article');
$p->addNewArticle($a,2);

$t->diag('nbTotalArticle()');
$t->is($p->nbTotalArticle(), 3, 'nbTotalArticle() - Nombre article correct');
//$t->diag('getPrixTotal()');
//$t->is($p->getPrixTotal(), 100.2, 'getPrixTotal()- Le total de la commande est bon');
 

//print_r($p);

//$a->delete();


?>
