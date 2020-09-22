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
        $cart = (session('cart')!== null) ? session('cart') :array(); ;

        // if cart empty 
        if (is_array($cart) &&  empty($cart)) {
           session()->setFlashdata('cartmsg', 'cart is empty');
           echo '';
        }else {

        }

        $data = [
                    'title' => 'POS: View Cart',
                    'cart' => $cart,

                ];
        return view('salesdpt/cart', $data);
    }

    public function addtocart(){
        helper('form');
        // get form data 
        $cartitem = '';

        // validate and create an array from data 

        // add to cart array
    }


}