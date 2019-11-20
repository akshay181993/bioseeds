<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class CategoriesController extends MY_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('category/Category');
        $admin_id = $this->session->userdata('session_login');
        if($admin_id['logged_in'] != true){
            redirect(base_url());
        }
    }

    public function index()
    {
        $data['title'] = 'Categories';
        $data['content'] = 'category/categories';
        $data['allcategories'] = $this->Category->GetAllcategories();
        $this->load->view($this->layout, $data);
    }

    public function add_category()
    {
        if($this->form_validation->run('category_rules') == TRUE)
        {
            $admin_id = $this->session->userdata('session_login');
            // var_dump($admin_id);die();
            $data = [
                'admin_id'  => $admin_id['admin_id'],
                'name'      => $this->input->post('category_name'),
                'hi_category_name' => $this->input->post('category_name_hindi'),
                'img_path'  => $this->input->post('image'),
                'status'    => 1
            ];

            $savedata = $this->Category->add_categorydata($data);
            // var_dump($savedata);die();
            if($savedata == true)
            {
                echo json_encode('success');
            }else{
               $data = [
                    'error' => 'Somethimg Went wrong'
               ];
                echo json_encode($data);
            }
        }else{
            $data = array(
                'category_name' => form_error('category_name'),
                'image' => form_error('image'),
                'category_name_hindi' => form_error('category_name_hindi')
            );
            echo json_encode($data);
        }
    }

    public function show_category()
    {
        $category_id = $this->uri->segment(2);
        $data = $this->Category->GetSingleCategory($category_id);
        echo json_encode($data);
    }

    public function update_category()
    {
        $this->form_validation->set_rules('editimage', 'Category Image', 'trim|required');
        $this->form_validation->set_rules('editcategory_name', 'Category Name', 'trim|required');
        $this->form_validation->set_rules('editcategory_name_hindi', 'श्रेणी नाम', 'trim|required');

        if($this->form_validation->run() == TRUE)
        {
            $admin_id = $this->session->userdata('session_login');
            $id = $this->input->post('editcategory_id');
            $data = [
                'admin_id'  => $admin_id['admin_id'],
                'name'      => $this->input->post('editcategory_name'),
                'img_path'  => $this->input->post('editimage'),
                'hi_category_name' => $this->input->post('editcategory_name_hindi'),
                'updated_at'  => date('Y-m-d H:i:s') 
            ];

            $savedata = $this->Category->update_categorydata($data,$id);
            if($savedata == true)
            {
                echo json_encode('success');
            }else{
               $data = [
                    'error' => 'Somethimg Went wrong'
               ];
                echo json_encode($data);
            }
        }else{
            $data = array(
                'editcategory_name' => form_error('editcategory_name'),
                'editcategory_name_hindi' => form_error('editcategory_name_hindi'),
                'image' => form_error('editimage')
            );
            echo json_encode($data);
        }
    }

}   
?>