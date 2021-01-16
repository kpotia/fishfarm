<?= $this->extend('templates/dashboard') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-6">
        <form action="" method="post">
        
            <div class="form-group">
                <label>Inventory Name</label>
                <input class="form-control" type="text" value="<?= $inventory['name'] ?? set_value('name')?>"  required name="name">
            </div>
            <div class="form-group">
                <label>Inventory Type</label>
                <input class="form-control" type="text" value="<?= $inventory['type'] ?? set_value('type')?>"  required name="type">
            </div>
            <div class="form-group">
                <label>Inventory Quantity</label>
                <input class="form-control" type="number" value="<?= $inventory['qty'] ?? set_value('qty')?>"  required name="qty">
            </div>
            <div class="form-group">
                <label>Inventory Date</label>
                <input class="form-control" type="date" value="<?= $inventory['date'] ?? set_value('date')?>"  required name="date">
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
