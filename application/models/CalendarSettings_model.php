<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CalendarSettings_model extends CI_Model {

	var $table = 'calendar_settings';
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
	}
    public function save($data){
        $query = $this->db->get_where($this->table, array('id'=>$data['id']));
        if($query->num_rows()==0){
            $this->db->insert($this->table, $data);
            return $this->db->insert_id();
        }
        else $this->update($data['id'], $data);
    }
    public function update($id, $data){
        $this->db->update($this->table, $data, array('id'=>$id));
        $this->db->affected_rows();
    }
    public function getAll(){
        $query = $this->db->get($this->table);
        return $query->result();
    }
    public function getMyCalendarSettings($guide){
        $query = $this->db->get_where($this->table, array('guide'=>$guide));
        return $query->result();
    }
    public function delete($id){
       $this->db->delete($this->table, array('id'=>$id));
    }
}
