<table>
  <tbody>
    <tr>
      <th>Client:</th>
      <td><?php echo $Commande->getClientId() ?></td>
    </tr>
    <tr>
      <th>Article:</th>
      <td><?php echo $Commande->getArticleId() ?></td>
    </tr>
    <tr>
      <th>Quantite:</th>
      <td><?php echo $Commande->getQuantite() ?></td>
    </tr>
    <tr>
      <th>Prix:</th>
      <td><?php echo $Commande->getPrix() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $Commande->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Etat:</th>
      <td><?php echo $Commande->getEtat() ?></td>
    </tr>
    <tr>
      <th>Id:</th>
      <td><?php echo $Commande->getId() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('commande/edit?id='.$Commande->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('commande/index') ?>">List</a>
