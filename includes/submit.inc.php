<?php
        require 'dbh.inc.php';
        session_start();
        // user identification
        $id = $_SESSION['userId'];
        // Respective Slots
        $slot = $_POST['slot'];
        // Concatenating Every Slots for Result

        $sql = "INSERT INTO booking_details (bookingSlot,bookingTimeStamp,bookingUserId) VALUES ('$slot',NOW(),$id)";
        $conn->query($sql);
        


    	// // Account details
    	// $apiKey = urlencode('KareBU/Fyks-fLwYd2f24dlHFHlDDIp2Jd8KfqLSOK');
    	
    	// // Message details
    	// $numbers = 9049320957;
    	// $sender = urlencode('TXTLCL');
    	// $message = rawurlencode('Slots Booked Successfully!');

     
    	// // Prepare data for POST request
    	// $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
     
    	// // Send the POST request with cURL
    	// $ch = curl_init('https://api.textlocal.in/send/');
    	// curl_setopt($ch, CURLOPT_POST, true);
    	// curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    	// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    	// $response = curl_exec($ch);
    	// curl_close($ch);
    	
    	// // Process your response here
        // echo $response;


        header("Location: ../book.html?success=send&slot=".$slot."&id".$_SESSION['userId']);
        exit();