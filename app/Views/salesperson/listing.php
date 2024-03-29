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
                    <th>sales person ID</th>
                    <th>sales person Name</th>
                    <th>sales person email</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($salespersons as $salesperson): ?>
                <tr>
                    <td> <?=$salesperson['id'] ?></td>
                    <td> <?=$salesperson['firstname'].' '.$salesperson['lastname'] ?></td>
                    <td> <?=$salesperson['email'] ?></td>
                    
                    <td>
                        <!-- <a href="salesperson/edit/<?=$salesperson['id'] ?>" class="btn btn-secondary">edit</a> -->
                        <a href="salesperson/delete/<?=$salesperson['id'] ?>" class="btn btn-danger">delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>
<?= $this->endSection() ?>