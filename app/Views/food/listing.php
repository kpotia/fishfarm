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
                    <th>Food ID</th>
                    <th>Type</th>
                    <th>Name</th>
                    <th>Qty</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($Food as $fd): ?>
                    <tr>
                        <td> <?=$fd['fd_id'] ?></td>
                        <td> <?=$fd['type'] ?></td>
                        <td> <?=$fd['name'] ?></td>
                        <td> <?=$fd['qty'] ?></td>
                        <td>
                            <a href="<?= base_url('food/delete/'.$fd['fd_id']) ?>" class="btn btn-danger">delete</a> 
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
        
    </div>
<?= $this->endSection() ?>