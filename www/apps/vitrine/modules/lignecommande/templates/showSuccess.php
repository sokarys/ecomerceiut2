<table>
  <tbody>
    <tr>
      <th>Commande:</th>
      <td><?php echo $LigneCommande->getCommandeId() ?></td>
    </tr>
    <tr>
      <th>Article:</th>
      <td><?php echo $LigneCommande->getArticleId() ?></td>
    </tr>
    <tr>
      <th>Quantite:</th>
      <td><?php echo $LigneCommande->getQuantite() ?></td>
    </tr>
    <tr>
      <th>Prix:</th>
      <td><?php echo $LigneCommande->getPrix() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('lignecommande/edit?commande_id='.$LigneCommande->getCommandeId().'&article_id='.$LigneCommande->getArticleId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('lignecommande/index') ?>">List</a>
