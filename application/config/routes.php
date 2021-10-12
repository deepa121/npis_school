<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Landing';
// $route['default_controller'] = 'admin/Dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;


//admin login
$route['Login'] 	       	       = 'admin/Login/index';
$route['Login/doLogin'] 	       	       = 'admin/Login/doLogin';
$route['Login/logout'] 	       	       = 'admin/Login/logout';

//dashboard and change password
$route['Dashboard'] 	     = 'admin/Dashboard/index';
$route['Change-Password'] 	 = 'admin/Dashboard/ChangePassword';
$route['profile'] 	         = 'admin/Dashboard/profile';
$route['Dashboard/doChangepassword'] 	 = 'admin/Dashboard/doChangepassword';

//Category
$route['Category']          	  = 'admin/Category/categoryView';
$route['AddCategory']             = 'admin/Category/AddCategory';
$route['EditCategory/(:num)']     = 'admin/Category/EditCategory/$1';
$route['CategoryStatus/(:num)']   = 'admin/Category/CategoryStatus/$1';


//Sub Category
$route['Subcategory']          	  = 'admin/Subcategory/subcategoryView';
$route['AddSubCategory']          = 'admin/Subcategory/AddSubCategory';
$route['EditSubCategory/(:num)']  = 'admin/Subcategory/EditSubCategory/$1';
$route['DeleteSubCategory/(:num)']  = 'admin/Subcategory/DeleteSubCategory/$1';
$route['SubCategoryStatus/(:num)/(:num)']   = 'admin/Subcategory/SubCategoryStatus/$1/$2';







//Sub Sub-Category
$route['Sub-Subcategory']          	  = 'admin/Sub_subcategory/subcategoryView';
$route['AddSub-SubCategory']          = 'admin/Sub_subcategory/AddSubCategory';
$route['EditSub_SubCategory/(:num)']  = 'admin/Sub_subcategory/EditSubCategory/$1';
$route['DeleteSub_SubCategory/(:num)']  = 'admin/Sub_subcategory/DeleteSubCategory/$1';
$route['Sub_SubCategoryStatus/(:num)/(:num)']   = 'admin/Sub_subcategory/SubCategoryStatus/$1/$2';







//Slider
$route['Slider']          	  	= 'admin/Slider/index';
$route['AddSlider']             = 'admin/Slider/addSlider';
$route['EditSlider/(:num)']     = 'admin/Category/EditSlider/$1';
$route['DeleteSlider/(:num)']   = 'admin/Category/DeleteSlider/$1';

//coupon
$route['coupon']          	  = 'admin/Coupon/coupon';
$route['add_coupon']          = 'admin/Coupon/add_coupon';
$route['edit_coupon/(:num)']  = 'admin/Coupon/edit_coupon/$1';
$route['delete_coupon/(:num)']  = 'admin/Coupon/delete_coupon/$1';

$route['Logo']          	  	= 'admin/Category/logoView';
$route['Addlogo']             = 'admin/Category/Addlogo';
$route['Editlogo/(:num)']     = 'admin/Category/Editlogo/$1';

//User
$route['User']          	  	= 'admin/User/userView';
$route['Reviews']          	  	= 'admin/User/reviews';
$route['reviewStatus/(:num)']     = 'admin/User/reviewStatus/$1';
$route['UserStatus/(:num)']     = 'admin/User/UserStatus/$1';

$route['landing/verify_database']          	  = 'admin/landing/verify_database';
//Page
$route['Page']          	  = 'admin/Page/pageView';
$route['AddPage']             = 'admin/Page/AddPage';
$route['EditPage/(:num)']     = 'admin/Page/EditPage/$1';


//Sub variant variant_view_out_of_stock

$route['variant_view_out_of_stock/(:num)']          = 'admin/Product/variant_view_out_of_stock/$1';
$route['variant/(:num)']          = 'admin/Product/variant/$1';
$route['variantStatus/(:num)']    = 'admin/Product/variantStatus/$1';
$route['Addvariant/(:num)']       = 'admin/Product/Addvariant/$1';
$route['Editvariant/(:num)/(:num)']  = 'admin/Product/Editvariant/$1/$2';

//Delivery Date
$route['delivery_date']                = 'admin/Cart/delivery_date';
$route['add_delivery_date']            = 'admin/Cart/add_delivery_date';
$route['delete_delivery_date/(:num)']  = 'admin/Cart/delete_delivery_date/$1';

