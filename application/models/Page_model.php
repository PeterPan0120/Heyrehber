<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page_model extends CI_Model {

	var $table = 'pages';
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
	}
    public function save($data){
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    public function update($id, $data){
        $this->db->update($this->table, $data, array('id'=>$id));
    }
    public function getAll(){
        $query = $this->db->get($this->table);
        return $query->result();
    }
    public function getPagesByParams($page, $perpage, $search_key, $sort_field, $sort_sort){
        $this->db->select("pages.id, pages.title, page_categories.category, pages.created_date");
        $this->db->from($this->table);
        $this->db->join('page_categories', "page_categories.id=pages.category");
        if($search_key!=""){
            $this->db->like('title', $search_key);
            $this->db->or_like('category', $search_key);
        }
        if($sort_field!="")
            $this->db->order_by($sort_field, $sort_sort);
        $this->db->limit($perpage, ($page-1)*$perpage);
        $query = $this->db->get();  
        if($query)
            return $query->result();
    }
    public function getPagesTotal($search_key){
        $this->db->select("pages.id, pages.title, page_categories.category, pages.created_date");
        $this->db->from($this->table);
        $this->db->join('page_categories', "page_categories.id=pages.category");
        if($search_key!=""){
            $this->db->like('title', $search_key);
            $this->db->or_like('category', $search_key);
        }
        $query = $this->db->get();
        if($query)
            return $query->num_rows();
    }
    public function getPageById($id){
        $query = $this->db->get_where($this->table, array('id'=>$id));
        return $query->result();
    }
    public function delete($id){
       $this->db->delete($this->table, array('id'=>$id));
    }
}
