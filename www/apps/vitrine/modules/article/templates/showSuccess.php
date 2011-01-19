<table>
  <tbody>
    <tr>
      <th>Nom:</th>
      <td><?php echo $Article->getNom() ?></td>
    </tr>
    <tr>
      <th>Prix:</th>
      <td><?php echo $Article->getPrix() ?></td>
    </tr>
    <tr>
      <th>Description:</th>
      <td><?php echo $Article->getDescription() ?></td>
    </tr>
    <tr>
      <th>Popularite:</th>
      <td><?php echo $Article->getPopularite() ?></td>
    </tr>
    <tr>
      <th>Stock:</th>
      <td><?php echo $Article->getStock() ?></td>
    </tr>
    <tr>
      <th>Categorie:</th>
      <td><?php echo $Article->getCategorieId() ?></td>
    </tr>
  </tbody>
</table>
 <form method="post" action="<?php echo url_for1('panier/ajoutadd')?>">
        <tr>
          <td><input type="text" style="display: none;" name="add_article_id" value="<?php echo $Article->getId(); ?>"/></td>
          <td><input type="text" name="quantite" size="3" value="1"/></td>
          <td><input type="submit" value="ajouter"/>
        </tr>
     </form>

<hr />
