<?php  if(!defined('BASEPATH')) Exit ('No Direct script access allowed');
class Slider_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();	
	}
	

	public function getSliderAllData(){
		$q=$this->db->get('slider');
		return $q->result_array();

		
	}

}	
