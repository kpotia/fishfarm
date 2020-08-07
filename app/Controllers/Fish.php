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
    }

    public function add()
    {
        // helper 
    }

    public function store()
    {
        // helper 
    }

    public function edit()
    {
        // helper 
    }

    public function update()
    {
        // helper 
    }


}
