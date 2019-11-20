<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class NewsController extends MY_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model('news/News_model');
        $admin_id = $this->session->userdata('session_login');
        if($admin_id['logged_in'] != true){
            redirect(base_url());
        }
    }	

    public function index()
    {
        $admin_id = $this->session->userdata('session_login');
        $data['title'] = 'All News List';
        $data['content'] = 'news/all_news_list';
        $data['allnews'] = $this->News_model->GetAllNews($admin_id['admin_id']);
        $this->load->view($this->layout, $data);
    }

    public function add_news()
    {
        $data['title'] = 'Add News';
        $data['content'] = 'news/add_news';
        $this->load->view($this->layout, $data);
    }

    public function store_news()
    {
        if($this->form_validation->run('news_rules') == TRUE)
        {
            $admin_id = $this->session->userdata('session_login');
            $data = [
                'admin_id'      =>  $admin_id['admin_id'],
                'news_title'    =>  $this->input->post('news_title'),
                'news_title_hi'    =>  $this->input->post('news_title_hindi'),
                'date'          =>  $this->input->post('news_date'),
                'news_image'    =>  $this->input->post('nimage'),
                'details'       =>  $this->input->post('editor1'),
                'details_hi'       =>  $this->input->post('editor2'),
                'status'        =>      1
            ];

            $savedata = $this->News_model->add_news($data);
            // var_dump($savedata);die();
            if($savedata == true)
            {
                $this->session->set_flashdata('success','News Saved Successfully');
                redirect(base_url()."all_news_list");
            }else{
               $this->session->set_flashdata('wrong', 'something went wrong');
                redirect(base_url()."add_news");
            }
        }else{
            $data = array(
                'news_title'  => form_error('news_title'),
                'news_title_hindi' => form_error('news_title_hindi'),
                'date'      => form_error('news_date'),
                'nimage'     => form_error('nimage'),
                'editor1' => form_error('editor1'),
                'editor2' => form_error('editor2'),
            );

           
            $this->session->set_flashdata('errors', $data);
            $this->session->set_flashdata('formvalues', $this->input->post());
            redirect(base_url()."add_news");
        }
    }

    public function edit_news()
    {
        $news_id = $this->uri->segment(2); 
        $data['title'] = 'Edit News';
        $data['content'] = 'news/edit_news';
        $data['singlenews'] = $this->News_model->GetSingleNews($news_id);
        // echo "<pre>";
        // var_dump($data['singlenews']);die();
        $this->load->view($this->layout, $data);
    }

    public function update_news()
    {
        $news_id = $this->input->post('news_id');
        if($this->form_validation->run('news_rules') == TRUE)
        {
            $admin_id = $this->session->userdata('session_login');
            $data = [
                'news_title'    =>  $this->input->post('news_title'),
                'news_title_hi'    =>  $this->input->post('news_title_hindi'),
                'date'          =>  $this->input->post('news_date'),
                'news_image'    =>  $this->input->post('nimage'),
                'details'       =>  $this->input->post('editor1'),
                'details_hi'       =>  $this->input->post('editor2'),
                'updated_at' => date('Y-m-d h:i:s')
            ];

            $savedata = $this->News_model->update_news($data,$news_id);
            // var_dump($savedata);die();
            if($savedata == true)
            {
                $this->session->set_flashdata('success','News Updated Successfully');
                redirect(base_url()."all_news_list");
            }else{
               $this->session->set_flashdata('wrong', 'something went wrong');
                redirect(base_url()."edit_news/".$news_id);
            }
        }else{
            $data = array(
                'news_title'  => form_error('news_title'),
                'news_title_hindi' => form_error('news_title_hindi'),
                'date'      => form_error('news_date'),
                'nimage'     => form_error('nimage'),
                'editor1' => form_error('editor1'),
                'editor2' => form_error('editor2'),
            );
            $this->session->set_flashdata('errors', $data);
            redirect(base_url()."edit_news/".$news_id);
        }
    }

}

?>