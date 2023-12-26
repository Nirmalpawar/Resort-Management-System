<!-- <div class="container">
<h3>Administrator Panel:Welcome <?php echo $_SESSION['ADMIN_UNAME'];?></h3>

<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
          Rooms
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in">
      <div class="panel-body">
      The guest house has got various rooms that are categorised accordion to types. 
      Each room is of particular category and have a maximum number of Adults and Children that can be accomodated. Click<a href="mod_room/index.php"> HERE.</a>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
          Accomodation
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body">
        This consists of the categories of rooms that in this Hotel. Each Category of rooms Has got unique features different form the other. For view all of the categories of all types of rooms Click <a href="mod_roomtype/index.php">HERE.</a>  </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
          Reservation
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">
       In this area, you can view all the reservation transaction of all guest. And this area allow the the receptionist confirm the request of guest or either to cancel the reservation. Click <a href="mod_reservation/index.php">HERE.</a>
       </div>
    </div>
  </div>
 
   <?php if($_SESSION['ADMIN_UROLE']=="Administrator"){ ?>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapsesix">
          Users
        </a>
      </h4>
    </div>
    <div id="collapsesix" class="panel-collapse collapse">
      <div class="panel-body">
		The system displays the list of all people that have been registered in to the system.If a particular user is logged in the system the, such as users record is does not appear in the list of records. To view all the registered other than the logged in user Click <a href="mod_users/index.php">HERE.</a>
      </div>
    </div>
  </div>
 <?php } ?>
</div>
</div> -->
<style type="text/css">
  .firstrow > .row{
    border: 1px solid #ddd;
    padding: 10px;
    text-align: center; 
    margin: 20px; 
  }
  .secondrow > .row {
     border: 1px solid #ddd;
    padding: 10px;
    text-align: center; 
    margin: 20px;
    min-height: 50px;
  }
  .imgstretch{
    padding: 10px;
  }
  .imgstretch img {
    width: 100%;
    height: 100px;
    object-fit: contain;
  }

 
</style>

<div class="container">
  <h3>Administrator Panel:Welcome <?php echo $_SESSION['ADMIN_UNAME'];?></h3>
  <div class="row">
    <div class="col-md-4 firstrow">
      <div class="row">
        <a href="<?php echo WEB_ROOT; ?>admin/mod_room/index.php" title="Rooms">
         <div class="imgstretch">
          <img src="img/rooms.png"> 
         </div>
         <label >Rooms</label>
        </a>
      </div>
    </div>
    <div class="col-md-4 firstrow">
      <div class="row">
        <a href="<?php echo WEB_ROOT; ?>admin/mod_accomodation/index.php" title="Accomodations">
         <div class="imgstretch">
          <img src="img/accomodation.jpg"> 
         </div>
         <label >Accomodation</label>
        </a>
      </div>
    </div>
    <div class="col-md-4 firstrow">
      <div class="row">
        <a href="<?php echo WEB_ROOT; ?>admin/mod_reservation/index.php" title="Reservations">
         <div class="imgstretch">
          <img src="img/reservation.jpg"> 
         </div>
         <label >Reservation</label>
        </a>
      </div>
    </div> 
  </div>
  <div class="row">
       <?php if($_SESSION['ADMIN_UROLE']=="Administrator"){ ?>
    <div class="col-md-6 secondrow">
      <div class="row">
        <a href="<?php echo WEB_ROOT; ?>admin/mod_users/index.php" title="Manage Users"> 
        <div class="imgstretch">
          <img src="img/user.png"> 
         </div>
         <label>Manage Users</label>
        </a>
      </div>
    </div>
  <?php } ?>
    <div class="col-md-6 secondrow">
      <div class="row">
        <a href="<?php echo WEB_ROOT; ?>admin/mod_reports/index.php" title="Reports"> 
        <div class="imgstretch">
          <img src="img/report.jpg"> 
         </div>
         <label>Reports</label>
        </a>
      </div>
    </div> 
  </div>
  
</div>