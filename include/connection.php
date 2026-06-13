<?php
    $dbserver="localhost";
    $dbuser="root";
    $password="";
    $database="web_project";

    $con=mysqli_connect( $dbserver,$dbuser,$password,$database);
    if(!$con){
        die("Error ".mysqli_connect_error());
    }
   
?>


<?php
    // $dbserver="nvtibaddegama.site";
    // $dbuser="nvtibadde_dilmi";
    // $password="dilmi2004nimsara";
    // $database="nvtibadde_dilmi_websalesystem";

    // $con=mysqli_connect( $dbserver,$dbuser,$password,$database);
    // if(!$con){
    //     die("Error ".mysqli_connect_error());
    // }
   
?>