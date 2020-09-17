<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\VaccineModel;
use App\Models\FishtankModel;
use App\Models\VaccinehistoryModel;



class VaccineHistory extends Controller
{

    public function index()
	{
        $model = new VaccinehistoryModel();

        $vhs = $model->getVH();
        $session = session();

        $data = [
            'title' => 'Vaccine History Listing',
            'vhs' => $vhs,
            'session' => $session
        ];

        
        return view('vaccinehistory/listing',$data);
    }

    public function create()
    {
        $session = session();
        $vm = new VaccineModel();
        $ftm = new FishtankModel();

        $vcs = $vm->findAll();
        $fts = $ftm->getFT();
        helper('form');
        $data = [
            'title' => 'Add Vaccine History',
            'session' => $session,
            'vcs' => $vcs,
            'fts' => $fts
        ];
        // load form 
        if($this->request->getMethod() == 'post'){

            // validate data
            $rules = [
                'fishtank' => 'required',
                'vaccine' => 'required',
                'qty' => 'required',
                'date' => 'required',
            ];
            // save data 
            if (! $this->validate($rules)) {
                $data['validation'] = $this->validator;
            }else{
                $model = new VaccinehistoryModel();
                $ftm = new FishtankModel();
                $ftd = $ftm->find($this->request->getVar('fishtank'));
                $newData = [
                    'tank_id' => $ftd['tk_id'],
                    'fish_id' => $ftd['fish_id'],
                    'vacc_id' => $this->request->getVar('vaccine'),
                    'qty' => $this->request->getVar('qty'),                    
                    'date' => $this->request->getVar('date'),                    
                ];
                $model->save($newData);
                $session = session();
                $session->setFlashData('success','Vaccine history Added successfully');
                return redirect()->to('/fishfarm_ci/public/vaccine/history');
            }
        }
        // return var_dump($data);
        return view('vaccinehistory/form', $data);

    }

    public function edit($id)
    {
        helper('form');
        $model = new VaccinehistoryModel();
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
        $model = new VaccinehistoryModel();
        $session = session();
        
        if($model->delete($id)){
                $session->setFlashData('success','Successful Deletion');}
        else{
            $session->setFlashData('fail','deletion failed');
        }
                return redirect()->to('/fishfarm_ci/public/fish/tank');
    }


}
