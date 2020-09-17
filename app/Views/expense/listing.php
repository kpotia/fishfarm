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
                    <th>Date</th>
                    <th>Type</th>
                    <th>Note</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($exps as $exp): ?>
                    <tr>
                        <td> <?=$exp['exp_date'] ?></td>
                        <td> <?=$exp['type'] ?></td>
                        <td> <?=$exp['note'] ?></td>
                        <td> <?=$exp['amount'] ?></td>
                        <td> <?=$exp['status'] ?></td>
                        <td>
                            <a href="<?= base_url('expense/delete/'.$exp['expid']) ?>" class="btn btn-danger">delete</a> 
                            <a href="<?= base_url('expense/edit/'.$exp['expid']) ?>" class="btn btn-warning">edit</a> 
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
        
    </div>
<?= $this->endSection() ?>