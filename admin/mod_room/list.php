
<div class="container">
	<?php
		check_message();
			
		?>
		<!-- <div class="panel panel-primary"> -->
			<div class="panel-body">
			<h3 >List of Rooms</h3>
			    <form action="controller.php?action=delete" Method="POST">  					
				<table id="example" style="font-size:12px;" class="table table-hover table-bordered"  cellspacing="0">
					
				  <thead>
				  	<tr  >
				  	<th>No.</th>
				  		<th  >
				  		 <input type="checkbox" name="chkall" id="chkall" onclick="return checkall('selector[]');"> 
				  		Image</th>
				  		<!-- <th>Room#</th> -->
				  		<th   >Room</th>	
				  		<!-- <th  width="120">Description</th> -->
				  		<th >Accomodation</th> 
				  		<th >Person</th>
				  		<th  >Price</th>
				  		<th># of Rooms</th>
				  	</tr>	
				  </thead>
				  <tbody>
				  	<?php 
				  		$mydb->setQuery("SELECT *,ACCOMODATION FROM tblroom r, tblaccomodation a WHERE r.ACCOMID = a.ACCOMID ORDER BY  ROOMID ASC ");
				
				  		$cur = $mydb->loadResultList();

						foreach ($cur as $result) {
				  		echo '<tr>';
						echo '<td width="5%" align="center"></td>';
				  		echo '<td   width="120"><input type="checkbox" name="selector[]" id="selector[]" value="'.$result->ROOMID. '"/> 
				  				<a href="#"  class="roomImg" data-id="'.$result->ROOMID.'" title="Click here to Change Image."><img src="'. $result->ROOMIMAGE.'" width="60" height="40" title="'. $result->ROOM .'"/></a></td>';
				  		// echo '<td><a href="index.php?view=edit&id='.$result->ROOMID.'">' . ' '.$result->ROOMNUM.'</a></td>';
						echo '<td><a href="index.php?view=edit&id='.$result->ROOMID.'">'. $result->ROOM.' ('. $result->ROOMDESC.')</a></td>';
				  		// echo '<td>'. $result->ROOMDESC.'</td>';
						// echo '<td>'. $result->ACCOMODATION.' ('. $result->ACCOMDESC.')</td>';
						echo '<td>'. $result->ACCOMODATION.'</td>';
				  		echo '<td>'. $result->NUMPERSON.'</td>';
				  		
				  		echo '<td> &#8369 '. $result->PRICE.'</td>';
				  		echo '<td>'.$result->OROOMNUM.' </td>';
				  		echo '</tr>';
				  	} 
				  	?>
				  </tbody>
				 	
				</table>
				<div class="btn-group">
				  <a href="index.php?view=add" class="btn btn-default">New</a>
				  <button type="submit" class="btn btn-default" name="delete"><span class="glyphicon glyphicon-trash"></span> Delete Selected</button>
				</div>
				</form>
	  		</div><!--End of Panel Body-->
	  	<!-- </div> -->
	  	<!--End of Main Panel-->

</div><!--End of container-->

<div class="modal fade" id="myModal" tabindex="-1">

</div>