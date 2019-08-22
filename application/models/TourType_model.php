<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TourType_model extends CI_Model {

	var $table = 'tour_types';
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
	}
    public function save($data){
        $query = $this->db->get_where($this->table, array('tour_type'=>$data['tour_type']));
        if($query->num_rows()==0){
            $this->db->insert($this->table, $data);
            return $this->db->insert_id();
        }
    }
    public function update($id, $data){
        $this->db->update($this->table, $data, array('id'=>$id));
    }
    public function getTourTypesByParams($page, $perpage, $search_key, $sort_field, $sort_sort){
        $this->db->select("*");
        $this->db->from($this->table);
        if($search_key!="")
            $this->db->like('tour_type', $search_key);
        if($sort_field!="")
            $this->db->order_by($sort_field, $sort_sort);
        $this->db->limit($perpage, ($page-1)*$perpage);
        $query = $this->db->get();  
        if($query)
            return $query->result();
    }
    public function getTourTypesTotal($search_key){
        $this->db->select("*");
        $this->db->from($this->table);
        if($search_key!="")
            $this->db->like('tour_type', $search_key);
        $query = $this->db->get();
        if($query)
            return $query->num_rows();
    }
    public function getTourTypeById($id){
        $query = $this->db->get_where($this->table, array('id'=>$id));
        return $query->result();
    }
    public function getTourTypeByTourType($tour_type){
        $query = $this->db->get_where($this->table, array('tour_type'=>$tour_type));
        return $query->result();
    }
    public function getAll(){
        $query = $this->db->get($this->table);
        return $query->result();
    }
    public function delete($id){
       $this->db->delete($this->table, array('id'=>$id));
    }
}
