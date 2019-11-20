<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ApiController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('json_output');
		$this->load->model('Api_model');
		$this->load->library('upload');
	}

	public function user_registration()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'POST'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
			$check_auth_client = $this->Api_model->check_auth_client();
			
			if($check_auth_client == true){
				$isMobileNoExist = $this->Api_model->verifymobileno($_REQUEST['mobile_no'],"users");
				// var_dump($isMobileNoExist);die();
				if($isMobileNoExist == true){
					json_output(401,array('status' => 401,'message' => 'Mobile No Should be Unique'));
				}else{
			        $data = [
			        	'name' 		 => 	$_REQUEST['name'],
			        	'email'		 => 	$_REQUEST['email'],
			        	'mobile_no'	 =>		$_REQUEST['mobile_no'],
			        	'place' 	 => 	$_REQUEST['place'],
			        	'state' 	 => 	$_REQUEST['state'],
			        	'password' 	 => 	sha1($_REQUEST['password']),
			        	'status'	 =>		1
			        ];
			       
			        $response = $this->Api_model->register($data);
					json_output($response['status'],$response);
				}
			}
		}
	}

	public function update_profile()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'POST'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
			$check_auth_client = $this->Api_model->check_auth_client();
			
			if($check_auth_client == true){
				$isMobileNoExist = $this->Api_model->verifymobileno($_REQUEST['mobile_no'],"users");
				if($isMobileNoExist == true){
					json_output(401,array('status' => 401,'message' => 'Mobile No Should be Unique'));
				}else{
					$user_id = $_REQUEST['user_id']; 
			        $data = [
			        	'name' 		 => 	$_REQUEST['name'],
			        	'email'		 => 	$_REQUEST['email'],
			        	'mobile_no'	 =>		$_REQUEST['mobile_no'],
			        	'place' 	 => 	$_REQUEST['place'],
			        	'state' 	 => 	$_REQUEST['state'],
			        	'password' 	 => 	sha1($_REQUEST['password']),
			        	'status'	 =>		1
			        ];
		       
			        $response = $this->Api_model->update_user_profile($data,$user_id);
					json_output($response['status'],$response);
				}
			}
		}
	}

	public function user_login()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'POST'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
			$check_auth_client = $this->Api_model->check_auth_client();
			
			if($check_auth_client == true){

		        $mobile_no = $_REQUEST['mobile_no'];
		        $password = $_REQUEST['password'];
		        	
		        $response = $this->Api_model->login($mobile_no,$password);
				json_output($response['status'],$response);
			}
		}
	}

	public function user_logout()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'POST'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
			$check_auth_client = $this->Api_model->check_auth_client();
			if($check_auth_client == true){
		        $response = $this->Api_model->logout();
				json_output($response['status'],$response);
			}
		}
	}

	public function enquiry()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'POST'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		}else{
			$check_auth_client = $this->Api_model->check_auth_client();
			
			if($check_auth_client == true){
				$isMobileNoExist = $this->Api_model->verifymobileno($_REQUEST['mobile_no'],"enquiry");
				// var_dump($isMobileNoExist);die();
				if($isMobileNoExist == true){
					json_output(401,array('status' => 401,'message' => 'Mobile No Should be Unique'));
				}else{

					$data = [
			        	'name' 		 => 	$_REQUEST['name'],
			        	'email'		 => 	$_REQUEST['email'],
			        	'mobile_no'	 =>		$_REQUEST['mobile_no'],
			        	'place' 	 => 	$_REQUEST['place'],
			        	'state' 	 => 	$_REQUEST['state'],
			        	'message' 	 => 	$_REQUEST['message']
		        	];
					$response = $this->Api_model->customer_enquiry($data);
					json_output($response['status'],$response);
				}
			}
		}
	}

	public function ask_questions()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'POST'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		}else{
			$check_auth_client = $this->Api_model->check_auth_client();
			
			if($check_auth_client == true){
	            $question = $_REQUEST['question'];
	            $user_id  = $_REQUEST['user_id'];
	            $file_name = md5(rand()). '.png';
			    $img = imagecreatefromstring(base64_decode($_REQUEST['image'])); 
                if($img != false) 
                { 
                   imagejpeg($img, './public/uploads/ask_questions/'.$file_name); 
                }else{
					json_output(401,array('status' => 401,'message' => 'Error Uploading Image'));
                }
			    
	                $array = [
	                	'user_id'  => $user_id,
	                	'question' => $question,
	                	'img_path' => $file_name
	                ];
	                $response = $this->Api_model->questions($array);
					json_output($response['status'],$response);
	        }
		}
	}

	public function success_stories()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'POST'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		}else{
			$check_auth_client = $this->Api_model->check_auth_client();
			
			if($check_auth_client == true){
				$data = array();
				$j = 0;
				$crop_id = $language = "";
				$crop_id = $_REQUEST['crop_id'];
				$language = $_REQUEST['language'];
				if($crop_id == ""){
					$response = $this->Api_model->GetAllSuccessStories();
				}else{
					$response = $this->Api_model->GetSingleSuccessStories($crop_id);
				}
				if($response != FALSE){
					for ($i=0; $i <count($response['data']) ; $i++) { 
						$data[$j]['id'] = $response['data'][$i]->id;
						$data[$j]['admin_id'] = $response['data'][$i]->admin_id;
						$exp[$j]['success_image'] = explode('~', $response['data'][$i]->success_image);
						$imgarray = array();
						for ($k=0; $k < count($exp[$j]['success_image']); $k++) {
							$imgname = base_url().'public/uploads/cat_image/'.$exp[$j]['success_image'][$k];
							array_push($imgarray, $imgname);
						}
						$data[$j]['success_image'] = $imgarray;
						$data[$j]['crop_id'] = $response['data'][$i]->crop;
						$data[$j]['mobile_no'] = $response['data'][$i]->mobile_no;
						$data[$j]['address'] = $response['data'][$i]->address;
						$data[$j]['pin_code'] = $response['data'][$i]->pin_code;
						if($language == "hindi"){
							$data[$j]['name'] = $response['data'][$i]->name_hi;
							$data[$j]['message'] = $response['data'][$i]->message_hi;
							$data[$j]['city'] = $response['data'][$i]->city_hi;
						}else{
							$data[$j]['name'] = $response['data'][$i]->name;
							$data[$j]['message'] = $response['data'][$i]->message;
							$data[$j]['city'] = $response['data'][$i]->city;
						}
						$data[$j]['created_at'] = $response['data'][$i]->created_at;
						$j++;
					}
					$response['data'] = $data;
					json_output($response['status'],$response);
				}else{
					json_output(404,array('status' => 404,'message' => 'No data found'));
				}
			}
		}
	}
	
	public function news()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'POST'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		}else{
			$check_auth_client = $this->Api_model->check_auth_client();
			
			if($check_auth_client == true){
				$data = array();
				$j = 0;
				$language = $_REQUEST['language'];
				$response = $this->Api_model->GetAllNews();
				if($response != FALSE){
					for ($i=0; $i <count($response['data']) ; $i++) { 
						$data[$j]['id'] = $response['data'][$i]->id;
						$data[$j]['admin_id'] = $response['data'][$i]->admin_id;
						$data[$j]['news_image'] = base_url().'public/uploads/cat_image/'.$response['data'][$i]->news_image;
						$data[$j]['date'] = $response['data'][$i]->date;
						if($language == "hindi"){
							$data[$j]['news_title'] = $response['data'][$i]->news_title_hi;
							$data[$j]['details'] = $response['data'][$i]->details_hi;
						}else{
							$data[$j]['news_title'] = $response['data'][$i]->news_title;
							$data[$j]['details'] = $response['data'][$i]->details;
						}
						$j++;
					}
					$response['data'] = $data;
					json_output($response['status'],$response);
				}else{
					json_output(404,array('status' => 404,'message' => 'No data found'));
				}
			}
		}
	}

	public function categories()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'POST'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		}else{
			$check_auth_client = $this->Api_model->check_auth_client();
			
			if($check_auth_client == true){
				$data = array();
				$j = 0;
				$language = $_REQUEST['language'];
				$response = $this->Api_model->GetAllCategories();
				if($response != FALSE){
					for ($i=0; $i <count($response['data']) ; $i++) { 
						$data[$j]['id'] = $response['data'][$i]->id;						
						$data[$j]['img_path'] = base_url().'public/uploads/cat_image/'.$response['data'][$i]->img_path;
						if($language == "hindi")
						{
							$data[$j]['category_name'] = $response['data'][$i]->hi_category_name;
						}else{
							$data[$j]['category_name'] = $response['data'][$i]->name;
						}
						$j++;
					}
					$response['data'] = $data;
					json_output($response['status'],$response);
				}else{
					json_output(404,array('status' => 404,'message' => 'No data found'));
				}
			}
		}
	}

	public function products()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'POST'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		}else{
			$check_auth_client = $this->Api_model->check_auth_client();
			
			if($check_auth_client == true){
				$data = array();
				$j = 0;
				$cat_id = $_REQUEST['category_id'];
				$language = $_REQUEST['language'];
				$response = $this->Api_model->GetAllProductsByCategory($cat_id);
				// var_dump();die();
				if($response != FALSE){
					for ($i=0; $i <count($response['data']) ; $i++) { 
						$data[$j]['id'] = $response['data'][$i]->id;
						$data[$j]['category_id'] = $response['data'][$i]->category_id;	
						$data[$j]['image'] = base_url().'public/uploads/cat_image/'.$response['data'][$i]->image;
						$data[$j]['cultivation_manual'] = base_url().'public/uploads/cat_image/'.$response['data'][$i]->cultivation_manual;
						if($language == "hindi"){
							$data[$j]['name'] = $response['data'][$i]->product_name_hi;
						}else{
							$data[$j]['name'] = $response['data'][$i]->name;
						}						
						$j++;
					}
					$response['data'] = $data;
					json_output($response['status'],$response);
				}else{
					json_output(404,array('status' => 404,'message' => 'No data found'));
				}
			}
		}
	}

	public function products_varieties()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'POST'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		}else{
			$check_auth_client = $this->Api_model->check_auth_client();
			
			if($check_auth_client == true){
				$data = array();
				$j = 0;
				$product_id = $_REQUEST['product_id'];
				$language = $_REQUEST['language'];
				$response = $this->Api_model->GetAllVArietiesByProduct($product_id);
				if($response != FALSE){
					for ($i=0; $i <count($response['data']) ; $i++) { 
						$data[$j]['id'] = $response['data'][$i]->id;	
						$data[$j]['name'] =  $response['data'][$i]->variety_name;
						$data[$j]['image'] = base_url().'public/uploads/cat_image/'.$response['data'][$i]->variety_image;
						if($language == "hindi"){
							$data[$j]['variety_details'] = $response['data'][$i]->variety_details_hi;
						}else{
							$data[$j]['variety_details'] = $response['data'][$i]->variety_details;
						}

						$j++;
					}
					$response['data'] = $data;
					json_output($response['status'],$response);
				}else{
					json_output(404,array('status' => 404,'message' => 'No data found'));
				}
			}
		}
	}

	public function product_search()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'POST'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
			$search_key = $_REQUEST['search_key'];
			$check_auth_client = $this->Api_model->check_auth_client();
			if($check_auth_client == true){
				$language = $_REQUEST['language'];
				$response = $this->Api_model->Search_products($search_key,$language);
				$data = array();
				$j = 0;
				if($response != FALSE ){

					for ($i=0; $i <count($response['data']) ; $i++) { 
							$data[$j]['id'] = $response['data'][$i]->id;
							$data[$j]['category_id'] = $response['data'][$i]->category_id;	
							$data[$j]['image'] = base_url().'public/uploads/cat_image/'.$response['data'][$i]->image;
							$data[$j]['cultivation_manual'] = base_url().'public/uploads/cat_image/'.$response['data'][$i]->cultivation_manual;
							if($language == "hindi"){
								$data[$j]['name'] = $response['data'][$i]->product_name_hi;
							}else{
								$data[$j]['name'] = $response['data'][$i]->name;
							}						
							$j++;
						}
					$response['data'] = $data;
					json_output($response['status'],$response);
				}else{
					json_output(404,array('status' => 404,'message' => 'No data found'));
				}
			}
		}
	}

	public function technical_support()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'POST'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
			$check_auth_client = $this->Api_model->check_auth_client();
			if($check_auth_client == true){
				$response = $this->Api_model->GetAllTechNumbers();
				$data = array();
				$j = 0;
				if($response != FALSE ){
					for ($i=0; $i <count($response['data']) ; $i++) { 
							$data[$j]['id'] = $response['data'][$i]->id;
							$data[$j]['sms_no'] = $response['data'][$i]->sms_no;
							$data[$j]['whatsapp_no'] = $response['data'][$i]->whatsapp_no;
							$j++;
						}
					$response['data'] = $data;
					json_output($response['status'],$response);
				}else{
					json_output(404,array('status' => 404,'message' => 'No data found'));
				}

			}
		}
	}
    
}