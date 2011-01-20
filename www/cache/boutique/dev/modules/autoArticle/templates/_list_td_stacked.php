<td colspan="7">
  <?php echo __('%%id%% - %%nom%% - %%prix%% - %%description%% - %%popularite%% - %%stock%% - %%categorie_id%%', array('%%id%%' => link_to($Article->getId(), 'article_edit', $Article), '%%nom%%' => $Article->getNom(), '%%prix%%' => $Article->getPrix(), '%%description%%' => $Article->getDescription(), '%%popularite%%' => $Article->getPopularite(), '%%stock%%' => $Article->getStock(), '%%categorie_id%%' => $Article->getCategorieId()), 'messages') ?>
</td>
