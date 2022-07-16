<?php
if(isset($_POST)) { 
  $email = $_POST['email'];
  $password = $_POST['password'];
  include_once('functions.php');
  $login_result = log_in_user($email, $password);
  
  $login_response = [
    'errorMessage' => '',
    'authStatus' => false
  ];
  if ($login_result == 1) { 
    $login_response['errorMessage'] = 'El correo no se encuentra registrado';
  } else if ($login_result == 2) { 
    $login_response['errorMessage'] = 'La contraseña es incorrecta';
  } else if ($login_result == 3) {
    $login_response['errorMessage'] = 'Ha superado el límite de intentos incorrectos, póngase en contacto con Administración';
  } else if ($login_result == 0) { 
    $login_response['errorMessage'] = '';
    $login_response['authStatus'] = true;
  }
  echo json_encode($login_response);
}


