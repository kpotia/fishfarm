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
                    <th>Inventory ID</th>
                    <th>Inventory Name</th>
                    <th>Inventory Type</th>
                    <th>Inventory Quantity</th>
                    <th>Inventory Date</th>
                   
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($inventorys as $inventory): ?>
                <tr>
                    <td> <?=$inventory['id'] ?></td>
                    <td> <?=$inventory['name'] ?></td>
                    <td> <?=$inventory['type'] ?></td>
                    <td> <?=$inventory['qty'] ?></td>
                    <td> <?=$inventory['date'] ?></td>
                    <td>
                        <a href="inventory/edit/<?=$inventory['id'] ?>" class="btn btn-warning">edit</a>
                        <a href="inventory/delete/<?=$inventory['id'] ?>" class="btn btn-danger">delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>
<?= $this->endSection() ?>