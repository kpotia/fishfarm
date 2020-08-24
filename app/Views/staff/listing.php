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
                    <th>staff ID</th>
                    <th>staff Name</th>
                    <th>staff Description</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($staffes as $staff): ?>
                <tr>
                    <td> <?=$staff['id'] ?></td>
                    <td> <?=$staff['name'] ?></td>
                    <td> <?=$staff['description'] ?></td>
                    <td>
                        <a href="staff/edit/<?=$staff['id'] ?>" class="btn">edit</a>
                        <a href="staff/delete/<?=$staff['id'] ?>" class="btn">delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>
<?= $this->endSection() ?>