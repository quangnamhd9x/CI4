<?php namespace App\Models;

use CodeIgniter\Model;

class ProductCourseModel extends Model{
    protected $table = 'product_course';
    protected $primaryKey = ['course_id', 'product_id'];
    protected $allowedFields = ['course_id', 'product_id'];

}