<?php namespace App\Models;

use CodeIgniter\Model;

class VaccinehistoryModel extends Model
{
    protected $table      = 'vaccine_history';
    protected $primaryKey = 'vh_id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['vacc_id','fish_id','tank_id', 'qty','date'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';


    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getVH(){
     
        $q = "SELECT
        vaccine_history.vh_id,
        vaccine_history.vacc_id,
        vaccine_history.tank_id,
        vaccine.name as vaccinename,
        fish.name as fishname,
        vaccine_history.qty,
        vaccine_history.date
    FROM
        vaccine_history,fish_tank,vaccine,fish
    WHERE
        vaccine_history.tank_id = fish_tank.tk_id
    AND
        vaccine_history.vacc_id = vaccine.vac_id
    AND
        vaccine_history.fish_id = fish.id";
        
        $query = $this->db->query($q);

       return $fishtank = $query->getResult('array');
    }
}