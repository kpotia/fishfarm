<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProductModel;
use App\Models\OrderModel;

class Pos extends Controller
{
    // load cart library
    // $this->load->library('cart');

    public $cart  = array();


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

    // innitialise cart in a session
    public function initcart(){
        $cart = array();

        session()->set($cart);
    }

    public function viewcart(){
        
        // load cart 
        $cart = (issset(session('cart'))) ? session('cart') :array(); ;

        // if cart empty 
        if (is_array($cart) &&  empty($cart)) {
            echo 'cart is empty';
        }else {
            
        }
        $session = session();

        var_dump();
    }

    public function addtocart(){
        helper('form');
        // get form data 
        $cartitem = ''

        // validate and create an array from data 

        // add to cart array
    }


}