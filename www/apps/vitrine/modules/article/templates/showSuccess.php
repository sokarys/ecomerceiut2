<table>
    <thead>
        <tr>
      <th>Nom:</th>
      <th>Prix:</th>
      <th>Description:</th>
      <th>Popularite:</th>
      <th>Stock:</th>
      <th>Categorie:</th>
      </tr>
    </thead>
  <tbody>
    <tr>
      
      <td><?php echo $Article->getNom() ?></td>
      <td><?php echo $Article->getPrix() ?> €</td>
     <td><?php echo $Article->getDescription() ?></td>
     <td><?php echo $Article->getPopularite() ?></td>
    
      <td><?php echo $Article->getStock() ?></td>
    <td><?php echo $Article->getCategorieId() ?></td>
    </tr>
  </tbody>
</table>

 <form method="post" action="<?php echo url_for1('panier/ajoutadd')?>">
     <table>
        <tr>
          <td><input type="text" style="display: none;" name="add_article_id" value="<?php echo $Article->getId(); ?>"/></td>
          <td><input type="text" name="quantite" size="3" value="1"/></td>
          <td><input type="submit" value="ajouter"/>
        </tr>
     </table>
 </form>

<hr />
