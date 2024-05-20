<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use Orhanerday\OpenAi\OpenAi;
class Document extends Home_Controller {

    public function __construct()
    {
        parent::__construct();
        //check auth
        if (!is_admin()) {
            redirect(base_url());
        }
    }

    

    public function create()
    {
        $data = array();
        $data['limit'] = TRUE;
        $data['page_title'] = 'Documents';  
        $data['page'] = 'Document';
        $data['type'] = 'Document';
        $data['main_content'] = $this->load->view('admin/generate',$data,TRUE);
        $this->load->view('admin/index',$data);
    }


    public function generate()
    {
        $open_ai = new OpenAi(settings()->openai_key);
        $main_slug = $this->input->post('main_slug', true);

        $prompt = $this->input->post('prompt', true);
        

        $org_prompt = $this->input->post('prompt', true);
        $language = $this->input->post('language', true);
        $max_tokens = $this->input->post('max_tokens', true);
        $temperature = $this->input->post('creativity_level', true);
        $output_variations = $this->input->post('output_variations', true);

        if (settings()->openai_model == 'gpt-3.5-turbo') {
            $model = settings()->openai_model;
            if ($language != 'English') {
                $prompt = $prompt . "\n\nLanguage of the prompt must be:\n\n".$language;
            }

            $response = $open_ai->chat([
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    [
                        "role" => "user",
                        "content" => $prompt
                    ],
                ],
                'temperature' => intval($temperature),
                'max_tokens' => intval($max_tokens)
            ]);
        }else{

            if ($language != 'English') {
                $prompt = $prompt . "\n\nLanguage of the prompt must be:\n\n".$language;
            }
            
            $model = settings()->openai_model;
            //common text completion
            $response = $open_ai->completion([
                'model'  => $model,
                'prompt' => $prompt,
                'max_tokens' => intval($max_tokens),
                'temperature' => intval($temperature),
                'n' => intval($output_variations),
                'top_p' => 1
            ]);
            
        }

        $response = json_decode($response);
       
        $data = array();

        if (isset($response->error)) {
            $data['response'] = false;
            $st = 0;
        }else{
            $data['response'] = $response;
            $st = 1;

            $text = ''; $text2 = ''; $text3 = ''; $text4 = '';
            if ($output_variations == 1) {
                if (settings()->openai_model == 'gpt-3.5-turbo') {
                    $text = $response->choices[0]->message->content;
                }else{
                    $text = $response->choices[0]->text;
                }
            }

            if (isset($response->id)) {
                $response_id = $response->id;
            }else{
                $response_id = 'csid-'.random_string('numeric', 8);
            }

        }

        $data['prompt'] = $org_prompt;
        $loaded = $this->load->view('admin/document_result', $data, true);
        echo json_encode(array('st' => $st, 'loaded' => $loaded));
    }


    public function view($id)
    {  
        $data = array();
        $data['page_title'] = 'Document View';  
        $data['page'] = 'Document';
        $data['document'] = $this->admin_model->get_by_id($id, 'documents');
        $data['main_content'] = $this->load->view('admin/user/document_view',$data,TRUE);
        $this->load->view('admin/index',$data);
    }


    public function edit($id)
    {  
        $data = array();
        $data['page_title'] = 'Edit';  
        $data['page'] = 'Document';   
        $data['document'] = $this->admin_model->get_by_id($id, 'documents');
        $data['main_content'] = $this->load->view('admin/user/documents',$data,TRUE);
        $this->load->view('admin/index',$data);
    }

    public function update()
    {
        $id = $this->input->post('id', true);
        $data = array(
            'name' => $this->input->post('name', true),
            'prompt' => $this->input->post('prompt', true),
            'text' => html_purify($this->input->post('text', true), 'enable'),
        );
        $data = $this->security->xss_clean($data);
        $this->admin_model->update($data, $id,'documents');
        $this->session->set_flashdata('msg', trans('updated-successfully')); 
        redirect(base_url('admin/document'));
    }
    
    public function active($id) 
    {
        $data = array(
            'status' => 1
        );
        $data = $this->security->xss_clean($data);
        $this->admin_model->update($data, $id,'documents');
        $this->session->set_flashdata('msg', trans('activate-successfully')); 
        redirect(base_url('admin/document'));
    }

    public function deactive($id) 
    {
        $data = array(
            'status' => 0
        );
        $data = $this->security->xss_clean($data);
        $this->admin_model->update($data, $id,'documents');
        $this->session->set_flashdata('msg', trans('deactivate-successfully')); 
        redirect(base_url('admin/document'));
    }

    public function delete($id)
    {
        $this->admin_model->delete($id,'documents'); 
        echo json_encode(array('st' => 1));
    }



}
    

