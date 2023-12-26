  <?php
  if (!isset($_POST['arrival'])) {
    # code...
    redirect("index.php");
  }
$msg = "";

if(isset($_POST['booknow'])){

    $days =0;
    $day = dateDiff($_SESSION['arrival'],$_SESSION['departure']);  

   if($day <= 0){
      $totalprice = $_POST['ROOMPRICE'] *1;
      $days = 1;
    }else{
      $totalprice = $_POST['ROOMPRICE'] * $day;
      $days = $day;
    }
     
      addtocart($_POST['ROOMID'],$days, $totalprice,$_SESSION['arrival'],$_SESSION['departure']);

      redirect(WEB_ROOT. 'booking/'); 

 }
 
 
 

 $days = dateDiff($_POST['arrival'],$_POST['departure']); 

if($days <= 0){
  $msg = 'Available room today';
}else{
   $msg =  'Available room From:'.$_POST['arrival']. ' To: ' .$_POST['departure'];

} 


$_SESSION['arrival'] = date_format(date_create( $_POST['arrival']),"Y-m-d");
$_SESSION['departure'] =date_format(date_create($_POST['departure']),"Y-m-d");


 


   $accomodation = ' | ' . $_POST['accomodation'];
  ?>



<div id="accom-title"  > 
    <div  class="pagetitle">   
            <h1  ><?php print $title ; ?>
                <small><?php print  $accomodation; ?></small>
                 
            </h1> 
        </div> 
  </div>

<div id="bread">
   <ol class="breadcrumb">
      <li><a href="<?php echo WEB_ROOT ;?>index.php">Home</a>
      </li>
      <li class="active"><?php print $title  ; ?></li>
      <li  style="color: #02aace; float:right"> <?php print  $msg; ?></li>
  </ol> 
