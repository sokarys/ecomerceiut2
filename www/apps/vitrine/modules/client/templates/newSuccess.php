<h1>Inscription</h1>

<?php //include_partial('form', array('form' => $form)) ?>

<form action="<?php echo url_for('client/create')?>" method="post" >
Nom : <input type="text"name="name" size="50"><br/>
Prenom : <input type="prenom" name="prenom" size="50" ><br/>
Adresse : <input type="adresse" name="adresse" size="50" ><br/>
Mail : <input type="mail" name="mail" size="50" ><br/>
Telephone : <input type="tel" name="tel" size="10" ><br/>
<input type="submit" value="S'inscrire">
</form>