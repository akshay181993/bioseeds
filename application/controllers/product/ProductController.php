<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductController extends MY_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model('product/Product_model');
        $admin_id = $this->session->userdata('session_login');
        if($admin_id['logged_in'] != true){
            redirect(base_url());
        }
    }	

    public function index()
    {
        $admin_id = $this->session->userdata('session_login');
        $data['title'] = 'Product Details';
        $data['content'] = 'product/product_details';
        $data['allproducts'] = $this->Product_model->GetAllProducts($admin_id['admin_id']);
        $this->load->view($this->layout, $data);
    }

    public function add_product()
    {
        $data['title'] = 'Add Product';
        $data['content'] = 'product/add_product';
        $data['allcategory'] = $this->Product_model->GetAllCategoryName();
        $this->load->view($this->layout, $data);
    }

    public function StoreProduct()
    {
        if($this->form_validation->run('products_rules') == TRUE)
        {
            $admin_id = $this->session->userdata('session_login');
           
            $data = [
                'category_id'           => $this->input->post('category'),
                'admin_id'              => $admin_id['admin_id'],
                'name'                  => $this->input->post('product_name'),
                'product_name_hi'       => $this->input->post('product_name_hindi'),
                'image'                 => $this->input->post('pimage'),
                'cultivation_manual'    => $this->input->post('cultivation_manual1'),
                // 'cultivation_manual_hi' => $this->input->post('cultivation_manual_hindi'),
                // 'product_details'       => strip_tags($this->input->post('editor1')),
                // 'product_details_hi'    => strip_tags($this->input->post('editor2')),
                'status'                => 1
            ];

            $savedata = $this->Product_model->store_product($data);
            // var_dump($savedata);die();
            if($savedata == true)
            {
                $this->session->set_flashdata('success','Product Saved Successfully');
                redirect(base_url()."product_details");
            }else{
               $this->session->set_flashdata('wrong', 'something went wrong');
                redirect(base_url()."add_product");
            }
        }else{
            $data = array(
                'category_id'           => form_error('category'),
                'product_name'          => form_error('product_name'),
                'product_name_hindi'    => form_error('product_name_hindi'),
                'pimage'                => form_error('pimage'),
                'cultivation_manual'    => form_error('cultivation_manual1'),
                // 'cultivation_manual_hindi' => form_error('cultivation_manual_hindi'),
                // 'editor1'               => form_error('editor1'),
                // 'editor2'               => form_error('editor2'),
            );
            $this->session->set_flashdata('errors', $data);
            $this->session->set_flashdata('formvalues', $this->input->post());
            redirect(base_url()."add_product");
        }
    }

    public function edit_product()
    {
        $pid = $this->uri->segment(2);
        $data['title'] = 'Edit Product';
        $data['content'] = 'product/edit_product';
        $data['products'] = $this->Product_model->GetSingleProduct($pid);
        $data['allcategory'] = $this->Product_model->GetAllCategoryName();
        $this->load->view($this->layout, $data);
    }

    public function update_product()
    {
        $pid = $this->input->post('id');

        if($this->form_validation->run('products_rules') == TRUE)
        {
            $data = [
                'category_id'  => $this->input->post('category'),
                'name'      => $this->input->post('product_name'),
                'product_name_hi'      => $this->input->post('product_name_hindi'),
                'image'     => $this->input->post('pimage'),
                'cultivation_manual' => $this->input->post('cultivation_manual1'),
                // 'cultivation_manual_hi' => $this->input->post('cultivation_manual_hindi'),
                // 'product_details' => strip_tags($this->input->post('editor1')),
                // 'product_details_hi' => strip_tags($this->input->post('editor2')),
                'updated_at' => date('Y-m-d h:i:s')
            ];

            $savedata = $this->Product_model->updateproduct($data,$pid);            
            if($savedata == true)
            {
                $this->session->set_flashdata('success','Product Updated Successfully');
                redirect(base_url()."product_details");
            }else{
               $this->session->set_flashdata('wrong', 'something went wrong');
                redirect(base_url()."edit_product/".$pid);
            }
        }else{
           $data = array(
                'category_id'             => form_error('category'),
                'product_name'            => form_error('product_name'),
                'product_name_hindi'      => form_error('product_name_hindi'),
                'pimage'                  => form_error('pimage'),
                'cultivation_manual'      => form_error('cultivation_manual1'),
                // 'cultivation_manual_hindi'=> form_error('cultivation_manual_hindi'),
                // 'editor1' => form_error('editor1'),
                // 'editor2' => form_error('editor2'),
            );
            $this->session->set_flashdata('errors', $data);
            redirect(base_url()."edit_product/".$pid);
        }
    }

    public function show_varieties()
    {
        $data['title'] = 'All Variety';
        $data['content'] = 'product/product_varieties';
        $data['allvarieties'] = $this->Product_model->GetAllVarieties();
        $this->load->view($this->layout, $data);
    }

    public function add_variety()
    {
        $data['title'] = 'Add Variety';
        $data['content'] = 'product/add_variety';
        $data['allproducts'] = $this->Product_model->GetAllProductsName();
        $this->load->view($this->layout, $data);
    }

    public function store_variety()
    {
         if($this->form_validation->run('variety_rules') == TRUE)
        {
            $implod_variety = "";
            $admin_id = $this->session->userdata('session_login');
            $data = [
                'product_id'            => $this->input->post('product'),
                'admin_id'              => $admin_id['admin_id'],
                'variety_name'          => $this->input->post('product_variety'),
                'variety_image'         => $this->input->post('vimage'),                
                'variety_details'       => strip_tags($this->input->post('editor1')),
                'variety_details_hi'    => strip_tags($this->input->post('editor2')),
                'status'                => 1
            ];

            $savedata = $this->Product_model->store_variety($data);
            // var_dump($savedata);die();
            if($savedata == true)
            {
                $this->session->set_flashdata('success','Variety Saved Successfully');
                redirect(base_url()."product_varieties");
            }else{
               $this->session->set_flashdata('wrong', 'something went wrong');
                redirect(base_url()."add_variety");
            }
        }else{
            $data = array(
                'product_id'            => form_error('product'),
                'product_variety'       => form_error('product_variety'),
                'vimage'                => form_error('vimage'),
                'editor1'               => form_error('editor1'),
                'editor2'               => form_error('editor2'),
            );
            $this->session->set_flashdata('errors', $data);
            $this->session->set_flashdata('formvalues', $this->input->post());
            redirect(base_url()."add_variety");
        }
    }

    public function edit_variety()
    {
        $vid = $this->uri->segment(2);
        $data['title'] = 'Edit Variety';
        $data['content'] = 'product/edit_variety';
        $data['allproducts'] = $this->Product_model->GetAllProductsName();
        $data['variety'] = $this->Product_model->GetSingleVariety($vid);
        $this->load->view($this->layout, $data);
    }

     public function update_variety()
    {
        $vid = $this->input->post('id');

        if($this->form_validation->run('variety_rules') == TRUE)
        {
            $implod_variety = "";
            $admin_id = $this->session->userdata('session_login');
            $data = [
                'product_id'            => $this->input->post('product'),
                'admin_id'              => $admin_id['admin_id'],
                'variety_name'          => $this->input->post('product_variety'),
                'variety_image'         => $this->input->post('vimage'),                
                'variety_details'       => strip_tags($this->input->post('editor1')),
                'variety_details_hi'    => strip_tags($this->input->post('editor2')),
                'status'                => 1
            ];

            $savedata = $this->Product_model->update_pvariety($data,$vid);
            // var_dump($savedata);die();
            if($savedata == true)
            {
                $this->session->set_flashdata('success','Variety Updated Successfully');
                redirect(base_url()."product_varieties");
            }else{
               $this->session->set_flashdata('wrong', 'something went wrong');
                redirect(base_url()."edit_variety/".$vid);
            }
        }else{
            $data = array(
                'product_id'            => form_error('product'),
                'product_variety'     => form_error('product_variety'),
                'vimage'              => form_error('vimage'),
                'editor1'               => form_error('editor1'),
                'editor2'               => form_error('editor2'),
            );
            $this->session->set_flashdata('errors', $data);
            $this->session->set_flashdata('formvalues', $this->input->post());
            redirect(base_url()."edit_variety/".$vid);
        }
    }
}

?>