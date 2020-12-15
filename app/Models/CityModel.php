<?php namespace App\Models;

use CodeIgniter\Model;

class CityModel extends Model{
    protected $table = 'city';
    protected $primaryKey = 'city_id';
    protected $allowedFields = ['name'];

    function findByAll()
	{
        $city = $this->orderBy('name', 'asc')->findAll();
        return $city;
    }
    
    function findById($id){
        $model = $this->where('city_id', $id)->first();
        return $model;
    }
}