</div>
   
  <div id="main" class="site-main clr"> 
    <div id="primary" class="content-area clr"> 
        <div id="content-wrap">
          <!--  <h1 class="page-title"><?php print $title . $accomodation; ?></h1>  --> 
           
           <div class="col-lg-9">
            <div class="tabs-wrapper clr"> 
               <div class="row"> 
               
                <?php 
                $status = "no result";
 
                  $arrival =  $_SESSION['arrival'];
                  $departure =  $_SESSION['departure'] ;
                   $query = "SELECT * FROM `tblroom` r ,`tblaccomodation` a WHERE r.`ACCOMID`=a.`ACCOMID` AND `ACCOMODATION`='" . $_POST['accomodation'] . "' AND `NUMPERSON` = " . $_POST['person'];
                   $mydb->setQuery($query);
                   $cur = $mydb->loadResultList(); 
                      foreach ($cur as $result) { 


// filtering the rooms
 // ======================================================================================================
                    $mydb->setQuery("SELECT * FROM `tblreservation`     WHERE ((
                        '$arrival' >= DATE_FORMAT(`ARRIVAL`,'%Y-%m-%d')
                        AND  '$arrival' <= DATE_FORMAT(`DEPARTURE`,'%Y-%m-%d')
                        )
                        OR (
                        '$departure' >= DATE_FORMAT(`ARRIVAL`,'%Y-%m-%d')
                        AND  '$departure' <= DATE_FORMAT(`DEPARTURE`,'%Y-%m-%d')
                        )
                        OR (
                        DATE_FORMAT(`ARRIVAL`,'%Y-%m-%d') >=  '$arrival'
                        AND DATE_FORMAT(`ARRIVAL`,'%Y-%m-%d') <=  '$departure'
                        )
                        )
                        AND ROOMID =".$result->ROOMID);

                     $curs = $mydb->loadResultList();  
                     $resNum = $result->OROOMNUM - count($curs) ;
                         

                     $mydb->setQuery("SELECT * FROM `tblreservation`     WHERE ((
                        '$arrival' >= DATE_FORMAT(`ARRIVAL`,'%Y-%m-%d')
                        AND  '$arrival' <= DATE_FORMAT(`DEPARTURE`,'%Y-%m-%d')
                        )
                        OR (
                        '$departure' >= DATE_FORMAT(`ARRIVAL`,'%Y-%m-%d')
                        AND  '$departure' <= DATE_FORMAT(`DEPARTURE`,'%Y-%m-%d')
                        )
                        OR (
                        DATE_FORMAT(`ARRIVAL`,'%Y-%m-%d') >=  '$arrival'
                        AND DATE_FORMAT(`ARRIVAL`,'%Y-%m-%d') <=  '$departure'
                        )
                        )
                        AND ROOMID =".$result->ROOMID);
                      $curs = $mydb->executeQuery(); 
                      $maxrow = $mydb->num_rows($curs); 

                      $resNum = $result->OROOMNUM - $maxrow; 

                      if ($maxrow>0) { 
                        $rs  = $mydb->loadSingleResult();
                         $status= $rs->STATUS;
                      }
                    //$availRoom = $result->ROOMNUM;
 
              if($resNum<=0){

             if($status=='Confirmed'){
                $btn =  '<div style="margin-top:10px; color: rgba(0,0,0,1); font-size:16px;"><strong>Fully Reserve!</strong></div>';
                 $img_title = ' 

                           <figcaption class="img-title-active">
                                <h5>Reserve!</h5>    
                            </figcaption>


                    ';
              }elseif($status=='Checkedin'){
                $btn =  '<div style="margin-top:10px; color: rgba(0,0,0,1); font-size:16px;"><strong>Fully Book!</strong></div>';
                 $img_title = ' 

                           <figcaption class="img-title-active">
                                <h5>Book!</h5>    
                            </figcaption>


                    ';
              }else{
                 $btn =  '
                 <div class="form-group">
                        <div class="row">
                          <div class="col-xs-12 col-sm-12">
                            <strong>Fully Book!</strong>
                                                   
                           </div>
                        </div>
                      </div>';
                    $img_title = ' 

                           <figcaption class="img-title">
                                <h5>'.$result->ROOM . ' <br/> '.$result->ROOMDESC.'  <br/>
                                ' . $result->ACCOMODATION .' <br/> 
                                '.$result->ACCOMDESC . '<br/>  
                                Number of Person:' . $result->NUMPERSON .' <br/> 
                                Price:'.$result->PRICE.'</h5>    
                            </figcaption>


                    ';
                    $resNum=0;
                   
              }

                   
              }else{
                $btn =  '
                 <div class="form-group">
                        <div class="row">
                          <div class="col-xs-12 col-sm-12">
                            <input type="submit" class="btn monbela-btn  btn-primary btn-sm" id="booknow" name="booknow" onclick="return validateBook();" value="Book Now!"/>
                                                   
                           </div>
                        </div>
                      </div>';
                    $img_title = ' 

                           <figcaption class="img-title">
                                <h5>'.$result->ROOM . ' <br/> '.$result->ROOMDESC.'  <br/>
                                ' . $result->ACCOMODATION .' <br/> 
                                '.$result->ACCOMDESC . '<br/>  
                                Number of Person:' . $result->NUMPERSON .' <br/> 
                                Price:'.$result->PRICE.'</h5>    
                            </figcaption>


                    ';
                   

              }      
// ============================================================================================================================


 
                ?>
                 <form method="POST" action="index.php?p=accomodation">
                 <input type="hidden" name="ROOMPRICE" value="<?php echo $result->PRICE ;?>">
                  <input type="hidden" name="ROOMID" value="<?php echo $result->ROOMID ;?>">

                  <div id="roomimg" class="col-md-4 img-portfolio">
                    <div  class="wrapper clearfix">
                    <a href="<?php echo WEB_ROOT ;?>index.php?p=largeview">
                        <figure class="gallery-item ">
                   
                            <img class="img-responsive"  src="<?php echo WEB_ROOT .'admin/mod_room/'.$result->ROOMIMAGE; ?>">
                    
                             <!-- <?php echo $img_title; ?> -->
                            <figcaption class="img-title-active">
                                <h5> &#8369 <?php echo $result->PRICE ;?></h5>    
                            </figcaption>

             
                        </figure> 
                       </a>  
                    </div> 
                      <div class="descRoom">
                        <ul><h4><p><?php echo $result->ROOM ;?></p></h4>
                        <li><?php echo $result->ROOMDESC ;?></li>
                        <li>Number Person : <?php echo $result->NUMPERSON ;?></li>
                         <li>Remaining Rooms :<?php echo  $resNum ;?></li>   
                        <li style="list-style:none;"><?php echo $btn ;?></li>  
                        </ul>
                    </div>
                </div> 

              </form>
                <?php  
 
                 }

                ?>

              </div> 
          </div>
    
         </div>

             <div class="col-lg-3"> 
        <div class="row">
         <form method="POST" action="index.php?p=booking">
