<?php 
include 'inc\header.php';
include 'config.php';
include 'Database.php';
?>
<?php
$db = new Database();
$query = "SELECT * FROM tbl_user ORDER BY id";
$read = $db->selectAll($query);


?>

<?php 
if(isset($_GET['msg'])){
    echo "<span class='text-success'>".$_GET['msg']."</span>";
}


?>

<table class="table">
    <thead class="thead-dark">
        <th scope="col">Sr</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Skill</th>
        <th scope="col">Action</th>
    </thead>
    <tbody>
        <?php if($read) { ?>
            <?php while($row = $read->fetch_assoc()) { 
                
            ?>
            <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['skill'] ?></td>
                <td><a href="update.php?id=<?php echo $row['id']?>" >Action</a></td>
            </tr>
            <?php } ?>
        <?php } else { ?>
            <p>Data is not available</p>        
            <?php } ?>
    </tbody>
</table>
<a href="create.php">Create</a>


<?php include 'inc\footer.php';?>