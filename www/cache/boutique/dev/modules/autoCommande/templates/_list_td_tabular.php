<td class="sf_admin_foreignkey sf_admin_list_td_client_id">
  <?php echo $Commande->getClientId() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_created_at">
  <?php echo false !== strtotime($Commande->getCreatedAt()) ? format_date($Commande->getCreatedAt(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_text sf_admin_list_td_etat">
  <?php echo $Commande->getEtat() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_id">
  <?php echo link_to($Commande->getId(), 'commande_edit', $Commande) ?>
</td>
