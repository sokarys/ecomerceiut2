<h1>Commandes List</h1>

<table>
  <thead>
    <tr>
      <th>Client</th>
      <th>Article</th>
      <th>Quantite</th>
      <th>Prix</th>
      <th>Created at</th>
      <th>Etat</th>
      <th>Id</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Commandes as $Commande): ?>
    <tr>
      <td><?php echo $Commande->getClientId() ?></td>
      <td><?php echo $Commande->getArticleId() ?></td>
      <td><?php echo $Commande->getQuantite() ?></td>
      <td><?php echo $Commande->getPrix() ?></td>
      <td><?php echo $Commande->getCreatedAt() ?></td>
      <td><?php echo $Commande->getEtat() ?></td>
      <td><a href="<?php echo url_for('commande/show?id='.$Commande->getId()) ?>"><?php echo $Commande->getId() ?></a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('commande/new') ?>">New</a>
