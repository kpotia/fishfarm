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
                    <th>Fish Tank ID</th>
                    <th>Fish Name</th>
                    <th>Fish Qty</th>
                    <th>Birtdate</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($fishtank as $ft): ?>
                    <tr>
                        <td> <?=$ft['ft_id'] ?></td>
                        <td> <?=$ft['fishname'] ?></td>
                        <td> <?=$ft['qty'] ?></td>
                        <td> <?=$ft['birthdate'] ?></td>
                        <td>
                            <a href="<?= base_url('fish/tank/delete/'.$ft['ft_id']) ?>" class="btn btn-danger">delete</a> 
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
        
    </div>
<?= $this->endSection() ?>