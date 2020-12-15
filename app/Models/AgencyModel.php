<?php namespace App\Models;

use CodeIgniter\Model;

class AgencyModel extends Model{
    protected $table = 'agency';
    protected $primaryKey = 'agency_id';
    protected $allowedFields = ['name', 'phone', 'hotline'];

    function findByAll()
	{
        $agency = $this->findAll();
        return $agency;
    }
    
    function findById($id){
        $model = $this->where('agency_id', $id)->first();
        return $model;
    }
}