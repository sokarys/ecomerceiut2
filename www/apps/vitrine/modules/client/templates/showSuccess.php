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

<a href="<?php echo url_for('client/edit?id='.$Client->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('client/index') ?>">List</a>
