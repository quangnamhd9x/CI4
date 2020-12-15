<?php namespace App\Models;

use CodeIgniter\Model;

class PaymentMethodModel extends Model{
    protected $table = 'payment_method';
    protected $primaryKey = 'payment_method_id';
    protected $allowedFields = ['name'];

    function findByAll()
	{
        $product = $this->orderBy('payment_method_id', 'desc')->findAll();
        return $product;
    }
    
    function findById($id){
        $model = $this->where('payment_method_id', $id)->first();
        return $model;
    }

}