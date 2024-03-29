<?php namespace App\Models;

use CodeIgniter\Model;

class FoodModel extends Model
{
    protected $table      = 'food';
    protected $primaryKey = 'fd_id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['name', 'qty','type'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}