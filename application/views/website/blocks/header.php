<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Home</title>
   <meta name="description" content="">
   <meta name="keywords" content="">
   <link rel="icon" href="<?php echo base_url('assets/website_assets/images/fabicon.png');?>">
   <!-- Bootstrap CSS File -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/website_assets/css/bootstrap.min.css');?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/website_assets/css/style.css');?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/website_assets/css/mobile.css');?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/website_assets/fonts/stylesheet.css');?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/website_assets/css/aos.css');?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/website_assets/css/owl.carousel.min.css');?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/website_assets/css/owl.theme.default.min.css');?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/website_assets/js/sweetalert.css">
</head>

<body>
   <header class="header">
      <div class="top_header p-2">
         <div class="container1440">
            <div class="row align-items-center">
               <div class="col-md-4">
                  <p class="m-0">Toll Free No. 1800 1020 280
                  </p>
               </div>
               <div class="col-md-4">
                  <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                     <div class="carousel-inner">
                        <div class="carousel-item active">
                           <p class="m-0">
                              Amazon All products now available on Amazon |
                           </p>
                        </div>
                        <div class="carousel-item">
                           <p class="m-0">
                              Get 50% off on your first purchase use coupon First50 |
                           </p>
                        </div>
                        <div class="carousel-item">
                           <p class="m-0">
                              Amazon All products now available on Amazon |
                           </p>
                        </div>
                     </div>
                  </div>

               </div>
               <div class="col-md-4">

                  <ul class="d-flex socialIcons m-0 align-items-center justify-content-end">
                     <p class="m-0 mr-3">Follow us on:
                     </p>
                     <li>
                        <a href=""> <i class="fa fa-facebook-f"></i> </a>
                     </li>
                     <li><a href=""><i class="fa fa-instagram"></i> </a></li>
                     <li><a href=""> <i class="fa fa-linkedin"></i></i> </a></li>
                     <li>
                        <a href=""><i class="fa fa-twitter"></i> </a>
                     </li>
                     <li>
                        <a href=""><i class="fa fa-youtube"></i> </a>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
      <div class="main_header container1440">
         <nav class="navbar navbar-expand-lg navbar-light p-0 pt-4 pb-4 navbartop">

            <a class="navbar-brand" href="<?php echo base_url(); ?>">
               <img src="<?php echo base_url('assets/website_assets/images/logo.png');?>" alt="">

            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
               aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
               <div class="centerHeader w-100 d-flex ">
                  <form class="form-inline w-75 ml-4 p-1">
                     <select name="search_cat" class="border-0 p-1 w-25 search_cat">
                        <option value=""> All Categories </option>
                        <?php 
                            $this->db->select('*');
                            $this->db->from('category');  
                            $this->db->where('status','0');
                            $query = $this->db->get();        
                            $cat_list =  $query->result_array();
                            foreach ($cat_list as $value) {
                        ?>
                        <option value="<?php echo $value['category_id']; ?>"> <?php echo $value['name_en']; ?> </option>
                    <?php }?>
                     </select>

                     <input class="form-control border-0 w-75 p-1 pl-4" type="text" id="product_name" name="product_search"          placeholder="Search Products Here...." aria-label="Search">
                     <button class="btn btn-search" type="button"> <img src="<?php echo base_url('assets/website_assets/images/magnifiying-glass.png');?>"
                           alt=""></button> 

                  </form>
                  <div id="suggesstion-box">
                    <ul id="country-list"></ul>
                </div>
                  <ul class="navbar-nav d-flex align-items-center justify-content-end w-50 rightNav">
                     <li class="nav-item ">
                        <a class="nav-link" href="<?php echo base_url('landing/FAQ'); ?>">FAQ </a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#">Contact </a>
                     </li>
                     <div class="d-flex align-items-center ml-4">
                        <span class="nav-item">
                          <?php          
                             $userdata1 = $this->session->userdata("logged_in");
                             if(empty($userdata1['user_id'])) { ?>
                                <a class="nav-link" href="<?php echo base_url('User/login'); ?>">
                                Login/Signup
                                </a>
                            <?php }else{?>
                                <a class="nav-link" href="<?php echo base_url('User/dashboard'); ?>" style="text-transform: uppercase; " >
                                <b>[<?php echo $userdata1['user_name'];?>] </b>
                                </a>
                            <?php }?>
                        </span>
                        <span class="cart">
                           <img src="<?php echo base_url('assets/website_assets/images/shopping-cart.png');?>" alt="">
                           <span class="cartvalue">0</span>
                        </span>
                     </div>
                  </ul>
               </div>
         </nav>
         <nav class="navbar navbar-expand-lg navbar-light p-0">
            <div class="collapse navbar-collapse menuHeader" id="navbarTogglerDemo01">

               <ul class="navbar-nav w-100 justify-content-between">
                  <li class="nav-item active">
                     <a class="nav-link" href="<?php echo base_url(); ?>">Home </a>
                  </li>

                <?php 
                    $this->db->select('*');
                    $this->db->from('category');  
                    $this->db->where('status','0');
                    $this->db->limit('5');
                    $query = $this->db->get();        
                    $cat_list =  $query->result_array();
                    foreach($cat_list as $row){
                        // print_r($row);die;
                        $this->db->select('*');
                        $this->db->from('subcategory');  
                        $this->db->where('status','0'); 
                        $this->db->where('categroy_id',$row['category_id']);                     
                        $this->db->limit('4');
                        $query_cat = $this->db->get();  
                        $subcat_list =  $query_cat->result_array();
                    ?> 
                    <li class="nav-item drop-down">
                        <a class="nav-link" href="<?php echo base_url();?>landing/products/maincat/cat/subcat/<?php echo $row['category_id']; ?>"><?php echo $row['name_en'] ?> <i class="fa fa-angle-down"></i></a>
                        <div class="mega-menu fadeIn animated">
                            <div>
                                <div class="row">
                                    <?php  foreach($subcat_list as $rowsubcat){ ?>
                                        <div class="col-sm-3">
                                            <div class="common-submenublock">
                                                <!-- <h4><a href="<?php echo base_url();?>landing/products/maincat/cat/subcat/<?php echo $row['category_id'];  ?>/<?php echo $rowsubcat['subcategory_id']; ?>"><?php echo $rowsubcat['subcategory_name_en']; ?></a></h4> -->
                                                <h4><?php echo $rowsubcat['subcategory_name_en']; ?></h4>
                                                <?php  
                                                    $this->db->select('*');
                                                    $this->db->from('sub_subcategory');   
                                                    $this->db->where('subcategory_id',$rowsubcat['subcategory_id']); 
                                                    $this->db->where('sub_subcategory_status','1');                    
                                                    $this->db->limit('10');
                                                    $query_sub = $this->db->get();  
                                                    $sub_list =  $query_sub->result_array();
                                                    foreach($sub_list as $rowsub){ ?>
                                                        <ul>
                                                           <li><a href="<?php echo base_url();?>landing/products/maincat/cat/subcat/<?php echo $row['category_id'];  ?>/<?php echo $rowsubcat['subcategory_id']; ?>/<?php echo $rowsub['sub_subcategory_id'] ?>"><?php echo $rowsub['sub_subcategory_name'] ?></a></li>
                                                        </ul>
                                                    <?php } ?>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <div class="col-sm-3">
                                        <div class="menuimageblock">
                                             <img style="height: 300px; width: 300px;" src="<?php echo base_url('assets/images/category/'.$row['image']);?>">
                                        </div>
                                    </div>
         
                                </div>
                            </div>
                        </div> 
                    </li>
                <?php } ?>

                  <li class="nav-item ">
                     <a class="nav-link" href="#">Blogs </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#"> Contact Us </a>
                  </li>
               </ul>


            </div>

         </nav>
      </div>
       <!-- cart-pannel -->
       <div class="cart-screen"></div>
          <div class="li-cart-summary-wrapper">
             <div class="new-cart ">
                <div class="li-cart-header">
                  <div class="header">Cart Details
                  </div>
                  <div class="close">CLOSE
                  </div>
                </div>

                 <div class="li-cart-container">
                      <!-- <//item-available start -->
                       <div class="item-available">
                            <ul class="mini_cart">
                                <li class="prd-pr_57234c427648b append_data"> 
                                </li>
                            </ul>
                       </div>
                          <!-- //item-available end-->

                        <!-- //checkout proceed container start -->
                        <div class="checkout-proceed-wrapper">
                             <div class="checkout-wrapper clearfix">
                               <div class="amount"><div class="pay-amt"><span class="total pay">Total : </span><span class="rupees carttotal text-red rupee">0</span></div><div class="delivery-charges"><span class="delivery-text">Delivery Charge:</span><span class="delivery-pay rupee"> 39</span></div></div>

                               <div class="checkout-proceed">
                                   <a href="<?php echo base_url('landing/checkout'); ?>">  <button class="btn btn-theme">Procedd to Checkout</button></a>

                               </div> 
                             </div>
                             <div class="li-cart-message" style="display: block;"><span>Congratulations!, You've saved ₹35</span></div> 
                        </div>

                        <!-- //cart empty screen -->
                       <div class="cart-empty-wrapper" style="display: none;">
                          <div class="cart-empty-container">
                            <img src="https://d2407na1z3fc0t.cloudfront.net/Banner/empty-cart-icon.png">
                            <div class="cart-empty-text">
                              Your cart awaits your next meal
                            </div> 
                            <div class="continue-cta">
                              <button class="continue-btn shopping">Continue Shopping</button>
                            </div>
                          </div>  
                       </div> 
                    <!-- //cart empty screen end -->
                 </div>
              </div>
          </div>

        <!-- cart-pannel -->
   </header>

<style>

.frmSearch {border: 1px solid #a8d4b1;
background-color: #c6f7d0;
margin: 2px 0px;
padding: 40px;
border-radius:4px;
}
#country-list{
margin-left: -466px;
float:left;
list-style:none;
margin-top:34px;
padding:0;
width:260px;
position: absolute;
z-index: 777;
}
#country-list li{
padding: 5px 7px; 
background: #f0f0f0; 
border-bottom: #bbb9b9 1px solid;
text-transform: uppercase;
text-align: center;
position: relative;
top: 11px;
}
#country-list li:hover{
background:#ece3d2;
cursor: pointer;
}
#search-box{
padding: 10px;
border: #a8d4b1 1px solid;
border-radius:4px;
}
#hotel_name{
text-transform: capitalize;
}

</style>
