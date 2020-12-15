<?php


namespace App\Controllers;


use App\Models\OrderStatusModel;

class OrderStatus extends BaseController
{
    public function index()
    {
        $orderStatusModel = new OrderStatusModel();
        if($this->request->getMethod() == 'post'){
            $id = $this->request->getVar('order_status_id');
            // sửa
            $data_update = [
                'name' => $this->request->getVar('name'),
                'alias' => $this->request->getVar('alias'),
                'description' => $this->request->getVar('description'),
                'type' => $this->request->getVar('type'),
                'qualified_lead' => $this->request->getVar('qualified_lead'),
                'sort_order_id' => $this->request->getVar('sort_order_id'),
                'date_entered' => $this->request->getVar('date_entered'),
                'created_by' => session()->get('id')
            ];

            $orderStatusModel->update($id, $data_update);
            return redirect()->to('/orderstatus');
        }
        $data['value'] = $orderStatusModel->findByAll();
        return view('order_status/index', $data);
    }

    public function create()
    {
        if($this->request->getMethod() == 'post'){
            $model = new OrderStatusModel();

            $data = [
                'name' => $this->request->getVar('name'),
                'alias' => $this->request->getVar('alias'),
                'description' => $this->request->getVar('description'),
                'type' => $this->request->getVar('type'),
                'qualified_lead' => $this->request->getVar('qualified_lead'),
                'sort_order_id' => $this->request->getVar('sort_order_id'),
                'date_entered' => date('Y-m-d H:i'),
                'created_by' => session()->get('id')
            ];

            $model->insert($data);
        }
        return redirect()->to('/orderstatus');
    }



    public function load()
    {
        if($this->request->getMethod() == 'post'){
            $orderStatus = new OrderStatusModel();
            $id = $this->request->getVar('id');
            $data['value'] = $orderStatus->findById($id);
            return view('order_status/load', $data);
        }
    }

    public function update()
    {
        if($this->request->getMethod() == 'post'){
            $model = new OrderStatusModel();
            $id = $this->request->getVar('order_status_id');
            $data_update = [
                'name' => $this->request->getVar('name'),
                'alias' => $this->request->getVar('alias'),
                'description' => $this->request->getVar('description'),
                'type' => $this->request->getVar('type'),
                'qualified_lead' => $this->request->getVar('qualified_lead'),
                'sort_order_id' => $this->request->getVar('sort_order_id'),
                'date_entered' => $this->request->getVar('date_entered'),
                'created_by' => session()->get('id')
            ];
            $model->update($id, $data_update);
        }
        return redirect()->to('/orderstatus');

    }

    public function delete($id){
        $model = new OrderStatusModel();
        $model->where('order_status_id', $id);
        $model->delete();
        return redirect()->to('/orderstatus');
    }
}