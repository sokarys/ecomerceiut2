<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $Article->getId() ?></td>
    </tr>
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

<hr />

<a href="<?php echo url_for('article/edit?id='.$Article->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('article/index') ?>">List</a>
