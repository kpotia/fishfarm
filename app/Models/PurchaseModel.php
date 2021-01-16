<?php namespace App\Models;

use CodeIgniter\Model;

class PurchaseModel extends Model
{
    protected $table      = 'purchases';
    protected $primaryKey = 'purid';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['type','amount', 'ref','purdate','note','status','supplier', 'quantity', 'paid'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getPurchases(){
        $q = "SELECT
        purchases.purid,
        purchases.type,
        purchases.ref,
        purchases.quantity,
        purchases.purdate,
        supplier.name as suppliername,
        purchases.status,
        purchases.paid,
        purchases.amount,
        purchases.note
    FROM
        purchases
    INNER JOIN supplier ON
        purchases.supplier = supplier.id";
    $query = $this->db->query($q);

    return $query->getResult('array');
    }   
}