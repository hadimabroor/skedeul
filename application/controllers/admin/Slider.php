<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Slider extends Home_Controller {

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
        $data['page_title'] = 'Slider';     
        $data['page'] = 'Slider';   
        $data['slider'] = FALSE;
        $data['sliders'] = $this->admin_model->select_by_user('sliders');
        $data['main_content'] = $this->load->view('admin/user/slider',$data,TRUE);
        $this->load->view('admin/index',$data);
    }


    public function add()
    {	
        check_status();
        
        if($_POST)
        {   
            $id = $this->input->post('id', true);

            $data=array(
                'user_id' => user()->id,
                'business_id' => $this->business->uid,
                'title' => $this->input->post('title', true),
                'details' => $this->input->post('details', true),
                'status' => $this->input->post('status', true)
            );
            $data = $this->security->xss_clean($data);
            
            //if id available info will be edited
            if ($id != '') {
                $this->admin_model->edit_option($data, $id, 'sliders');
                $this->session->set_flashdata('msg', trans('updated-successfully')); 
            } else {
                $id = $this->admin_model->insert($data, 'sliders');
                $this->session->set_flashdata('msg', trans('inserted-successfully')); 
            }


            //upload image
            $data_img = $this->admin_model->do_upload('photo');
            if($data_img){
                $data_img = array(
                    'image' => $data_img['medium'],
                );
                $this->admin_model->edit_option($data_img, $id, 'sliders'); 
             }

            redirect(base_url('admin/slider'));

           
        }      
        
    }

    public function edit($id)
    {  
        $data = array();
        $data['page_title'] = 'Edit';   
        $data['slider'] = $this->admin_model->select_option($id, 'sliders');
        $data['main_content'] = $this->load->view('admin/user/slider',$data,TRUE);
        $this->load->view('admin/index',$data);
    }


    public function delete($id)
    {
        $this->admin_model->delete($id,'sliders'); 
        echo json_encode(array('st' => 1));
    }


}
	

