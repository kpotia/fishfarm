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
                    <th>vaccine ID</th>
                    <th>vaccine Name</th>
                    <th>Fish Qty</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($vaccine as $fd): ?>
                    <tr>
                        <td> <?=$fd['vac_id'] ?></td>
                        <td> <?=$fd['name'] ?></td>
                        <td> <?=$fd['description'] ?></td>
                        <td> <?=$fd['qty'] ?></td>
                        <td>
                            <a href="<?= base_url('vaccination/delete/'.$fd['vac_id']) ?>" class="btn">delete</a> 
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
        
    </div>
<?= $this->endSection() ?>