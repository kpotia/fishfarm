<?= $this->extend('salesdpt/templates/dashboard') ?>

<!-- product/listing.php -->
<?= $this->section('content') ?>
    <div class="row">

    <div class="col-12 bg-white">
    <?php if(session()->get('success')): ?>
  <div class="alert alert-success" role="alert">
    <?= session()->get('success') ?>
  </div>
    <?php elseif(session()->get('fail')): ?>
  <div class="alert alert-warning" role="alert">
    <?= session()->get('fail') ?>
    </div>
    <?php elseif(session()->get('info')):?>
        <div class="alert alert-info" role="alert">
            <?= session()->get('info') ?>
        </div>
    <?php endif;?>
      <a class="btn btn-primary text-white" href="viewcart">View Order <span class="badge badge-warning"><?= $count ?? 0 ?></span></a>
      <a class="btn btn-primary text-white" href="clearcart">Clear Order</span></a>
    <table class='table  table-hover '>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>QTY</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($products as $product): ?>
                    <tr>
                        <td> <span class='badge badge-primary'><?= $product['category'] ?></span> <?=$product['name'] ?></td>
                        <td> <?=$product['price'] ?></td>
                            <form method = 'POST' action='addtocart/<?=$product['id']?>'> 
                                <input type="hidden" name="id" value="<?=$product['id'] ?>" >
                                <input type="hidden" name="hidden_name" value="<?=$product['name'] ?>" >
                                <input type="hidden" name="hidden_price" value="<?=$product['price'] ?>" >
                                <td><input class="form-controler" type="number" name="quantity" min=1 value='1' reuired placeholder="quantity"></td>
<td><button class="btn btn-primary" type="submit">add to cart</button></td>
                            </form>
                        
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
        
    </div>
<?= $this->endSection() ?>