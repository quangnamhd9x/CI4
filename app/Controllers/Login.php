<?php 

namespace App\Controllers;
use CodeIgniter\Controller;

use App\Models\UserModel;

class Login extends Controller
{

	public function index()
	{

		if($this->request->getMethod() == 'post'){

			$email = $this->request->getVar('email');
			$password = md5($this->request->getVar('password'));

			$model = new UserModel();

            $user = $model->checkLogin($email, $password);
			if($user){
				$this->setUserSession($user);
				return redirect()->to('/');
			}else{
				$data['message'] = "Thông tin đăng nhập không chính xác";
				return view('login/index', $data);
			}			
		}

		if (session('isLoggedIn') == true) {
			return redirect()->to('/');
		}else{
			return view('login/index');
		}
	}

	public function logout(){
		session()->destroy();
        return redirect()->to('/login');
	}

	private function setUserSession($user){
		$data = [
			'id' => $user['user_id'],
			'email' => $user['email'],
			'name' => $user['name'],
			'isLoggedIn' => true,
		];

		session()->set($data);
		return true;
	}
}
