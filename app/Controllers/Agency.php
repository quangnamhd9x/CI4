<?php

namespace App\Controllers;
use App\Models\AgencyModel;

class Agency extends BaseController
{
	public function index()
	{
		$model = new AgencyModel();
		if($this->request->getMethod() == 'post'){
			$id = $this->request->getVar('id');
			$name = $this->request->getVar('name');
			$phone = $this->request->getVar('phone');
			$hotline = $this->request->getVar('hotline');
			
			// sửa
			$data = [
				'name' => $name,
				'phone' => $phone,
				'hotline' => $hotline
			];
			
			$model->update($id, $data);

		}

		$data['value'] = $model->findByAll();
		return view('agency/index', $data);
	}


	public function create()
	{
		if($this->request->getMethod() == 'post'){
			$model = new AgencyModel();

			$name = $this->request->getVar('name');
			$phone = $this->request->getVar('phone');
			$hotline = $this->request->getVar('hotline');
			$data = array(
				'name' => $name,
				'phone' => $phone,
				'hotline' => $hotline
			);
			$model->insert($data);
			return redirect()->to('/agency');
		}
	}

	public function update()
	{
		return view('agency/update');
	}

	public function load()
	{
		if($this->request->getMethod() == 'post'){
			$agency = new AgencyModel();
			$id = $this->request->getVar('id');
			$model = $agency->findById($id);
			echo json_encode($model);
		}
		
	}

	public function delete($id){
		$model = new AgencyModel();
		$model->where('agency_id', $id);
		$model->delete();
		return redirect()->to('/agency');
	}
}
