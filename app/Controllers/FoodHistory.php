<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\FoodModel;
use App\Models\FishtankModel;
use App\Models\FoodhistoryModel;



class FoodHistory extends Controller
{

    public function index()
	{
        $model = new FoodhistoryModel();

        $fhs = $model->getFH();
        $session = session();
// return var_dump($fhs);

        $data = [
            'title' => 'Food/Drug History',
            'fhs' => $fhs,
            'session' => $session
        ];

        
        return view('foodhistory/listing',$data);
    }

    public function create()
    {
        $session = session();
        $fm = new FoodModel();
        $ftm = new FishtankModel();

        $fds = $fm->findAll();
        $fts = $ftm->getFT();
        helper('form');
        $data = [
            'title' => 'Add Food/drug History',
            'session' => $session,
            'fds' => $fds,
            'fts' => $fts
        ];
        // load form 
        if($this->request->getMethod() == 'post'){

            // validate data
            $rules = [
                'fishtank' => 'required',
                'food' => 'required',
                'qty' => 'required',
                'date' => 'required',
            ];
            // save data 
            if (! $this->validate($rules)) {
                $data['validation'] = $this->validator;
            }else{
                $model = new FoodhistoryModel();
                $ftm = new FishtankModel();
                $ftd = $ftm->find($this->request->getVar('fishtank'));
                $newData = [
                    'tank_id' => $ftd['tk_id'],
                    'fish_id' => $ftd['fish_id'],
                    'fishqty' => $ftd['qty'],
                    'food_id' => $this->request->getVar('food'),
                    'qty' => $this->request->getVar('qty'),                    
                    'date' => $this->request->getVar('date'),                    
                ];
                $model->save($newData);
                $session = session();
                $session->setFlashData('success','food history Added successfully');
                return redirect()->to('/fishfarm_ci/public/food/history');
            }
        }
        // return var_dump($data);
        return view('foodhistory/form', $data);

    }

    public function edit($id)
    {
        helper('form');
        $model = new FoodhistoryModel();
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
        $model = new FoodhistoryModel();
        $session = session();
        
        if($model->delete($id)){
                $session->setFlashData('success','Successful Deletion');}
        else{
            $session->setFlashData('fail','deletion failed');
        }
                return redirect()->to('/fishfarm_ci/public/fish/tank');
    }


}
