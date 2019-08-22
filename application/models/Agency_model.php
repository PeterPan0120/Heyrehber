<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agency_model extends CI_Model {

	var $table = 'agencies';
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
	}
    public function save($data){
        $query = $this->db->get_where($this->table, array('email'=>$data['email'], 'name'=>$data['name']));
        if($query->num_rows()==0){
            $this->db->insert($this->table, $data);
            return $this->db->insert_id();
        }
    }
    public function update($id, $data){
        if(isset($data['email'])){
            $query = $this->db->get_where($this->table, array('email'=>$data['email']));
            if($query->num_rows()==0 || $data['email']==$data['oldemail'])  {
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
    public function getAgenciesBySearchkey($search_key, $group, $district, $city, $status){
        $this->db->select("*");
        $this->db->from($this->table);
        $this->db->join("cities", "cities.id=agencies.city");
        $this->db->join('districts', "districts.id=agencies.district");
        if($search_key!="")
            $this->db->like('agencies.agency_name', $search_key);
        $query = $this->db->get();  
        if($query)
            return $query->result();
    }
    public function getAgenciesByParams($page, $perpage, $search_key, $group, $district, $city, $status, $sort_field, $sort_sort){
        $this->db->select("agencies.id, agencies.agency_name, agencies.certificate_number, agencies.group, cities.city, districts.district, agencies.status");
        $this->db->from($this->table);
        $this->db->join("cities", "cities.id=agencies.city");
        $this->db->join('districts', "districts.id=agencies.district");
        if(isset($group))
            $this->db->where('agencies.group', $group);
        if(isset($district))
            $this->db->where('agencies.district', $district);
        if(isset($city))
            $this->db->where('agencies.city', $city);
        if(isset($status))
            $this->db->where('agencies.status', $status);
        if($search_key!=""){
            $this->db->like('agencies.agency_name', $search_key);
            // $this->db->or_like('agencies.certificate_number', $search_key);
            // $this->db->or_like('agencies.group', $search_key);
            // $this->db->or_like('cities.city', $search_key);
            // $this->db->or_like('districts.district', $search_key);
            // $this->db->or_like('agencies.status', $search_key);
        }
        if($sort_field!="")
            $this->db->order_by($sort_field, $sort_sort);
        $this->db->limit($perpage, ($page-1)*$perpage);
        $query = $this->db->get();  
        if($query)
            return $query->result();
    }
    public function getAgenciesTotal($search_key){
        $this->db->select("agencies.id, agencies.agency_name, agencies.certificate_number, agencies.group, cities.city, districts.district, agencies.status");
        $this->db->from($this->table);
        $this->db->join("cities", "cities.id=agencies.city");
        $this->db->join('districts', "districts.id=agencies.district");
        if(isset($group))
            $this->db->where('agencies.group', $group);
        if(isset($district))
            $this->db->where('agencies.district', $district);
        if(isset($city))
            $this->db->where('agencies.city', $city);
        if(isset($status))
            $this->db->where('agencies.status', $status);
        if($search_key!=""){
            $this->db->like('agencies.agency_name', $search_key);
            // $this->db->or_like('agencies.certificate_number', $search_key);
            // $this->db->or_like('agencies.group', $search_key);
            // $this->db->or_like('cities.city', $search_key);
            // $this->db->or_like('districts.district', $search_key);
            // $this->db->or_like('agencies.status', $search_key);
        }
        $query = $this->db->get();
        if($query)
            return $query->num_rows();
    }
    public function getAll(){
        $query = $this->db->get($this->table);
        return $query->result();
    }
    public function getAgencyById($id){
        $query = $this->db->get_where($this->table, array('id'=>$id));
        return $query->result();
    }
    public function getAgencyByEmail($email){
        $query = $this->db->get_where($this->table, array('email'=>$email));
        return $query->result();
    }
    public function delete($id){
       $this->db->delete($this->table, array('id'=>$id));
    }
}
