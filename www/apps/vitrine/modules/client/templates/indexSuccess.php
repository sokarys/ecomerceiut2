<h1>Les Clients</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Nom</th>
      <th>Prenom</th>
      <th>Adresse</th>
      <th>Mail</th>
      <th>Telephone</th>
    </tr>
  </thead>
  <tbody>
      <?php //if($sf_user->hasAttribute('client')){
          //$Client = $sf_user->getAttribute('client');?>
           <tr>
              <td><?php echo $client->getNom() ?></td>
              <td><?php echo $client->getPrenom() ?></td>
              <td><?php echo $client->getAdresse() ?></td>
              <td><?php echo $client->getMail() ?></td>
              <td><?php echo $client->getTelephone() ?></td>
            </tr>
            Commande : <?php echo count($client->getCommandes()) ?>
     <?php //} ?>
  </tbody>
  
</table>

  <a href="<?php echo url_for('client/new') ?>">New</a>
