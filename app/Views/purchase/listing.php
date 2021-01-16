<?= $this->extend('templates/dashboard') ?>

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
                    <th>Ref</th>
                    <th>Supplier</th>
                    <th>Type</th>
                    <th>Product</th>
                    <th>quantity</th>                    
                    <th>Status</th>
                    <th>Amount</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($purs as $pur): ?>
                    <tr>
                        <td> <?=$pur['purdate'] ?></td>
                        <td> <?=$pur['ref'] ?></td>
                        <td> <?=$pur['suppliername'] ?></td>
                        <td> <?=$pur['type'] ?></td>
                        <td> <?=$pur['note'] ?></td>
                        <td> <?=$pur['quantity'] ?></td>
                        <td> <?=$pur['status'] ?></td>
                        <td> <?=$pur['amount'] ?></td>
                        <td>
                            <a href="<?= base_url('purchase/delete/'.$pur['purid']) ?>" class="btn btn-danger">delete</a> 
                            <a href="<?= base_url('purchase/edit/'.$pur['purid']) ?>" class="btn btn-warning">edit</a> 
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
        
    </div>
<?= $this->endSection() ?>