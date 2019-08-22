<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {
        parent::__construct();

        $this->lang->load('information', 'english');
        $this->load->helper('url');
        $this->load->model('User_model', 'user');
        $this->load->model('Guide_model', 'guide');
        $this->load->model('GuideReview_model', 'guide_review');
        $this->load->model('GuideRequest_model', 'guide_request');
        $this->load->model('Agency_model', 'agency');
        $this->load->model('AgencyReview_model', 'agency_review');
        $this->load->model('Page_model', 'page');
        $this->load->model('PageCategory_model', 'page_category');
        $this->load->model('Supervisor_model', 'supervisor');
        $this->load->model('Editor_model', 'editor');
        $this->load->model('Shop_model', 'shop');
        $this->load->model('Restaurant_model', 'restaurant');
        $this->load->model('Museum_model', 'museum');
        $this->load->model('Announcement_model', 'announcement');
        $this->load->model('Department_model', 'department');
        $this->load->model('Country_model', 'country');
        $this->load->model('City_model', 'city');
        $this->load->model('District_model', 'district');
        $this->load->model('Language_model', 'language');
        $this->load->model('Specialisty_model', 'specialisties');
        $this->load->model('Chamber_model', 'chamber');
        $this->load->model('ShopCategory_model', 'shop_category');
        $this->load->model('RestaurantCategory_model', 'restaurant_category');
        $this->load->model('MuseumCategory_model', 'museum_category');
        $this->load->model('SubjectCategory_model', 'subject_category');
        $this->load->model('TourType_model', 'tour_type');
        $this->load->model('Region_model', 'region');
        $this->load->model('Calendar_model', 'calendar');
        $this->load->model('SystemSettings_model', 'system_settings');
        $this->load->model('Ticket_model', 'ticket');
        $this->load->model('UploadImage_model', 'upload_image');
        $this->load->model('TicketHistory_model', 'ticket_history');
        $this->load->model('TicketCategory_model', 'ticket_category');
        $this->load->library('session');

        $allow_multi_language = $this->system_settings->get()[0]->allow_multi_language;

        $this->session->set_userdata('allow_multi_language', $allow_multi_language); 
        if($allow_multi_language=="no"){
            $this->session->unset_userdata('site_lang');
        }
        if(!$this->session->userdata('site_lang')){
            $lang = $this->system_settings->get()[0]->default_admin_language;
            if($lang=="Turkish")
                $this->session->set_userdata('site_lang', "turkish");
            else
                $this->session->set_userdata('site_lang', "english");
        }
        if(!$this->session->userdata('logged_in'))
            redirect('/auth/login');
    }
    public function showSQLFiles(){
        if($this->session->userdata('logged_in')['role']==0){
            $data['sidebar_label'] = $this->lang->line('admin_sidebar');
            $data['label'] = $this->lang->line('admin_sql_list');
            $this->load->view('pages/sql', $data);
        }
        else redirect('/auth/login');
    }
    public function updateSQL(){
        $filename = $this->input->get('file');
        $mysql_host = $this->db->hostname;
        $mysql_username = $this->db->username;
        $mysql_password = $this->db->password;
        $mysql_database = $this->db->database;
        $mysqli = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);
        $mysqli->query('SET foreign_key_checks = 0');
        if ($result = $mysqli->query("SHOW TABLES"))
        {
            while($row = $result->fetch_array(MYSQLI_NUM))
            {
                $mysqli->query('DROP TABLE IF EXISTS '.$row[0]);
            }
        }

        $mysqli->query('SET foreign_key_checks = 1');
        //$mysqli->close();
        error_reporting(E_ALL & ~E_DEPRECATED);
        $mysqli = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);
        $templine = '';
        $lines = file('7414/'.$filename);
        foreach ($lines as $line)
        {
            if (substr($line, 0, 2) == '--' || $line == '')
                continue;
            $templine .= $line;
            if (substr(trim($line), -1, 1) == ';')
            {
                $mysqli->query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
                $templine = '';
            }
        }
        echo '<script language="javascript">';
        echo 'if(window.confirm("Database is successfully updated!"))';
        echo 'window.location.href="/"';
        echo '</script>';
    }
    public function deleteSQL(){
        $file = $this->input->get('file');
        unlink('7414/'.$file);
        redirect('/sql');
    }
	public function dashboard(){
        $data['sidebar_item_parent_active']="dashboard";
        $data['welcome_message'] = $this->lang->line('welcome_message');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        $data['hello'] = $this->lang->line('hello');
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/dashboard', $data);
        $this->load->view('templates/backend/footer', $data);
	}
    public function setLanguage($language){
        if($this->session->userdata('logged_in')['role']==0){
            if($language=="english")
                $this->system_settings->update(array('default_admin_language'=>"English"));
            if($language=="turkish")
                $this->system_settings->update(array('default_admin_language'=>"Turkish"));
        }
        $this->session->set_userdata('site_lang', $language);
        if(!empty($_SERVER['HTTP_REFERER'])){
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            redirect(base_url());
        }
    }
    public function switchLanguage($language = "") {
        $language = ($language != "") ? $language : "english";
        $this->session->set_userdata('site_lang', $language);
        if(!empty($_SERVER['HTTP_REFERER'])){
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            redirect(base_url());
        }
    }
    //guide_requests
    public function guide_requests_guide_requests(){
        $data['sidebar_item_parent_active']="guide_requests";
        $data['sidebar_item_child_active']="guide_requests";

        $data['label'] = $this->lang->line('admin_guide_request_list');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/guide-requests/guide_requests');
        $this->load->view('templates/backend/footer', $data);
    }
    public function guide_requests_getGuideRequests(){
        $page = $this->input->post("pagination[page]");
        $pages = $this->input->post("pagination[pages]");
        $perpage = $this->input->post("pagination[perpage]");
        $total = $this->input->post("pagination[total]");
        $search_key = $this->input->post("query[generalSearch]");
        $sort_field = $this->input->post("sort[field]");
        $sort_sort = $this->input->post("sort[sort]");

        $total = $this->guide_request->getGuideRequestsTotal($search_key);
        $pages = ceil($total/$perpage);
        if($pages<$page) $page = $pages;
        $guide_requests = $this->guide_request->getGuideRequestsByParams($page, $perpage, $search_key, $sort_field, $sort_sort);
        $meta = array(
            "page" => $page,
            "pages" => $pages,
            "perpage" => $perpage,
            "total" => $total,
            "sort" => "asc",
            "field" => "id"
        );
        echo json_encode(array("meta"=>$meta, "data"=>$guide_requests));
    }

    //start converting function array to object
    public function array_to_obj($array, &$obj)
    {
        foreach ($array as $key => $value)
        {
            if (is_array($value))
            {
                $obj->$key = new stdClass();
                array_to_obj($value, $obj->$key);
            }
            else
            {
                $obj->$key = $value;
            }
        }
        return $obj;
    }
    public function arrayToObject($array)
    {
        $object = new stdClass();
        return $this->array_to_obj($array,$object);
    }
    // end converting function array to object
    public function getRequesterName(){
        $search_key = $this->input->get('q');
        $result = $this->user->getUsersBySearchkey($search_key);
        echo json_encode(array("total_count"=>count($result), "incomplete_results"=>false, "items"=>$result));
    }
    public function guide_requests_guide_request_detail(){
        $data['sidebar_item_parent_active']="guide_requests";
        $data['sidebar_item_child_active']="edit_guide_request";
        $data['label'] = $this->lang->line('admin_guide_request_detail');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');

        $data['regions'] = $this->region->getAll();
        $data['users'] = $this->user->getAll();
        $data['tour_types'] = $this->tour_type->getAll();
        $id = $this->input->get('id');
        $guide_request = $this->guide_request->getGuideRequestById($id)[0];
        $guide_request->start_date = date('d.m.Y', strtotime($guide_request->start_date));
        $guide_request->finish_date = date('d.m.Y', strtotime($guide_request->finish_date));
        $data['guide_request'] = $guide_request;
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/guide-requests/guide_request_detail', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function guide_requests_add_guide_request(){
        $data['sidebar_item_parent_active']="guide_requests";
        $data['sidebar_item_child_active']="add_guide_request";
        $data['label'] = $this->lang->line('admin_new_guide_request');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        
        $data['regions'] = $this->region->getAll();
        $data['tour_types'] = $this->tour_type->getAll();
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/guide-requests/add_guide_request', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function guide_requests_edit_guide_request(){
        $data['sidebar_item_parent_active']="guide_requests";
        $data['sidebar_item_child_active']="edit_guide_request";
        $data['label'] = $this->lang->line('admin_edit_guide_request');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');

        $data['regions'] = $this->region->getAll();
        $data['tour_types'] = $this->tour_type->getAll();
        $id = $this->input->get('id');
        $guide_request = $this->guide_request->getGuideRequestById($id)[0];
        $guide_request->start_date = date('d.m.Y', strtotime($guide_request->start_date));
        $guide_request->finish_date = date('d.m.Y', strtotime($guide_request->finish_date));

        $data['guide_request'] = $guide_request;
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/guide-requests/edit_guide_request', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function guide_requests_getAllGuideRequests(){
        $all = $this->guide_request->getAll();
        echo json_encode($all);
    }
    public function getDayFromTourType(){
        $type = $this->input->post('type');
        $tour_type = $this->tour_type->getTourTypeById($type)[0];
        $day = $tour_type->days;
        echo $day;
    }
    public function guide_requests_save_guide_request(){
        $data = $this->input->post();
        if(isset($data['regions']))
            $data['regions'] = json_encode($data['regions']);
        else $data['regions'] = "";
        if(!isset($data['finish_date']))
            $data['finish_date'] = $data['start_date'];
        $data['created_date'] = date('Y-m-d H:i:s');
        $data['start_date'] = date('Y-m-d', strtotime($data['start_date']));
        $data['finish_date'] = date('Y-m-d', strtotime($data['finish_date']));
        $this->guide_request->save($data);
        // $receivers = $this->guide->getMatchedGuidesByParams($data['requested_language'], $data['start_date'], $data['finish_date']);
        $res = array("status"=>"success", "msg"=>"This guide request is successfully saved!");
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
    }
    public function guide_requests_update_guide_request(){
        $data = $this->input->post();
        if(isset($data['regions']))
            $data['regions'] = json_encode($data['regions']);
        else $data['regions'] = "";
        if(!isset($data['finish_date']))
            $data['finish_date'] = $data['start_date'];
        $data['created_date'] = date('Y-m-d H:i:s');
        $data['start_date'] = date('Y-m-d', strtotime($data['start_date']));
        $data['finish_date'] = date('Y-m-d', strtotime($data['finish_date']));
        $this->guide_request->update($data['id'], $data);
        $res = array("status"=>"success", "guide_request_id"=>$data['id'], "msg"=>"This guide request is successfully updated!");
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
    }
    public function guide_requests_delete_guide_request(){
        $id = $this->input->get('id');
        $this->guide_request->delete($id);
        $this->guide_requests_guide_requests();
    }
    //calendar management
    public function events_events(){
        $data['sidebar_item_parent_active']="calendar";
        $data['sidebar_item_child_active']="events";
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        $data['label'] = $this->lang->line('admin_event_list');
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/calendar/events');
        $this->load->view('templates/backend/footer', $data);
    }
    public function events_getEvents(){
        $page = $this->input->post("pagination[page]");
        $pages = $this->input->post("pagination[pages]");
        $perpage = $this->input->post("pagination[perpage]");
        $total = $this->input->post("pagination[total]");
        $search_key = $this->input->post("query[generalSearch]");
        $sort_field = $this->input->post("sort[field]");
        $sort_sort = $this->input->post("sort[sort]");

        $total = $this->calendar->getEventsTotal($search_key);
        // var_dump($total);
        // exit;
        $pages = ceil($total/$perpage);
        if($pages<$page) $page = $pages;
        $events = $this->calendar->getEventsByParams($page, $perpage, $search_key, $sort_field, $sort_sort);
        $meta = array(
            "page" => $page,
            "pages" => $pages,
            "perpage" => $perpage,
            "total" => $total,
            "sort" => "asc",
            "field" => "id"
        );
        echo json_encode(array("meta"=>$meta, "data"=>$events));
    }
    public function events_event_detail(){
        $data['sidebar_item_parent_active']="calendar";
        $data['sidebar_item_child_active']="edit_event";
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        $data['label'] = $this->lang->line('admin_event_detail');
        $data['guides'] = $this->guide->getAll();
        $data['tour_types'] = $this->tour_type->getAll();

        $id = $this->input->get('id');
        $event = $this->calendar->getEventById($id)[0];
        $data['event'] = $event;
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/calendar/event_detail', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function events_add_event(){
        $data['sidebar_item_parent_active']="calendar";
        $data['sidebar_item_child_active']="add_event";
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        $data['label'] = $this->lang->line('admin_new_event');
        $data['guides'] = $this->guide->getAll();
        $data['tour_types'] = $this->tour_type->getAll();
        
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/calendar/add_event', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function events_edit_event(){
        $data['sidebar_item_parent_active']="calendar";
        $data['sidebar_item_child_active']="edit_event";
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        $data['label'] = $this->lang->line('admin_edit_event');
        $data['guides'] = $this->guide->getAll();
        $data['tour_types'] = $this->tour_type->getAll();

        $id = $this->input->get('id');
        $event = $this->calendar->getEventById($id)[0];
        $data['event'] = $event;
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/calendar/edit_event', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function events_save_event(){
        $data = $this->input->post();
        if(!isset($data['finish_date']))
            $data['finish_date'] = $data['start_date'];
        $data['created_date'] = date('Y-m-d H:i:s');
        $data['start_date'] = date('Y-m-d', strtotime($data['start_date']));
        $data['finish_date'] = date('Y-m-d', strtotime($data['finish_date']));
        $sdate = $data['start_date'];
        $fdate = $data['finish_date'];

        $diff = abs(strtotime($fdate) - strtotime($sdate));
        $days = floor($diff/ (60*60*24));
        for($i=0; $i<=$days; $i++){
            $data['event_date'] = date('Y-m-d', strtotime($sdate." + ".$i." days"));
            $this->calendar->save($data);
        }
        $res = array("status"=>"success", "msg"=>"This event is successfully saved!");
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
    }
    public function events_update_event(){
        $data = $this->input->post();
        $data['created_date'] = date('Y-m-d H:i:s');
        $this->calendar->update($data['id'], $data);
        $res = array("status"=>"success", "msg"=>"This event is successfully updated!");
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
    }
    //users
    public function accountManagement_users(){
        $data['sidebar_item_parent_active']="accountManagement";
        $data['sidebar_item_child_active']="users";
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        $data['label'] = $this->lang->line('admin_user_list');
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/accountManagement/users/users');
        $this->load->view('templates/backend/footer', $data);
    }
    public function accountManagement_getUsers(){
        $page = $this->input->post("pagination[page]");
        $pages = $this->input->post("pagination[pages]");
        $perpage = $this->input->post("pagination[perpage]");
        $total = $this->input->post("pagination[total]");
        $search_key = $this->input->post("query[generalSearch]");
        $sort_field = $this->input->post("sort[field]");
        $sort_sort = $this->input->post("sort[sort]");

        $total = $this->user->getUsersTotal($search_key);
        $pages = ceil($total/$perpage);
        if($pages<$page) $page = $pages;
        $users = $this->user->getUsersByParams($page, $perpage, $search_key, $sort_field, $sort_sort);
        $meta = array(
            "page" => $page,
            "pages" => $pages,
            "perpage" => $perpage,
            "total" => $total,
            "sort" => "asc",
            "field" => "id"
        );
        echo json_encode(array("meta"=>$meta, "data"=>$users));
    }
    public function accountManagement_add_user(){
        $data['sidebar_item_parent_active']="accountManagement";
        $data['sidebar_item_child_active']="add_user";
        $data['supervisors'] = $this->supervisor->getAll();
        $data['departments'] = $this->department->getAll();
        
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/accountManagement/users/add_user', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function accountManagement_edit_user(){
        $data['sidebar_item_parent_active']="accountManagement";
        $data['sidebar_item_child_active']="users";
        $id = $this->input->get('id');
        $user = $this->user->getuserById($id)[0];
        $data['user'] = $user;
        $data['supervisors'] = $this->supervisor->getAll();
        $data['departments'] = $this->department->getAll();
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/accountManagement/users/edit_user', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function accountManagement_getAllUsers(){
        $all = $this->user->getAll();
        echo json_encode($all);
    }
    public function pages_pages(){
        $data['sidebar_item_parent_active']="pages";
        $data['sidebar_item_child_active']="pages";
        $data['label'] = $this->lang->line('admin_page_list');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/pages/pages', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function pages_getPages(){
        $page = $this->input->post("pagination[page]");
        $pages = $this->input->post("pagination[pages]");
        $perpage = $this->input->post("pagination[perpage]");
        $total = $this->input->post("pagination[total]");
        $search_key = $this->input->post("query[generalSearch]");
        $sort_field = $this->input->post("sort[field]");
        $sort_sort = $this->input->post("sort[sort]");

        $total = $this->page->getPagesTotal($search_key);
        $pages = ceil($total/$perpage);
        if($pages<$page) $page = $pages;
        $pageData = $this->page->getPagesByParams($page, $perpage, $search_key, $sort_field, $sort_sort);
        $meta = array(
            "page" => $page,
            "pages" => $pages,
            "perpage" => $perpage,
            "total" => $total,
            "sort" => "asc",
            "field" => "id"
        );
        echo json_encode(array("meta"=>$meta, "data"=>$pageData));
    }
    public function pages_page_details(){
        $data['sidebar_item_parent_active']="pages";
        $data['sidebar_item_child_active']="page_details";
        $data['label'] = $this->lang->line('admin_page_details');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');

        $id = $this->input->get('id');
        $data['page'] = $this->page->getPageById($id)[0];

        $data['categories'] = $this->page_category->getAll();
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/pages/page_details', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function pages_add_page(){
        $data['sidebar_item_parent_active']="pages";
        $data['sidebar_item_child_active']="add_page";
        $data['label'] = $this->lang->line('admin_new_page');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');

        $data['categories'] = $this->page_category->getAll();
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/pages/add_page', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function pages_edit_page(){
        $data['sidebar_item_parent_active']="pages";
        $data['sidebar_item_child_active']="edit_page";
        $data['label'] = $this->lang->line('admin_edit_page');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');

        $id = $this->input->get('id');
        $data['page'] = $this->page->getPageById($id)[0];

        $data['categories'] = $this->page_category->getAll();
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/pages/edit_page', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function pages_save_page(){
        $postData = $this->input->post();
        $postData['created_date'] = date('Y-m-d H:i:s');
        if($this->page->save($postData))
            $res = array("status"=>"success", "msg"=>"This page successfully saved!");
        else $res = array("status"=>"fail", "msg"=>"This page already exists! Please Try again!");
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
    }
    public function pages_update_page(){
        $postData = $this->input->post();
        $this->page->update($postData['id'], $postData);
        $res = array("status"=>"success", "msg"=>"This page successfully updated!");
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
    }
    public function pages_delete_page(){
        $id = $this->input->get('id');
        $this->page->delete($id);
        $this->pages_pages();
    }
    //page-category
    public function page_categories_categories(){
        $data['sidebar_item_parent_active']="pages";
        $data['sidebar_item_child_active']="page_categories";
        $data['label'] = $this->lang->line('admin_page_category_list');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/pages/page_categories', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function page_categories_getCategories(){
        $page = $this->input->post("pagination[page]");
        $pages = $this->input->post("pagination[pages]");
        $perpage = $this->input->post("pagination[perpage]");
        $total = $this->input->post("pagination[total]");
        $search_key = $this->input->post("query[generalSearch]");
        $sort_field = $this->input->post("sort[field]");
        $sort_sort = $this->input->post("sort[sort]");

        $total = $this->page_category->getPageCategoriesTotal($search_key);
        $pages = ceil($total/$perpage);
        if($pages<$page) $page = $pages;
        $categories = $this->page_category->getPageCategoriesByParams($page, $perpage, $search_key, $sort_field, $sort_sort);
        $meta = array(
            "page" => $page,
            "pages" => $pages,
            "perpage" => $perpage,
            "total" => $total,
            "sort" => "asc",
            "field" => "id"
        );
        echo json_encode(array("meta"=>$meta, "data"=>$categories));
    }
    public function pages_add_category(){
        $data['sidebar_item_parent_active']="pages";
        $data['sidebar_item_child_active']="add_page_category";
        $data['label'] = $this->lang->line('admin_new_page_category');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/pages/add_page_category', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function pages_edit_category(){
        $data['sidebar_item_parent_active']="pages";
        $data['sidebar_item_child_active']="edit_page_category";
        $data['label'] = $this->lang->line('admin_edit_page_category');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        $id = $this->input->get('id');
        $data['category'] = $this->page_category->getCategoryById($id)[0];

        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/pages/edit_page_category', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function pages_save_category(){
        $postData = $this->input->post();
        if($this->page_category->save($postData))
            $res = array("status"=>"success", "msg"=>"This category is successfully saved!");
        else $res = array("status"=>"fail", "msg"=>"This category already exists! Please Try again!");
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
    }
    public function pages_update_category(){
        $postData = $this->input->post();
        $this->page_category->update($postData['id'], $postData);
        $res = array("status"=>"success", "msg"=>"This category is successfully updated!");
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
    }
    public function page_delete_category(){
        $id = $this->input->get('id');
        $this->page_category->delete($id);
        $this->page_categories_categories();
    }
    //shops
    public function shops_shops(){
        $data['sidebar_item_parent_active']="shops";
        $data['sidebar_item_child_active']="shops";
        $data['label'] = $this->lang->line('admin_shop_list');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');

        $data['categories'] = $this->shop_category->getAll();
        $data['districts'] = $this->district->getAll();
        $data['cities'] = $this->city->getAll();

        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/shops/shops', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function shops_getShops(){
        $page = $this->input->post("pagination[page]");
        $pages = $this->input->post("pagination[pages]");
        $perpage = $this->input->post("pagination[perpage]");
        $total = $this->input->post("pagination[total]");
        $search_key = $this->input->post("query[generalSearch]");
        $sort_field = $this->input->post("sort[field]");
        $sort_sort = $this->input->post("sort[sort]");
        $category = $this->input->post('query[category]');
        $district = $this->input->post('query[district]');
        $city = $this->input->post('query[city]');
        $status = $this->input->post('query[status]');

        $total = $this->shop->getShopsTotal($search_key, $category, $district, $city, $status);
        $pages = ceil($total/$perpage);
        if($pages<$page) $page = $pages;
        $shops = $this->shop->getShopsByParams($page, $perpage, $search_key, $category, $district, $city, $status, $sort_field, $sort_sort);
        $meta = array(
            "page" => $page,
            "pages" => $pages,
            "perpage" => $perpage,
            "total" => $total,
            "sort" => "asc",
            "field" => "id"
        );
        echo json_encode(array("meta"=>$meta, "data"=>$shops));
    }
    public function shops_shop_detail(){
        $data['sidebar_item_parent_active']="shops";
        $data['sidebar_item_child_active']="shop_details";

        $data['categories'] = $this->shop_category->getAll();
        $data['districts'] = $this->district->getAll();
        $data['cities'] = $this->city->getAll();
        $data['countries'] = $this->country->getAll();
        $data['label'] = $this->lang->line('admin_shop_detail');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');

        $id = $this->input->get('id');
        $shop = $this->shop->getShopById($id)[0];
        $data['shop'] = $shop;
        $data['images'] = $this->upload_image->getImages('shop', $id);
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/shops/shop_detail', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function shops_add_shop(){
        $data['sidebar_item_parent_active']="shops";
        $data['sidebar_item_child_active']="add_shop";
        $data['categories'] = $this->shop_category->getAll();
        $data['cities'] = $this->city->getAll();
        $data['countries'] = $this->country->getAll();
        $data['districts'] = $this->district->getAll();

        $data['label'] = $this->lang->line('admin_new_shop');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/shops/add_shop', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function shops_edit_shop(){
        $data['sidebar_item_parent_active']="shops";
        $data['sidebar_item_child_active']="edit_shop";

        $data['categories'] = $this->shop_category->getAll();
        $data['cities'] = $this->city->getAll();
        $data['countries'] = $this->country->getAll();
        $data['districts'] = $this->district->getAll();
        $data['label'] = $this->lang->line('admin_edit_shop');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');

        $id = $this->input->get('id');
        $shop = $this->shop->getShopById($id)[0];
        $data['images'] = $this->upload_image->getImages('shop', $id);
        $data['shop'] = $shop;
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/shops/edit_shop', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function shops_getAllShops(){
        $all = $this->shop->getAll();
        echo json_encode($all);
    }
    public function upload_shop_images(){
        $target_dir = "uploads/shop/";
        if(!is_dir($target_dir))
            mkdir($target_dir, 0755, true);
        if(isset($_FILES["file"])){
            $target_file = $target_dir.$_FILES["file"]["name"];
            move_uploaded_file($_FILES["file"]["tmp_name"], $target_file); 
        }
    }
    public function shops_save_shop(){
        $data = $this->input->post();
        if(!isset($data['status'])) $data['status']="deactive";
        $data['provider_email'] = $this->session->userdata('logged_in')['email'];
        if(isset($data['category']))
            $data['category'] = json_encode($data['category']);
        $data['created_date']=date('Y-m-d H:i:s');
        if(isset($data['images'])){
            $images = json_decode($data['images']);
            unset($data['images']);
        }
        if($shop_id = $this->shop->save($data)){
            if(isset($images)){
                foreach ($images as $image) {
                    $imageData = array(
                        'building'=>'shop',
                        'building_id'=>$shop_id,
                        'path'=>'uploads/shop/'.$image
                    );
                    $this->upload_image->save($imageData);
                }
            }
            $res = array("status"=>"success", "shop_id"=>$shop_id, "msg"=>"This shop is successfully saved!");
        }
        else $res = array("status"=>"fail", "msg"=>"Error occurs! Please Try again!");
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
    }
    public function shops_update_shop(){
        $data = $this->input->post();
        if(!isset($data['status'])) $data['status']="deactive";
        if(isset($data['category']))
            $data['category'] = json_encode($data['category']);
        //var_dump($data);
        if(isset($data['images'])){
            $images = json_decode($data['images']);
            unset($data['images']);
        }
        $this->shop->update($data['id'], $data);
        if(isset($images)){
            $this->upload_image->delete('shop', $data['id']);
            foreach ($images as $image) {
                $imageData = array(
                    'building'=>'shop',
                    'building_id'=>$data['id'],
                    'path'=>'uploads/shop/'.$image
                );
                $this->upload_image->save($imageData);
            }
        }
        $res = array("status"=>"success", "shop_id"=>$data['id'], "msg"=>"This shop is successfully updated!");
        //else $res = array("status"=>"fail", "msg"=>"Error occurs! Please Try again!");
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
    }
    public function shops_delete_shop(){
        $id = $this->input->get('id');
        $this->shop->delete($id);
        $this->shops_shops();
    }
    //restaurants
    public function restaurants_restaurants(){
        $data['sidebar_item_parent_active']="restaurants";
        $data['sidebar_item_child_active']="restaurants";
        $data['districts'] = $this->district->getAll();
        $data['cities'] = $this->city->getAll();
        $data['categories'] = $this->restaurant_category->getAll();

        $data['label'] = $this->lang->line('admin_restaurant_list');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/restaurants/restaurants');
        $this->load->view('templates/backend/footer', $data);
    }
    public function restaurants_getRestaurants(){
        $page = $this->input->post("pagination[page]");
        $pages = $this->input->post("pagination[pages]");
        $perpage = $this->input->post("pagination[perpage]");
        $total = $this->input->post("pagination[total]");
        $search_key = $this->input->post("query[generalSearch]");
        $sort_field = $this->input->post("sort[field]");
        $sort_sort = $this->input->post("sort[sort]");
        $category = $this->input->post('query[category]');
        $district = $this->input->post('query[district]');
        $city = $this->input->post('query[city]');
        $status = $this->input->post('query[status]');

        $total = $this->restaurant->getRestaurantsTotal($search_key, $category, $district, $city, $status);
        $pages = ceil($total/$perpage);
        if($pages<$page) $page = $pages;
        $restaurants = $this->restaurant->getRestaurantsByParams($page, $perpage, $search_key, $category, $district, $city, $status, $sort_field, $sort_sort);
        $meta = array(
            "page" => $page,
            "pages" => $pages,
            "perpage" => $perpage,
            "total" => $total,
            "sort" => "asc",
            "field" => "id"
        );
        echo json_encode(array("meta"=>$meta, "data"=>$restaurants));
    }
    public function restaurants_restaurant_detail(){
        $data['sidebar_item_parent_active']="restaurants";
        $data['sidebar_item_child_active']="restaurant_details";

        $data['categories'] = $this->restaurant_category->getAll();
        $data['cities'] = $this->city->getAll();
        $data['countries'] = $this->country->getAll();
        $data['districts'] = $this->district->getAll();
        $data['label'] = $this->lang->line('admin_restaurant_detail');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');

        $id = $this->input->get('id');
        $restaurant = $this->restaurant->getRestaurantById($id)[0];
        $data['restaurant'] = $restaurant;
        $data['images'] = $this->upload_image->getImages('restaurant', $id);
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/restaurants/restaurant_detail', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function restaurants_add_restaurant(){
        $data['sidebar_item_parent_active']="restaurants";
        $data['sidebar_item_child_active']="add_restaurant";
        $data['categories'] = $this->restaurant_category->getAll();
        $data['cities'] = $this->city->getAll();
        $data['countries'] = $this->country->getAll();
        $data['districts'] = $this->district->getAll();
        $data['label'] = $this->lang->line('admin_new_restaurant');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/restaurants/add_restaurant', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function restaurants_edit_restaurant(){
        $data['sidebar_item_parent_active']="restaurants";
        $data['sidebar_item_child_active']="edit_restaurant";

        $data['categories'] = $this->restaurant_category->getAll();
        $data['cities'] = $this->city->getAll();
        $data['countries'] = $this->country->getAll();
        $data['districts'] = $this->district->getAll();
        $data['label'] = $this->lang->line('admin_edit_restaurant');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');

        $id = $this->input->get('id');
        $restaurant = $this->restaurant->getRestaurantById($id)[0];
        $data['restaurant'] = $restaurant;
        $data['images'] = $this->upload_image->getImages('restaurant', $id);
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/restaurants/edit_restaurant', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function restaurants_getAllRestaurants(){
        $all = $this->restaurant->getAll();
        echo json_encode($all);
    }
    public function upload_restaurant_images(){
        $target_dir = "uploads/restaurant/";
        if(!is_dir($target_dir))
            mkdir($target_dir, 0755, true);
        if(isset($_FILES["file"])){
            $target_file = $target_dir.$_FILES["file"]["name"];
            move_uploaded_file($_FILES["file"]["tmp_name"], $target_file); 
        }
    }
    public function restaurants_save_restaurant(){
        $data = $this->input->post();
        if(!isset($data['status'])) $data['status']="deactive";
        if(isset($data['category']))
            $data['category'] = json_encode($data['category']);
        else $data['category'] = "";
        $data['provider_email'] = $this->session->userdata('logged_in')['email'];
        $data['created_date'] = date('Y-m-d H:i:s');
        if(isset($data['images'])){
            $images = json_decode($data['images']);
            unset($data['images']);
        }
        if($restaurant_id = $this->restaurant->save($data)){
            $res = array("status"=>"success", "restaurant_id"=>$restaurant_id, "msg"=>"This restaurant is successfully saved!");
            if(isset($images)){
                foreach ($images as $image) {
                    $imageData = array(
                        'building'=>'restaurant',
                        'building_id'=>$restaurant_id,
                        'path'=>'uploads/restaurant/'.$image
                    );
                    $this->upload_image->save($imageData);
                }
            }
        }
        else $res = array("status"=>"fail", "msg"=>"Error occurs! Please Try again!");
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
    }
    public function restaurants_update_restaurant(){
        $data = $this->input->post();
        if(!isset($data['status'])) $data['status']="deactive";
        if(isset($data['category']))
            $data['category'] = json_encode($data['category']);
        if(!isset($data['status']))
            $data['status']="deactive";
        //var_dump($data);
        if(isset($data['images'])){
            $images = json_decode($data['images']);
            unset($data['images']);
        }
        $this->restaurant->update($data['id'], $data);
        $this->upload_image->delete('restaurant', $data['id']);
        if(isset($images)){
            foreach ($images as $image) {
                $imageData=array(
                    'building'=>'restaurant',
                    'building_id'=>$data['id'],
                    'path'=>'uploads/restaurant/'.$image
                );
                $this->upload_image->save($imageData);
            }
        }
        $res = array("status"=>"success", "restaurant_id"=>$data['id'], "msg"=>"This restaurant is successfully updated!");
        //else $res = array("status"=>"fail", "msg"=>"Error occurs! Please Try again!");
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
    }
    public function restaurants_delete_restaurant(){
        $id = $this->input->get('id');
        $this->restaurant->delete($id);
        $this->restaurants_restaurants();
    }
    //museum
    public function museums_museums(){
        $data['sidebar_item_parent_active']="museums";
        $data['sidebar_item_child_active']="museums";

        $data['districts'] = $this->district->getAll();
        $data['cities'] = $this->city->getAll();
        $data['categories'] = $this->museum_category->getAll();

        $data['label'] = $this->lang->line('admin_museum_list');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/museums/museums', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function museums_getMuseums(){
        $page = $this->input->post("pagination[page]");
        $pages = $this->input->post("pagination[pages]");
        $perpage = $this->input->post("pagination[perpage]");
        $total = $this->input->post("pagination[total]");
        $search_key = $this->input->post("query[generalSearch]");
        $sort_field = $this->input->post("sort[field]");
        $sort_sort = $this->input->post("sort[sort]");
        $category = $this->input->post('query[category]');
        $district = $this->input->post('query[district]');
        $city = $this->input->post('query[city]');
        $status = $this->input->post('query[status]');

        $total = $this->museum->getMuseumsTotal($search_key, $category, $district, $city, $status);
        
        $pages = ceil($total/$perpage);
        if($pages<$page) $page = $pages;
        $museums = $this->museum->getMuseumsByParams($page, $perpage, $search_key, $category, $district, $city, $status, $sort_field, $sort_sort);
        $meta = array(
            "page" => $page,
            "pages" => $pages,
            "perpage" => $perpage,
            "total" => $total,
            "sort" => "asc",
            "field" => "id"
        );
        echo json_encode(array("meta"=>$meta, "data"=>$museums));
    }
    public function museums_museum_detail(){
        $data['sidebar_item_parent_active']="museums";
        $data['sidebar_item_child_active']="museum_details";
        $data['label'] = $this->lang->line('admin_museum_detail');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        $data['districts'] = $this->district->getAll();
        $data['cities'] = $this->city->getAll();
        $data['countries'] = $this->country->getAll();
        $data['categories'] = $this->museum_category->getAll();
        $id = $this->input->get('id');
        $museum = $this->museum->getMuseumById($id)[0];
        $data['museum'] = $museum;
        $data['images'] = $this->upload_image->getImages('museum', $id);

        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/museums/museum_detail', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function museums_add_museum(){
        $data['sidebar_item_parent_active']="museums";
        $data['sidebar_item_child_active']="add_museum";
        $data['cities'] = $this->city->getAll();
        $data['countries'] = $this->country->getAll();
        $data['districts'] = $this->district->getAll();
        $data['categories'] = $this->museum_category->getAll();
        $data['label'] = $this->lang->line('admin_new_museum');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/museums/add_museum', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function museums_edit_museum(){
        $data['sidebar_item_parent_active']="museums";
        $data['sidebar_item_child_active']="edit_museum";
        $data['label'] = $this->lang->line('admin_edit_museum');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');

        $data['districts'] = $this->district->getAll();
        $data['cities'] = $this->city->getAll();
        $data['countries'] = $this->country->getAll();
        $data['categories'] = $this->museum_category->getAll();
        $id = $this->input->get('id');
        $museum = $this->museum->getMuseumById($id)[0];
        $data['museum'] = $museum;
        $data['images'] = $this->upload_image->getImages('museum', $id);

        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/museums/edit_museum', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function museums_getAllmuseums(){
        $all = $this->museum->getAll();
        echo json_encode($all);
    }
    public function upload_museum_images(){
        $target_dir = "uploads/museum/";
        if(!is_dir($target_dir))
            mkdir($target_dir, 0755, true);
        if(isset($_FILES["file"])){
            $target_file = $target_dir.$_FILES["file"]["name"];
            move_uploaded_file($_FILES["file"]["tmp_name"], $target_file); 
        }
    }
    public function museums_save_museum(){
        $data = $this->input->post();
        $data['created_date'] = date('Y-m-d H:i:s');
        $data['category'] = json_encode($data['category']);
        if(isset($data['summer_rest_days']))
            $data['summer_rest_days'] = json_encode($data['summer_rest_days']);
        if(isset($data['winter_rest_days']))
            $data['winter_rest_days'] = json_encode($data['winter_rest_days']);
        $data['provider_email'] = $this->session->userdata('logged_in')['email'];
        if(!isset($data['status'])) $data['status'] = "deactive";
        if(isset($data['images'])){
            $images = json_decode($data['images']);
            unset($data['images']);
        }
        if($museum_id = $this->museum->save($data)){
            $res = array("status"=>"success", "msg"=>"This museum is successfully saved!");
            if(isset($images)){
                foreach ($images as $image) {
                    $imageData = array(
                        'building'=>'museum',
                        'building_id'=>$museum_id,
                        'path'=>'uploads/museum/'.$image
                    );
                    $this->upload_image->save($imageData);
                }
            }
        }
        else $res = array("status"=>"fail", "msg"=>"Error occurs! Please Try again!");
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
    }
    public function museums_update_museum(){
        $data = $this->input->post();
        $data['category'] = json_encode($data['category']);
        if(!isset($data['status']))
            $data['status']="deactive";
        if(isset($data['summer_rest_days']))
            $data['summer_rest_days'] = json_encode($data['summer_rest_days']);
        if(isset($data['winter_rest_days']))
            $data['winter_rest_days'] = json_encode($data['winter_rest_days']);
        if(!isset($data['status'])) $data['status'] = "deactive";
        if(isset($data['images'])){
            $images = json_decode($data['images']);
            unset($data['images']);
        }
        $this->museum->update($data['id'], $data);
        $this->upload_image->delete('museum', $data['id']);
        if(isset($images)){
            foreach ($images as $image) {
                $imageData = array(
                    'building'=>'museum',
                    'building_id'=>$data['id'],
                    'path'=>'uploads/museum/'.$image
                );
                $this->upload_image->save($imageData);
            }
        }
        $res = array("status"=>"success", "msg"=>"This museum is successfully updated!");
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
    }
    public function museums_delete_museum(){
        $id = $this->input->get('id');
        $this->museum->delete($id);
        $this->museums_museums();
    }
    //guides
    public function guides_guide_search(){
        $data['sidebar_item_parent_active']="guides";
        $data['sidebar_item_child_active']="guide_search";
        $data['languages'] = $this->language->getAll();
        $data['cities'] = $this->city->getAll();
        $data['label'] = $this->lang->line('admin_guide_search');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/guides/guide_search', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function guides_getGuideSearch(){
        $page = $this->input->post("pagination[page]");
        $pages = $this->input->post("pagination[pages]");
        $perpage = $this->input->post("pagination[perpage]");
        $total = $this->input->post("pagination[total]");
        $search_key = $this->input->post("query[generalSearch]");
        $sort_field = $this->input->post("sort[field]");
        $sort_sort = $this->input->post("sort[sort]");
        $days = $this->input->post("query[days]");

        if($this->input->post("query[start_date]"))
            $start_date = date('Y-m-d', strtotime($this->input->post("query[start_date]")));
        else $start_date = "";
        if($this->input->post("query[finish_date]"))
            $finish_date = date('Y-m-d', strtotime($this->input->post("query[finish_date]")));
        else $finish_date = "";
        $language = $this->input->post("query[language]");
        $city = $this->input->post("query[city]");

        $total = $this->guide->getSearchGuidesTotal($search_key, $days, $start_date, $finish_date, $language, $city);
        if(!$total) $total = 0;
        $pages = ceil($total/$perpage);
        if($pages<$page) $page = $pages;
        $guides = $this->guide->getSearchGuidesByParams($page, $perpage, $search_key, $days, $start_date, $finish_date, $language, $city, $sort_field, $sort_sort);
        $meta = array(
            "page" => $page,
            "pages" => $pages,
            "perpage" => $perpage,
            "total" => $total,
            "sort" => "asc",
            "field" => "id"
        );
        echo json_encode(array("meta"=>$meta, "data"=>$guides));
    }
    public function guides_guides(){
        $data['sidebar_item_parent_active']="guides";
        $data['sidebar_item_child_active']="guides";
        $data['regions'] = $this->region->getAll();
        $data['languages'] = $this->language->getAll();
        $data['districts'] = $this->district->getAll();
        $data['cities'] = $this->city->getAll();
        $data['label'] = $this->lang->line('admin_guide_list');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/guides/guides', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function guides_getGuides(){
        $page = $this->input->post("pagination[page]");
        $pages = $this->input->post("pagination[pages]");
        $perpage = $this->input->post("pagination[perpage]");
        $total = $this->input->post("pagination[total]");
        $search_key = $this->input->post("query[generalSearch]");
        $sort_field = $this->input->post("sort[field]");
        $sort_sort = $this->input->post("sort[sort]");
        $region = $this->input->post("query[region]");
        $language = $this->input->post("query[language]");
        $district = $this->input->post("query[district]");
        $city = $this->input->post("query[city]");
        $status = $this->input->post("query[status]");

        $total = $this->guide->getGuidesTotal($search_key, $region, $language, $district, $city, $status);
        $pages = ceil($total/$perpage);
        if($pages<$page) $page = $pages;
        $guides = $this->guide->getGuidesByParams($page, $perpage, $search_key, $region, $language, $district, $city, $status, $sort_field, $sort_sort);
        $meta = array(
            "page" => $page,
            "pages" => $pages,
            "perpage" => $perpage,
            "total" => $total,
            "sort" => "asc",
            "field" => "id"
        );
        echo json_encode(array("meta"=>$meta, "data"=>$guides));
    }
    public function guides_guide_detail(){
        $data['sidebar_item_parent_active']="guides";
        $data['sidebar_item_child_active']="guide_details";
        $data['label'] = $this->lang->line('admin_guide_detail');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');

        $data['cities'] = $this->city->getAll();
        $data['districts'] = $this->district->getAll();
        $id = $this->input->get('id');
        $guide = $this->guide->getGuideById($id)[0];
        $data['guide'] = $guide;
        $data['languages'] = $this->language->getAll();
        $data['chambers'] = $this->chamber->getAll();
        $data['specialisties'] = $this->specialisties->getAll();
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/guides/guide_detail', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function guides_add_guide(){
        $data['sidebar_item_parent_active']="guides";
        $data['sidebar_item_child_active']="add_guide";
        $data['languages'] = $this->language->getAll();
        $data['cities'] = $this->city->getAll();
        $data['districts'] = $this->district->getAll();
        $data['regions'] = $this->region->getAll();
        $data['chambers'] = $this->chamber->getAll();
        $data['specialisties'] = $this->specialisties->getAll();
        $data['label'] = $this->lang->line('admin_new_guide');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/guides/add_guide', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function guides_edit_guide(){
        $data['sidebar_item_parent_active']="guides";
        $data['sidebar_item_child_active']="guides";
        $data['label'] = $this->lang->line('admin_edit_guide');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');

        $id = $this->input->get('id');
        $guide = $this->guide->getGuideById($id)[0];
        $data['guide'] = $guide;
        $data['languages'] = $this->language->getAll();
        $data['districts'] = $this->district->getAll();
        $data['regions'] = $this->region->getAll();
        $data['cities'] = $this->city->getAll();
        $data['chambers'] = $this->chamber->getAll();
        $data['specialisties'] = $this->specialisties->getAll();
        
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/guides/edit_guide', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function guides_getAllGuides(){
        $all = $this->guide->getAll();
        echo json_encode($all);
    }
    public function guides_guide_reviews(){
        $data['sidebar_item_parent_active']="guides";
        $data['sidebar_item_child_active']="guide_reviews";
        $data['label'] = $this->lang->line('admin_guide_review_list');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');

        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/guides/guide_reviews');
        $this->load->view('templates/backend/footer', $data);
    }
    public function guides_getGuideReviews(){
        $page = $this->input->post("pagination[page]");
        $pages = $this->input->post("pagination[pages]");
        $perpage = $this->input->post("pagination[perpage]");
        $total = $this->input->post("pagination[total]");
        $search_key = $this->input->post("query[generalSearch]");
        $sort_field = $this->input->post("sort[field]");
        $sort_sort = $this->input->post("sort[sort]");

        $total = $this->guide_review->getGuideReviewsTotal($search_key);
        $pages = ceil($total/$perpage);
        if($pages<$page) $page = $pages;
        $agencies = $this->guide_review->getGuideReviewsByParams($page, $perpage, $search_key, $sort_field, $sort_sort);
        $meta = array(
            "page" => $page,
            "pages" => $pages,
            "perpage" => $perpage,
            "total" => $total,
            "sort" => "asc",
            "field" => "id"
        );
        echo json_encode(array("meta"=>$meta, "data"=>$agencies));
    }
    public function guides_guide_review_detail(){
        $data['sidebar_item_parent_active']="guides";
        $data['sidebar_item_child_active']="edit_guide_review";
        $data['label'] = $this->lang->line('admin_guide_review_detail');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        $data['guides'] = $this->guide->getAll();
        $data['agencies'] = $this->agency->getAll();
        $id = $this->input->get('id');
        $data['guide_review'] = $this->guide_review->getGuideReviewById($id)[0];

        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/guides/guide_review_detail', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function guides_add_guide_review(){
        $data['sidebar_item_parent_active']="guides";
        $data['sidebar_item_child_active']="add_guide_review";
        $data['label'] = $this->lang->line('admin_new_guide_review');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        $data['guides'] = $this->guide->getAll();
        $data['agencies'] = $this->agency->getAll();

        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/guides/add_guide_review', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function guides_edit_guide_review(){
        $data['sidebar_item_parent_active']="guides";
        $data['sidebar_item_child_active']="edit_guide_review";
        $data['label'] = $this->lang->line('admin_edit_guide_review');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        $data['guides'] = $this->guide->getAll();
        $data['agencies'] = $this->agency->getAll();
        $id = $this->input->get('id');
        $data['guide_review'] = $this->guide_review->getGuideReviewById($id)[0];

        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/guides/edit_guide_review', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function guides_save_guide_review(){
        $data = $this->input->post();
        if(!isset($data['status'])) $data['status']="deactive";
        $data['submission_date']=date('Y-m-d H:i:s');
        if($this->guide_review->save($data))
            echo "success";
        else echo "fail";
    }
    public function guides_update_guide_review(){
        $data = $this->input->post();
        $data['submission_date']=date('Y-m-d H:i:s');
        if(!isset($data['status'])) $data['status']="deactive";
        if($this->guide_review->update($data['id'], $data))
            echo "success";
        else echo "fail";
    }
    public function guides_delete_guide_review(){
        $id = $this->input->get('id');
        $this->guide_review->delete($id);
        $this->guides_guide_reviews();
    }
    //agencies
    public function agencies_agencies(){
        $data['sidebar_item_parent_active']="agencies";
        $data['sidebar_item_child_active']="agencies";
        $data['label'] = $this->lang->line('admin_agency_list');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        $data['districts'] = $this->district->getAll();
        $data['cities'] = $this->city->getAll();

        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/agencies/agencies', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function agencies_getAgencies(){
        $page = $this->input->post("pagination[page]");
        $pages = $this->input->post("pagination[pages]");
        $perpage = $this->input->post("pagination[perpage]");
        $total = $this->input->post("pagination[total]");
        $search_key = $this->input->post("query[generalSearch]");
        $sort_field = $this->input->post("sort[field]");
        $sort_sort = $this->input->post("sort[sort]");
        $group = $this->input->post("query[group]");
        $district = $this->input->post("query[district]");
        $city = $this->input->post("query[city]");
        $status = $this->input->post("query[status]");

        $total = $this->agency->getAgenciesTotal($search_key, $group, $district, $city, $status);
        $pages = ceil($total/$perpage);
        if($pages<$page) $page = $pages;
        $agencies = $this->agency->getAgenciesByParams($page, $perpage, $search_key, $group, $district, $city, $status, $sort_field, $sort_sort);
        $meta = array(
            "page" => $page,
            "pages" => $pages,
            "perpage" => $perpage,
            "total" => $total,
            "sort" => "asc",
            "field" => "id"
        );
        echo json_encode(array("meta"=>$meta, "data"=>$agencies));
    }
    public function agencies_agency_detail(){
        $data['sidebar_item_parent_active']="agencies";
        $data['sidebar_item_child_active']="agency_detail";
        $data['label'] = $this->lang->line('admin_agency_detail');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        $data['cities'] = $this->city->getAll();
        $data['districts'] = $this->district->getAll();

        $id = $this->input->get('id');
        $agency = $this->agency->getAgencyById($id)[0];
        $data['agency'] = $agency;
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/agencies/agency_detail', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function agencies_add_agency(){
        $data['sidebar_item_parent_active']="agencies";
        $data['sidebar_item_child_active']="add_agency";
        $data['label'] = $this->lang->line('admin_new_agency');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        
        $data['cities'] = $this->city->getAll();
        $data['districts'] = $this->district->getAll();
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/agencies/add_agency', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function agencies_edit_agency(){
        $data['sidebar_item_parent_active']="agencies";
        $data['sidebar_item_child_active']="agencies";
        $data['label'] = $this->lang->line('admin_edit_agency');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');

        $id = $this->input->get('id');
        $agency = $this->agency->getAgencyById($id)[0];
        $data['cities'] = $this->city->getAll();
        $data['districts'] = $this->district->getAll();
        $data['agency'] = $agency;
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/agencies/edit_agency', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function agencies_getAllAgencies(){
        $all = $this->agency->getAll();
        echo json_encode($all);
    }
    public function agencies_agency_reviews(){
        $data['sidebar_item_parent_active']="agencies";
        $data['sidebar_item_child_active']="agency_reviews";
        $data['label'] = $this->lang->line('admin_agency_reviews');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');

        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/agencies/agency_reviews');
        $this->load->view('templates/backend/footer', $data);
    }
    public function agencies_getAgencyReviews(){
        $page = $this->input->post("pagination[page]");
        $pages = $this->input->post("pagination[pages]");
        $perpage = $this->input->post("pagination[perpage]");
        $total = $this->input->post("pagination[total]");
        $search_key = $this->input->post("query[generalSearch]");
        $sort_field = $this->input->post("sort[field]");
        $sort_sort = $this->input->post("sort[sort]");

        $total = $this->agency_review->getAgencyReviewsTotal($search_key);
        $pages = ceil($total/$perpage);
        if($pages<$page) $page = $pages;
        $agencies = $this->agency_review->getAgencyReviewsByParams($page, $perpage, $search_key, $sort_field, $sort_sort);
        $meta = array(
            "page" => $page,
            "pages" => $pages,
            "perpage" => $perpage,
            "total" => $total,
            "sort" => "asc",
            "field" => "id"
        );
        echo json_encode(array("meta"=>$meta, "data"=>$agencies));
    }
    public function agencies_agency_review_detail(){
        $data['sidebar_item_parent_active']="agencies";
        $data['sidebar_item_child_active']="edit_agency_review";
        $data['label'] = $this->lang->line('admin_agency_review_detail');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');

        $data['agencies'] = $this->agency->getAll();
        $data['guides'] = $this->guide->getAll();
        $id = $this->input->get('id');
        $data['agency_review'] = $this->agency_review->getAgencyReviewById($id)[0];

        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/agencies/agency_review_detail', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function agencies_add_agency_review(){
        $data['sidebar_item_parent_active']="agencies";
        $data['sidebar_item_child_active']="add_agency_review";
        $data['label'] = $this->lang->line('admin_new_agency_review');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        $data['agencies'] = $this->agency->getAll();
        $data['guides'] = $this->guide->getAll();

        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/agencies/add_agency_review', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function agencies_edit_agency_review(){
        $data['sidebar_item_parent_active']="agencies";
        $data['sidebar_item_child_active']="edit_agency_review";
        $data['label'] = $this->lang->line('admin_edit_agency_review');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');

        $data['agencies'] = $this->agency->getAll();
        $data['guides'] = $this->guide->getAll();
        $id = $this->input->get('id');
        $data['agency_review'] = $this->agency_review->getAgencyReviewById($id)[0];

        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/agencies/edit_agency_review', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function agencies_save_agency_review(){
        $data = $this->input->post();
        $data['submission_date']=date('Y-m-d H:i:s');
        if(!isset($data['status'])) $data['status']="deactive";
        if($this->agency_review->save($data))
            echo "success";
        else echo "fail";
    }
    public function agencies_update_agency_review(){
        $data = $this->input->post();
        if(!isset($data['status']))
            $data['status']="deactive";
        $data['submission_date']=date('Y-m-d H:i:s');
        if($this->agency_review->update($data['id'], $data))
            echo "success";
        else echo "fail";
    }
    public function agencies_delete_agency_review(){
        $id = $this->input->get('id');
        $this->agency_review->delete($id);
        $this->agencies_agency_reviews();
    }
    //supervisors
    public function accountManagement_supervisors(){
        $data['sidebar_item_parent_active']="accountManagement";
        $data['sidebar_item_child_active']="supervisors";
        $data['label'] = $this->lang->line('admin_supervisor_list');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/accountManagement/supervisors/supervisors', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function accountManagement_getSupervisors(){
        $page = $this->input->post("pagination[page]");
        $pages = $this->input->post("pagination[pages]");
        $perpage = $this->input->post("pagination[perpage]");
        $total = $this->input->post("pagination[total]");
        $search_key = $this->input->post("query[generalSearch]");
        $sort_field = $this->input->post("sort[field]");
        $sort_sort = $this->input->post("sort[sort]");

        $total = $this->supervisor->getSupervisorsTotal($search_key);
        $pages = ceil($total/$perpage);
        if($pages<$page) $page = $pages;
        $supervisors = $this->supervisor->getSupervisorsByParams($page, $perpage, $search_key, $sort_field, $sort_sort);
        $meta = array(
            "page" => $page,
            "pages" => $pages,
            "perpage" => $perpage,
            "total" => $total,
            "sort" => "asc",
            "field" => "id"
        );
        echo json_encode(array("meta"=>$meta, "data"=>$supervisors));
    }
    public function accountManagement_add_supervisor(){
        $data['sidebar_item_parent_active']="accountManagement";
        $data['sidebar_item_child_active']="add_supervisor";
        $data['departments'] = $this->department->getAll();
        $data['label'] = $this->lang->line('admin_new_supervisor');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/accountManagement/supervisors/add_supervisor', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function accountManagement_edit_supervisor(){
        $data['sidebar_item_parent_active']="accountManagement";
        $data['sidebar_item_child_active']="edit_supervisor";
        $data['label'] = $this->lang->line('admin_edit_supervisor');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');

        $id = $this->input->get('id');
        $supervisor = $this->supervisor->getsupervisorById($id)[0];
        $data['supervisor'] = $supervisor;
        $data['departments'] = $this->department->getAll();
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/accountManagement/supervisors/edit_supervisor', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function accountManagement_getAllSupervisors(){
        $all = $this->supervisor->getAll();
        echo json_encode($all);
    }
    //editors
    public function accountManagement_editors(){
        $data['sidebar_item_parent_active']="accountManagement";
        $data['sidebar_item_child_active']="editors";
        $data['label'] = $this->lang->line('admin_editor_list');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/accountManagement/editors/editors');
        $this->load->view('templates/backend/footer', $data);
    }
    public function accountManagement_getEditors(){
        $page = $this->input->post("pagination[page]");
        $pages = $this->input->post("pagination[pages]");
        $perpage = $this->input->post("pagination[perpage]");
        $total = $this->input->post("pagination[total]");
        $search_key = $this->input->post("query[generalSearch]");
        $sort_field = $this->input->post("sort[field]");
        $sort_sort = $this->input->post("sort[sort]");

        $total = $this->editor->getEditorsTotal($search_key);
        $pages = ceil($total/$perpage);
        if($pages<$page) $page = $pages;
        $editors = $this->editor->getEditorsByParams($page, $perpage, $search_key, $sort_field, $sort_sort);
        $meta = array(
            "page" => $page,
            "pages" => $pages,
            "perpage" => $perpage,
            "total" => $total,
            "sort" => "asc",
            "field" => "id"
        );
        echo json_encode(array("meta"=>$meta, "data"=>$editors));
    }
    public function accountManagement_add_editor(){
        $data['sidebar_item_parent_active']="accountManagement";
        $data['sidebar_item_child_active']="add_editor";
        $data['label'] = $this->lang->line('admin_new_editor');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        $data['supervisors'] = $this->supervisor->getAll();
        $data['departments'] = $this->department->getAll();
        
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/accountManagement/editors/add_editor', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function accountManagement_edit_editor(){
        $data['sidebar_item_parent_active']="accountManagement";
        $data['sidebar_item_child_active']="edit_editor";
        $data['label'] = $this->lang->line('admin_edit_editor');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        $id = $this->input->get('id');
        $editor = $this->editor->geteditorById($id)[0];
        $data['editor'] = $editor;
        $data['supervisors'] = $this->supervisor->getAll();
        $data['departments'] = $this->department->getAll();
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/accountManagement/editors/edit_editor', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function accountManagement_getAllEditors(){
        $all = $this->editor->getAll();
        echo json_encode($all);
    }
    //announcements
    public function announcements_announcements(){
        $data['sidebar_item_parent_active']="announcements";
        $data['sidebar_item_child_active']="announcements";
        $data['label'] = $this->lang->line('admin_announcement_list');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/announcements/announcements');
        $this->load->view('templates/backend/footer', $data);
    }
    public function announcements_getAnnouncements(){
        $page = $this->input->post("pagination[page]");
        $pages = $this->input->post("pagination[pages]");
        $perpage = $this->input->post("pagination[perpage]");
        $total = $this->input->post("pagination[total]");
        $search_key = $this->input->post("query[generalSearch]");
        $sort_field = $this->input->post("sort[field]");
        $sort_sort = $this->input->post("sort[sort]");

        $total = $this->announcement->getAnnouncementsTotal($search_key);
        $pages = ceil($total/$perpage);
        if($pages<$page) $page = $pages;
        $announcements = $this->announcement->getAnnouncementsByParams($page, $perpage, $search_key, $sort_field, $sort_sort);
        $meta = array(
            "page" => $page,
            "pages" => $pages,
            "perpage" => $perpage,
            "total" => $total,
            "sort" => "asc",
            "field" => "id"
        );
        echo json_encode(array("meta"=>$meta, "data"=>$announcements));
    }
    public function announcements_announcement_detail(){
        $data['sidebar_item_parent_active']="announcements";
        $data['sidebar_item_child_active']="edit_announcement";
        $data['label'] = $this->lang->line('admin_announcement_detail');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');

        $data['categories'] = $this->subject_category->getAll();
        $data['cities'] = $this->city->getAll();
        $data['countries'] = $this->country->getAll();
        $id = $this->input->get('id');
        $announcement = $this->announcement->getannouncementById($id)[0];
        $data['announcement'] = $announcement;
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/announcements/announcement_detail', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function announcements_add_announcement(){
        $data['sidebar_item_parent_active']="announcements";
        $data['sidebar_item_child_active']="add_announcement";
        $data['label'] = $this->lang->line('admin_new_announcement');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        $data['categories'] = $this->subject_category->getAll();
        $data['cities'] = $this->city->getAll();
        $data['countries'] = $this->country->getAll();
        
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/announcements/add_announcement', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function announcements_edit_announcement(){
        $data['sidebar_item_parent_active']="announcements";
        $data['sidebar_item_child_active']="edit_announcement";
        $data['label'] = $this->lang->line('admin_edit_announcement');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');

        $data['categories'] = $this->subject_category->getAll();
        $data['cities'] = $this->city->getAll();
        $data['countries'] = $this->country->getAll();
        $id = $this->input->get('id');
        $announcement = $this->announcement->getannouncementById($id)[0];
        $data['announcement'] = $announcement;
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/announcements/edit_announcement', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function announcements_getAllannouncements(){
        $all = $this->announcement->getAll();
        echo json_encode($all);
    }
    public function upload_announcement_logo(){
        $id = $this->input->get('announcement_id');
        $target_dir = "uploads/announcement/";
        if(!is_dir($target_dir))
            mkdir($target_dir, 0755, true);
        if(isset($_FILES["file"])){
            $target_file = $target_dir.$_FILES["file"]["name"];
            move_uploaded_file($_FILES["file"]["tmp_name"], $target_file); 
            $this->announcement->update($id, array('logo'=>$target_file));
        }
    }
    public function announcements_save_announcement(){
        $data = $this->input->post();
        if(isset($data['category']))
            $data['category'] = json_encode($data['category']);
        $this->announcement->save($data);
        $res = array("status"=>"success", "msg"=>"This announcement is successfully saved!");
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
    }
    public function announcements_update_announcement(){
        $data = $this->input->post();
        if(isset($data['category']))
            $data['category'] = json_encode($data['category']);
        $this->announcement->update($data['id'], $data);
        $res = array("status"=>"success", "msg"=>"This announcement is successfully updated!");
        //else $res = array("status"=>"fail", "msg"=>"Error occurs! Please Try again!");
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
    }
    public function announcements_delete_announcement(){
        $id = $this->input->get('id');
        $this->announcement->delete($id);
        $this->announcements_announcements();
    }
    //settings-countries
    public function settings_countries(){
        $data['sidebar_item_parent_active']="settings";
        $data['sidebar_item_child_active']="countries";
        $data['label'] = $this->lang->line('admin_country_list');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/settings/countries/countries', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function settings_getCountries(){
        $page = $this->input->post("pagination[page]");
        $pages = $this->input->post("pagination[pages]");
        $perpage = $this->input->post("pagination[perpage]");
        $total = $this->input->post("pagination[total]");
        $search_key = $this->input->post("query[generalSearch]");
        $sort_field = $this->input->post("sort[field]");
        $sort_sort = $this->input->post("sort[sort]");
        $total = $this->country->getCountriesTotal($search_key);
        $pages = ceil($total/$perpage);
        if($pages<$page) $page = $pages;
        $countries = $this->country->getCountriesByParams($page, $perpage, $search_key, $sort_field, $sort_sort);
        $meta = array(
            "page" => $page,
            "pages" => $pages,
            "perpage" => $perpage,
            "total" => $total,
            "sort" => "asc",
            "field" => "id"
        );
        echo json_encode(array("meta"=>$meta, "data"=>$countries));
    }
    public function settings_add_country(){
        $data['sidebar_item_parent_active']="settings";
        $data['sidebar_item_child_active']="add_country";
        $data['label'] = $this->lang->line('admin_new_country');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/settings/countries/add_country', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function settings_edit_country(){
        $data['sidebar_item_parent_active']="settings";
        $data['sidebar_item_child_active']="edit_country";
        $data['label'] = $this->lang->line('admin_edit_country');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        $id = $this->input->get('id');
        $country = $this->country->getCountryById($id)[0];
        $data['country'] = $country;
        
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/settings/countries/edit_country', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function settings_getAllCountries(){
        $all = $this->country->getAll();
        echo json_encode($all);
    }
    public function settings_save_country(){
        $data = $this->input->post();
        if($this->country->save($data))
            echo "success";
        else echo "fail";
    }
    public function settings_update_country(){
        $data = $this->input->post();
        $this->country->update($data['id'], $data);
        echo "success";
    }
    public function settings_delete_country(){
        $id = $this->input->get('id');
        $this->country->delete($id);
        $this->settings_countries();
    }
    //cities
    public function settings_cities(){
        $data['sidebar_item_parent_active']="settings";
        $data['sidebar_item_child_active']="cities";
        $data['label'] = $this->lang->line('admin_city_list');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/settings/cities/cities', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function settings_getCities(){
        $page = $this->input->post("pagination[page]");
        $pages = $this->input->post("pagination[pages]");
        $perpage = $this->input->post("pagination[perpage]");
        $total = $this->input->post("pagination[total]");
        $search_key = $this->input->post("query[generalSearch]");
        $sort_field = $this->input->post("sort[field]");
        $sort_sort = $this->input->post("sort[sort]");

        $total = $this->city->getCitiesTotal($search_key);
        $pages = ceil($total/$perpage);
        if($pages<$page) $page = $pages;
        $cities = $this->city->getCitiesByParams($page, $perpage, $search_key, $sort_field, $sort_sort);
        $meta = array(
            "page" => $page,
            "pages" => $pages,
            "perpage" => $perpage,
            "total" => $total,
            "sort" => "asc",
            "field" => "id"
        );
        echo json_encode(array("meta"=>$meta, "data"=>$cities));
    }
    public function settings_add_city(){
        $data['sidebar_item_parent_active']="settings";
        $data['sidebar_item_child_active']="add_city";
        $data['label'] = $this->lang->line('admin_new_city');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/settings/cities/add_city', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function settings_edit_city(){
        $data['sidebar_item_parent_active']="settings";
        $data['sidebar_item_child_active']="edit_city";
        $data['label'] = $this->lang->line('admin_edit_city');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        $id = $this->input->get('id');
        $city = $this->city->getCityById($id)[0];
        $data['city'] = $city;
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/settings/cities/edit_city', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function settings_save_city(){
        $data = $this->input->post();
        if($this->city->save($data))
            echo "success";
        else echo "fail";
    }
    public function settings_update_city(){
        $data = $this->input->post();
        $this->city->update($data['id'], $data);
        echo "success";
    }
    public function settings_delete_city(){
        $id = $this->input->get('id');
        $this->city->delete($id);
        $this->settings_cities();
    }
    //districts
    public function settings_districts(){
        $data['sidebar_item_parent_active']="settings";
        $data['sidebar_item_child_active']="districts";
        $data['label'] = $this->lang->line('admin_district_list');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/settings/districts/districts', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function settings_getDistricts(){
        $page = $this->input->post("pagination[page]");
        $pages = $this->input->post("pagination[pages]");
        $perpage = $this->input->post("pagination[perpage]");
        $total = $this->input->post("pagination[total]");
        $search_key = $this->input->post("query[generalSearch]");
        $sort_field = $this->input->post("sort[field]");
        $sort_sort = $this->input->post("sort[sort]");

        $total = $this->district->getDistrictsTotal($search_key);
        $pages = ceil($total/$perpage);
        if($pages<$page) $page = $pages;
        $districts = $this->district->getDistrictsByParams($page, $perpage, $search_key, $sort_field, $sort_sort);
        $meta = array(
            "page" => $page,
            "pages" => $pages,
            "perpage" => $perpage,
            "total" => $total,
            "sort" => "asc",
            "field" => "id"
        );
        echo json_encode(array("meta"=>$meta, "data"=>$districts));
    }
    public function settings_add_district(){
        $data['sidebar_item_parent_active']="settings";
        $data['sidebar_item_child_active']="add_district";
        $data['label'] = $this->lang->line('admin_new_district');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/settings/districts/add_district', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function settings_edit_district(){
        $data['sidebar_item_parent_active']="settings";
        $data['sidebar_item_child_active']="edit_district";
        $data['label'] = $this->lang->line('admin_edit_district');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        $id = $this->input->get('id');
        $district = $this->district->getDistrictById($id)[0];
        $data['district'] = $district;
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/settings/districts/edit_district', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function settings_save_district(){
        $data = $this->input->post();
        if($this->district->save($data))
            echo "success";
        else echo "fail";
    }
    public function settings_update_district(){
        $data = $this->input->post();
        $this->district->update($data['id'], $data);
        echo "success";
    }
    public function settings_delete_district(){
        $id = $this->input->get('id');
        $this->district->delete($id);
        $this->settings_districts();
    }
    //regions
    public function settings_regions(){
        $data['sidebar_item_parent_active']="settings";
        $data['sidebar_item_child_active']="regions";
        $data['label'] = $this->lang->line('admin_region_list');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/settings/regions/regions', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function settings_getRegions(){
        $page = $this->input->post("pagination[page]");
        $pages = $this->input->post("pagination[pages]");
        $perpage = $this->input->post("pagination[perpage]");
        $total = $this->input->post("pagination[total]");
        $search_key = $this->input->post("query[generalSearch]");
        $sort_field = $this->input->post("sort[field]");
        $sort_sort = $this->input->post("sort[sort]");

        $total = $this->region->getRegionsTotal($search_key);
        $pages = ceil($total/$perpage);
        if($pages<$page) $page = $pages;
        $regions = $this->region->getRegionsByParams($page, $perpage, $search_key, $sort_field, $sort_sort);
        $meta = array(
            "page" => $page,
            "pages" => $pages,
            "perpage" => $perpage,
            "total" => $total,
            "sort" => "asc",
            "field" => "id"
        );
        echo json_encode(array("meta"=>$meta, "data"=>$regions));
    }
    public function settings_add_region(){
        $data['sidebar_item_parent_active']="settings";
        $data['sidebar_item_child_active']="add_region";
        $data['label'] = $this->lang->line('admin_new_region');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/settings/regions/add_region', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function settings_edit_region(){
        $data['sidebar_item_parent_active']="settings";
        $data['sidebar_item_child_active']="edit_region";
        $data['label'] = $this->lang->line('admin_edit_region');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        $id = $this->input->get('id');
        $region = $this->region->getregionById($id)[0];
        $data['region'] = $region;
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/settings/regions/edit_region', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function settings_save_region(){
        $data = $this->input->post();
        if($this->region->save($data))
            echo "success";
        else echo "fail";
    }
    public function settings_update_region(){
        $data = $this->input->post();
        $this->region->update($data['id'], $data);
        echo "success";
    }
    public function settings_delete_region(){
        $id = $this->input->get('id');
        $this->region->delete($id);
        $this->settings_regions();
    }
    //langauges
    public function settings_languages(){
        $data['sidebar_item_parent_active']="settings";
        $data['sidebar_item_child_active']="languages";
        $data['label'] = $this->lang->line('admin_language_list');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/settings/languages/languages', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function settings_getAllLanguages(){
        $languages = $this->language->getAll();
        echo json_encode(array("data"=>$languages));
    }
    public function settings_getLanguages(){
        $page = $this->input->post("pagination[page]");
        $pages = $this->input->post("pagination[pages]");
        $perpage = $this->input->post("pagination[perpage]");
        $total = $this->input->post("pagination[total]");
        $search_key = $this->input->post("query[generalSearch]");
        $sort_field = $this->input->post("sort[field]");
        $sort_sort = $this->input->post("sort[sort]");

        $total = $this->language->getLanguagesTotal($search_key);
        $pages = ceil($total/$perpage);
        if($pages<$page) $page = $pages;
        $languages = $this->language->getLanguagesByParams($page, $perpage, $search_key, $sort_field, $sort_sort);
        $meta = array(
            "page" => $page,
            "pages" => $pages,
            "perpage" => $perpage,
            "total" => $total,
            "sort" => "asc",
            "field" => "id"
        );
        echo json_encode(array("meta"=>$meta, "data"=>$languages));
    }
    public function settings_add_language(){
        $data['sidebar_item_parent_active']="settings";
        $data['sidebar_item_child_active']="add_language";
        $data['label'] = $this->lang->line('admin_new_language');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/settings/languages/add_language', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function settings_edit_language(){
        $data['sidebar_item_parent_active']="settings";
        $data['sidebar_item_child_active']="edit_language";
        $data['label'] = $this->lang->line('admin_edit_language');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        $id = $this->input->get('id');
        $language = $this->language->getLanguageById($id)[0];
        $data['language'] = $language;
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/settings/languages/edit_language', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function settings_save_language(){
        $data = $this->input->post();
        if($this->language->save($data))
            echo "success";
        else echo "fail";
    }
    public function settings_update_language(){
        $data = $this->input->post();
        $this->language->update($data['id'], $data);
        echo "success";
    }
    public function settings_delete_language(){
        $id = $this->input->get('id');
        $this->language->delete($id);
        $this->settings_languages();
    }
    //specialisties
    public function settings_specialisties(){
        $data['sidebar_item_parent_active']="settings";
        $data['sidebar_item_child_active']="specialisties";
        $data['label'] = $this->lang->line('admin_specialisties_list');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/settings/specialisties/specialisties', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function settings_getAllSpecialisties(){
        $specialisties = $this->specialisties->getAll();
        echo json_encode(array("data"=>$specialisties));
    }
    public function settings_getSpecialisties(){
        $page = $this->input->post("pagination[page]");
        $pages = $this->input->post("pagination[pages]");
        $perpage = $this->input->post("pagination[perpage]");
        $total = $this->input->post("pagination[total]");
        $search_key = $this->input->post("query[generalSearch]");
        $sort_field = $this->input->post("sort[field]");
        $sort_sort = $this->input->post("sort[sort]");

        $total = $this->specialisties->getSpecialistiesTotal($search_key);
        $pages = ceil($total/$perpage);
        if($pages<$page) $page = $pages;
        $specialisties = $this->specialisties->getSpecialistiesByParams($page, $perpage, $search_key, $sort_field, $sort_sort);
        $meta = array(
            "page" => $page,
            "pages" => $pages,
            "perpage" => $perpage,
            "total" => $total,
            "sort" => "asc",
            "field" => "id"
        );
        echo json_encode(array("meta"=>$meta, "data"=>$specialisties));
    }
    public function settings_add_specialisties(){
        $data['sidebar_item_parent_active']="settings";
        $data['sidebar_item_child_active']="add_specialisties";
        $data['label'] = $this->lang->line('admin_new_specialisties');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/settings/specialisties/add_specialisties', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function settings_edit_specialisties(){
        $data['sidebar_item_parent_active']="settings";
        $data['sidebar_item_child_active']="edit_specialisties";
        $data['label'] = $this->lang->line('admin_edit_specialisties');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        $id = $this->input->get('id');
        $specialisties = $this->specialisties->getSpecialistiesById($id)[0];
        $data['specialisties'] = $specialisties;
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/settings/specialisties/edit_specialisties', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function settings_save_specialisties(){
        $data = $this->input->post();
        if($this->specialisties->save($data))
            echo "success";
        else echo "fail";
    }
    public function settings_update_specialisties(){
        $data = $this->input->post();
        //var_dump($data);
        $this->specialisties->update($data['id'], $data);
        echo "success";
    }
    public function settings_delete_specialisties(){
        $id = $this->input->get('id');
        $this->specialisties->delete($id);
        $this->settings_specialisties();
    }
    //chambers
    public function settings_chambers(){
        $data['sidebar_item_parent_active']="settings";
        $data['sidebar_item_child_active']="chambers";
        $data['label'] = $this->lang->line('admin_chamber_list');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/settings/chambers/chambers', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function settings_getAllChambers(){
        $chambers = $this->chamber->getAll();
        echo json_encode(array("data"=>$chambers));
    }
    public function settings_getChambers(){
        $page = $this->input->post("pagination[page]");
        $pages = $this->input->post("pagination[pages]");
        $perpage = $this->input->post("pagination[perpage]");
        $total = $this->input->post("pagination[total]");
        $search_key = $this->input->post("query[generalSearch]");
        $sort_field = $this->input->post("sort[field]");
        $sort_sort = $this->input->post("sort[sort]");

        $total = $this->chamber->getChambersTotal($search_key);
        $pages = ceil($total/$perpage);
        if($pages<$page) $page = $pages;
        $chambers = $this->chamber->getChambersByParams($page, $perpage, $search_key, $sort_field, $sort_sort);
        $meta = array(
            "page" => $page,
            "pages" => $pages,
            "perpage" => $perpage,
            "total" => $total,
            "sort" => "asc",
            "field" => "id"
        );
        echo json_encode(array("meta"=>$meta, "data"=>$chambers));
    }
    public function settings_add_chamber(){
        $data['sidebar_item_parent_active']="settings";
        $data['sidebar_item_child_active']="add_chamber";
        $data['label'] = $this->lang->line('admin_new_chamber');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/settings/chambers/add_chamber', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function settings_edit_chamber(){
        $data['sidebar_item_parent_active']="settings";
        $data['sidebar_item_child_active']="edit_chamber";
        $data['label'] = $this->lang->line('admin_edit_chamber');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        $id = $this->input->get('id');
        $chamber = $this->chamber->getChamberById($id)[0];
        $data['chamber'] = $chamber;
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/settings/chambers/edit_chamber', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function settings_save_chamber(){
        $data = $this->input->post();
        // var_dump($data);
        // exit;
        // $data['chamber'] = base64_encode($data['chamber']);
        // $data['chamber_short'] = base64_encode($data['chamber_short']);
        if($this->chamber->save($data))
            echo "success";
        else echo "fail";
    }
    public function settings_update_chamber(){
        $data = $this->input->post();
        // $data['chamber'] = base64_encode($data['chamber']);
        // $data['chamber_short'] = base64_encode($data['chamber_short']);
        $this->chamber->update($data['id'], $data);
        echo "success";
    }
    public function settings_delete_chamber(){
        $id = $this->input->get('id');
        $this->chamber->delete($id);
        $this->settings_chambers();
    }
    //subject categories
    public function settings_subject_categories(){
        $data['sidebar_item_parent_active']="settings";
        $data['sidebar_item_child_active']="subject_categories";
        $data['label'] = $this->lang->line('admin_subject_category_list');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/settings/subject-categories/subject_categories', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function settings_getAllSubjectCategories(){
        $subject_categories = $this->subject_category->getAll();
        echo json_encode(array("data"=>$subject_categories));
    }
    public function settings_getSubjectCategories(){
        $page = $this->input->post("pagination[page]");
        $pages = $this->input->post("pagination[pages]");
        $perpage = $this->input->post("pagination[perpage]");
        $total = $this->input->post("pagination[total]");
        $search_key = $this->input->post("query[generalSearch]");
        $sort_field = $this->input->post("sort[field]");
        $sort_sort = $this->input->post("sort[sort]");

        $total = $this->subject_category->getSubjectCategoriesTotal($search_key);
        $pages = ceil($total/$perpage);
        if($pages<$page) $page = $pages;
        $subject_categories = $this->subject_category->getSubjectCategoriesByParams($page, $perpage, $search_key, $sort_field, $sort_sort);
        $meta = array(
            "page" => $page,
            "pages" => $pages,
            "perpage" => $perpage,
            "total" => $total,
            "sort" => "asc",
            "field" => "id"
        );
        echo json_encode(array("meta"=>$meta, "data"=>$subject_categories));
    }
    public function settings_add_subject_category(){
        $data['sidebar_item_parent_active']="settings";
        $data['sidebar_item_child_active']="add_subject_category";
        $data['label'] = $this->lang->line('admin_new_subject_category');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/settings/subject-categories/add_subject_category', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function settings_edit_subject_category(){
        $data['sidebar_item_parent_active']="settings";
        $data['sidebar_item_child_active']="edit_subject_category";
        $data['label'] = $this->lang->line('admin_edit_subject_category');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        $id = $this->input->get('id');
        $subject_category = $this->subject_category->getSubjectCategoryById($id)[0];
        $data['subject_category'] = $subject_category;
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/settings/subject-categories/edit_subject_category', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function settings_save_subject_category(){
        $data = $this->input->post();
        if($this->subject_category->save($data))
            echo "success";
        else echo "fail";
    }
    public function settings_update_subject_category(){
        $data = $this->input->post();
        //var_dump($data);
        $this->subject_category->update($data['id'], $data);
        echo "success";
    }
    public function settings_delete_subject_category(){
        $id = $this->input->get('id');
        $this->subject_category->delete($id);
        $this->settings_subject_categories();
    }
    //shop categories
    public function settings_shop_categories(){
        $data['sidebar_item_parent_active']="settings";
        $data['sidebar_item_child_active']="shop_categories";
        $data['label'] = $this->lang->line('admin_shop_category_list');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/settings/shop-categories/shop_categories', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function settings_getAllShopCategories(){
        $shop_categories = $this->shop_category->getAll();
        echo json_encode(array("data"=>$shop_categories));
    }
    public function settings_getShopCategories(){
        $page = $this->input->post("pagination[page]");
        $pages = $this->input->post("pagination[pages]");
        $perpage = $this->input->post("pagination[perpage]");
        $total = $this->input->post("pagination[total]");
        $search_key = $this->input->post("query[generalSearch]");
        $sort_field = $this->input->post("sort[field]");
        $sort_sort = $this->input->post("sort[sort]");

        $total = $this->shop_category->getShopCategoriesTotal($search_key);
        $pages = ceil($total/$perpage);
        if($pages<$page) $page = $pages;
        $shop_categories = $this->shop_category->getShopCategoriesByParams($page, $perpage, $search_key, $sort_field, $sort_sort);
        $meta = array(
            "page" => $page,
            "pages" => $pages,
            "perpage" => $perpage,
            "total" => $total,
            "sort" => "asc",
            "field" => "id"
        );
        echo json_encode(array("meta"=>$meta, "data"=>$shop_categories));
    }
    public function settings_add_shop_category(){
        $data['sidebar_item_parent_active']="settings";
        $data['sidebar_item_child_active']="add_shop_category";
        $data['label'] = $this->lang->line('admin_new_shop_category');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/settings/shop-categories/add_shop_category', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function settings_edit_shop_category(){
        $data['sidebar_item_parent_active']="settings";
        $data['sidebar_item_child_active']="edit_shop_category";
        $data['label'] = $this->lang->line('admin_edit_shop_category');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        $id = $this->input->get('id');
        $shop_category = $this->shop_category->getShopCategoryById($id)[0];
        $data['shop_category'] = $shop_category;
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/settings/shop-categories/edit_shop_category', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function settings_save_shop_category(){
        $data = $this->input->post();
        if($this->shop_category->save($data))
            echo "success";
        else echo "fail";
    }
    public function settings_update_shop_category(){
        $data = $this->input->post();
        //var_dump($data);
        $this->shop_category->update($data['id'], $data);
        echo "success";
    }
    public function settings_delete_shop_category(){
        $id = $this->input->get('id');
        $this->shop_category->delete($id);
        $this->settings_shop_categories();
    }
    //restaurant categories
    public function settings_restaurant_categories(){
        $data['sidebar_item_parent_active']="settings";
        $data['sidebar_item_child_active']="restaurant_categories";
        $data['label'] = $this->lang->line('admin_restaurant_category_list');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/settings/restaurant-categories/restaurant_categories', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function settings_getAllRestaurantCategories(){
        $restaurant_categories = $this->restaurant_category->getAll();
        echo json_encode(array("data"=>$restaurant_categories));
    }
    public function settings_getRestaurantCategories(){
        $page = $this->input->post("pagination[page]");
        $pages = $this->input->post("pagination[pages]");
        $perpage = $this->input->post("pagination[perpage]");
        $total = $this->input->post("pagination[total]");
        $search_key = $this->input->post("query[generalSearch]");
        $sort_field = $this->input->post("sort[field]");
        $sort_sort = $this->input->post("sort[sort]");

        $total = $this->restaurant_category->getRestaurantCategoriesTotal($search_key);
        $pages = ceil($total/$perpage);
        if($pages<$page) $page = $pages;
        $restaurant_categories = $this->restaurant_category->getRestaurantCategoriesByParams($page, $perpage, $search_key, $sort_field, $sort_sort);
        $meta = array(
            "page" => $page,
            "pages" => $pages,
            "perpage" => $perpage,
            "total" => $total,
            "sort" => "asc",
            "field" => "id"
        );
        echo json_encode(array("meta"=>$meta, "data"=>$restaurant_categories));
    }
    public function settings_add_restaurant_category(){
        $data['sidebar_item_parent_active']="settings";
        $data['sidebar_item_child_active']="add_restaurant_category";
        $data['label'] = $this->lang->line('admin_new_restaurant_category');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/settings/restaurant-categories/add_restaurant_category', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function settings_edit_restaurant_category(){
        $data['sidebar_item_parent_active']="settings";
        $data['sidebar_item_child_active']="edit_restaurant_category";
        $data['label'] = $this->lang->line('admin_edit_restaurant_category');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        $id = $this->input->get('id');
        $restaurant_category = $this->restaurant_category->getRestaurantCategoryById($id)[0];
        $data['restaurant_category'] = $restaurant_category;
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/settings/restaurant-categories/edit_restaurant_category', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function settings_save_restaurant_category(){
        $data = $this->input->post();
        if($this->restaurant_category->save($data))
            echo "success";
        else echo "fail";
    }
    public function settings_update_restaurant_category(){
        $data = $this->input->post();
        $this->restaurant_category->update($data['id'], $data);
        echo "success";
    }
    public function settings_delete_restaurant_category(){
        $id = $this->input->get('id');
        $this->restaurant_category->delete($id);
        $this->settings_restaurant_categories();
    }
    //shop categories
    public function settings_museum_categories(){
        $data['sidebar_item_parent_active']="settings";
        $data['sidebar_item_child_active']="museum_categories";
        $data['label'] = $this->lang->line('admin_museum_category_list');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/settings/museum-categories/museum_categories', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function settings_getAllMuseumCategories(){
        $museum_categories = $this->museum_category->getAll();
        echo json_encode(array("data"=>$museum_categories));
    }
    public function settings_getMuseumCategories(){
        $page = $this->input->post("pagination[page]");
        $pages = $this->input->post("pagination[pages]");
        $perpage = $this->input->post("pagination[perpage]");
        $total = $this->input->post("pagination[total]");
        $search_key = $this->input->post("query[generalSearch]");
        $sort_field = $this->input->post("sort[field]");
        $sort_sort = $this->input->post("sort[sort]");

        $total = $this->museum_category->getMuseumCategoriesTotal($search_key);
        $pages = ceil($total/$perpage);
        if($pages<$page) $page = $pages;
        $museum_categories = $this->museum_category->getMuseumCategoriesByParams($page, $perpage, $search_key, $sort_field, $sort_sort);
        $meta = array(
            "page" => $page,
            "pages" => $pages,
            "perpage" => $perpage,
            "total" => $total,
            "sort" => "asc",
            "field" => "id"
        );
        echo json_encode(array("meta"=>$meta, "data"=>$museum_categories));
    }
    public function settings_add_museum_category(){
        $data['sidebar_item_parent_active']="settings";
        $data['sidebar_item_child_active']="add_museum_category";
        $data['label'] = $this->lang->line('admin_new_museum_category');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/settings/museum-categories/add_museum_category', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function settings_edit_museum_category(){
        $data['sidebar_item_parent_active']="settings";
        $data['sidebar_item_child_active']="edit_museum_category";
        $data['label'] = $this->lang->line('admin_edit_museum_category');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        $id = $this->input->get('id');
        $museum_category = $this->museum_category->getMuseumCategoryById($id)[0];
        $data['museum_category'] = $museum_category;
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/settings/museum-categories/edit_museum_category', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function settings_save_museum_category(){
        $data = $this->input->post();
        if($this->museum_category->save($data))
            echo "success";
        else echo "fail";
    }
    public function settings_update_museum_category(){
        $data = $this->input->post();
        //var_dump($data);
        $this->museum_category->update($data['id'], $data);
        echo "success";
    }
    public function settings_delete_museum_category(){
        $id = $this->input->get('id');
        $this->shop_category->delete($id);
        $this->settings_shop_categories();
    }
    //tour types
    public function settings_tour_types(){
        $data['sidebar_item_parent_active']="settings";
        $data['sidebar_item_child_active']="tour_types";
        $data['label'] = $this->lang->line('admin_tour_type_list');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/settings/tour-types/tour_types', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function settings_getAllTourTypes(){
        $tour_types = $this->tour_type->getAll();
        echo json_encode(array("data"=>$tour_types));
    }
    public function settings_getTourTypes(){
        $page = $this->input->post("pagination[page]");
        $pages = $this->input->post("pagination[pages]");
        $perpage = $this->input->post("pagination[perpage]");
        $total = $this->input->post("pagination[total]");
        $search_key = $this->input->post("query[generalSearch]");
        $sort_field = $this->input->post("sort[field]");
        $sort_sort = $this->input->post("sort[sort]");

        $total = $this->tour_type->getTourTypesTotal($search_key);
        $pages = ceil($total/$perpage);
        if($pages<$page) $page = $pages;
        $tour_types = $this->tour_type->getTourTypesByParams($page, $perpage, $search_key, $sort_field, $sort_sort);
        $meta = array(
            "page" => $page,
            "pages" => $pages,
            "perpage" => $perpage,
            "total" => $total,
            "sort" => "asc",
            "field" => "id"
        );
        echo json_encode(array("meta"=>$meta, "data"=>$tour_types));
    }
    public function settings_add_tour_type(){
        $data['sidebar_item_parent_active']="settings";
        $data['sidebar_item_child_active']="add_tour_type";
        $data['label'] = $this->lang->line('admin_new_tour_type');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/settings/tour-types/add_tour_type', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function settings_edit_tour_type(){
        $data['sidebar_item_parent_active']="settings";
        $data['sidebar_item_child_active']="edit_tour_type";
        $data['label'] = $this->lang->line('admin_edit_tour_type');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        $id = $this->input->get('id');
        $tour_type = $this->tour_type->getTourTypeById($id)[0];
        $data['tour_type'] = $tour_type;
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/settings/tour-types/edit_tour_type', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function settings_save_tour_type(){
        $data = $this->input->post();
        if($this->tour_type->save($data))
            echo "success";
        else echo "fail";
    }
    public function settings_update_tour_type(){
        $data = $this->input->post();
        $this->tour_type->update($data['id'], $data);
        echo "success";
    }
    public function settings_delete_tour_type(){
        $id = $this->input->get('id');
        $this->tour_type->delete($id);
        $this->settings_subject_categories();
    }
    //departments
    public function accountManagement_departments(){
        $data['sidebar_item_parent_active']="accountManagement";
        $data['sidebar_item_child_active']="departments";
        $data['label'] = $this->lang->line('admin_department_list');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/accountManagement/departments/departments', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function accountManagement_getAllDepartments(){
        $departments = $this->department->getAll();
        echo json_encode(array("data"=>$departments));
    }
    public function accountManagement_getDepartments(){
        $page = $this->input->post("pagination[page]");
        $pages = $this->input->post("pagination[pages]");
        $perpage = $this->input->post("pagination[perpage]");
        $total = $this->input->post("pagination[total]");
        $search_key = $this->input->post("query[generalSearch]");
        $sort_field = $this->input->post("sort[field]");
        $sort_sort = $this->input->post("sort[sort]");

        $total = $this->department->getDepartmentsTotal($search_key);
        $pages = ceil($total/$perpage);
        if($pages<$page) $page = $pages;
        $departments = $this->department->getDepartmentsByParams($page, $perpage, $search_key, $sort_field, $sort_sort);
        $meta = array(
            "page" => $page,
            "pages" => $pages,
            "perpage" => $perpage,
            "total" => $total,
            "sort" => "asc",
            "field" => "id"
        );
        echo json_encode(array("meta"=>$meta, "data"=>$departments));
    }
    public function accountManagement_add_department(){
        $data['sidebar_item_parent_active']="accountManagement";
        $data['sidebar_item_child_active']="add_department";
        $data['label'] = $this->lang->line('admin_new_department');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/accountManagement/departments/add_department', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function accountManagement_edit_department(){
        $data['sidebar_item_parent_active']="accountManagement";
        $data['sidebar_item_child_active']="edit_department";
        $data['label'] = $this->lang->line('admin_edit_department');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        $id = $this->input->get('id');
        $department = $this->department->getDepartmentById($id)[0];
        $data['department'] = $department;
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/accountManagement/departments/edit_department', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function accountManagement_save_department(){
        $data = $this->input->post();
        if($this->department->save($data))
            echo "success";
        else echo "fail";
    }
    public function accountManagement_update_department(){
        $data = $this->input->post();
        if($this->department->update($data['id'], $data))
            echo "success";
        else echo "fail";
    }
    public function accountManagement_delete_department(){
        $id = $this->input->get('id');
        $this->department->delete($id);
        $this->accountManagement_departments();
    }
    public function settings_system_settings(){
        $data['sidebar_item_parent_active']="settings";
        $data['sidebar_item_child_active']="system_settings";
        $data['label'] = $this->lang->line('admin_system_settings');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');

        $data['system_settings'] = $this->system_settings->get()[0];
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/settings/system_settings', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function settings_update_system_settings(){
        $data = $this->input->post();
        if(!isset($data['allow_multi_language']))
            $data['allow_multi_language']="no";
        $this->session->set_userdata('allow_multi_language', $data['allow_multi_language']);
        $this->system_settings->update($data);
        $lang = $data['default_admin_language'];
        echo $lang;
    }
    public function tickets_tickets(){
        $data['sidebar_item_parent_active']="help_desk";
        $data['sidebar_item_child_active']="tickets";
        $data['label'] = $this->lang->line('admin_ticket_list');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/help-desk/tickets/tickets', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function tickets_getTickets(){
        $page = $this->input->post("pagination[page]");
        $pages = $this->input->post("pagination[pages]");
        $perpage = $this->input->post("pagination[perpage]");
        $total = $this->input->post("pagination[total]");
        $search_key = $this->input->post("query[generalSearch]");
        $sort_field = $this->input->post("sort[field]");
        $sort_sort = $this->input->post("sort[sort]");

        $total = $this->ticket->getTicketsTotal($search_key);
        $pages = ceil($total/$perpage);
        if($pages<$page) $page = $pages;
        $tickets = $this->ticket->getTicketsByParams($page, $perpage, $search_key, $sort_field, $sort_sort);
        $meta = array(
            "page" => $page,
            "pages" => $pages,
            "perpage" => $perpage,
            "total" => $total,
            "sort" => "asc",
            "field" => "id"
        );
        echo json_encode(array("meta"=>$meta, "data"=>$tickets));
    }
    public function tickets_ticket_view(){
        $data['sidebar_item_parent_active']="help_desk";
        $data['sidebar_item_child_active']="ticket_details";
        $data['label'] = $this->lang->line('admin_ticket_details');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');

        $id = $this->input->get('id');
        $data['ticket'] = $this->ticket->getTicketById($id)[0];
        $data['ticket_categories'] = $this->ticket_category->getAll();
        $data['messages'] = $this->ticket_history->getTicketHistoriesByTicketId($data['ticket']->ticket_id);
        
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/help-desk/tickets/ticket_details', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function add_reply_message(){
        $postData = $this->input->post();
        $useremail = $this->session->userdata('logged_in')['email'];
        $userid = $this->user->getUserByEmail($useremail)[0]->id;
        $message = $postData['message'];
        $message = base64_encode($message);
        $messageData = array(
            'ticket_id'=>$postData['ticket_id'],
            'from'=> $userid,
            'role'=>0,
            'message'=>$message,
            'reply_date'=>date('Y-m-d H:i:s')
        );
        if($this->ticket_history->save($messageData)){
            if($this->ticket->update($postData['ticket_id'], array('status'=>'Replied By Admin','last_updated'=>date('Y-m-d H:i:s'))))
                $res = array("status"=>"success", "msg"=>"This reply message is successfully sent to your client!");
            else $res = array("status"=>"fail", "msg"=>"Try again, please!");
        }
        else $res = array("status"=>"fail", "msg"=>"Try again, please!");
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
    } 
    public function tickets_close_ticket(){
        $ticket_id = $this->input->post('term');
        if($this->ticket->update($ticket_id, array('status'=>'Closed'))){
             $res = array("status"=>"success", "msg"=>"This ticket is successfully closed!");
        }
        else $res = array("status"=>"fail", "msg"=>"Try again, please!");
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
    }
    public function tickets_open_ticket(){
        $ticket_id = $this->input->post('term');
        $ticket_history = $this->ticket_history->getTicketHistoriesByTicketId($ticket_id);
        $role = $ticket_history[count($ticket_history)-1]->role;
        $status="";
        if($role == 0) $status = "Replied By Admin";
        else if($role == 3) $status = "Replied By Agency";
        else if($role == 4) $status = "Replied By Guide";
        if($this->ticket->update($ticket_id, array('status'=>$status))){
             $res = array("status"=>"success", "msg"=>"This ticket is successfully opened!");
        }
        else $res = array("status"=>"fail", "msg"=>"Try again, please!");
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
    }
    public function tickets_delete_ticket(){
        $id = $this->input->get('id');
        $this->ticket->delete($id);
        $this->tickets_tickets();
    }
    public function ticket_categories_ticket_categories(){
        $data['sidebar_item_parent_active']="help_desk";
        $data['sidebar_item_child_active']="ticket_categories";
        $data['label'] = $this->lang->line('admin_ticket_category_list');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/help-desk/ticket-categories/ticket_categories', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function ticket_categories_getTicketCategories(){
        $page = $this->input->post("pagination[page]");
        $pages = $this->input->post("pagination[pages]");
        $perpage = $this->input->post("pagination[perpage]");
        $total = $this->input->post("pagination[total]");
        $search_key = $this->input->post("query[generalSearch]");
        $sort_field = $this->input->post("sort[field]");
        $sort_sort = $this->input->post("sort[sort]");

        $total = $this->ticket_category->getTicketCategoriesTotal($search_key);
        // var_dump($total);
        // exit;
        $pages = ceil($total/$perpage);
        if($pages<$page) $page = $pages;
        $ticket_categories = $this->ticket_category->getTicketCategoriesByParams($page, $perpage, $search_key, $sort_field, $sort_sort);
        $meta = array(
            "page" => $page,
            "pages" => $pages,
            "perpage" => $perpage,
            "total" => $total,
            "sort" => "asc",
            "field" => "id"
        );
        echo json_encode(array("meta"=>$meta, "data"=>$ticket_categories));
    }
    public function ticket_categories_add_ticket_category(){
        $data['sidebar_item_parent_active']="help_desk";
        $data['sidebar_item_child_active']="add_ticket_category";
        $data['label'] = $this->lang->line('admin_new_ticket_category');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/help-desk/ticket-categories/add_ticket_category', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function ticket_categories_edit_ticket_category(){
        $data['sidebar_item_parent_active']="help_desk";
        $data['sidebar_item_child_active']="edit_ticket_category";
        $data['label'] = $this->lang->line('admin_edit_ticket_category');
        $data['sidebar_label'] = $this->lang->line('admin_sidebar');

        $id = $this->input->get('id');
        $data['ticket_category'] = $this->ticket_category->getTicketCategoryById($id)[0];
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/admin-sidebar', $data);
        $this->load->view('pages/admin/help-desk/ticket-categories/edit_ticket_category', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function ticket_categories_save_ticket_category(){
        $postData = $this->input->post();
        // var_dump($postData);
        // exit;
        if($this->ticket_category->save($postData))
            $res = array("status"=>"success", "msg"=>"This category is successfully saved!");
        else $res = array("status"=>"fail", "msg"=>"This category already exist!");
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
    }
    public function ticket_categories_update_ticket_category(){
        $postData = $this->input->post();
        if($this->ticket_category->update($postData['id'], $postData)>=0)
            $res = array("status"=>"success", "msg"=>"This category is successfully updated!");
        else $res = array("status"=>"fail", "msg"=>"This category already exist!");
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
    }
    public function ticket_categories_delete_ticket_category(){
        $id = $this->input->get('id');
        $this->ticket_category->delete($id);
        $this->ticket_categories_ticket_categories();
    }
    public function delete_shop_images(){
        $name = $this->input->post('name');
        $directory = "uploads/shop/";
        $path = $directory.$name;
        if(file_exists($path)){
            unlink($path);
            echo "success";
        }
        else echo "fail";
    }
    public function delete_restaurant_images(){
        $name = $this->input->post('name');
        $directory = "uploads/restaurant/";
        $path = $directory.$name;
        if(file_exists($path)){
            unlink($path);
            echo "success";
        }
        else echo "fail";
    }
    public function delete_museum_images(){
        $name = $this->input->post('name');
        $directory = "uploads/museum/";
        $path = $directory.$name;
        if(file_exists($path)){
            unlink($path);
            echo "success";
        }
        else echo "fail";
    }
    public function delete_attachment(){
        $name = $this->input->post('name');
        $directory = "uploads/attachments/";
        $path = $directory.$name;
        if(file_exists($path)){
            unlink($path);
            echo "success";
        }
        else echo "fail";
    }
}
