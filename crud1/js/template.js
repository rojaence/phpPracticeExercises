const menuButtonClose = document.getElementById('menu-button-close');
const menuButton = document.getElementById('menu-button');
const mainNav = document.getElementById('main-nav');
const mainContent = document.getElementById('main-content');
const successColor = '#1565c0';
const errorColor = '#f44336';
const warningColor = '#ff9800';

menuButton.addEventListener('click', (e) => {
  e.preventDefault();
  if (mainNav.classList.contains('main-nav--active')) {
    mainNav.classList.remove('main-nav--active');
    mainContent.classList.remove('main--translate');
  } else {
    mainNav.classList.add('main-nav--active');
    mainContent.classList.add('main--translate');
  }
});

menuButtonClose.addEventListener('click', (e) => {
  mainNav.classList.remove('main-nav--active');
  menuButton.classList.remove('menu-button--active');
  mainContent.classList.remove('main--translate');
});


