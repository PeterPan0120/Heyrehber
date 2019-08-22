<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    var $table = 'users';
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }
    public function login_check($username, $password){
        $query = $this->db->get_where($this->table, array('name'=>$username, 'password'=>md5($password)));
        if ($query->num_rows() != 0) {
            $row = $query->row();
            $sess_data = array(
                'user_id' => $row->id,
                'username' => $row->name,
                'email'=>$row->email,
                'password'=>$row->password,
                'role' => $row->role
            );
            $this->session->set_userdata('logged_in', $sess_data);
            return true;
        }
        else return false;
    }
    public function login_forgot_check($email){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('email', $email);
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            $row = $query->row();
            
            $sess_data = array(
                'user_id' => $row->id,
                'username' => $row->name,
                'email' => $row->email,
                'password'=>$row->password,
                'role' => $row->role
            );
            $this->session->set_userdata('logged_in', $sess_data);
            return true;
        }
        else return false;
    }
    public function getUsersBySearchkey($search_key){
        $this->db->select("*");
        $this->db->from($this->table);
        if($search_key!="")
            $this->db->like('name', $search_key);
        $query = $this->db->get();  
        if($query)
            return $query->result();
    }
    public function getUsersByParams($page, $perpage, $search_key, $sort_field, $sort_sort){
        $this->db->select("*");
        $this->db->from($this->table);
        if($search_key!=""){
            $this->db->like('name', $search_key);
            $this->db->like('email', $search_key);
            $this->db->or_like('role', $search_key);
        }
        if($sort_field!="")
            $this->db->order_by($sort_field, $sort_sort);
        $this->db->limit($perpage, ($page-1)*$perpage);
        $query = $this->db->get();

        if($query)
            return $query->result();
    }
    public function getUsersTotal($search_key){
        $this->db->select("*");
        $this->db->from($this->table);
        if($search_key!=""){
            $this->db->like('name', $search_key);
            $this->db->like('email', $search_key);
            $this->db->or_like('role', $search_key);
        }
        $query = $this->db->get();
        if($query)
            return $query->num_rows();
    }
    public function save($data){
        $query = $this->db->get_where($this->table, array('email'=>$data['email']));
        if($query->num_rows()==0){
            $this->db->insert($this->table, $data);
            return $this->db->insert_id();
        }
    }
    public function update($oldemail, $data){
        if(isset($data['email'])){
            $query = $this->db->get_where($this->table, array('email'=>$data['email']));
            if($query->num_rows()==0 || $oldemail == $data['email']){
                $this->db->update($this->table, $data, array('email'=>$oldemail));
                //echo $this->db->affected_rows();
                return $this->db->affected_rows();
            }
        }
        else {
            //$query = $this->db->get_where($this->table, array('email'=>$oldemail));
            $this->db->select("*");
            $this->db->from($this->table);
            $this->db->where('email', $oldemail);
            $this->db->update($this->table, $data);
            return $this->db->affected_rows();
        }
    }
    public function getAll(){
        $query = $this->db->get($this->table);
        return $query->result();
    }
    public function getUserByEmail($email){
        $query = $this->db->get_where($this->table, array('email'=>$email));
        return $query->result();
    }
    public function getUserById($id){
        $query = $this->db->get_where($this->table, array('id'=>$id));
        return $query->result();
    }
    public function getUserByRole($role){
        $query = $this->db->get_where($this->table, array('role'=>$role));
        return $query->result();
    }
    public function delete($email){
       $this->db->delete($this->table, array('email'=>$email));
    }
}
