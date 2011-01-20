<td class="sf_admin_text sf_admin_list_td_id">
  <?php echo link_to($Article->getId(), 'article_edit', $Article) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_nom">
  <?php echo $Article->getNom() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_prix">
  <?php echo $Article->getPrix() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_description">
  <?php echo $Article->getDescription() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_popularite">
  <?php echo $Article->getPopularite() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_stock">
  <?php echo $Article->getStock() ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_categorie_id">
  <?php echo $Article->getCategorieId() ?>
</td>
