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

<hr />
