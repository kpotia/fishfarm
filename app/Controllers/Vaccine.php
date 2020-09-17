<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\VaccineModel;



class Vaccine extends Controller
{
    // public $VaccineModel = new VaccineModel;

    public function index()
	{
        $model = new VaccineModel();

        $vaccine = $model->findAll();
        $session = session();


        $data = [
            'title' => 'Vaccine Listing',
            'vaccine' => $vaccine,
            'session' => $session
        ];

        
        return view('Vaccine/listing',$data);
    }

    public function create()
    {
        $session = session();

        $data = [
            'title' => 'Add Vaccine',
            'session' => $session
        ];
        // load form 
        if($this->request->getMethod() == 'post'){
            $rules = [
                'VaccineName' => 'required|min_length[3]|max_length[30]',
                'VaccineDesc' => 'required|min_length[3]|max_length[30]',
                'Vaccineqty' => 'required',   
            ];
    
            if (! $this->validate($rules)) {
                $data['validation'] = $this->validator;
            }else{
                $model = new VaccineModel();
                $newData = [
                    'name' => $this->request->getVar('VaccineName'),
                    'description' => $this->request->getVar('VaccineDesc'),
                    'qty' => $this->request->getVar('Vaccineqty'),                    
                ];
                $model->save($newData);$session = session();
                $session->setFlashData('success','Vaccine Added successfully');
                return redirect()->to('/fishfarm_ci/public/Vaccine');
            }
        }
        
        return view('Vaccine/form', $data);

    }

    public function delete($id)
    {
        $model = new VaccineModel();
        $session = session();
        
        if($model->delete($id)){
                $session->setFlashData('success','Successful Deletion');}
        else{
            $session->setFlashData('fail','deletion failed');
        }
                return redirect()->to('/fishfarm_ci/public/Vaccine');
    }


}
