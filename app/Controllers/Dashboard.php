<?php namespace App\Controllers;

class Dashboard extends BaseController
{
	public function index()
	{
		$session = session();

		// load db and connect to db;
		$db = \Config\Database::connect();
		
		// fish 
		$fishcount_query= 'SELECT COUNT(*) as fishcount from fish';
		$query = $db->query($fishcount_query);
		$fishcount = $query->getResult('array');
		
		// staff 
		$staffcount_query= 'SELECT COUNT(*) as staffcount from staff';
		$query = $db->query($staffcount_query);
		$staffcount = $query->getResult('array');

		// suppliers
		$suppliercount_query= 'SELECT COUNT(*) as suppliercount from supplier';
		$query = $db->query($suppliercount_query);
		$suppliercount = $query->getResult('array');

		// product
		$productcount_query= 'SELECT COUNT(*) as productcount from product';
		$query = $db->query($productcount_query);
		$productcount = $query->getResult('array');

		// sales
		$staffcount_query= 'SELECT COUNT(*) as staffcount from staff';
		$query = $db->query($staffcount_query);
		$staffcount = $query->getResult('array');

		// expenses
		$expensesum_query= 'SELECT sum(amount) as expensesum from expenses';
		$query = $db->query($expensesum_query);
		$expensesum = $query->getResult('array');

		// purchases
		$purchasesum_query= 'SELECT sum(amount) as purchasesum from purchases';
		$query = $db->query($purchasesum_query);
		$purchasesum = $query->getResult('array');

		// sales
		$salesum_query= 'SELECT sum(total) as salesum from orders';
		$query = $db->query($salesum_query);
		$salesum = $query->getResult('array');




		if($session->isLoggedIn){
			$data = [
				'title' => 'FishFarm Dashboard',
				'session' => $session,
				'fishcount' => $fishcount[0]['fishcount'],
				'staffcount' => $staffcount[0]['staffcount'],
				'suppliercount' => $suppliercount[0]['suppliercount'],
				'productcount' => $productcount[0]['productcount'],
				'expense' => $expensesum[0]['expensesum'],
				'purchase' => $purchasesum[0]['purchasesum'],
				'sale' => $salesum[0]['salesum'],
			];
			echo view('index', $data);
		}else {
			throw new \CodeIgniter\Router\Exceptions\RedirectException();
		}

        
	}

	//--------------------------------------------------------------------

}
