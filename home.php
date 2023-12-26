
<?php include "availability_search.php"; ?>
   <!-- Projects Row -->
<style type="text/css">
  #itemacom {
    height: 350px;
  }
  #itemacom img {
    width: 100%;
    height: 100%;
  }
.stretch  a > img {
  width: 100%;
  height: 300px;
}
#content {
  background-color: #e4e9ea;
  margin: 10px 0px;
  min-height: 300px;
}
#content .aligncenter {
  text-align: center;
} 
.info-blocks {
  padding: 20px 0px;
}
</style>     
   <div class="row" style="margin-top: 5px;">
         <div class="col-md-12  ">
              <div class="page-header "><h1>Welcome to our Resort</h1></div>
               <div class="stretch col-md-6">
                  <a href="portfolio-item.html">
                    <img class="img-responsive img-rounded" src="<?php echo WEB_ROOT; ?>images/tubigan-home.jpg" alt="">
                </a>
               </div> 
                <h3>
                    <a href="portfolio-item.html">Tubigan Garden Resort</a>
                </h3>
                <p>Nestled amidst expanse of the Western Ghats 1900 ft. above the sea level in Igatpuri, the resort is spread across 7 acres of lush green landscape established in 1991, the first resort in Igatpuri and the first in India with Petting Zoo, offering blend of deluxe accommodation with petting zoo, hosting human friendly animals and walk in aviaries..</p>
           </div> 
    
          </div>  
 

  <section id="content" class="section-padding gray-bg">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-title text-center">
            <h1 class="page-header" >Type of Rooms</h1>  
          </div>
        </div>
      </div>
      <div class="row" style="padding: 10px 0px;">
        <div class="col-md-12 ">
          <?php 
            $sql = "SELECT * FROM `tblroom` GROUP BY `ROOM`";
            $mydb->setQuery($sql);
            $cur = $mydb->loadResultList();

            foreach ($cur as $result) {
              echo '<div class="col-md-3" style="font-size:15px;padding:5px">* <a href="'.WEB_ROOT.'index.php?p=rooms&q='.$result->ROOM.'">'.$result->ROOM.'</a></div>';
            }

          ?>
        </div>
      </div>
 
    </div>
  </section> 
         <!-- Projects Row -->
        <div class="row" >
            <div class="col-md-12 img-portfolio">
             <div class="page-header"><h1>Accomodation</h1></div> 
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel"> 
                    <div class="carousel-inner">
                     <div id="itemacom" class="item active">
                     <img    src="<?php echo WEB_ROOT; ?>images/slide-1.jpg">
                              <figcaption class="img-title-active">
                                <h5>Accomodation</h5> 
                                <!-- <h1> &#8369 1430</h1>        -->
                            </figcaption>
                        </div>
                       <?php
                    $query = "SELECT distinct(ACCOMODATION) as 'ACCOM', PRICE,ROOMIMAGE FROM `tblroom` r, `tblaccomodation` rm WHERE r.ACCOMID=rm.ACCOMID";
                   $mydb->setQuery($query);
                   $cur = $mydb->loadResultList();  
                   foreach ($cur as $result) { ?>
                        <div id="itemacom" class="item">
                             <img    src="<?php echo WEB_ROOT .'admin/mod_room/'.$result->ROOMIMAGE; ?>">
                               <figcaption class="img-title-active">
                                 <h5><?php echo $result->ACCOM ;?></h5> 
                                <h1> &#8369 <?php echo $result->PRICE ;?></h1>    
                            </figcaption>
                        </div>
                    <?php } ?> 
                    </div> 

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div> 
        </div>