<h1>Ma Commande</h1>
<table>
  <tbody>
    <tr>
      <th>Client:</th>
      <td><?php echo $Commande->getClientId() ?></td>
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


