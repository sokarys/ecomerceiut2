<h1>Les différentes catégories</h1>

<table>
  <thead>
    <tr>
      <th>Nom</th>
      <th>Description</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Categories as $Categorie): ?>
    <tr>
       <td><a href="<?php echo url_for('article/index?categorie_id='.$Categorie->getId()) ?>"><?php echo $Categorie->getNom() ?></a></td>
      <td><?php echo $Categorie->getDescription() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

