<?php
include_once("db.php");

$reqType = $_REQUEST['req'];
$user    = $_REQUEST['u'];
$post    = $_REQUEST['p'];
$id      = $_REQUEST['id'];


if($reqType != ''){
    if($reqType == 'add'){
        $ins = "INSERT INTO posts (UserName, PostText) VALUES ('$user', '$post')";
        $run = mysqli_query($conn, $ins);
    }elseif($reqType == 'del'){
        $del = "DELETE FROM posts WHERE ID = $id ";
        $run = mysqli_query($conn, $del);
    }elseif($reqType == 'edit'){
        $up = "UPDATE posts SET PostText = '$post' WHERE ID = '$id'";
        $run = mysqli_query($conn, $up);

    }
}

$sel = "SELECT * FROM posts ORDER BY ID DESC";
$run = mysqli_query($conn, $sel);

while($rows = mysqli_fetch_assoc($run)){
?>


<div class="card posts">
    <div class="control mr">
        <i class="fas fa-trash-alt mr" onclick="post('del',<?php echo $rows['ID']; ?>)"></i>
        <i class="fas fa-edit editor mr" id ="<?php echo $rows['ID']; ?>" onclick ="post('modify',<?php echo $rows['ID']; ?>)" data-toggle="modal" data-target="#exampleModal" data-id ="<?php echo $rows['ID']; ?>"></i>
    </div>
    <h5><?php echo $rows["UserName"]; ?></h5>
    <small><i class="fas fa-clock"><?php echo $rows["Time"]; ?></i></small>
    <p><?php echo $rows["PostText"]; ?></p>
</div>

<?php 
} 
?>