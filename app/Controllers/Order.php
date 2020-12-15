<?php

namespace App\Controllers;
use App\Models\OrderModel;
use App\Models\PaymentMethodModel;
use App\Models\ProductModel;
use App\Models\CityModel;
use App\Models\CustomerModel;
use App\Models\OrderDetailModel;

class Order extends BaseController
{
	public function index()
	{
		$orderModel = new OrderModel();
		$payment_methodModel = new PaymentMethodModel();
		$product = new ProductModel();
		$cityModel = new CityModel();
		
		$data['value'] = $orderModel->findByAll();
		$data['payment_method'] = $payment_methodModel->findByAll();
		$data['product'] = $product->findByAll();
		$data['city'] = $cityModel->findByAll();
		return view('order/index', $data);
	}

    public function create()
	{
		
	}

	public function load()
	{
		if($this->request->getMethod() == 'post'){
			$customer = new CustomerModel();
			$order_detail = new OrderDetailModel();
			
			$order_id = $this->request->getVar('order_id');
			$customer_id = $this->request->getVar('customer_id');

			$data['order_detail'] = $order_detail->findByIdAll($order_id);
			$data['customer'] = $customer->findById($customer_id);

			return view('order/load', $data);
		}
	}

	public function delete($id){
		
	}

	
	
}
