<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Event extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('admin/Mdl_event','mdl_event');
	}
    
	public function index(){
        $allEvents = $this->mdl_event->getAll();
		$data=array(
			'main_content'=>'event/eventList',
			'eventList'=> $allEvents
		);
		$this->load->view('template/front',$data);
	}
}
