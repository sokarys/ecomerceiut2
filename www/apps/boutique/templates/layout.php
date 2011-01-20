<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>

    <?php echo $sf_content ?>

      <div>
          <h3>menu</h3>
          <a href="<?php echo url_for('categorie') ?>">Categories</a>
          <a href="<?php echo url_for('commande') ?>">Commande</a>
          <a href="<?php echo url_for('article') ?>">Articles</a>
          <a href="<?php echo url_for('securite/index') ?>">Mon profil</a>
          
          <?php     if($sf_user->isAuthenticated()){?>
                    <a href="<?php echo url_for('securite/deconnection') ?>">Déconnection</a>
               <?php }else{?>
                    <a href="<?php echo url_for('securite/login') ?>">Connection</a>
               <?php }?>
           

      </div>
  </body>
</html>
