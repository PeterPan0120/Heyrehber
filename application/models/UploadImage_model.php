<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UploadImage_model extends CI_Model {

	var $table = 'upload_images';
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
    public function getImages($building, $id){
        $query = $this->db->get_where($this->table, array('building'=>$building, 'building_id'=>$id));
        return $query->result();
    }
    public function delete($building, $building_id){
       $this->db->delete($this->table, array('building'=>$building, 'building_id'=>$building_id));
    }
}
