<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {

    public function __construct() {
        parent::__construct();

		$this->load->library("form_validation");
        $this->load->library('cart');
        $this->load->model("User_model");

		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
        header("Cache-Control: no-store,no-cache, must-revalidate");
    }

    public function login() 
    {
        if ($this->session->userdata('logged_in')) {
            redirect(base_url('User/dashboard'));
           
        }else{
            $this->load->view('website/blocks/header');
            $this->load->view('website/login');
            $this->load->view('website/blocks/footer');   
        }
    }
    public function register() 
    {
        if ($this->session->userdata('logged_in')) {
            redirect(base_url('User/dashboard'));
           
        }else{
            $this->load->view('website/blocks/header');
            $this->load->view('website/register');
            $this->load->view('website/blocks/footer'); 
        }
    }
    public function doregister() 
    {
       $data = array();

        $config = array(
            array(
                'field' => 'user_name',
                'rules' => 'trim|required'
            ),array(
                'field' => 'user_email',
                'rules' => 'trim|required'
            ),array(
                'field' => 'user_phone',
                'rules' => 'trim|required'
            ),array(
                'field' => 'user_password',
                'rules' => 'trim|required'
            )
        );

        $this->form_validation->set_rules($config);

        $fields = array("user_name","user_email","user_phone","user_password");
        foreach ($fields as $field) {
            $data[$field] = $this->input->post($field);
        }
        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata("errors", validation_errors());

            $this->session->set_flashdata('commonform', $data);

            redirect('User/register');
        }else{
            $email   = $data['user_email'];
            $num     = $data['user_phone'];
            if ($this->User_model->checkdata($email,$num)) {
                // echo "Already";die();
                $this->session->set_flashdata( "error", 'OOPS! Already Registed');
                    redirect(base_url('User/register'));
            }else{

                $datanew['user_name']     = $data['user_name'];
                $datanew['user_email']    = $data['user_email'];
                $datanew['user_phone']    = $data['user_phone'];
                $pass                     = $data['user_password'];
                $$datanew['user_gender']  = $data['user_gender'];
                $password                 = sha1($pass);
                $datanew['user_password'] = $password;
                // print_r($datanew);die();

                if ($this->User_model->doregister($datanew)) {
                    $this->session->set_flashdata( "sucess", 'Registered Successfully! Now Login');
                    redirect(base_url('User/login'));
                }else{
                    $this->session->set_flashdata( "error", 'OOPS! Something went wrong');
                    redirect(base_url('User/register'));
                }
            }
        }
    }
    public function forgot() 
    {
        if ($this->session->userdata('logged_in')) {
            redirect(base_url('User/dashboard')); 
        }else{
            $this->load->view('website/blocks/header');  
            $this->load->view('website/forgot_password');  
            $this->load->view('website/blocks/footer'); 

        }
    }
    public function forgot_password()
    { 
        $email     = $this->input->post('user_email');
        $password = $this->input->post('user_password');
        if($this->User_model->update_password($email,$password)){
            $this->session->set_flashdata('success', 'Password changed Successfully !');
            redirect(base_url('User/login'));
            
        }else{
            $this->session->set_flashdata('error', 'OOPS! TRY AGAIN');
            redirect(base_url('User/forgot'));
        }
                   
    }
    public function userlogin_compare()
    { 
        $email     = $this->input->post('user_email');
        $password = $this->input->post('user_password');
        $data     = $this->User_model->login_compare($email,$password);
        // print_r($data);die();
        if(!empty($data)){
            
            $newdata = array(
                'user_id'       => $data[0]['user_id'],
                'user_name'     => $data[0]['user_name'],
                'user_phone'    => $data[0]['user_phone'],
                'user_email'    => $data[0]['user_email']
            );
            $this->session->set_userdata('logged_in',$newdata); 
            $this->session->set_flashdata('success', 'Successfully Logged In !');
            redirect(base_url('User/dashboard'));
            
        }else{
            $this->session->set_flashdata('error', 'Invalid username or password!');
            redirect(base_url('User/login'));
        }
                   
    }
    public function user_login_compare()
    { 
        $email     = $this->input->post('user_email');
        $password = $this->input->post('user_password');
        $data     = $this->User_model->login_compare($email,$password);
        // print_r($data);die();
        if(!empty($data)){
            
            $newdata = array(
                'user_id'       => $data[0]['user_id'],
                'user_name'     => $data[0]['user_name'],
                'user_phone'    => $data[0]['user_phone'],
                'user_email'    => $data[0]['user_email']
            );
            $this->session->set_userdata('logged_in',$newdata); 
            $this->session->set_flashdata('success', 'Successfully Logged In !');
            redirect('landing/checkout');
            
        }else{
            $this->session->set_flashdata('error', 'Invalid username or password!');
            redirect('landing/checkout');
        }
                   
    }
    public function dashboard() 
    {
        if ($this->session->userdata('logged_in')) {
            $userdata = $this->session->userdata("logged_in");
            $id       = $userdata['user_id'];
            $data['user'] = $this->User_model->getuser($id);
            // print_r($data);die();
            $this->load->view('website/blocks/header');
            $this->load->view('website/user_dashboard',$data);
            $this->load->view('website/blocks/footer');
        }else{
            redirect(base_url('User/login')); 

        }
    }
    public function updateuser(){

        $pdata = $this->input->post(); 
        // print_r($pdata);die(); 
        $user_id             = $pdata['user_id'];
        $data['user_name']   = $pdata['user_name'];
        $data['user_email']  = $pdata['user_email'];
        $data['user_phone']  = $pdata['user_phone'];
        $data['user_gender'] = $pdata['user_gender'];
        $condition           = "user_id='".$user_id."'";
        $result = $this->User_model->updateRow("user",$data,$condition);
        if($result)
        {
            $this->session->set_flashdata( "sucess", 'Thank You For Update Address Details Successfully ');
            redirect('User/dashboard');
        }
    }
    public function logout()
    { 
        
        if ($this->session->userdata('logged_in')) {
            $data['user'] = $this->session->userdata('logged_in');               
            $this->session->unset_userdata('logged_in',$data);
            $this->session->sess_destroy();
            redirect('User/login');
        }else{
            redirect('User/');            
        }
    }
    public function address() 
    {
        if ($this->session->userdata('logged_in')) {
            // print_r($data);die();
            $userdata  = $this->session->userdata("logged_in");
            $user_id   = $userdata['user_id'];
            $data['address'] = $this->User_model->getaddress($user_id);
            // print_r($data);die();
            $this->load->view('website/blocks/header');
            $this->load->view('website/address',$data);
            $this->load->view('website/blocks/footer');
        }else{
            redirect(base_url('User/login')); 

        }
    }
     public function editAddress(){
        if ($this->session->userdata('logged_in')) {
            // print_r($data);die();
        $pdata = $this->input->post();  
        $userData = $this->session->userdata("logged_in");
        $user_id = $userData['user_id'];
        $address_id = $pdata['address_id'];
            // print_r($user_id);die();
        $addressLists = $this->User_model->AddressList($user_id,$address_id);
        echo json_encode($addressLists); exit;
        }else{
            redirect(base_url('User/login')); 

        }
    }
    public function doAddAddress() 
    {
       $data = array();

        $config = array(
            array(
                'field' => 'u_name',
                'rules' => 'trim|required'
            ),array(
                'field' => 'u_email',
                'rules' => 'trim|required'
            ),array(
                'field' => 'u_number',
                'rules' => 'trim|required'
            ),array(
                'field' => 'alt_mobile',
                'rules' => 'trim|required'
            ),array(
                'field' => 'state',
                'rules' => 'trim|required'
            ),array(
                'field' => 'city',
                'rules' => 'trim|required'
            ),array(
                'field' => 'pincode',
                'rules' => 'trim|required'
            ),array(
                'field' => 'landmark',
                'rules' => 'trim|required'
            ),array(
                'field' => 'address',
                'rules' => 'trim|required'
            )
        );

        $this->form_validation->set_rules($config);

        $fields = array("u_name","u_email","u_number","alt_mobile","state","city","pincode","landmark","address");
        foreach ($fields as $field) {
            $data[$field] = $this->input->post($field);
        }
        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata("errors", validation_errors());

            $this->session->set_flashdata('commonform', $data);

            redirect('User/address');
        }else{       
            $userdata               = $this->session->userdata("logged_in");
            $user_id                = $userdata['user_id'];
            $datanew['user_id']     = $user_id;
            $datanew['u_name']      = $data['u_name'];
            $datanew['u_email']     = $data['u_email'];
            $datanew['u_number']    = $data['u_number'];
            $datanew['alt_mobile']  = $data['alt_mobile'];
            $datanew['state']       = $data['state'];
            $datanew['city']        = $data['city'];
            $datanew['pincode']     = $data['pincode'];
            $datanew['landmark']    = $data['landmark'];
            $datanew['address']     = $data['address'];
            // print_r($datanew);die();

            if ($this->User_model->doaddress($datanew)) {
                $this->session->set_flashdata( "sucess", 'Successfully Added');
                redirect(base_url('User/address'));
            }else{
                $this->session->set_flashdata( "error", 'OOPS! Something went wrong');
                redirect(base_url('User/address'));
            }
        }
    }
    public function doAddressupdate() 
    {
       $data = array();

        $config = array(
            array(
                'field' => 'u_name',
                'rules' => 'trim|required'
            ),array(
                'field' => 'u_email',
                'rules' => 'trim|required'
            ),array(
                'field' => 'u_number',
                'rules' => 'trim|required'
            ),array(
                'field' => 'alt_mobile',
                'rules' => 'trim|required'
            ),array(
                'field' => 'state',
                'rules' => 'trim|required'
            ),array(
                'field' => 'city',
                'rules' => 'trim|required'
            ),array(
                'field' => 'pincode',
                'rules' => 'trim|required'
            ),array(
                'field' => 'landmark',
                'rules' => 'trim|required'
            ),array(
                'field' => 'address',
                'rules' => 'trim|required'
            )
        );

        $this->form_validation->set_rules($config);

        $fields = array("u_name","u_email","u_number","alt_mobile","state","city","pincode","landmark","address","address_id");
        foreach ($fields as $field) {
            $data[$field] = $this->input->post($field);
        }
        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata("errors", validation_errors());

            $this->session->set_flashdata('commonform', $data);

            redirect('User/address');
        }else{       
            $userdata               = $this->session->userdata("logged_in");
            $user_id                = $userdata['user_id'];
            $datanew['user_id']     = $user_id;
            $datanew['u_name']      = $data['u_name'];
            $datanew['u_email']     = $data['u_email'];
            $datanew['u_number']    = $data['u_number'];
            $datanew['alt_mobile']  = $data['alt_mobile'];
            $datanew['state']       = $data['state'];
            $datanew['city']        = $data['city'];
            $datanew['pincode']     = $data['pincode'];
            $datanew['landmark']    = $data['landmark'];
            $datanew['address']     = $data['address'];
            $address_id     = $data['address_id'];
            // print_r($data);die();

            if ($this->User_model->doupdateadd($datanew,$user_id,$address_id)) {
                $this->session->set_flashdata( "sucess", 'Successfully Added');
                redirect(base_url('User/address'));
            }else{
                $this->session->set_flashdata( "error", 'OOPS! Something went wrong');
                redirect(base_url('User/address'));
            }
        }
    }
    public function change_password() 
    {
        if ($this->session->userdata('logged_in')) {
            // print_r($data);die();
            $this->load->view('website/blocks/header');
            $this->load->view('website/change_password');
            $this->load->view('website/blocks/footer');
        }else{
            redirect(base_url('User/login')); 

        }
    }
    public function updateuserpass(){
        $userdata      = $this->session->userdata("logged_in");
        $user_id       = $userdata['user_id'];
        $pdata         = $this->input->post();  
        $current_password = sha1($pdata['current_pass']);
        $password=sha1($pdata['password']);
        $data['user_password'] =$password;
        // print_r($data);die();    
        $condition = "user_id='".$user_id."'";
        if($this->User_model->comparepass($current_password,$user_id))
        {
            if($this->User_model->updateRow("user",$data,$condition))
            {
                
                $this->session->set_flashdata( "sucess", 'Thank You For Update Address Details Successfully ');
                redirect('User/dashboard');
            }else{
                $this->session->set_flashdata( "error", 'OOPs Something went wrong! ');
                redirect('User/change_password');
            }
        }else{
            $this->session->set_flashdata( "error", 'Please Enter Valid current Password ! ');
            redirect('User/change_password');
        }
    }





}
