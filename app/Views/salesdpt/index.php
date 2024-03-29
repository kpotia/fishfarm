<?= $this->extend('salesdpt/templates/dashboard') ?>

<?= $this->section('content') ?>
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-primary">
                <div class="inner">
                <h3><?=$productcount?>
                </h3>

                <p>Product</p>
                </div>
                <div class="icon">
                <i class="fas fa-fish"></i>
                </div>
                <a href="<?= base_url('salesdpt/pos');?>" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        
      
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-primary">
                <div class="inner">
                <h3><?=$ordercount?></h3>
                <p>Orders</p>
                </div>
                <div class="icon">
                <i class="fas fa-users"></i>
                </div>
                <a href="<?= base_url('salesdpt/orders');?>" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        
        <div class="col-lg-5 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
                <div class="inner">
                <h3><?=$sale ?? '0.00'?> NGN</h3>

                <p>Sales</p>
                </div>
                <div class="icon">
                <i class="fas fa-money-bill-wave"></i>
                </div>
                <a href="<?= base_url('salesdpt/orders');?>" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>