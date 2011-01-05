<h1>Clients List</h1>

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
    <?php foreach ($Clients as $Client): ?>
    <tr>
      <td><a href="<?php echo url_for('client/show?id='.$Client->getId()) ?>"><?php echo $Client->getId() ?></a></td>
      <td><?php echo $Client->getNom() ?></td>
      <td><?php echo $Client->getPrenom() ?></td>
      <td><?php echo $Client->getAdresse() ?></td>
      <td><?php echo $Client->getMail() ?></td>
      <td><?php echo $Client->getTelephone() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('client/new') ?>">New</a>
