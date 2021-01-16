<?= $this->extend('templates/dashboard') ?>

<?= $this->section('content') ?>
<a href="#" onclick = 'window.print()' class="btn btn-primary text-white d-print-none  mb-3">Print</a>
    <div class="row">

    <h2 class='d-print-block d-sm-none col-12'><?=$title?></h2>
        <!--  ppurchase -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
                <div class="inner">
                <h3><?= $purchase ?? '0.00' ?> NGN  </h3>

                <p> Purchase</p>
                </div>
            </div>
        </div>


        <!-- orders count  -->
        <div class="col-lg-2 col-6">
            <!-- small card -->
            <div class="small-box bg-primary">
                <div class="inner">
                <h3><?= $purchasecount ?? '0' ?>   </h3>

                <p> purchase count</p>
                </div>
               
              
            </div>
        </div>

        <!-- orders count  -->
        <div class="col-lg-2 col-6">
            <!-- small card -->
            <div class="small-box bg-primary">
                <div class="inner">
                <h3><?= $suppliercount ?? '0' ?>   </h3>

                <p> Supplier count</p>
                </div>
            
            </div>
        </div>
    </div>


    <div class="container">

    <div class="card">
        <header class='card-header'>
            <h2>Supplier</h2>
        </header>
    <section class='card-body'> 
        <table  class='table'>
        <thead>
            <tr>
                <th>Date</th>
                <th>Supplier</th>
                <th>Purchase Count</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($suppliersum as $sup):?>
            <tr>
                <td><?=$sup['purdate']?></td>
                <td><?=$sup['suppliername']?></td>
                <td><?=$sup['count']?></td>
                <td><?=$sup['amount']?></td>
            </tr>
        <?php endforeach;?>
        </tbody>
        </table>   
        </section>
    </div>

  
    </div>
<?= $this->endSection() ?>
