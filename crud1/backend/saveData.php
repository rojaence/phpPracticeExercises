<?php
require_once('functions.php');

if(isset($_POST)) {
  $personId = $_POST['personId'];
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $address = $_POST['address'];
  $age = $_POST['age'];
  $response = [
    'success' => true,
    'message' => '',
  ];
  try {
    if ($age > 150) {

      $response['success'] = false;
      $response['message'] = 'La edad no puede ser mayor a 150';

    } else {

      if($personId == 0) {
        create_person($firstName, $lastName, $address, $age);
      } else {
        update_person($personId, $firstName, $lastName, $address, $age);
      }

    }
  } catch(PDOException $e) {
    $response['success'] = false;
    $response['message'] = 'Failed connection' .$e->getMessage();
  }
  echo json_encode($response);
}