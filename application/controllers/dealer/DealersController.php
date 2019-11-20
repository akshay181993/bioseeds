<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class DealersController extends MY_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model('dealers/Dealers_model');
        $admin_id = $this->session->userdata('session_login');
        if($admin_id['logged_in'] != true){
            redirect(base_url());
        }
    }

    public function add_dealer()
    {
    	$data['title'] = 'Add New Dealer';
        $data['content'] = 'dealers/add_dealer';
        $this->load->view($this->layout, $data);
    }

    public function SaveDealers()
    {
        if($this->form_validation->run('add_dealer') == TRUE)
        {
            $admin_id = $this->session->userdata('session_login');
            $data = [
                'name'      =>  $this->input->post('name'),
                'admin_id'  =>  $admin_id['admin_id'],
                'email'     =>  $this->input->post('email'),
                'mobile_no' =>  $this->input->post('mobile_no'),
                'address'   =>  $this->input->post('address'),
                'city'      =>  $this->input->post('city'),
                'pin_code'  =>  $this->input->post('pin_code'),
                'status'    =>  1
            ];
         
            $savedata = $this->Dealers_model->add_dealer($data);
           
            if($savedata == true)
            {
                $this->session->set_flashdata('success','Data saved Successfully');
                redirect(base_url()."dashboard");
            }else{
               $this->session->set_flashdata('wrong', 'something went wrong');
                redirect(base_url()."add_story");
            }
        }else{
            $data = array(
                'name'      => form_error('name'),
                'email'     => form_error('email'),
                'mobile_no' => form_error('mobile_no'),
                'address'   => form_error('address'),
                'city'      => form_error('city'),
                'pin_code'  => form_error('pin_code'),
                'simage'    => form_error('simage[]'), 
                'editor1'   => form_error('editor1'),
            );
            $this->session->set_flashdata('errors', $data);
            $this->session->set_flashdata('fromvalues', $this->input->post());
            redirect(base_url()."add");
        }
    }

    public function edit_dealer()
    {
        $sid = $this->uri->segment(2);
        $data['title'] = 'Edit New Dealer';
        $data['content'] = 'dealers/edit_dealer';
        $data['dealers'] = $this->Dealers_model->GetSingleDealer($sid);
        $this->load->view($this->layout, $data);
    }

    public function update_dealer()
    {
        $d_id = $this->input->post('d_id');
       
        if($this->form_validation->run('add_dealer') == TRUE)
        {
            
            $data = [
                'name'      =>  $this->input->post('name'),
                'email'     =>  $this->input->post('email'),
                'mobile_no' =>  $this->input->post('mobile_no'),
                'address'   =>  $this->input->post('address'),
                'city'      =>  $this->input->post('city'),
                'pin_code'  =>  $this->input->post('pin_code'),
                'updated_at' => date('Y-m-d h:i:s'),
            ];
         
            $savedata = $this->Dealers_model->update_dealer($data,$d_id);
           
            if($savedata == true)
            {
                $this->session->set_flashdata('success','Data Updated Successfully');
                redirect(base_url()."dashboard");
            }else{
               $this->session->set_flashdata('wrong', 'something went wrong');
                redirect(base_url()."edit_dealer/".$d_id);
            }
        }else{
            $data = array(
                'name'      => form_error('name'),
                'email'     => form_error('email'),
                'mobile_no' => form_error('mobile_no'),
                'address'   => form_error('address'),
                'city'      => form_error('city'),
                'pin_code'  => form_error('pin_code'),
                'simage'    => form_error('simage[]'), 
                'editor1'   => form_error('editor1'),
            );
            $this->session->set_flashdata('errors', $data);
            redirect(base_url()."edit_dealer/".$d_id);
        }
    }
}



?>	