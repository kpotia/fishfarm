<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ClientModel;

class Client extends Controller
{
	public function index()
    {
    //    initialise data array
        $clientM = new ClientModel();
        $clients = $clientM->findAll();
        $session = session();

        $data = [
            'title' => 'clients',
            'session' => $session,
            'clients' => $clients,
        ];
        return view('client/listing',$data);
    }

    public function create(){
        $session = session();
        helper('form');
        $data = [
            'title' => 'Add client',
            'session' => $session,
        ];
        // return var_dump($data);

        if($this->request->getMethod() == 'post'){
            $rules = [
                'firstname' => 'required|min_length[3]|max_length[30]',
                'surname' => 'required|min_length[3]|max_length[200]', 
                'contact' => 'required|min_length[3]|max_length[200]', 
                'email' => 'required|min_length[3]|max_length[200]', 
                'address' => 'required|min_length[3]|max_length[200]', 
                
            ];
    
            if (! $this->validate($rules)) {
                $data['validation'] = $this->validator;
            }else{
                $model = new ClientModel();
                $newData = [
                    'firstname' => $this->request->getVar('firstname'),
                    'surname' => $this->request->getVar('surname'),
                    'description' => $this->request->getVar('description'),                    
                    'contact' => $this->request->getVar('contact'),                    
                    'email' => $this->request->getVar('email'),                  
                    'address' => $this->request->getVar('address'),                    
                ];
                $model->save($newData);$session = session();
                $session->setFlashData('success','client Added successfully');
                return redirect()->to('/fishfarm_ci/public/client');
            }
        }
        return view('client/form', $data);

    }
    public function view($id)
    {
        $model = new ClientModel();
        $session = session();
        //   fetch data
        $client = $model->find($id);
        $data = [
            'title' => '',
            'client' => $client,
            'action' => 'update'
        ];
        return view('client/details',$data);

    }

    public function edit($id)
    {
        helper('form');
        $model = new ClientModel();
        $session = session();
        //   fetch data
        $client = $model->find($id);
        $data = [
            'title' => 'Update client Details',
            'client' => $client,
            'action' => 'update'
        ];
        // load form with fetch data 
        echo view('client/form',$data);

        // 
        if($this->request->getMethod() == 'post'){
            $model = new ClientModel();
            $clientUpdate = [
                'name' => $this->request->getVar('name'),
                'description' => $this->request->getVar('description'),                    
                'contact' => $this->request->getVar('contact'),                    
                'email' => $this->request->getVar('email'),                    
                'address' => $this->request->getVar('address'),                    
            ];
            $model->db->table('client')->update($clientUpdate, ['id' => $id]);
            $session->setFlashData('success','client Data Updated');
            return redirect()->to('/fishfarm_ci/public/client');
        }
    }

    public function delete($id)
    {
        $model = new ClientModel();
        $session = session();
        
        if($model->delete($id)){
                $session->setFlashData('success','Successful Deletion');}
        else{
            $session->setFlashData('fail','deletion failed');
        }
        return redirect()->to('/fishfarm_ci/public/client');
    }


}