<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_model extends CI_Model {

    var $client_service = "frontend-client";
    var $auth_key       = "bioseedsapi";
    public function check_auth_client(){
        $client_service = $this->input->get_request_header('Client-Service', TRUE);
        $auth_key  = $this->input->get_request_header('Auth-Key', TRUE);
        if($client_service == $this->client_service && $auth_key == $this->auth_key){
            return true;
        } else {
            return json_output(401,array('status' => 401,'message' => 'Unauthorized.'));
        }
    }

    public function register($data)
    {
        $query = $this->db->insert('users', $data);
        $data['user_id'] = $this->db->insert_id();
        if($query){
            return array('status' => 200,'data' => $data);
        }else{
            return FALSE;
        }
    }

    public function update_user_profile($data,$users_id)
    {
        $query = $this->db->update('users', $data, array('id' => $users_id));

        if($query){
            return array('status' => 200,'data' => $data);
        }else{
            return FALSE;
        }
    }

    public function login($mobile_no,$password)
    {
        $q  = $this->db->select('id')->from('users')->where('mobile_no',$mobile_no)->where('password',sha1($password))->get()->row();
        if($q == "")
        {
            return array('status' => 401,'message' => 'Invalid Credentials');
        } else {

               $id         = $q->id;
               $last_login = date('Y-m-d H:i:s');
               $expired_at = date("Y-m-d H:i:s", strtotime('+1 years'));
               $token      = crypt(substr( md5(rand()), 0, 7));
               $this->db->trans_start();
               $this->db->where('id',$id)->update('users',array('last_login' => $last_login));
               $this->db->insert('users_authentication',array('users_id' => $id,'token' => $token,'expired_at' => $expired_at));

               if ($this->db->trans_status() === FALSE){
                  $this->db->trans_rollback();
                  return array('status' => 500,'message' => 'Internal server error.');
               } else {
                  $this->db->trans_commit();
                  return array('status' => 200,'message' => 'Successfully login.','id' => $id, 'token' => $token);
               }
           }
    }
    
    public function logout()
    {
        $users_id  = $this->input->get_request_header('User-ID', TRUE);
        $token     = $this->input->get_request_header('Authorization', TRUE);
        $this->db->where('users_id',$users_id)->where('token',$token)->delete('users_authentication');
        return array('status' => 200,'message' => 'Successfully logout.');
    }

    public function auth()
    {
        $users_id  = $this->input->get_request_header('User-ID', TRUE);
        $token     = $this->input->get_request_header('Authorization', TRUE);
        $q  = $this->db->select('expired_at')->from('users_authentication')->where('users_id',$users_id)->where('token',$token)->get()->row();
        if($q == ""){
            return json_output(401,array('status' => 401,'message' => 'Unauthorized.'));
        } else {
            if($q->expired_at < date('Y-m-d H:i:s')){
                return json_output(401,array('status' => 401,'message' => 'Your session has been expired.'));
            } else {
                $updated_at = date('Y-m-d H:i:s');
                $expired_at = date("Y-m-d H:i:s", strtotime('+1 years'));
                $this->db->where('users_id',$users_id)->where('token',$token)->update('users_authentication',array('expired_at' => $expired_at,'updated_at' => $updated_at));
                return array('status' => 200,'message' => 'Authorized.');
            }
        }
    }

    public function customer_enquiry($data)
    {
        $query = $this->db->insert('enquiry', $data);
        if($query){
            return array('status' => 200,'message' => 'Enquiry Submitted Successfully.');
        }else{
            return FALSE;
        }
    }

    public function verifymobileno($mobileno,$table)
    {
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where("mobile_no",$mobileno);
        $query = $this->db->get();
        // var_dump($query->num_rows());die();
        if($query->num_rows() == 1) 
        { 
            return true;
        }
        else{
            return false;
        }
    }

    public function questions($data)
    {
        $query = $this->db->insert('ask_questions', $data);
        if($query){
            return array('status' => 200,'message' => 'Successfully Submitted.');
        }else{
            return FALSE;
        }
    }

    public function GetAllSuccessStories()
    {
        $query = $this->db->get('success_stories')->result();
        if($query){
            return array('status' => 200,'data' => $query);
        }else{
            return FALSE;
        } 
    }

    public function GetSingleSuccessStories($crop_id)
    {
        $query = $this->db->where('crop',$crop_id)->get('success_stories')->result();
        if($query){
            return array('status' => 200,'data' => $query);
        }else{
            return FALSE;
        } 
    }

    public function GetAllNews()
    {
        $query = $this->db->get('news')->result();
        if($query){
            return array('status' => 200,'data' => $query);
        }else{
            return FALSE;
        } 
    }

    public function GetAllCategories()
    {
        $query = $this->db->get('category')->result();
        // var_dump(count($query));die();
        if($query){
            return array('status' => 200,'data' => $query);
        }else{
            return FALSE;
        } 
    }

    public function GetAllProductsByCategory($category_id)
    {
        $this->db->select('id, category_id, name,image,cultivation_manual,product_name_hi');
        $this->db->where('category_id',$category_id);
        $query = $this->db->get('products')->result();
        // var_dump($query);die();
        if($query){
            return array('status' => 200,'data' => $query);
        }else{
            return FALSE;
        } 
    }

    public function GetAllVArietiesByProduct($product_id)
    {
        $this->db->select('*');
        $this->db->where('product_id',$product_id);
        $query = $this->db->get('product_varieties')->result();
        
         if($query){
            return array('status' => 200,'data' => $query);
        }else{
            return FALSE;
        } 

    }

    public function Search_products($search_key,$lang)
    {
        if($lang == "hindi")
        {
            $this->db->like('product_name_hi',$search_key);
        }else{
            $this->db->like('name',$search_key);
        }
        $query = $this->db->get('products')->result();
        if($query){
            return array('status' => 200,'data' => $query);
        }else{
            return FALSE;
        } 
    }

    public function GetAllTechNumbers()
    {
        $query = $this->db->get('tech_support')->result();
        if($query){
            return array('status' => 200,'data' => $query);
        }else{
            return FALSE;
        } 
    }

}

