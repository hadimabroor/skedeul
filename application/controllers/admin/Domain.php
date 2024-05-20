<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Domain extends Home_Controller {

    public function __construct()
    {
        parent::__construct();
        //check auth
        if (!is_user() && !is_admin()) {
            redirect(base_url());
        }
    }


    public function index()
    {
        $data = array();
        $data['page_title'] = 'Domain'; 
        $data['page'] = 'Domain'; 
        $data['domain'] = FALSE;
        $data['settings'] = $this->admin_model->get_domain_settings();
        $data['domains'] = $this->admin_model->get_domains($this->session->userdata('id')); 
        $data['main_content'] = $this->load->view('admin/user/domains/domain',$data,TRUE);
        $this->load->view('admin/index',$data);
    }


    function is_domain($domain)
    {
        return (preg_match("/^([a-z\d](-*[a-z\d])*)(\.([a-z\d](-*[a-z\d])*))*$/i", $domain) //valid chars check
                && preg_match("/^.{1,253}$/", $domain) //overall length check
                && preg_match("/^[^\.]{1,63}(\.[^\.]{1,63})*$/", $domain)   ); //length of each label
    }


    public function add()
    {   
        if($_POST)
        {   
            check_status();

            if ($this->is_domain($this->input->post('custom_domain'))) {
                $domain = $this->input->post('custom_domain');
            }else{
                $this->session->set_flashdata('error', 'Invalid domain name');
                redirect(base_url('admin/domain'));
            }
            
            $id = $this->input->post('id', true);
            $data=array(
                'user_id'=> user()->id,
                'current_domain' =>base_url($this->business->slug),
                'custom_domain' => $this->input->post('custom_domain'),
                'date'=>date('Y-m-d'),
                'status'=>0
            );
            $data = $this->security->xss_clean($data);
            if ($id != '') {
                $this->admin_model->edit_option($data, $id, 'domains');
                $this->session->set_flashdata('msg', trans('updated-successfully')); 
            } else {
                $id = $this->admin_model->insert($data, 'domains');
                $this->session->set_flashdata('msg', trans('inserted-successfully')); 
            }
            
           redirect(base_url('admin/domain'));
            
        }      
        
    }


    public function edit($id)
    {  
        $data = array();
        $data['page_title'] = 'Edit';  
        $data['page'] = 'Domain';   
        $data['domain'] = $this->admin_model->get_by_id($id, 'domains');
        $data['main_content'] = $this->load->view('admin/user/domains/domain',$data,TRUE);
        $this->load->view('admin/index',$data);
    }

    public function delete($id)
    {
        $this->admin_model->delete($id,'domains'); 
        echo json_encode(array('st' => 1));
    }


    public function settings(){
        $data = array();
        $data['page_title'] = 'Settings';  
        $data['page'] = 'Domain';    
        $data['domain_settings'] = FALSE;    
        $data['settings'] = $this->admin_model->get_domain_settings();
        $data['main_content'] = $this->load->view('admin/user/domains/settings',$data,TRUE);
        $this->load->view('admin/index',$data);
    }


    public function update_settings()
    {   
        check_status();
        
        if($_POST)
        { 
            $data=array(
                'user_id' => $this->session->userdata('id'),
                'title' => $this->input->post('title',true),
                'short_details' => $this->input->post('short_details',true),
                'details' => $this->input->post('details',true),
                'ip' => $this->input->post('ip',true),
                'value1' => get_current_domain(),
                'value2' => $this->input->post('ip',true)
            );
            $data = $this->security->xss_clean($data);

            if($_FILES['photo']['name'] != ''){
                $up_load = $this->admin_model->upload_image('1200');
                $data_img = array(
                    'image' => $up_load['images'],
                    'thumb' => $up_load['thumb']
                );
                $data_img = $this->security->xss_clean($data_img);
                $this->admin_model->edit_option($data_img, 1, 'domain_settings');
            }
            
            $this->admin_model->edit_option($data, 1, 'domain_settings');
            $this->session->set_flashdata('msg', trans('updated-successfully')); 
             
            redirect(base_url('admin/domain/settings'));

        }      
        
    }


    public function request(){
        $data = array();
        $data['page_title'] = 'Request'; 
        $data['page'] = 'Domain';
        $data['domains'] = $this->admin_model->get_domains(0); 
        $data['main_content'] = $this->load->view('admin/user/domains/request',$data,TRUE);
        $this->load->view('admin/index',$data);
    }

    public function request_approve($id) 
    {
        $data = array(
            'status' => 1
        );
        $data = $this->security->xss_clean($data);
        $this->admin_model->update($data, $id,'domains');
        $this->session->set_flashdata('msg', trans('activate-successfully')); 
        redirect(base_url('admin/domain/request'));
    }

    public function request_reject($id) 
    {
        $data = array(
            'status' => 2
        );
        $data = $this->security->xss_clean($data);
        $this->admin_model->update($data, $id,'domains');
        $this->session->set_flashdata('msg', trans('deactivate-successfully')); 
        redirect(base_url('admin/domain/request'));
    }
}