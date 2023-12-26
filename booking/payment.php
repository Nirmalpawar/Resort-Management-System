 <div id="accom-title"  > 
    <div  class="pagetitle">   
            <h1 >Billing Details 
                 
            </h1> 
        </div> 
  </div>
 
<div id="bread">
   <ol class="breadcrumb">
      <li><a href="<?php echo WEB_ROOT ;?>index.php">Home</a> </li> 
      <li><a href="<?php echo WEB_ROOT ;?>booking/">Booking Cart</a></li> 
      <!-- <li  ><a href="<?php echo WEB_ROOT ;?>booking/index.php?view=logininfo">Verify Accounts</a></li> -->
       <li class="active">Booking Details</li>
   </ol> 
</div> 


<form action="index.php?view=payment" method="post"  name="personal" >

 
<div class="col-md-12">

  <div class="row">
    <div class="col-md-8 col-sm-4">
       <div class="col-md-12">
          <label>Name:</label>
          <?php echo $_SESSION['name'] . ' '. $_SESSION['last'];  
           ?>
        </div>
        <div class="col-md-12">
          <label>Address:</label>
          <?php echo isset($_SESSION['city']) ? $_SESSION['city']: ' '. ' ' . (isset($_SESSION['address'])  ? $_SESSION['address'] : ' '); ?> 
        </div>
        <div class="col-md-12"> 
        <label>Phone #:</label>
         <?php echo $_SESSION['phone'] ; ?>
        </div>
    </div> 
    <div class="col-md-4 col-sm-2">
      <div class="col-md-12">
        <label>Transaction Date:</label>
       <?php echo date("m/d/Y") ; ?>
      </div> 
      
    </div>
  </div> 
  <br/>




<div class="row">
  <div class="table-responsive">
    <table class="table" style="">
      <thead>
        <tr>
          <td>Room</td>
          <td>Arrival</td>
          <td>Departure</td>
          <td>Price</td>
          <td>Night(s)</td>
          <td>Subtotal</td>
        </tr>
      </thead> 
      <tbody>
<?php
$payable = 0;
if (isset( $_SESSION['monbela_cart'])){ 
$count_cart = count($_SESSION['monbela_cart']);


for ($i=0; $i < $count_cart  ; $i++) {  

  $query = "SELECT * FROM `tblroom` r ,`tblaccomodation` a WHERE r.`ACCOMID`=a.`ACCOMID` AND ROOMID=" . $_SESSION['monbela_cart'][$i]['monbelaroomid'];
   $mydb->setQuery($query);
   $cur = $mydb->loadResultList(); 
    foreach ($cur as $result) { 


?>

      
        <tr>
          <td><?php echo  $result->ROOM.' '. $result->ROOMDESC; ?></td>
          <td><?php echo  date_format(date_create( $_SESSION['monbela_cart'][$i]['monbelacheckin']),"m/d/Y"); ?></td>
          <td><?php echo  date_format(date_create( $_SESSION['monbela_cart'][$i]['monbelacheckout']),"m/d/Y"); ?></td>
          <td><?php echo  ' &#8369 '. $result->PRICE; ?></td>
          <td><?php echo   $_SESSION['monbela_cart'][$i]['monbeladay']; ?></td>
          <td><?php echo ' &#8369 '.   $_SESSION['monbela_cart'][$i]['monbelaroomprice']; ?></td>
        </tr>
<?php
       $payable += $_SESSION['monbela_cart'][$i]['monbelaroomprice'] ;
      }

    } 
     $_SESSION['pay'] = $payable;
 } 
 ?> 
      </tbody>
    </table>
  </div> 
</div>

  

 
<!-- <div class="row">
  <div class="col-md-6 col-sm-3">
      <label>Addons:</label>
        <div class="col-md-12">
           <label>Bed:</label>
        </div>
        <div class="col-md-12">
           <label>Person:</label>
        </div>
        <div class="col-md-12">
          
        </div>
        <div class="col-md-12">
          
        </div>
  </div>
<div class="col-md-6 col-sm-3"></div> 
</div>
<hr/> -->

<div class="row"> 
  <h3 align="right">Total: &#8369 <?php echo   $_SESSION['pay'] ;?></h3>
</div>
    <!-- <div class="pull-right">
       <button type="submit" class="btn btn-primary" align="right" name="btnsubmitbooking">Submit Booking</button>
    </div> -->
  </div>   
</form>

<form method="post" action="https://www.sandbox.paypal.com/cgi-bin/webscr">
   <!-- <input type="hidden" value="sb-imybb5187239@business.example.com" name="business"> -->
   <input type="hidden" value="tubigangarden@resort.com" name="business">
  <!-- Specify a Buy Now button. -->
  <input type="hidden" value="_xclick" name="cmd">
  <input type="hidden" value="Partial Payments" name="item_name">
  <!-- <input type="hidden" value="22.16" name="amount"> -->
  <input type="hidden" id="partial" value="<?php echo   $_SESSION['pay'] ;?>" name="amount">
  <!-- <input type="hidden" name="currency_code" value="USD"> -->
  <input type="hidden" name="currency_code" value="PHP">
  <!-- <input type="hidden" value="item_number" name="item_number"> -->
  <!-- <input type="hidden" name="return" value="http://localhost/TubiganGarden/index.php?view=payment&btnsubmitbooking=true"> -->

  <input type="hidden" name="return" value="<?php echo SITE_ROOT ?>booking/processpayment.php">
  <input type="hidden" name="cancel_return" value="http://localhost/TubiganGarden/index.php">
  <!-- Display the payment button. -->
  <input type="image" style="height:100px;" name="submit" id="btnpay" border="0" src="<?php echo WEB_ROOT;?>images/Make-a-Payment-button.png" alt="PayPal - The safer, easier way to pay online">
  <img alt="" border="0" width="1" height="1" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
</form> 

 



