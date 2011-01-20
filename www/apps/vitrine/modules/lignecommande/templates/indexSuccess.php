<h1>LigneCommandes List</h1>

<table>
  <thead>
    <tr>
      <th>Commande</th>
      <th>Quantite</th>
      <th>Prix</th>
      <th>Prix total</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($LigneCommandes as $LigneCommande): ?>
    <tr>
      <td><?php echo $LigneCommande->getArticle()->getNom() ?></td>
      <td><?php echo $LigneCommande->getQuantite() ?></td>
      <td><?php echo $LigneCommande->getArticle()->getPrix() ?></td>
      <td><?php echo $LigneCommande->getPrix() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

 <a href="<?php echo url_for('client/index') ?>">Retour</a>
