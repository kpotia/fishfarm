<?= $this->extend('templates/dashboard') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-6">
        <form action="" method="post">

                <div class="form-group">
                    <label for="my-select">Text</label>
                    <select  class="form-control" name="fish_id">
                        <?php foreach($fishes as $fish): ?>
                            <option value="<?=$fish['id']?>"><?=$fish['name']?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="my-select">Qantity</label>
                    <input class="form-control" type="number" min='0' name="qty">
                </div>
                <div class="form-group">
                    <label for="birthdate">Birthdate</label>
                    <input id="birthdate" class="form-control" type="date" name="birthdate">
                </div>
           
            <?php if(isset($validation)):?>
          <div class="col-12">
            <div class="alert alert-danger" role="alert">
              <?= $validation->listErrors();?>
            </div>
          </div>

        <?php endif;?>
            <div class="btn-group" role="group" aria-label="Button group">
                <button name="submit" value="submit" >Submit</button>
            </div>


        </form>
    </div>   
</div>
    
<?= $this->endSection() ?>
