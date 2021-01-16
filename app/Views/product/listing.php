<?= $this->extend('templates/dashboard') ?>
<!-- product list -->
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
    <table class='table table-hover '>
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>category</th>
                    <th>Quantity</th>
                    <th>Product Price</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($products as $product): ?>
                    <tr>
                        <td> <?=$product['id'] ?></td>
                        <td> <?=$product['name'] ?></td>
                        <td> <?=$product['category'] ?></td>
                        <td> <?=$product['quantity'] ?></td>
                        <td> <?=$product['price'] ?></td>
                        
                        <td>
                            <a href="product/edit/<?=$product['id'] ?>" class="btn btn-warning">edit</a> 
                            <a href="product/delete/<?=$product['id'] ?>" class="btn btn-danger">delete</a> 
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
        
    </div>
<?= $this->endSection() ?>