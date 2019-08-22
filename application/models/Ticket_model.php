<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ticket_model extends CI_Model {

	var $table = 'tickets';
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
        $this->load->model("User_model", 'users');
        $this->load->model("Agency_model", 'agency');
        $this->load->model("Guide_model", 'guide');
	}
    public function save($data){
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    public function update($ticket_id, $data){
        $this->db->update($this->table, $data, array('ticket_id'=>$ticket_id));
        return $this->db->affected_rows();
    }
    public function getTicketsByParams($page, $perpage, $search_key, $sort_field, $sort_sort){
        $this->db->select("tickets.id, tickets.ticket_id, tickets.subject, tickets.priority, tickets.status, users.name as from, tickets.role, tickets.submission_date, tickets.last_updated");
        $this->db->from($this->table);
        $this->db->join('users', 'users.id=tickets.from');
        if($search_key!=""){
            $this->db->like('tickets.ticket_id', $search_key);
            $this->db->or_like('tickets.subject', $search_key);
            $this->db->or_like('tickets.priority', $search_key);
            $this->db->or_like('tickets.status', $search_key);
            $this->db->or_like('users.name', $search_key);
            $this->db->or_like('tickets.status', $search_key);
        }
        if($sort_field!="")
            $this->db->order_by($sort_field, $sort_sort);
        else $this->db->order_by('last_updated', 'desc');
        $this->db->limit($perpage, ($page-1)*$perpage);
        $query = $this->db->get();  
        if($query)
            return $query->result();
    }
    public function getTicketsTotal($search_key){
        $this->db->select("tickets.id, tickets.ticket_id, tickets.subject, tickets.priority, tickets.status, users.name as from, tickets.role, tickets.submission_date, tickets.last_updated");
        $this->db->from($this->table);
        $this->db->join('users', 'users.id=tickets.from');
        if($search_key!=""){
            $this->db->like('tickets.ticket_id', $search_key);
            $this->db->or_like('tickets.subject', $search_key);
            $this->db->or_like('tickets.priority', $search_key);
            $this->db->or_like('tickets.status', $search_key);
            $this->db->or_like('users.name', $search_key);
            $this->db->or_like('tickets.status', $search_key);
        }
        $query = $this->db->get();
        if($query) 
            return $query->num_rows();
    }
    public function getMyTicketsByParams($page, $perpage, $search_key, $sort_field, $sort_sort){
        $role = $this->session->userdata('logged_in')['role'];
        $useremail = $this->session->userdata('logged_in')['email'];
        $role = $this->session->userdata('logged_in')['role'];
        $id = $this->user->getUserByEmail($useremail)[0]->id;
        if($search_key){
            $search_key = "%".$search_key."%";
            if($sort_field && $sort_sort){
                if($role==3)
                    $str = sprintf("SELECT tickets.id, tickets.ticket_id, tickets.subject, tickets.submission_date, tickets.priority, tickets.status, tickets.last_updated  FROM `tickets` JOIN `users` ON tickets.from=users.id WHERE (tickets.ticket_id LIKE '%s' OR tickets.subject LIKE '%s' OR tickets.category LIKE '%s' OR tickets.submission_date LIKE '%s' OR users.username LIKE '%s' OR  tickets.priority LIKE '%s' OR  tickets.status LIKE '%s' OR tickets.last_updated LIKE '%s') AND tickets.from = '%s' AND tickets.role=3 ORDER BY %s %s LIMIT %d OFFSET %d", $search_key, $search_key, $search_key, $search_key, $search_key, $search_key, $search_key, $search_key, $id, $sort_field, $sort_sort, $perpage, ($page-1)*$perpage);
                else if($role==4)
                    $str = sprintf("SELECT tickets.id, tickets.ticket_id, tickets.subject, tickets.submission_date, tickets.priority, tickets.status, tickets.last_updated  FROM `tickets` JOIN `users` ON tickets.from=users.id WHERE (tickets.ticket_id LIKE '%s' OR tickets.subject LIKE '%s' OR tickets.category LIKE '%s' OR tickets.submission_date LIKE '%s' OR users.name LIKE '%s' OR  tickets.priority LIKE '%s' OR  tickets.status LIKE '%s' OR tickets.last_updated LIKE '%s') AND tickets.from = '%s' AND tickets.role=4 ORDER BY %s %s LIMIT %d OFFSET %d", $search_key, $search_key, $search_key, $search_key, $search_key, $search_key, $search_key, $search_key, $id, $sort_field, $sort_sort, $perpage, ($page-1)*$perpage);
            }
            else {
                if($role==3)
                    $str = sprintf("SELECT tickets.id, tickets.ticket_id, tickets.subject, tickets.submission_date, tickets.priority, tickets.status, tickets.last_updated  FROM `tickets` JOIN `users` ON tickets.from=users.id WHERE (tickets.ticket_id LIKE '%s' OR tickets.subject LIKE '%s' OR tickets.category LIKE '%s' OR tickets.submission_date LIKE '%s' OR users.username LIKE '%s' OR  tickets.priority LIKE '%s' OR  tickets.status LIKE '%s' OR tickets.last_updated LIKE '%s') AND tickets.from = '%s' AND tickets.role=3 LIMIT %d OFFSET %d", $search_key, $search_key, $search_key, $search_key, $search_key, $search_key, $search_key, $search_key, $id, $perpage, ($page-1)*$perpage);
                else if($role==4)
                    $str = sprintf("SELECT tickets.id, tickets.ticket_id, tickets.subject, tickets.submission_date, tickets.priority, tickets.status, tickets.last_updated  FROM `tickets` JOIN `users` ON tickets.from=users.id WHERE (tickets.ticket_id LIKE '%s' OR tickets.subject LIKE '%s' OR tickets.category LIKE '%s' OR tickets.submission_date LIKE '%s' OR users.name LIKE '%s' OR  tickets.priority LIKE '%s' OR  tickets.status LIKE '%s' OR tickets.last_updated LIKE '%s') AND tickets.from = '%s' AND tickets.role=4 LIMIT %d OFFSET %d", $search_key, $search_key, $search_key, $search_key, $search_key, $search_key, $search_key, $search_key, $id, $perpage, ($page-1)*$perpage);
            }
        }
        else{
            if($sort_field && $sort_sort){
                if($role==3)
                    $str = sprintf("SELECT tickets.id, tickets.ticket_id, tickets.subject, tickets.submission_date, tickets.priority, tickets.status, tickets.last_updated FROM `tickets` JOIN `users` ON tickets.from=users.id WHERE tickets.from = '%s' AND tickets.role=3 ORDER BY %s %s LIMIT %d OFFSET %d", $id, $sort_field, $sort_sort, $perpage, ($page-1)*$perpage );
                else if($role==4)
                    $str = sprintf("SELECT tickets.id, tickets.ticket_id, tickets.subject, tickets.submission_date, users.name, tickets.priority, tickets.status, tickets.last_updated FROM `tickets` JOIN `users` ON tickets.from=users.id WHERE tickets.from = '%s' AND tickets.role=4 ORDER BY %s %s LIMIT %d OFFSET %d", $id, $sort_field, $sort_sort, $perpage, ($page-1)*$perpage );
            }
            else{
                if($role==3)
                    $str = sprintf("SELECT tickets.id, tickets.ticket_id, tickets.subject, tickets.submission_date, tickets.priority, tickets.status, tickets.last_updated FROM `tickets` JOIN `users` ON tickets.from=users.id WHERE tickets.from = '%s' AND tickets.role=3 LIMIT %d OFFSET %d", $id, $perpage, ($page-1)*$perpage );
                else if($role==4)
                    $str = sprintf("SELECT tickets.id, tickets.ticket_id, tickets.subject, tickets.submission_date, users.name, tickets.priority, tickets.status, tickets.last_updated FROM `tickets` JOIN `users` ON tickets.from=users.id WHERE tickets.from = '%s' AND tickets.role=4 LIMIT %d OFFSET %d", $id, $perpage, ($page-1)*$perpage );
            }
        }
        $query = $this->db->query($str);
        if($query)
            return $query->result();
    }
    public function getMyTicketsTotal($search_key){
        $role = $this->session->userdata('logged_in')['role'];
        $useremail = $this->session->userdata('logged_in')['email'];
        $role = $this->session->userdata('logged_in')['role'];
        $id = $this->user->getUserByEmail($useremail)[0]->id;
        if($search_key){
            $search_key = "%".$search_key."%";
            if($role==3)
                $str = sprintf("SELECT tickets.id, tickets.ticket_id, tickets.subject, tickets.submission_date, tickets.priority, tickets.status, tickets.last_updated  FROM `tickets` JOIN `users` ON tickets.from=users.id WHERE (tickets.ticket_id LIKE '%s' OR tickets.subject LIKE '%s' OR tickets.category LIKE '%s' OR tickets.submission_date LIKE '%s' OR users.username LIKE '%s' OR  tickets.priority LIKE '%s' OR  tickets.status LIKE '%s' OR tickets.last_updated LIKE '%s') AND tickets.from = '%s' AND tickets.role=3", $search_key, $search_key, $search_key, $search_key, $search_key, $search_key, $search_key, $search_key, $id);
            else if($role==4)
                $str = sprintf("SELECT tickets.id, tickets.ticket_id, tickets.subject, tickets.submission_date, tickets.priority, tickets.status, tickets.last_updated  FROM `tickets` JOIN `users` ON tickets.from=users.id WHERE (tickets.ticket_id LIKE '%s' OR tickets.subject LIKE '%s' OR tickets.category LIKE '%s' OR tickets.submission_date LIKE '%s' OR users.name LIKE '%s' OR tickets.priority LIKE '%s' OR  tickets.status LIKE '%s' OR tickets.last_updated LIKE '%s') AND tickets.from = '%s' AND tickets.role=4", $search_key, $search_key, $search_key, $search_key, $search_key, $search_key, $search_key, $search_key, $id);
        }
        else{
            if($role==3)
                $str = sprintf("SELECT tickets.id, tickets.ticket_id, tickets.subject, tickets.submission_date, users.name, tickets.priority, tickets.status, tickets.last_updated FROM `tickets` JOIN `users` ON tickets.from=users.id WHERE tickets.from = '%s' AND tickets.role=3", $id);
            else if($role==4){
                $str = sprintf("SELECT tickets.id, tickets.ticket_id, tickets.subject, tickets.submission_date, tickets.priority, tickets.status, tickets.last_updated FROM `tickets` JOIN `users` ON tickets.from=users.id WHERE tickets.from = '%s' AND tickets.role=4", $id);
            }
        }
        $query = $this->db->query($str);
        if($query)
            return $query->num_rows();
    }
    public function getAll(){
        $query = $this->db->get($this->table);
        return $query->result();
    }
    public function getTicketById($id){
        $query = $this->db->get_where($this->table, array('id'=>$id));
        return $query->result();
    }
    public function delete($id){
       $this->db->delete($this->table, array('id'=>$id));
    }
}
