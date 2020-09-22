<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProductModel;
use App\Models\OrderModel;

class Pos extends Controller
{
    // load cart library
    $this->load->library('cart');

	public function index()
    {
    //    initialise data array
        $ProductM = new ProductModel();
        $Products = $ProductM->findAll();
        $session = session();

        $data = [
            'title' => 'POS',
            'session' => $session,
            'products' => $Products,
        ];
        return view('salesdpt/productlisting.php',$data);
    }

    public function viewcart(){
        var_dump($this->cart);
    }

}