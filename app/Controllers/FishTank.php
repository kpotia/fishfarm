<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\FishtankModel;
use App\Models\FishModel;



class FishTank extends Controller
{
    // public $FishtankModel = new FishtankModel;

    public function index()
	{
        $model = new FishtankModel();

        $session = session();


        $data = [
            'title' => 'Fish Listing',
            'fishtank' => $model->getFT(),
            'session' => $session
        ];
       
        return view('fishtank/listing',$data);
    }

    public function create()
    {
        $session = session();
        $model = new FishModel();

        $fishes = $model->findAll();
        helper('form');
        $data = [
            'title' => 'Add Fish Tank',
            'session' => $session,
            'fishes' => $fishes
        ];
        // load form 
        if($this->request->getMethod() == 'post'){

            // validate data
            $rules = [
                'fish_id' => 'required',
                'qty' => 'required',
                'date' => 'required',
            ];
            // save data 
            if (! $this->validate($rules)) {
                $data['validation'] = $this->validator;
            }else{
                $model = new FishtankModel();
                $newData = [
                    'fish_id' => $this->request->getVar('fish_id'),
                    'qty' => $this->request->getVar('qty'),                    
                    'birthdate' => $this->request->getVar('date'),                    
                ];
                $model->save($newData);
                $session = session();
                $session->setFlashData('success','Fish Added successfully');
                return redirect()->to('/fishfarm_ci/public/fish/tank');
            }

        }
        
        return view('fishtank/form', $data);

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
                return redirect()->to('/fishfarm_ci/public/fish/tank');
    }


}
