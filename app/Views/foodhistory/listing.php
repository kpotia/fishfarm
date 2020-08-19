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
    <table class='table table-responsive table-hover '>
            <thead>
                <tr>
                    <th>Tank </th>
                    <!-- <th>Tank </th> -->
                    <th>Food Name</th>
                    <th>food Qty(g)</th>
                    <th>date</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($Food as $fd): ?>
                    <tr>
                        <td> <?= 'tank id fishname' ?></td>
                        <td> <?=$fd['name'] ?></td>
                        <td> <?=$fd['qty'] ?></td>
                        <td>
                            <a href="<?= base_url('food/delete/'. 'tank id fishname') ?>" class="btn">delete</a> 
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
        
    </div>
<?= $this->endSection() ?>