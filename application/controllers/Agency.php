<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Agency extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->library('session');
        $this->lang->load('information', 'english');
        $this->load->helper('url');
        $this->load->model('User_model');
        $this->load->model('Agency_model', 'agency');
        $this->load->model('Shop_model', 'shop');
        $this->load->model('Museum_model', 'museum');
        $this->load->model('ShopCategory_model', 'shop_category');
        $this->load->model('Restaurant_model', 'restaurant');
        $this->load->model('RestaurantCategory_model', 'restaurant_category');
        $this->load->model('MuseumCategory_model', 'museum_category');
        $this->load->model('City_model', 'city');
        $this->load->model('District_model', 'district');
        $this->load->model('Country_model', 'country');
        $this->load->model('GuideRequest_model', 'guide_request');
        $this->load->model('AgencyReview_model', 'agency_review');
        $this->load->model('GuideReview_model', 'guide_review');
        $this->load->model('Chamber_model', 'chamber');
        $this->load->model('Specialisty_model', 'specialisties');
        $this->load->model('Region_model', 'region');
        $this->load->model('Language_model', 'language');
        $this->load->model('TourType_model', 'tour_type');
        $this->load->model('FavouriteGuide_model', 'favourite_guide');
        $this->load->model('NonFavouriteGuide_model', 'non_favourite_guide');
        $this->load->model('User_model', 'user');

        $this->load->model('SystemSettings_model', 'system_settings');
        $this->load->model('Ticket_model', 'ticket');
        $this->load->model('TicketHistory_model', 'ticket_history');
        $this->load->model('TicketCategory_model', 'ticket_category');
        $this->load->model("Attachment_model", 'attachment');
        $this->load->model("UploadImage_model", 'upload_image');

        $allow_multi_language = $this->system_settings->get()[0]->allow_multi_language;
        //exit;
        $this->session->set_userdata('allow_multi_language', $allow_multi_language);

        if($allow_multi_language=="no"){
            $this->session->unset_userdata('site_lang');
        }
        if(!$this->session->userdata('site_lang')){
            $lang = $this->system_settings->get()[0]->default_agency_language;
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
        $data['sidebar_label'] = $this->lang->line('agency_sidebar');
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/agency-sidebar', $data);
        $this->load->view('pages/agency/dashboard');
        $this->load->view('templates/backend/footer', $data);
    }
    public function my_profile(){
        $data['sidebar_item_parent_active']="my_profile";
        $data['sidebar_label'] = $this->lang->line('agency_sidebar');
        $data['label'] = $this->lang->line('agency_my_profile');
        $data['cities'] = $this->city->getAll();
        $data['districts'] = $this->district->getAll();
        $data['agency'] = $this->agency->getAgencyByEmail($this->session->userdata('logged_in')['email'])[0];
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/agency-sidebar', $data);
        $this->load->view('pages/agency/my-profile/profile', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function my_profile_edit_personal_profile(){
        $data['sidebar_item_parent_active']="my_profile";
        $data['sidebar_item_child_active']="edit_personal_profile";
        $data['sidebar_label'] = $this->lang->line('agency_sidebar');
        $data['label'] = $this->lang->line('agency_my_profile_edit_personal_profile');
        $data['cities'] = $this->city->getAll();
        $data['districts'] = $this->district->getAll();
        $data['agency'] = $this->agency->getAgencyByEmail($this->session->userdata('logged_in')['email'])[0];
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/agency-sidebar', $data);
        $this->load->view('pages/agency/my-profile/edit_personal_profile', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function my_profile_edit_agency_profile(){
        $data['sidebar_item_parent_active']="my_profile";
        $data['sidebar_item_child_active']="edit_agency_profile";
        $data['sidebar_label'] = $this->lang->line('agency_sidebar');
        $data['label'] = $this->lang->line('agency_my_profile_edit_agency_profile');
        $data['cities'] = $this->city->getAll();
        $data['districts'] = $this->district->getAll();
        $data['agency'] = $this->agency->getAgencyByEmail($this->session->userdata('logged_in')['email'])[0];
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/agency-sidebar', $data);
        $this->load->view('pages/agency/my-profile/edit_agency_profile', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function my_profile_edit_social_media_profile(){
        $data['sidebar_item_parent_active']="my_profile";
        $data['sidebar_item_child_active']="edit_social_media_profile";
        $data['sidebar_label'] = $this->lang->line('agency_sidebar');
        $data['label'] = $this->lang->line('agency_my_profile_edit_social_media_profile');
        $data['cities'] = $this->city->getAll();
        $data['districts'] = $this->district->getAll();
        $data['agency'] = $this->agency->getAgencyByEmail($this->session->userdata('logged_in')['email'])[0];
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/agency-sidebar', $data);
        $this->load->view('pages/agency/my-profile/edit_social_media_profile', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    //restaurants
    public function restaurants_restaurants(){
        $data['sidebar_item_parent_active']="restaurants";
        $data['sidebar_item_child_active']="restaurants";
        $data['categories'] = $this->restaurant_category->getAll();
        $data['districts'] = $this->district->getAll();
        $data['cities'] = $this->city->getAll();
        $data['sidebar_label'] = $this->lang->line('agency_sidebar');
        $data['label'] = $this->lang->line('agency_restaurant_list');

        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/agency-sidebar', $data);
        $this->load->view('pages/agency/restaurants/restaurants', $data);
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
        $data['sidebar_label'] = $this->lang->line('agency_sidebar');
        $data['label'] = $this->lang->line('agency_restaurant_detail');

        $data['categories'] = $this->restaurant_category->getAll();
        $data['districts'] = $this->district->getAll();
        $data['cities'] = $this->city->getAll();
        $data['countries'] = $this->country->getAll();
        $id = $this->input->get('id');
        $restaurant = $this->restaurant->getRestaurantById($id)[0];
        $data['restaurant'] = $restaurant;
        $data['images'] = $this->upload_image->getImages('restaurant', $id);
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/agency-sidebar', $data);
        $this->load->view('pages/agency/restaurants/restaurant_detail', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function restaurants_getAllRestaurants(){
        $all = $this->restaurant->getAll();
        echo json_encode($all);
    }
    //shops
    public function shops_shops(){
        $data['sidebar_item_parent_active']="shops";
        $data['sidebar_item_child_active']="shops";

        $data['categories'] = $this->shop_category->getAll();
        $data['districts'] = $this->district->getAll();
        $data['cities'] = $this->city->getAll();

        $data['sidebar_label'] = $this->lang->line('agency_sidebar');
        $data['label'] = $this->lang->line('agency_shop_list');
        
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/agency-sidebar', $data);
        $this->load->view('pages/agency/shops/shops', $data);
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
        $data['sidebar_label'] = $this->lang->line('agency_sidebar');
        $data['label'] = $this->lang->line('agency_shop_detail');

        $data['categories'] = $this->shop_category->getAll();
        $data['districts'] = $this->district->getAll();
        $data['cities'] = $this->city->getAll();
        $data['countries'] = $this->country->getAll();
        $id = $this->input->get('id');
        $shop = $this->shop->getShopById($id)[0];
        $data['shop'] = $shop;
        $data['images'] = $this->upload_image->getImages('shop', $id);
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/agency-sidebar', $data);
        $this->load->view('pages/agency/shops/shop_detail', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    //agency reviews
    public function reviews_guide_reviews(){
        $data['sidebar_item_parent_active']="reviews";
        $data['sidebar_item_child_active']="guide_reviews";

        $data['label'] = $this->lang->line('agency_reviews_guide_reviews');
        $data['sidebar_label'] = $this->lang->line('agency_sidebar');
        
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/agency-sidebar', $data);
        $this->load->view('pages/agency/reviews/guide_reviews');
        $this->load->view('templates/backend/footer', $data);
    }
    public function reviews_getGuideReviews(){
        $page = $this->input->post("pagination[page]");
        $pages = $this->input->post("pagination[pages]");
        $perpage = $this->input->post("pagination[perpage]");
        $total = $this->input->post("pagination[total]");
        $search_key = $this->input->post("query[generalSearch]");
        $sort_field = $this->input->post("sort[field]");
        $sort_sort = $this->input->post("sort[sort]");

        $total = $this->agency_review->getGuideReviewsTotal($search_key);
        // var_dump($total);
        // exit;
        $pages = ceil($total/$perpage);
        if($pages<$page) $page = $pages;
        $guide_reviews = $this->agency_review->getGuideReviewsByParams($page, $perpage, $search_key, $sort_field, $sort_sort);
        $meta = array(
            "page" => $page,
            "pages" => $pages,
            "perpage" => $perpage,
            "total" => $total,
            "sort" => "asc",
            "field" => "id"
        );
        echo json_encode(array("meta"=>$meta, "data"=>$guide_reviews));
    }
    public function reviews_guide_review_details(){
        $data['sidebar_item_parent_active']="reviews";
        $data['sidebar_item_child_active']="guide_reviews";
        $data['label'] = $this->lang->line('agency_reviews_guide_review_details');
        $data['sidebar_label'] = $this->lang->line('agency_sidebar');
        
        $id = $this->input->get('id');
        $data['agencies'] = $this->agency->getAll();
        $data['guides'] = $this->guide->getAll();
        $data['guide_review'] = $this->guide_review->getGuideReviewById($id)[0];
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/agency-sidebar', $data);
        $this->load->view('pages/agency/reviews/guide_review_details');
        $this->load->view('templates/backend/footer', $data);
    }
    public function reviews_my_reviews(){
        $data['sidebar_item_parent_active']="reviews";
        $data['sidebar_item_child_active']="my_reviews";

        $data['label'] = $this->lang->line('agency_reviews_my_reviews');
        $data['sidebar_label'] = $this->lang->line('agency_sidebar');
        
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/agency-sidebar', $data);
        $this->load->view('pages/agency/reviews/my_reviews');
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

        $total = $this->agency_review->getMyReviewsTotal($search_key);
        $pages = ceil($total/$perpage);
        if($pages<$page) $page = $pages;
        $my_reviews = $this->agency_review->getMyReviewsByParams($page, $perpage, $search_key, $sort_field, $sort_sort);
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
        $data['label'] = $this->lang->line('agency_reviews_my_review_details');
        $data['sidebar_label'] = $this->lang->line('agency_sidebar');
        
        $id = $this->input->get('id');
        $data['agencies'] = $this->agency->getAll();
        $data['guides'] = $this->guide->getAll();
        $data['agency_review'] = $this->agency_review->getAgencyReviewById($id)[0];
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/agency-sidebar', $data);
        $this->load->view('pages/agency/reviews/my_review_details');
        $this->load->view('templates/backend/footer', $data);
    }
    public function reviews_add_my_review(){
        $data['sidebar_item_parent_active']="reviews";
        $data['sidebar_item_child_active']="my_reviews";
        $data['label'] = $this->lang->line('agency_reviews_new_my_review');
        $data['sidebar_label'] = $this->lang->line('agency_sidebar');
        
        $data['guides'] = $this->guide->getAll();
        $data['agency'] = $this->agency->getAgencyByEmail($this->session->userdata('logged_in')['email'])[0];
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/agency-sidebar', $data);
        $this->load->view('pages/agency/reviews/add_my_review');
        $this->load->view('templates/backend/footer', $data);
    }
    public function reviews_save_my_review(){
        $postData = $this->input->post();
        // var_dump($postData);
        // exit;
        $postData['submission_date']=date("Y-m-d H:i:s");
        $agency = $postData['agency'];
        $guide = $postData['guide'];
        $guide_reviews = $this->guide_review->getAll();
        foreach ($guide_reviews as $guide_review) {
            if($guide_review->guide==$guide && $guide_review->agency==$agency){
                $guide_review->status='active';
                $this->guide_review->update($guide_review->id, array('status'=>$guide_review->status));
                $postData['status']="active";
            }
        }
        if(!isset($postData['status'])) $postData['status']="deactive";
        if($this->agency_review->save($postData))
            $res = array("status"=>"success", "msg"=>"This review is successfully saved!");
        else 
            $res = array("status"=>"fail", "msg"=>"Try again, please!");
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
    }
    //my favourites-favourite guides
        public function my_favourites_favourite_guides(){
        $data['sidebar_item_parent_active']="my_favourites";
        $data['sidebar_item_child_active']="favourite_guides";
        $data['sidebar_label'] = $this->lang->line('agency_sidebar');
        $data['label'] = $this->lang->line('agency_my_favourites_favourite_guides');
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/agency-sidebar', $data);
        $this->load->view('pages/agency/my-favourites/favourite_guides', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function my_favourites_getFavouriteGuides(){
        $page = $this->input->post("pagination[page]");
        $pages = $this->input->post("pagination[pages]");
        $perpage = $this->input->post("pagination[perpage]");
        $total = $this->input->post("pagination[total]");
        $search_key = $this->input->post("query[generalSearch]");
        $sort_field = $this->input->post("sort[field]");
        $sort_sort = $this->input->post("sort[sort]");

        $total = $this->favourite_guide->getMyFavouriteGuidesTotal($search_key);
        $pages = ceil($total/$perpage);
        if($pages<$page) $page = $pages;
        $favourite_guides = $this->favourite_guide->getMyFavouriteGuidesByParams($page, $perpage, $search_key, $sort_field, $sort_sort);
        $meta = array(
            "page" => $page,
            "pages" => $pages,
            "perpage" => $perpage,
            "total" => $total,
            "sort" => "asc",
            "field" => "id"
        );
        echo json_encode(array("meta"=>$meta, "data"=>$favourite_guides));
    }
    public function my_favourites_add_favourite_guide(){
        $data['sidebar_item_parent_active']="my_favourites";
        $data['sidebar_item_child_active']="add_favourite_guide";
        $data['sidebar_label'] = $this->lang->line('agency_sidebar');
        $data['label'] = $this->lang->line('agency_my_favourites_new_favourite_guide');
        $data['guides'] = $this->guide->getAll();
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/agency-sidebar', $data);
        $this->load->view('pages/agency/my-favourites/add_favourite_guide', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function my_favourites_edit_favourite_guide(){
        $data['sidebar_item_parent_active']="my_favourites";
        $data['sidebar_item_child_active']="edit_favourite_guide";
        $data['sidebar_label'] = $this->lang->line('agency_sidebar');
        $data['label'] = $this->lang->line('agency_my_favourites_edit_favourite_guide');
        $data['guides'] = $this->guide->getAll();
        $id = $this->input->get('id');
        $data['favourite_guide'] = $this->favourite_guide->getFavouriteGuideById($id)[0];
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/agency-sidebar', $data);
        $this->load->view('pages/agency/my-favourites/edit_favourite_guide', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function my_favourites_save_favourite_guide(){
        $postData = $this->input->post();
        $postData['agency'] = $this->agency->getAgencyByEmail($this->session->userdata('logged_in')['email'])[0]->id;
        if($this->favourite_guide->save($postData))
            $res = array("status"=>"success", "msg"=>"This guide is successfully added as favourite guide.");
        else 
            $res = array("status"=>"fail", "msg"=>"This guide is already set as favourite guide.");
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
    }
    public function my_favourites_update_favourite_guide(){
        $postData = $this->input->post(); 
        $postData['agency'] = $this->agency->getAgencyByEmail($this->session->userdata('logged_in')['email'])[0]->id;
        if($this->favourite_guide->update($postData['id'], $postData)>=0)
            $res = array("status"=>"success", "msg"=>"This guide is successfully updated as favourite guide.");
        else 
            $res = array("status"=>"fail", "msg"=>"This guide is already set as favourite guide.");
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
    }
    public function my_favourites_delete_favourite_guide(){
        $id = $this->input->get('id');
        $this->favourite_guide->delete($id);
        $this->my_favourites_favourite_guides();
    }
    //my favourties-disliked guides
    public function my_favourites_non_favourite_guides(){
        $data['sidebar_item_parent_active']="my_favourites";
        $data['sidebar_item_child_active']="non_favourite_guides";
        $data['sidebar_label'] = $this->lang->line('agency_sidebar');
        $data['label'] = $this->lang->line('agency_my_favourites_non_favourite_guides');
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/agency-sidebar', $data);
        $this->load->view('pages/agency/my-favourites/non_favourite_guides', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function my_favourites_getNonFavouriteGuides(){
        $page = $this->input->post("pagination[page]");
        $pages = $this->input->post("pagination[pages]");
        $perpage = $this->input->post("pagination[perpage]");
        $total = $this->input->post("pagination[total]");
        $search_key = $this->input->post("query[generalSearch]");
        $sort_field = $this->input->post("sort[field]");
        $sort_sort = $this->input->post("sort[sort]");

        $total = $this->non_favourite_guide->getMyNonFavouriteGuidesTotal($search_key);
        $pages = ceil($total/$perpage);
        if($pages<$page) $page = $pages;
        $non_favourite_guides = $this->non_favourite_guide->getMyNonFavouriteGuidesByParams($page, $perpage, $search_key, $sort_field, $sort_sort);
        $meta = array(
            "page" => $page,
            "pages" => $pages,
            "perpage" => $perpage,
            "total" => $total,
            "sort" => "asc",
            "field" => "id"
        );
        echo json_encode(array("meta"=>$meta, "data"=>$non_favourite_guides));
    }
    public function my_favourites_add_non_favourite_guide(){
        $data['sidebar_item_parent_active']="my_favourites";
        $data['sidebar_item_child_active']="add_non_favourite_guide";
        $data['sidebar_label'] = $this->lang->line('agency_sidebar');
        $data['label'] = $this->lang->line('agency_my_favourites_new_non_favourite_guide');
        $data['guides'] = $this->guide->getAll();
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/agency-sidebar', $data);
        $this->load->view('pages/agency/my-favourites/add_non_favourite_guide', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function my_favourites_edit_non_favourite_guide(){
        $data['sidebar_item_parent_active']="my_favourites";
        $data['sidebar_item_child_active']="edit_non_favourite_guide";
        $data['sidebar_label'] = $this->lang->line('agency_sidebar');
        $data['label'] = $this->lang->line('agency_my_favourites_edit_non_favourite_guide');
        $data['guides'] = $this->guide->getAll();
        $id = $this->input->get('id');
        $data['non_favourite_guide'] = $this->non_favourite_guide->getNonFavouriteGuideById($id)[0];
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/agency-sidebar', $data);
        $this->load->view('pages/agency/my-favourites/edit_non_favourite_guide', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function my_favourites_save_non_favourite_guide(){
        $postData = $this->input->post();
        $postData['agency'] = $this->agency->getAGencyByEmail($this->session->userdata('logged_in')['email'])[0]->id;
        if($this->non_favourite_guide->save($postData))
            $res = array("status"=>"success", "msg"=>"This guide is successfully added as non favourite guide.");
        else 
            $res = array("status"=>"fail", "msg"=>"This guide is already set as non favourite guide.");
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
    }
    public function my_favourites_update_non_favourite_guide(){
        $postData = $this->input->post(); 
        $postData['agency'] = $this->agency->getAgencyByEmail($this->session->userdata('logged_in')['email'])[0]->id;
        // var_dump($postData);
        // exit;
        if($this->non_favourite_guide->update($postData['id'], $postData)>=0)
            $res = array("status"=>"success", "msg"=>"This guide is successfully updated as non favourite guide.");
        else 
            $res = array("status"=>"fail", "msg"=>"This guide is already set as non favourite guide.");
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
    }
    public function my_favourites_delete_non_favourite_guide(){
        $id = $this->input->get('id');
        $this->non_favourite_guide->delete($id);
        $this->my_favourites_non_favourite_guides();
    }
    //guide_requests
    public function guides_guide_search(){
        $data['sidebar_item_parent_active']="guide_requests";
        $data['sidebar_item_child_active']="guide_search";
        $data['languages'] = $this->language->getAll();
        $data['cities'] = $this->city->getAll();
        $data['label'] = $this->lang->line('agency_guide_search');
        $data['sidebar_label'] = $this->lang->line('agency_sidebar');
        
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/agency-sidebar', $data);
        $this->load->view('pages/agency/guide-requests/guide_search', $data);
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
    public function guide_search_guide_details(){
        $data['sidebar_item_parent_active']="guides";
        $data['sidebar_item_child_active']="guide_details";
        $data['label'] = $this->lang->line('agency_guide_details');
        $data['sidebar_label'] = $this->lang->line('agency_sidebar');

        $data['cities'] = $this->city->getAll();
        $data['districts'] = $this->district->getAll();
        $id = $this->input->get('id');
        $guide = $this->guide->getGuideById($id)[0];
        $data['guide'] = $guide;
        $data['languages'] = $this->language->getAll();
        $data['chambers'] = $this->chamber->getAll();
        $data['specialisties'] = $this->specialisties->getAll();
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/agency-sidebar', $data);
        $this->load->view('pages/agency/guide-requests/guide_details', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function guide_requests_my_guide_requests(){
        $data['sidebar_item_parent_active']="guide_requests";
        $data['sidebar_item_child_active']="my_guide_requests";

        $data['label'] = $this->lang->line('agency_my_guide_request_list');
        $data['sidebar_label'] = $this->lang->line('agency_sidebar');
        
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/agency-sidebar', $data);
        $this->load->view('pages/agency/guide-requests/my_guide_requests');
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
    public function guide_requests_guide_request_detail(){
        $data['sidebar_item_parent_active']="guide_requests";
        $data['sidebar_item_child_active']="edit_guide_request";
        $data['label'] = $this->lang->line('agency_guide_request_detail');
        $data['sidebar_label'] = $this->lang->line('agency_sidebar');

        $data['regions'] = $this->region->getAll();
        $data['tour_types'] = $this->tour_type->getAll();
        $id = $this->input->get('id');
        $guide_request = $this->guide_request->getGuideRequestById($id)[0];
        $data['guide_request'] = $guide_request;
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/agency-sidebar', $data);
        $this->load->view('pages/agency/guide-requests/my_guide_request_detail', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function guide_requests_add_guide_request(){
        $data['sidebar_item_parent_active']="guide_requests";
        $data['sidebar_item_child_active']="add_guide_request";
        $data['label'] = $this->lang->line('agency_new_guide_request');
        $data['sidebar_label'] = $this->lang->line('agency_sidebar');
        
        $data['regions'] = $this->region->getAll();
        $data['tour_types'] = $this->tour_type->getAll();
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/agency-sidebar', $data);
        $this->load->view('pages/agency/guide-requests/add_guide_request', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function guide_requests_edit_guide_request(){
        $data['sidebar_item_parent_active']="guide_requests";
        $data['sidebar_item_child_active']="edit_guide_request";
        $data['label'] = $this->lang->line('agency_edit_guide_request');
        $data['sidebar_label'] = $this->lang->line('agency_sidebar');

        $data['regions'] = $this->region->getAll();
        $data['tour_types'] = $this->tour_type->getAll();
        $id = $this->input->get('id');
        $guide_request = $this->guide_request->getGuideRequestById($id)[0];
        $data['guide_request'] = $guide_request;
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/agency-sidebar', $data);
        $this->load->view('pages/agency/guide-requests/edit_guide_request', $data);
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
        $data['requester'] = $this->user->getUserByEmail($this->session->userdata('logged_in')['email'])[0]->id;
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
        $data['requester'] = $this->session->userdata('logged_in')['username'];
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
        $data['label'] = $this->lang->line('agency_museum_list');
        $data['sidebar_label'] = $this->lang->line('agency_sidebar');
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/agency-sidebar', $data);
        $this->load->view('pages/agency/museums/museums', $data);
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
        $data['label'] = $this->lang->line('agency_museum_detail');
        $data['sidebar_label'] = $this->lang->line('agency_sidebar');

        $data['districts'] = $this->district->getAll();
        $data['cities'] = $this->city->getAll();
        $data['countries'] = $this->country->getAll();
        $id = $this->input->get('id');
        $museum = $this->museum->getMuseumById($id)[0];
        $data['museum'] = $museum;
        $data['images'] = $this->upload_image->getImages('museum', $id);

        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/agency-sidebar', $data);
        $this->load->view('pages/agency/museums/museum_detail', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function museums_getAllMuseums(){
        $all = $this->museum->getAll();
        echo json_encode($all);
    }
    public function museums_save_museum(){
        $data = $this->input->post();
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
        $data['label'] = $this->lang->line('agency_help_desk_my_tickets');
        $data['sidebar_label'] = $this->lang->line('agency_sidebar');

        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/agency-sidebar', $data);
        $this->load->view('pages/agency/help-desk/my_tickets', $data);
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
        $data['label'] = $this->lang->line('agency_help_desk_ticket_details');
        $data['sidebar_label'] = $this->lang->line('agency_sidebar');

        $id = $this->input->get('id');
        $data['ticket'] = $this->ticket->getTicketById($id)[0];
        $data['ticket_categories'] = $this->ticket_category->getAll();
        $data['messages'] = $this->ticket_history->getTicketHistoriesByTicketId($data['ticket']->ticket_id);
        // var_dump($data['messages']);
        // exit;
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/agency-sidebar', $data);
        $this->load->view('pages/agency/help-desk/ticket_details', $data);
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
            'role'=>3,
            'message'=>$message,
            'reply_date'=>date('Y-m-d H:i:s')
        );
        if($this->ticket_history->save($messageData)){
            if($this->ticket->update($postData['ticket_id'], array('status'=>'Replied By Agency','last_updated'=>date('Y-m-d H:i:s'))))
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
        $data['label'] = $this->lang->line('agency_help_desk_new_ticket');
        $data['sidebar_label'] = $this->lang->line('agency_sidebar');

        $data['ticket_categories'] = $this->ticket_category->getAll();
        
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/agency-sidebar', $data);
        $this->load->view('pages/agency/help-desk/add_ticket', $data);
        $this->load->view('templates/backend/footer', $data);
    }
    public function help_desk_save_ticket(){
        $postData = $this->input->post();
        // var_dump($postData);
        // exit;
        $email = $this->session->userdata('logged_in')['email'];
        $agency_id = $this->agency->getagencyByEmail($email)[0]->id;
        $user_id = $this->user->getUserByEmail($email)[0]->id;
        $ticket_id = md5($email.$postData['subject'].date('Y-m-d H:i:s'));
        $ticket_data = array(
            'ticket_id'=>$ticket_id,
            'subject'=>$postData['subject'],
            'category'=>json_encode($postData['category']),
            'from'=>$user_id,
            'role'=>3,
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
                    'role'=>3,
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
                        'role'=>3,
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
