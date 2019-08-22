<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TicketHistory_model extends CI_Model {

	var $table = 'ticket_histories';
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
    public function getTicketHistoriesByTicketId($ticket_id)
    {
        $this->db->select("ticket_histories.id, ticket_histories.ticket_id, users.name as from, users.role, ticket_histories.message, ticket_histories.reply_date");
        $this->db->from('ticket_histories');
        $this->db->join('tickets', 'tickets.ticket_id=ticket_histories.ticket_id');
        $this->db->join('users', 'users.id=ticket_histories.from');
        $this->db->where('ticket_histories.ticket_id', $ticket_id);
        $this->db->order_by('reply_date', 'asc');
        $query = $this->db->get();
        return $query->result();
    }
    public function getAll(){
        $query = $this->db->get($this->table);
        return $query->result();
    }
    public function getTicketHistoryById($id){
        $query = $this->db->get_where($this->table, array('id'=>$id));
        return $query->result();
    }
    public function delete($id){
       $this->db->delete($this->table, array('id'=>$id));
    }
}
