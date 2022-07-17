<?php 
require_once('functions.php');
if (isset($_POST)) {
  try {
    require('connection.php');
    $person_id = $_POST['personId'];
    $query = $conn->prepare("CALL DeletePersonData(:perId)");
    $query->bindParam(':perId', $person_id);
    $query->execute();
    $conn = null;
  } catch(PDOException $e) {
    echo 'Failed connection' .$e->getMessage();
  }
}