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
                    <th>client ID</th>
                    <th>client Name</th>
                    <th>client Role</th>
                    <th>client email</th>
                    <th>client contact</th>
                    <th>client address</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($clients as $client): ?>
                <tr>
                    <td> <?=$client['id'] ?></td>
                    <td> <?=$client['firstname'].' '.$client['surname'] ?></td>
                    <td> <?=$client['role'] ?></td>
                    <td> <?=$client['email'] ?></td>
                    <td> <?=$client['contact'] ?></td>
                    <td> <?=$client['address'] ?></td>
                    <td>
                        <a href="client/edit/<?=$client['id'] ?>" class="btn btn-secondary">edit</a>
                        <a href="client/delete/<?=$client['id'] ?>" class="btn btn-danger">delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>
<?= $this->endSection() ?>