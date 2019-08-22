<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GuideRequest_model extends CI_Model {

	var $table = 'guide_requests';
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
        $this->load->model('User_model', 'user');
	}
    public function save($data){
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    public function update($id, $data){
        $this->db->update($this->table, $data, array('id'=>$id));
        return $this->db->affected_rows();
    }
    public function getGuideRequestsByParams($page, $perpage, $search_key, $sort_field, $sort_sort){
        $this->db->select("guide_requests.id, guide_requests.title, users.name as requester, guide_requests.range, tour_types.tour_type, guide_requests.regions, guide_requests.start_date, guide_requests.finish_date, guide_requests.start_location, guide_requests.finish_location");
        $this->db->from($this->table);
        $this->db->join("users", 'guide_requests.requester=users.id');
        $this->db->join("tour_types", 'guide_requests.tour_type=tour_types.id');
        if($search_key!=""){
            $this->db->like('guide_requests.title', $search_key);
            $this->db->or_like('users.name', $search_key);
            $this->db->or_like('guide_requests.range', $search_key);
            $this->db->or_like('tour_types.tour_type', $search_key);
            $this->db->or_like('guide_requests.start_date', $search_key);
            $this->db->or_like('guide_requests.finish_date', $search_key);
            $this->db->or_like('guide_requests.start_location', $search_key);
            $this->db->or_like('guide_requests.finish_location', $search_key);
        }
        if($sort_field!="")
            $this->db->order_by($sort_field, $sort_sort);
        $this->db->limit($perpage, ($page-1)*$perpage);
        $query = $this->db->get();
        if($query)
            return $query->result();
    }
    public function getGuideRequestsTotal($search_key){
        $this->db->select("guide_requests.id, guide_requests.title, users.name as requester, guide_requests.range, tour_types.tour_type, guide_requests.regions, guide_requests.start_date, guide_requests.finish_date, guide_requests.start_location, guide_requests.finish_location");
        $this->db->from($this->table);
        $this->db->join("users", 'guide_requests.requester=users.id');
        $this->db->join("tour_types", 'guide_requests.tour_type=tour_types.id'); 
        if($search_key!=""){
            $this->db->like('guide_requests.title', $search_key);
            $this->db->or_like('users.name', $search_key);
            $this->db->or_like('guide_requests.range', $search_key);
            $this->db->or_like('tour_types.tour_type', $search_key);
            $this->db->or_like('guide_requests.start_date', $search_key);
            $this->db->or_like('guide_requests.finish_date', $search_key);
            $this->db->or_like('guide_requests.start_location', $search_key);
            $this->db->or_like('guide_requests.finish_location', $search_key);
        }
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function getMyGuideRequestsByParams($page, $perpage, $search_key, $sort_field, $sort_sort){
        $role = $this->session->userdata('logged_in')['role'];
        $email = $this->session->userdata('logged_in')['email'];
        $id = $this->user->getUserByEmail($email)[0]->id;
        if($search_key){
            $search_key = "%".$search_key."%";
            if($sort_field && $sort_sort){
                $str = sprintf("SELECT guide_requests.id, guide_requests.title, guide_requests.range, guide_requests.regions, tour_types.tour_type, guide_requests.regions, guide_requests.start_date, guide_requests.finish_date, guide_requests.start_location, guide_requests.finish_location FROM `guide_requests` JOIN `tour_types` ON guide_requests.tour_type=tour_types.id WHERE ( guide_requests.title LIKE '%s' OR guide_requests.range LIKE '%s' OR  guide_requests.regions LIKE '%s' OR tour_types.tour_type LIKE '%s' OR  guide_requests.start_date LIKE '%s' OR  guide_requests.finish_date LIKE '%s' OR  guide_requests.start_location LIKE '%s' OR  guide_requests.finish_location LIKE '%s') AND guide_requests.requester = '%s' ORDER BY %s %s LIMIT %d OFFSET %d", $search_key, $search_key, $search_key, $search_key, $search_key, $search_key, $search_key,$search_key, $id, $sort_field, $sort_sort, $perpage, ($page-1)*$perpage);
            }
            else {
                $str = sprintf("SELECT guide_requests.id, guide_requests.title, guide_requests.range, guide_requests.regions, tour_types.tour_type, guide_requests.regions, guide_requests.start_date, guide_requests.finish_date, guide_requests.start_location, guide_requests.finish_location FROM `guide_requests` JOIN `tour_types` ON guide_requests.tour_type=tour_types.id WHERE ( guide_requests.title LIKE '%s' OR guide_requests.range LIKE '%s' OR  guide_requests.regions LIKE '%s' OR  tour_types.tour_type LIKE '%s' OR  guide_requests.start_date LIKE '%s' OR  guide_requests.finish_date LIKE '%s' OR  guide_requests.start_location LIKE '%s' OR  guide_requests.finish_location LIKE '%s') AND  guide_requests.requester = '%s' LIMIT %d OFFSET %d", $search_key, $search_key, $search_key, $search_key, $search_key, $search_key, $search_key,$search_key, $id, $perpage, ($page-1)*$perpage);
            }
        }
        else{
            if($sort_field && $sort_sort)
                $str = sprintf("SELECT guide_requests.id, guide_requests.title, guide_requests.range, guide_requests.regions, tour_types.tour_type, guide_requests.regions, guide_requests.start_date, guide_requests.finish_date, guide_requests.start_location, guide_requests.finish_location FROM `guide_requests` JOIN `tour_types` ON guide_requests.tour_type=tour_types.id  WHERE guide_requests.requester = '%s' ORDER BY %s %s LIMIT %d OFFSET %d", $id, $sort_field, $sort_sort, $perpage, ($page-1)*$perpage );
            else
                $str = sprintf("SELECT guide_requests.id, guide_requests.title, guide_requests.range, guide_requests.regions, tour_types.tour_type, guide_requests.regions, guide_requests.start_date, guide_requests.finish_date, guide_requests.start_location, guide_requests.finish_location FROM `guide_requests` JOIN `tour_types` ON guide_requests.tour_type=tour_types.id  WHERE guide_requests.requester = '%s' LIMIT %d OFFSET %d", $id, $perpage, ($page-1)*$perpage );
        }
        $query = $this->db->query($str);
        if($query)
            return $query->result();    
    }
    public function getMyGuideRequestsTotal($search_key){
        $role = $this->session->userdata('logged_in')['role'];
        $email = $this->session->userdata('logged_in')['email'];
        $id = $this->user->getUserByEmail($email)[0]->id;
        if($search_key){
            $search_key = "%".$search_key."%";
            $str = sprintf("SELECT guide_requests.id, guide_requests.title, guide_requests.range, guide_requests.regions, tour_types.tour_type, guide_requests.regions, guide_requests.start_date, guide_requests.finish_date, guide_requests.start_location, guide_requests.finish_location FROM `guide_requests` JOIN `tour_types` ON guide_requests.tour_type=tour_types.id  WHERE ( guide_requests.title LIKE '%s' OR guide_requests.range LIKE '%s' OR  guide_requests.regions LIKE '%s' OR tour_types.tour_type LIKE '%s' OR guide_requests.start_date LIKE '%s' OR  guide_requests.finish_date LIKE '%s' OR  guide_requests.start_location LIKE '%s' OR  guide_requests.finish_location LIKE '%s') AND  guide_requests.requester = '%s'", $search_key, $search_key, $search_key, $search_key, $search_key, $search_key, $search_key, $search_key, $id);
        }
        else{
            $str = sprintf("SELECT guide_requests.id, guide_requests.title, guide_requests.range, guide_requests.regions, tour_types.tour_type, guide_requests.regions, guide_requests.start_date, guide_requests.finish_date, guide_requests.start_location, guide_requests.finish_location FROM `guide_requests` JOIN `tour_types` ON guide_requests.tour_type=tour_types.id  WHERE guide_requests.requester = '%s'", $id);
        }
        $query = $this->db->query($str);
        if($query)
            return $query->num_rows();
    }
    public function getAll(){
        $query = $this->db->get($this->table);
        return $query->result();
    }
    public function getGuideRequestById($id){
        $query = $this->db->get_where($this->table, array('id'=>$id));
        return $query->result();
    }
    public function delete($id){
       $this->db->delete($this->table, array('id'=>$id));
    }
}
