<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class TestApi extends Controller
{
	public function wakeup()
	{
        if($this->request->getMethod() == 'post'){

            $full_name = $this->request->getVar('full_name');
            $family_name = array_shift(explode(" ", $full_name));
            $name = array_pop(explode(" ", $full_name));

            $post = $this->request->getVar();

            foreach($post['product_id'] as $key=>$value){
                $data_order[$key]['product_id'] = $value;
				$data_order[$key]['price'] = preg_replace('#[^\w()/.%\-&]#',"", $post["price"][$key]);
				$data_order[$key]['quantity'] = $post["quantity"][$key];
            }

            $data = array(
                "full_name" => $full_name, 
                "name" => $name,
                "family_name" => $family_name,
                "phone" => $this->request->getVar('phone'),
                "phone2" => "",
                "email" => $this->request->getVar('email'),
                "email2" => "",
                "dob" => "2020-12-10",
                "gender" => "Nam",
                "city_id" => "2",
                "address" => "Nam định",
                "note" => "",
                "order_city_id" => "1",
                "data_order" => $data_order
            );

            $data_string = json_encode($data);
            
            $curl = curl_init('http://a-ask.com/api/wakeup');
            
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data_string))
            );
            
            $result = curl_exec($curl);
            curl_close($curl);

            echo $result; die;
        }

        return view('test_api');
	}

}
