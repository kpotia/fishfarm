<?= $this->extend('templates/dashboard') ?>

<?= $this->section('content') ?>
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-primary">
                <div class="inner">
                <h3><?= $fishcount ?></h3>

                <p>Fish Type</p>
                </div>
                <div class="icon">
                <i class="fas fa-fish"></i>
                </div>
                <a href="<?= base_url('fish')?>" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-primary">
                <div class="inner">
                <h3><?= $productcount ?></h3>

                <p>Product</p>
                </div>
                <div class="icon">
                <i class="fab fa-product-hunt"></i>
                </div>
                <a href="product" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-2 col-6">
            <!-- small card -->
            <div class="small-box bg-primary">
                <div class="inner">
                <h3><?= $staffcount ?></h3>
                
                <p>Staff</p>
                </div>
                <div class="icon">
                <i class="fas fa-users"></i>
                </div>
                <a href="<?= base_url('staff')?>" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-primary">
                <div class="inner">
                <h3><?= $suppliercount ?></h3>
                
                <p>Suppliers</p>
                </div>
                <div class="icon">
                <i class="fas fa-users"></i>
                </div>
                <a href="supplier" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        
        
        <div class="col-lg-4 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
                <div class="inner">
                <h3><?= $expense ?>  NGN</h3>

                <p>Expenses</p>
                </div>
                <div class="icon">
                <i class="fas fa-money-bill-alt"></i>
                </div>
                <a href="expense" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
                <div class="inner">
                <h3><?= $sale ?? '0.00' ?> NGN</h3>

                <p>Sales</p>
                </div>
                <div class="icon">
                <i class="fas fa-money-bill-wave"></i>
                </div>
                <a href="report/financial" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
                <div class="inner">
                <h3><?= $purchase ?> NGN</h3>

                <p>Purchase</p>
                </div>
                <div class="icon">
                <i class="fas fa-receipt"></i>
                </div>
                <a href="purchase" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>