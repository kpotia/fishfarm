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
  <div class="alert alert-danger" role="alert">
    <?= session()->get('fail') ?>
</div>
    <?php elseif(session()->get('fail')): ?>
  <div class="alert alert-info" role="alert">

    <?= session()->getFlashdata('cartmsg') ?? '' ?>
</div>
    <?php endif;?>

      <!-- form to submit client details -->
      <div class="card" style='width:300px;'>
        <form action="checkout" method="post" class='card-body' >
        <div class='form-group'>
            <label for="custname">Client Name</label>
            <input type="text" name='custname' class='form-control'>
          </div>

          <div class='form-group'>
            <label for="">Payment Method</label><br>
            <label for="cash">Cash <input type="radio" checked name="paymeth" id="cash" value='cash'></label>
            <label for="cheque">Cheque <input type="radio" name="paymeth" id="cheque" value='cheque'></label>
          </div>
          <button class='btn btn-primary'>submit</button>
        </form>
      </div>
      


      <a class="btn btn-primary text-white" href="<?= base_url('salesdpt/pos');?>">POS</a>
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
                <?php foreach($cart['items'] as $cartitem): ?>
                    <tr>
                        <td> <?=$cartitem['item_name'] ?></td>
                        <td> <?=$cartitem['item_price'] ?></td>
                        <td><?=$cartitem['item_quantity'] ?></td>
                        <td><?=$cartitem['item_subtotal'] ?></td>

                            </form>
                        
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                  <tr>
                    <th></th>
                    <th></th>
                    <th>Total</th>
                    <th><?=$cart['total']?></th>
                  </tr>
            </tfoot>
        </table>
    </div>
        
    </div>
<?= $this->endSection() ?>