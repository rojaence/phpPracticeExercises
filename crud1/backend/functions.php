<?php
function create_person($name, $surname, $address, $age) {
  require('connection.php');
  $query = $conn->prepare("CALL InsertPersonData(:personName, :personSurname, :personAge, :personAddress)");
  $query->bindParam(':personName', $name);
  $query->bindParam(':personSurname', $surname);
  $query->bindParam(':personAddress', $address);
  $query->bindParam(':personAge', $age);
  $query->execute();
  $conn = null;
}

function get_all_persons() {
  require('connection.php');
  $query = $conn->prepare("CALL GetAllPersons()");
  $query->execute();
  $result = $query->fetchAll(PDO::FETCH_ASSOC);
  $conn = null;
  return $result;
}

function search_persons($param) {
  require('connection.php');
  $query = $conn->prepare("CALL SearchPersons(:param)");
  $query->bindParam(':param', $param);
  $query->execute();
  $result = $query->fetchAll(PDO::FETCH_ASSOC);
  $conn = null;
  return $result;
}

function get_person_by_id($id) {
  require('connection.php');
  $query = $conn->prepare("CALL GetPersonData(:personId)");
  $query->bindParam(':personId', $id);
  $query->execute();
  $result = $query->fetch(PDO::FETCH_ASSOC);
  $conn = null;
  return $result;
}

function update_person($id, $name, $surname, $address, $age) {
  require('connection.php');
  $query = $conn->prepare("CALL UpdatePersonData(:personId, :personName, :personSurname, :personAge, :personAddress)");
  $query->bindParam(':personId', $id);
  $query->bindParam(':personName', $name);
  $query->bindParam(':personSurname', $surname);
  $query->bindParam(':personAddress', $address);
  $query->bindParam(':personAge', $age);
  $query->execute();
  $conn = null;
}

function delete_person($id) {
  require('connection.php');
  $query = $conn->prepare("CALL DeletePersonData(:personId)");
  $query->bindParam(':personId', $id);
  $query->execute();
  $conn = null;
}