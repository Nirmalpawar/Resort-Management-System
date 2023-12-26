<?php 

if (!isset($_SESSION['monbela_cart'])) {
  # code...
  redirect(WEB_ROOT.'index.php');
}



 ?>
 <!-- title  -->

 <div id="accom-title"  > 
    <div  class="pagetitle">   
            <h1  >Your Booking Cart 
                 
            </h1> 
     </div> 
  </div>
<div id="bread">
   <ol class="breadcrumb">
      <li><a href="<?php echo WEB_ROOT ;?>index.php">Home</a>
      </li>
      <li><a href="<?php echo WEB_ROOT ;?>booking/">Booking Cart</a></li>

      <li class="active">Verify Accounts</li>
   </ol> 
</div>  
<!-- end title -->
<!-- ================================================================ --> 
<!-- content --> 
      <!-- verify accounts -->
      <div class="col-md-12">
          <!-- Verify accounts --> 
                <ul id="myTab" class="nav nav-tabs">
                    <li class="active"><a href="#service-one" data-toggle="tab"><i class="fa fa-lock"></i> Login</a>
                    </li>
                    <li class=""><a href="#service-two" data-toggle="tab"><i class="fa fa-user"></i> Register</a>
                    </li>
                    
                </ul>
                
          <div class="col-md-12">
              <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade active in" id="service-one"> 
                      <br/>
                    <?php echo logintab(); ?>
                    </div>

                    <div class="tab-pane fade" id="service-two">
                        <!-- <h4>Service Two</h4> -->
                      <?php  require_once 'personalinfo.php'; ?>
                       <!--  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae repudiandae fugiat illo cupiditate excepturi esse officiis consectetur, laudantium qui voluptatem. Ad necessitatibus velit, accusantium expedita debitis impedit rerum totam id. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus quibusdam recusandae illum, nesciunt, architecto, saepe facere, voluptas eum incidunt dolores magni itaque autem neque velit in. At quia quaerat asperiores.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae repudiandae fugiat illo cupiditate excepturi esse officiis consectetur, laudantium qui voluptatem. Ad necessitatibus velit, accusantium expedita debitis impedit rerum totam id. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus quibusdam recusandae illum, nesciunt, architecto, saepe facere, voluptas eum incidunt dolores magni itaque autem neque velit in. At quia quaerat asperiores.</p>
                 --> 
                 
                    </div>
                    
                </div> 
          </div>
              
 
        </div> 

      <!-- end verify accounts  -->
 


 

 <?php

  function logintab(){

    ?>  
  <div class="col-md-12">
    <form action="<?php echo  WEB_ROOT."login.php" ?>" method="post">
      <!-- <div class="form-group has-feedback"> -->
        <input type="text" class="form-control" name="username" placeholder="Username">
        <span class="glyphicon glyphicon-user form-control-feedback" style="float: right;margin-top: -25px;margin-right: 10px;margin-bottom: 30px;"></span>
      <!-- </div> -->
      <!-- <div class="form-group has-feedback"> -->
        <input type="password" class="form-control" name="pass" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback" style="float: right;margin-top: -25px;margin-right: 10px;margin-bottom: 30px;"></span>
      <!-- </div> -->
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name="gsubmit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form> 
</div>
 
 

<?php
  }

function listofbooking(){



$payable = 0;
if (isset( $_SESSION['monbela_cart'])){ 
$count_cart = count($_SESSION['monbela_cart']);

?>
      <!-- list -->
<div class="row">
<div class="col-md-4">

     <div style="overflow:scroll;  height:300px;">


<?php

for ($i=0; $i < $count_cart  ; $i++) {  

  $query = "SELECT * FROM `tblroom` r ,`tblaccomodation` a WHERE r.`ACCOMID`=a.`ACCOMID` AND ROOMID=" . $_SESSION['monbela_cart'][$i]['monbelaroomid'];
   $mydb->setQuery($query);
   $cur = $mydb->loadResultList(); 
    foreach ($cur as $result) { 


?>             
      
        <div class="row"> 
          <div class="col-md-12">
             <div class="panel panel-default">
                <div class="panel-heading">
                <!-- <h4>Payment</h4> -->
                </div>
                <div class="panel-body">

                    <div class="col-md-12">
                      <label>Room:</label><br/>
                      <?php echo  $result->ROOM.' '. $result->ROOMDESC; ?>
                    </div>
                   
                    <div class="col-md-6">
                      <label>Arrival:</label>
                      <?php echo  date_format(date_create( $_SESSION['monbela_cart'][$i]['monbelacheckin']),"m/d/Y"); ?>
                    </div> 

                    <div class="col-md-6">
                       <label>Departure:</label>
                      <?php echo  date_format(date_create( $_SESSION['monbela_cart'][$i]['monbelacheckout']),"m/d/Y"); ?>
                    </div>   
                  
 
                      <div class="col-md-12" style="float:left;border-top:1px solid #000;">
                          <label>Summary</label> 
                      </div>
                
                      <div style="float:right">  

                          <div class="col-md-12"  >
                              <label>Price:</label>
                            <?php echo  ' &#8369 '. $result->PRICE; ?>
                         </div> 

                         <div class="col-md-12"  >
                              <label>Days:</label>
                            <?php echo   $_SESSION['monbela_cart'][$i]['monbeladay']; ?>
                         </div> 

                         <div class="col-md-12" >
                              <label>Total:</label>
                            <?php echo ' &#8369 '.   $_SESSION['monbela_cart'][$i]['monbelaroomprice']; ?>
                         </div> 

                      </div>    
                      
                 </div>

                 <div class="panel-footer">
                   
                 </div>
              </div>   

          </div>
        </div> 
  <?php 
    }

                      $payable += $_SESSION['monbela_cart'][$i]['monbelaroomprice'] ;
  }
                      $_SESSION['pay'] = $payable;
}
?>
      <div class="col-md-12" >
      <div class="row">
          <label style="float:left">Overall Price</label> <h2 style="float:right"> &#8369 <?php echo   $_SESSION['pay'] ;?></h2> 
      </div>
        </div>


  </div>  
    
  </div>  
</div>
      <!-- end list -->
    
<!-- end content -->
<!-- =========================================================================== -->

<?php } ?>