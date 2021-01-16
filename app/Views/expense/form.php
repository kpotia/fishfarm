<?= $this->extend('templates/dashboard') ?>
<!-- Expense form -->
<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-6">
        <form action="" method="post">

        <div class="form-group">
                    <label for="my-select">Date</label>
                    <input class="form-control" required type="date" name="expdate"  value="<?= $expense['exp_date'] ?? set_value('expdate')?>">
                </div>

                <div class="form-group">
                    <label for="exptype">Expense Type</label>
                    <select name="exptype" class='form-control' required id="exptype">
                    <option value="water">Water Bill</option>
                    <option value="electricity">Electricity Bill</option>
                    <option value="maintenance">Maintenance Bill</option>
                    <option value="Taxes">Taxes</option>
                    <option value="salary">Salary</option>
                    <option value="other">Other Bill</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="my-select">Amount</label>
                    <input class="form-control" required type="Text" name="expamount"  value="<?= $expense['amount'] ?? set_value('expamount')?>">
                </div>

                
                <div class="form-group">
                    <label for="expstatus">Expense Status</label>
                    <select name="expstatus" class='form-control' required id="expstatus"  value="<?= $expense['status'] ?? set_value('expstatus')?>">
                      <option value="pending">Pending</option>
                      <option value="paid">Paid</option>
                    </select>
                <div class="form-group">
                    <label for="my-select">Note</label>
                    <textarea name="expnote" class='form-control' required>
                    <?= $client['note'] ?? set_value('expnote')?></textarea>
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
