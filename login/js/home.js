const logoutButton = document.getElementById('logout-button');


logoutButton.addEventListener('click', (e) => { 
  fetch('../login/backend/logout.php', { method: 'POST'})
  .then(res => res.json())
  .then(data => { 
    window.location.href = '../login/index.html';
  })
});