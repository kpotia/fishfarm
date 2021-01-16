<?php namespace App\Controllers;

use CodeIgniter\Controller;

use Config\Validation;
// use App\Models\UserModel;

// load db

class Report extends Controller
{



	public function index()
    {
        // load list reports as card link

        $data  = [
            'title' => 'Reports', 

        ];

        return view('report/index',$data);
    }

    public function financial( $start = null, $end = null){
        $db = \Config\Database::connect();
        
        // query 
        $pur_q = 'SELECT `purdate`, count(*) as countpurchase, sum(amount) as amount from purchases GROUP BY purdate;';
        $ord_q = 'SELECT `orderdate`, count(*) as countorder, sum(total) as amount from orders GROUP BY orderdate;';
        $exp_q = 'SELECT `exp_date`, count(*) as countexp, sum(amount) as amount from expenses GROUP BY exp_date;';
        $purchases = $db->query($pur_q);
        $purchases = $purchases->getResult('array');
        $orders = $db->query($ord_q);
        $orders = $orders->getResult('array');

        $expenses = $db->query($exp_q);
        $expenses = $expenses->getResult('array');

        // query
        $pur_q = 'SELECT sum(amount) as amount from purchases;';
        $purchase = $db->query($pur_q);
        $purchase = $purchase->getResult('array');
        $purchase = $purchase[0]['amount'];


        $ord_q = 'SELECT count(*) as amount from orders;';
        $order = $db->query($ord_q);
        $order = $order->getResult('array');
        $order = $order[0]['amount'];


        $sale_q = 'SELECT sum(total) as amount from orders;';
        $sale = $db->query($sale_q);
        $sale = $sale->getResult('array');
        $sale = $sale[0]['amount'];

        $exp_q = 'SELECT  sum(amount) as amount from expenses;';
        $expense = $db->query($exp_q);
        $expense = $expense->getResult('array');
        $expense = $expense[0]['amount'];


         $data  = [
            'title' => 'Financial Reports',
            'orders'=> $orders,
            'purchases'=> $purchases,
            'expenses'=> $expenses,
            'order' => $order,
            'purchase' => $purchase,
            'expense' => $expense,
            'sale' => $sale,

        ];

        return view('report/financial',$data);
    }

    public function supplier(){
        $db = \Config\Database::connect();

        $pur_q = 'SELECT  sum(amount) as amount from purchases;';
        $purchase = $db->query($pur_q);
        $purchase = $purchase->getResult('array');
        $purchase = $purchase[0]['amount'];

        // purchase 
        $pur_q = 'SELECT  sum(amount) as amount from purchases;';
        $purchase = $db->query($pur_q);
        $purchase = $purchase->getResult('array');
        $purchase = $purchase[0]['amount'];

        // purchase count 
        $pur_q = 'SELECT  count(amount) as count from purchases;';
        $purchasecount = $db->query($pur_q);
        $purchasecount = $purchasecount->getResult('array');
        $purchasecount = $purchasecount[0]['count'];

        // supplier count 
        $pur_q = 'SELECT  count(*) as count from supplier;';
        $suppliercount = $db->query($pur_q);
        $suppliercount = $suppliercount->getResult('array');
        $suppliercount = $suppliercount[0]['count'];

        // supplier summary
        $pur_q = 'SELECT purdate, count(*) as count, sum(amount) as amount, supplier.name as suppliername   from purchases inner join supplier on supplier.id = purchases.supplier;';
        $suppliersum = $db->query($pur_q);
        $suppliersum = $suppliersum->getResult('array');


        $data  = [
            'title' => 'Supplier Reports', 
            'purchase' => $purchase, 
            'purchasecount' => $purchasecount, 
            'suppliercount' => $suppliercount, 
            'suppliersum' => $suppliersum, 

        ];

        return view('report/supplier',$data);
    }

    public function today(){
        $db = \Config\Database::connect();


        // query
        $pur_q = 'SELECT sum(amount) as amount from purchases where purdate = DATE(NOW());';
        $purchase = $db->query($pur_q);
        $purchase = $purchase->getResult('array');
        $purchase = $purchase[0]['amount'];


        $ord_q = 'SELECT count(*) as amount from orders where orderdate = NOW();';
        $order = $db->query($ord_q);
        $order = $order->getResult('array');
        $order = $order[0]['amount'];


        $sale_q = 'SELECT sum(total) as amount from orders where orderdate = DATE(NOW());';
        $sale = $db->query($sale_q);
        $sale = $sale->getResult('array');
        $sale = $sale[0]['amount'];

        $exp_q = 'SELECT  sum(amount) as amount from expenses where exp_date = DATE(NOW());';
        $expense = $db->query($exp_q);
        $expense = $expense->getResult('array');
        $expense = $expense[0]['amount'];
        // return var_dump($expense,$sale,$order,$purchase);

         $data  = [
            'title' => 'Daily Reports',
            'order' => $order,
            'purchase' => $purchase,
            'expense' => $expense,
            'sale' => $sale,

        ];

        return view('report/today',$data);
    }
}