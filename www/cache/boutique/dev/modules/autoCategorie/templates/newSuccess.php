<?php use_helper('I18N', 'Date') ?>
<?php include_partial('categorie/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('New Categorie', array(), 'messages') ?></h1>

  <?php include_partial('categorie/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('categorie/form_header', array('Categorie' => $Categorie, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('categorie/form', array('Categorie' => $Categorie, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('categorie/form_footer', array('Categorie' => $Categorie, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
