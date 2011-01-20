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

      <div style="text-align:center;">
          <h1>Bienvenue sur dreamland</h1><br/>
          <p>Le site qui vend du rêve</p>
      </div>
      
    

      <div id="menu" >
          <h3>menu</h3>
          <a href="<?php echo url_for('categorie') ?>">Categories</a><br />
          <a href="<?php echo url_for('commande') ?>">Commande</a><br />
          <a href="<?php echo url_for('article') ?>">Articles</a><br />
          <?php     if($sf_user->isAuthenticated()){?>
                    <a href="<?php echo url_for('securite/deconnection') ?>">Déconnection</a><br />
               <?php }else{?>
                    <a href="<?php echo url_for('securite/login') ?>">Connection</a><br />
               <?php }?>
      </div>
      <div id="corps" >
      <?php echo $sf_content ?>
      </div>
  </body>
</html>