<div id="sidebarRight-wrap">   
        <div class="row">
          <div class="col-md-10 block">
            <h3> Book a Room</h3> 
          </div> 
        </div> 

        <div class="row">
          <div class="col-md-10">
            
                <div class="form-group input-group"> 
                  <label>Arrival</label> 
                  <input type="text" data-date="" data-date-format="yyyy-mm-dd" data-link-field="any" 
                           data-link-format="yyyy-mm-dd"
                           name="arrival" id="date_pickerfrom"  
                           value="<?php echo isset($_POST['arrival']) ? $_POST['arrival'] : date('m/d/Y');?>"
                            readonly="true" class="date_pickerfrom input-sm form-control">
                  <span class="input-group-btn">
                      <i class="date_pickerto fa  fa-calendar" ></i> 
                  </span>
                </div>

          </div> 
        </div>

        <div class="row">
          <div class="col-md-10">
             <div class="form-group input-group"> 
                <label>Departure</label> 
                <input type="text" data-date="" data-date-format="yyyy-mm-dd" data-link-field="any" 
                       data-link-format="yyyy-mm-dd"
                       name="departure" id="date_pickerto" 
                       value="<?php echo isset($_POST['departure']) ? $_POST['departure'] : date('m/d/Y');?>" 
                        readonly="true" class="date_pickerto form-control  input-sm">
                <span class="input-group-btn">
                    <i class="date_pickerto fa  fa-calendar" ></i> 
                </span> 
             </div>
          </div> 
        </div> 
        <div class="row">
          <div class="col-md-10">
                   <div class="form-group input-group">
                    <?php
                         $accomodation = New Accomodation();
                         $cur = $accomodation->listOfaccomodation(); 
                          ?>
                          <label>Accomodation</label> 
                          <select class="form-control input-sm" name="accomodation" id="person">
                          <?php  foreach ($cur as $result) { ?>
                          <option value="<?php echo $result->ACCOMODATION; ?>"><?php echo $result->ACCOMODATION; ?></option>
                          <?php  } ?>
                          
                          </select> 
                    </div>
          </div> 
        </div> 

        <div class="row">
          <div class="col-md-10">
                <div class="form-group input-group">
                   <label>Person</label> 
                  <select class=" form-control input-sm " name="person" id="person">
                  <?php $sql ="SELECT distinct(`NUMPERSON`) as 'NumberPerson' FROM `tblroom`";
                     $mydb->setQuery($sql);
                   $cur = $mydb->loadResultList(); 
                      foreach ($cur as $result) { 
                        echo '<option value='.$result->NumberPerson.'>'.$result->NumberPerson.'</option>';
                      }

                  ?>
                      

                  </select> 
              </div>
          </div> 
        </div> 
 
        <div class="row">
          <div class="col-md-10">
             <button class="btn monbela-btn  btn-primary btn-sm " name="booknowA" type="submit" id="booknowA" >Check Availability </button>
             
          </div> 
        </div>  
 
</div> 
</form>
        </div>
        <br/>
 <style type="text/css">
 .sideAcom { 
  line-height: 10px; 
 }
 .sideAcom a {
  color:white;
 }
  .sideAcom > li > a:hover {
  color:lightblue;
 }
  .sideAcom li {
  list-style: none;
 }
 </style>
<div class="row">
          <div id="sidebarRight-wrap">  
              <div class="descRoom">
           <div class="row">
          <div class="col-md-10 block">
            <h3>Type of Rooms</h3> 
          </div> 
        </div> 
              <ul  class="sideAcom"> 
                <?php
                    $query = "SELECT distinct(ROOM) FROM `tblroom` ";
                   $mydb->setQuery($query);
                   $cur = $mydb->loadResultList();  
                      ?>
                      
                <?php  foreach ($cur as $result) { ?>
                 <li><a href="<?php echo WEB_ROOT; ?>index.php?p=rooms&q=<?php echo $result->ROOM; ?>" ><p ><?php echo $result->ROOM; ?></p></a></li> 
                <?php  } ?>
                          
             
              </ul>
          </div>
               </div>
        </div>
      </div>
    
    </div>
    </div>
   
  </div>

 