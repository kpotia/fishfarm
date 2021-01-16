<?= $this->extend('salesdpt/templates/dashboard') ?>

<?= $this->section('content') ?>
    <div class="row">

    <div class="col-12 bg-white">
    <?php if(session()->get('success')): ?>
  <div class="alert alert-success" role="alert">
    <?= session()->get('success') ?>
  </div>
    <?php elseif(session()->get('fail')): ?> 
    <?= session()->get('fail') ?>

      <?php endif;?>
    <table class='table  table-hover '>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>client</th>
                    <th>Payment Method</th>
                    <th>Amount</th>
                    
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($orders as $order): ?>
                    <tr>
                        <td> <?=$order['orderdate'] ?></td>
                        <td> <?=$order['client'] ?></td>
                        <td> <?=$order['paymeth'] ?></td>
                        <td> <?=$order['total'] ?></td>
                        <td>
                            <a href="<?= base_url('salesdpt/order/'.$order['or_id']) ?>" class="btn btn-info">view details</a> 
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
        
    </div>
<?= $this->endSection() ?>