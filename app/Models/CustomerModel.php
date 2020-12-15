<?php namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model{
    protected $table = 'customer';
    protected $primaryKey = 'customer_id'; 
    protected $allowedFields = ['customer_code', 'full_name', 'name', 'family_name', 'phone', 'phone2', 'email', 'email2', 'dob', 'gender', 'city_id', 'address', 'date_entered', 'created_by'];
    //protected $allowedFields = ['customer_code', 'full_name', 'name', 'family_name', 'phone', 'city_id', 'created_by'];

    

    function findByAll()
	{
        $customer = $this->findAll();
        return $customer;
    }

    function findById($id){
        $model = $this->where('customer_id', $id)->first();
        return $model;
    }
}
