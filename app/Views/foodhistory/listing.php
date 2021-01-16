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
    <table class='table  '>
            <thead>
                <tr>
                    <th>Tank </th>
                    <th>Fish </th>
                    <th>Fish qty</th>
                    <th>Food Name</th>
                    <th>food Qty(g)</th>
                    <th>Average food consumption</th>
                    <th>date</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($fhs as $fh): ?>
                    <tr>
                        <td> <?= $fh['tank_id'] ?></td>
                        <td> <?= $fh['fishname'] ?></td>
                        <td> <?= $fh['fishqty'] ?></td>
                        <td> <?= $fh['foodname'] ?></td>
                        <td> <?= $fh['qty'] ?></td>
                        <td> <?= $fh['fishqty']/$fh['qty'] ?></td>
                        <td> <?= $fh['date'] ?></td>
                        <td>
                            <a href="<?= base_url('food/history/delete/'.$fh['fh_id']) ?>" class="btn btn-danger">delete</a> 
                            <a href="<?= base_url('food/history/update/'.$fh['fh_id']) ?>" class="btn btn-warning">edit</a> 
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
        
    </div>
<?= $this->endSection() ?>