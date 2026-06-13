<?php
include_once("../include/connection.php");
?>

<?php
  $ap2=$_GET['ap2'];
  $id=$_GET['id'];

     if($ap2=='no'){
    $ap2= 1;
     }else{
       $ap2= 0;
     }

$query="UPDATE users SET approve=$ap2 where id='$id'";
$result=mysqli_query($con,$query);
    if($result){
        header("Location:supplyerApprove.php");
    }

?>