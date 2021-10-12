<?php  if(!defined('BASEPATH')) Exit ('No Direct script access allowed');
class Landing_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();	
	}
	
	public function getvariant($id) 
	{
        $this->db->select("*");
        $this->db->from("product");
		$this->db->join("variant","product.product_id=variant.product_id");
        $this->db->where("product.product_id", $id);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result_array();
	}
	public function getmulti_images($id) 
	{
        $this->db->select("*");
        $this->db->from("product_slider_image");
        $this->db->where("product_id", $id);
        $query = $this->db->get();
        return $query->result_array();
	}
    public function get_features($feature_idArr) 
	{
        $this->db->select("*");
        $this->db->from("feature");
        $this->db->where_in("feature_id", $feature_idArr);
        $query = $this->db->get();
        return $query->result_array();
	}
	public function getoptn($id) 
	{
		$this->db->select("variant.*,a.optn_name as optn1,a.optn_id as optn1_id, b.optn_name as optn2,b.optn_id as optn2_id,c.optn_name as optn3,c.optn_id as optn3_id");
		$this->db->from("variant");
		$this->db->join("attr_optn as a", "variant.size=a.optn_id");
        $this->db->join("attr_optn as b", "variant.dimension=b.optn_id");
        $this->db->join("attr_optn as c", "variant.thickness=c.optn_id");
		$this->db->where("product_id", $id);
        $this->db->order_by("variant_id", "DESC");
		$query = $this->db->get();
		
		return $query->result_array();
	}
	public function getsize_data($size_id,$product_id) 
	{
        $this->db->select("*");
        $this->db->from("variant");
		$this->db->join("attr_optn","variant.dimension=attr_optn.optn_id");
		$this->db->where("variant_status", 1);
        $this->db->where("product_id", $product_id);
        $this->db->where("size", $size_id);
        $this->db->group_by("attr_optn.optn_id");
        $query = $this->db->get();
        return $query->result_array();
	}
	public function getthick_data($product_id,$size_id,$dimension_id) 
	{
        $this->db->select("*");
        $this->db->from("variant");
		$this->db->join("attr_optn","variant.thickness=attr_optn.optn_id");
		$this->db->where("variant_status", 1);
        $this->db->where("product_id", $product_id);
        $this->db->where("size", $size_id);
        $this->db->where("dimension", $dimension_id);
        $query = $this->db->get();
        return $query->result_array();
	}
	public function getthickprice($product_id,$size_id,$dimension_id,$thickness_id) 
	{
		$this->db->select("variant.*,a.optn_name as optn1, b.optn_name as optn2,c.optn_name as optn3");
        $this->db->from("variant");
		$this->db->join("attr_optn as a", "variant.size=a.optn_id");
        $this->db->join("attr_optn as b", "variant.dimension=b.optn_id");
        $this->db->join("attr_optn as c", "variant.thickness=c.optn_id");
		$this->db->where("variant_status", 1);
        $this->db->where("product_id", $product_id);
        $this->db->where("size", $size_id);
        $this->db->where("dimension", $dimension_id);
        $this->db->where("thickness", $thickness_id);
        $query = $this->db->get();
        return $query->result_array();
	}
    public function getvardata($variant_id) 
	{
        $this->db->select("*");
        $this->db->from("variant");
        $this->db->where_in("variant_id", $variant_id);
        $query = $this->db->get();
        return $query->result_array();
	}
    public function getprodata($product_id) 
	{
        $this->db->select("*");
        $this->db->from("product");
        $this->db->where_in("product_id", $product_id);
        $query = $this->db->get();
        return $query->result_array();
	}
    public function productList($conditions='',$limits=''){
        $sql = "SELECT * FROM `product`";
        if(!empty($conditions)){
            $sql .=" where ".$conditions;
        }
        if(!empty($limits)){
            $sql .=" ".$limits; 
        }
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        } 
    }
    public function getslider(){
 
        $this->db->select("*");

        $this->db->from("slider");

        $query = $this->db->get();

        return $query->result_array();

    }
    public function getf_product(){
 
        $this->db->select("*");
        $this->db->from("product");
        $this->db->where("fetured_pro", 1);
        $this->db->where("prostatus", 1);

        $query = $this->db->get();

        return $query->result_array();

    }
    public function getdream_product(){
 
        $this->db->select("*");
        $this->db->from("product");
        $this->db->where("dream_range", 1);
        $this->db->where("prostatus", 1);

        $query = $this->db->get();

        return $query->result_array();

    }
    public function search_field($keyword,$catid){
        if (!empty($catid)) {
            $sql="SELECT DISTINCT proname_en as search,product_id as pro_id,'1' as pro FROM product WHERE prostatus =1 AND catid = $catid AND  proname_en LIKE  '$keyword%' order by proname_en  ";
            $query = $this->db->query($sql);
        }else{
            $sql="SELECT DISTINCT proname_en as search,product_id as pro_id,'1' as pro FROM product WHERE prostatus =1 AND proname_en LIKE  '$keyword%' order by proname_en  ";
            $query = $this->db->query($sql);
        }

        $data= $query->result();
        // print_r($data);die();
        return $data;
    }
















    public function get_filter_product(){

        $pdata = $this->input->post();
        $cond = '';
        
            if(!empty($pdata['maincatid']) && $pdata['maincatid']){
                $catid = $pdata['maincatid'];
                // print_r($catid);die();
                if(!empty($pdata['catid']) && $pdata['catid']){
                  $catid = $pdata['maincatid'];
                  $subcatid = $pdata['catid'];
                  $sub_sub_cat = $pdata['subcatid'];
                  if(!empty($sub_sub_cat)){
                    $sub_sub_cat = $pdata['subcatid'];
                    $this->db->where("catid", $catid);
                    $this->db->where("subcatid", $subcatid);
                    $this->db->where("sub_subcatid", $sub_sub_cat);
                  }
                  else
                  {
                    $this->db->where("catid", $catid);
                    $this->db->where("subcatid", $subcatid);
                  }
                }else{
                    $this->db->where("catid", $catid);
                }
            }
            if(!empty($pdata['size']) && $pdata['size']){
            $this->db->where_in("size", $pdata['size']);
            }
        
        if(!empty($pdata['dimension'])){
          $this->db->where_in("dimension", $pdata['dimension']);
        }
        if(!empty($pdata['thickness'])){
          $this->db->where_in("thickness", $pdata['thickness']);
        }
        // if(!empty($pdata['minPrice']) && !empty($pdata['maxPrice']) ){
        //   $minPrice  = $pdata['minPrice'];
        //   $maxPrice  = $pdata['maxPrice'];
        //   $cond .= " and product.usd_price between $minPrice and $maxPrice ";
        // }

        $this->db->select('*');
        $this->db->from('product');
        $this->db->join('variant','variant.product_id = product.product_id','left');
        $this->db->group_by('product.product_id');
        $this->db->where("prostatus", 1);
        $query = $this->db->get();

        return $query->result_array();

    }


    public function check_coupon($coupon,$currdate) 
    {
        $this->db->select("*");
        $this->db->from("coupons");
        $this->db->where("coupon_code", $coupon);
        $this->db->where("expiry_date>=", $currdate);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function savedata($table,$args) {
  
    
       $this->db->insert($table, $args);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    } 

	
}