<?php namespace App\Controllers;

class Dashboard extends BaseController
{
	public function index()
	{
		$session = session();

		// load db and connect to db;
		$db = \Config\Database::connect();
		$query= 'SELECT COUNT(*) as fishcount from fish';
		$query= 'SELECT COUNT(*) from fishtank';
		$query= 'SELECT COUNT(*) from fish';


		if($session->isLoggedIn){
			$data = [
				'title' => 'FishFarm Dashboard',
				'session' => $session
			];
			echo view('index', $data);
		}else {
			throw new \CodeIgniter\Router\Exceptions\RedirectException();
		}

        
	}

	//--------------------------------------------------------------------

}
