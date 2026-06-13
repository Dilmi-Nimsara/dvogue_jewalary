<?php
include_once("../include/connection.php");
?>

<?php
  $ap3=$_GET['ap3'];
  $id=$_GET['id'];

     if($ap3=='no'){
    $ap3= 1;
     }else{
       $ap3= 0;
     }

$query="UPDATE businessregistration SET approve=$ap3 where id='$id'";
$result=mysqli_query($con,$query);
    if($result){
        header("Location:approveRegister.php");
    }

?>