<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GuideUnavailability_model extends CI_Model {

    var $table = 'guide_calendar_unavailabilities';
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
        return $this->db->affected_rows();
    }
    public function getUnavailableDaysByParams($page, $perpage, $search_key, $sort_field, $sort_sort){
        $role = $this->session->userdata('logged_in')['role'];
        $email = $this->session->userdata('logged_in')['email'];
        $id = $this->guide->getGuideByEmail($email)[0]->id;
        if($search_key){
            $search_key = "%".$search_key."%";
            if($sort_field && $sort_sort){
                $str = sprintf("SELECT guide_calendar_unavailabilities.id, guide_calendar_unavailabilities.days, guide_calendar_unavailabilities.from, guide_calendar_unavailabilities.to FROM `guide_calendar_unavailabilities` WHERE ( guide_calendar_unavailabilities.days LIKE '%s' ) AND guide_calendar_unavailabilities.guide = '%s' ORDER BY %s %s LIMIT %d OFFSET %d", $$search_key, $id, $sort_field, $sort_sort, $perpage, ($page-1)*$perpage);
            }
            else {
                $str = sprintf("SELECT guide_calendar_unavailabilities.id, guide_calendar_unavailabilities.days, guide_calendar_unavailabilities.from, guide_calendar_unavailabilities.to FROM `guide_calendar_unavailabilities` WHERE (guide_calendar_unavailabilities.days LIKE '%s') AND  guide_calendar_unavailabilities.guide = '%s' LIMIT %d OFFSET %d", $search_key, $id, $perpage, ($page-1)*$perpage);
            }
        }
        else{
            if($sort_field && $sort_sort)
                $str = sprintf("SELECT guide_calendar_unavailabilities.id, guide_calendar_unavailabilities.days, guide_calendar_unavailabilities.from, guide_calendar_unavailabilities.to FROM `guide_calendar_unavailabilities` WHERE guide_calendar_unavailabilities.guide = '%s' ORDER BY %s %s LIMIT %d OFFSET %d", $id, $sort_field, $sort_sort, $perpage, ($page-1)*$perpage );
            else
                $str = sprintf("SELECT guide_calendar_unavailabilities.id, guide_calendar_unavailabilities.days, guide_calendar_unavailabilities.from, guide_calendar_unavailabilities.to FROM `guide_calendar_unavailabilities` WHERE guide_calendar_unavailabilities.guide = '%s' LIMIT %d OFFSET %d", $id, $perpage, ($page-1)*$perpage );
        }
        $query = $this->db->query($str);
        if($query)
            return $query->result();    
    }
    public function getUnavailableDaysTotal($search_key){
        $role = $this->session->userdata('logged_in')['role'];
        $email = $this->session->userdata('logged_in')['email'];
        $id = $this->guide->getGuideByEmail($email)[0]->id;

        if($search_key){
            $search_key = "%".$search_key."%";
            $str = sprintf("SELECT guide_calendar_unavailabilities.id, guide_calendar_unavailabilities.days, guide_calendar_unavailabilities.from, guide_calendar_unavailabilities.to FROM `guide_calendar_unavailabilities` WHERE ( guide_calendar_unavailabilities.days LIKE '%s') AND  guide_calendar_unavailabilities.guide = '%s'", $search_key, $id);
        }
        else{
            $str = sprintf("SELECT guide_calendar_unavailabilities.id, guide_calendar_unavailabilities.days, guide_calendar_unavailabilities.from, guide_calendar_unavailabilities.to FROM `guide_calendar_unavailabilities` WHERE guide_calendar_unavailabilities.guide = '%s'", $id);
        }
        $query = $this->db->query($str);
        if($query)
            return $query->num_rows();
    }
    public function getUnavailabilityById($id){
        $query = $this->db->get_where($this->table, array('id'=>$id));
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
