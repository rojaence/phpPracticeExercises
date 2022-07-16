const loginForm = document.getElementById('login-form');
const emailInput = document.getElementById('email');
const passwordInput = document.getElementById('password');
const alert = document.getElementById('form-alert');
const submitButton = document.getElementById('submit-button');
const eyeButton = document.getElementById('eye-button');

loginForm.addEventListener('submit', (e) => { 
  e.preventDefault();
  const data = {
    email: emailInput.value,
    password: passwordInput.value
  };
  let validation = validateForm(data);
  if (validation) doLogin(data);
});

eyeButton.addEventListener('click', (e) => { 
  if (eyeButton.classList.contains('form-field__icon--active')) {
    eyeButton.classList.remove('form-field__icon--active');
    passwordInput.type = 'password';
  } else { 
    eyeButton.classList.add('form-field__icon--active');
    passwordInput.type = 'text';
  }
});

const doLogin = (userData) => { 
  const url = '../login/backend/login.php';
  const formData = new FormData();
  formData.append('email', userData.email);
  formData.append('password', userData.password);

  setSubmitButton(true);

  fetch(url, { method: 'POST', body: formData })
  .then(res => res.json())
  .then((data) => { 
    setSubmitButton(false);
    if (data.authStatus === true) { 
      window.location.href = '../login/home.php';
    } else { 
      showAlert(data.errorMessage, 'error');
    }
  })
  .catch(error => { 
    setSubmitButton(false);
    showAlert('Ha ocurrido un error', 'error');
    console.log(error);
  });
}

emailInput.addEventListener('keypress', (e) => {
  hideAlert();
})

passwordInput.addEventListener('keypress', (e) => {
  hideAlert();
})

const validateForm = (userData) => { 
  let emailRegex = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;
  if (!userData.email || !userData.password) { 
    showAlert('Ingrese todos los campos', 'warning');
    return false;
  } else {
    if (!emailRegex.test(userData.email)) { 
      showAlert('El correo electrónico no es válido', 'warning');
      return false;
    } else { 
      return true;
    }
  }
}

const showAlert = (message, color) => {
  alert.textContent = message;
  alert.classList.add(`alert--${color}`);
}

const hideAlert = () => { 
  alert.textContent = '';
  alert.classList.remove('alert--error');
  alert.classList.remove('alert--warning');
}

const setSubmitButton = (disabled) => { 
  if (disabled) { 
    submitButton.classList.add('submit-button--disabled');
    submitButton.setAttribute('disabled', '');
    submitButton.textContent = '';
  } else { 
    submitButton.classList.remove('submit-button--disabled');
    submitButton.removeAttribute('disabled');
    submitButton.textContent = 'Iniciar sesión';
  }
}