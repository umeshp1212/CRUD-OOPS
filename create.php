<?php 
include 'inc\header.php';
include 'config.php';
include 'Database.php';
?>
<?php
$db = new Database();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['submit'])){
      $name = mysqli_real_escape_string($db->link, $_POST['name']);
      $email = mysqli_real_escape_string($db->link, $_POST['email']);
      $skill = mysqli_real_escape_string($db->link, $_POST['skill']);
      if($name == '' || $email == '' || $skill == ''){
          $error = "Please fill all field";
      } else {
          $query = "INSERT INTO tbl_user(name,email,skill) VALUES('$name', '$email', '$skill')";
          $create = $db->insert($query);
      }

    }
}

?>
<?php 
if(isset($error)){
    echo "<span class='text-danger'>".$error."</span>";
}


?>
<form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
    <table class="table">
    <tr>
        <td>Name</td>
        <td><input type="text" name="name" id="" placeholder="Enter name"></td>
    </tr>
    <tr>
        <td>Email</td>
        <td><input type="email" name="email" id="" placeholder="Enter email"></td>
    </tr>
    <tr>
        <td>Skill</td>
        <td><input type="text" name="skill" id="" placeholder="Enter skill"></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" name="submit" value="Submit"> <input type="reset" name="reset" value="Cancel"></td>
    </tr>   
    </table>
</form>
<a href="index.php">Go Back</a>

<?php include 'inc\footer.php';?>