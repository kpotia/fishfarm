<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\FoodModel;



class Food extends Controller
{
    // public $FoodModel = new FoodModel;

    public function index()
	{
        $model = new FoodModel();

        $Food = $model->findAll();
        $session = session();


        $data = [
            'title' => 'Food Listing',
            'Food' => $Food,
            'session' => $session
        ];

        
        return view('food/listing',$data);
    }

    public function create()
    {
        $session = session();

        $data = [
            'title' => 'Add Food',
            'session' => $session
        ];
        // load form 
        if($this->request->getMethod() == 'post'){
            $rules = [
                'FoodName' => 'required|min_length[3]|max_length[30]',
                'Foodqty' => 'required',   
            ];
    
            if (! $this->validate($rules)) {
                $data['validation'] = $this->validator;
            }else{
                $model = new FoodModel();
                $newData = [
                    'name' => $this->request->getVar('FoodName'),
                    'description' => $this->request->getVar('Foodqty'),                    
                ];
                $model->save($newData);$session = session();
                $session->setFlashData('success','Food Added successfully');
                return redirect()->to('/Foodfarm_ci/public/Food');
            }
        }
        
        return view('food/form');

    }

    public function edit($id)
    {
        helper('form');
        $model = new FoodModel();
        $session = session();
        //   fetch data
        $Food = $model->find($id);
        $data = [
            'title' => 'Update Food Details',
            'Food' => $Food,
            'action' => 'update'
        ];
    // load form with fetch data 
    echo view('Foodform',$data);

    // validate form data 
    // update data
    if($this->request->getMethod() == 'post'){
        $FoodUpdate = [
            'name' => $this->request->getVar('FoodName'),
            'description' => $this->request->getVar('Foodqty')
        ];
        $model->db->table('Food')->update($FoodUpdate, ['id' => $id]);
        $session->setFlashData('success','Food Data Updated');
                return redirect()->to('/Foodfarm_ci/public/Food');
    }

    }

    public function delete($id)
    {
        $model = new FoodModel();
        $session = session();
        
        if($model->delete($id)){
                $session->setFlashData('success','Successful Deletion');}
        else{
            $session->setFlashData('fail','deletion failed');
        }
                return redirect()->to('/Foodfarm_ci/public/Food');
    }


}
