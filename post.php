<?php
require "db.php";

header("Content-Type: application/json; charset=UTF-8");

//Receive the GET-parameters from main.js
$formData = json_decode($_GET["formData"], false);

//Insert user into database
$statement = $pdo->prepare(
  "INSERT INTO users (name, email, phone) 
  VALUES (:name, :email, :phone)");
  
$statement->execute(array(
  ":name" => $formData->name,
  ":email" => $formData->email, 
  ":phone" => $formData->phone
));

//Insert booking into database
$statement2 = $pdo->prepare(
  "INSERT INTO booking (userPhone, date, seatingOne, seatingTwo) 
  VALUES (:userPhone, :date, :seatingOne, :seatingTwo)");
  
$statement2->execute(array(
  ":userPhone" => $formData->phone,
  ":date" => $formData->date, 
  ":seatingOne" => $formData->seatingOne,
  ":seatingTwo" => $formData->seatingTwo
));

if($formData->seatingOne == 1){
  $seating = "18:00";
}else{
  $seating = "21:00";
}

$message = "Congratulations! You have booked a table at $formData->date $seating";

//Returns the message in JSON to the main.js file
echo json_encode($message, JSON_PRETTY_PRINT);