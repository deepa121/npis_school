
      <footer class="footer">
         <img src="<?php echo base_url('assets/website_assets/images/footerBanner.png');?>" alt="" class="w-100" data-aos="fade-up">
         <div class="container1440">
            <div class="row ">
               <div class="col-md-3 mt-5 linksFooter">
                  <figure>
                     <img src="<?php echo base_url('assets/website_assets/images/logo.png');?>" alt="">
                  </figure>
                  <p class="w-75">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                     has been the
                     industry's standard dummy text ever since the 1500s</p>
               </div>
               <div class="col-md-2">
                  <div class="linksFooter">
                     <h6>Quick Links
                     </h6>
                     <ul>
                        <li>
                           <a href="#">
                              - Home
                           </a>
                        </li>
                        <li>
                           <a href="#">
                              - Mattress
                           </a>
                        </li>
                        <li>
                           <a href="#">
                              - Pillows
                           </a>
                        </li>
                        <li>
                           <a href="#">
                              - Sale
                           </a>
                        </li>
                        <li>
                           <a href="#">
                              - Sleep Accessories
                           </a>
                        </li>
                        <li>
                           <a href="#">
                              - New Arrival
                           </a>
                        </li>
                        <li>
                           <a href="#">
                              - Blogs
                           </a>
                        </li>
                        <li>
                           <a href="#">
                              - FAQ
                           </a>
                        </li>
                        <li>
                           <a href="#">
                              - Contact Us
                           </a>
                        </li>
                     </ul>
                  </div>
               </div>
               <div class="col-md-2">
                  <div class="linksFooter">
                     <h6>Support
                     </h6>
                     <ul>
                        <li>
                           <a href="#">
                              - Privacy & Security
                           </a>
                        </li>
                        <li>
                           <a href="#">
                              - Terms & Conditions
                           </a>
                        </li>
                        <li>
                           <a href="#">
                              - Return Policy

                           </a>
                        </li>
                        <li>
                           <a href="#">
                              - Warranty Policy
                           </a>
                        </li>
                        <li>
                           <a href="#">
                              - Warranty Registration
                           </a>
                        </li>
                        <li>
                           <a href="#">
                              - Contact Us
                           </a>
                        </li>
                     </ul>
                  </div>
               </div>
               <div class="col-md-2">
                  <div class="linksFooter">
                     <h6>locate us
                     </h6>
                     <p>
                        WZ 2/1, 2nd Floor, Hari Singh Park,
                        Multan Nagar, Paschim Vihar,
                        New Delhi, India- 110056

                     </p>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="linksFooter">
                     <h6>Contact Us
                     </h6>
                     <p>Email: hello@duropillo.com</p>
                     <p>Call: (+91) 89-2068-5898 (IN)</p>
                     <p><b>Subscribe to Stay Connected</b></p>

                     <form class="form-inline subscribe">
                        <input class="form-control p-1 pl-2" type="search" placeholder="Email Address"
                           aria-label="Search">
                        <button class="btn btn-search text-white" type="button">
                           Subscribe
                        </button>
                     </form>

                  </div>
               </div>
            </div>

         </div>
      </footer>
      <div class="copyrightFooter">
         <div class="container1440">
            <div class="row align-items-center">
               <div class="col-md-4">
                  © DreamOn 2021. All Rights Reserved
               </div>
               <div class="col-md-4 text-center">
                  <a href="#">
                     <img src="<?php echo base_url('assets/website_assets/images/f4.png');?>" alt="">
                  </a>
                  <a href="#">
                     <img src="<?php echo base_url('assets/website_assets/images/f3.png');?>" alt="">
                  </a>
                  <a href="#">
                     <img src="<?php echo base_url('assets/website_assets/images/f2.png');?>" alt="">
                  </a>
                  <a href="#">
                     <img src="<?php echo base_url('assets/website_assets/images/f1.png');?>" alt="">
                  </a>
               </div>
               <div class="col-md-4">
                  <img src="<?php echo base_url('assets/website_assets/images/f2-c.png');?>" alt="" class="w-100">
               </div>
            </div>
         </div>
      </div>
   </main>
   <!-- JavaScript Libraries -->
   <!-- <script src="<?php echo base_url();?>assets/js/jq.min.js"></script> -->
