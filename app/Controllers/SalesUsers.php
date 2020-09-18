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

        // query to count data and display in dashboard

        if($session->isLoggedIn){
            $data = [
                'title' => 'FishFarm  Sales Dashboard',
                'session' => $session
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
        
        echo view('templates/header', $data);
        echo view('register', $data);
    }

    private function registration(){
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
            $model = new UserModel();
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

    public function logout(){
        session()->destroy();
        return redirect()->to('/fishfarm_ci/public/');
    }
}
