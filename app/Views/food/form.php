<?= $this->extend('templates/dashboard') ?>
<!-- food form -->
<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-6">
        <form action="" method="post">

        <div class="form-group">
                    <label for="my-select">Type</label>
                   <select class="form-control" type="text" name="type">
                   <option value="food">Food</option>
                   <option value="drug">Drug</option>
                   </select>
                </div>
                <div class="form-group">
                    <label for="my-select">Name</label>
                   <input class="form-control" type="text" name="FoodName">
                </div>
                <div class="form-group">
                    <label for="my-select">Qantity</label>
                    <input class="form-control" type="number" min='0' name="Foodqty">
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
