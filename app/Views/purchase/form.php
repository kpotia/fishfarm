<?= $this->extend('templates/dashboard') ?>
<!-- Purchase form -->
<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-6">
        <form action="" method="post">

        <div class="form-group">
                    <label for="my-select">Date</label>
                    <input class="form-control" required type="date" name="purdate"  required value="<?= $purchase['purdate'] ?? set_value('purdate')?>">
                </div>

                <div class="form-group">
                    <label for="purtype"> Type</label>
                    <input name="purtype" class='form-control' required id="purtype">
                    
                </div>
                <div class="form-group">
                    <label for="my-select">Amount</label>
                    <input class="form-control" required type="Text" name="puramount"  value="<?= $purchase['amount'] ?? set_value('puramount')?>">
                </div>

                <div class="form-group">
                    <label for="my-select">Note</label>
                    <textarea name="purnote" class='form-control' required><?= $purchase['note'] ?? set_value('purnote')?></textarea>
                </div>
                <div class="form-group">
                    <label for="supplier">Supplier</label>
                    <select name="supplier" class='form-control' required id="supplier"  value="<?= $purchase['supplier'] ?? set_value('supplier')?>">
                      <?php foreach ($suppliers as $supplier): ?>
                      <option value="<?=$supplier['id']?>"><?=$supplier['name']?></option>
                          
                        <?php  endforeach; ?>
                    </select>
                    </div>

                    <div class="form-group">
                    <label for="purstatus">Delivery Status</label>
                    <select name="purstatus" class='form-control' required id="purstatus"  value="<?= $purchase['status'] ?? set_value('purstatus')?>">
                      <option value="pending">Pending</option>
                      <option value="delivered">Delivered</option>
                    </select>
                    </div>

                    <div class="form-group">
                    <label for="purstatus">Payment Status</label>
                    <select name="purpay" class='form-control' required id="purstatus"  value="<?= $purchase['status'] ?? set_value('purstatus')?>">
                      <option value="pending">Pending</option>
                      <option value="paid">Paid</option>
                    </select>
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
