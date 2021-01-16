<?= $this->extend('templates/dashboard') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-6">
        <form action="" method="post">
        
            <div class="form-group">
                <label>Staff Firstname</label>
                <input class="form-control" type="text" value="<?= $staff['firstname'] ?? set_value('firstname')?>"  required name="firstname">
            </div>
            <div class="form-group">
                <label>Staff Surname</label>
                <input class="form-control" type="text" value="<?= $staff['surname'] ?? set_value('surname')?>"  required name="surname">
            </div>
            <div class="form-group">
                <label>Staff Email</label>
                <input class="form-control" type="text" value="<?= $staff['email'] ?? set_value('email')?>"  required name="email">
            </div>

            <div class="form-group">
                <label>Staff Contact</label>
                <input class="form-control" type="text" value="<?= $staff['contact'] ?? set_value('contact')?>"  required name="contact">
            </div>

            <div class="form-group">
                <label>Staff Address</label>
                <input class="form-control" type="text" value="<?= $staff['address'] ?? set_value('address')?>"  required name="address">
            </div>

            <div class="form-group">
                <label>Staff role</label>
                <input class="form-control" type="text" value="<?= $staff['role'] ?? set_value('role')?>"  required name="role">
            </div>

            <div class="form-group">
                <label>Staff salary</label>
                <input class="form-control" type="text" value="<?= $staff['salary'] ?? set_value('salary')?>"  required name="salary">
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
