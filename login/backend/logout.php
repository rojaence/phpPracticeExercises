<?php
include_once "functions.php";
$finished = finish_user_session();
$finished = true;
echo json_encode($finished);
