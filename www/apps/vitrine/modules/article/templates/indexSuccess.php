<h1>Articles List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Nom</th>
      <th>Prix</th>
      <th>Description</th>
      <th>Popularite</th>
      <th>Stock</th>
      <th>Categorie</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Articles as $Article): ?>
    <tr>
      <td><a href="<?php echo url_for('article/show?id='.$Article->getId()) ?>"><?php echo $Article->getId() ?></a></td>
      <td><?php echo $Article->getNom() ?></td>
      <td><?php echo $Article->getPrix() ?></td>
      <td><?php echo $Article->getDescription() ?></td>
      <td><?php echo $Article->getPopularite() ?></td>
      <td><?php echo $Article->getStock() ?></td>
      <td><?php echo $Article->getCategorieId() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('article/new') ?>">New</a>
