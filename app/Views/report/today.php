<?= $this->extend('templates/dashboard') ?>

<?= $this->section('content') ?>
<a href="#" onclick = 'window.print()' class="btn btn-primary text-white d-print-none  mb-3">Print</a>
    <div class="row">

    <h2 class='d-print-block d-sm-none col-12'><?=$title?></h2>
        <!-- daily ppurchase -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
                <div class="inner">
                <h3><?= $purchase ?? '0.00' ?> NGN  </h3>

                <p>Daily Purchase</p>
                </div>
             
                <a href="financial" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- daily expenses -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
                <div class="inner">
                <h3><?= $expense ?? '0.00' ?> NGN  </h3>

                <p>Daily Expenses</p>
                </div>
                
                <a href="financial" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        
        <!-- Daily  sales  -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-primary">
                <div class="inner">
                <h3><?= $sale ?? '0.00' ?> NGN  </h3>

                <p>Daily Sales</p>
                </div>
               
                <a href="financial" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- orders count  -->
        <div class="col-lg-2 col-6">
            <!-- small card -->
            <div class="small-box bg-primary">
                <div class="inner">
                <h3><?= $order ?? '0' ?>   </h3>

                <p>Daily Order</p>
                </div>
               
                <a href="financial" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>



    </div>
<?= $this->endSection() ?>