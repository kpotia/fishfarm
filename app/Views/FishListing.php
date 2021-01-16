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
                    <th>Fish ID</th>
                    <th>Fish Name</th>
                    <th>Fish Description</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($fishes as $fish): ?>
                    <tr>
                        <td> <?=$fish['id'] ?></td>
                        <td> <?=$fish['name'] ?></td>
                        <td> <?=$fish['description'] ?></td>
                        <td>
                            <a href="fish/edit/<?=$fish['id'] ?>" class="btn btn-warning" >edit</a> 
                            <a href="fish/delete/<?=$fish['id'] ?>" class="btn btn-danger">delete</a> 
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
        
    </div>
<?= $this->endSection() ?>