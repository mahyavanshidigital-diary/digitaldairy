<?php
Class Mdl_user extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	
	public function getUserDetail($id){
		$this->db->where('id',$id);
		$query=$this->db->get('users');
		$result=$query->row_array();
		return $result;
	}
	public function getAllUsersFamily($id){
		$where = "id='".$id."' OR parent_id='".$id."'";
		$this->db->where($where);
		$this->db->order_by('id','DESC');
		$query=$this->db->get('users');
		$result=$query->result_array();
		return $result;
	}
	public function update($data, $id){
		$this->db->where('id', $id);
		$this->db->update('users',$data);
	}
	public function findByMobile($mobile){
		$this->db->where('mobile_number',$mobile);
		$query=$this->db->get('users');
		$result=$query->row_array();
		return $result;
	}
	public function checkuser($mobilenumber,$password){
		$this->db->where('mobile_number',$mobilenumber);
		$this->db->where('password',$password);
		$query=$this->db->get('users');
		$row=$query->row_array();
		return $row;
	}
}
?>