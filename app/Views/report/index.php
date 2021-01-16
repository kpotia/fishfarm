<?= $this->extend('templates/dashboard') ?>

<?= $this->section('content') ?>
<a href="#" onclick = 'window.print()' class="btn btn-primary text-white d-print-none  mb-3">Print</a>
    <div class="row">
    <h2 class='d-print-block d-sm-none'><?=$title?></h2>
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-primary">
                <div class="inner">
            
                <p>Financial</p>
                </div>
            
                <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        
      
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-primary">
                <div class="inner">

                <p>Orders</p>
                </div>
               
                <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        
        <div class="col-lg-5 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
                <div class="inner">
                <p>Sales</p>
                </div>
                <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>