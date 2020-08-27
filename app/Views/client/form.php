<?= $this->extend('templates/dashboard') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-6">
        <form action="" method="post">
        
            <div class="form-group">
                <label>Client Firstname</label>
                <input class="form-control" type="text" value="<?= $client['firstname'] ?? set_value('firstname')?>"  required name="firstname">
            </div>
            <div class="form-group">
                <label>Client Surname</label>
                <input class="form-control" type="text" value="<?= $client['surname'] ?? set_value('surname')?>"  required name="surname">
            </div>
            <div class="form-group">
                <label>Client Email</label>
                <input class="form-control" type="text" value="<?= $client['email'] ?? set_value('email')?>"  required name="email">
            </div>

            <div class="form-group">
                <label>Client Contact</label>
                <input class="form-control" type="text" value="<?= $client['contact'] ?? set_value('contact')?>"  required name="contact">
            </div>

            <div class="form-group">
                <label>Client Address</label>
                <input class="form-control" type="text" value="<?= $client['address'] ?? set_value('address')?>"  required name="address">
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
