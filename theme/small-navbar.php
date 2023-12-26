 <style type="text/css">
  #menuSm {
    margin: 0px 175px;
    position: fixed;
    background-color: #017501;
  }
  @media only screen and (max-width: 768px){
    #menuSm {
      width: 100%;
      margin: 0px;  
    }
  }
 </style>
 <nav  id="menuSm"  class="navbar navbar-fixed-top navbar-default" style="background-color: #017501" > 
    <div class="container " > 
    <div class="navbar-header">
          <!-- <h5 class="navbar-menu p" >GC Appliance Centrum Corp</h5> -->
         <button type="button" class="navbar-toggle btn-xs p" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button> 
    </div> 
    <div class="collapse navbar-collapse ">
      <div class="sm-ul navbar-custom-menu ">
          <ul class="nav navbar-nav  tooltip-demo">
            <li>
              <a  data-toggle="tooltip" data-placement="bottom"   title="Booking Cart"  href="<?php echo WEB_ROOT.'booking/index.php';  ?>"> 
               <i class="fa fa-shopping-cart fa-fw"><?php echo  isset($cart) ? $cart : '' ; ?>  </i> 
             </a>
            </li>

            <?php if (isset($_SESSION['GUESTID'])) { 

              $sql = "SELECT count(*) as MSG FROM `tblpayment` WHERE STATUS<>'Pending'  AND  `MSGVIEW`=0 AND `GUESTID`=" . $_SESSION['GUESTID'];
              $mydb->setQuery($sql);
              $msgCnt = $mydb->loadSingleResult(); 
             ?>
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success"><?php echo $msgCnt->MSG ; ?></span>
              <i class="fa fa-caret-down fa-fw"></i> 
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have <?php echo $msgCnt->MSG ; ?> messages</li>
              <?php 
                $sql = "SELECT  *  FROM `tblpayment` WHERE STATUS<>'Pending' AND `MSGVIEW`=0 AND `GUESTID`=" . $_SESSION['GUESTID'];
                $mydb->setQuery($sql);
                $msg = $mydb->loadResultList();
              foreach ($msg as $mess) { 
               ?>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a  class="read" href="<?php echo WEB_ROOT ;  ?>guest/readmessage.php?code=<?php echo  $mess->CONFIRMATIONCODE; ?>" data-toggle="lightbox"   data-id="<?php echo  $mess->CONFIRMATIONCODE; ?> " data-width="100px" >
                      <div class="pull-left">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Admin
                        <!-- <small><i class="fa fa-clock-o"></i> 5 mins</small> -->
                      </h4>
                      <p>Reservation is already <?php echo   $mess->STATUS; ?>.. </p> 
                    </a>
                  </li>
           
                
                </ul>
              </li>
              <!-- <li class="footer"><a href="#">See All Messages</a></li> -->
              <?php }  ?>
            </ul>
          </li>

<?php  
$g = New Guest() ;
$result = $g->single_guest($_SESSION['GUESTID']); 
?>

          
            <!-- User Account: style can be found in dropdown.less -->
 
            <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            
              <!-- <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->
            <i class="fa fa-user fa-fw"></i><?php echo $_SESSION['name']. ' ' . $_SESSION['last']; ?> <i class="fa fa-caret-down fa-fw"></i> 

            </a>
            <ul class="dropdown-menu nav nav-stacked">   
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <li class="widget-user-header bg-yellow">
              <div class="widget-user-image">
                <img class="img-circle" style="cursor:pointer;width:200px;height:100px;padding:0;"  data-target="#myModal" data-toggle="modal" src="<?php echo WEB_ROOT. $result->LOCATION;  ?>" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username"><?php echo $_SESSION['name']. ' ' . $_SESSION['last']; ?> </h3>
              <!-- <h5 class="widget-user-desc">Lead Developer</h5> -->
            </li>
            <!-- <li class="box-footer no-padding">  -->
                <li><a style="color:#000;text-align:left;border-bottom:1px solid #fff;"
                    href="<?php echo WEB_ROOT ;  ?>guest/profile.php" data-toggle="lightbox" data-width="800" >Account<!--  <span class="pull-right badge bg-blue">31</span> --></a></li>
                <!-- <li><a style="color:#000;text-align:left;border-bottom:1px solid #fff;" href="#">Tasks <span class="pull-right badge bg-aqua">5</span></a></li> -->
                <li><a style="color:#000;text-align:left;border-bottom:1px solid #fff;" 
                href="<?php echo WEB_ROOT ;  ?>guest/bookinglist.php" data-toggle="lightbox" data-width="800">Bookings <!-- <span class="pull-right badge bg-green">12</span> --></a></li>
                <li><a style="color:#000;text-align:left;border-bottom:1px solid #fff;" href="<?php echo WEB_ROOT.'logout.php';  ?>">Logout </a></li>
            
            <!-- </li>  -->
            </ul>

          </li>
          <?php } ?>
          </ul>
      </div> 
      </div>
    </div>   
</nav>   