<!-- <script type="text/javascript" src="<?php echo base_url("assets/website_assets/js/jquery-3.4.1.slim.min.js");?>"></script> -->
   <script type="text/javascript" src="<?php echo base_url("assets/website_assets/js/jquery1.min.js");?>"></script>
   <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
   <script type="text/javascript" src="<?php echo base_url("assets/website_assets/js/popper.min.js");?>"></script>
   <script type="text/javascript" src="<?php echo base_url("assets/website_assets/js/bootstrap.min.js");?>"></script>
   <script type="text/javascript" src="<?php echo base_url("assets/website_assets/js/main.js");?>"></script>
   <script type="text/javascript" src="<?php echo base_url("assets/website_assets/js/aos.js");?>"></script>
   <script type="text/javascript" src="<?php echo base_url("assets/website_assets/js/owl.carousel.min.js");?>"></script>
   <script src="<?= base_url();?>assets/js/customFunction.js"></script>
     <script src="<?php echo base_url();?>assets/website_assets/js/sweetalert.js?"></script>
     <script src="<?php echo base_url();?>assets/website_assets/js/sweetalert.min.js?"></script>
   <script>


 $( document ).ready(function() {
    mini_cart();
 });
      $('.dealSec-carousel').owlCarousel({
         loop: true,
         margin: 30,
         responsiveClass: true,
         autoplay: true,
         lazyLoad: true,
         nav: true,
         dots:false,
         responsive: {
            0: {
               items: 1,
               nav: true
            },
            600: {
               items: 3,
               nav: false
            },
            1000: {
               items: 4,
            }
         }
      })
   </script>
   <script>
      $('.featured-carousel').owlCarousel({
         loop: true,
         margin: 30,
         responsiveClass: true,
         autoplay: true,
         lazyLoad: true,
         nav: true,
        dots: false,
         responsive: {
            0: {
               items: 1,
               nav: true
            },
            600: {
               items: 3,
               nav: false
            },
            1000: {
               items: 3,
            }
         }
      })
   </script>
   <script>
      $('.owl-carousel').owlCarousel({
         loop: true,
         //  margin:10,
         responsiveClass: true,
         autoplay: true,
         lazyLoad: true,
         nav: true,
         responsive: {
            0: {
               items: 1,
               nav: true
            },
            600: {
               items: 1,
               nav: false
            },
            1000: {
               items: 1,
            }
         }
      })
   </script>
   <script>
      AOS.init({
         duration: 1200,
      })
   </script>
    <script type="text/javascript">
       
        function checksize(size_id,product_id){
            // alert(size_id);
            var url="landing/checksize"
            data={size:size_id,product_id:product_id};
            var pro = viewDetailsByData(data,url);
            pro.then(function (suc){
            obj = $.parseJSON(suc);
                if(obj['product'].length==undefined){
                    console.log(error);
                }else{
                $('.list_price').html(obj.list_price);
                $('.price').html('Price: ₹'+obj.price+ '/-');
                $('#dimen').remove();
                    $('#dimension .append_data').remove();
                    var  prodata = ''
                    for(x=0;x<obj['product'].length;x++){
                        var prodata = '<div class="size-input append_data" >'+
                                    '<input type="radio" onclick="checkdimension('+obj['product'][x].product_id+','+obj['product'][x].size+','+obj['product'][x].dimension+')" value="'+obj['product'][x].dimension+'"  name="dimension" class="variant__input" id="dim'+obj['product'][x].dimension+'" required>'+
                                    '<label for="dim'+obj['product'][x].dimension+'" class="sizelabel">'+obj['product'][x].optn_name+'</label>'+
                                '</div>';
                    $('#dimension').append(prodata);
                    }
                }
                
                // console.log(prodata);
                // $('#dimen').remove();
                // $('#dimen').html(prodata);
                // $('#dimension').append(prodata);
            });
        }
      function checkdimension(product_id,size_id,dimension_id){
        // alert(product_id);
        var url="landing/getthickness"
        data={product_id:product_id,size:size_id,dimension:dimension_id};
        var pro = viewDetailsByData(data,url);
        pro.then(function (suc){
            obj = $.parseJSON(suc);
            $('.list_price').html(obj.list_price);
            $('.price').html('Price: ₹'+obj.price+ '/-');
                if(obj['product'].length==undefined){
                    console.log(error);
                }else{
                $('.thick').remove();
                    $('.thickness .append_data').remove();
                    var  prodata = ''
                    for(x=0;x<obj['product'].length;x++){
                        var prodata = '<div class="size-input append_data" >'+
                                    '<input type="radio" onclick="checkthickness('+obj['product'][x].product_id+','+obj['product'][x].dimension+','+obj['product'][x].size+','+obj['product'][x].thickness+')" value="'+obj['product'][x].thickness+'"  name="thickness" class="variant__input" id="thick'+obj['product'][x].thickness+'" required>'+
                                    '<label for="thick'+obj['product'][x].thickness+'" class="sizelabel">'+obj['product'][x].optn_name+'</label>'+
                                '</div>';
                    $('.thickness').append(prodata);
                    }
                }
                
                // console.log(prodata);
                // $('#dimen').remove();
                // $('#dimen').html(prodata);
                // $('#dimension').append(prodata);
            });
      }
      function checkthickness(product_id,dimension_id,size_id,thickness_id){
        // alert(id);
        var url="landing/getthickprice"
        data={product_id:product_id,size:size_id,dimension:dimension_id,thickness:thickness_id};
        var pro = viewDetailsByData(data,url);
        pro.then(function (suc){
            obj = $.parseJSON(suc);
            $('.list_price').html(obj.list_price);
            $('.price').html('Price: ₹'+obj.price+ '/-');
            var dimen =obj['dimension'].optn_name;
            // $('.buttonblock').remove();

            $('.buttonblock .addcart').remove();
            $('.buttonblock .buynow').remove();
            var html= '<button onclick="addtocart('+obj['product'][0].product_id+','+obj['product'][0].variant_id+','+"obj['dimension'].optn_name"+','+"obj['size'].optn_name"+','+"obj['thickness'].optn_name"+')" class="btn btn-blue addcart">Add To Cart</button>'+
            '<button onclick="buynow('+obj['product'][0].product_id+','+obj['product'][0].variant_id+','+"obj['dimension'].optn_name"+','+"obj['size'].optn_name"+','+"obj['thickness'].optn_name"+')" class="btn btn-yellow buynow"> Buy Now</button>';
            $('.buttonblock').html(html);
        });
      }

      function addtocart(product_id,variant_id,dimension,size,thickness){
        var url="cartcontroller/addtocart"
        var qty = $("#qty").val();
        data={product_id:product_id,variant_id:variant_id,size:size,dimension:dimension,thickness:thickness,qty:qty};
        var pro = viewDetailsByData(data,url);
        pro.then(function (suc){
            obj = $.parseJSON(suc);
            swal({
            title: "Item Added In cart",
            showConfirmButton: false,
            timer: 1000
          });
             mini_cart();
        });
      }

    function mini_cart(){
       var url="cartcontroller/getcart"
       var pro = viewGridView(url);
        pro.then(function (suc){
          var  obj = $.parseJSON(suc);
            // mini_cart(obj);
        // console.log(obj);
        // console.log(typeof obj['cart']);
        // console.log(Object.keys(obj['cart']).length);
        // console.log(obj['cart']['5bfd3b6fee3ae175e969106e274d2f33']);

        $('.mini_cart .append_data').remove();
        if(Object.keys(obj['cart']).length==0){
                $('.mini_cart').append("<div class='row append_data'><div class='col-md-12'><strong style='margin-left: 33%;color: red;'> No item in your cart </strong></div></div>");
            }else{
                var item = Object.keys(obj['cart']).length;
                var total = obj['total'];

                $('.carttotal').html(total);
                // console.log(total);
                $('.cartvalue').html(item);
                $.each(obj['cart'], function(key,value){
                    var row = key;
                    console.log("key :", typeof(row));
                    var imageUrl = base_url+'assets/images/products/'+value.pro_image;
                    var content = '<li class="prd-pr_57234c427648b append_data">'+
                                        '<div class="cartproduct">'+
                                           '<div class="cartproductimg" style="height: 100px; width:100px;">'+
                                               '<img src="'+imageUrl+'">'+
                                           '</div>'+
                                           '<div class="cartdetails">'+
                                                '<div class="item-desc">'+
                                                   '<div class="item-name">'+value.name+'</div>'+
                                                    '<div class="d-flex justify-content-between">'+
                                                     '<div>'+
                                                        '<div class="sizeblock"><span>'+value.options.size_name+'</span><span>'+value.options.dimension_name+'</span><span>'+value.options.thickness_name+'</span></div>'+
                                                       '<div class="qnt">Qty : <span> '+value.qty+'</span></div>'+
                                                       '<div class="rprice"><span  class="pf-strike">₹'+value.list_price+'</span></div>'+
                                                       '<div class="oprice"><span class="txt-green">₹'+value.price+'</span></div>'+
                                                     '</div>'+
                                                  '</div>'+
                                                  '<span class="close" onclick="remove_cart(\''+row+'\')"></span>'+
                                                  '<div class="monewidhlist"><a href="javascript:;">Move to Wishlist</a></div>'+
                                                '</div>'+
                                           '</div>'+
                                       '</div>'+
                                    '</li>';
                    $('.mini_cart').append(content);
                });
            }
        });
   }

   function remove_cart(rowId){
      //alert(rowId);
       console.log("rowId :", typeof(rowId));
        var url="cartcontroller/remove_cart"
        data={key:rowId};
        var pro = viewDetailsByData(data,url);
        pro.then(function (suc){
            obj = $.parseJSON(suc);
             mini_cart();
        });
      }




      function buynow(product_id,variant_id,dimension,size,thickness){
        var url="cartcontroller/buynow"
        var qty = $("#qty").val();
        data={product_id:product_id,variant_id:variant_id,size:size,dimension:dimension,thickness:thickness,qty:qty};
        var pro = viewDetailsByData(data,url);
        pro.then(function (suc){
            var urll = "<?php echo base_url(); ?>landing/checkout";  
         $(location).attr('href',urll);
            obj = $.parseJSON(suc);
          //   swal({
          //   title: "Item Added In cart",
          //   showConfirmButton: false,
          //   timer: 1000
          // });
             // mini_cart();
        });
      }




  function editAddress(address_id){
    lockModal('editaddress')
    showModal('editaddress')
     $.post(base_url + 'User/editAddress',{address_id:address_id})
    .done(function(response){
      obj = $.parseJSON(response);
      $('#u_name').val(obj[0].u_name);
      $('#u_email').val(obj[0].u_email);
      $('#u_number').val(obj[0].u_number);
      $('#alt_mobile').val(obj[0].alt_mobile);
      $('#city').val(obj[0].city);
      $('#state').val(obj[0].state);
      $('#landmark').val(obj[0].landmark);
      $('#pincode').val(obj[0].pincode);
      $('#address').val(obj[0].address);
      $('#address_id').val(obj[0].address_id);
      setTimeout(function(){
        
      },1000)
    })
  }

    </script>








<script> 
       
   $("#product_name").keyup(function(){
      var catid = $(".search_cat").val();
      if($(this).val()!=''){   
          var keyword = ''+$(this).val();
          $.ajax({
              type: "POST",
              url: "<?php echo base_url('landing/autocompletesearch'); ?>",
              data: {keyword:keyword,catid:catid},
              success: function(data) {
                  // console.log(data.length);
                  if (data.length >0) {
                      $("#suggesstion-box ul").html('');
                      $("#suggesstion-box").show();
                      $.each(data, function(i, data){
                               var link = "<?php echo base_url(); ?>"+'landing/product_detail/'+ data.pro_id;
                              var html =  
                                          '<a href="'+link+'">'+
                                          '<li>'+data.search+'</li>'+
                                          '</a>';
                                      
                              $('#suggesstion-box ul').append(html);
                      });
                  }else{
                      $("#suggesstion-box").hide();
                  }
              }
          });
      }else{
          $("#suggesstion-box").hide();   
      }
   });
</script>










</body>

</html>