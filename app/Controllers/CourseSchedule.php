<?php

namespace App\Controllers;
use App\Models\CourseScheduleModel;
use App\Models\CityModel;
use App\Models\CourseModel;

class CourseSchedule extends BaseController
{

	public function index()
	{
        $course_scheduleModel = new CourseScheduleModel();
        $cityModel = new CityModel();
        $courseModel = new CourseModel();

		$data['value'] = $course_scheduleModel->findByAll();
        $data['city'] = $cityModel->findByAll();
		$data['course'] = $courseModel->findByAll();

		return view('course_schedule/index', $data);
	}

    public function create()
	{
        if($this->request->getMethod() == 'post'){

			$model = new CourseScheduleModel();
			$data = [
				'course_id' => $this->request->getVar('course_id'),
				'date_start' => $this->request->getVar('date_start'),
				'date_end' => $this->request->getVar('date_end'),
				'venue' => $this->request->getVar('venue'),
				'total_slot' => $this->request->getVar('total_slot'),
				'city_id' => $this->request->getVar('city_id'),
			];
			$model->insert($data);
        }

		return redirect()->to('/course-schedule');
    }
    
    public function update(){
        if($this->request->getMethod() == 'post'){
            $model = new CourseScheduleModel();
			$id = $this->request->getVar('course_schedule_id');

			$data_update = [
				'course_id' => $this->request->getVar('course_id'),
				'date_start' => $this->request->getVar('date_start'),
				'date_end' => $this->request->getVar('date_end'),
				'venue' => $this->request->getVar('venue'),
				'total_slot' => $this->request->getVar('total_slot'),
				'city_id' => $this->request->getVar('city_id'),
			];
			
			$model->update($id, $data_update);
			return redirect()->to('/course-schedule');
		}
    }

	public function load()
	{
		if($this->request->getMethod() == 'post'){
			$course_schedule = new CourseScheduleModel();
            $cityModel = new CityModel();
            $courseModel = new CourseModel();

			$id = $this->request->getVar('id');

			$data['value'] = $course_schedule->findById($id);
            $data['city'] = $cityModel->findByAll();
            $data['course'] = $courseModel->findByAll();
			return view('course_schedule/load', $data);
		}
	}

	public function delete($id){
		$model = new CourseScheduleModel();
		$model->where('course_schedule_id', $id);
		$model->delete();
		return redirect()->to('/course-schedule');
	}
	
}
