<?= $this->extend('templates/dashboard') ?>
<!-- Product Form -->
<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-6">
        <form action="" method="post">
        <div class="form-group">
                <label>Product Name</label>
                <input class="form-control" type="text" value="<?= $product['name'] ?? set_value('name')?>"  required name="name">
            </div>
            <div class="form-group">
                <label>Product Category</label>
                <select class="form-control" name="category" id="">
                    <option value="smoked">Smoked</option>
                    <option value="frozen">Frozen</option>
                </select>
            </div>
            <div class="form-group">
                <label>Product Price</label>
                <input class="form-control" type="text" value="<?= $product['price'] ?? set_value('price')?>"  required name="price">
            </div> 
            <div class="form-group">
                <label>Product Quantity</label>
                <input class="form-control" type="text" value="<?= $product['quantity'] ?? set_value('quantity')?>"  required name="quantity">
            </div>            
            <?php if(isset($validation)):?>
                <div class="col-12">
                    <div class="alert alert-danger" role="alert">
                        <?= $validation->listErrors();?>
                    </div>
                </div>
            <?php endif; ?>
            <div class="btn-group" role="group" aria-label="Button group">
                <button name="submit" value="submit" >Submit</button>
            </div>


        </form>
    </div>   
</div>
    
<?= $this->endSection() ?>
