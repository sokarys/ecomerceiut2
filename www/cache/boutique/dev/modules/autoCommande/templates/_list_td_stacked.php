<td colspan="4">
  <?php echo __('%%client_id%% - %%created_at%% - %%etat%% - %%id%%', array('%%client_id%%' => $Commande->getClientId(), '%%created_at%%' => false !== strtotime($Commande->getCreatedAt()) ? format_date($Commande->getCreatedAt(), "f") : '&nbsp;', '%%etat%%' => $Commande->getEtat(), '%%id%%' => link_to($Commande->getId(), 'commande_edit', $Commande)), 'messages') ?>
</td>
