<h1>Categories List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Nom</th>
      <th>Description</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Categories as $Categorie): ?>
    <tr>
      <td><a href="<?php echo url_for('categorie/show?id='.$Categorie->getId()) ?>"><?php echo $Categorie->getId() ?></a></td>
      <td><?php echo $Categorie->getNom() ?></td>
      <td><?php echo $Categorie->getDescription() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('categorie/new') ?>">New</a>
