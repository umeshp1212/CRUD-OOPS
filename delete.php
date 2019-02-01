<?php 
include 'inc\header.php';
include 'config.php';
include 'Database.php';
?>
<?php
$id = $_GET['id'];
$db = new Database();

if(isset($id)){
    $query = "DELETE FROM tbl_user WHERE id = $id";
    $delete = $db->delete($query);
}




?>



<?php include 'inc\footer.php';?>