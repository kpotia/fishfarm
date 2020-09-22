<?= $this->extend('salesdpt/templates/dashboard') ?>

<!-- productlisting.php -->
<?= $this->section('content') ?>
    <div class="row">

    <div class="col-10 bg-white">
    <?php if(session()->get('success')): ?>
  <div class="alert alert-success" role="alert">
    <?= session()->get('success') ?>
  </div>
    <?php elseif(session()->get('fail')): ?>
    <?= session()->get('fail') ?>

      <?php endif;?>
      <a class="btn btn-primary text-white" href="">View Cart <span class="badge badge-warning">0</span></a>
    <table class='table table-responsive table-hover '>
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
                        <td> <?=$product['name'] ?></td>
                        <td> <?=$product['price'] ?></td>
                            <form>
                                <input type="hidden" name="id" value="<?=$product['id'] ?>" >
                                <input type="hidden" name="name" value="<?=$product['name'] ?>" >
                                <input type="hidden" name="price" value="<?=$product['price'] ?>" >
                                <td><input class="form-controler" type="number" name="qty" placeholder="quantity"></td>
<td><button class="btn btn-primary" type="submit">add to cart</button></td>
                            </form>
                        
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
        
    </div>
<?= $this->endSection() ?>