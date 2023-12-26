<?php
require_once("../../includes/initialize.php");
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'add' :
	doInsert();
	break;
	
	case 'edit' :
	doEdit();
	break;

	case 'editimage' :
	editImg();
	break;
	
	case 'delete' :
	doDelete();
	break;


	}

function doInsert(){
		if (!isset($_FILES['image']['tmp_name'])) {
			message("No Image Selected!", "error");
			redirect("index.php?view=add");
		    	}else{
				$file=$_FILES['image']['tmp_name'];
				$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
				$image_name= addslashes($_FILES['image']['name']);
				$image_size= getimagesize($_FILES['image']['tmp_name']);
				if ($image_size==FALSE) {
					message("That's not an image!", "error");
					redirect("index.php?view=add");
				}else{
			$location="pics/".$_FILES["image"]["name"];
			if(file_exists($location)){
			
		    	message("There is such an image. Please select another one!", "error");
				redirect("index.php?view=add");	
			}
			else{
			move_uploaded_file($_FILES["image"]["tmp_name"],"pics/".$_FILES["image"]["name"]);
			

			if ($_POST['name'] == "" OR $_POST['description'] == "") {
				
					message("All fields required!", "error");
					redirect("index.php?view=add");
				
			}else{
				$amen = new Amenities();
				       
				$amen_name		= $_POST['name'];
				$description	= $_POST['description'];
				$amen_image 		= $location;

				$res = $amen->find_all_amenities($amen_name);
				
				
				if ($res >=1) {
					message("Amenity name already exist!", "error");
					redirect("index.php?view=add");
				}else{
				
					$amen->amen_name = $amen_name;
					$amen->amen_desp = $description;
					$amen->amen_image = $location;
					
					 $istrue = $amen->create(); 
					 if ($istrue == 1){
					 	message("New [". $amen_name ."] created successfully!", "success");
					 	redirect('index.php');
					 	
					 }
				}	 

		
			}	



		}
	}
  }
}
//function to modify rooms

 function doEdit(){
        $amen = new Amenities();
          		$rm_id			= $_POST['amen_id'];
				$rm_name		= $_POST['name'];
				$rm_description = $_POST['description'];
				
				$amen->amen_id = $rm_id;
				$amen->amen_ame = $rm_name;
				$amen->amen_desp = $rm_description;
				
				$amen->update($rm_id); 
				
			 	message("New [". $rm_name ."] Upadated successfully!", "success");
			 	unset($_SESSION['id']);
			 	redirect('index.php');
}

function doDelete(){
@$id=$_POST['selector'];
		  $key = count($id);
		//multi delete using checkbox as a selector
		
	for($i=0;$i<$key;$i++){
	 
		$rm = new Amenities();
		$rm->delete($id[$i]);
	}

		message("Amenity already Deleted!","info");
		redirect('index.php');
 }
 
 //function to modify picture
 
function editImg (){
		if (!isset($_FILES['image']['tmp_name'])) {
			message("No Image Selected!", "error");
			redirect("index.php?view=list");
		}else{
			$file=$_FILES['image']['tmp_name'];
			$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
			$image_name= addslashes($_FILES['image']['name']);
			$image_size= getimagesize($_FILES['image']['tmp_name']);
			
			if ($image_size==FALSE) {
				message("That's not an image!");
				redirect("index.php?view=list");
		   }else{
			
		
				$location="pics/".$_FILES["image"]["name"];
				

	 				$amen = new Amenities();
	          		$rm_id		= $_POST['id'];
				
			    	move_uploaded_file($_FILES["image"]["tmp_name"],"pics/".$_FILES["image"]["name"]);
					
					$amen->amen_image = $location;
					$amen->update($rm_id); 
					
				 	message("Amenity Image Upadated successfully!", "success");
				 	unset($_SESSION['id']);
				 	 redirect("index.php");
 			}
 		}
 }			 

function _deleteImage($catId)
{
    // we will return the status
    // whether the image deleted successfully
    $deleted = false;

	// get the image(s)
    $sql = "SELECT * 
            FROM amenities
            WHERE amen_id ";
	
	if (is_array($catId)) {
		$sql .= " IN (" . implode(',', $catId) . ")";
	} else {
		$sql .= " = {$catId}";
	}
global $mydb;
$mydb->setQuery($sql);
$cur = $mydb->executeQuery();
foreach ($cur as $value) {
	$deleted = @unlink($value->amen_image);

}
    
    /*if (dbNumRows($result)) {
        while ($row = dbFetchAssoc($result)) {
		extract($row);
	        // delete the image file
    	    $deleted = @unlink($amen_image);
		}	
    }
    */
return $deleted;
}
?>
