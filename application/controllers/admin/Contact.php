<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends Home_Controller {

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
        $data['page_title'] = 'Contact';      
        $data['page'] = 'Contact';
        $data['contacts'] = $this->admin_model->get_contacts($this->business->uid);
        $data['main_content'] = $this->load->view('admin/contact',$data,TRUE);
        $this->load->view('admin/index',$data);
    }

    public function delete($id)
    {
        $this->admin_model->delete($id,'site_contacts'); 
        echo json_encode(array('st' => 1));
    }

}
	

