<h1>LigneCommandes List</h1>

<table>
  <thead>
    <tr>
      <th>Commande</th>
      <th>Article</th>
      <th>Quantite</th>
      <th>Prix</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($LigneCommandes as $LigneCommande): ?>
    <tr>
      <td><a href="<?php echo url_for('lignecommande/show?commande_id='.$LigneCommande->getCommandeId().'&article_id='.$LigneCommande->getArticleId()) ?>"><?php echo $LigneCommande->getCommandeId() ?></a></td>
      <td><a href="<?php echo url_for('lignecommande/show?commande_id='.$LigneCommande->getCommandeId().'&article_id='.$LigneCommande->getArticleId()) ?>"><?php echo $LigneCommande->getArticleId() ?></a></td>
      <td><?php echo $LigneCommande->getQuantite() ?></td>
      <td><?php echo $LigneCommande->getPrix() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('lignecommande/new') ?>">New</a>
