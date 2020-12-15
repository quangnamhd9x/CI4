<?php namespace App\Models;

use CodeIgniter\Model;

class CourseModel extends Model{
    protected $table = 'course';
    protected $primaryKey = 'course_id';
    protected $allowedFields = ['name'];

    function findByAll()
	{
        $product = $this->orderBy('course_id', 'desc')->findAll();
        return $product;
    }
    
    function findById($id){
        $model = $this->where('course_id', $id)->first();
        return $model;
    }

    function findByName($id){
        $model = $this->where('course_id', $id)->first();
        return $model['name'];
    }

}