<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SystemSettings_model extends CI_Model {

	var $table = 'system_settings';
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
	}
    public function update($data){
        $query = $this->db->where('id', 1);
        $this->db->update($this->table, $data);
    }
    public function get(){
        $query = $this->db->get($this->table);
        if($query)
           return $query->result();
    }
}
