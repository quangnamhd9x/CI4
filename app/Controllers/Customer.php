<?php

namespace App\Controllers;
use App\Models\CustomerModel;
use App\Models\CityModel;

class Customer extends BaseController
{
	public function index()
	{
        $customerModel = new CustomerModel();
		$cityModel = new CityModel();

		if($this->request->getMethod() == 'post'){
			$id = $this->request->getVar('customer_id');

			// sửa
			$data_update = [
				'full_name' => $this->request->getVar('full_name'),
				'name' => $this->request->getVar('name'),
				'family_name' => $this->request->getVar('family_name'),
				'phone' => $this->request->getVar('phone'),
				'phone2' => $this->request->getVar('phone2'),
				'email' => $this->request->getVar('email'),
				'email2' => $this->request->getVar('email2'),
				'dob' => $this->request->getVar('dob'),
				'gender' => $this->request->getVar('gender'),
				'city_id' => $this->request->getVar('city_id'),
				'address' => $this->request->getVar('address'),
				'created_by' => session()->get('id')
			];
			
			$customerModel->update($id, $data_update);
			return redirect()->to('/customer');
		}

		$data['value'] = $customerModel->findByAll();
		$data['city'] = $cityModel->findByAll();
		return view('customer/index', $data);
	}

    public function create()
	{
		if($this->request->getMethod() == 'post'){
			$model = new CustomerModel();

            $full_name = $this->request->getVar('full_name');
			$name = $this->request->getVar('name');
			$family_name = $this->request->getVar('family_name');
			$phone = $this->request->getVar('phone');
			$phone2 = $this->request->getVar('phone2');
			$email = $this->request->getVar('email');
			$email2 = $this->request->getVar('email2');
			$dob = $this->request->getVar('dob');
			$gender = $this->request->getVar('gender');
			$city_id = $this->request->getVar('city_id');
			$address = $this->request->getVar('address');

			$data = [
				'customer_code' => 'ASK01',
				'full_name' => $full_name,
				'name' => $name,
				'family_name' => $family_name,
				'phone' => $phone,
				'phone2' => $phone2,
				'email' => $email,
				'email2' => $email2,
				'dob' => $dob,
				'gender' => $gender,
				'city_id' => $city_id,
				'address' => $address,
				'date_entered' => date('Y-m-d H:i'),
				'created_by' => session()->get('id')
			];

			$model->insert($data);
			$last_ID = $model->insertID();

			$data_update = [
				'customer_code' => 'ASK'.$last_ID
			];
			$model->update($last_ID, $data_update);
		}
		return redirect()->to('/customer');
	}

	public function load()
	{
		if($this->request->getMethod() == 'post'){
			$customer = new CustomerModel();
			$cityModel = new CityModel();
			$id = $this->request->getVar('id');

			$data['value'] = $customer->findById($id);
			$data['city'] = $cityModel->findByAll();
			return view('customer/load', $data);
		}
	}

	public function update()
	{
		if($this->request->getMethod() == 'post'){
			$model = new CustomerModel();
			$id = $this->request->getVar('customer_id');
			$data_update = [
				'full_name' => $this->request->getVar('full_name'),
				'phone' => $this->request->getVar('phone'),
				'email' => $this->request->getVar('email'),
				'dob' => $this->request->getVar('dob'),
				'gender' => $this->request->getVar('gender'),
				'address' => $this->request->getVar('address'),
			];
			$model->update($id, $data_update);
		}
	}

	public function delete($id){
		$model = new CustomerModel();
		$model->where('customer_id', $id);
		$model->delete();
		return redirect()->to('/customer');
	}
	
}
