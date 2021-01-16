<?php namespace App\Models;

use CodeIgniter\Model;

class ExpenseModel extends Model
{
    protected $table      = 'expenses';
    protected $primaryKey = 'expid';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['type','amount', 'exp_date','note','status'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}