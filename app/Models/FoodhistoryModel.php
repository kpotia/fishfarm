<?php namespace App\Models;

use CodeIgniter\Model;

class FoodhistoryModel extends Model
{
    protected $table      = 'food_history';
    protected $primaryKey = 'fh_id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['food_id','fish_id','tank_id', 'qty','date'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';


    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getFH(){
     
        $q = "SELECT
        food_history.fh_id,
        food_history.tank_id,
        food.name as foodname,
        fish.name as fishname,
        food_history.qty,
        food_history.date
    FROM
        food_history,fish_tank,food,fish
    WHERE
        food_history.tank_id = fish_tank.tk_id
    AND
        food_history.food_id = food.fd_id
    AND
        food_history.fish_id = fish.id";


// $q = 'SELECT * FROM food_history, fish_tank WHERE
    // food_history.tank_id = fish_tank.tk_id';
        
        $query = $this->db->query($q);

       return $fishtank = $query->getResult('array');
    }
}