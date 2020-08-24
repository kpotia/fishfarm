<?= $this->extend('templates/dashboard') ?>
<!-- Supplier Form -->
<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-6">
        <form action="" method="post">
        <div class="form-group">
                <label>Supplier Name</label>
                <input class="form-control" type="text" value="<?= $supplier['name'] ?? set_value('name')?>"  required name="name">
            </div>
            <div class="form-group">
                <label>Supplier Contact</label>
                <input class="form-control" type="text" value="<?= $supplier['contact'] ?? set_value('contact')?>"  required name="contact">
            </div>

            <div class="form-group">
                <label>Supplier Address</label>
                <input class="form-control" type="text" value="<?= $supplier['address'] ?? set_value('address')?>"  required name="address">
            </div>

            <div class="form-group">
                <label>Supplier Email</label>
                <input class="form-control" type="text" value="<?= $supplier['email'] ?? set_value('email')?>"  required name="email">
            </div>

            <div class="form-group">
                <label for="my-textarea">Supplier Description</label>
                <textarea id="my-textarea" class="form-control" required name="description" rows="3"><?= $supplier['description'] ?? set_value('description')?></textarea>
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
