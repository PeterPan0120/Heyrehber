<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar_model extends CI_Model {

	var $table = 'calendar';
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
        $this->load->model('Guide_model', 'guide');
	}
    public function save($data){
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    public function update($id, $data){
        $this->db->update($this->table, $data, array('id'=>$id));
        return $this->db->affected_rows();
    }
    public function getEventsByParams($page, $perpage, $search_key, $sort_field, $sort_sort){
        $this->db->select("calendar.id, calendar.title, guides.username as requester, calendar.event_date, calendar.start_time, calendar.finish_time, calendar.location, calendar.activity_color");
        $this->db->from($this->table);
        $this->db->join('guides', 'guides.id=calendar.requester');
        $this->db->join('tour_types', 'tour_types.id=calendar.tour_type');
        if($search_key!=""){
            $this->db->like('calendar.title', $search_key);
            $this->db->or_like('guides.username', $search_key);
            $this->db->or_like('calendar.event_date', $search_key);
            $this->db->or_like('calendar.start_time', $search_key);
            $this->db->or_like('calendar.finish_time', $search_key);
            $this->db->or_like('calendar.location', $search_key);
        }
        if($sort_field!="")
            $this->db->order_by($sort_field, $sort_sort);
        $this->db->limit($perpage, ($page-1)*$perpage);
        $query = $this->db->get();
        if($query)
            return $query->result();
    }
    public function getEventsTotal($search_key){
        $this->db->select("calendar.id, calendar.title, guides.username as requester, calendar.event_date, calendar.start_time, calendar.finish_time, calendar.location, calendar.activity_color");
        $this->db->from($this->table);
        $this->db->join('guides', 'guides.id=calendar.requester');
        $this->db->join('tour_types', 'tour_types.id=calendar.tour_type');
        if($search_key!=""){
            $this->db->like('calendar.title', $search_key);
            $this->db->or_like('guides.username', $search_key);
            $this->db->or_like('calendar.event_date', $search_key);
            $this->db->or_like('calendar.start_time', $search_key);
            $this->db->or_like('calendar.finish_time', $search_key);
            $this->db->or_like('calendar.location', $search_key);
        }
        $query = $this->db->get();
        if($query)
            return $query->num_rows();
    }
    public function getAll(){
        $role = $this->session->userdata('logged_in')['role'];
        $id = $this->guide->getGuideByEmail($this->session->userdata('logged_in')['email'])[0]->id;
        $this->db->select("*");
        $this->db->from($this->table);
        if($role==4)
            $this->db->where('requester', $id);
        $query = $this->db->get();
        return $query->result();
    }
    public function getMinDateEvent(){
        $role = $this->session->userdata('logged_in')['role'];
        $id = $this->guide->getGuideByEmail($this->session->userdata('logged_in')['email'])[0]->id;
        $this->db->select("*");
        $this->db->from($this->table);
        if($role==4)
            $this->db->where('requester', $id);
        $this->db->order_by('event_date', 'asc');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result();
    }
    public function getMaxDateEvent(){
        $role = $this->session->userdata('logged_in')['role'];
        $id = $this->guide->getGuideByEmail($this->session->userdata('logged_in')['email'])[0]->id;
        $this->db->select("*");
        $this->db->from($this->table);
        if($role==4)
            $this->db->where('requester', $id);
        $this->db->order_by('event_date', 'desc');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result();
    }
    public function getEventsByDate($date){
        $role = $this->session->userdata('logged_in')['role'];
        $id = $this->guide->getGuideByEmail($this->session->userdata('logged_in')['email'])[0]->id;
        $this->db->select("*");
        $this->db->from($this->table);
        if($role==0)
            $this->db->where(array('event_date'=>$date));
        if($role==4)
            $this->db->where(array('event_date'=>$date, 'requester'=>$id));
        $this->db->order_by('event_date', 'asc');
        $this->db->order_by('start_time', 'asc');
        $query = $this->db->get();
        return $query->result();
    }
    public function getEventById($id){
        $query = $this->db->get_where($this->table, array('id'=>$id));
        return $query->result();
    }
    public function delete($id){
       $this->db->delete($this->table, array('id'=>$id));
    }
}
