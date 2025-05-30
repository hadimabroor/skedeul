<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Language extends Home_Controller {

    public function __construct()
    {
        parent::__construct();
        //check auth
        // if (!is_admin() && !is_user()) {
        //     redirect(base_url());
        // }

        $this->load->dbforge();
    }


    public function index()
    {
        $data = array();
        $data['page_title'] = 'Language';   
        $data['language'] = FALSE;
        $data['languages'] = $this->admin_model->get_language();
        $data['main_content'] = $this->load->view('admin/language/language',$data,TRUE);
        $this->load->view('admin/index',$data);
    }


    // add language
    public function add()
    {   
        if($_POST)
        {   
            check_status();

            if (!is_writable('application/language')):
                $this->session->set_flashdata('error', 'script > application > "language" folder is not writable, please writable this folder.');
                redirect(base_url('admin/language')); exit();
            endif;

            $lang_name = $this->input->post('name');
            if (strlen($lang_name) != strlen(utf8_decode($lang_name)))
            {
                $this->session->set_flashdata('error', 'Language name must be english characters');
                redirect(base_url('admin/language')); exit();
            }


            $id = $this->input->post('id', true);
            if ($id == '') {
                $is_unique = '|is_unique[language.name]';
            }else{
                $is_unique = '';
            }

            //validate and check duplicates
            $this->form_validation->set_rules('name', trans('name'), 'required'.$is_unique);

            if ($this->form_validation->run() === false) {
                $this->session->set_flashdata('error', validation_errors());
                redirect(base_url('admin/language'));
            } else {
               
                $data=array(
                    'name' => $this->input->post('name', true),
                    'slug' => str_slug($this->input->post('name', true)),
                    'short_name' => $this->input->post('short_name', true),
                    'text_direction' => $this->input->post('text_direction', true),
                    'status' => 1
                );
                $data = $this->security->xss_clean($data);

                //if id available info will be edited
                if ($id != '') {
                    $this->admin_model->edit_option($data, $id, 'language');
                    $this->session->set_flashdata('msg', trans('updated-successfully')); 

                    $lang = str_slug($_POST['lang_name']);
                    
                    //update language folder name
                    if (is_dir(APPPATH.'language/'.$lang)) {
                        rename(APPPATH.'language/'.$lang, APPPATH.'language/'.str_slug($this->input->post('name', true)));
                    }

                    //update database column
                    $fields = array(
                        $lang => array(
                            'name' => str_slug($this->input->post('name', true)),
                            'type' => 'TEXT',
                            'constraint' => '255'
                        ),
                    );
                    $this->dbforge->modify_column('lang_values', $fields);

                } else {
                    $id = $this->admin_model->insert($data, 'language');
                    $this->session->set_flashdata('msg', trans('inserted-successfully')); 

                    $ldata=array(
                        'lang_id' => $id
                    );
                    $this->admin_model->insert($ldata, 'settings_extra');
                
                    // insert new column in language table
                    $fields = array(
                        str_slug($_POST['name']) => array('type' => 'TEXT', 'after' => 'english')
                    );
                    $this->dbforge->add_column('lang_values', $fields);

                    // create language folder & file
                    $dir = str_slug($_POST['name']);
                    if (!is_dir(APPPATH.'language/'.$dir)) {
                        mkdir(APPPATH.'./language/' . $dir, 0777, TRUE);
                        copy(APPPATH.'language/english/website_lang.php', APPPATH.'language/'.$dir.'/website_lang.php');
                    }
                }

                redirect(base_url('admin/language'));

            }
            
        }     
    }


    //add language values
    public function add_value()
    {   
        check_status();

        if($_POST){

            $check = $this->admin_model->check_keyword(str_slug($this->input->post('keyword', true)));
            //print_r($check) ; exit();
            if ($check == 1) {
                //$this->session->set_flashdata('error', trans('keyword-exists'));
                $this->session->set_flashdata('error', 'keyword-exists');
                redirect($_SERVER['HTTP_REFERER']);
            } else {

                $data=array(
                    'label' => $this->input->post('label', true),
                    'keyword' => character_limiter(str_slug($this->input->post('keyword', true)), 2),
                    'english' => $this->input->post('label', true),
                    'type' => $this->input->post('type', true)
                );
                $data = $this->security->xss_clean($data);
                $this->admin_model->insert($data, 'lang_values');
                $this->session->set_flashdata('msg', trans('inserted-successfully')); 
                redirect(base_url('admin/language/values/'.$this->input->post('type').'/'.$this->input->post('lang')));
            }
        }
    }


    public function test(){

        // $values = $this->admin_model->select_asc('lang_values');
        // foreach ($values as $value) {
        //     echo  "'".$value->id."' => '".$value->english."',<br>";
        // }
        // exit();

        // $variable = array(
            
        // );
        
        //echo "<pre>"; print_r($variable); exit();
        // foreach ($variable as $key => $value) {
            
        //     $vdata=array(
        //         'arabic' => $value
        //     );
        //     //$this->admin_model->update($vdata, $key, 'lang_values');
        // }
        echo "done";
        exit();

    }


    //show language values
    public function values($type, $slug)
    {   
        $data = array();  
        $data['page_title'] = 'language';  
        $data['value'] = $slug;  
        $data['type'] = $type;  
        $data['language'] = $this->admin_model->get_lang_values_by_type($type);
        $data['main_content'] = $this->load->view('admin/language/language_values',$data,TRUE);
        $this->load->view('admin/index',$data);
    }

    //update language values
    public function update_values($type)
    {   
        check_status();

        $data = array();
        $language = $this->input->post('lang_type');
        $languages = $this->admin_model->get_lang_values_by_type($type);
        

        ini_set('memory_limit', '-1');
        set_time_limit ( -1);

        foreach ($languages as $lang) {
            $value = 'value'.$lang->id;

            $data=array(
                $_POST['lang_type'] => $_POST[$value]
            );
            $this->admin_model->edit_option($data, $lang->id, 'lang_values');
        }
        $this->session->set_flashdata('msg', trans('updated-successfully'));
        redirect(base_url('admin/language/values/'.$type.'/'.$language));

    }


    //edit language values
    public function edit($id)
    {  
        $data = array();
        $data['page_title'] = 'Edit';   
        $data['language'] = $this->admin_model->select_option($id, 'language');
        $data['main_content'] = $this->load->view('admin/language/language',$data,TRUE);
        $this->load->view('admin/index',$data);
    }

    //active language    
    public function active($id) 
    {
        $data = array(
            'status' => 1
        );
        $data = $this->security->xss_clean($data);
        $this->admin_model->update($data, $id,'language');
        $this->session->set_flashdata('msg', trans('msg-activated')); 
        redirect(base_url('admin/language'));
    }


    //deactive language
    public function deactive($id) 
    {
        check_status();
        
        $language = $this->admin_model->get_by_id($id,'language');
        $data = array(
            'status' => 0
        );
        $data = $this->security->xss_clean($data);
        if ($language->name != 'english') {
            $this->admin_model->update($data, $id,'language');
            $this->session->set_flashdata('msg', trans('msg-deactivated')); 
        }
        redirect(base_url('admin/language'));
    }


    //delete language
    public function delete($id)
    {
        check_status();

        $language = $this->admin_model->get_by_id($id,'language');
        $lang = $language->slug;

        if ($lang != 'english') {

            //delete language folder & file
            if (is_dir(APPPATH.'language/'.$lang)) {
                unlink(APPPATH.'language/'.$lang.'/website_lang.php');
                rmdir(APPPATH.'language/'.$lang);
            }

            //delete database column 
            $this->dbforge->drop_column('lang_values', $lang);
            $this->admin_model->delete($id,'language');
            $this->admin_model->delete_lang($id,'settings_extra'); 

        }
        echo json_encode(array('st' => 1));
    }

}
    

