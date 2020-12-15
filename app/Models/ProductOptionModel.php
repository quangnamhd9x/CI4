<?php namespace App\Models;

use CodeIgniter\Model;

class ProductOptionModel extends Model{
    protected $table = 'product_option';
    protected $primaryKey = 'product_option_id';
    protected $allowedFields = ['name', 'alias', 'price', 'saleoff_price', 'date_entered'];

    function findByAll()
	{
        $product_option = $this->orderBy('product_option_id', 'desc')->findAll();
        return $product_option;
    }
    
    function findById($id){
        $model = $this->where('product_option_id', $id)->first();
        return $model;
    }
}