<?php 
 
    $con = mysqli_connect("localhost", "root", "", "scenario_2");
    if(!$con){
        die("Connection failed: " . mysqli_connect_error());
    }

?>