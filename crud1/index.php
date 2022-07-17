<?php
$person_id = '';
$first_name = '';
$last_name = '';
$age = '';
$address = '';
$form_title = 'Nuevo registro';

require_once('backend/functions.php');

if(isset($_GET['id'])) {
  if ((int)$_GET['id']) {
    $person_id = $_GET['id'];
    $person = get_person_by_id($person_id);
    $first_name = $person['firstName'];
    $last_name = $person['lastName'];
    $age = $person['age'];
    $address = $person['address'];
    $form_title = 'Actualizar registro ' .'de ' .$first_name .' ' .$last_name;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/index.css">
  <link rel="shortcut icon" href="assets/logo.svg" type="image/x-icon">
  <title>Ingreso</title>
</head>
<body>
  <header class="app-bar">
      <button class="menu-button" id="menu-button"></button>
      <h1 class="title">Ingreso de Personas</h1>
  </header>
  
  <nav class="main-nav main-nav--active" id="main-nav">
    <div class="main-nav__header">
      <h2 class="nav-title">CRUD 1</h2>
      <button class="menu-button menu-button--close" id="menu-button-close"></button>
    </div>
    <ul class="main-nav__list">
      <li class="main-nav__item">
        <a href="index.php" class="main-nav__link main-nav__link--active">
          <img src="assets/database-plus.svg" alt="icon" class="main-nav__icon">Ingreso</a>
      </li>
      <li class="main-nav__item">
        <a href="persons-list.php" class="main-nav__link"><img src="assets/database-search.svg" alt="icon" class="main-nav__icon">Listado</a>
      </li>
    </ul>
  </nav>

  <main class="main main--translate" id="main-content">
    
      <form id="form" method="post" class="form">
        <h2 class="form__title"  id="form-title"><?php echo $form_title;?></h2>
        <div class="form__field form__field--id">
          <input type="hidden" type="hidden" class="form__input form__input" name="personId" id="person-id" value="<?php echo $person_id;?>">
          <label for="person-id" class="form__label">Id</label>
        </div>
        <div class="form__field">
          <input type="text" class="form__input" name="firstName" id="first-name" value="<?php echo $first_name;?>">
          <label for="first-name" class="form__label">Nombre</label>
        </div>
        <div class="form__field">
          <input type="text" class="form__input" name="lastName" id="last-name" value="<?php echo $last_name;?>">
          <label for="last-name" class="form__label">Apellido</label>
        </div>
        <div class="form__field">
          <input type="number" class="form__input" name="age" id="age" value="<?php echo $age;?>">
          <label for="age" class="form__label">Edad</label>
        </div>
        <div class="form__field form__field--textarea">
          <textarea id="address" cols="30" rows="10" name="address" class="form__input form__input--textarea"><?php echo $address;?></textarea>
          <label for="address">Dirección</label>
        </div>
        <div class="form__actions">
          <button class="button error" id="cancel-button">Cancelar</button>
          <button class="button success" type="submit" id="save-button">Guardar</button>
        </div>
      </form>
  </main>

  <script src="js/template.js"></script>
  <script src="js/index.js"></script>
  <script src="js/sweetalert.js"></script>
</body>
</html> 
