<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Landing extends CI_Controller {

    public function __construct() {
        parent::__construct();

		$this->load->library("form_validation");
        $this->load->library('cart');
        $this->load->model("Landing_model");

		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
        header("Cache-Control: no-store,no-cache, must-revalidate");

        // if ($this->session->userdata("user_id") == '')
        //     redirect("User_login");
    }

    public function index() 
	{
        $data['slider'] = $this->Landing_model->getslider();
        $data['f_product'] = $this->Landing_model->getf_product();
        $data['dream_product'] = $this->Landing_model->getdream_product();
        $this->load->view('website/blocks/header');
        $this->load->view('website/index',$data);
        $this->load->view('website/blocks/footer');
    }
    public function products() 
    {
        $this->load->view('website/blocks/header');
        $this->load->view('website/product_listing');
        $this->load->view('website/blocks/footer');
    }
	public function product_detail($id) 
    {
        // echo $id;die();
        $product_detail = $this->Landing_model->getvariant($id);
        if (!empty($product_detail)) {
            $feature_idArr = (!empty($product_detail[0]['feature_id']))? explode(",",$product_detail[0]['feature_id']):[];
            $feature = $this->Landing_model->get_features($feature_idArr);
            $data['features'] = $feature;
            $data['variant'] = $product_detail;
            $data['multi_images'] = $this->Landing_model->getmulti_images($id);
            $attr_optn = $this->Landing_model->getoptn($id);
            foreach ($attr_optn as $value) {
                $data['size'][$value['optn1_id']] = ["size_id"=> $value['optn1_id'],"optn_name"=> $value['optn1']];
                $data['dimension'][$value['optn2_id']] = ["di_id"=> $value['optn2_id'],"optn_name"=> $value['optn2']];
                $data['thickness'][$value['optn3_id']] = ["thick_id"=> $value['optn3_id'],"optn_name"=> $value['optn3']];
            }

            // print_r($data['thickness']);die();
            // $data['size']= array_column($attr_optn, 'optn1');
            // $data['dimension']= array_column($attr_optn, 'optn2');
            $this->load->view('website/blocks/header');
            $this->load->view('website/product_detail',$data);
            $this->load->view('website/blocks/footer');
        }else{
            redirect('404');
        }
    }
    public function checksize() 
    {
        $size = $this->input->post();
        $size_id= $size['size'];
        $product_id= $size['product_id'];
        $response['product'] = $this->Landing_model->getsize_data($size_id,$product_id);
        $product_detail = $this->Landing_model->getvariant($product_id);
        $response['list_price']= $product_detail[0]['pro_list_price'];
        $response['price'] = $product_detail[0]['pro_price'];
        // print_r($price);die();
        echo json_encode($response); exit;
    }
    public function getthickness() 
    {
        $data = $this->input->post();
        $product_id= $data['product_id'];
        $size_id= $data['size'];
        $dimension_id= $data['dimension'];
        $product = $this->Landing_model->getthick_data($product_id,$size_id,$dimension_id);
        $list_price = $product[0]['list_price'];
        $price = $product[0]['variant_price'];
        // print_r($price);die();
        $response['product'] = $product;
        $response['list_price'] = $list_price;
        $response['price'] = $price;
        echo json_encode($response); exit;
    }
    public function getthickprice() 
    {
        $data = $this->input->post();
        $product_id= $data['product_id'];
        $size_id= $data['size'];
        $dimension_id= $data['dimension'];
        $thickness_id= $data['thickness'];
        $product = $this->Landing_model->getthickprice($product_id,$size_id,$dimension_id,$thickness_id);
        foreach ($product as $value) {
                $data['size']= ["optn_name"=> $value['optn1']];
                $data['dimension'] = ["optn_name"=> $value['optn2']];
                $data['thickness'] = ["optn_name"=> $value['optn3']];
            }
        $size = $data['size'];
        $dimension = $data['dimension'];
        $thickness = $data['thickness'];
        $list_price = $product[0]['list_price'];
        $price = $product[0]['variant_price'];
        $response['size'] = $size;
        $response['dimension'] = $dimension;
        $response['thickness'] = $thickness;
        $response['product'] = $product;
        $response['list_price'] = $list_price;
        $response['price'] = $price;
        // print_r($response);die();
        echo json_encode($response); exit;
    }
     public function filter_data($data){
        $html = '';
        if(!empty($data['result'])){
            foreach($data['result'] as $val)
            {   
                $price    = $val['pro_price'];
                $imageUrl = base_url().'assets/images/products/'.$val['pro_image'];
                $link     = base_url().'landing/product_detail/'.$val['product_id'];
                $html .= '<div class="carouselitems listingitem appendData">
                              <div class="divhead ">
                                 <figure>
                                  <img src="'.$imageUrl.'" alt="">
                                 </figure>
                                 <i class="fa fa-heart"></i>
                              </div>
                              <h5>'. $val['proname_en'] .'</h5>
                              <p>'. $val['mini_description'] .'</p>
                              <button type="button" class="btn btn-readmore outline pl-4 pr-4 mt-3">
                              <i class="fa fa-rupee"></i> '. $val['pro_price'] .' ADD To CART </button>
                          </div>';
                                    
            }
        }
        return $html;
    }

     public function cart_data(){
        $html = '';
        $data['result'] = $this->cart->contents();
        // print_r($data);die();
        if(!empty($data['result'])){
            foreach($data['result'] as $key=> $val)
            {   
                $price    = $val['price'];
                $list_price    = $val['list_price'];
                $name    = $val['name'];
                $qty    = $val['qty'];
                $size    = $val['options']['size_name'];
                $dimension    = $val['options']['dimension_name'];
                $thickness    = $val['options']['thickness_name'];
                $imageUrl = base_url().'assets/images/products/'.$val['pro_image'];
                $link     = base_url().'landing/product_detail/'.$val['id'];
                $html .= '<div class="common-orderlisting append_data">
                     <div class="leftblock">
                         <div class="imageblock">
                            <img src="'.$imageUrl.'">
                         </div>
                         <div class="ordertext">
                            <h4>'. $name .'</h4>
                             <div class="sizeblock"><span>'. $size .'</span><span>'. $dimension .'</span><span>'. $thickness .'</span></div>
                             <div class="qntityproduct mt-3">
                                 <div class="qty">
                                     <span class="minus-one" onclick="update_minus_one(\''.$key.'\','.$qty.')"> </span>
                                     <input value="'. $qty .'" readonly>
                                    <span class="plus-one" onclick="update_one(\''.$key.'\','.$qty.')"></span>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="rightblock">
                         <h6 class="pricecross"> ₹'. $list_price .'/-</h6>
                         <h5 class="rstext">₹'. $price .'</h5>
                     </div>
                 </div>';
                                    
            }
        }
        // <span " onclick="remove_cartt(\''.$key.'\')">X</span>
        // print_r($html);die();
        echo json_encode(['html'=>$html]);
        // return $html;
    }
    public function autocompletesearch()
    {
        $catid = $_POST['catid'];
        $keyword = $_POST['keyword'];
        $data=$this->output->set_content_type("application/json")->set_output(json_encode($this->Landing_model->search_field($keyword,$catid)));
    }
    
    public function filter_products($rowno=0){
        $this->load->helper('url');
        $this->load->library('pagination');
        $rowno = $this->input->post('pagno');
        $maincatid = $this->input->post('maincatid');
        $productList  = $this->Landing_model->get_filter_product(); 
        $productDatas= array(); 

        foreach($productList as $product){
            $node=array();
            $node['product_id']         = $product['product_id'];
            $node['catid']              = $product['catid'];
            $node['subcatid']           = $product['subcatid'];
            $node['sub_subcatid']           = $product['sub_subcatid'];
            $node['proname_en']         = $product['proname_en'];
            $node['brand_name_en']      = $product['brand_name_en'];
            $node['pro_list_price']      = $product['pro_list_price'];
            $node['pro_price']      = $product['pro_price'];
            $node['pro_image']      = $product['pro_image'];
            $node['mini_description']     = $product['mini_description'];
            $node['prostatus']          = $product['prostatus'];
            array_push($productDatas,$node);
        }
        $html  = 'No Data Found';
        if(!empty($productDatas)){
            $data['result'] = $productDatas;
            $html =  $this->filter_data($data);
        }
        echo json_encode(['html'=>$html]);
    }
    
    public function FAQ() 
    {
        $this->load->view('website/blocks/header');
        $this->load->view('website/faq');
        $this->load->view('website/blocks/footer');
    }

    public function cart() 
    {
        $this->load->view('website/blocks/header');
        $this->load->view('website/cart');
        $this->load->view('website/blocks/footer');
    }
    public function checkout() 
    {
        $this->load->view('website/blocks/header');
        $this->load->view('website/checkout');
        $this->load->view('website/blocks/footer');
    }

    public function addc() 
    {
        $this->load->view('website/blocks/header');
        $this->load->view('website/addc');
        $this->load->view('website/blocks/footer');
    }

    
    public function orderNow() 
    {   
        print_r("hello");die();
        $userdata1 = $this->session->userdata("logged_in");
        $user_id = $userdata1['user_id'];
        $pdata = $this->input->post();
        $address_id= $pdata['address_id'];
        $payment_method   = $pdata['payment'];
        $chars = "ASDFGHJKLMNBVCXZQWERTYUIOP0123456789asdfghjklqwertyuiopzxcvbnm";
        $transaction_id = substr( str_shuffle( $chars ), 0, $length );
        $order_date = date('Y-m-d');
        $order_status = 0;
        $total = $this->cart->format_number($this->cart->total());
        $delivery_date = date('Y-m-d',strtotime("+3 days"));
        $delivery_charge =0;
        $coupon_discount =0;

        $data = array(
                'user_id'      => $user_id,
                'transaction_id'    => $transaction_id,
                'address_id'          => $address_id,
                'order_date'          => $order_date,
                'order_status'     => $order_status,
                'total_price'           => $total,
                'payment_method'    => $payment_method,
                'delivery_date'         => $delivery_date,
                'delivery_charge'     => $delivery_charge,
                'coupon_discount'           => $coupon_discount           
            );

        $orderId = $this->Landing_model->savedata('orders',$data);

        $cart_data = $this->cart->contents();
        // echo json_encode($response); exit;
    }
}
