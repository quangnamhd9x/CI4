<?php namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model{
    protected $table = 'product';
    protected $primaryKey = 'product_id';
    protected $allowedFields = ['name', 'alias', 'price', 'saleoff_price', 'date_entered'];

    function findByAll()
	{
        $product = $this->orderBy('product_id', 'desc')->findAll();
        return $product;
    }
    
    function findById($id){
        $model = $this->where('product_id', $id)->first();
        return $model;
    }

    function findByName($id){
        $model = $this->where('product_id', $id)->first();
        return $model['name'];
    }
}