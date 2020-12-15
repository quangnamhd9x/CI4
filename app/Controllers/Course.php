<?php

namespace App\Controllers;
use App\Models\CourseModel;

class Course extends BaseController
{
	public function index()
	{
		$model = new CourseModel();
		if($this->request->getMethod() == 'post'){
			$id = $this->request->getVar('course_id');

			$data = [
				'name' => $this->request->getVar('name'),
			];
			
			$model->update($id, $data);
		}

		$data['value'] = $model->findByAll();
		return view('course/index', $data);
	}


	public function create()
	{
		if($this->request->getMethod() == 'post'){
			$model = new CourseModel();

			$data = [
				'name' => $this->request->getVar('name')
			];

			$model->insert($data);
		}
		return redirect()->to('/course');
	}

    public function load()
	{
		if($this->request->getMethod() == 'post'){
			$course = new CourseModel();
			$id = $this->request->getVar('id');
			$model = $course->findById($id);
			echo json_encode($model);
		}
	}

	public function delete($id){
		$model = new CourseModel();
		$model->where('course_id', $id);
		$model->delete();
		return redirect()->to('/course');
	}
}
