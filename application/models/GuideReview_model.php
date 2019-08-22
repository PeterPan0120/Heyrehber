<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GuideReview_model extends CI_Model {

	var $table = 'guide_reviews';
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
    public function getGuideReviewsByParams($page, $perpage, $search_key, $sort_field, $sort_sort){
        $this->db->select("guide_reviews.id, guides.username as guide, agencies.username as agency, guide_reviews.rating, guide_reviews.submission_date");
        $this->db->from($this->table);
        $this->db->join("guides", "guides.id=guide_reviews.guide");
        $this->db->join("agencies", "agencies.id=guide_reviews.agency");
        if($search_key!=""){
            $this->db->like('guides.guide', $search_key);
            $this->db->or_like('agencies.agency', $search_key);
            $this->db->or_like('guide_reviews.submission_date', $search_key);
        }
        if($sort_field!="")
            $this->db->order_by($sort_field, $sort_sort);
        $this->db->limit($perpage, ($page-1)*$perpage);
        $query = $this->db->get();  
        if($query)
            return $query->result();
    }
    public function getGuideReviewsTotal($search_key){
        $this->db->select("guide_reviews.id, guides.username as guide, agencies.username as agency, guide_reviews.rating, guide_reviews.submission_date");
        $this->db->from($this->table);
        $this->db->join("guides", "guides.id=guide_reviews.guide");
        $this->db->join("agencies", "agencies.id=guide_reviews.agency");
        if($search_key!=""){
            $this->db->like('guides.guide', $search_key);
            $this->db->or_like('agencies.agency', $search_key);
            $this->db->or_like('guide_reviews.submission_date', $search_key);
        }
        $query = $this->db->get();
        if($query)
            return $query->num_rows();
    }
    public function getMyReviewsByParams($page, $perpage, $search_key, $sort_field, $sort_sort){
        $role = $this->session->userdata('logged_in')['role'];
        $email = $this->session->userdata('logged_in')['email'];
        $id = $this->guide->getGuideByEmail($email)[0]->id;
        if($search_key){
            $search_key = "%".$search_key."%";
            if($sort_field && $sort_sort){
                $str = sprintf("SELECT guide_reviews.id, guides.username as guide, agencies.username as agency, guide_reviews.rating, guide_reviews.submission_date FROM `guide_reviews` JOIN `guides` ON guide_reviews.guide=guides.id JOIN `agencies` ON guide_reviews.agency=agencies.id WHERE ( agencies.username LIKE '%s' OR  guide_reviews.submission_date LIKE '%s') AND guide_reviews.guide = '%s' ORDER BY %s %s LIMIT %d OFFSET %d", $search_key, $search_key, $id, $sort_field, $sort_sort, $perpage, ($page-1)*$perpage);
            }
            else {
                $str = sprintf("SELECT guide_reviews.id, guides.username as guide, agencies.username as agency, guide_reviews.rating, guide_reviews.submission_date FROM `guide_reviews` JOIN `guides` ON guide_reviews.guide=guides.id JOIN `agencies` ON guide_reviews.agency=agencies.id WHERE (agencies.username LIKE '%s' OR  guide_reviews.submission_date LIKE '%s') AND  guide_reviews.guide = '%s' LIMIT %d OFFSET %d", $search_key, $search_key, $id, $perpage, ($page-1)*$perpage);
            }
        }
        else{
            if($sort_field && $sort_sort)
                $str = sprintf("SELECT guide_reviews.id, guides.username as guide, agencies.username as agency, guide_reviews.rating, guide_reviews.submission_date FROM `guide_reviews` JOIN `guides` ON guide_reviews.guide=guides.id JOIN `agencies` ON guide_reviews.agency=agencies.id WHERE guide_reviews.guide = '%s' ORDER BY %s %s LIMIT %d OFFSET %d", $id, $sort_field, $sort_sort, $perpage, ($page-1)*$perpage );
            else
                $str = sprintf("SELECT guide_reviews.id, guides.username as guide, agencies.username as agency, guide_reviews.rating, guide_reviews.submission_date FROM `guide_reviews` JOIN `guides` ON guide_reviews.guide=guides.id JOIN `agencies` ON guide_reviews.agency=agencies.id WHERE guide_reviews.guide = '%s' LIMIT %d OFFSET %d", $id, $perpage, ($page-1)*$perpage );
        }
        $query = $this->db->query($str);
        if($query)
            return $query->result();    
    }
    public function getMyReviewsTotal($search_key){
        $role = $this->session->userdata('logged_in')['role'];
        $email = $this->session->userdata('logged_in')['email'];
        $id = $this->guide->getGuideByEmail($email)[0]->id;

        if($search_key){
            $search_key = "%".$search_key."%";
            $str = sprintf("SELECT guide_reviews.id, guides.username as guide, agencies.username as agency, guide_reviews.rating, guide_reviews.submission_date FROM `guide_reviews` JOIN `guides` ON guide_reviews.guide=guides.id JOIN `agencies` ON guide_reviews.agency=agencies.id WHERE ( agencies.username LIKE '%s' OR guide_reviews.submission_date LIKE '%s') AND  guide_reviews.guide = '%s'", $search_key, $search_key, $id);
        }
        else{
            $str = sprintf("SELECT guide_reviews.id, guides.username as guide, agencies.username as agency, guide_reviews.rating, guide_reviews.submission_date FROM `guide_reviews` JOIN `guides` ON guide_reviews.guide=guides.id JOIN `agencies` ON guide_reviews.agency=agencies.id WHERE guide_reviews.guide = '%s'", $id);
        }
        $query = $this->db->query($str);
        if($query)
            return $query->num_rows();
    }
    public function getAgencyReviewsByParams($page, $perpage, $search_key, $sort_field, $sort_sort){
        $role = $this->session->userdata('logged_in')['role'];
        $email = $this->session->userdata('logged_in')['email'];
        $id = $this->guide->getGuideByEmail($email)[0]->id;
        if($search_key){
            $search_key = "%".$search_key."%";
            if($sort_field && $sort_sort){
                $str = sprintf("SELECT agency_reviews.id, guides.username as guide, agencies.username as agency, agency_reviews.rating, agency_reviews.submission_date, agency_reviews.status FROM `agency_reviews` JOIN `guides` ON agency_reviews.guide=guides.id JOIN `agencies` ON agency_reviews.agency=agencies.id WHERE ( agencies.username LIKE '%s' OR  agency_reviews.submission_date LIKE '%s') AND agency_reviews.guide = '%s' ORDER BY %s %s LIMIT %d OFFSET %d", $search_key, $search_key, $id, $sort_field, $sort_sort, $perpage, ($page-1)*$perpage);
            }
            else {
                $str = sprintf("SELECT agency_reviews.id, guides.username as guide, agencies.username as agency, agency_reviews.rating, agency_reviews.submission_date, agency_reviews.status FROM `agency_reviews` JOIN `guides` ON agency_reviews.guide=guides.id JOIN `agencies` ON agency_reviews.agency=agencies.id WHERE (agencies.username LIKE '%s' OR  agency_reviews.submission_date LIKE '%s') AND  agency_reviews.guide = '%s' LIMIT %d OFFSET %d", $search_key, $search_key, $id, $perpage, ($page-1)*$perpage);
            }
        }
        else{
            if($sort_field && $sort_sort)
                $str = sprintf("SELECT agency_reviews.id, guides.username as guide, agencies.username as agency, agency_reviews.rating, agency_reviews.submission_date, agency_reviews.status FROM `agency_reviews` JOIN `guides` ON agency_reviews.guide=guides.id JOIN `agencies` ON agency_reviews.agency=agencies.id WHERE agency_reviews.guide = '%s' ORDER BY %s %s LIMIT %d OFFSET %d", $id, $sort_field, $sort_sort, $perpage, ($page-1)*$perpage );
            else
                $str = sprintf("SELECT agency_reviews.id, guides.username as guide, agencies.username as agency, agency_reviews.rating, agency_reviews.submission_date, agency_reviews.status FROM `agency_reviews` JOIN `guides` ON agency_reviews.guide=guides.id JOIN `agencies` ON agency_reviews.agency=agencies.id WHERE agency_reviews.guide = '%s' LIMIT %d OFFSET %d", $id, $perpage, ($page-1)*$perpage );
        }
        $query = $this->db->query($str);
        if($query)
            return $query->result();    
    }
    public function getAgencyReviewsTotal($search_key){
        $role = $this->session->userdata('logged_in')['role'];
        $email = $this->session->userdata('logged_in')['email'];
        $id = $this->guide->getGuideByEmail($email)[0]->id;

        if($search_key){
            $search_key = "%".$search_key."%";
            $str = sprintf("SELECT agency_reviews.id, guides.username as guide, agencies.username as agency, agency_reviews.rating, agency_reviews.submission_date, agency_reviews.status FROM `agency_reviews` JOIN `guides` ON agency_reviews.guide=guides.id JOIN `agencies` ON agency_reviews.agency=agencies.id WHERE ( agencies.username LIKE '%s' OR agency_reviews.submission_date LIKE '%s') AND  agency_reviews.guide = '%s'", $search_key, $search_key, $id);
        }
        else{
            $str = sprintf("SELECT agency_reviews.id, guides.username as guide, agencies.username as agency, agency_reviews.rating, agency_reviews.submission_date, agency_reviews.status FROM `agency_reviews` JOIN `guides` ON agency_reviews.guide=guides.id JOIN `agencies` ON agency_reviews.agency=agencies.id WHERE agency_reviews.guide = '%s'", $id);
        }
        $query = $this->db->query($str);
        if($query)
            return $query->num_rows();
    }
    public function getAll(){
        $query = $this->db->get($this->table);
        return $query->result();
    }
    public function getGuideReviewById($id){
        $query = $this->db->get_where($this->table, array('id'=>$id));
        return $query->result();
    }
    public function delete($id){
       $this->db->delete($this->table, array('id'=>$id));
    }
}
