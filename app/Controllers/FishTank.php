<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\FishtankModel;



class Fishtank extends Controller
{
    // public $FishtankModel = new FishtankModel;

    public function index()
	{
        $model = new FishtankModel();

        $fishes = $model->findAll();
        $session = session();


        $data = [
            'title' => 'Fish Listing',
            'fishes' => $fishes,
            'session' => $session
        ];

        
        return view('FishtankListing',$data);
    }

    public function create()
    {
        $session = session();

        $data = [
            'title' => 'Add Fish Tank',
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
                $model = new FishtankModel();
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
        helper('form');
        $model = new FishtankModel();
        $session = session();
        //   fetch data
        $fish = $model->find($id);
        $data = [
            'title' => 'Update Fish Details',
            'fish' => $fish,
            'action' => 'update'
        ];
    // load form with fetch data 
    echo view('fishform',$data);

    // validate form data 
    // update data
    if($this->request->getMethod() == 'post'){
        $fishUpdate = [
            'name' => $this->request->getVar('fishName'),
            'description' => $this->request->getVar('fishDescription')
        ];
        $model->db->table('fish')->update($fishUpdate, ['id' => $id]);
        $session->setFlashData('success','Fish Data Updated');
                return redirect()->to('/fishfarm_ci/public/fish');
    }

    }

    public function delete($id)
    {
        $model = new FishtankModel();
        $session = session();
        
        if($model->delete($id)){
                $session->setFlashData('success','Successful Deletion');}
        else{
            $session->setFlashData('fail','deletion failed');
        }
                return redirect()->to('/fishfarm_ci/public/fish');
    }


}
