<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\CustomerModel;
use App\Models\OrderModel;
use App\Models\OrderDetailModel;


class Api extends Controller
{
	public function wakeup()
	{
        try {
            $response = ['status' => 'success', 'data' => []];
            
            $json = file_get_contents('php://input');
            if (!$json) {
                throw new \Exception('Invalid Request!');
            }
            if ($json) {
                $obj = json_decode($json,true);               
                
                $customer = new CustomerModel();
                $order = new OrderModel();
                $order_detail = new OrderDetailModel();

                $data_customer = [
                    'customer_code' => 'ASK',
                    'full_name' => $obj['full_name'],
                    'name' => $obj['name'],
                    'family_name' => $obj['family_name'],
                    'phone' => $obj['phone'],
                    'phone2' => $obj['phone2'],
                    'email' => $obj['email'],
                    'email2' => $obj['email2'],
                    'dob' => $obj['dob'],
                    'gender' => $obj['gender'],
                    'city_id' => $obj['city_id'],
                    'address' => $obj['address'],
                    'date_entered' => date('Y-m-d H:i'),
                    'created_by' => '1'
                ];
                $customer->insert($data_customer);
                $last_ID = $customer->insertID();

                $data_customer_update = [
                    'customer_code' => 'ASK'.$last_ID
                ];
                $customer->update($last_ID, $data_customer_update);

                $data_order = [
                    'customer_id' => $last_ID,
                    'utm_id' => 1,
                    'order_status_id' => 1,
                    'payment_method_id' => 1,
                    'note' => $obj['note'],
                    'city_id' => $obj['order_city_id'],
                    'date_entered' => date('Y-m-d H:i'),
                    'created_by' => '1'
                ];

                $order->insert($data_order);
                $last_order_id = $order->insertID();

                foreach ($obj['data_order'] as $row_data_order){
                    if($row_data_order['quantity'] > 0){
                        $data_order_detail[] = [
                            "order_id" => $last_order_id,
                            "product_id" => $row_data_order['product_id'],
                            "quantity" => $row_data_order['quantity'],
                            "price" => $row_data_order['price'],
                            'date_entered' => date('Y-m-d H:i'),
                            'created_by' => '1'
                        ];
                    }
                }

                $order_detail->insertBatch($data_order_detail);

                $response['data'] = array(
                    'full_name' => $obj['full_name'],
                );
            }

        } catch (\Exception $e) {
            // -----------------------------------------
            $response = ['status' => 'error', 'error' => $e->getMessage()];
        }
        echo json_encode($response);
    }
    
    public function index(){
        echo date('Y', "2020-10-12"); die;
    }

}
