<h1>Liste des articles de notre catégorie</h1>

<table>
  <thead>
    <tr>
      <th>Nom</th>
      <th>Prix Unitaire</th>
      <th>Quantité</th>
      <th>Prix Total</th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
     
       <?php if($sf_user->hasAttribute("panier")){ ?>
            <?php $panier = $sf_user->getAttribute("panier"); ?>
            <?php foreach($panier->getArticles() as $art){ ?>
                   
                   <tr>
                       <form method="post" action="<?php echo url_for1('panier/modif');?>">
                           <td><?php echo $art->getNom(); ?></td>
                           <td><?php echo $art->getArticle()->getPrix(); ?></td>
                           <td><input type="text" name="quantite" value="<?php echo $art->getQuantite(); ?>" /></td>
                           <td><?php echo $art->getPrix(); ?></td>
                           <td><input type="text" name="add_article_id" style="display:none;" value="<?php echo $art->getArticle()->getId(); ?>" /></td>
                           <td><input type="submit" value="modifier"/></td>
                        </form>
                        <form method="post" action="<?php echo url_for1('panier/modif');?>">
                           <td><input type="text" name="quantite" value="0" style="display:none;"/></td>
                           <td><input type="text" name="add_article_id" style="display:none;" value="<?php echo $art->getArticle()->getId(); ?>" /></td>
                           <td><input type="submit" value="suprimmer"/></td>
                        </form>
                   </tr>
            <?php }?>
      <?php }?>
  </tbody>  
</table>
<p> Prix total : <?php echo $panier->getPrixTotal(); ?> </p>

<p> <?php if($sf_user->hasAttribute("stock")){
    if($sf_user->getAttribute("stock") == true){
         echo 'Il n\'y a pas assez d\'article en stock';
    }
} ?></p>

<p>
    <a href="<?php echo url_for1('panier/commander');?>">Commander</a>
</p>