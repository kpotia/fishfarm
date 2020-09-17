<?= $this->extend('templates/dashboard') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-6">
        <form action="" method="post">

                <div class="form-group">
                    <label for="my-select">Fish Tank</label>
                    <select  class="form-control" name="fishtank">
                        <?php foreach($fts as $ft): ?>
                            <option value="<?=$ft['ft_id']?>"><?='tank '.$ft['ft_id'] .'-'.$ft['fishname'] ?></option>
                        <?php endforeach;?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="my-select">Vaccine</label>
                    <select  class="form-control" name="vaccine">
                        <?php foreach($vcs as $vc): ?>
                            <option value="<?=$vc['vac_id']?>"><?=$vc['name'] ?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="my-select">Qantity</label>
                    <input class="form-control" type="number" min='0' name="qty">
                </div>
                <div class="form-group">
                    <label for="birthdate">date</label>
                    <input id="birthdate" class="form-control" type="date" name="date">
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
