<?php

require_once __DIR__ . '/../autoload.php';

// require_once ROOT.'/Controllers/Interactions.php';

use Controllers\Interactions;


$interactions =  new Interactions();


if (isset($_POST) && !empty($_POST)) {
    // print_r($_POST);
    // exit();

    foreach ($_POST as $key => $val) {
        if (empty($val)) {

            echo json_encode(["ResponseCode" => "05", "ResponseMessage" => "All fields are required"]);
            exit();
        }
    }

    //sanitize for email check
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        echo json_encode(["ResponseCode" => "05", "ResponseMessage" => "Invalid Email Address"]);
        exit();
    }

    //check if email already exists in database

    $retrievedEmails =  $interactions->getEmails();
    foreach ($retrievedEmails as $Key => $Val) {
        if ($Val['Email'] === $_POST['email']) {
            echo json_encode(["ResponseCode" => "05", "ResponseMessage" => "Email Already Exists"]);
            exit();
        }
    }
    //insert records

    $insertResponse = $interactions->insertRecord($_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['phone']);
    if ($insertResponse) {
        echo json_encode(["ResponseCode" => "01", "ResponseMessage" => "User Succesfully Inserted"]);
        exit();
    } else {
        echo json_encode(["ResponseCode" => "05", "ResponseMessage" => "Error in Processing Record"]);
        exit();
    }
}

if(isset($_GET['action']) && $_GET['action']== "retrieve"){

        // echo "i am here";
        $newRecords =  $interactions->getAllUsers();
        // print_r($newRecords);

        echo json_encode($newRecords);


}
