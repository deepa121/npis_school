<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller {

	public function __construct() {
        parent::__construct();
		
		//$this->load->model("admin/Slider_model");
        $this->load->model("admin/Dashboard_model");
		$this->load->helper(array('form', 'url'));
		$this->load->library("form_validation");
        
        $this->load->helper(array('form', 'url'));
		$this->load->library('upload');
    }


	public function index()
	{	
		//$data['sliders']=$this->Slider_model ->getSliderAllData();
        $data['sliders']=$this->Dashboard_model ->getSliderAllData();
		// print_r($data);die();
		
		$this->load->view('admin/blocks/header');
		$this->load->view('admin/blocks/sidebar');
		$this->load->view('admin/slider',$data);
		$this->load->view('admin/blocks/footer');
	}
	
	public function addSlider(){
		
		
		//$data['sliders']=$this->Dashboard_model ->getSliderAllData();
        $this->load->view('admin/blocks/header');
		$this->load->view('admin/blocks/sidebar');
		$this->load->view('admin/addSlider');
		$this->load->view('admin/blocks/footer');
		
	}

	public function insert(){
		
		// $data = array(
		// 		'Category_id' => $this->input->post('Categoryid'),
		// 		'subcategory_id' => $this->input->post('subcategoryid'),
		// 	    'title' => $this->input->post('title'),
		// 	    'date' => $this->input->post('date'),
		// 	    // 'imgSrc' => $this->input->post('imgSrc'),
		// 	    // 'imgSrc' => $this->input->post('image'),
		// 		);
		// print_r($data);die();
		
		$config['upload_path'] = './assets/admin_assets/images/sliders/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 8000;
        // $config['max_width'] = 1500;
        // $config['max_height'] = 1500;
		$new_name = time() . '-' . $_FILES["image"]['name'];
		// echo $new_name;die();
		$config['file_name'] = $new_name;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if (!$this->upload->do_upload('image')) {
            $error = array('error' => $this->upload->display_errors());
			// print_r($error);die();
			redirect('admin/Slider/addSlider'); //error

        } else {
            //echo $new_name;die();
			$data = array(
			    
			    'slider_title' => $this->input->post('title'),
			    // 'date' => $this->input->post('date'),
			    'slider_img' => $new_name,
				);
            // $data = array('imgSrc' => $this->upload->data());

			$result=$this->Dashboard_model->addslider($data);
            redirect('admin/Slider');
        }
		// $result=$this->User_model->addblog($data);
  		// redirect('admin/blog/Blog');

	}
	public function insert2(){
		
		$img = ($_FILES['image']['name'] != '' ) ? $_FILES['image']['name'] : '' ;
		// print_r($_FILES);die();
		$this->file_uploader->set_default_upload_path('./assets/admin/images/blogs/');
		$this->file_uploader->set_allowed_type('jpg|jpeg|png');
		
		$img = $this->file_uploader->upload_image('image');
		if($img['status']==200){
			
			print_r($img);die();
			$string = $img['data'];
			$img = preg_replace('@[^A-Za-z0-9\-_.\/]+@i','_',$string);
			// $data = array(
				// 	'category_id' => $this->input->post('Categoryid'),
				// 	'subcategory_id' => $this->input->post('subcategoryid'),
				// 	'title' => $this->input->post('title'),
				// 	'date' => $this->input->post('date'),
				// 	'imgSrc' => $img,
				// 	);
				// $result=$this->User_model->addblog($data);
            	// redirect('admin/blog/Blog');


		}


	}

	public function insert3(){
		// load base_url  
		$this->load->helper('url');
	  
		// Check form submit or not 
		if($this->input->post('upload') != NULL ){ 
		   $data = array(); 
		   if(!empty($_FILES['image']['name'])){ 
			  // Set preference 
			  $config['upload_path'] = 'uploads/'; 
			  $config['allowed_types'] = 'jpg|jpeg|png|gif'; 
			  $config['max_size'] = '100000'; // max_size in kb 
			  $config['file_name'] = $_FILES['image']['name']; 
	 
			  // Load upload library 
			  $this->load->library('upload',$config); 
		
			  // File upload
			  if($this->upload->do_upload('image')){ 
				 // Get data about the file
				 $uploadData = $this->upload->data(); 
				 $filename = $uploadData['file_name']; 
				 $data['response'] = 'successfully uploaded '.$filename; 
			  }else{ 
				 $data['response'] = 'failed'; 
			  } 
		   }else{ 
			  $data['response'] = 'failed'; 
		   } 
		   // load view 
		//    $this->load->view('user_view',$data);
		   	$data = array(
			'category_id' => $this->input->post('Categoryid'),
			'subcategory_id' => $this->input->post('subcategoryid'),
			'title' => $this->input->post('title'),
			'date' => $this->input->post('date'),
			'imgSrc' => $filename,
			);
			$result=$this->User_model->addblog($data);
            redirect('admin/blog/Blog');
		}else{
		   redirect('admin/blog/Blog/addBlog'); //error 
		} 
	  }
	 

	public function editSlider(){

		$id=$this->uri->segment('4');
		// echo $id;die();
		
		$data['sliders']=$this->Dashboard_model->getSliderData($id);

		$this->load->view('admin/blocks/header');
		$this->load->view('admin/blocks/sidebar');
		$this->load->view('admin/editSliderData',$data);
		$this->load->view('admin/blocks/footer');
	}
	
	public function update_slider(){
		$id=$this->uri->segment('4');
		$data['sliders']=$this->Dashboard_model->update_slider_data($id);
		redirect('admin/Slider');
	}
	public function deleteSlider(){
		$id=$this->uri->segment('4');
		// echo $id;die();
		$data['sliders']=$this->Dashboard_model->delete_slider($id);
		redirect('admin/Slider');
		
	}

	public function inactive(){
		$id=$this->uri->segment('4');
		// echo $id; die();
		$data['sliders']=$this->Dashboard_model->update_status_inactive_slider($id);
		redirect('admin/Slider');
	}
	public function active(){
		$id=$this->uri->segment('4');
		 //echo $id; die();
		$data['sliders']=$this->Dashboard_model->update_status_active_slider($id);
		redirect('admin/Slider');
	}
	public function inactivePost(){
		$id=$this->uri->segment('5');
		// echo $id; die();
		$data['blogs']=$this->User_model->update_status_inactive_blog_post($id);
		redirect('admin/blog/Blog');
	}
	public function activePost(){
		$id=$this->uri->segment('5');
		// echo $id; die();
		$data['blogs']=$this->User_model->update_status_active_blog_post($id);
		redirect('admin/blog/Blog');
	}
	
}
