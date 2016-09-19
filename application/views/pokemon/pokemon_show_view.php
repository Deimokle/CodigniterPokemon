
<h1>Nom: <?php echo $pok->nom; ?></h1><br>
<div class="container">
	<div class="row">
		<div class="col-md-offset-3 col-md-6">
			<?php echo form_open('', array('class' => 'form'));?>
				<div class="form-group">
					<label for="titre">Titre</label>
					<input name="titre" type="text" class="form-control" id="nom" placeholder="nom">
				</div>
				<div class="form-group">
					<label for="texte">Texte</label>
					<textarea name="texte" type="text" class="form-control" id="texte" placeholder="texte"></textarea>
				</div>
				<div class="form-group">
					<input class="form-control btn btn-success" type="submit" value="Enregistrer">
				</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>

<div style="margin-left: 300px">
<?php foreach($commentaires as $com): ?>	
	<h3>Titre: <?= $com->titre ?></h3><br>
	<p>Commentaire: <?= $com->texte ?></p>
	<br>
	<br>
	<br>
<?php endforeach ?>
</div>
