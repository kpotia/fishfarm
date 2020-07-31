<?php namespace App\Controllers;

use Config\Validation;

class Users extends BaseController
{
	public function index()
	{
        $data = [];
        helper(['form']);

        echo view('templates/header', $data);
        echo view('login', $data);
        // echo view('templates/footer', $data);
		
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

            }
        }

        echo view('templates/header', $data);
        echo view('register', $data);
    }
}
