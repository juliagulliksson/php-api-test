<?php
require 'db.php';
  
  $statement = $pdo->prepare(
    "SELECT * FROM booking WHERE date = '2018-08-15' AND seatingOne = 1 ");
  $statement->execute(); 
  $bookings = $statement->fetchAll(PDO::FETCH_ASSOC);

if(count($bookings) > 15){
 echo json_encode("Fullbokat");

}else{
  echo json_encode($bookings, JSON_PRETTY_PRINT);
}
   
  