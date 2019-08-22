<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attachment_model extends CI_Model {

	var $table = 'attachments';
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
    public function save($data){
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    public function getAll(){
        $query = $this->db->get($this->table);
        return $query->result();
    }
    public function getAttachmentById($id){
        $query = $this->db->get_where($this->table, array('id'=>$id));
        return $query->result();
    }
    public function delete($id){
       $this->db->delete($this->table, array('id'=>$id));
    }
}
