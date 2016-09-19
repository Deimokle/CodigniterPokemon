<div class="container">
    <div class="row">
        <h1><?= $same ?></h1>
        <div class="col-md-offset-2 col-md-8">
            <?php echo validation_errors(); ?>
            <?php echo form_open('', array('class' => 'form')); ?>
            <div class="form-group">
                <label for="pok1_id">1ier pokemon</label>
                <select name="pok1_id" class="form-control">
                    <?php foreach ($pokemons as $pokemon1): ?>
                        <option value="<?= $pokemon1->id ?>" <?= set_select('pok1_id', $pokemon1->id); ?>><?= $pokemon1->nom ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="pok2_id">2ieme pokemon</label>
                <select name="pok2_id" class="form-control">
                    <?php foreach ($pokemons as $pokemon2): ?>   
                        <option value="<?= $pokemon2->id ?>" <?= set_select('pok2_id', $pokemon2->id); ?>><?= $pokemon2->nom ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <input class="form-control btn btn-success" type="submit" value="Enregistrer">
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>


<?php foreach ($combats as $c): ?>
    id pokemon1: <?= $c->pok1_id ?><br>
    id pokemon2: <?= $c->pok2_id ?><br>
    <?= $c->date ?><br>
    gagnant: <?= $c->win ?><br><br><br>
<?php endforeach; ?>