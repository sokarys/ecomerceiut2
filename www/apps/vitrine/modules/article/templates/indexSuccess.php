<h1>Les Articles</h1>

<table>
  <thead>
    <tr>
      <th>Nom</th>
      <th>Prix</th>
      <th>Description</th>
      <th>Popularite</th>
      <th>Stock</th>
      <th>Categorie</th>
      <th></th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Articles as $Article): ?>
  <form method="post" action="<?php echo url_for1('panier/ajout')?>">
      
        <tr>
          <td><a href="<?php echo url_for('article/show?id='.$Article->getId()) ?>"><?php echo $Article->getNom() ?></a></td>
          <td><?php echo $Article->getPrix() ?> €</td>
          <td><?php echo $Article->getDescription() ?></td>
          <td><?php echo $Article->getPopularite() ?></td>
          <td><?php echo $Article->getStock() ?></td>
          <td><?php echo $Article->getCategorie()->getNom() ?></td>
          <?php if($Article->getStock()>0){ ?>
          <td><input type="text" style="display: none;" name="add_article_id" value="<?php echo $Article->getId(); ?>"/></td>
          <td><input type="text" name="quantite" size="3" value="1"/></td>
          <td><input type="submit" value="ajouter"/>
           <?php } ?>
        </tr>
     </form>
    <?php endforeach; ?>
  </tbody>
</table>
