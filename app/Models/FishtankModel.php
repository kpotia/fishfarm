<?php namespace App\Models;

use CodeIgniter\Model;

class FishtankModel extends Model
{

    protected $table      = 'fish_tank';
    protected $primaryKey = 'tk_id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['fish_id', 'qty','birthdate'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';


    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getFT(int $var = null)
    {

        $query = $this->db->query('SELECT fish_tank.tk_id as ft_id,fish_tank.qty as qty,fish_tank.birthdate as birthdate,fish.name as fishname FROM fish INNER JOIN fish_tank on fish_tank.fish_id = fish.id');

        return $fishtank= $query->getResult('array');
    }
}