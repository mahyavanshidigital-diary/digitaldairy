<?php
Class Mdl_state extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function getAll(){
		$query=$this->db->get('di_state');
		$result=$query->result_array();
		return $result;
	}
	public function getDistrictByStateName($statename){
		$this->db->select('*');
		$this->db->from('di_districts di');
		$this->db->join('di_state st','st.state_id=di.state_id');
		$this->db->where('st.state_name',$statename);
		$query=$this->db->get();
		$result=$query->result_array();
		return $result;
	}
	//getTalukaByDistrictName
	public function getTalukaByDistrictName($district){
		$this->db->select('*');
		$this->db->from('di_taluka ta');
		$this->db->join('di_districts di','di.districts_id=ta.districts_id');
		$this->db->where('di.districts_name',$district);
		$query=$this->db->get();
		$result=$query->result_array();
		return $result;
	}
}
?>