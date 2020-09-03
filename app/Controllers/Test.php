<?php namespace App\Controllers;

use Config\Validation;
use App\Models\UserModel;

class Test extends BaseController
{
	public function index()
    {
        
        $db = db_connect();
        // $model = new UserModel();

        $query = $db->query('SELECT fish.name as fishname,fishtank FROM fish INNER JOIN fish_tank on fish_tank.fish_id = fish.id');

        echo '<pre>';
        var_dump($query->getResult());
        echo '</pre>';
    }
}