<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {

    public function __construct(){
		parent::__construct();
		$this->load->model('admin/mdl_event','mdl_event');
        $this->load->helper('url');
        $this->load->library('session');
	}
    
	public function index()
	{
		$data=array(
			'main_content'=>'admin/events/listevents'
		);
        $data['events_list'] = $this->mdl_event->getAll();
		$this->load->view('admin/template/front',$data);
	}
    
    public function addevents()
	{
        $data=array(
			'main_content'=>'admin/events/addevents'
		);
		$this->load->view('admin/template/front',$data);
	}
    
    public function insertEvent(){
        
        $uploaded_file = array();
        if(!empty($_FILES['event_fileupload'])) {
            for($i=0;$i<count($_FILES['event_fileupload']['size']);$i++){
                if($_FILES['event_fileupload']['size'][$i] > 0){
                    $filename = uniqid().".".pathinfo($_FILES['event_fileupload']['name'][$i], PATHINFO_EXTENSION);
                    $path_to_upload = FCPATH."admintemplate/eventimages/".$filename;
                    if(move_uploaded_file($_FILES['event_fileupload']['tmp_name'][$i],$path_to_upload)){
                      $uploaded_file[] = $filename;
                    }
                }
            }
        }
        $files_implode = '';
        if(!empty($uploaded_file)){
            $files_implode = implode(",",$uploaded_file);
        }
        
        $insertData = array(
            'event_title' => $this->input->post('event_title'),
            'event_description' => $this->input->post('event_description'),
            'event_images' => $files_implode
        );
        
        $this->mdl_event->insertEvent($insertData);
        $this->session->set_flashdata('event_message','<div class="alert alert-success">Event has been inserted Sucessfully</div>');
        redirect('admin/event');
	}
    
    public function editevent($eventId)
	{
        $eventData = $this->mdl_event->getEventById($eventId);
        
        $data=array(
			'main_content'=>'admin/events/editevents',
			'eventData'=> $eventData
		);
		$this->load->view('admin/template/front',$data); 
	}
    
    public function editeventSave()
	{
        $eventId = $this->input->post('hidden_event_id');
        
        $uploaded_file = array();
        if(!empty($_FILES['event_fileupload'])) {
            for($i=0;$i<count($_FILES['event_fileupload']['size']);$i++){
                if($_FILES['event_fileupload']['size'][$i] > 0){
                    $filename = uniqid().".".pathinfo($_FILES['event_fileupload']['name'][$i], PATHINFO_EXTENSION);
                    $path_to_upload = FCPATH."admintemplate/eventimages/".$filename;
                    if(move_uploaded_file($_FILES['event_fileupload']['tmp_name'][$i],$path_to_upload)){
                      $uploaded_file[] = $filename;
                    }
                }
            }
        }
        
        $files_uploaded_already = $this->input->post('hidden_event_file_exists');
        $files_removed = $this->input->post('hidden_event_file_remove');
        $files_removed_array = array();
        $files_uploaded_already_array = explode(",",$files_uploaded_already);
        $files_uploaded_already_array = array_merge($uploaded_file,$files_uploaded_already_array);
        if(!empty($files_removed)){
            $files_removed_array = explode(",",$files_removed);
            for($i=0;$i<count($files_removed_array);$i++){
                $path_to_upload = FCPATH."admintemplate/eventimages/".$files_removed_array[$i];
                unlink($path_to_upload);
            }
        }
        $files_to_be_update_array = array_diff($files_uploaded_already_array,$files_removed_array);
        $files_to_be_update_array = array_filter($files_to_be_update_array);
        $files_to_be_update = implode(",",$files_to_be_update_array);
        $updateData = array(
            'event_title' => $this->input->post('event_title'),
            'event_description' => $this->input->post('event_description'),
            'event_images' => $files_to_be_update
        );
        $this->mdl_event->updateEvent($updateData,$eventId);
        $this->session->set_flashdata('event_message','<div class="alert alert-success">Event has been updated Sucessfully</div>');
        redirect('admin/event');
	}
}
