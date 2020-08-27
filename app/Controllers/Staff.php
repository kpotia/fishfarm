<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\StaffModel;

class Staff extends Controller
{
	public function index()
    {
    //    initialise data array
        $staffM = new StaffModel();
        $staffs = $staffM->findAll();
        $session = session();

        $data = [
            'title' => 'staffs',
            'session' => $session,
            'staffs' => $staffs,
        ];
        return view('staff/listing',$data);
    }

    public function create(){
        $session = session();
        helper('form');
        $data = [
            'title' => 'Add staffs',
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
                'role' => 'required|min_length[3]|max_length[200]', 
            ];
    
            if (! $this->validate($rules)) {
                $data['validation'] = $this->validator;
            }else{
                $model = new StaffModel();
                $newData = [
                    'firstname' => $this->request->getVar('firstname'),
                    'surname' => $this->request->getVar('surname'),
                    'description' => $this->request->getVar('description'),                    
                    'contact' => $this->request->getVar('contact'),                    
                    'email' => $this->request->getVar('email'),                    
                    'role' => $this->request->getVar('role'),                    
                    'address' => $this->request->getVar('address'),                    
                ];
                $model->save($newData);$session = session();
                $session->setFlashData('success','staff Added successfully');
                return redirect()->to('/fishfarm_ci/public/staff');
            }
        }
        return view('staff/form', $data);

    }
    public function view($id)
    {
        $model = new StaffModel();
        $session = session();
        //   fetch data
        $staff = $model->find($id);
        $data = [
            'title' => '',
            'staff' => $staff,
            'action' => 'update'
        ];
        return view('staff/details',$data);

    }

    public function edit($id)
    {
        helper('form');
        $model = new StaffModel();
        $session = session();
        //   fetch data
        $staff = $model->find($id);
        $data = [
            'title' => 'Update staff Details',
            'staff' => $staff,
            'action' => 'update'
        ];
        // load form with fetch data 
        echo view('staff/form',$data);

        // 
        if($this->request->getMethod() == 'post'){
            $model = new StaffModel();
            $staffUpdate = [
                'name' => $this->request->getVar('name'),
                'description' => $this->request->getVar('description'),                    
                'contact' => $this->request->getVar('contact'),                    
                'email' => $this->request->getVar('email'),                    
                'address' => $this->request->getVar('address'),                    
            ];
            $model->db->table('staff')->update($staffUpdate, ['id' => $id]);
            $session->setFlashData('success','staff Data Updated');
            return redirect()->to('/fishfarm_ci/public/staff');
        }
    }

    public function delete($id)
    {
        $model = new StaffModel();
        $session = session();
        
        if($model->delete($id)){
                $session->setFlashData('success','Successful Deletion');}
        else{
            $session->setFlashData('fail','deletion failed');
        }
        return redirect()->to('/fishfarm_ci/public/staff');
    }


}