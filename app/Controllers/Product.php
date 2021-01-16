<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProductModel;

class Product extends Controller
{
	public function index()
    {
    //    initialise data array
        $productM = new ProductModel();
        $products = $productM->findAll();
        $session = session();

        $data = [
            'title' => 'products',
            'session' => $session,
            'products' => $products,
        ];
        return view('product/listing',$data);
    }

    public function create(){
        $session = session();
        helper('form');
        $data = [
            'title' => 'Add product',
            'session' => $session,
        ];
        // return var_dump($data);

        if($this->request->getMethod() == 'post'){
            $rules = [
                'name' => 'required|min_length[3]|max_length[30]', 
                'price' => 'required', 
            ];
    
            if (! $this->validate($rules)) {
                $data['validation'] = $this->validator;
            }else{
                $pmodel = new ProductModel();
                $newData = [
                    'name' => $this->request->getVar('name'),
                    'price' => $this->request->getVar('price'),                                        
                    'quantity' => $this->request->getVar('quantity'),                                        
                    'category' => $this->request->getVar('category'),                                        
                ];
                $pmodel->save($newData);$session = session();
                $session->setFlashData('success','product Added successfully');
                return redirect()->to('/fishfarm_ci/public/product');
            }
        }
        return view('product/form', $data);

    }

    public function edit($id)
    {
        helper('form');
        $model = new ProductModel();
        $session = session();
        //   fetch data
        $product = $model->find($id);
        $data = [
            'title' => 'Update product Details',
            'product' => $product,
            'action' => 'update'
        ];
        // load form with fetch data 
        echo view('product/form',$data);

        // 
        if($this->request->getMethod() == 'post'){
            $model = new ProductModel();
            $productUpdate = [
                'name' => $this->request->getVar('name'),
                'price' => $this->request->getVar('price'),                                        
                'quantity' => $this->request->getVar('quantity'),                                        
                'category' => $this->request->getVar('category'),                                        
            ];
            $model->db->table('product')->update($productUpdate, ['id' => $id]);
            $session->setFlashData('success','product Data Updated');
            return redirect()->to('/fishfarm_ci/public/product');
        }
    }

    public function delete($id)
    {
        $model = new ProductModel();
        $session = session();
        
        if($model->delete($id)){
                $session->setFlashData('success','Successful Deletion');}
        else{
            $session->setFlashData('fail','deletion failed');
        }
        return redirect()->to('/fishfarm_ci/public/product');
    }


}