<?= $this->extend('templates/dashboard') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-6">
        <form action="" method="post">
        <div class="form-group">
                <label>Staff Firstname</label>
                <input class="form-control" type="text" value="<?= $fish['firstname'] ?? set_value('firstname')?>"  required name="firstame">
            </div>
            <div class="form-group">
                <label>Staff Surname</label>
                <input class="form-control" type="text" value="<?= $fish['surname'] ?? set_value('surname')?>"  required name="surname">
            </div>

            <div class="form-group">
                <label>Staff Email</label>
                <input class="form-control" type="text" value="<?= $fish['email'] ?? set_value('email')?>"  required name="email">
            </div>

            <div class="form-group">
                <label>Staff Contact</label>
                <input class="form-control" type="text" value="<?= $fish['contact'] ?? set_value('contact')?>"  required name="contact">
            </div>

            <div class="form-group">
                <label>Staff Address</label>
                <input class="form-control" type="text" value="<?= $fish['address'] ?? set_value('address')?>"  required name="address">
            </div>

            <div class="form-group">
                <label>Staff role</label>
                <input class="form-control" type="text" value="<?= $fish['role'] ?? set_value('role')?>"  required name="role">
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
