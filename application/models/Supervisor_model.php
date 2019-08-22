<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supervisor_model extends CI_Model {

	var $table = 'supervisors';
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
	}
    public function save($data){
        $query = $this->db->get_where($this->table, array('email'=>$data['email']));
        if($query->num_rows()==0){
            $this->db->insert($this->table, $data);
            return $this->db->insert_id();
        }
    }
    public function update($id, $data){
        if(isset($data['email'])){
            $query = $this->db->get_where($this->table, array('email'=>$data['email']));
            if($query->num_rows()==0 || $data['email']==$data['oldemail'])  {
                // var_dump($data);
                unset($data['oldemail']);
                $this->db->update($this->table, $data, array('id'=>$id));
                return $this->db->affected_rows();
            }
        }
        else{
            $query = $this->db->get_where($this->table, array('id'=>$id));
            if($query->num_rows()!=0)  {
                $this->db->update($this->table, $data, array('id'=>$id));
                return $this->db->affected_rows();
            }
        }
    }
    public function getSupervisorsByParams($page, $perpage, $search_key, $sort_field, $sort_sort){
        $this->db->select("*");
        $this->db->from($this->table);
        if($search_key!=""){
            $this->db->like('name', $search_key);
            $this->db->or_like('sirname', $search_key);
            $this->db->or_like('department', $search_key);
            $this->db->or_like('number', $search_key);
            $this->db->or_like('email', $search_key);
        }
        if($sort_field!="")
            $this->db->order_by($sort_field, $sort_sort);
        $this->db->limit($perpage, ($page-1)*$perpage);
        $query = $this->db->get();

        if($query)
            return $query->result();
    }
    public function getSupervisorsTotal($search_key){
        $this->db->select("*");
        $this->db->from($this->table);
        if($search_key!=""){
            $this->db->like('name', $search_key);
            $this->db->or_like('sirname', $search_key);
            $this->db->or_like('department', $search_key);
            $this->db->or_like('number', $search_key);
            $this->db->or_like('email', $search_key);
        }
        $query = $this->db->get();
        if($query)
            return $query->num_rows();
    }
    public function getAll(){
        $query = $this->db->get($this->table);
        return $query->result();
    }
    public function getSupervisorById($id){
        $query = $this->db->get_where($this->table, array('id'=>$id));
        return $query->result();
    }
    public function delete($id){
       $this->db->delete($this->table, array('id'=>$id));
    }
}
