<?php 
include 'inc\header.php';
include 'config.php';
include 'Database.php';
?>
<?php
$id = $_GET['id'];
$db = new Database();
$query = "SELECT * FROM tbl_user WHERE id = $id";
$getData = $db->select($query)->fetch_assoc();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['submit'])){
      $name = mysqli_real_escape_string($db->link, $_POST['name']);
      $email = mysqli_real_escape_string($db->link, $_POST['email']);
      $skill = mysqli_real_escape_string($db->link, $_POST['skill']);
      if($name == '' || $email == '' || $skill == ''){
          $error = "Please fill all field";
      } else {
          $query = "UPDATE tbl_user 
          SET 
          name = '$name', 
          email = '$email', 
          skill = '$skill'
          WHERE id = $id";
          $update = $db->update($query);
      }

    }
}

?>
<?php 
if(isset($error)){
    echo "<span class='text-danger'>".$error."</span>";
}


?>
<form action="<?php $_SERVER['PHP_SELF']?>?id=<?php echo $id?>" method="POST">
    <table class="table">
    <tr>
        <td>Name</td>
        <td><input type="text" name="name" id="" value="<?php echo $getData['name'] ?>"></td>
    </tr>
    <tr>
        <td>Email</td>
        <td><input type="email" name="email" id="" value="<?php echo $getData['email'] ?>"></td>
    </tr>
    <tr>
        <td>Skill</td>
        <td><input type="text" name="skill" id="" value="<?php echo $getData['skill'] ?>"></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" name="submit" value="Submit"> <input type="reset" name="reset" value="Cancel"></td>
    </tr>   
    </table>
</form>
<a href="index.php">Go Back</a>

<?php include 'inc\footer.php';?>