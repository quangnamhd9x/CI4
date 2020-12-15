<?php

namespace App\Controllers;
use App\Models\PaymentMethodModel;

class PaymentMethod extends BaseController
{
	public function index()
	{
		$payment_method = new PaymentMethodModel();
        
        if($this->request->getMethod() == 'post'){
			$id = $this->request->getVar('payment_method_id');
			
			$data = [
				'name' => $this->request->getVar('name'),
			];
			$payment_method->update($id, $data);
		}
        
		$data['value'] = $payment_method->findByAll();
		return view('payment_method/index', $data);
	}

    public function create()
	{
		if($this->request->getMethod() == 'post'){
			$model = new PaymentMethodModel();

			$data = array(
				'name' => $this->request->getVar('name'),
			);

			$model->insert($data);
			return redirect()->to('/paymentmethod');
		}
	}

	public function load()
	{
		if($this->request->getMethod() == 'post'){
			$payment_method = new PaymentMethodModel();
            $id = $this->request->getVar('id');
			$model = $payment_method->findById($id);
			echo json_encode($model);
		}
	}

	public function delete($id){
		$model = new PaymentMethodModel();
		$model->where('payment_method_id', $id);
		$model->delete();
		return redirect()->to('/paymentmethod');
	}
	
}
