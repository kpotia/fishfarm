<?php namespace App\Controllers;

use Config\Validation;
use App\Models\SalesUserModel;

class SalesUsers extends BaseController
{
	public function index()
	{
        
        $data = [];
        helper(['form']);

        if($this->request->getMethod() == 'post'){
            // validation
        $rules = [
            'email' => 'required|min_length[6]|max_length[60]|valid_email',
            'password' => 'required|min_length[6]|max_length[255]',
        ];

        $errors = [
            'password' => [
                'validateUser' => "Email or Password Don't match"
            ]
        ];

        if (! $this->validate($rules)) {
            $data['validation'] = $this->validator;
        }else{
            $model = new SalesUserModel();

            $user = $model->where('email', $this->request->getVar('email'))
                            ->first();
        if(isset($user['id'])){
            $this->setUserSession($user);
            return redirect()->to(base_url('/salesdpt/dashboard'));

            }
        }
        }

        echo view('salesdpt/templates/header', $data);
        echo view('salesdpt/login', $data);	
    }

    private function login()
    {
        // validation
        $rules = [
            'email' => 'required|min_length[6]|max_length[60]|valid_email',
            'password' => 'required|min_length[6]|max_length[255]|validateUser[email,password]',
        ];

        $errors = [
            'password' => [
                'validateUser' => "Email or Password Don't match"
            ]
        ];

        if (! $this->validate($rules)) {
            $data['validation'] = $this->validator;
        }else{
            $model = new SalesUserModel();

            $user = $model->where('email', $this->request->getVar('email'))
                            ->first();
            $this->setUserSession($user);
            return redirect()->to('/fishfarm_ci/public/salesdpt/dashboard');
        }
    }
    
    private function setUserSession($user)
    {
        $data = [
            'id' => $user['id'],
            'firstname' => $user['firstname'],
            'lastname' => $user['lastname'],
            'email' => $user['email'],
            'role' => 'salesperson',
            'isLoggedIn' => true,
        ];
        session()->set($data);
        return true;
    }

    public function dashboard()
    {
        $session = session();

        // load db and connect to db;
        $db = \Config\Database::connect();
        
        
        // product
		$productcount_query= 'SELECT COUNT(*) as productcount from product';
		$query = $db->query($productcount_query);
        $productcount = $query->getResult('array');
        
        // order
		$ordercount_query= 'SELECT COUNT(*) as ordercount from orders';
		$query = $db->query($ordercount_query);
		$ordercount = $query->getResult('array');

        // sales
		$salesum_query= 'SELECT sum(total) as salesum from orders';
		$query = $db->query($salesum_query);
        $salesum = $query->getResult('array');
      

        // query to count data and display in dashboard

        if($session->isLoggedIn){
            $data = [
                'title' => 'FishFarm  Sales Dashboard',
                'session' => $session,
				'productcount' => $productcount[0]['productcount'],
				'ordercount' => $ordercount[0]['ordercount'],
				'sale' => $salesum[0]['salesum'],

            ];
            echo view('salesdpt/index', $data);
        }else {
            throw new \CodeIgniter\Router\Exceptions\RedirectException();
        }

        
    }

    public function register()
    {   

        $data = [];
        helper(['form']);

        if($this->request->getMethod() == 'post'){
            // validation
            $rules = [
                'firstname' => 'required|min_length[3]|max_length[30]',
                'lastname' => 'required|min_length[3]|max_length[30]',
                'email' => 'required|min_length[6]|max_length[60]|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[6]|max_length[255]',
                'confirm_password' => 'matches[password]',
            ];
    
            if (! $this->validate($rules)) {
                $data['validation'] = $this->validator;
            }else{
                $model = new SalesUserModel();
                $newData = [
                    'firstname' => $this->request->getVar('firstname'),
                    'lastname' => $this->request->getVar('lastname'),
                    'email' => $this->request->getVar('email'),
                    'password' => $this->request->getVar('password'),
                ];
                $model->save($newData);$session = session();
                $session->setFlashData('success','Successful Registration');
                return redirect()->to('/fishfarm_ci/public/');
            }
        }
        
        // echo view('templates/header', $data);
        return view('salesperson/form', $data);
    }

    public function logout(){
        session()->destroy();
        return redirect()->to('/fishfarm_ci/public/');
    }


    public function list(){
        $model = new SalesUserModel();

        $salespersons = $model->findAll();
        $session = session();

        $data = [
            'title' => 'Fish list',
            'salespersons' => $salespersons,
            'session' => $session
        ];        
        return view('salesperson/listing',$data);
    }


    public function edit($id)
    {
        helper('form');
        $model = new SalesUserModel();
        $session = session();
        
        $salespersons = $model->find($id);
        $data = [
            'title' => 'Update Sales User Details',
            'Purchase' => $salespersons,
            
            'action' => 'update'
        ];
        // load form with fetch data 
        echo view('Purchase/form',$data);

        // 
        if($this->request->getMethod() == 'post'){
            $model = new SalesUserModel();
            
            $salespersonsUpdate = [
                
            ];
            $model->db->table('salesusers')->update($salespersonsUpdate, ['purid' => $id]);
            $session->setFlashData('success','Purchase Data Updated');
            return redirect()->to('/fishfarm_ci/public/purchase');
        }
    }


    public function delete($id)
    {
        $model = new SalesUserModel();
        $session = session();
        
        if($model->delete($id)){
                $session->setFlashData('success','Successful Deletion');}
        else{
            $session->setFlashData('fail','deletion failed');
        }
        return redirect()->to('/fishfarm_ci/public/salesperson');
    }
}
