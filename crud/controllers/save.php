<?php

    include("../includes/db-connection.php");
 
    if ($dbConn == true) {
        $sFname = $_POST['fname']; 
        $sLname = $_POST['lname']; 
        $sEmail = $_POST['email']; 
        $sUsername = $_POST['username'];
        $sPassword = md5($_POST['password']);
        
        if( $sFname == "" || $sLname == "" || $sEmail == "" || $sUsername == "" || $sPassword == "" ) {
            echo "Failed to Process";
        } else { 

            try {
                $qInsert = "INSERT INTO `u955154186_mock_sceiiya`.`tbl_users` 
                    (`first_name`, `last_name`, `email`, `username`, `password`, `date_added`) 
                    VALUES 
                    ('".$sFname."', '{$sLname}', '{$sEmail}', '{$sUsername}', '{$sPassword}', '".date("Y-m-d H:i:s")."')
                ";
                
                $eInsert = mysqli_query($dbConn, $qInsert); //connection and query

                if ($eInsert == true) {
                    echo "Record successfully saved!";
                } else {
                    echo "Failed to process, please call system administrator!";
                }

            } catch(Exception $e) {
                echo 'Error: ' .$e->getMessage();
            }

        }

    } else {
        echo "Connection Failed!";
    }