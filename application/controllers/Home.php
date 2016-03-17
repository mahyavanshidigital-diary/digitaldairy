<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data=array(
			'main_content'=>'home/home',
		);
		$this->load->view('template/front',$data);
	}
}
