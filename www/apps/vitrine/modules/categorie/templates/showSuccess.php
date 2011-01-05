<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $Categorie->getId() ?></td>
    </tr>
    <tr>
      <th>Nom:</th>
      <td><?php echo $Categorie->getNom() ?></td>
    </tr>
    <tr>
      <th>Description:</th>
      <td><?php echo $Categorie->getDescription() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('categorie/edit?id='.$Categorie->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('categorie/index') ?>">List</a>
