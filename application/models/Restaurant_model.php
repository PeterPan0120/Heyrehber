<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Restaurant_model extends CI_Model {

    var $table = 'restaurants';
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
                // var_dump($data);
                if(isset($data['oldemail']))
                    unset($data['oldemail']);
                $this->db->update($this->table, $data, array('id'=>$id));
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
    public function getRestaurantsByParams($page, $perpage, $search_key, $category, $district, $city, $status, $sort_field, $sort_sort){
        $role = $this->session->userdata('logged_in')['role'];
            $this->db->select("restaurants.id, restaurants.name, restaurants.category, restaurants.rating, restaurants.address, districts.district, cities.city, countries.country, restaurants.number, restaurants.status");
            $this->db->from($this->table);
            $this->db->join('districts', 'districts.id=restaurants.district');
            $this->db->join('cities', 'cities.id=restaurants.city');
            $this->db->join('countries', 'countries.id=restaurants.country');
            if(isset($category))
                $this->db->like('restaurants.category', $category);
            if(isset($district))
                $this->db->where('restaurants.district', $district);
            if(isset($city))
                $this->db->where('restaurants.city', $city);
            if($role==0){
                if(isset($status))
                    $this->db->where('restaurants.status', $status);
            }
            else $this->db->where('restaurants.status', 'active');
            if($search_key!=""){
                $this->db->like('restaurants.name', $search_key);
            }
            if($sort_field!="")
                $this->db->order_by($sort_field, $sort_sort);
            $this->db->limit($perpage, ($page-1)*$perpage);
            $query = $this->db->get();  
            if($query)
                return $query->result();
        //}
    }
    public function getRestaurantsTotal($search_key, $category, $district, $city, $status){
        $role = $this->session->userdata('logged_in')['role'];
            $this->db->select("restaurants.id, restaurants.name, restaurants.category, restaurants.rating, restaurants.address, districts.district, cities.city, countries.country, restaurants.number, restaurants.status");
            $this->db->from($this->table);
            $this->db->join('districts', 'districts.id=restaurants.district');
            $this->db->join('cities', 'cities.id=restaurants.city');
            $this->db->join('countries', 'countries.id=restaurants.country');
            if(isset($category))
                $this->db->like('restaurants.category', $category);
            if(isset($district))
                $this->db->where('restaurants.district', $district);
            if(isset($city))
                $this->db->where('restaurants.city', $city);
            if($role==0){
                if(isset($status))
                    $this->db->where('restaurants.status', $status);
            } 
            else $this->db->where('restaurants.status', 'active');
            if($search_key!=""){
                $this->db->like('restaurants.name', $search_key);
            }
            $query = $this->db->get();
            if($query)
                return $query->num_rows();
        //}
    }
    public function getAll(){
        $query = $this->db->get($this->table);
        return $query->result();
    }
    public function getRestaurantById($id){
        $query = $this->db->get_where($this->table, array('id'=>$id));
        return $query->result();
    }
    public function delete($id){
       $this->db->delete($this->table, array('id'=>$id));
    }
}
