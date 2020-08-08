<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\FishModel;



class Fish extends Controller
{
    // public $fishModel = new FishModel;

    public function index()
	{
        $model = new FishModel();

        $fishes = $model->findAll();
        $session = session();

        $data = [
            'title' => 'Fish Listing',
            'fishes' => $fishes,
            'session' => $session
        ];
        
        return view('FishListing',$data);
    }

    public function show()
    {
        // helper 
        echo 'Show';

    }

    public function add()
    {
        // helper 
        echo 'Add';

    }

    public function store()
    {
        // helper 
        echo 'Store';

    }

    public function edit()
    {
        // helper 
        echo 'Edit';
        

    }

    public function update()
    {
        // helper 
        echo 'Update';
    }

    public function delete($id)
    {
        echo 'Delete fish of the ID:'.$id;
    }


}
