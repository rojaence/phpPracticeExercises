<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/persons-list.css">
  <link rel="shortcut icon" href="assets/logo.svg" type="image/x-icon">
  <title>Listado</title>
</head>
<body>
  <header class="app-bar">
      <button class="menu-button" id="menu-button"></button>
      <h1 class="title">Listado de Personas</h1>
  </header>
  
  <nav class="main-nav main-nav--active" id="main-nav">
    <div class="main-nav__header">
      <h2 class="nav-title">CRUD 1</h2>
      <button class="menu-button menu-button--close" id="menu-button-close"></button>
    </div>
    <ul class="main-nav__list">
      <li class="main-nav__item">
        <a href="index.php" class="main-nav__link">
          <img src="assets/database-plus.svg" alt="icon" class="main-nav__icon">Ingreso</a>
      </li>
      <li class="main-nav__item">
        <a href="persons-list.php" class="main-nav__link main-nav__link--active"><img src="assets/database-search.svg" alt="icon" class="main-nav__icon">Listado</a>
      </li>
    </ul>
  </nav>

  <main class="main main--translate" id="main-content">
    <section class="table-container">
      <header class="table-header">
        <h2 class="table-title">Listado de Personas</h2>
        <input type="text" placeholder="Buscar" class="input" id="search-input">
        <button id="refresh-button" class="button button--icon warning">
          <img class="button_icon" src="assets/refresh.svg" alt="icon">
        </button>
        <button id="add-button" class="button success">Agregar</button>
      </header>
      <table class="table" id="table">
        <thead class="table__head">
          <tr class="table__row">
            <td class="table__data">Nombre</td>
            <td class="table__data">Apellido</td>
            <td class="table__data">Edad</td>
            <td class="table__data">Dirección</td>
            <td class="table__data">Acciones</td>
          </tr>
        </thead>

        <tbody class="table__body" id="table-body">
  
        </tbody>
      </table>
    </section>
  </main>
  <script src="js/template.js"></script>
  <script src="js/persons-list.js"></script>
  <script src="js/sweetalert.js"></script>
</body>
</html> 