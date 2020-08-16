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

    public function create()
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
                'fishDescription' => 'required|min_length[3]|max_length[200]',   
            ];
    
            if (! $this->validate($rules)) {
                $data['validation'] = $this->validator;
            }else{
                $model = new FishModel();
                $newData = [
                    'name' => $this->request->getVar('fishName'),
                    'description' => $this->request->getVar('fishDescription'),                    
                ];
                $model->save($newData);$session = session();
                $session->setFlashData('success','Fish Added successfully');
                return redirect()->to('/fishfarm_ci/public/fish');
            }
        }
        
        return view('fishform');

    }

    public function edit($id)
    {
        $model = new FishModel();
        $session = session();
        //   fetch data
        $fish = $model($id);
        $data = [
            'title' => 'Update Fish Details',
            'fish' => $fish
        ];
    // load form with fetch data 
    echo view('fishform',$data);

    // validate form data 
    // update data

    }

    public function delete($id)
    {
        $model = new FishModel();
        $session = session();
        
        if($model->delete($id)){
                $session->setFlashData('success','Successful Deletion');}
        else{
            $session->setFlashData('fail','deletion failed');
        }
                return redirect()->to('/fishfarm_ci/public/fish');
    }


}
