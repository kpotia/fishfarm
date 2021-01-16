<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\InventoryModel;

class Inventory extends Controller
{
	public function index()
    {
    //    initialise data array
        $inventoryM = new InventoryModel();
        $inventorys = $inventoryM->findAll();
        $session = session();

        $data = [
            'title' => 'Inventorys',
            'session' => $session,
            'inventorys' => $inventorys,
        ];
        return view('inventory/listing',$data);
    }

    public function create(){
        $session = session();
        helper('form');
        $data = [
            'title' => 'Add Inventory',
            'session' => $session,
        ];
        // return var_dump($data);

        if($this->request->getMethod() == 'post'){
            $rules = [
                'type' => 'required|min_length[3]|max_length[30]',
                'name' => 'required|min_length[3]|max_length[200]', 
                'qty' => 'required', 
                'date' => 'required',                 
            ];
    
            if (! $this->validate($rules)) {
                $data['validation'] = $this->validator;
            }else{
                $model = new InventoryModel();
                $newData = [
                    'type' => $this->request->getVar('type'),
                    'name' => $this->request->getVar('name'),
                    'qty' => $this->request->getVar('qty'),                    
                    'date' => $this->request->getVar('date'),                    
                                
                ];
                $model->save($newData);$session = session();
                $session->setFlashData('success','Inventory Added successfully');
                return redirect()->to('/fishfarm_ci/public/inventory');
            }
        }
        return view('Inventory/form', $data);

    }
    public function view($id)
    {
        $model = new InventoryModel();
        $session = session();
        //   fetch data
        $Inventory = $model->find($id);
        $data = [
            'title' => '',
            'Inventory' => $Inventory,
            'action' => 'update'
        ];
        return view('inventory/details',$data);

    }

    public function edit($id)
    {
        helper('form');
        $model = new InventoryModel();
        $session = session();
        //   fetch data
        $Inventory = $model->find($id);
        $data = [
            'title' => 'Update Inventory Details',
            'Inventory' => $Inventory,
            'action' => 'update'
        ];
        // load form with fetch data 
        echo view('Inventory/form',$data);

        // 
        if($this->request->getMethod() == 'post'){
            $model = new InventoryModel();
            $InventoryUpdate = [
                'name' => $this->request->getVar('name'),
                'description' => $this->request->getVar('description'),                    
                'contact' => $this->request->getVar('contact'),                    
                'email' => $this->request->getVar('email'),                    
                'address' => $this->request->getVar('address'),                    
            ];
            $model->db->table('Inventory')->update($InventoryUpdate, ['id' => $id]);
            $session->setFlashData('success','Inventory Data Updated');
            return redirect()->to('/fishfarm_ci/public/Inventory');
        }
    }

    public function delete($id)
    {
        $model = new InventoryModel();
        $session = session();
        
        if($model->delete($id)){
                $session->setFlashData('success','Successful Deletion');}
        else{
            $session->setFlashData('fail','deletion failed');
        }
        return redirect()->to('/fishfarm_ci/public/Inventory');
    }


}