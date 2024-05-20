<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Portfolios extends Home_Controller {

    public function __construct()
    {
        parent::__construct();
        //check auth
        if (!is_user()) {
            redirect(base_url());
        }
    }

    public function index()
    {
        $data = array();
        $data['page_title'] = 'Portfolio';  
        $data['page'] = 'Portfolio';    
        $data['portfolio'] = FALSE; 
        $data['portfolios'] = $this->common_model->get_by_company($this->business->uid, 'portfolios');
        $data['main_content'] = $this->load->view('admin/user/portfolio',$data,TRUE);
        $this->load->view('admin/index',$data);
    }

    public function add()
    {   
        check_status();
        
        if($_POST)
        {   
            $id = $this->input->post('id', true);
            $data=array(
                'lang_id' => 1,
                'business_id' => $this->business->uid,
                'user_id' => user()->id,
                'category' => $this->input->post('category'),
                'slug' => str_slug($this->input->post('title')),
                'title' => $this->input->post('title'),
                'link' => $this->input->post('link'),
                'details' => $this->input->post('details'),
                'created_at' =>date('Y-m-d'),
                'status' => $this->input->post('status'),
            );
            $data = $this->security->xss_clean($data);


            //if id available info will be edited
            if (!empty($id)) {
                $this->admin_model->edit_option($data, $id, 'portfolios');
                $this->session->set_flashdata('msg', trans('updated-successfully')); 
            } else {
                $id = $this->admin_model->insert($data, 'portfolios');
                $this->session->set_flashdata('msg', trans('inserted-successfully')); 
            }

            if($_FILES['photo']['name'] != ''){
                $up_load = $this->admin_model->upload_image('1200');
                $data_img = array(
                    'image' => $up_load['images'],
                    'thumb' => $up_load['thumb']
                );
                $data_img = $this->security->xss_clean($data_img);
                $this->admin_model->edit_option($data_img, $id, 'portfolios');
            }
            
            redirect(base_url('admin/portfolios'));

        }      
        
    }

    public function edit($id)
    {  
        $data = array();
        $data['page_title'] = 'Edit';  
        $data['page'] = 'Portfolio';
        $data['portfolio'] = $this->admin_model->get_by_id($id, 'portfolios');
        $data['main_content'] = $this->load->view('admin/user/portfolio',$data,TRUE);
        $this->load->view('admin/index',$data);
    }
    
    public function active($id) 
    {
        $data = array(
            'status' => 1
        );
        $data = $this->security->xss_clean($data);
        $this->admin_model->update($data, $id,'portfolios');
        $this->session->set_flashdata('msg', trans('activate-successfully')); 
        redirect(base_url('admin/portfolio'));
    }

    public function deactive($id) 
    {
        $data = array(
            'status' => 0
        );
        $data = $this->security->xss_clean($data);
        $this->admin_model->update($data, $id,'portfolios');
        $this->session->set_flashdata('msg', trans('deactivate-successfully')); 
        redirect(base_url('admin/portfolio'));
    }

    public function delete($id)
    {
        $this->admin_model->delete($id,'portfolios'); 
        echo json_encode(array('st' => 1));
    }

}
    

