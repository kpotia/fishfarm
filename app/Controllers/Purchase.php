<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PurchaseModel;
use App\Models\SupplierModel;

class Purchase extends Controller
{
	public function index()
    {
    //    initialise data array
        $purchaseM = new PurchaseModel();
        $purchases = $purchaseM->getPurchases();
        $session = session();

        $data = [
            'title' => 'Purchases',
            'session' => $session,
            'purs' => $purchases,
        ];
        // return var_dump($purchases);
        return view('Purchase/listing',$data);
    }

    public function create(){
        $session = session();
        $supplierM = new SupplierModel();
        $suppliers = $supplierM->findAll();
        helper('form');
        $data = [
            'title' => 'Add Purchases',
            'suppliers' => $suppliers,
            'session' => $session,
        ];
        // return var_dump($data);

        if($this->request->getMethod() == 'post'){
            $rules = [
                'purtype' => 'required',
                'purnote' => 'required|min_length[3]|max_length[200]', 
                'puramount' => 'required', 
                'supplier' => 'required', 
                'purstatus' => 'required', 
                'purdate' => 'required', 
                'purpay' => 'required', 
            ];
    
            if (! $this->validate($rules)) {
                $data['validation'] = $this->validator;
            }else{
                $model = new PurchaseModel();
                $newData = [
                    'purdate' => $this->request->getVar('purdate'),
                    'note' => $this->request->getVar('purnote'),                    
                    'type' => $this->request->getVar('purtype'),                    
                    'ref' => $this->request->getVar('ref'),                    
                    'quantity' => $this->request->getVar('quantity'),                    
                    'amount' => $this->request->getVar('puramount'),                    
                    'status' => $this->request->getVar('purstatus'),
                    'paid' => $this->request->getVar('purpay'),
                    'supplier' => $this->request->getVar('supplier'),
                ];
                $model->save($newData);$session = session();
                $session->setFlashData('success','Purchase Added successfully');
                return redirect()->to('/fishfarm_ci/public/purchase');
            }
        }
        return view('Purchase/form', $data);

    }

    public function edit($id)
    {
        helper('form');
        $model = new PurchaseModel();
        $session = session();
        $supplierM = new SupplierModel();
        $suppliers = $supplierM->findAll();
        //   fetch data
        $Purchase = $model->find($id);
        $data = [
            'title' => 'Update Purchase Details',
            'Purchase' => $Purchase,
            'suppliers' => $suppliers,
            'action' => 'update'
        ];
        // load form with fetch data 
        echo view('Purchase/form',$data);

        // 
        if($this->request->getMethod() == 'post'){
            $model = new PurchaseModel();
            
            $purchaseUpdate =[
                'purdate' => $this->request->getVar('purdate'),
                'note' => $this->request->getVar('purnote'),                    
                'type' => $this->request->getVar('purtype'),                    
                'ref' => $this->request->getVar('ref'),                    
                'quantity' => $this->request->getVar('quantity'),                    
                'amount' => $this->request->getVar('puramount'),                    
                'status' => $this->request->getVar('purstatus'),
                'paid' => $this->request->getVar('purpay'),
                'supplier' => $this->request->getVar('supplier'),
            ];
            $model->db->table('purchases')->update($purchaseUpdate, ['purid' => $id]);
            $session->setFlashData('success','Purchase Data Updated');
            return redirect()->to('/fishfarm_ci/public/purchase');
        }
    }

    public function delete($id)
    {
        $model = new PurchaseModel();
        $session = session();
        
        if($model->delete($id)){
                $session->setFlashData('success','Successful Deletion');}
        else{
            $session->setFlashData('fail','deletion failed');
        }
        return redirect()->to('/fishfarm_ci/public/purchase');
    }


}