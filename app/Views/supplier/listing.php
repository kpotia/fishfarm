<?= $this->extend('templates/dashboard') ?>
<!-- Supplier list -->
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
                    <th>Supplier ID</th>
                    <th>Supplier Name</th>
                    <th>Supplier Description</th>
                    <th>Supplier Contact</th>
                    <th>Supplier Email</th>
                    <th>Supplier Address</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($suppliers as $supplier): ?>
                    <tr>
                        <td> <?=$supplier['id'] ?></td>
                        <td> <?=$supplier['name'] ?></td>
                        <td> <?=$supplier['description'] ?></td>
                        <td> <?=$supplier['contact'] ?></td>
                        <td> <?=$supplier['email'] ?></td>
                        <td> <?=$supplier['address'] ?></td>
                        <td>
                            <a href="supplier/edit/<?=$supplier['id'] ?>" class="btn btn-warning">edit</a> 
                            <a href="supplier/delete/<?=$supplier['id'] ?>" class="btn btn-danger">delete</a> 
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
        
    </div>
<?= $this->endSection() ?>