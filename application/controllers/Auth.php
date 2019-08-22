<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct() {
        parent::__construct();

        $this->load->helper('url');
        $this->load->library('session');
        //$this->load->helper('cookie');
        $this->load->model('User_model', 'user');
        $this->load->model('Guide_model', 'guide');
        $this->load->model('Agency_model', 'agency');
        $this->load->model('Supervisor_model', 'supervisor');
        $this->load->model('Editor_model', 'editor');
        $this->load->model('Language_model', 'language');
        $this->load->model("SystemSettings_model", "system_settings");

        $this->load->library('email');
        $config['protocol']    = 'smtp';
        $config['smtp_host']    = 'mail.heyrehber.com';
        $config['smtp_port']    = '465';
        $config['smtp_crypto'] = 'ssl';
        $config['smtp_timeout'] = '30';
        $config['smtp_user']    = 'support@heyrehber.com';
        $config['smtp_pass']    = 'Heyguide@789';
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['crlf']    = "\r\n";
        $config['mailtype'] = 'html'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not

        $this->email->initialize($config);

    }
    public function sendEmail($from, $to, $data) {
        $this->email->from($from);
        $this->email->to($to); 
        $this->email->subject('Welcome to Heyrehber!');
        if($data!=null){
            $id = $data['id'];
            $name = $data['name'];
            $email = $data['email'];
            $confirm_key = $data['confirm_key'];
            $role = $data['role'];
            $message = "<h1><b>Hi,".$name."</b></h1><br><h2>Thanks for signing up!</h2><br>
            Your account has been created, you can login with the following credentials after you have activated your account.<br><br>
            Your confirmation code is: <h3>".$confirm_key."</h3><br>
            Please click this link to activate your account:<br>
            <a style='border-collapse:collapse;border-radius:2px;text-align:center;display:block;border:solid 1px #344c80;background:#4c649b;padding:7px 16px 11px 16px;text-decoration:none;color:white;width:200px' href='".base_url()."auth/verify?name=".$name."&email=".$email."&key=".$confirm_key."&id=".$id."&role=".$role."'><b>Confirm Your Email</b></a>";
            $this->email->message($message);
        }
        else 
            $this->email->message("Hello!");
        $this->email->send();
    }
    public function confirm(){
        $from = $this->input->get('from');
        $to = $this->input->get('to');
        $mailData = (array)json_decode($this->input->get('mailData'));

        $this->sendEmail($from, $to, $mailData);
        $this->load->view('templates/frontend/header');
        $this->load->view('templates/frontend/navbar');
        $this->load->view('pages/auth/signup/confirm');
        $this->load->view('templates/frontend/footer');
    }
    public function verify(){
        $id = $this->input->get('id');
        $name= $this->input->get('name');
        $email= $this->input->get('email');
        $key = $this->input->get('key');
        $role = $this->input->get('role');
        $data['id'] = $id;
        $data['username'] = $name;
        $data['key'] = $key;
        $data['role'] = $role;
        $this->user->update($email, array("status"=>'active'));
        if($data['role']==3)
            $this->agency->update($id, array("status"=>'active'));
        else if($data['role']==4)
            $this->guide->update($id, array("status"=>'active'));

        $this->load->view('pages/auth/verify', $data );
        //redirect(base_url());
    }
	public function login(){
        if($this->input->get('username')){
            $username = $this->input->get('username');
            $data['username']=$username;
        }
        if($this->input->get('password')){
            $password = $this->input->get('password');
            $data['password']=$password;
        }
        $this->load->view('templates/frontend/header');
        $this->load->view('templates/frontend/navbar');
        if(isset($data)) $this->load->view('pages/auth/login/login', $data);
        else $this->load->view('pages/auth/login/login');
        $this->load->view('templates/frontend/footer');
    }
    public function forgot(){
        $this->load->view('templates/frontend/header');
        $this->load->view('templates/frontend/navbar');
        $this->load->view('pages/auth/login/forgot');
        $this->load->view('templates/frontend/footer');
    }
    public function signup_guide(){
        $data['languages'] = $this->language->getAll();
        $this->load->view('templates/frontend/header');
        $this->load->view('templates/frontend/navbar');
        $this->load->view('pages/auth/signup/signup-guide', $data);
        $this->load->view('templates/frontend/footer');
    }
    public function signup_agency(){
        $this->load->view('templates/frontend/header');
        $this->load->view('templates/frontend/navbar');
        $this->load->view('pages/auth/signup/signup-agency');
        $this->load->view('templates/frontend/footer');
        // $data = $this->input->post();
        // if($this->User_model->save($data))
        //     return "success";
        // else return "fail";
    }
    public function do_login(){
        $data = $this->input->post();
        $username = $data['username'];
        $pwd = $data['password'];
        if($this->user->login_check($username, $pwd)){
            $res = array('status' => "success", 'role' => $this->session->userdata('logged_in')['role']);
        }
        else $res = array('status' => "fail");
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
    }
    public function do_login_forgot(){
        $data = $this->input->post();
        $email = $data['email'];
        if($this->user->login_forgot_check($email)){
            $res = array('status' => "success", 'role' => $this->session->userdata('logged_in')['role']);
        }
        else $res = array('status' => "fail");
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
    }
    public function upload_guide_photo(){
        $id = $this->input->get('guide_id');
        $target_dir = "uploads/guide/photo/";
        if(!is_dir($target_dir))
            mkdir($target_dir, 0755, true);
        if(isset($_FILES["file"])){
            $target_file = $target_dir.$_FILES["file"]["name"];
            move_uploaded_file($_FILES["file"]["tmp_name"], $target_file); 
            $this->guide->update($id, array('photo'=>$target_file));
        }
    }
    public function upload_guide_certificate(){
        $id = $this->input->get('guide_id');
        $target_dir = "uploads/guide/certificate/";
        if(!is_dir($target_dir))
            mkdir($target_dir, 0755, true);
        if(isset($_FILES["file"])){
            $target_file = $target_dir.$_FILES["file"]["name"];
            move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
            $this->guide->update($id, array('certificate'=>$target_file));
        }
    }
    public function upload_guide_certificate_front(){
        $id = $this->input->get('guide_id');
        $target_dir = "uploads/guide/id_front/";
        if(!is_dir($target_dir))
            mkdir($target_dir, 0755, true);
        if(isset($_FILES["file"])){
            $target_file = $target_dir.$_FILES["file"]["name"];
            move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
            $this->guide->update($id, array('certificate_front_picture'=>$target_file));
        }
    }
    public function upload_guide_certificate_back(){
        $id = $this->input->get('guide_id');
        $target_dir = "uploads/guide/id_back/";
        if(!is_dir($target_dir))
            mkdir($target_dir, 0755, true);
        if(isset($_FILES["file"])){
            $target_file = $target_dir.$_FILES["file"]["name"];
            move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
            $this->guide->update($id, array('certificate_back_picture'=>$target_file));
        }
    }
    public function upload_agency_certificate(){
        $id = $this->input->get('agency_id');
        $target_dir = "uploads/agency/certificate";
        if(!is_dir($target_dir))
            mkdir($target_dir, 0755, true);
        if(isset($_FILES["file"])){
            $target_file = $target_dir.$_FILES["file"]["name"];
            move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
            $this->agency->update($id, array('certificate'=>$target_file));
        }
    }
    public function upload_agency_photo(){
        $id = $this->input->get('agency_id');
        $target_dir = "uploads/agency/photo";
        if(!is_dir($target_dir))
            mkdir($target_dir, 0755, true);
        if(isset($_FILES["file"])){
            $target_file = $target_dir.$_FILES["file"]["name"];
            move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
            echo $target_file;
            $this->agency->update($id, array('photo'=>$target_file));
        }
    }
    public function upload_supervisor_certificate(){
        $id = $this->input->get('supervisor_id');
        $target_dir = "uploads/supervisor/";
        if(!is_dir($target_dir))
            mkdir($target_dir, 0755, true);
        if(isset($_FILES["file"])){
            $target_file = $target_dir.$_FILES["file"]["name"];
            move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
            $this->supervisor->update($id, array('certificate'=>$target_file));
        }
    }
    public function upload_editor_certificate(){
        $id = $this->input->get('editor_id');
        $target_dir = "uploads/editor/";
        if(!is_dir($target_dir))
            mkdir($target_dir, 0755, true);
        if(isset($_FILES["file"])){
            $target_file = $target_dir.$_FILES["file"]["name"];
            move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
            $this->editor->update($id, array('certificate'=>$target_file));
        }
    }
    public function do_signup_guide(){
        $postData = $this->input->post();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('rpassword', 'Password Confirmation', 'required|matches[password]');
        if ($this->form_validation->run() == FALSE)
           $res = array('status' => 'fail', 'msg' => "Please confirm password again!!!");
        else{
            $postData['created_date'] = date('Y-m-d H:i:s');
            $orgpwd = $postData['password'];
            $postData['password'] = md5($postData['password']);
            unset($postData['rpassword']);
            $postData['status'] = 'deactive';
            if(isset($postData['languages'])) $postData['languages'] = json_encode($postData['languages']);
            $confirm_key = md5($postData['username'].$postData['password']);
            $postData['confirm_key'] = $confirm_key;
            if(isset($postData['regions']))
                $postData['regions'] = json_encode($postData['regions']);
            $postData['status'] = "deactive";
            //var_dump($confirm_key);
            $userData = array(
                'name'=>$postData['username'],
                'email'=>$postData['email'],
                'confirm_key'=>$confirm_key,
                'password'=>$postData['password'],
                'role'=>'4',
                'status'=>'deactive',
                'created_date'=> date('Y-m-d H:i:s')
            );
/*            var_dump($postData);
            exit;*/
            if($this->user->save($userData)){
                $guide_id=$this->guide->save($postData);
                if($guide_id){
                    $adminEmail = $this->user->getUserByRole(0)[0]->email;
                    $thisEmail = $postData['email'];
                    $mailData = array(
                        'id'=>$guide_id,
                        'name'=>$postData['username'],
                        'email'=>$postData['email'],
                        'confirm_key'=>$confirm_key,
                        'role'=>'4'
                    );
                    if($this->session->userdata('logged_in')['role']==0){
                        $this->sendEmail($adminEmail, $thisEmail, $mailData);
                        $res = array('status'=>'success', 'msg'=>"This guide is successfully saved!", 'guide_id'=>$guide_id);
                    }
                    else
                        $res = array('status'=>'success', 'msg'=>"You have to confirm your email", 'guide_id'=>$guide_id, 'from'=>$adminEmail, 'to'=>$thisEmail, 'mailData'=>json_encode($mailData));
                }
                else $res = array('status'=>'fail', 'msg'=>"This guide already exists! Please try again!");
            }
            else $res = array('status'=>'fail', 'msg'=>"This email already exists! Please try again!");
        }
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
    }
    public function update_guide(){
        $postData = $this->input->post();
        if($postData['password']!="" || $postData['rpassword']!=""){
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->form_validation->set_rules('password', 'Password Confirmation', 'required');
            $this->form_validation->set_rules('rpassword', 'Password Confirmation', 'required|matches[password]');
            if ($this->form_validation->run() == FALSE){
                $res = array('status' => 'fail', 'msg' => "Please confirm password again!!!");
                return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
            }
        }
        
        $postData['created_date'] = date('Y-m-d H:i:s');
        if($postData['password']!="")
            $postData['password'] = md5($postData['password']);
        else unset($postData['password']);
        unset($postData['rpassword']);
        if(isset($postData['languages']))
            $postData['languages'] = json_encode($postData['languages']);
        if(isset($postData['regions']))
            $postData['regions'] = json_encode($postData['regions']);
        else $postData['regions'] = "";
        $oldemail = $postData['oldemail'];
        if(!isset($postData['status'])) $postData['status'] = 'deactive';
        //unset($postData['oldemail']);
        if(isset($postData['password'])){
            $userData = array(
                'name'=>$postData['username'],
                'email'=>$postData['email'],
                'password'=>$postData['password'],
                'role'=>'4',
                'created_date'=> date('Y-m-d H:i:s')
            );
        }
        else {
            $userData = array(
                'name'=>$postData['username'],
                'email'=>$postData['email'],
                'role'=>'4',
                'created_date'=> date('Y-m-d H:i:s')
            );
        }
        //var_dump($postData);
        // var_dump($userData);
        // exit;
        if($this->user->update($oldemail, $userData)){
            if($this->guide->update($postData['id'], $postData)){
                $res = array('status'=>'success', 'msg'=>"Successfully Saved!", 'guide_id'=>$postData['id']);
            }
            else $res = array('status'=>'fail', 'msg'=>"This guide already exists! Please try again!");
        }
        else $res = array('status'=>'fail', 'msg'=>"This email already exists! Please try again!");
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
    }
    public function update_guideProfile(){
        $postData = $this->input->post();
        $id = $postData['id'];
        if(isset($postData['old_password']) && $postData['old_password']!=""){
            if(md5($postData['old_password'])!=$this->guide->getGuideById($id)[0]->password){
                $res = array('status' => 'fail', 'msg' => "Old password is incorrect!");
                return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
            }
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->form_validation->set_rules('password', 'Password Confirmation', 'required');
            $this->form_validation->set_rules('rpassword', 'Password Confirmation', 'required|matches[password]');
            if ($this->form_validation->run() == FALSE){
                $res = array('status' => 'fail', 'msg' => "Please confirm password again!!!");
                return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
            }
        }
        if(isset($postData['password']))
            $postData['password'] = md5($postData['password']);
        if(isset($postData['rpassword']))
            unset($postData['rpassword']);
        if(isset($postData['old_password']))
            unset($postData['old_password']);
        $oldemail = $postData['oldemail'];
        if(isset($postData['regions'])) $postData['regions'] = json_encode($postData['regions']);
        else $postData['regions'] = "";
        if(isset($postData['languages'])) $postData['languages'] = json_encode($postData['languages']);
        if(isset($postData['password'])){
            $userData = array(
                'name'=>$postData['username'],
                'email'=>$postData['email'],
                'password'=>$postData['password'],
                'role'=>'4',
            );
        }
        else{
            $userData = array(
                'name'=>$postData['username'],
                'email'=>$postData['email'],
                'role'=>'4',
            );
        }
        // var_dump($postData);
        // var_dump($userData);
        // exit;
        if($this->user->update($oldemail, $userData)>=0){
            if($this->guide->update($postData['id'], $postData)>=0){
                if($postData['username']!=$this->session->userdata('logged_in')['username'] || $postData['email']!=$this->session->userdata('logged_in')['email'] || (isset($postData['password']) && $postData['password']!=$this->session->userdata('logged_in')['password']))
                    $res = array('status'=>'success', 'msg'=>"Successfully Updated!", 'guide_id'=>$postData['id'], "redirect"=>false);
                else
                    $res = array('status'=>'success', 'msg'=>"Successfully Updated!", 'guide_id'=>$postData['id'], "redirect"=>true);
            }
            else $res = array('status'=>'fail', 'msg'=>"This guide already exists! Please try again!");
        }
        else $res = array('status'=>'fail', 'msg'=>"This email already exists! Please try again!");
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
    }
    public function do_signup_agency(){
        $postData = $this->input->post();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('rpassword', 'Password Confirmation', 'required|matches[password]');
        if ($this->form_validation->run() == FALSE)
           $res = array('status' => 'fail', 'msg' => "Please confirm password again!!!");
        else{
            $postData['created_date'] = date('Y-m-d H:i:s');
            $orgpwd = $postData['password'];
            $postData['password'] = md5($postData['password']);
            $confirm_key = md5($postData['username'].$postData['password']);
            $postData['confirm_key'] = $confirm_key;
            $postData['status'] = 'deactive';
            unset($postData['rpassword']);
            $userData = array(
                'name'=>$postData['username'],
                'email'=>$postData['email'],
                'password'=>$postData['password'],
                'role'=>'3',
                'confirm_key'=>$confirm_key,
                'created_date'=> date('Y-m-d H:i:s')
            );
            // var_dump($postData);
            // exit;
            if($this->user->save($userData)){
                if($agency_id=$this->agency->save($postData)){
                    $adminEmail = $this->user->getUserByRole(0)[0]->email;
                    $thisEmail = $postData['email'];
                    $mailData = array(
                        'id'=>$agency_id,
                        'name'=>$postData['username'],
                        'email'=>$postData['email'],
                        'confirm_key'=>$confirm_key,
                        'role'=>'3'
                    );
                    if($this->session->userdata('logged_in')['role']==0){
                        $this->sendEmail($adminEmail, $thisEmail, $mailData);
                        $res = array('status'=>'success', 'msg'=>"This agency is successfully saved!", 'agency_id'=>$agency_id);
                    }
                    else
                        $res = array('status'=>'success', 'msg'=>"You have to confirm your email", 'agency_id'=>$agency_id, 'from'=>$adminEmail, 'to'=>$thisEmail, 'mailData'=>json_encode($mailData));
                }
                else $res = array('status'=>'fail', 'msg'=>"This agency already exists! Please try again!");
            }
            else $res = array('status'=>'fail', 'msg'=>"This email already exists! Please try again!");
        }
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
    }
    public function update_agency(){
        $postData = $this->input->post();
        if($postData['password']!="" || $postData['rpassword']!=""){
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->form_validation->set_rules('password', 'Password Confirmation', 'required');
            $this->form_validation->set_rules('rpassword', 'Password Confirmation', 'required|matches[password]');
            if ($this->form_validation->run() == FALSE){
                $res = array('status' => 'fail', 'msg' => "Please confirm password again!!!");
                return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
            }
        }
        
        if($postData['password']!="")
            $postData['password'] = md5($postData['password']);
        else unset($postData['password']);
        unset($postData['rpassword']);
        $oldemail = $postData['oldemail'];
        if(!isset($postData['status'])) $postData['status']="deactive";
        if(isset($postData['password'])){
            $userData = array(
                'name'=>$postData['username'],
                'email'=>$postData['email'],
                'password'=>$postData['password'],
                'role'=>'3',
            );
        }
        else {
            $userData = array(
                'name'=>$postData['username'],
                'email'=>$postData['email'],
                'role'=>'3',
            );
        }
        // var_dump($postData);
        // var_dump($userData);
        // exit;
        if($this->user->update($oldemail, $userData)>=0){
            if($this->agency->update($postData['id'], $postData)>=0){
                $res = array('status'=>'success', 'msg'=>"Successfully Saved!", 'agency_id'=>$postData['id']);
            }
            else $res = array('status'=>'fail', 'msg'=>"This agency already exists! Please try again!");
        }
        else $res = array('status'=>'fail', 'msg'=>"This email already exists! Please try again!");
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
    }
    public function update_agencyProfile(){
        $postData = $this->input->post();
        $id = $postData['id'];
        if(isset($postData['old_password']) && $postData['old_password']!=""){
            if(md5($postData['old_password'])!=$this->agency->getAgencyById($id)[0]->password){
                $res = array('status' => 'fail', 'msg' => "Old password is incorrect!");
                return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
            }
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->form_validation->set_rules('password', 'Password Confirmation', 'required');
            $this->form_validation->set_rules('rpassword', 'Password Confirmation', 'required|matches[password]');
            if ($this->form_validation->run() == FALSE){
                $res = array('status' => 'fail', 'msg' => "Please confirm password again!!!");
                return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
            }
        }
        
        if(isset($postData['password']))
            $postData['password'] = md5($postData['password']);
        if(isset($postData['rpassword']))
            unset($postData['rpassword']);
        if(isset($postData['old_password']))
            unset($postData['old_password']);
        $oldemail = $postData['oldemail'];
        if(isset($postData['password'])){
            $userData = array(
                'name'=>$postData['username'],
                'email'=>$postData['email'],
                'password'=>$postData['password'],
                'role'=>'3',
            );
        }
        else {
            $userData = array(
                'name'=>$postData['username'],
                'email'=>$postData['email'],
                'role'=>'3',
            );
        }
        //var_dump($postData);
        //exit;
        if($this->user->update($oldemail, $userData)>=0){
            if($this->agency->update($postData['id'], $postData)>=0){
                if($postData['username']!=$this->session->userdata('logged_in')['username'] || $postData['email']!=$this->session->userdata('logged_in')['email'] || (isset($postData['password']) && $postData['password']!=$this->session->userdata('logged_in')['password'])){
                    $res = array('status'=>'success', 'msg'=>"Successfully Updated!", 'agency_id'=>$postData['id'], 'redirect'=>false);
                }
                else $res = array('status'=>'success', 'msg'=>"Successfully Updated!", 'agency_id'=>$postData['id'], 'redirect'=>true);
            }
            else $res = array('status'=>'fail', 'msg'=>"This agency already exists! Please try again!");
        }
        else $res = array('status'=>'fail', 'msg'=>"This email already exists! Please try again!");
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
    }
    public function do_signup_supervisor(){
        $postData = $this->input->post();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('rpassword', 'Password Confirmation', 'required|matches[password]');
        if ($this->form_validation->run() == FALSE)
           $res = array('status' => 'fail', 'msg' => "Please confirm password again!!!");
        else{
            $postData['created_date'] = date('Y-m-d H:i:s');
            if(isset($postData['department']))
                $postData['department'] = json_encode($postData['department']);
            else $postData['department'] = "";
            $postData['password'] = md5($postData['password']);
            unset($postData['rpassword']);
            $userData = array(
                'name'=>$postData['name'],
                'email'=>$postData['email'],
                'password'=>$postData['password'],
                'role'=>'1',
                'created_date'=> date('Y-m-d H:i:s')
            );
            if($this->user->save($userData)){
                if($supervisor_id=$this->supervisor->save($postData)){
                    $res = array('status'=>'success', 'msg'=>"Successfully Saved!", 'supervisor_id'=>$supervisor_id);
                }
                else $res = array('status'=>'fail', 'msg'=>"This supervisor already exists! Please try again!");
            }
            else $res = array('status'=>'fail', 'msg'=>"This email already exists! Please try again!");
        }
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
    }
    public function update_supervisor(){
        $postData = $this->input->post();
        if($postData['password']!="" || $postData['rpassword']!=""){
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->form_validation->set_rules('password', 'Password Confirmation', 'required');
            $this->form_validation->set_rules('rpassword', 'Password Confirmation', 'required|matches[password]');
            if ($this->form_validation->run() == FALSE){
                $res = array('status' => 'fail', 'msg' => "Please confirm password again!!!");
                return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
            }
        }
        
        $postData['created_date'] = date('Y-m-d H:i:s');
        if(isset($postData['department']))
            $postData['department'] = json_encode($postData['department']);
        else $postData['department'] = "";
        if(isset($postData['password']))
            $postData['password'] = md5($postData['password']);
        if(isset($postData['rpassword']))
            unset($postData['rpassword']);
        $oldemail = $postData['oldemail'];
        if(isset($postData['password'])){
            $userData = array(
                'name'=>$postData['name'],
                'email'=>$postData['email'],
                'password'=>$postData['password'],
                'role'=>'1',
                'created_date'=> date('Y-m-d H:i:s')
            );
        }
        else {
            $userData = array(
                'name'=>$postData['name'],
                'email'=>$postData['email'],
                'role'=>'1',
                'created_date'=> date('Y-m-d H:i:s')
            );
        }
        if($this->user->update($oldemail, $userData)){
            if($this->supervisor->update($postData['id'], $postData)){
                $res = array('status'=>'success', 'msg'=>"Successfully Saved!", 'supervisor_id'=>$postData['id']);
            }
            else $res = array('status'=>'fail', 'msg'=>"This agency already exists! Please try again!");
        }
        else $res = array('status'=>'fail', 'msg'=>"This email already exists! Please try again!");
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
    }
    public function do_signup_editor(){
        $postData = $this->input->post();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('rpassword', 'Password Confirmation', 'required|matches[password]');
        if ($this->form_validation->run() == FALSE)
           $res = array('status' => 'fail', 'msg' => "Please confirm password again!!!");
        else{
            $postData['created_date'] = date('Y-m-d H:i:s');
            if(isset($postData['department']))
                $postData['department'] = json_encode($postData['department']);
            else $postData['department'] = "";
            $postData['password'] = md5($postData['password']);
            unset($postData['rpassword']);
            $userData = array(
                'name'=>$postData['name'],
                'email'=>$postData['email'],
                'password'=>$postData['password'],
                'role'=>'2',
                'created_date'=> date('Y-m-d H:i:s')
            );
            if($this->user->save($userData)){
                if($editor_id=$this->editor->save($postData)){
                    $res = array('status'=>'success', 'msg'=>"Successfully Saved!", 'editor_id'=>$editor_id);
                }
                else $res = array('status'=>'fail', 'msg'=>"This editor already exists! Please try again!");
            }
            else $res = array('status'=>'fail', 'msg'=>"This email already exists! Please try again!");
        }
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
    }
    public function update_editor(){
        $postData = $this->input->post();
        if($postData['password']!="" || $postData['rpassword']!=""){
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->form_validation->set_rules('password', 'Password Confirmation', 'required');
            $this->form_validation->set_rules('rpassword', 'Password Confirmation', 'required|matches[password]');
            if ($this->form_validation->run() == FALSE){
                $res = array('status' => 'fail', 'msg' => "Please confirm password again!!!");
                return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
            }
        }
        
        $postData['created_date'] = date('Y-m-d H:i:s');
        if(isset($postData['department']))
            $postData['department'] = json_encode($postData['department']);
        else $postData['department'] = "";
        if(isset($postData['password']))
            $postData['password'] = md5($postData['password']);
        if(isset($postData['rpassword']))
            unset($postData['rpassword']);
        $oldemail = $postData['oldemail'];
        if(isset($postData['password'])){
            $userData = array(
                'name'=>$postData['name'],
                'email'=>$postData['email'],
                'password'=>$postData['password'],
                'role'=>'2',
                'created_date'=> date('Y-m-d H:i:s')
            );
        }
        else {
            $userData = array(
                'name'=>$postData['name'],
                'email'=>$postData['email'],
                'role'=>'2',
                'created_date'=> date('Y-m-d H:i:s')
            );
        }
        if($this->user->update($oldemail, $userData)){
            if($this->editor->update($postData['id'], $postData)){
                $res = array('status'=>'success', 'msg'=>"Successfully Saved!", 'editor_id'=>$postData['id']);
            }
            else $res = array('status'=>'fail', 'msg'=>"This agency already exists! Please try again!");
        }
        else $res = array('status'=>'fail', 'msg'=>"This email already exists! Please try again!");
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
    }
    public function delete_guide(){
        $id = $this->input->get('id');
        $guide = $this->guide->getGuideById($id)[0];
        $this->guide->delete($id);
        $this->user->delete($guide->email);
        redirect('/admin/guides_guides');
    }
    public function delete_agency(){
        $id = $this->input->get('id');
        $agency = $this->agency->getAgencyById($id)[0];
        $this->agency->delete($id);
        $this->user->delete($agency->email);
        redirect('/admin/agencies_agencies');
    }
    public function delete_supervisor(){
        $id = $this->input->get('id');
        $supervisor = $this->supervisor->getSupervisorById($id)[0];
        $this->supervisor->delete($id);
        $this->user->delete($supervisor->email);
        redirect('/admin/supervisors_supervisors');
    }
    public function logout(){
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('allow_multi_language');
        $this->session->unset_userdata('site_lang');
        //$this->session->sess_destroy();
        redirect(base_url('/'));
    }
    public function password_check($str) {
        if (preg_match('#[0-9]#', $str) && preg_match('#[a-zA-Z]#', $str)) {
            return true;
        }
        return false;
    }
}
