<?php
require_once('functions.php');
if (isset($_POST)) {
  $search_type = $_POST['searchType'];
  $result;
  try {
    if ($search_type == 'all') {
      $result = get_all_persons();
    } else if ($search_type == 'id') {
      $person_id = $_POST['personId'];
      $result = get_person_by_id($person_id);
    } else if ($search_type == 'param') {
      $param = $_POST['param'];
      $result = search_persons($param);
    }
    echo json_encode($result);
  } catch(PDOException $e) {
    echo 'Failed connection' .$e->getMessage();
  }
  /* $query_type = $_POST['queryType'];
  $query_text = "";
  if ($query_type = 'all') {  
    $query_text = 'CALL GetAllPersons()';
  } else if ($query_type = 'id') {
    $query_text = 'CALL GetPersonData(:perId)';
  }
  try {
    require('connection.php');
    $query = $conn->prepare($query_text);
    if ($queryType = 'id') {
      $query->bindParam(':perId', $_POST['personId']);
    }
    $query->execute();
    $result = $query->fetchAll();
    $conn = null;
    echo json_encode($result);
  } catch(PDOException $e) {
    echo 'Failed connection' .$e->getMessage();
  } */
}