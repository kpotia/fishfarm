<?= $this->extend('templates/dashboard') ?>
<!-- Supplier Listing -->
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
                    <th>Supplier ID</th>
                    <th>Supplier Name</th>
                    <th>Supplier Description</th>
                    <th>Supplier Contact</th>
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
                        <td>
                            <a href="supplier/edit/<?=$supplier['id'] ?>" class="btn">edit</a> 
                            <a href="supplier/delete/<?=$supplier['id'] ?>" class="btn">delete</a> 
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
        
    </div>
<?= $this->endSection() ?>