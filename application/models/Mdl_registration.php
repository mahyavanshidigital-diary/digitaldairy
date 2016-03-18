<?php
Class Mdl_registration extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function add($data){
		$this->db->insert('users',$data);
		$id=$this->db->insert_id();
		return $id;
	}
	public function findByMobile($mobile){
		$this->db->where('mobile_number',$mobile);
		$query=$this->db->get('users');
		$result=$query->row_array();
		return $result;
	}
	public function addMatrimonial($data){
		$this->db->insert('matrimonial',$data);
		$id=$this->db->insert_id();
		return $id;
	}
	public function getAllparentUsers(){
		$this->db->where('parent_id',0);
		$query=$this->db->get('users');
		$result=$query->result_array();
		return $result;
	}
	public function getUserById($id){
		$this->db->where('id',$id);
		$query=$this->db->get('users');
		$result=$query->row_array();
		return $result;
	}
	public function getUserByParentId($id){
		$this->db->where('parent_id',$id);
		$query=$this->db->get('users');
		$result=$query->result_array();
		return $result;
	}
}
?>