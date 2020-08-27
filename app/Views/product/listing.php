<?= $this->extend('templates/dashboard') ?>
<!-- product Listing -->
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
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Product Description</th>
                    <th>Product Contact</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($products as $product): ?>
                    <tr>
                        <td> <?=$product['id'] ?></td>
                        <td> <?=$product['name'] ?></td>
                        <td> <?=$product['description'] ?></td>
                        <td> <?=$product['contact'] ?></td>
                        <td>
                            <a href="product/edit/<?=$product['id'] ?>" class="btn">edit</a> 
                            <a href="product/delete/<?=$product['id'] ?>" class="btn">delete</a> 
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
        
    </div>
<?= $this->endSection() ?>