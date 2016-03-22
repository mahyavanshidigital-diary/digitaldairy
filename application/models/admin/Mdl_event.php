<?php
Class Mdl_event extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function getAll(){
		$query=$this->db->get('di_events');
		$result=$query->result_array();
		return $result;
	}
	public function getEventById($event_id){
		$this->db->select('*');
		$this->db->from('di_events');
		$this->db->where('event_id',$event_id);
		$query=$this->db->get();
		$result=$query->result_array();
		return $result;
	}
	
	public function insertEvent($data){
        $this->db->insert('di_events',$data);
	}
    
    public function updateEvent($data,$event_id){
        $this->db->where('event_id',$event_id);
        $this->db->update('di_events',$data);
	}
}
?>