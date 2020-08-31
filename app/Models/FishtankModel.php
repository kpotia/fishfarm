<?php namespace App\Models;

use CodeIgniter\Model;

class FishtankModel extends Model
{
    protected $table      = 'fish_tank';
    protected $primaryKey = 'tk_id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['fish_id', 'qty','birthdate'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';


    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getFishTankDetails(int $var = null)
    {
        if ($var == null){
            return $this->findAll();
        }
    }
}