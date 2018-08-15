<?php
require "db.php";

header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_GET["x"], false);

$statement = $pdo->prepare(
  "INSERT INTO users (name, email, phone) 
  VALUES (:name, :email, :phone)");
  
$statement->execute(array(
  ":name" => $obj->name,
  ":email" => $obj->email, 
  ":phone" => $obj->phone
));

$statement2 = $pdo->prepare(
  "INSERT INTO booking (userPhone, date, seatingOne, seatingTwo) 
  VALUES (:userPhone, :date, :seatingOne, :seatingTwo)");
  
$statement2->execute(array(
  ":userPhone" => $obj->phone,
  ":date" => $obj->date, 
  ":seatingOne" => $obj->seatingOne,
  ":seatingTwo" => $obj->seatingTwo
));

if($obj->seatingOne == 1){
  $seating = "18:00";
}else{
  $seating = "21:00";
}

$message = "Congratulations! You have booked a table at $obj->date $seating";

echo json_encode($message, JSON_PRETTY_PRINT);