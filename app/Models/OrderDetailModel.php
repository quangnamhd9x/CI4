<?php namespace App\Models;

use CodeIgniter\Model;

class OrderDetailModel extends Model{
    protected $table = 'order_detail';
    protected $primaryKey = 'order_detail_id';
    protected $allowedFields = ['order_id', 'product_id', 'quantity', 'price', 'date_entered', 'created_by'];
    
    function findById($id){
        $model = $this->where('order_detail_id', $id)->findAll();
        return $model;
    }

    function findByIdAll($order_id){
        $model = $this->where('order_id', $order_id)->findAll();
        return $model;
    }
}