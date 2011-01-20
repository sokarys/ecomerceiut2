<?php use_helper('I18N', 'Date') ?>
<?php include_partial('commande/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Edit Commande', array(), 'messages') ?></h1>

  <?php include_partial('commande/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('commande/form_header', array('Commande' => $Commande, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('commande/form', array('Commande' => $Commande, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('commande/form_footer', array('Commande' => $Commande, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
