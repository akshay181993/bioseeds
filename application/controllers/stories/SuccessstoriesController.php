<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class SuccessstoriesController extends MY_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model('stories/Stories_model');
        $admin_id = $this->session->userdata('session_login');
        if($admin_id['logged_in'] != true){
            redirect(base_url());
        }
    }	

    public function index()
    {
        $data['title'] = 'All Success Stories';
        $data['content'] = 'stories/success_stories';
        $data['allstories'] = $this->Stories_model->GetAllStories();
        $this->load->view($this->layout, $data);
    }

    public function add_story()
    {
        $data['title'] = 'Add Success Story';
        $data['content'] = 'stories/add_story';
        $data['allproducts'] = $this->Stories_model->GetAllProductsName();
        $this->load->view($this->layout, $data);
    }

    public function save_stories()
    {
        if($this->form_validation->run('success_stories_rules') == TRUE)
        {
            // var_dump($this->input->post('crop'));die();
            $simage = $this->input->post('simage');
            $implod_img = implode("~", $simage);
            $admin_id = $this->session->userdata('session_login');
            $data = [
                'name'      => $this->input->post('person_name'),
                'name_hi'   => $this->input->post('person_name_hindi'),
                'admin_id'  =>  $admin_id['admin_id'],
                'crop'      => $this->input->post('crop'),
                'success_date' => date("Y-m-d",strtotime($this->input->post('success_date'))),
                'mobile_no' => $this->input->post('mobile_no'),
                'address'   => $this->input->post('address'),
                'city'      => $this->input->post('city'),
                'city_hi'       => $this->input->post('city_hindi'),
                'pin_code'      => $this->input->post('pin_code'),
                'success_image' => $implod_img,
                'message' => $this->input->post('editor1'),
                'message_hi' => $this->input->post('editor2'),
                'status'    => 1
            ];
         
            $savedata = $this->Stories_model->add_success_story($data);
           
            if($savedata == true)
            {
                $this->session->set_flashdata('success','Success Story Saved Successfully');
                redirect(base_url()."success_stories");
            }else{
               $this->session->set_flashdata('wrong', 'something went wrong');
                redirect(base_url()."add_story");
            }
        }else{
            $data = array(
                'name'       => form_error('person_name'),
                'name_hindi' => form_error('person_name_hindi'),
                'crop'       => form_error('crop'),
                'success_date' => form_error('success_date'),
                'mobile_no'  => form_error('mobile_no'),
                'address'    => form_error('address'),
                'city'       => form_error('city'),
                'city_hindi' => form_error('city_hindi'),
                'pin_code'   => form_error('pin_code'),
                'editor1'    => form_error('editor1'),
                'editor2'    => form_error('editor2'),
                'simage[]'   => form_error('simage[]')
            );
            
            $this->session->set_flashdata('errors', $data);
            $this->session->set_flashdata('formvalues', $this->input->post());
            redirect(base_url()."add_story");
        }
    }


    public function edit_story()
    {
        $sid = $this->uri->segment(2);
        $data['title'] = 'Edit Success Story';
        $data['content'] = 'stories/edit_story';
        $data['stories'] = $this->Stories_model->GetSingleStory($sid);
        $data['allproducts'] = $this->Stories_model->GetAllProductsName();
        $this->load->view($this->layout, $data);
    }

    public function update_story()
    {
        $sid = $this->input->post('s_id');
        if($this->form_validation->run('success_stories_rules') == TRUE)
        {            
            $simage = $this->input->post('simage');
            $implod_img = implode("~", $simage);
            $data = [
                'name'  => $this->input->post('person_name'),
                'name_hi'  => $this->input->post('person_name_hindi'),
                'crop'      => $this->input->post('crop'),
                'success_date' => date("Y-m-d",strtotime($this->input->post('success_date'))),
                'mobile_no'     => $this->input->post('mobile_no'),
                'address'     => $this->input->post('address'),
                'city'     => $this->input->post('city'),
                'city_hi'     => $this->input->post('city_hindi'),
                'pin_code'      => $this->input->post('pin_code'),
                'success_image' => $implod_img,
                'message' => $this->input->post('editor1'),
                'message_hi' => $this->input->post('editor2'),
                'updated_at' => date('Y-m-d h:i:s'),
            ];

            $savedata = $this->Stories_model->update_success_story($data,$sid);
            if($savedata == true)
            {
                $this->session->set_flashdata('success','Success Story Updated Successfully');
                redirect(base_url()."success_stories");
            }else{
               $this->session->set_flashdata('wrong', 'something went wrong');
                redirect(base_url()."edit_story/".$sid);
            }
        }else{
            $data = array(
                'name'      => form_error('person_name'),
                'name_hindi'      => form_error('person_name_hindi'),
                'crop'     => form_error('crop'),
                'success_date' => form_error('success_date'),
                'mobile_no' => form_error('mobile_no'),
                'address'   => form_error('address'),
                'city'      => form_error('city'),
                'city_hindi'=> form_error('city_hindi'),
                'pin_code'  => form_error('pin_code'),
                'editor1'   => form_error('editor1'),
                'editor2'   => form_error('editor2'),
                'simage[]'  => form_error('simage[]')
            );
            $this->session->set_flashdata('errors', $data);
            redirect(base_url()."edit_story/".$sid);
        }
    }
}

?>