<?php
include_once "backend/functions.php";
if (!get_auth_status()) { 
  header("Location: index.html");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/home.css">
  <link rel="shortcut icon" href="assets/favicon.png" type="image/x-icon">
  <title>Inicio</title>
</head>
<body>
  <header class="header">
    <h1 class="title">Inicio</h1>
    <div id="logout-button" class="logout-button">
      <img src="assets/logout.png" alt="icon" class="logout-button__icon">
      <span class="logout-button__text">Cerrar sesión</span>
    </div>
  </header>
  <main class="main">
    <section class="landing">
      <div class="landing__poster">
        <img src="assets/under-construction.png" alt="under construction" class="landing__image">
      </div>
      <article class="landing__header">
        <h2 class="landing__title">Página de inicio</h2>
        <h3 class="landing__subtitle">Sesión de usuario activa</h3>
      </article>
      <article class="under-construction">
        <h2 class="under-construction__title">Sitio web en construcción...</h3>
        <p class="under-construction__text">
          <figure class="logo">
            <img class="avatar" src="assets/montana.png" alt="logo">
          </figure>
          Esta es sólo una página para testear el redireccionamiento cuando un usuario haya iniciado sesión.
        </p>
      </article>
    </section>
  </main>
  <script src="js/home.js"></script>
</body>
</html>