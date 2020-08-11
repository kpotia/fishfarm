<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\FishModel;



class Fish extends Controller
{
    // public $fishModel = new FishModel;

    public function index()
	{
        $model = new FishModel();

        $fishes = $model->findAll();
        $session = session();


        $data = [
            'title' => 'Fish Listing',
            'fishes' => $fishes,
            'session' => $session
        ];

        
        return view('FishListing',$data);
    }

    public function add()
    {
        $session = session();

        $data = [
            'title' => 'Add Fish',
            'session' => $session
        ];
        // load form 
        if($this->request->getMethod() == 'post'){
            $rules = [
                'fishName' => 'required|min_length[3]|max_length[30]',
                'lastname' => 'required|min_length[3]|max_length[30]',
                // 'lastname' => 'required|min_length[3]|max_length[30]',
    
            ];
    
            if (! $this->validate($rules)) {
                $data['validation'] = $this->validator;
            }else{
                $model = new FishModel();
                $newData = [
                    'fishName' => $this->request->getVar('fishName'),
                    'lastname' => $this->request->getVar('lastname'),
                    // 'email' => $this->request->getVar('email'),
                    
                ];
                $model->save($newData);$session = session();
                $session->setFlashData('success','Successful Registration');
                return redirect()->to('/fishfarm_ci/public/fish');
            }
        }
        
        return view('fishform');

    }

    public function edit()
    {
        // helper 
        echo 'Edit';
        

    }

    public function update()
    {
        // helper 
        echo 'Update';
    }

    public function delete($id)
    {
        echo 'Delete fish of the ID:'.$id;
    }


}
