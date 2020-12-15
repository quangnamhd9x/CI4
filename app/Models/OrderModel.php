<?php namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model{
    protected $table = 'order';
    protected $primaryKey = 'order_id';
    protected $allowedFields = ['customer_id', 'utm_id', 'order_status_id', 'payment_method_id', 'note', 'city_id', 'date_entered', 'created_by'];

    function findByAll()
	{
        $order = $this->orderBy('order_id', 'desc')->findAll();
        return $order;
    }
    
    function findById($id){
        $model = $this->where('order_id', $id)->first();
        return $model;
    }

    function findByName($id){
        $model = $this->where('order_id', $id)->first();
        return $model['name'];
    }
}