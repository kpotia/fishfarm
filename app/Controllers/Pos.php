<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProductModel;
use App\Models\OrderModel;
use App\Models\OrderdetailModel;

class Pos extends Controller
{

	public function index()
    {
        //    initialise data array
        $ProductM = new ProductModel();
        $Products = $ProductM->findAll();
        $session = session();
        $count = session()->get('order_cart');
        
        $count =$count['count'] ?? 0;
        

        $data = [
            'title' => 'POS',
            'session' => $session,
            'count' => $count,
            'products' => $Products,
        ];
        return view('salesdpt/productlisting.php',$data);
    }

    public function clearcart(){
        unset($_SESSION['order_cart']);
        session()->setFlashdata('success','order cleared');
        return redirect()->to('/fishfarm_ci/public/salesdpt/pos');
    }

    public function viewcart(){

        // load cart 
        $cart =  session('order_cart') ??  null ;

        if ($cart) {
            $data = [
                'title' => 'POS: View Cart',
                'cart' => $cart,
            ];
            // load view 
            return view('salesdpt/cart', $data);
        } else {
            session()->setFlashdata('info', 'cart is empty');
        return redirect()->to('/fishfarm_ci/public/salesdpt/pos');

        }
        
    }

    public function initCartSession(){
        $cart = array(
            'items' => array(),
            'total' => 0.00, 
            'count' => 0, 
        );
        session()->set('order_cart',$cart);
        return true;
    }

    public function addtocart(INT $id){
        helper('form');
        helper('array');
        session(); $index = 0;

        if(isset($_SESSION["order_cart"]))  
        { 
        $item_array_id = array_column($_SESSION["order_cart"]['items'], "item_id");  
        if(!in_array($id, $item_array_id))  
            {  
                $index = count($_SESSION["order_cart"]['items']);  
            }  
            else  
            {  
                // echo '<script>alert("Item Already Added")</script>';  
                
        session()->setFlashdata('fail','Item Already Added');
        return redirect()->to('/fishfarm_ci/public/salesdpt/pos');

            }
        }  
        else  
        {       
            $this->initCartSession();
            $index = 0;
        }  

         
        $item_array = array(  
            'item_id'             =>     $id,  
            'item_name'           =>     $_POST["hidden_name"],  
            'item_price'          =>     $_POST["hidden_price"],  
            'item_quantity'       =>     $_POST["quantity"],  
            'item_subtotal'       =>     (float)$_POST["quantity"] *  (float)$_POST["hidden_price"],
        );
        $_SESSION["order_cart"]['items'][$index] = $item_array;
        $_SESSION['order_cart']['count'] = count($_SESSION["order_cart"]['items']);
        $_SESSION['order_cart']['total'] += $_SESSION["order_cart"]['items'][$index]['item_subtotal'];

        // add to cart array
        session()->setFlashdata('success','Item added');

        return redirect()->to('/fishfarm_ci/public/salesdpt/pos');
        
    }


    public function checkout(){
        // var_dump($_POST, $_SESSION);
        helper('query');
        // insert into order 
        $db = \Config\Database::connect();
        $orderbuilder = $db->table('orders');
        $orderdetailsbuilder = $db->table('order_product');
        // get order detail and store it in an array
        $data = [
            'orderdate' => date('Y-m-d'),
            'total' => $_SESSION['order_cart']['total'],
            'paymeth' => $_POST['paymeth'],
            'client' => $_POST['custname'],
        ];

        // insert into order
        if($orderbuilder->insert($data)){
            $orderid = $db->insertID();

            // insert items in orderdetails 
            foreach($_SESSION['order_cart']['items'] as $item){
                $data = [
                    'order_id'=>$orderid,
                    'product_id'=>$item['item_id'],
                    'qty'=>$item['item_quantity'],
                    'price'=>$item['item_price'],
                    'subtotal'=>$item['item_subtotal'],
                ];
                $orderdetailsbuilder->insert($data);
            }           
        }        

        // redirect data 
        session()->setFlashdata('success','Order successful');
        return redirect()->to('/fishfarm_ci/public/salesdpt/order/'.$orderid);        
    }

    public function orders(){
        $db = \Config\Database::connect();
        $data = array();
        $orderbuilder = $db->table('orders');
        $orderbuilder->select();
        $orderquery = $orderbuilder->get();
        $data['orders'] = $orderquery->getResultArray();

        // var_dump($data);
        return view('salesdpt/order',$data);

    
    }

    public function orderdetail($id){
        $db = \Config\Database::connect();
        
        $data = array();

        // load models 
        $orderbuilder = $db->table('orders');
        $orderdetailbuilder = $db->table('order_product');

        // 
        $orderbuilder->select()->where('or_id',$id);        
        $orderquery = $orderbuilder->get();

        $orderdetailbuilder->select()->where('order_id',$id);
        $orderdetailquery = $orderdetailbuilder->get();
        $order = $orderquery->getResultArray();

        // prepare data 
        $data['order'] = $order[0] ;
        $data['order']['items'] = $orderdetailquery->getResultArray();

        $data['title'] = 'Order Details';


        // load view
        return view('salesdpt/orderdetail',$data);

    }

}