<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends MY_Controller {
    
	public function __construct() {
        parent::__construct();
        $this->load->model('admin/Admin_model');
    }	

    public function index()
    {
        $admin_id = $this->session->userdata('session_login');
        if($admin_id['logged_in'] != true){
            redirect(base_url());
        }
        $data['title'] = 'Dashboard';
        $data['content'] = 'admin/dashboard';
        $data['productcount'] = $this->Admin_model->GetAllProductsCount();
        $data['alldealers'] = $this->Admin_model->GetAllDealers($admin_id['admin_id']);
        $data['enquiry_count'] = $this->Admin_model->GetEnquiryCount();
        $data['users_count']   = $this->Admin_model->GetUsersCount();
        $this->load->view($this->layout, $data);
    }

    public function adminlogin()
    {
        $this->load->view('admin/login');
    }

    public function chklogin()
    {
        if ($this->form_validation->run('login_rules') == TRUE)
        {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $chkuser = $this->Admin_model->login($email,sha1($password));
            
            if($chkuser != false)
            {
                $sessiondata = array(
                    'name'      => $chkuser[0]["name"],
                    'email'     => $chkuser[0]["email"],
                    'admin_id'  => $chkuser[0]["id"],
                    'logged_in' => true
                );
                $this->session->set_userdata('session_login',$sessiondata);
                redirect(base_url()."dashboard");
            }else{
                $this->session->set_flashdata('invalid', 'Invalid credentials');
                redirect(base_url());
            }
        }
        else
        {
            $this->session->set_flashdata('errors', validation_errors());
            redirect(base_url());
        }
    }
       

    public function change_password()
    {
    	$admin_id = $this->session->userdata('session_login');
        if($admin_id['logged_in'] != true){
            redirect(base_url());
        }
        $data['title'] = 'Change Password';
        $data['content'] = 'admin/change_password';
        $this->load->view($this->layout, $data);
    }

    public function reset_password()
    {
        $admin_id = $this->session->userdata('session_login');
        if($admin_id['logged_in'] != true){
            redirect(base_url());
        }
        if($this->form_validation->run('password_reset_rules') == TRUE)
        {
            $session_data = $this->session->userdata('session_login');
            $data = [
                'old_password' => $this->input->post('old_password')
                ];
            $datareturn = $this->Admin_model->getPassword($data);
            if($datareturn == true)
            {
                $data= [
                     'password' => sha1($this->input->post('new_password')),
                     'updated_at' => date('Y-m-d h:i:s')
                ];
                $this->Admin_model->update($data,$session_data['admin_id']);
                $this->session->set_flashdata('success','Password Changed Successfully');
                redirect(base_url());
            }else{
                $this->session->set_flashdata('errors','Please Enter Correct Password');
                redirect(base_url()."change_password");
            }
        }else{
            $this->session->set_flashdata('formvalues',$this->input->post());
            $this->session->set_flashdata('errors',validation_errors());
            redirect(base_url()."change_password");
        }
    }

    public function profile()
    {
    	$admin_id = $this->session->userdata('session_login');
        if($admin_id['logged_in'] != true){
            redirect(base_url());
        }
        $session_data = $this->session->userdata('session_login');
        $data['title'] = 'Profile';
        $data['content'] = 'admin/profile';
        $data['var'] = $this->Admin_model->profile($session_data['admin_id']);
        $this->load->view($this->layout, $data);
    }
    // for Update profile
    public function Update_Profile()
    {
        $admin_id = $this->session->userdata('session_login');
        // var_dump($admin_id['language']);die();
        if($admin_id['logged_in'] != true){
            redirect(base_url());
        }
        if ($this->form_validation->run('profile_rules') == TRUE)
        {
            $session_login = $this->session->userdata('session_login');
            $password = $this->input->post('password');
            if($password == ""){
                $data = [
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'mobile_no' => $this->input->post('mobile_no'),
                    'city' => $this->input->post('city'),
                    'updated_at' => date('Y-m-d h:i:s' )
                ];
            }else{
                $data = [
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'mobile_no' => $this->input->post('mobile_no'),
                    'city' => $this->input->post('city'),
                    'password' => sha1($this->input->post('password')),
                    'updated_at' => date('Y-m-d h:i:s' )
                ];
            }
            
            $datareturn = $this->Admin_model->update($data,$session_login['admin_id']);

            if($datareturn == true)
            {
                $session_login['name']= $data['name'];
                $this->session->set_userdata('session_login', $session_login);
                $this->session->set_flashdata('updated', 'Profile Updated Successfully');
                redirect(base_url()."dashboard");
            }

        }else{
            $this->profile();
        }

    }

    public function enquiry_list()
    {
        $admin_id = $this->session->userdata('session_login');
        if($admin_id['logged_in'] != true){
            redirect(base_url());
        }
        $data['title'] = 'Enquiry List';    
        $data['content'] = 'admin/enquiry_list';
        $data['all_enquiry'] = $this->Admin_model->GetAllEnquiries();
        $this->load->view($this->layout, $data);
    }

    public function users_list()
    {
        $admin_id = $this->session->userdata('session_login');
        if($admin_id['logged_in'] != true){
            redirect(base_url());
        }
        $data['title'] = 'Users List';    
        $data['content'] = 'admin/users_list';
        $data['all_users'] = $this->Admin_model->GetAllUsers();
        $this->load->view($this->layout, $data);
    }

    public function logout()
    {
        $admin_id = $this->session->userdata('session_login');
        if($admin_id['logged_in'] != true){
            redirect(base_url());
        }
        if($this->session->has_userdata('session_login'))
        {
            $this->session->sess_destroy();
            redirect(base_url());
        }else{
            redirect(base_url());       
        }
    }

    public function new_enquiry()
    {
        $admin_id = $this->session->userdata('session_login');
        if($admin_id['logged_in'] != true){
            redirect(base_url());
        }
        $data = $this->Admin_model->GetNewEnquiries();
        echo json_encode($data);
    }

    public function Change_status_enquiry()
    {
        $admin_id = $this->session->userdata('session_login');
        if($admin_id['logged_in'] != true){
            redirect(base_url());
        }
        // $id = $this->input->post('id');
        $data = $this->Admin_model->UpdateEnquiryStatus();
        echo json_encode($data);
    }

    public function Forgot_Password()
    {
        $this->load->view('admin/forgot_password');
    }

    public function SaveResetPassword()
    {
        if($this->form_validation->run('forgot_password') == TRUE)
        {
            $session_data = $this->session->userdata('session_login');
            $email = $this->input->post('email');
            $datareturn = $this->Admin_model->getEmail($email);
            // var_dump($datareturn[0]['name']);die();
            if($datareturn != false)
            {
                $password = uniqid();
                $data= [
                     'password' => sha1($password),
                     'updated_at' => date('Y-m-d h:i:s')
                ];
                $this->Admin_model->updatePassword($data,$email);
                // $this->send_mail();
                $this->session->set_flashdata('success','Password Sent On mail Successfully');
                redirect(base_url());
            }else{
                $this->session->set_flashdata('errors','Please Enter Correct Email Address');
                redirect(base_url()."forgot_password");
            }
        }else{
            $this->session->set_flashdata('formvalues',$this->input->post());
            $this->session->set_flashdata('errors',validation_errors());
            redirect(base_url()."forgot_password");
        }
    }
}

?>