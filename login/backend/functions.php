<?php

// Límite de intentos 
define('LIMIT_ATTEMPTS', 3);

function start_user_session() { 
  init_session();
  $_SESSION["usersession"] = true;
}

function init_session() { 
  if (session_status() !== PHP_SESSION_ACTIVE) { 
    session_start();
  }
}

function finish_user_session() { 
  init_session();
  session_destroy(); 
}

function get_auth_status() { 
  init_session();
  return isset($_SESSION["usersession"]);
}

function get_login_attempts($user_id) { 
  require('connection.php');
  $query = $conn->prepare("SELECT COUNT(*) AS attempts FROM login_attempts WHERE userId = :userId");
  $query->bindParam(':userId', $user_id);
  $query->execute();
  $result = $query->fetchObject();
  $attempts = $result->attempts;
  $conn = null;
  return $attempts;
}

function log_in_user($email, $provided_password) {
  require('connection.php');
  $query = $conn->prepare("SELECT userId, email, password FROM users WHERE email = :email");
  $query->bindParam(':email', $email);
  $query->execute();
  $user_data = $query->fetchObject();
  $conn = null;
  if ($user_data == null) {
    return 1; // Enviar mensaje 'El email no está registrado'
  } else { 
    $login_attempts = get_login_attempts($user_data->userId);
    if($login_attempts >= LIMIT_ATTEMPTS) { 
      return 3; // Enviar mensaje 'Ha superado el límite de intentos, contacte con administración'
    } else {
      if (password_verify($provided_password, $user_data->password)) {
        delete_login_attempts($user_data->userId);
        start_user_session();
        return 0; // Caso en el que la contraseña es correcta
      } else { 
        add_login_attempt($user_data->userId);
        return 2; // Enviar mensaje contraseña incorrecta
      }
    }
  }
}

function add_login_attempt($user_id) {
  require('connection.php');
  $query = $conn->prepare("INSERT INTO login_attempts(userId) VALUES(:userId)");
  $query->bindParam(':userId', $user_id);
  $query->execute();
  $conn = null;
}

function delete_login_attempts($user_id) {
  require('connection.php');
  $query = $conn->prepare("DELETE FROM login_attempts WHERE userId = :userId");
  $query->bindParam(':userId', $user_id);
  $query->execute();
  $conn = null;
}

