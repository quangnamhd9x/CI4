<?php namespace App\Models;

use CodeIgniter\Model;

class CourseScheduleModel extends Model{
    protected $table = 'course_schedule';
    protected $primaryKey = 'course_schedule_id '; 
    protected $allowedFields = ['course_id', 'date_start', 'date_end', 'venue', 'total_slot', 'city_id'];

    function findByAll()
	{
        $course_schedule = $this->findAll();
        return $course_schedule;
    }

    function findById($id){
        $model = $this->where('course_schedule_id', $id)->first();
        return $model;
    }
}
