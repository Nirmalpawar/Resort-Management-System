<?php

$_SESSION['id']=$_GET['id'];
$mydb->setQuery("SELECT * FROM amenities where amen_id=".$_SESSION['id']);
$cur = $mydb->loadSingleResult();

?>
<div class="panel panel-primary">
	<div class="panel-body">
		<table class="table table-hover" border="0">
			<caption><h3 align="left">Amenity Details</h3></caption>
		<tr>
		<td width="80"><img src="<?php echo $cur->amen_image; ?>" width="300" height="300" /></td>
		<td align="left" align="left"><p><strong>Name </strong>
		<?php echo ': '.$cur->amen_name; ?><br/>
		<strong>Descrption </strong>
		<?php echo ': '.$cur->amen_desp; ?><br/>
		<input type="button" value="&laquo Back" class="btn btn-primary" onclick="window.location.href='index.php'" >

	</p>
		
		
				</table>
	
	 </div><!--End of Panel Body-->
 </div><!--End of Main Panel-->  
