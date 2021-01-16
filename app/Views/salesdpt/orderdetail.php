<?= $this->extend('salesdpt/templates/dashboard') ?>

<!-- product/listing.php -->
<?= $this->section('content') ?>

<a href="#" onclick = 'window.print()' class="btn btn-primary text-white d-print-none  mb-3">Print</a>

    <div class="row">

    <div class="col-12 bg-white">
    <?php if(session()->get('success')): ?>
  <div class="alert alert-success" role="alert">
    <?= session()->get('success') ?>
  </div>
    <?php elseif(session()->get('fail')): ?>
  <div class="alert alert-danger" role="alert">
    <?= session()->get('fail') ?>
</div>
    <?php elseif(session()->get('fail')): ?>
  <div class="alert alert-info" role="alert">

    <?= session()->getFlashdata('cartmsg') ?? '' ?>
</div>
    <?php endif;?>

    <h2 class='d-print-block d-sm-none col-12'><?=$title?></h2>

<div class="row">
       <!-- form to submit client details -->
       <div class="col-4 card" style='width:300px;'>
        <div class="card-body">
            <ul style='list-style-type:none;'> 
            <li>Order Date: <?= $order['orderdate']?></li>
            <li>Client: <?= $order['client']?></li>
            <li>Payment Method: <?= $order['paymeth']?></li>
            </ul>
        </div>
      </div>

      <div class="col-3"></div>

      <div class="card col-4 bg-secondary" style='width:300px;'>
        <div class="card-body">
            <ul style='list-style-type:none;'> 
            <li><h4>Arewa Fishfarm</h4></li>
            <li><p>Address: Abuja, Nigeria</p></li>
            <li><p>contact: +234 904848 </p></li>
          
            </ul>
        </div>
      </div>

</div>
     

    <table class='table table-hover '>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>QTY</th>
                    <th>Sub Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($order['items'] as $cartitem): ?>
                    <tr>
                        <td> <?=$cartitem['product_id'] ?></td>
                        <td> <?=$cartitem['price'] ?></td>
                        <td><?=$cartitem['qty'] ?></td>
                        <td><?=$cartitem['subtotal'] ?></td>

                            </form>
                        
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                  <tr>
                    <th></th>
                    <th></th>
                    <th>Total</th>
                    <th><?=$order['total']?></th>
                  </tr>
            </tfoot>
        </table>
    </div>
        
    </div>
<?= $this->endSection() ?>