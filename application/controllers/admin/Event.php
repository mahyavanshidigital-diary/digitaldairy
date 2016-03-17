<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {

	public function index()
	{
		$data=array(
			'main_content'=>'admin/events/addevents'
		);
		$this->load->view('admin/template/front',$data);
	}
}
