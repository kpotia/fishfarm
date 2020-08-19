<?php namespace App\Models;

use CodeIgniter\Model;

class FoodhistoryModel extends Model
{
    protected $table      = 'food_history';
    protected $primaryKey = 'fh_id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['food_id','food_id','tank_id', 'qty','date'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';


    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function fetchAll(){
        $db      = \Config\Database::connect();
        $builder=$db->table('food_history');
        $builder->select('*');
        $builder->join('food', 'food.fd_id = food_history.food_id');
        return $builder->get();
    }
}