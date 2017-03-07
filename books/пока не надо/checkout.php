<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en" xml:lang="en" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Your Store</title>
<meta name="description" content="My Store" />
<link rel="stylesheet" type="text/css" href="stylesheet/960.css" media="all" />
<link rel="stylesheet" type="text/css" href="stylesheet/screen.css" media="screen" />
<link rel="stylesheet" type="text/css" href="stylesheet/color.css" media="screen" />
<!--[if lt IE 9]>
<link rel="stylesheet" type="text/css" href="stylesheet/ie.css" media="screen" />
<![endif]-->

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/shoppica.js"></script>
<script type="text/javascript">
$(document).ready(function()  {
    if (window.PIE) {
        $('.rounded').each(function() {
            PIE.attach(this);
        });
    }
});
</script>
<script type="text/javascript">
$(function() {
	$("#checkout form").accordion({
		autoHeight: false
	});
});
</script>

</head>

<body class="s_layout_fixed">

<div id="wrapper"> 
  
  <!-- ********************** --> 
  <!--      H E A D E R       --> 
  <!-- ********************** -->
<?php
     require_once '/var/www/html/books/include/header.php';
?>
  <!-- end of header --> 
  
  

  <!-- ********************** --> 
  <!--     I N T R O          -->
  <!-- ********************** --> 

  <div id="intro">
    <div id="intro_wrap">
      <div class="container_12">
        <div id="breadcrumbs" class="grid_12">
          <a href="">Home</a>
          &gt;
          <a href="">Checkout</a>
        </div>
        <h1>Checkout</h1>
      </div>
    </div>
  </div>
  <!-- end of intro -->

  
  <!-- ********************** --> 
  <!--      C O N T E N T     -->
  <!-- ********************** --> 
  <div id="content" class="container_12">

    <div id="checkout" class="grid_12">
    	<form id="checkout_form" class="s_accordion" action="orders.html">
        <h2>Billing details</h2>
        <div>
          <div class="grid_6 alpha">
            <h3><span class="s_secondary_color">Your</span> Personal Details</h3>
            <div class="s_row_2 clearfix">
              <label>First Name: *</label>
              <input type="text" size="30" />
            </div>
            <div class="s_row_2 clearfix">
              <label>Last Name: *</label>
              <input type="text" size="30" />
            </div>
            <div class="s_row_2 clearfix">
              <label>E-Mail: *</label>
              <input type="text" size="30" />
            </div>
            <div class="s_row_2 clearfix">
              <label>Telephone: *</label>
              <input type="text" size="30" />
            </div>
            <div class="s_row_2 s_mb_15 clearfix">
              <label>Fax:</label>
              <input type="text" size="30" />
            </div>
          </div>
          <div class="grid_6 omega">
            <h3><span class="s_secondary_color">Your</span> Address</h3>
            <div class="s_row_2 clearfix">
              <label>Company:</label>
              <input type="text" size="30" />
            </div>
            <div class="s_row_2 clearfix">
              <label>Address 1: *</label>
              <input type="text" size="30" class="required" title="Address 1 must be between 3 and 128 characters!" />
            </div>
            <div class="s_row_2 clearfix">
              <label>Address 2:</label>
              <input type="text" size="30" />
            </div>
            <div class="s_row_2 clearfix">
              <label>City: *</label>
              <input type="text" size="30" class="required" title="City must be between 3 and 128 characters!" />
            </div>
            <div class="s_row_2 clearfix">
              <label id="postcode">Post Code: *</label>
              <input type="text" size="30" class="required" title="Postcode must be between 2 and 10 characters for this country!" />
            </div>
          </div>
          <div class="clear"></div>
          <p><label><input type="checkbox" /> My delivery and billing addresses are the same.</label></p>
          <div class="clear"></div>
          <a class="s_button_1 s_main_color_bgr"><span class="s_text">Step 2 &rsaquo;</span></a>
          <span class="clear"></span>
          <br />
        </div> 
        <h2>Delivery details</h2>
        <div>
          <div class="grid_6 alpha">
            <h3><span class="s_secondary_color">Your</span> Personal Details</h3>
            <div class="s_row_2 clearfix">
              <label>First Name: *</label>
              <input type="text" size="30" />
            </div>
            <div class="s_row_2 clearfix">
              <label>Last Name: *</label>
              <input type="text" size="30" />
            </div>
            <div class="s_row_2 clearfix">
              <label>E-Mail: *</label>
              <input type="text" size="30" />
            </div>
            <div class="s_row_2 clearfix">
              <label>Telephone: *</label>
              <input type="text" size="30" />
            </div>
            <div class="s_row_2 s_mb_15 clearfix">
              <label>Fax:</label>
              <input type="text" size="30" />
            </div>
          </div>
          <div class="grid_6 omega">
            <h3><span class="s_secondary_color">Your</span> Address</h3>
            <div class="s_row_2 clearfix">
              <label>Company:</label>
              <input type="text" size="30" />
            </div>
            <div class="s_row_2 clearfix">
              <label>Address 1: *</label>
              <input type="text" size="30" class="required" title="Address 1 must be between 3 and 128 characters!" />
            </div>
            <div class="s_row_2 clearfix">
              <label>Address 2:</label>
              <input type="text" size="30" />
            </div>
            <div class="s_row_2 clearfix">
              <label>City: *</label>
              <input type="text" size="30" class="required" title="City must be between 3 and 128 characters!" />
            </div>
            <div class="s_row_2 clearfix">
              <label id="postcode">Post Code: *</label>
              <input type="text" size="30" class="required" title="Postcode must be between 2 and 10 characters for this country!" />
            </div>
          </div>
          <div class="clear"></div>
          <p><label><input type="checkbox" /> My delivery and billing addresses are the same.</label></p>
          <div class="clear"></div>
          <a class="s_button_1 s_ddd_bgr left"><span class="s_text">&lsaquo; Step 1</span></a>
          <a class="s_button_1 s_main_color_bgr"><span class="s_text">Step 3 &rsaquo;</span></a>
          <span class="clear"></span>
          <br />
        </div>
        <h2>Shipping Method</h2>
       	<div>
          <p>Please select the preferred shipping method to use on this order.</p>
          <div class="s_row_3 clearfix">
            <label class="s_radio s_shipping_method clearfix" for="citylink.citylink">
              <input type="radio" id="citylink.citylink" checked="checked" />
              <span class="s_desc"><strong>Citylink</strong><br />Citylink  (Weight: 0.00kg) - 11.60<span class="s_currency s_after"> eur</span></span>
            </label>
            <label class="s_radio s_shipping_method clearfix" for="flat.flat">
              <input type="radio" id="flat.flat" />
              <span class="s_desc"><strong>Flat Rate</strong><br />Flat Shipping Rate - 0.00<span class="s_currency s_after"> eur</span></span>
            </label>
            <label class="s_radio s_shipping_method clearfix" for="free.free">
              <input type="radio" id="free.free" />
              <span class="s_desc"><strong>Free Shipping</strong><br />Free Shipping - 0.00<span class="s_currency s_after"> eur</span></span>
            </label>
            <label class="s_radio s_shipping_method clearfix" for="parcelforce_48.parcelforce_48">
              <input type="radio" id="parcelforce_48.parcelforce_48" />
              <span class="s_desc"><strong>Parcelforce 48</strong><br />Parcelforce 48 - 15.99<span class="s_currency s_after"> eur</span></span>
            </label>
            <label class="s_radio s_shipping_method clearfix" for="item.item">
              <input type="radio" id="item.item" />
              <span class="s_desc"><strong>Per Item</strong><br />Per Item Shipping Rate - 0.00<span class="s_currency s_after"> eur</span></span>
            </label>
            <label class="s_radio s_shipping_method clearfix" for="pickup.pickup">
              <input type="radio" id="pickup.pickup" />
              <span class="s_desc"><strong>Pickup</strong><br />Pickup From Store - 0.00<span class="s_currency s_after"> eur</span></span>
            </label>
            <label class="s_radio s_shipping_method clearfix" for="royal_mail.airmail">
              <input type="radio" id="royal_mail.airmail" />
              <span class="s_desc"><strong>Royal Mail</strong><br />Airmail (Weight: 0.00kg) (Estimated Time:) - 1.31<span class="s_currency s_after"> eur</span></span>
            </label>
            <label class="s_radio s_shipping_method clearfix" for="royal_mail.international_signed">
              <input type="radio" id="royal_mail.international_signed" />
              <span class="s_desc"><strong>Royal Mail</strong><br />International Signed (Weight: 0.00kg) (Estimated Time:) - 4.91<span class="s_currency s_after"> eur</span></span>
            </label>
            <label class="s_radio s_shipping_method clearfix" for="royal_mail.surface">
              <input type="radio" id="royal_mail.surface" />
              <span class="s_desc"><strong>Royal Mail</strong><br />Surface (Weight: 0.00kg) (Estimated Time:) - 0.91<span class="s_currency s_after"> eur</span></span>
	          </label>
          </div>
          <div class="clear"></div>
          <h3><span class="s_secondary_color">Order</span> comments</h3>
          <div class="s_row_3 clearfix">
            <textarea rows="8" style="width: 99%;"></textarea>
          </div>
          <div class="s_row_3 clearfix">
            <label class="s_checkbox"><input type="checkbox" /> I have read and agree to the Terms &amp; Conditions</label>
          </div>
          <div class="clear"></div>
          <a class="s_button_1 s_ddd_bgr left"><span class="s_text">&lsaquo; Step 2</span></a>
          <a class="s_button_1 s_main_color_bgr"><span class="s_text">Step 4 &rsaquo;</span></a>
          <span class="clear"></span>
          <br />
        </div>
        <h2 class="s_last">Payment Method</h2>
       	<div class="s_last">
          <p>Please select the preferred payment method to use on this order.</p>
          <div class="s_row_3 clearfix grid_7 alpha">
            <label class="s_radio s_shipping_method clearfix">
              <input type="radio" id="alertpay" checked="checked" />
              <strong>Credit Card / Debit Card (AlertPay)</strong>
            </label>
            <label class="s_radio s_shipping_method clearfix">
              <input type="radio" id="authorizenet_aim" />
              <strong>Credit Card / Debit Card (Authorize.Net)</strong>
            </label>
            <label class="s_radio s_shipping_method clearfix">
              <input type="radio" id="cod" />
              <strong>Cash On Delivery</strong>
            </label>
          </div>
          <div class="clear"></div>
          <h3><span class="s_secondary_color">Order</span> comments</h3>
          <div class="s_row_3 clearfix">
            <textarea rows="8" style="width: 99%;"></textarea>
          </div>
          <div class="s_row_3 clearfix">
            <label class="s_checkbox"><input type="checkbox" /> I have read and agree to the Terms &amp; Conditions</label>
          </div>
          <div class="clear"></div>
          <a class="s_button_1 s_ddd_bgr left"><span class="s_text">&lsaquo; Step 3</span></a>
          <a class="s_button_1 s_main_color_bgr" onclick="$('#checkout_form').submit();"><span class="s_text">Finish</span></a>
          <span class="clear"></span>
          <br />
        </div>
      </form>
    </div>
   
  </div>
  <!-- end of content -->
  
  <!-- ********************** --> 
  <!--   S H O P   I N F O    --> 
  <!-- ********************** --> 
<?php
     require_once '/var/www/html/books/include/shopinfo.php';
?>
  <!-- end of shop info --> 
  
  
  
    <!-- ********************** --> 
  <!--      F O O T E R       --> 
  <!-- ********************** --> 
<?php
     require_once '/var/www/html/books/include/footer.php';
?>
  <!-- end of FOOTER --> 
  
</div>

<?php
     require_once '/var/www/html/books/include/fb-root.php';
?>

</body>
</html>
