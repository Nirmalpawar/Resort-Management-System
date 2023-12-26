<?php 
require_once '../../config/config.php';
require_once '../../functions/functions.php';
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {

	case 'delete' :
	dbDELETE();
	break;
	
    case 'deleteOne' :
	dbDELETEONE();
	break;
	
	}
	
function dbDELETE(){
$delete = (isset($_POST['delete']) && $_POST['delete'] != '') ? $_POST['delete'] : '';
$checkbox = (isset($_POST['checkbox']) && $_POST['checkbox'] != '') ? $_POST['checkbox'] : '';
$ct = count($checkbox);
if($delete){
for($i=0;$i<$ct;$i++){
$del_id = $checkbox[$i];
$sql = "DELETE FROM comments WHERE comment_id='".$del_id."'";
$result = dbQuery($sql)or die('Could not delete record: ' . mysql_error());
header('Location:index_com.php');
}
}
}
function dbDELETEONE(){
$del_id = $_GET['id'];
$sql = "DELETE FROM comments WHERE comment_id='".$del_id."'";
$result = dbQuery($sql)or die('Could not delete record: ' . mysql_error());
header('Location:index_com.php');
}

?>