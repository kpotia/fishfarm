<?php namespace App\Controllers;

class Dashboard extends BaseController
{
	public function index()
	{
		$session = session();

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
