<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FavouriteGuide_model extends CI_Model {

	var $table = 'agency_favourite_guides';
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
        $this->load->model('Guide_model', 'guide');
	}
    public function save($data){
        $query = $this->db->get_where($this->table, array('favourite_guide'=>$data['favourite_guide']));
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
    public function getMyFavouriteGuidesByParams($page, $perpage, $search_key, $sort_field, $sort_sort){
        $role = $this->session->userdata('logged_in')['role'];
        $useremail = $this->session->userdata('logged_in')['email'];
        $id = $this->agency->getAgencyByEmail($useremail)[0]->id;
        if($search_key){
            $search_key = "%".$search_key."%";
            if($sort_field && $sort_sort){
                $str = sprintf("SELECT agency_favourite_guides.id, guides.id as guide_id, guides.username as favourite_guide FROM `agency_favourite_guides` JOIN `guides` ON guides.id=agency_favourite_guides.favourite_guide WHERE ( guides.username LIKE '%s' ) AND  agency_favourite_guides.agency = '%s' ORDER BY %s %s LIMIT %d OFFSET %d", $search_key, $id, $sort_field, $sort_sort, $perpage, ($page-1)*$perpage);
            }
            else {
                $str = sprintf("SELECT agency_favourite_guides.id, guides.id as guide_id, guides.username as favourite_guide FROM `agency_favourite_guides` JOIN `guides` ON guides.id=agency_favourite_guides.favourite_guide WHERE ( guides.username LIKE '%s' ) AND agency_favourite_guides.agency = '%s' LIMIT %d OFFSET %d", $search_key, $id, $perpage, ($page-1)*$perpage);
            }
        }
        else{
            if($sort_field && $sort_sort)
                $str = sprintf("SELECT agency_favourite_guides.id, guides.id as guide_id, guides.username as favourite_guide FROM `agency_favourite_guides` JOIN `guides` ON guides.id=agency_favourite_guides.favourite_guide WHERE agency_favourite_guides.agency = '%s' ORDER BY %s %s LIMIT %d OFFSET %d", $id, $sort_field, $sort_sort, $perpage, ($page-1)*$perpage );
            else
                $str = sprintf("SELECT agency_favourite_guides.id, guides.id as guide_id, guides.username as favourite_guide FROM `agency_favourite_guides` JOIN `guides` ON guides.id=agency_favourite_guides.favourite_guide  WHERE agency_favourite_guides.agency = '%s' LIMIT %d OFFSET %d", $id, $perpage, ($page-1)*$perpage );
        }
        $query = $this->db->query($str);
        if($query)
            return $query->result();    
    }
    public function getMyFavouriteGuidesTotal($search_key){
        $role = $this->session->userdata('logged_in')['role'];
        $useremail = $this->session->userdata('logged_in')['email'];
        $id = $this->agency->getAgencyByEmail($useremail)[0]->id;
        if($search_key){
            $search_key = "%".$search_key."%";
            $str = sprintf("SELECT agency_favourite_guides.id, guides.id as guide_id, guides.username as favourite_guide FROM `agency_favourite_guides` JOIN `guides` ON guides.id=agency_favourite_guides.favourite_guide WHERE ( guides.username LIKE '%s') AND agency_favourite_guides.agency = '%s'", $search_key, $id);
        }
        else
            $str = sprintf("SELECT agency_favourite_guides.id, guides.id as guide_id, guides.username as favourite_guide FROM `agency_favourite_guides` JOIN `guides` ON guides.id=agency_favourite_guides.favourite_guide WHERE agency_favourite_guides.agency = '%s'", $id);
        $query = $this->db->query($str);
        if($query)
            return $query->num_rows();
    }
    public function getFavouriteGuideById($id){
        $query = $this->db->get_where($this->table, array('id'=>$id));
        return $query->result();
    }
    public function delete($id){
       $this->db->delete($this->table, array('id'=>$id));
    }
}
