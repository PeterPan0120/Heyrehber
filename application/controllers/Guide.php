<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Guide extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->library('session');
        $this->lang->load('information', 'english');
        $this->load->helper('url');
        $this->load->model('Guide_model', 'guide');
        $this->load->model('Agency_model', 'agency');
        $this->load->model('Shop_model', 'shop');
        $this->load->model('ShopCategory_model', 'shop_category');
        $this->load->model('Restaurant_model', 'restaurant');
        $this->load->model('RestaurantCategory_model', 'restaurant_category');
        $this->load->model('MuseumCategory_model', 'museum_category');
        $this->load->model('Museum_model', 'museum');
        $this->load->model('District_model', 'district');
        $this->load->model('City_model', 'city');
        $this->load->model('Country_model', 'country');
        $this->load->model('Language_model', 'language');
        $this->load->model('Chamber_model', 'chamber');
        $this->load->model('Specialisty_model', 'specialisties');
        $this->load->model('GuideRequest_model', 'guide_request');
        $this->load->model('AgencyReview_model', 'agency_review');
        $this->load->model('GuideReview_model', 'guide_review');
        $this->load->model('Region_model', 'region');
        $this->load->model('TourType_model', 'tour_type');
        $this->load->model('Calendar_model', 'calendar');
        $this->load->model('CalendarSettings_model', 'calendar_settings');
        $this->load->model('GuideAvailability_model', 'guide_availability');
        $this->load->model('GuideUnavailability_model', 'guide_unavailability');
        $this->load->model('FavouriteAgency_model', 'favourite_agency');
        $this->load->model('NonFavouriteAgency_model', 'non_favourite_agency');

        $this->load->model('User_model', 'user');

        $this->load->model('SystemSettings_model', 'system_settings');
        $this->load->model('Ticket_model', 'ticket');
        $this->load->model('TicketHistory_model', 'ticket_history');
        $this->load->model('TicketCategory_model', 'ticket_category');
        $this->load->model("Attachment_model", 'attachment');
        $this->load->model("UploadImage_model", 'upload_image');

        $allow_multi_language = $this->system_settings->get()[0]->allow_multi_language;

        $this->session->set_userdata('allow_multi_language', $allow_multi_language);

        if($allow_multi_language=="no"){
            $this->session->unset_userdata('site_lang');
        }
        if(!$this->session->userdata('site_lang')){
            $lang = $this->system_settings->get()[0]->default_guide_language;
            if($lang=="Turkish")
                $this->session->set_userdata('site_lang', "turkish");
            else
                $this->session->set_userdata('site_lang', "english");
        }
        if(!$this->session->userdata('logged_in'))
            redirect('/auth/login');
    }
    public function dashboard()
    {
        $data['sidebar_item_parent_active']="dashboard";
        $data['sidebar_label'] = $this->lang->line('guide_sidebar');
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/guide-sidebar', $data);
        $this->load->view('pages/guide/dashboard', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    //my profile
    public function my_profile(){
        $data['sidebar_item_parent_active']="my_profile";
        $data['sidebar_label'] = $this->lang->line('guide_sidebar');
        $data['label'] = $this->lang->line('guide_my_profile');
        $data['regions'] = $this->region->getAll();
        $data['languages'] = $this->language->getAll();
        $data['cities'] = $this->city->getAll();
        $data['districts'] = $this->district->getAll();
        $data['chambers'] = $this->chamber->getAll();
        $data['specialisties'] = $this->specialisties->getAll();
        $data['guide'] = $this->guide->getGuideByEmail($this->session->userdata('logged_in')['email'])[0];
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/guide-sidebar', $data);
        $this->load->view('pages/guide/my-profile/profile', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function my_profile_edit_personal_profile(){
        $data['sidebar_item_parent_active']="my_profile";
        $data['sidebar_item_child_active']="edit_personal_profile";
        $data['sidebar_label'] = $this->lang->line('guide_sidebar');
        $data['label'] = $this->lang->line('guide_my_profile_edit_personal_profile');
        $data['regions'] = $this->region->getAll();
        $data['languages'] = $this->language->getAll();
        $data['cities'] = $this->city->getAll();
        $data['districts'] = $this->district->getAll();
        $data['guide'] = $this->guide->getGuideByEmail($this->session->userdata('logged_in')['email'])[0];
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/guide-sidebar', $data);
        $this->load->view('pages/guide/my-profile/edit_personal_profile', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function my_profile_edit_guide_profile(){
        $data['sidebar_item_parent_active']="my_profile";
        $data['sidebar_item_child_active']="edit_guide_profile";
        $data['sidebar_label'] = $this->lang->line('guide_sidebar');
        $data['label'] = $this->lang->line('guide_my_profile_edit_guide_profile');
        $data['regions'] = $this->region->getAll();
        $data['languages'] = $this->language->getAll();
        $data['cities'] = $this->city->getAll();
        $data['districts'] = $this->district->getAll();
        $data['chambers'] = $this->chamber->getAll();
        $data['specialisties'] = $this->specialisties->getAll();
        $data['guide'] = $this->guide->getGuideByEmail($this->session->userdata('logged_in')['email'])[0];
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/guide-sidebar', $data);
        $this->load->view('pages/guide/my-profile/edit_guide_profile', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function my_profile_edit_social_media_profile(){
        $data['sidebar_item_parent_active']="my_profile";
        $data['sidebar_item_child_active']="edit_social_media_profile";
        $data['sidebar_label'] = $this->lang->line('guide_sidebar');
        $data['label'] = $this->lang->line('guide_my_profile_edit_social_media_profile');
        $data['guide'] = $this->guide->getGuideByEmail($this->session->userdata('logged_in')['email'])[0];
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/guide-sidebar', $data);
        $this->load->view('pages/guide/my-profile/edit_social_media_profile', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    //calendar
    public function calendar_my_events(){
        $data['sidebar_item_parent_active']="calendar";
        $data['sidebar_item_child_active']="my_events";
        $data['label'] = $this->lang->line('guide_calendar_my_events');
        $data['sidebar_label'] = $this->lang->line('guide_sidebar');
        $min_date = date('Y-m-d');//$this->calendar->getMinDateEvent()[0]->event_date;
        if(isset($this->calendar->getMaxDateEvent()[0]))
            $max_date = $this->calendar->getMaxDateEvent()[0]->event_date;
        //var_dump(date('Y-m-d'));
        if(isset($max_date) && $max_date>=$min_date){
            $diff = abs(strtotime($max_date) - strtotime($min_date));
            $days = floor($diff/ (60*60*24));
            for($i=0; $i<=$days; $i++)
            {
                $array[$i]=[];
                $date = date('Y-m-d', strtotime($min_date." + ".$i." days"));
                $array[$i] = $this->calendar->getEventsByDate($date);
            }
            $data['result'] = $array;
            $data['min_date'] = $min_date;
        }
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/guide-sidebar', $data);
        $this->load->view('pages/guide/calendar/my_events', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function calendar_event_details(){
        $data['sidebar_item_parent_active']="calendar";
        $data['sidebar_item_child_active']="my_events";
        $data['sidebar_label'] = $this->lang->line('guide_sidebar');
        $data['label'] = $this->lang->line('guide_calendar_event_details');
        $data['guides'] = $this->guide->getAll();
        $data['tour_types'] = $this->tour_type->getAll();

        $id = $this->input->get('id');
        $event = $this->calendar->getEventById($id)[0];
        $data['event'] = $event;
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/guide-sidebar', $data);
        $this->load->view('pages/guide/calendar/my_event_details', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function calendar_add_event(){
        $data['sidebar_item_parent_active']="calendar";
        $data['sidebar_item_child_active']="my_events";
        $data['label'] = $this->lang->line('guide_calendar_add_my_event');
        $data['sidebar_label'] = $this->lang->line('guide_sidebar');
        $data['tour_types'] = $this->tour_type->getAll();
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/guide-sidebar', $data);
        $this->load->view('pages/guide/calendar/add_my_event', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function calendar_save_event(){
        $data = $this->input->post();
        if(!isset($data['finish_date']))
            $data['finish_date'] = $data['start_date'];
        $data['start_date'] = date('Y-m-d', strtotime($data['start_date']));
        $data['finish_date'] = date('Y-m-d', strtotime($data['finish_date']));
        $data['created_date'] = date('Y-m-d H:i:s');
        $data['requester'] = $this->guide->getGuideByEmail($this->session->userdata('logged_in')['email'])[0]->id;
        $sdate = $data['start_date'];
        $fdate = $data['finish_date'];
        $diff = abs(strtotime($fdate) - strtotime($sdate));
        $days = round($diff/ (60*60*24));
        for($i=0; $i<=$days; $i++){
            $data['event_date'] = date('Y-m-d', strtotime($sdate." + ".$i." days"));
            $this->calendar->save($data);
        }
        $res = array("status"=>"success", "msg"=>"This event is successfully saved!");
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
    }
    public function calendar_edit_event($id){
        $data = $this->input->post();
        if(!isset($data['start_time']))
            $data['start_time'] = "09:00:00";
        if(!isset($data['finish_time']))
            $data['finish_time'] = "17:00:00";
        $data['requester'] = $this->guide->getGuideByEmail($this->session->userdata('logged_in')['email'])[0]->id;
        $this->calendar->update($id, $data);
        echo "success";
    }
    public function calendar_delete_event($id){
        $this->calendar->delete($id);
        redirect('/guide/calendar_calendar');
    }
    public function calendar_get_event($id){
        //echo $id;
        $event = $this->calendar->getEventById($id)[0];
        $res = array("status"=>"success", "event"=>$event);
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
    }
    public function calendar_my_availability(){
        $data['sidebar_item_parent_active']="calendar";
        $data['sidebar_item_child_active']="my_availability";
        $data['label'] = $this->lang->line('guide_calendar_my_availabilities');
        $data['sidebar_label'] = $this->lang->line('guide_sidebar');
        
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/guide-sidebar', $data);
        $this->load->view('pages/guide/calendar/my_availabilities', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function calendar_getMyAvailableDays(){
        $page = $this->input->post("pagination[page]");
        $pages = $this->input->post("pagination[pages]");
        $perpage = $this->input->post("pagination[perpage]");
        $total = $this->input->post("pagination[total]");
        $search_key = $this->input->post("query[generalSearch]");
        $sort_field = $this->input->post("sort[field]");
        $sort_sort = $this->input->post("sort[sort]");

        $total = $this->guide_availability->getAvailableDaysTotal($search_key);
        $pages = ceil($total/$perpage);
        if($pages<$page) $page = $pages;
        $available_days = $this->guide_availability->getAvailableDaysByParams($page, $perpage, $search_key, $sort_field, $sort_sort);
        $meta = array(
            "page" => $page,
            "pages" => $pages,
            "perpage" => $perpage,
            "total" => $total,
            "sort" => "asc",
            "field" => "id"
        );
        echo json_encode(array("meta"=>$meta, "data"=>$available_days));
    }
    public function calendar_my_availability_details(){
        $data['sidebar_item_parent_active']="calendar";
        $data['sidebar_item_child_active']="my_availability";
        $data['sidebar_label'] = $this->lang->line('guide_sidebar');
        $data['label'] = $this->lang->line('guide_calendar_my_availability_details');
        
        $id = $this->input->get('id');
        $data['guide_availability'] = $this->guide_availability->getAvailabilityById($id)[0];
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/guide-sidebar', $data);
        $this->load->view('pages/guide/calendar/my_availability_details', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function calendar_add_my_availability(){
        $data['sidebar_item_parent_active']="calendar";
        $data['sidebar_item_child_active']="my_availability";
        $data['sidebar_label'] = $this->lang->line('guide_sidebar');
        $data['label'] = $this->lang->line('guide_calendar_new_my_availability');
        
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/guide-sidebar', $data);
        $this->load->view('pages/guide/calendar/add_my_availability', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function calendar_edit_my_availability(){
        $data['sidebar_item_parent_active']="calendar";
        $data['sidebar_item_child_active']="my_availability";
        $data['sidebar_label'] = $this->lang->line('guide_sidebar');
        $data['label'] = $this->lang->line('guide_calendar_edit_my_availability');
        
        $id = $this->input->get('id');
        $data['guide_availability'] = $this->guide_availability->getAvailabilityById($id)[0];
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/guide-sidebar', $data);
        $this->load->view('pages/guide/calendar/edit_my_availability', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function calendar_save_my_availability(){
        $postData = $this->input->post();
        $postData['guide'] = $this->guide->getGuideByEmail($this->session->userdata('logged_in')['email'])[0]->id;
        $postData['from'] = date('Y-m-d', strtotime($postData['from']));
        if(isset($postData['to']))
            $postData['to'] = date('Y-m-d', strtotime($postData['to']));
        else $postData['to'] = $postData['from'];
        // var_dump($postData);
        // exit;
        if($this->guide_availability->save($postData))
            $res = array("status"=>"success", "msg"=>"These days are successfully saved.");
        else 
            $res = array("status"=>"fail", "msg"=>"Please try again.");
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
    }
    public function calendar_update_my_availability(){
        $postData = $this->input->post();
        $postData['guide'] = $this->guide->getGuideByEmail($this->session->userdata('logged_in')['email'])[0]->id;
        $postData['from'] = date('Y-m-d', strtotime($postData['from']));
        if(isset($postData['to']))
            $postData['to'] = date('Y-m-d', strtotime($postData['to']));
        else $postData['to'] = $postData['from'];
        // var_dump($postData);
        // exit;
        if($this->guide_availability->update($postData['id'], $postData)>=0)
            $res = array("status"=>"success", "msg"=>"Updated successfully.");
        else 
            $res = array("status"=>"fail", "msg"=>"Please try again.");
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
    }
    public function calendar_my_unavailability(){
        $data['sidebar_item_parent_active']="calendar";
        $data['sidebar_item_child_active']="my_unavailability";
        $data['label'] = $this->lang->line('guide_calendar_my_unavailabilities');
        $data['sidebar_label'] = $this->lang->line('guide_sidebar');
        
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/guide-sidebar', $data);
        $this->load->view('pages/guide/calendar/my_unavailabilities', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function calendar_getMyUnavailableDays(){
        $page = $this->input->post("pagination[page]");
        $pages = $this->input->post("pagination[pages]");
        $perpage = $this->input->post("pagination[perpage]");
        $total = $this->input->post("pagination[total]");
        $search_key = $this->input->post("query[generalSearch]");
        $sort_field = $this->input->post("sort[field]");
        $sort_sort = $this->input->post("sort[sort]");

        $total = $this->guide_unavailability->getUnavailableDaysTotal($search_key);
        $pages = ceil($total/$perpage);
        if($pages<$page) $page = $pages;
        $unavailable_days = $this->guide_unavailability->getUnavailableDaysByParams($page, $perpage, $search_key, $sort_field, $sort_sort);
        $meta = array(
            "page" => $page,
            "pages" => $pages,
            "perpage" => $perpage,
            "total" => $total,
            "sort" => "asc",
            "field" => "id"
        );
        echo json_encode(array("meta"=>$meta, "data"=>$unavailable_days));
    }
    public function calendar_my_unavailability_details(){
        $data['sidebar_item_parent_active']="calendar";
        $data['sidebar_item_child_active']="my_unavailability";
        $data['sidebar_label'] = $this->lang->line('guide_sidebar');
        $data['label'] = $this->lang->line('guide_calendar_my_unavailability_details');
        
        $id = $this->input->get('id');
        $data['guide_unavailability'] = $this->guide_unavailability->getUnavailabilityById($id)[0];
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/guide-sidebar', $data);
        $this->load->view('pages/guide/calendar/my_unavailability_details', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function calendar_add_my_unavailability(){
        $data['sidebar_item_parent_active']="calendar";
        $data['sidebar_item_child_active']="my_unavailability";
        $data['sidebar_label'] = $this->lang->line('guide_sidebar');
        $data['label'] = $this->lang->line('guide_calendar_new_my_unavailability');
        
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/guide-sidebar', $data);
        $this->load->view('pages/guide/calendar/add_my_unavailability', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function calendar_edit_my_unavailability(){
        $data['sidebar_item_parent_active']="calendar";
        $data['sidebar_item_child_active']="my_unavailability";
        $data['sidebar_label'] = $this->lang->line('guide_sidebar');
        $data['label'] = $this->lang->line('guide_calendar_edit_my_unavailability');
        
        $id = $this->input->get('id');
        $data['guide_unavailability'] = $this->guide_unavailability->getUnavailabilityById($id)[0];
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/guide-sidebar', $data);
        $this->load->view('pages/guide/calendar/edit_my_unavailability', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function calendar_save_my_unavailability(){
        $postData = $this->input->post();
        $postData['guide'] = $this->guide->getGuideByEmail($this->session->userdata('logged_in')['email'])[0]->id;
        $postData['from'] = date('Y-m-d', strtotime($postData['from']));
        if(isset($postData['to']))
            $postData['to'] = date('Y-m-d', strtotime($postData['to']));
        else $postData['to'] = $postData['from'];
        // var_dump($postData);
        // exit;
        if($this->guide_unavailability->save($postData))
            $res = array("status"=>"success", "msg"=>"These days are successfully saved.");
        else 
            $res = array("status"=>"fail", "msg"=>"Please try again.");
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
    }
    public function calendar_update_my_unavailability(){
        $postData = $this->input->post();
        $postData['guide'] = $this->guide->getGuideByEmail($this->session->userdata('logged_in')['email'])[0]->id;
        $postData['from'] = date('Y-m-d', strtotime($postData['from']));
        if(isset($postData['to']))
            $postData['to'] = date('Y-m-d', strtotime($postData['to']));
        else $postData['to'] = $postData['from'];
        // var_dump($postData);
        // exit;
        if($this->guide_unavailability->update($postData['id'], $postData)>=0)
            $res = array("status"=>"success", "msg"=>"Updated successfully.");
        else 
            $res = array("status"=>"fail", "msg"=>"Please try again.");
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
    }
    public function calendar_settings(){
        $data['sidebar_item_parent_active']="calendar";
        $data['sidebar_item_child_active']="calendar_settings";
        $data['sidebar_label'] = $this->lang->line('guide_sidebar');
        $data['label'] = $this->lang->line('guide_calendar_settings');
        
        $id = $this->guide->getGuideByEmail($this->session->userdata('logged_in')['email'])[0]->id;
        if(isset($this->calendar_settings->getMyCalendarSettings($id)[0]))
           $data['calendar_settings'] = $this->calendar_settings->getMyCalendarSettings($id)[0];
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/guide-sidebar', $data);
        $this->load->view('pages/guide/calendar/calendar_settings', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function calendar_save_settings(){
        $postData = $this->input->post();
        $postData['guide'] = $this->guide->getGuideByEmail($this->session->userdata('logged_in')['email'])[0]->id;
        if($this->calendar_settings->save($postData)>=0)
            $res = array("status"=>"success", "msg"=>"Saved successfully.");
        else 
            $res = array("status"=>"fail", "msg"=>"Please try again.");
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
    }
    public function my_favourites_favourite_agencies(){
        $data['sidebar_item_parent_active']="my_favourites";
        $data['sidebar_item_child_active']="favourite_agencies";
        $data['sidebar_label'] = $this->lang->line('guide_sidebar');
        $data['label'] = $this->lang->line('guide_my_favourites_favourite_agencies');
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/guide-sidebar', $data);
        $this->load->view('pages/guide/my-favourites/favourite_agencies', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function my_favourites_getFavouriteAgencies(){
        $page = $this->input->post("pagination[page]");
        $pages = $this->input->post("pagination[pages]");
        $perpage = $this->input->post("pagination[perpage]");
        $total = $this->input->post("pagination[total]");
        $search_key = $this->input->post("query[generalSearch]");
        $sort_field = $this->input->post("sort[field]");
        $sort_sort = $this->input->post("sort[sort]");

        $total = $this->favourite_agency->getMyFavouriteAgenciesTotal($search_key);
        $pages = ceil($total/$perpage);
        if($pages<$page) $page = $pages;
        $favourite_agencies = $this->favourite_agency->getMyFavouriteAgenciesByParams($page, $perpage, $search_key, $sort_field, $sort_sort);
        $meta = array(
            "page" => $page,
            "pages" => $pages,
            "perpage" => $perpage,
            "total" => $total,
            "sort" => "asc",
            "field" => "id"
        );
        echo json_encode(array("meta"=>$meta, "data"=>$favourite_agencies));
    }
    public function my_favourites_add_favourite_agency(){
        $data['sidebar_item_parent_active']="my_favourites";
        $data['sidebar_item_child_active']="add_favourite_agency";
        $data['sidebar_label'] = $this->lang->line('guide_sidebar');
        $data['label'] = $this->lang->line('guide_my_favourites_new_favourite_agency');
        $data['agencies'] = $this->agency->getAll();
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/guide-sidebar', $data);
        $this->load->view('pages/guide/my-favourites/add_favourite_agency', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function my_favourites_edit_favourite_agency(){
        $data['sidebar_item_parent_active']="my_favourites";
        $data['sidebar_item_child_active']="edit_favourite_agency";
        $data['sidebar_label'] = $this->lang->line('guide_sidebar');
        $data['label'] = $this->lang->line('guide_my_favourites_edit_favourite_agency');
        $data['agencies'] = $this->agency->getAll();
        $id = $this->input->get('id');
        $data['favourite_agency'] = $this->favourite_agency->getFavouriteAgencyById($id)[0];
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/guide-sidebar', $data);
        $this->load->view('pages/guide/my-favourites/edit_favourite_agency', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function my_favourites_save_favourite_agency(){
        $postData = $this->input->post();
        $postData['guide'] = $this->guide->getGuideByEmail($this->session->userdata('logged_in')['email'])[0]->id;
        if($this->favourite_agency->save($postData))
            $res = array("status"=>"success", "msg"=>"This agency is successfully added as favourite agency.");
        else 
            $res = array("status"=>"fail", "msg"=>"This agency is already set as favourite agency.");
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
    }
    public function my_favourites_update_favourite_agency(){
        $postData = $this->input->post(); 
        $postData['guide'] = $this->guide->getGuideByEmail($this->session->userdata('logged_in')['email'])[0]->id;
        if($this->favourite_agency->update($postData['id'], $postData)>=0)
            $res = array("status"=>"success", "msg"=>"This agency is successfully updated as favourite agency.");
        else 
            $res = array("status"=>"fail", "msg"=>"This agency is already set as favourite agency.");
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
    }
    public function my_favourites_delete_favourite_agency(){
        $id = $this->input->get('id');
        $this->favourite_agency->delete($id);
        $this->my_favourites_favourite_agencies();
    }

    public function my_favourites_non_favourite_agencies(){
        $data['sidebar_item_parent_active']="my_favourites";
        $data['sidebar_item_child_active']="non_favourite_agencies";
        $data['sidebar_label'] = $this->lang->line('guide_sidebar');
        $data['label'] = $this->lang->line('guide_my_favourites_non_favourite_agencies');
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/guide-sidebar', $data);
        $this->load->view('pages/guide/my-favourites/non_favourite_agencies', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function my_favourites_getNonFavouriteAgencies(){
        $page = $this->input->post("pagination[page]");
        $pages = $this->input->post("pagination[pages]");
        $perpage = $this->input->post("pagination[perpage]");
        $total = $this->input->post("pagination[total]");
        $search_key = $this->input->post("query[generalSearch]");
        $sort_field = $this->input->post("sort[field]");
        $sort_sort = $this->input->post("sort[sort]");

        $total = $this->non_favourite_agency->getMyNonFavouriteAgenciesTotal($search_key);
        $pages = ceil($total/$perpage);
        if($pages<$page) $page = $pages;
        $non_favourite_agencies = $this->non_favourite_agency->getMyNonFavouriteAgenciesByParams($page, $perpage, $search_key, $sort_field, $sort_sort);
        $meta = array(
            "page" => $page,
            "pages" => $pages,
            "perpage" => $perpage,
            "total" => $total,
            "sort" => "asc",
            "field" => "id"
        );
        echo json_encode(array("meta"=>$meta, "data"=>$non_favourite_agencies));
    }
    public function my_favourites_add_non_favourite_agency(){
        $data['sidebar_item_parent_active']="my_favourites";
        $data['sidebar_item_child_active']="add_non_favourite_agency";
        $data['sidebar_label'] = $this->lang->line('guide_sidebar');
        $data['label'] = $this->lang->line('guide_my_favourites_new_non_favourite_agency');
        $data['agencies'] = $this->agency->getAll();
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/guide-sidebar', $data);
        $this->load->view('pages/guide/my-favourites/add_non_favourite_agency', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function my_favourites_edit_non_favourite_agency(){
        $data['sidebar_item_parent_active']="my_favourites";
        $data['sidebar_item_child_active']="edit_non_favourite_agency";
        $data['sidebar_label'] = $this->lang->line('guide_sidebar');
        $data['label'] = $this->lang->line('guide_my_favourites_edit_non_favourite_agency');
        $data['agencies'] = $this->agency->getAll();
        $id = $this->input->get('id');
        $data['non_favourite_agency'] = $this->non_favourite_agency->getNonFavouriteAgencyById($id)[0];
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/guide-sidebar', $data);
        $this->load->view('pages/guide/my-favourites/edit_non_favourite_agency', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function my_favourites_save_non_favourite_agency(){
        $postData = $this->input->post();
        $postData['guide'] = $this->guide->getGuideByEmail($this->session->userdata('logged_in')['email'])[0]->id;
        if($this->non_favourite_agency->save($postData))
            $res = array("status"=>"success", "msg"=>"This agency is successfully added as non favourite agency.");
        else 
            $res = array("status"=>"fail", "msg"=>"This agency is already set as non favourite agency.");
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
    }
    public function my_favourites_update_non_favourite_agency(){
        $postData = $this->input->post(); 
        $postData['guide'] = $this->guide->getGuideByEmail($this->session->userdata('logged_in')['email'])[0]->id;
        // var_dump($postData);
        // exit;
        if($this->non_favourite_agency->update($postData['id'], $postData)>=0)
            $res = array("status"=>"success", "msg"=>"This agency is successfully updated as non favourite agency.");
        else 
            $res = array("status"=>"fail", "msg"=>"This agency is already set as non favourite agency.");
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
    }
    public function my_favourites_delete_non_favourite_agency(){
        $id = $this->input->get('id');
        $this->non_favourite_agency->delete($id);
        $this->my_favourites_non_favourite_agencies();
    }
    //restaurants
    public function restaurants_restaurants(){
        $data['sidebar_item_parent_active']="restaurants";
        $data['sidebar_item_child_active']="restaurants";
        $data['categories'] = $this->restaurant_category->getAll();
        $data['districts'] = $this->district->getAll();
        $data['cities'] = $this->city->getAll();
        $data['sidebar_label'] = $this->lang->line('guide_sidebar');
        $data['label'] = $this->lang->line('guide_restaurant_list');
        
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/guide-sidebar', $data);
        $this->load->view('pages/guide/restaurants/restaurants', $data);
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

        $total = $this->restaurant->getRestaurantsTotal($search_key, $category, $district, $city, "active");
        $pages = ceil($total/$perpage);
        if($pages<$page) $page = $pages;
        $restaurants = $this->restaurant->getRestaurantsByParams($page, $perpage, $search_key, $category, $district, $city, "active", $sort_field, $sort_sort);
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
     public function restaurants_restaurant_details(){
        $data['sidebar_item_parent_active']="restaurants";
        $data['sidebar_item_child_active']="restaurant_details";
        $data['sidebar_label'] = $this->lang->line('guide_sidebar');
        $data['label'] = $this->lang->line('guide_restaurant_detail');

        $data['categories'] = $this->restaurant_category->getAll();
        $data['districts'] = $this->district->getAll();
        $data['cities'] = $this->city->getAll();
        $data['countries'] = $this->country->getAll();
        $id = $this->input->get('id');
        $restaurant = $this->restaurant->getRestaurantById($id)[0];
        $data['restaurant'] = $restaurant;
        $data['images'] = $this->upload_image->getimages('restaurant', $id);
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/guide-sidebar', $data);
        $this->load->view('pages/guide/restaurants/restaurant_detail', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function restaurants_getAllRestaurants(){
        $all = $this->restaurant->getAll();
        echo json_encode($all);
    }
    public function restaurants_delete_restaurant(){
        $id = $this->input->get('id');
        $this->restaurant->delete($id);
        $this->restaurants_restaurants();
    }
    //shops
    public function shops_shops(){
        $data['sidebar_item_parent_active']="shops";
        $data['sidebar_item_child_active']="shops";
        $data['categories'] = $this->shop_category->getAll();
        $data['districts'] = $this->district->getAll();
        $data['cities'] = $this->city->getAll();
        $data['sidebar_label'] = $this->lang->line('guide_sidebar');
        $data['label'] = $this->lang->line('guide_shop_list');
        
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/guide-sidebar', $data);
        $this->load->view('pages/guide/shops/shops', $data);
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

        $total = $this->shop->getShopsTotal($search_key, $category, $district, $city, "active");
        $pages = ceil($total/$perpage);
        if($pages<$page) $page = $pages;
        $shops = $this->shop->getShopsByParams($page, $perpage, $search_key, $category, $district, $city, "active", $sort_field, $sort_sort);
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
        $data['sidebar_label'] = $this->lang->line('guide_sidebar');
        $data['label'] = $this->lang->line('guide_shop_detail');

        $data['categories'] = $this->shop_category->getAll();
        $data['cities'] = $this->city->getAll();
        $data['countries'] = $this->country->getAll();
        $data['districts'] = $this->district->getAll();
        $id = $this->input->get('id');
        $shop = $this->shop->getShopById($id)[0];
        $data['shop'] = $shop;
        $data['images'] = $this->upload_image->getImages('shop', $id);
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/guide-sidebar', $data);
        $this->load->view('pages/guide/shops/shop_detail', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    //guide reviews
    public function reviews_agency_reviews(){
        $data['sidebar_item_parent_active']="reviews";
        $data['sidebar_item_child_active']="agency_reviews";

        $data['label'] = $this->lang->line('guide_reviews_agency_reviews');
        $data['sidebar_label'] = $this->lang->line('guide_sidebar');
        
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/guide-sidebar', $data);
        $this->load->view('pages/guide/reviews/agency_reviews');
        $this->load->view('templates/backend/footer', $data);
    }
    public function reviews_getAgencyReviews(){
        $page = $this->input->post("pagination[page]");
        $pages = $this->input->post("pagination[pages]");
        $perpage = $this->input->post("pagination[perpage]");
        $total = $this->input->post("pagination[total]");
        $search_key = $this->input->post("query[generalSearch]");
        $sort_field = $this->input->post("sort[field]");
        $sort_sort = $this->input->post("sort[sort]");

        $total = $this->guide_review->getAgencyReviewsTotal($search_key);
        $pages = ceil($total/$perpage);
        if($pages<$page) $page = $pages;
        $agency_reviews = $this->guide_review->getAgencyReviewsByParams($page, $perpage, $search_key, $sort_field, $sort_sort);
        $meta = array(
            "page" => $page,
            "pages" => $pages,
            "perpage" => $perpage,
            "total" => $total,
            "sort" => "asc",
            "field" => "id"
        );
        echo json_encode(array("meta"=>$meta, "data"=>$agency_reviews));
    }
    public function reviews_agency_review_details(){
        $data['sidebar_item_parent_active']="reviews";
        $data['sidebar_item_child_active']="agency_reviews";
        $data['label'] = $this->lang->line('guide_reviews_agency_review_details');
        $data['sidebar_label'] = $this->lang->line('guide_sidebar');
        
        $id = $this->input->get('id');
        $data['agencies'] = $this->agency->getAll();
        $data['guides'] = $this->guide->getAll();
        $data['agency_review'] = $this->agency_review->getAgencyReviewById($id)[0];
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/guide-sidebar', $data);
        $this->load->view('pages/guide/reviews/agency_review_details');
        $this->load->view('templates/backend/footer', $data);
    }
    public function reviews_my_reviews(){
        $data['sidebar_item_parent_active']="reviews";
        $data['sidebar_item_child_active']="my_reviews";

        $data['label'] = $this->lang->line('guide_reviews_my_reviews');
        $data['sidebar_label'] = $this->lang->line('guide_sidebar');
        
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/guide-sidebar', $data);
        $this->load->view('pages/guide/reviews/my_reviews');
        $this->load->view('templates/backend/footer', $data);
    }
    public function reviews_getMyReviews(){
        $page = $this->input->post("pagination[page]");
        $pages = $this->input->post("pagination[pages]");
        $perpage = $this->input->post("pagination[perpage]");
        $total = $this->input->post("pagination[total]");
        $search_key = $this->input->post("query[generalSearch]");
        $sort_field = $this->input->post("sort[field]");
        $sort_sort = $this->input->post("sort[sort]");

        $total = $this->guide_review->getMyReviewsTotal($search_key);
        $pages = ceil($total/$perpage);
        if($pages<$page) $page = $pages;
        $my_reviews = $this->guide_review->getMyReviewsByParams($page, $perpage, $search_key, $sort_field, $sort_sort);
        $meta = array(
            "page" => $page,
            "pages" => $pages,
            "perpage" => $perpage,
            "total" => $total,
            "sort" => "asc",
            "field" => "id"
        );
        echo json_encode(array("meta"=>$meta, "data"=>$my_reviews));
    }
    public function reviews_my_review_details(){
        $data['sidebar_item_parent_active']="reviews";
        $data['sidebar_item_child_active']="my_reviews";
        $data['label'] = $this->lang->line('guide_reviews_my_review_details');
        $data['sidebar_label'] = $this->lang->line('guide_sidebar');
        
        $id = $this->input->get('id');
        $data['agencies'] = $this->agency->getAll();
        $data['guides'] = $this->guide->getAll();
        $data['agency_review'] = $this->guide_review->getGuideReviewById($id)[0];
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/guide-sidebar', $data);
        $this->load->view('pages/guide/reviews/my_review_details');
        $this->load->view('templates/backend/footer', $data);
    }
    public function reviews_add_my_review(){
        $data['sidebar_item_parent_active']="reviews";
        $data['sidebar_item_child_active']="my_reviews";
        $data['label'] = $this->lang->line('guide_reviews_new_my_review');
        $data['sidebar_label'] = $this->lang->line('guide_sidebar');
        
        $data['agencies'] = $this->agency->getAll();
        $data['guide'] = $this->guide->getGuideByEmail($this->session->userdata('logged_in')['email'])[0];
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/guide-sidebar', $data);
        $this->load->view('pages/guide/reviews/add_my_review');
        $this->load->view('templates/backend/footer', $data);
    }
    public function reviews_save_my_review(){
        $postData = $this->input->post();
        // var_dump($postData);
        // exit;
        $postData['submission_date']=date("Y-m-d H:i:s");
        $guide = $postData['guide'];
        $agency = $postData['agency'];
        $agency_reviews = $this->agency_review->getAll();
        foreach ($agency_reviews as $agency_review) {
            if($agency_review->agency==$agency && $agency_review->guide==$guide){
                $agency_review->status='active';
                $this->agency_review->update($agency_review->id, array('status'=>$agency_review->status));
                $postData['status']="active";
            }
        }
        if(!isset($postData['status'])) $postData['status']="deactive";
        if($this->guide_review->save($postData))
            $res = array("status"=>"success", "msg"=>"This review is successfully saved!");
        else 
            $res = array("status"=>"fail", "msg"=>"Try again, please!");
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
    }
    //guide_requests
    public function guide_requests_guide_requests(){
        $data['sidebar_item_parent_active']="guide_requests";
        $data['sidebar_item_child_active']="guide_requests";

        $data['label'] = $this->lang->line('guide_guide_request_list');
        $data['sidebar_label'] = $this->lang->line('guide_sidebar');
        
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/guide-sidebar', $data);
        $this->load->view('pages/guide/guide-requests/guide_requests');
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
    public function guide_requests_my_guide_requests(){
        $data['sidebar_item_parent_active']="guide_requests";
        $data['sidebar_item_child_active']="my_guide_requests";

        $data['label'] = $this->lang->line('guide_my_guide_request_list');
        $data['sidebar_label'] = $this->lang->line('guide_sidebar');
        
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/guide-sidebar', $data);
        $this->load->view('pages/guide/guide-requests/my_guide_requests');
        $this->load->view('templates/backend/footer', $data);
    }
    public function guide_requests_getMyGuideRequests(){
        $page = $this->input->post("pagination[page]");
        $pages = $this->input->post("pagination[pages]");
        $perpage = $this->input->post("pagination[perpage]");
        $total = $this->input->post("pagination[total]");
        $search_key = $this->input->post("query[generalSearch]");
        $sort_field = $this->input->post("sort[field]");
        $sort_sort = $this->input->post("sort[sort]");

        $total = $this->guide_request->getMyGuideRequestsTotal($search_key);
        $pages = ceil($total/$perpage);
        if($pages<$page) $page = $pages;
        $guide_requests = $this->guide_request->getMyGuideRequestsByParams($page, $perpage, $search_key, $sort_field, $sort_sort);
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
    public function guide_requests_my_guide_request_detail(){
        $data['sidebar_item_parent_active']="guide_requests";
        $data['sidebar_item_child_active']="edit_guide_request";
        $data['label'] = $this->lang->line('guide_my_guide_request_detail');
        $data['sidebar_label'] = $this->lang->line('guide_sidebar');

        $data['regions'] = $this->region->getAll();
        $data['tour_types'] = $this->tour_type->getAll();
        $id = $this->input->get('id');
        $guide_request = $this->guide_request->getGuideRequestById($id)[0];
        $data['guide_request'] = $guide_request;
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/guide-sidebar', $data);
        $this->load->view('pages/guide/guide-requests/my_guide_request_detail', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function guide_requests_add_guide_request(){
        $data['sidebar_item_parent_active']="guide_requests";
        $data['sidebar_item_child_active']="add_guide_request";
        $data['label'] = $this->lang->line('guide_new_guide_request');
        $data['sidebar_label'] = $this->lang->line('guide_sidebar');
        
        $data['regions'] = $this->region->getAll();
        $data['tour_types'] = $this->tour_type->getAll();
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/guide-sidebar', $data);
        $this->load->view('pages/guide/guide-requests/add_guide_request', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function guide_requests_edit_guide_request(){
        $data['sidebar_item_parent_active']="guide_requests";
        $data['sidebar_item_child_active']="edit_guide_request";
        $data['label'] = $this->lang->line('guide_edit_guide_request');
        $data['sidebar_label'] = $this->lang->line('guide_sidebar');

        $data['regions'] = $this->region->getAll();
        $data['tour_types'] = $this->tour_type->getAll();
        $id = $this->input->get('id');
        $guide_request = $this->guide_request->getGuideRequestById($id)[0];
        $guide_request->start_date = date('m/d/Y', strtotime($guide_request->start_date));
        $guide_request->finish_date = date('m/d/Y', strtotime($guide_request->finish_date));
        $data['guide_request'] = $guide_request;
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/guide-sidebar', $data);
        $this->load->view('pages/guide/guide-requests/edit_guide_request', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function guide_requests_getAllGuideRequests(){
        $all = $this->guide_request->getAll();
        echo json_encode($all);
    }
    public function guide_requests_save_guide_request(){
        $data = $this->input->post();
        if(isset($data['regions']))
            $data['regions'] = json_encode($data['regions']);
        else $data['regions'] = "";
        $data['requester'] = $this->guide->getGuideByEmail($this->session->userdata('logged_in')['email'])[0]->id;
        $data['created_date'] = date('Y-m-d H:i:s');
        $this->guide_request->save($data);
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
        $data['requester'] = $this->guide->getGuideByEmail($this->session->userdata('logged_in')['email'])[0]->id;
        $data['created_date'] = date('Y-m-d H:i:s');
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
    //museum
    public function museums_museums(){
        $data['sidebar_item_parent_active']="museums";
        $data['sidebar_item_child_active']="museums";
        $data['districts'] = $this->district->getAll();
        $data['cities'] = $this->city->getAll();
        $data['categories'] = $this->museum_category->getAll();
        $data['label'] = $this->lang->line('guide_museum_list');
        $data['sidebar_label'] = $this->lang->line('guide_sidebar');
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/guide-sidebar', $data);
        $this->load->view('pages/guide/museums/museums', $data);
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

        $total = $this->museum->getMuseumsTotal($search_key, $category, $district, $city, 'active');
        $pages = ceil($total/$perpage);
        if($pages<$page) $page = $pages;
        $museums = $this->museum->getMuseumsByParams($page, $perpage, $search_key, $category, $district, $city, 'active', $sort_field, $sort_sort);
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
        $data['label'] = $this->lang->line('guide_museum_detail');
        $data['sidebar_label'] = $this->lang->line('guide_sidebar');

        $data['districts'] = $this->district->getAll();
        $data['cities'] = $this->city->getAll();
        $data['countries'] = $this->country->getAll();
        $id = $this->input->get('id');
        $museum = $this->museum->getMuseumById($id)[0];
        $data['museum'] = $museum;
        $data['images'] = $this->upload_image->getImages('museum', $id);

        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/guide-sidebar', $data);
        $this->load->view('pages/guide/museums/museum_detail', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function museums_getAllMuseums(){
        $all = $this->museum->getAll();
        echo json_encode($all);
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
        $data['status'] = "deactive";

        if($this->museum->save($data)){
            $res = array("status"=>"success", "msg"=>"This museum is successfully saved!");
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
        $this->museum->update($data['id'], $data);
        $res = array("status"=>"success", "msg"=>"This museum is successfully updated!");
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
    }
    public function help_desk_my_tickets(){
        $data['sidebar_item_parent_active']="help_desk";
        $data['sidebar_item_child_active']="my_tickets";
        $data['label'] = $this->lang->line('guide_help_desk_my_tickets');
        $data['sidebar_label'] = $this->lang->line('guide_sidebar');

        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/guide-sidebar', $data);
        $this->load->view('pages/guide/help-desk/my_tickets', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function help_desk_getMyTickets(){
        $page = $this->input->post("pagination[page]");
        $pages = $this->input->post("pagination[pages]");
        $perpage = $this->input->post("pagination[perpage]");
        $total = $this->input->post("pagination[total]");
        $search_key = $this->input->post("query[generalSearch]");
        $sort_field = $this->input->post("sort[field]");
        $sort_sort = $this->input->post("sort[sort]");

        $total = $this->ticket->getMyTicketsTotal($search_key);
        $pages = ceil($total/$perpage);
        if($pages<$page) $page = $pages;
        $my_tickets = $this->ticket->getMyTicketsByParams($page, $perpage, $search_key, $sort_field, $sort_sort);
        $meta = array(
            "page" => $page,
            "pages" => $pages,
            "perpage" => $perpage,
            "total" => $total,
            "sort" => "asc",
            "field" => "id"
        );
        echo json_encode(array("meta"=>$meta, "data"=>$my_tickets));
    }
    public function help_desk_my_ticket_details(){
        $data['sidebar_item_parent_active']="help_desk";
        $data['sidebar_item_child_active']="ticket_details";
        $data['label'] = $this->lang->line('guide_help_desk_ticket_details');
        $data['sidebar_label'] = $this->lang->line('guide_sidebar');

        $id = $this->input->get('id');
        $data['ticket'] = $this->ticket->getTicketById($id)[0];
        $data['ticket_categories'] = $this->ticket_category->getAll();

        $data['messages'] = $this->ticket_history->getTicketHistoriesByTicketId($data['ticket']->ticket_id);

        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/guide-sidebar', $data);
        $this->load->view('pages/guide/help-desk/ticket_details', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function add_reply_message(){
        $postData = $this->input->post();
        $useremail = $this->session->userdata('logged_in')['email'];
        $userid = $this->user->getUserByEmail($useremail)[0]->id;
        $message = $postData['message'];
        $message = base64_encode($message);
        // var_dump(base64_decode($message));
        // exit;
        
        $messageData = array(
            'ticket_id'=>$postData['ticket_id'],
            'from'=> $userid,
            'role'=>4,
            'message'=>$message,
            'reply_date'=>date('Y-m-d H:i:s')
        );
        if($this->ticket_history->save($messageData)){
            if($this->ticket->update($postData['ticket_id'], array('status'=>'Replied By Guide', 'last_updated'=>date('Y-m-d H:i:s'))))
                $res = array("status"=>"success", "msg"=>"This reply message is successfully sent to support team!");
            else $res = array("status"=>"fail", "msg"=>"Try again, please!");
        }
        else $res = array("status"=>"fail", "msg"=>"Try again, please!");
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
    } 
    public function help_desk_add_ticket(){
        $data['sidebar_item_parent_active']="help_desk";
        $data['sidebar_item_child_active']="add_ticket";
        $data['label'] = $this->lang->line('guide_help_desk_new_ticket');
        $data['sidebar_label'] = $this->lang->line('guide_sidebar');

        $data['ticket_categories'] = $this->ticket_category->getAll();
        
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/guide-sidebar', $data);
        $this->load->view('pages/guide/help-desk/add_ticket', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function help_desk_save_ticket(){
        $postData = $this->input->post();
        // var_dump($postData);
        // exit;
        $email = $this->session->userdata('logged_in')['email'];
        $guide_id = $this->guide->getGuideByEmail($email)[0]->id;
        $user_id = $this->user->getUserByEmail($email)[0]->id;
        $ticket_id = md5($email.$postData['subject'].date('Y-m-d H:i:s'));
        $ticket_data = array(
            'ticket_id'=>$ticket_id,
            'subject'=>$postData['subject'],
            'category'=>json_encode($postData['category']),
            'from'=>$user_id,
            'role'=>4,
            'message'=>base64_encode($postData['message']),
            'priority'=>$postData['priority'],
            'status'=>'New',
            'submission_date'=>date('Y-m-d H:i:s'),
            'last_updated'=>date('Y-m-d H:i:s'),
        );
        if($this->ticket->save($ticket_data)){
            if($postData['message']!=""){
                $history = array(
                    'ticket_id'=>$ticket_id,
                    'from'=>$user_id,
                    'role'=>4,
                    'message'=>base64_encode($postData['message']),
                    'reply_date'=>date('Y-m-d H:i:s')
                );
            }
            $this->ticket_history->save($history);
            ///===========save attachment============///
            if(isset($postData['attachment'])){
                $attachments = json_decode($postData['attachment']);
                foreach ($attachments as $attachment) {
                    $attachment_data = array(
                        'ticket_id'=>$ticket_id,
                        'from'=>$user_id,
                        'role'=>4,
                        'file'=>'uploads/attachments/'.$attachment,
                        'submission_date'=>date('Y-m-d H:i:s')
                    );
                    $this->attachment->save($attachment_data);
                }
            }
            $res = array("status"=>"success", "msg"=>"This ticket is successfully saved!");
            return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
        }
    }
    public function upload_attachments(){
        $target_dir = 'uploads/attachments/';
        if(!is_dir($target_dir))
            mkdir($target_dir, 0755, true);
        $target_file = $target_dir .$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $target_file);
    }
}
