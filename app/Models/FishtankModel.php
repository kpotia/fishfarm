<?php namespace App\Models;

use CodeIgniter\Model;

class FishtankModel extends Model
{
    protected $table      = 'fish_tank';
    protected $primaryKey = 'tk_id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['fish_id', 'qty','birthdate'];


    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}