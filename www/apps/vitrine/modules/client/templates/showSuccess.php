<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $Client->getId() ?></td>
    </tr>
    <tr>
      <th>Nom:</th>
      <td><?php echo $Client->getNom() ?></td>
    </tr>
    <tr>
      <th>Prenom:</th>
      <td><?php echo $Client->getPrenom() ?></td>
    </tr>
    <tr>
      <th>Adresse:</th>
      <td><?php echo $Client->getAdresse() ?></td>
    </tr>
    <tr>
      <th>Mail:</th>
      <td><?php echo $Client->getMail() ?></td>
    </tr>
    <tr>
      <th>Telephone:</th>
      <td><?php echo $Client->getTelephone() ?></td>
    </tr>
  </tbody>
</table>

<hr />


    Mes commandes : <br />
    <table>
        <tr>
            <th>Référence</th>
            <th>Etat</th>
            <th>Créée</th>
            <th>Total</th>
        </tr>
    <?php foreach($Client->getCommandes() as $commande){ ?>
        <tr>
            <td><a href="<?php echo url_for('commande/show?id='.$commande->getId()); ?>" ><?php echo $commande->getId(); ?></a></td>
            <td><?php echo $commande->getEtat(); ?></td>
            <td><?php echo $commande->getCreatedAt(); ?></td>
            <td><?php echo $commande->getPrix(); ?></td>
        </tr>
    <?php } ?>
    </table>


