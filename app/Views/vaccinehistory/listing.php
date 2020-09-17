<?= $this->extend('templates/dashboard') ?>
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
    <table class='table table-responsive '>
            <thead>
                <tr>
                    <th>Tank </th>
                    <th>Fish </th>
                    <th>Vaccine Name</th>
                    <th>Vaccine Qty</th>
                    <th>date</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($vhs as $vh): ?>
                    <tr>
                        <td> <?= $vh['tank_id'] ?></td>
                        <td> <?= $vh['fishname'] ?></td>
                        <td> <?= $vh['vaccinename'] ?></td>
                        <td> <?= $vh['qty'] ?></td>
                        <td> <?= $vh['date'] ?></td>
                        <td>
                            <a href="<?= base_url('vaccine/history/delete/'.$vh['vh_id']) ?>" class="btn btn-danger">delete</a> 
                        
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
        
    </div>
<?= $this->endSection() ?>