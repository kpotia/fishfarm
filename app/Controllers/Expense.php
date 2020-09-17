<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ExpenseModel;

class Expense extends Controller
{
	public function index()
    {
    //    initialise data array
        $expenseM = new ExpenseModel();
        $expenses = $expenseM->findAll();
        $session = session();

        $data = [
            'title' => 'Expenses',
            'session' => $session,
            'exps' => $expenses,
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
                'exptype' => 'required',
                'expnote' => 'required|min_length[3]|max_length[200]', 
                'expamount' => 'required', 
                'expstatus' => 'required', 
                'expdate' => 'required', 
            ];
    
            if (! $this->validate($rules)) {
                $data['validation'] = $this->validator;
            }else{
                $model = new ExpenseModel();
                $newData = [
                    'exp_date' => $this->request->getVar('expdate'),
                    'note' => $this->request->getVar('expnote'),                    
                    'type' => $this->request->getVar('exptype'),                    
                    'amount' => $this->request->getVar('expamount'),                    
                    'status' => $this->request->getVar('expstatus'),
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
        return redirect()->to('/fishfarm_ci/public/expense/');
    }


}