//Delivery Time
$route['delivery_time/(:num)']                = 'admin/Cart/delivery_time/$1';
$route['add_delivery_time/(:num)']            = 'admin/Cart/add_delivery_time/$1';
$route['delete_delivery_time/(:num)/(:num)']  = 'admin/Cart/delete_delivery_time/$1/$2';


//Delivery Boy
$route['DeliveryBoy']          	  = 'admin/DeliveryBoy/DeliveryBoyView';
$route['AddDeliveryBoy']             = 'admin/DeliveryBoy/AddDeliveryBoy';
$route['EditDeliveryBoy/(:num)']     = 'admin/DeliveryBoy/EditDeliveryBoy/$1';
$route['DeliveryBoyStatus/(:num)']   = 'admin/DeliveryBoy/DeliveryBoyStatus/$1';
$route['OADeliveryBoy']             = 'admin/DeliveryBoy/OADeliveryBoy';
$route['OrderAssigned']             = 'admin/DeliveryBoy/OrderAssignedView';


//Product
$route['Product']          	  	 = 'admin/Product/productView';
$route['ProductView_outOfStock']   = 'admin/Product/productView_outOfStock';
$route['Stock']          	  	 = 'admin/Product/stockView';
$route['viewstock/(:num)']       = 'admin/Product/viewstock/$1';
$route['AddProduct']             = 'admin/Product/AddProduct';
$route['EditProduct/(:num)']     = 'admin/Product/EditProduct/$1';
$route['ProductStatus/(:num)']   = 'admin/Product/ProductStatus/$1';
$route['ProductStatus_delete/(:num)']   = 'admin/Product/ProductStatus_delete/$1';
$route['ProductSliderImage/(:num)']     = 'admin/Product/ProductSliderImage/$1';
$route['Getsubcategory']    ='admin/Product/getsubcategory';
$route['Getbycat']          ='admin/Product/getbycat';


$route['ProductSliderImage/(:num)']   = 'admin/Product/ProductSliderImage/$1';
$route['Getsubcategory']    ='admin/Product/getsubcategory';
$route['Getsub_subcategory']    ='admin/Product/getsub_subcategory';


//Wishlist
$route['Wishlist']          	= 'Notification/wishlistView';

//Order
//$route['Orderpdf']          = 'Order/Orderpdf';
$route['Order']          	  	= 'admin/Order/orderView';
$route['OrderProduct/(:num)']   = 'admin/Order/OrderProductView/$1';
$route['Orderpdf/(:num)']   = 'admin/Order/Orderpdf/$1';
//settings
$route['settings'] 	           = 'admin/Settings/Settings';


//Address
$route['Address']          	  	= 'admin/Address/addressView';

//Society
$route['Society/(:num)']         = 'admin/Society/societyView/$1';
$route['AddSociety/(:num)']      = 'admin/Society/AddSociety/$1';  
$route['EditSociety/(:num)/(:num)']     = 'admin/Society/EditSociety/$1/$2';

//city
$route['city']          	   = 'admin/Society/city';
$route['add_city']             = 'admin/Society/add_city';
$route['edit_city/(:num)']     = 'admin/Society/edit_city/$1';
$route['city_status/(:num)/(:num)']   = 'admin/Society/city_status/$1/$2';

//attribute
$route['attr']          	   = 'admin/Attr/attr';
$route['add_attr']             = 'admin/Attr/add_attr';
$route['edit_attr/(:num)']     = 'admin/Attr/edit_attr/$1';
$route['attr_status/(:num)/(:num)']   = 'admin/Attr/attr_status/$1/$2';



//Attr_Optn
$route['Attr_Optn']          	  = 'admin/Attr_Optn/Attr_OptnView';
$route['AddAttr_Optn']          = 'admin/Attr_Optn/AddAttr_Optn';
$route['EditAttr_Optn/(:num)']  = 'admin/Attr_Optn/EditAttr_Optn/$1';
$route['DeleteAttr_Optn/(:num)']  = 'admin/Attr_Optn/DeleteAttr_Optn/$1';
$route['Attr_OptnStatus/(:num)/(:num)']   = 'admin/Attr_Optn/Attr_OptnStatus/$1/$2';

//product feature
$route['Feature']          	   = 'admin/Feature/feature';
$route['Add_feature']             = 'admin/Feature/add_feature';
$route['Edit_feature/(:num)']     = 'admin/Feature/Edit_feature/$1';
$route['Feature_status/(:num)/(:num)']   = 'admin/Feature/feature_status/$1/$2';
$route['Delete_feature/(:num)']     = 'admin/Feature/Deletefeature/$1';




