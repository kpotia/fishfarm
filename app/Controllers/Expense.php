<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ExpenseModel;

class Expense extends Controller
{
	public function index()
    {
    //    initialise data array
        $ExpenseM = new ExpenseModel();
        $Expenses = $ExpenseM->findAll();
        $session = session();

        $data = [
            'title' => 'Expenses',
            'session' => $session,
            'Expenses' => $Expenses,
        ];
        return view('Expense/listing',$data);
    }

    public function create(){
        $session = session();
        helper('form');
        $data = [
            'title' => 'Add Expenses',
            'session' => $session,
        ];
        // return var_dump($data);

        if($this->request->getMethod() == 'post'){
            $rules = [
                'name' => 'required|min_length[3]|max_length[30]',
                'description' => 'required|min_length[3]|max_length[200]', 
                'contact' => 'required|min_length[3]|max_length[200]', 
                'email' => 'required|min_length[3]|max_length[200]', 
                'address' => 'required|min_length[3]|max_length[200]', 
            ];
    
            if (! $this->validate($rules)) {
                $data['validation'] = $this->validator;
            }else{
                $model = new ExpenseModel();
                $newData = [
                    'name' => $this->request->getVar('name'),
                    'description' => $this->request->getVar('description'),                    
                    'contact' => $this->request->getVar('contact'),                    
                    'email' => $this->request->getVar('email'),                    
                    'address' => $this->request->getVar('address'),                    
                ];
                $model->save($newData);$session = session();
                $session->setFlashData('success','Expense Added successfully');
                return redirect()->to('/fishfarm_ci/public/expense');
            }
        }
        return view('expense/form', $data);

    }

    public function edit($id)
    {
        helper('form');
        $model = new ExpenseModel();
        $session = session();
        //   fetch data
        $Expense = $model->find($id);
        $data = [
            'title' => 'Update Expense Details',
            'Expense' => $Expense,
            'action' => 'update'
        ];
        // load form with fetch data 
        echo view('expense/form',$data);

        // 
        if($this->request->getMethod() == 'post'){
            $model = new ExpenseModel();
            $ExpenseUpdate = [
                'name' => $this->request->getVar('name'),
                'description' => $this->request->getVar('description'),                    
                'contact' => $this->request->getVar('contact'),                    
                'email' => $this->request->getVar('email'),                    
                'address' => $this->request->getVar('address'),                    
            ];
            $model->db->table('Expense')->update($ExpenseUpdate, ['id' => $id]);
            $session->setFlashData('success','Expense Data Updated');
            return redirect()->to('/fishfarm_ci/public/Expense');
        }
    }

    public function delete($id)
    {
        $model = new ExpenseModel();
        $session = session();
        
        if($model->delete($id)){
                $session->setFlashData('success','Successful Deletion');}
        else{
            $session->setFlashData('fail','deletion failed');
        }
        return redirect()->to('/fishfarm_ci/public/Expense');
    }


}