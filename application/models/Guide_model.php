<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guide_model extends CI_Model {

	var $table = 'guides';
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
                unset($data['oldemail']);
                // var_dump($data);
                // exit;
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
    public function getGuidesByParams($page, $perpage, $search_key, $region, $language, $district, $city, $status, $sort_field, $sort_sort){
        $this->db->select("*");
        $this->db->from($this->table);
        if(isset($region))
            $this->db->like('guides.regions', $region);
        if(isset($language))
            $this->db->like('guides.languages', $language);
        if(isset($district))
            $this->db->where('guides.district', $district);
        if(isset($city))
            $this->db->where('guides.city', $city);
        if(isset($status))
            $this->db->where('guides.status', $status);
        if($search_key!=""){
            $this->db->like('guides.username', $search_key);
            // $this->db->or_like('regions', $search_key);
            // $this->db->or_like('languages', $search_key);
            // $this->db->or_like('phone_number', $search_key);
        }
        if($sort_field!="")
            $this->db->order_by($sort_field, $sort_sort);
        $this->db->limit($perpage, ($page-1)*$perpage);
        $query = $this->db->get();  
        if($query)
            return $query->result();
    }
    public function getGuidesTotal($search_key, $days, $start_date, $finish_date, $language, $city){
        $this->db->select("*");
        $this->db->from($this->table);
        if(isset($region))
            $this->db->like('guides.regions', $region);
        if(isset($language))
            $this->db->like('guides.languages', $language);
        if(isset($district))
            $this->db->where('guides.district', $district);
        if(isset($city))
            $this->db->where('guides.city', $city);
        if(isset($status))
            $this->db->where('guides.status', $status);
        if($search_key!=""){
            $this->db->like('username', $search_key);
            // $this->db->or_like('regions', $search_key);
            // $this->db->or_like('languages', $search_key);
            // $this->db->or_like('phone_number', $search_key);
        }
        $query = $this->db->get();
        if($query)
            return $query->num_rows();
    }
    public function getSearchGuidesByParams($page, $perpage, $search_key, $days, $start_date, $finish_date, $language, $city, $sort_field, $sort_sort){
        $this->db->select("guides.id, guides.username, guides.phone_number, guides.languages, cities.city as city, districts.district as district");
        $this->db->from($this->table);
        $this->db->join('guide_calendar_availabilities', 'guide_calendar_availabilities.guide=guides.id', 'left');
        $this->db->join('cities', 'cities.id=guides.city');
        $this->db->join('districts', 'districts.id=guides.district');
        $flag=0;
        if($days=="yes"){
            $flag=1;
            $this->db->where('guide_calendar_availabilities.days', 'One Day');
        }
        else if($days=="no"){
            $flag=1;
            $this->db->where('guide_calendar_availabilities.days', 'Several Days');
        }
        if($start_date!=""){
            $flag=1;
            $this->db->where('guide_calendar_availabilities.from<=', $start_date);
            if($finish_date!="")
                $this->db->where('guide_calendar_availabilities.to>=', $finish_date);
            else $this->db->where('guide_calendar_availabilities.to>=', $start_date);
        }
        if($language!=""){
            $flag=1;
            $this->db->like('guides.languages', $language);
        }
        if($city!=""){
            $flag=1;
            $this->db->where('guides.city', $city);
        }
        if($search_key!="")
            $this->db->like('guides.username', $search_key);
        if($sort_field!="")
            $this->db->order_by($sort_field, $sort_sort);
        $this->db->limit($perpage, ($page-1)*$perpage);
        if($flag)
        {
            $query = $this->db->get();  
            if($query)
                return $query->result();
        }
    }
    public function getSearchGuidesTotal($search_key, $days, $start_date, $finish_date, $language, $city){
        $this->db->select("guides.id, guides.username, guides.phone_number, guides.languages, cities.city as city, districts.district as district");
        $this->db->from($this->table);
        $this->db->join('guide_calendar_availabilities', 'guide_calendar_availabilities.guide=guides.id', 'left');
        $this->db->join('cities', 'cities.id=guides.city');
        $this->db->join('districts', 'districts.id=guides.district');
        $flag=0;
        if($days=="yes"){
            $flag=1;
            $this->db->where('guide_calendar_availabilities.days', 'One Day');
        }
        else if($days=="no"){
            $flag=1;
            $this->db->where('guide_calendar_availabilities.days', 'Several Days');
        }
        if($start_date!=""){
            $flag=1;
            $this->db->where('guide_calendar_availabilities.from<=', $start_date);
            if($finish_date!="")
                $this->db->where('guide_calendar_availabilities.to>=', $finish_date);
            else $this->db->where('guide_calendar_availabilities.to>=', $start_date);
        }
        if($language!=""){
            $flag=1;
            $this->db->like('guides.languages', $language);
        }
        if($city!=""){
            $flag=1;
            $this->db->where('guides.city', $city);
        }
        if($search_key!="")
            $this->db->like('guides.username', $search_key);
        if($flag){
            $query = $this->db->get();
            if($query)
                return $query->num_rows();
        }
    }
    public function getMatchedGuidesByParams($language, $start_date, $finish_date){
        $this->db->select("guides.id, guides.username, guides.phone_number, guides.languages, cities.city as city, districts.district as district");
        $this->db->from($this->table);
        $this->db->join('guide_calendar_availabilities', 'guide_calendar_availabilities.guide=guides.id', 'left');
        $this->db->join('cities', 'cities.id=guides.city');
        $this->db->join('districts', 'districts.id=guides.district');
        $flag=0;
        if($days=="yes"){
            $flag=1;
            $this->db->where('guide_calendar_availabilities.days', 'One Day');
        }
        else if($days=="no"){
            $flag=1;
            $this->db->where('guide_calendar_availabilities.days', 'Several Days');
        }
        if($start_date!=""){
            $flag=1;
            $this->db->where('guide_calendar_availabilities.from<=', $start_date);
            if($finish_date!="")
                $this->db->where('guide_calendar_availabilities.to>=', $finish_date);
            else $this->db->where('guide_calendar_availabilities.to>=', $start_date);
        }
        if($language!=""){
            $flag=1;
            $this->db->like('guides.languages', $language);
        }
        if($city!=""){
            $flag=1;
            $this->db->where('guides.city', $city);
        }
        if($search_key!="")
            $this->db->like('guides.username', $search_key);
        if($sort_field!="")
            $this->db->order_by($sort_field, $sort_sort);
        $this->db->limit($perpage, ($page-1)*$perpage);
        if($flag)
        {
            $query = $this->db->get();  
            if($query)
                return $query->result();
        }
    }
    public function getAll(){
        $query = $this->db->get($this->table);
        return $query->result();
    }
    public function getGuideById($id){
        $query = $this->db->get_where($this->table, array('id'=>$id));
        return $query->result();
    }
    public function getGuideByEmail($email){
        $query = $this->db->get_where($this->table, array('email'=>$email));
        return $query->result();
    }
    public function delete($id){
       $this->db->delete($this->table, array('id'=>$id));
    }
}
