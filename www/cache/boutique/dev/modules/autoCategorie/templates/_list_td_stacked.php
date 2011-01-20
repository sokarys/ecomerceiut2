<td colspan="3">
  <?php echo __('%%id%% - %%nom%% - %%description%%', array('%%id%%' => link_to($Categorie->getId(), 'categorie_edit', $Categorie), '%%nom%%' => $Categorie->getNom(), '%%description%%' => $Categorie->getDescription()), 'messages') ?>
</td>
