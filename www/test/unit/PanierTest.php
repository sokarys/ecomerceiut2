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
$t = new lime_test(10, new lime_output_color()); // on s'apprête à faire 10 tests
// commencer ici les tests sur vos objets métier
$p = new Panier();
$a = new Article();
$t->diag('Panier()');
$t->isa_ok(new Panier(), 'Panier', 'new Panier crée des objets de la bonne classe');

$t->diag('addArticle()');
$t->isa_ok($p->addNewArticle($a,1), 'null','Panier() renvoie rien');

$t->i
?>
