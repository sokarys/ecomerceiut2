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
      <td><?php echo $LigneCommande->getPrix() ?> €</td>
    </tr>
  </tbody>
</table>
