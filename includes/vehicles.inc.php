<?php
    if(isset($_POST['submit_vehicle'])){
        require 'dbh.inc.php';
        session_start();
        // user identification
        $id = $_SESSION['userId'];

        $vno = $_POST['vehicle_no'];
        $vtype = $_POST['vehicle_type'];

        $sql = "INSERT INTO vehicle_details (vehicleNo,vehicleType,vehicleUserId) VALUES ('$vno','$vtype',$id)";
        $conn->query($sql);
        
        header("Location: ../home.php?success=send&vehicleno=".$vno."&vehicletype=".$vtype."&userid=".$id);
        exit();
    }
    else{
        header("Location: ../home.php?error=requesterror");
        exit();
    }