<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NonFavouriteAgency_model extends CI_Model {

    var $table = 'guide_non_favourite_agencies';
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->model('Agency_model', 'agency');
        $this->load->model('Guide_model', 'guide');
    }
    public function save($data){
        $query = $this->db->get_where($this->table, array('non_favourite_agency'=>$data['non_favourite_agency']));
        if($query->num_rows()==0){
            $this->db->insert($this->table, $data);
            return $this->db->insert_id();
        }
    }
    public function update($id, $data){
        $this->db->update($this->table, $data, array('id'=>$id));
        return $this->db->affected_rows();
    }
    public function getAll(){
        $query = $this->db->get($this->table);
        return $query->result();
    }
    public function getMyNonFavouriteAgenciesByParams($page, $perpage, $search_key, $sort_field, $sort_sort){
        $role = $this->session->userdata('logged_in')['role'];
        $useremail = $this->session->userdata('logged_in')['email'];
        $id = $this->guide->getGuideByEmail($useremail)[0]->id;
        if($search_key){
            $search_key = "%".$search_key."%";
            if($sort_field && $sort_sort){
                $str = sprintf("SELECT guide_non_favourite_agencies.id, agencies.username as non_favourite_agency FROM `guide_non_favourite_agencies` JOIN `guides` ON guides.id=guide_non_favourite_agencies.guide JOIN `agencies` ON agencies.id=guide_non_favourite_agencies.non_favourite_agency WHERE ( agencies.username LIKE '%s' ) AND  guide_non_favourite_agencies.guide = '%s' ORDER BY %s %s LIMIT %d OFFSET %d", $search_key, $id, $sort_field, $sort_sort, $perpage, ($page-1)*$perpage);
            }
            else {
                $str = sprintf("SELECT guide_non_favourite_agencies.id, agencies.username as non_favourite_agency FROM `guide_non_favourite_agencies` JOIN `guides` ON guides.id=guide_non_favourite_agencies.guide JOIN `agencies` ON agencies.id=guide_non_favourite_agencies.non_favourite_agency WHERE ( agencies.username LIKE '%s' ) AND guide_non_favourite_agencies.guide = '%s' LIMIT %d OFFSET %d", $search_key, $id, $perpage, ($page-1)*$perpage);
            }
        }
        else{
            if($sort_field && $sort_sort)
                $str = sprintf("SELECT guide_non_favourite_agencies.id, agencies.username as non_favourite_agency FROM `guide_non_favourite_agencies` JOIN `guides` ON guides.id=guide_non_favourite_agencies.guide JOIN `agencies` ON agencies.id=guide_non_favourite_agencies.non_favourite_agency WHERE guide_non_favourite_agencies.guide = '%s' ORDER BY %s %s LIMIT %d OFFSET %d", $id, $sort_field, $sort_sort, $perpage, ($page-1)*$perpage );
            else
                $str = sprintf("SELECT guide_non_favourite_agencies.id, agencies.username as non_favourite_agency FROM `guide_non_favourite_agencies` JOIN `guides` ON guides.id=guide_non_favourite_agencies.guide JOIN `agencies` ON agencies.id=guide_non_favourite_agencies.non_favourite_agency  WHERE guide_non_favourite_agencies.guide = '%s' LIMIT %d OFFSET %d", $id, $perpage, ($page-1)*$perpage );
        }
        $query = $this->db->query($str);
        if($query)
            return $query->result();    
    }
    public function getMyNonFavouriteAgenciesTotal($search_key){
        $role = $this->session->userdata('logged_in')['role'];
        $useremail = $this->session->userdata('logged_in')['email'];
        $id = $this->guide->getGuideByEmail($useremail)[0]->id;
        if($search_key){
            $search_key = "%".$search_key."%";
            $str = sprintf("SELECT guide_non_favourite_agencies.id, agencies.username as non_favourite_agency FROM `guide_non_favourite_agencies` JOIN `guides` ON guides.id=guide_non_favourite_agencies.guide JOIN `agencies` ON agencies.id=guide_non_favourite_agencies.non_favourite_agency WHERE ( agencies.username LIKE '%s') AND guide_non_favourite_agencies.guide = '%s'", $search_key, $id);
        }
        else
            $str = sprintf("SELECT guide_non_favourite_agencies.id, agencies.username as non_favourite_agency FROM `guide_non_favourite_agencies` JOIN `guides` ON guides.id=guide_non_favourite_agencies.guide JOIN `agencies` ON agencies.id=guide_non_favourite_agencies.non_favourite_agency WHERE guide_non_favourite_agencies.guide = '%s'", $id);
        $query = $this->db->query($str);
        if($query)
            return $query->num_rows();
    }
    public function getNonFavouriteAgencyById($id){
        $query = $this->db->get_where($this->table, array('id'=>$id));
        return $query->result();
    }
    public function delete($id){
       $this->db->delete($this->table, array('id'=>$id));
    }
}
