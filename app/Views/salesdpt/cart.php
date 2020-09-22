<?= $this->extend('templates/dashboard') ?>

<!-- productlisting.php -->
<?= $this->section('content') ?>
    <div class="row">

    <div class="col-10 bg-white">
    <?php if(session()->get('success')): ?>
  <div class="alert alert-success" role="alert">
    <?= session()->get('success') ?>
  </div>
    <?php elseif(session()->get('fail')): ?>
  <div class="alert alert-danger" role="alert">
    <?= session()->get('fail') ?>
</div>
    <?php else: ?>
  <div class="alert alert-info" role="alert">

    <?= session()->getFlashdata('cartmsg') ?? '' ?>
</div>


      <?php endif;?>
      <a class="btn btn-primary text-white" href="<?= base_url('salesdpt/pos');?>">POS</a>
    <table class='table table-responsive table-hover '>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>QTY</th>
                    <th>Sub Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($cart as $cartitem): ?>
                    <tr>
                        <td> <?=$product['name'] ?></td>
                        <td> <?=$product['price'] ?></td>
                        <td><?=$product['qty'] ?></td>
                        <td><?=$product['subtotal'] ?></td>
<td><button class="btn btn-primary">Update cart</button></td>
                            </form>
                        
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
        
    </div>
<?= $this->endSection() ?>