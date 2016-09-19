<div class="container">
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            <?php echo validation_errors(); ?>
            <?php echo form_open_multipart('', array('class' => 'form')); ?>
            <div class="form-group">
                <label for="nom">Nom</label>
                <input name="nom" type="text" class="form-control" id="nom" placeholder="nom">
            </div>
            <div class="form-group">
                <label for="cat">Categorie</label>
                <select name="cat" class="form-control">
                    <option value="Feu" <?= set_checkbox('cat', 'Feu'); ?> selected="selected">Feu</option>
                    <option value="Eau"<?= set_checkbox('cat', 'Eau'); ?>>Eau</option>
                    <option value="Roche"<?= set_checkbox('cat', 'Roche'); ?>>Roche</option>
                    <option value="Vol"<?= set_checkbox('cat', 'Vol'); ?>>Vol</option>
                </select>
            </div>
            <div class="form-group">
                <label for="vie">Points de Vie</label>
                <input name="vie" type="number" class="form-control" id="vie">
            </div>
            <div class="form-group">
                <label for="combat">Nombre de combats</label>
                <input name="combat" type="number" class="form-control" id="combat">
            </div>
            <div class="form-group">
                <label for="exp">Experience</label>
                <input name="exp" type="number" class="form-control" id="exp">
            </div>
            <div class="form-group">
                <label for="photo">Photo</label>
                <input name="photo" class="form-control" type="file" id="photo">
            </div>
            <div class="form-group">
                <input class="form-control btn btn-success" type="submit" value="Enregistrer">
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>


<?php foreach ($pokemons as $pok): ?>
    <?= $pok->nom ?>
    <?php if (is_file('./uploads/'.$pok->photo)): ?>
        <img style="width: 200px; height:200px;" src="<?= base_url('./uploads/'.$pok->photo) ?>">
    <?php endif; ?>
    <?= $pok->dte ?>
    <?= $pok->cat ?>
    <?= $pok->vie ?>
    <?= $pok->combat ?>
    <?= $pok->exp ?>
    <a href="<?= site_url("pokemon/voir/".$pok->id) ?>">show</a><br>
    <a href="<?= site_url("pokemon/del/".$pok->id) ?>">Delete</a><br>
<?php endforeach; ?>
