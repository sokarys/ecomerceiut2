<td class="sf_admin_text sf_admin_list_td_id">
  <?php echo link_to($Categorie->getId(), 'categorie_edit', $Categorie) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_nom">
  <?php echo $Categorie->getNom() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_description">
  <?php echo $Categorie->getDescription() ?>
</td>
