<table>
    <thead>
    <tr>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Adresse</th>
        <th>Mail</th>
        <th>Telephone</th>
    </tr>
    </thead>
  <tbody>
    <tr>
      
      <td><?php echo $Client->getNom() ?></td>
      <td><?php echo $Client->getPrenom() ?></td>
      <td><?php echo $Client->getAdresse() ?></td>
      <td><?php echo $Client->getMail() ?></td>
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
            <td><a href="<?php echo url_for('lignecommande/index?id='.$commande->getId()); ?>" ><?php echo $commande->getId(); ?></a></td>
            <td><?php echo $commande->getEtat(); ?></td>
            <td><?php echo $commande->getCreatedAt(); ?></td>
            <td><?php echo $commande->getPrix(); ?> €</td>
        </tr>
    <?php } ?>
    </table>


