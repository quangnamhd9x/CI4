<?php

namespace App\Controllers;
use App\Models\ProductModel;
use App\Models\CourseModel;
use App\Models\ProductCourseModel;

class Product extends BaseController
{
	public function index()
	{
		$productModel = new ProductModel();
		$course_model = new CourseModel();

		if($this->request->getMethod() == 'post'){
			$id = $this->request->getVar('product_id');
			
			$data = [
				'name' => $this->request->getVar('name'),
				'alias' => $this->request->getVar('alias'),
				'price' => preg_replace('#[^\w()/.%\-&]#',"", $this->request->getVar('price')),
				'saleoff_price' => preg_replace('#[^\w()/.%\-&]#',"", $this->request->getVar('saleoff_price'))
			];
			$productModel->update($id, $data);
		}

		$data['value'] = $productModel->findByAll();
		$data['course'] = $course_model->findByAll();
		return view('product/index', $data);
	}

    public function create()
	{
		if($this->request->getMethod() == 'post'){
			$model = new ProductModel();

			$data = array(
				'name' => $this->request->getVar('name'),
				'alias' => $this->request->getVar('alias'),
				'price' => preg_replace('#[^\w()/.%\-&]#',"", $this->request->getVar('price')),
				'saleoff_price' => preg_replace('#[^\w()/.%\-&]#',"", $this->request->getVar('saleoff_price'))
			);

			$model->insert($data);

			$last_ID = $model->insertID();

			$product_course = new ProductCourseModel();
			$data_option = array(
				'product_id' => $last_ID,
				'course_id' => $this->request->getVar('course_id'),
			);

			$product_course->insert($data_option);

			return redirect()->to('/product');
		}
	}

	public function load()
	{
		if($this->request->getMethod() == 'post'){
			$product = new ProductModel();
			$id = $this->request->getVar('id');
			$model = $product->findById($id);
			echo json_encode($model);
		}
	}

	public function delete($id){
		$model = new ProductModel();
		$model->where('product_id', $id);
		$model->delete();
		return redirect()->to('/product');
	}
	
}
