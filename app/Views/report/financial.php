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

        <!--  expenses -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
                <div class="inner">
                <h3><?= $expense ?? '0.00' ?> NGN  </h3>
                <p> Expenses</p>
                </div>
            </div>
        </div>

        
        <!--   sales  -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-primary">
                <div class="inner">
                <h3><?= $sale ?? '0.00' ?> NGN  </h3>
                <p> Sales</p>
                </div>
            </div>
        </div>

        <!--   sales  -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-primary">
                <div class="inner">
                <h3><?= $sale - ($expense ?? 0)- ($purchase ?? 0) ?> NGN  </h3>
                <p> Balance</p>
                </div>
            </div>
        </div>

        <!-- orders count  -->
        <div class="col-lg-2 col-6">
            <!-- small card -->
            <div class="small-box bg-primary">
                <div class="inner">
                <h3><?= $order ?? '0' ?>   </h3>
                <p> Order</p>
                </div>            
            </div>
        </div>
    </div>


    <div class="container">

    <div class="card">
        <header class='card-header'>
            <h2>Sales</h2>
        </header>
    <section class='card-body'> 
        <table  class='table'>
        <thead>
            <tr>
                <th>Date</th>
                <th>Orders Count</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($orders as $order):?>
            <tr>
                <td><?=$order['orderdate']?></td>
                <td><?=$order['countorder']?></td>
                <td><?=$order['amount']?></td>
            </tr>
        <?php endforeach;?>
        </tbody>
        </table>   
        </section>
    </div>

    
    <div class="card">
        <header class='card-header'>
            <h2>Purchases</h2>
        </header>
    <section class='card-body'> 
        <table  class='table'>
        <thead>
            <tr>
                <th>Date</th>
                <th>Purchase Count</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($purchases as $purchase):?>
            <tr>
                <td><?=$purchase['purdate']?></td>
                <td><?=$purchase['countpurchase']?></td>
                <td><?=$purchase['amount']?></td>
            </tr>
        <?php endforeach;?>
        </tbody>
        
        </table>   
        </section>
    </div>

    
    <div class="card">
        <header class='card-header'>
            <h2>Expenses</h2>
        </header>
    <section class='card-body'> 
        <table  class='table'>
        <thead>
            <tr>
                <th>Date</th>
                <th>Expense Count</th>
                <th>Amount</th>
            </tr>
        </thead>

        <tbody>
        <?php foreach($expenses as $expense):?>
            <tr>
                <td><?=$expense['exp_date']?></td>
                <td><?=$expense['countexp']?></td>
                <td><?=$expense['amount']?></td>
            </tr>
        <?php endforeach;?>
        </tbody>
        </table>   
        </section>
    </div>

    </div>
<?= $this->endSection() ?>
