<?php namespace App\Controllers;

class Dashboard extends BaseController
{
	public function index()
	{
		$session = session(); 
		$user = [
			'id'=> $session->get('id'),
			'firstname'=> $session->get('firstname'),
			'lastname'=> $session->get('lastname'),
			'email'=> $session->get('email'),			
		];

		if($session->isLoggedIn){
			$data = [
				'title' => 'FishFarm Dashboard',
				'user' => $user
			];
			echo view('index', $data);
		}else {
			throw new \CodeIgniter\Router\Exceptions\RedirectException();
		}

        
	}

	//--------------------------------------------------------------------

}
