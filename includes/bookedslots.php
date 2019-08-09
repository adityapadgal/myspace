<?php
    require 'dbh.inc.php';
    session_start();
    $id = $_SESSION['userId'];
    $sql = "SELECT bookingSlot FROM booking_details WHERE bookingUserId=$id";
    $conn->query($sql);
    $_SESSION['bookedslots']=$row['bookingSlot'];
    header("Location: ../home.php?success=bookedslot");
    exit();