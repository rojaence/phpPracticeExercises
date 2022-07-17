const form = document.getElementById('form');
const saveButton = document.getElementById('save-button');
const cancelButton = document.getElementById('cancel-button');
const firstName = document.getElementById('first-name');
const lastName = document.getElementById('last-name');
const age = document.getElementById('age');
const address = document.getElementById('address');
const personId = document.getElementById('person-id');
const formTitle = document.getElementById('form-title');

form.addEventListener('submit', (e) => {
  e.preventDefault();
});

saveButton.addEventListener('click', (e) => {
  e.preventDefault();
  doSaveAction();
});

cancelButton.addEventListener('click', () => {
  resetForm();
  redirect('index.php');
});

const doSaveAction = () => {
  const data = {
    personId: personId.value || 0,
    firstName: firstName.value,
    lastName: lastName.value,
    age: age.value,
    address: address.value,
  };
  let validation = validateData(data);

  if (validation) {
    saveData(data);
  }
}

const saveData = async (data) => {
  const url = '../crud1/backend/saveData.php';
    const formData = new FormData();
    formData.append('personId', data.personId);
    formData.append('firstName', data.firstName);
    formData.append('lastName', data.lastName);
    formData.append('age', data.age);
    formData.append('address', data.address); 
    let response = await fetch(url, { method: 'POST', body: formData });
    let responseData = await response.json();

    if (responseData.success === true) {
      Swal.fire({
        title: 'Datos guardados',
        text: 'Datos guardados correctamente',
        icon: 'success',
        confirmButtonColor: successColor,
        iconColor: successColor
      }).then(() => {
        resetForm();
        if (data.personId === 0) {
          redirect('index.php');
        } else {
          redirect('persons-list.php');
        }
      });
    } else {
      Swal.fire({
        title: 'Error',
        text: responseData.message,
        icon: 'error',
        confirmButtonColor: errorColor,
        iconColor: errorColor
      });
    }
}

const resetForm = () => {
  firstName.value = '';
  lastName.value = '';
  age.value = '';
  address.value = '';
  formTitle.textContent = 'Nueva registro';
}

const redirect = (url) => {
  const link = document.createElement('a');
  link.href = url;
  link.click();
}

const validateData = (data) => {
  let regex = /^\d+$/;

  let validations = [];

  if (data.firstName === '') {
    validations.push('Ingrese el nombre');
  }
  if (data.lastName === '') {
    validations.push('Ingrese el apellido');
  }
  if (data.address === '') {
    validations.push('Ingrese la dirección');
  }

  if (!regex.test(String(data.age))) {
    validations.push('El valor de la edad no es válido');
  }

  if (validations.length > 0) {
    let message = '<h2>Error de validación</h2>';
    message += '<ul style="list-style: none; padding-left: 0;">';
    validations.forEach((validation) => {
      message += `<li> - ${validation}</li>`;
    })
    message += '</ul>';
    Swal.fire({
      icon: 'error',
      html: message,
      confirmButtonColor: successColor,
      iconColor: errorColor
    });
    return false;
  } else {
    return true;
  }
}