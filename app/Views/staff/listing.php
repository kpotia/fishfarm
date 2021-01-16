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
        <table class='table table-responsive  table-hover '>
            <thead>
                <tr>
                    <th>staff ID</th>
                    <th>staff Name</th>
                    <th>staff Role</th>
                    <th>staff Salary</th>
                    <th>staff email</th>
                    <th>staff contact</th>
                    <th>staff address</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($staffs as $staff): ?>
                <tr>
                    <td> <?=$staff['id'] ?></td>
                    <td> <?=$staff['firstname'].' '.$staff['surname'] ?></td>
                    <td> <?=$staff['role'] ?></td>
                    <td> <?=$staff['salary'] ?></td>
                    <td> <?=$staff['email'] ?></td>
                    <td> <?=$staff['contact'] ?></td>
                    <td> <?=$staff['address'] ?></td>
                    <td>
                        <a href="staff/edit/<?=$staff['id'] ?>" class="btn btn-warning">edit</a>
                        <a href="staff/delete/<?=$staff['id'] ?>" class="btn btn-danger">delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>
<?= $this->endSection() ?>