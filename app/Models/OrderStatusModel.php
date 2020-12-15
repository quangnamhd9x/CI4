<?php


namespace App\Models;


use CodeIgniter\Model;

class OrderStatusModel extends Model
{
    protected $table = 'order_status';
    protected $primaryKey = 'order_status_id';
    protected $allowedFields = ['name', 'alias', 'description', 'type', 'sort_order_id', 'qualified_lead','date_entered', 'created_by'];

    function findByAll()
    {
        $orderStatus = $this->findAll();
        return $orderStatus;
    }

    function findById($id){
        $model = $this->where('order_status_id', $id)->first();
        return $model;
    }
}