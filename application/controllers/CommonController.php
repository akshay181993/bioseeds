<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class CommonController extends MY_Controller {
    
	public function __construct() {
        parent::__construct();
        $this->load->model('Common_model');
        $this->load->library('upload');
        $admin_id = $this->session->userdata('session_login');
        if($admin_id['logged_in'] != true){
            redirect(base_url());
        }
    }

    public function do_upload()
        {
               
            $config['upload_path']    = './public/uploads/cat_image';
            $config['allowed_types']  = 'gif|jpg|png|jpeg|txt|doc|docx|pdf';
            $config['encrypt_name']      =  true;   
            $this->upload->initialize($config);

            $file = $this->input->post("file");

            if ( ! $this->upload->do_upload('file'))
            {
                $error = array('error' => $this->upload->display_errors());
                echo json_encode($error);
            }
            else
            {
                $data =  $this->upload->data();
                echo json_encode($data['file_name']);
            }
        }

    public function AllDelete()
    {
        $sid = $this->uri->segment(2);
        $name = $this->uri->segment(3);   
        $imgname = $this->input->post('imgpath'); 
        $data = $this->Common_model->all_delete($sid,$name,$imgname);
        if($data == true){
            echo json_encode('success');
        }else{
            echo json_encode('error');
        }
    }

    public function ChangeAllStatus()
    {
        $story_id = $this->uri->segment(2);
        $model = $this->uri->segment(3);
        $name = $this->input->post('name');
        $data = $this->Common_model->all_status($story_id,$name,$model);
        if($data == true){
            echo json_encode('success');
        }else{
            echo json_encode('error');
        }
    }

    public function show_techsupport()
    {       
        $data['title'] = 'Add Tech Support';
        $data['content'] = 'admin/add_techsupport';
        $this->load->view($this->layout, $data);
    }

    public function SaveNumbers()
    {
           
        $data = [
                'sms_no'      =>  $this->input->post('sms_number'),
                'whatsapp_no'  =>  $this->input->post('whatsapp_no')
            ];
         
            $savedata = $this->Common_model->SaveTechSupportNo($data);
           
            if($savedata == true)
            {
                $this->session->set_flashdata('success','Data saved Successfully');
                redirect(base_url()."tech_support");
            }else{
               $this->session->set_flashdata('success', 'something went wrong');
                redirect(base_url()."add_tech_support");
            }
            $this->session->set_flashdata('fromvalues', $this->input->post());
            redirect(base_url()."add_tech_support");
    }

    public function All_TechSupport()	
    {
        $data['title'] = 'Tech Support';
        $data['content'] = 'admin/tech_support';
        $data['all_numbers'] = $this->Common_model->GetAllNumbers(); 
        $this->load->view($this->layout, $data);
    }

    public function edit_techsupport()
    {
        $id = $this->uri->segment(2); 
        $data['title'] = 'Tech Support';
        $data['content'] = 'admin/edit_techsupport';
        $data['single_number'] = $this->Common_model->GetSingleNumber($id); 
        $this->load->view($this->layout, $data);
    }

    public function UpdateNumbers()
    {
            $id = $this->input->post('id');
            $data = [
                'sms_no'      =>  $this->input->post('sms_number'),
                'whatsapp_no'  =>  $this->input->post('whatsapp_no')
            ];
         
            $savedata = $this->Common_model->UpdateTechSupportNo($data,$id);
           
            if($savedata == true)
            {
                $this->session->set_flashdata('success','Data updated Successfully');
                redirect(base_url()."tech_support");
            }else{
               $this->session->set_flashdata('success', 'something went wrong');
                redirect(base_url()."edit_tech_support");
            }
            $this->session->set_flashdata('fromvalues', $this->input->post());
            redirect(base_url()."edit_tech_support");
    }
}