const refreshButton = document.getElementById('refresh-button');
const addButton = document.getElementById('add-button');
const tableBody = document.getElementById('table-body');
const searchInput = document.getElementById('search-input');

refreshButton.addEventListener('click', async (e) => {
  fillData('all', '');
});

window.addEventListener('load', () => {
  fillData('all', '');
})

addButton.addEventListener('click', () => {
  const link = document.createElement('a');
  link.href = 'index.php';
  link.click();
})

searchInput.addEventListener('keyup', (e) => {
  if (searchInput.value === '') fillData('all', '');
  else fillData('param', searchInput.value.trim());
});


const fillData = async (searchType, value) => {
  let data = await getData(searchType, value);
  renderData(data);
}

const getData = async (searchType, value) => {
  try {
    const url = '../crud1/backend/getData.php';
    const formData = new FormData();
    formData.append('searchType', searchType);
    if (searchType === 'param') formData.append('param', value);
    if (searchType === 'id') formData.append('personId', value);
    const response = await fetch(url, { method: 'POST' , body: formData});
    const data = await response.json();
    return data
  } catch(error) {
    Swal.fire({
      icon: 'error',
      title: 'Error',
      text: 'Ocurrió un error al obtener los datos',
      confirmButtonColor: successColor,
      iconColor: errorColor
    });
    return null;
  }
}

const doDataAction = (action, id) => {
  if (action === 'delete') {
    Swal.fire({
      title: '¿Está seguro de eliminar el registro?',
      text: "¡Esta acción no se puede revertir!",
      icon: 'warning',
      showCancelButton: true,
      iconColor: warningColor,
      confirmButtonColor: successColor,
      cancelButtonColor: errorColor,
      confirmButtonText: 'Eliminar',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if (result.value) {
        deleteData(id);
      }
    })
  } else if (action === 'edit') {
    post(id);
  }
}

const post = async (personId) => {
  //Lleva a index.php por GET con el id de la persona
  const link = document.createElement('a');
  link.href = `index.php?id=${personId}`;
  link.click();
}

const deleteData = async (id) => {
  try {
    const url = '../crud1/backend/deleteData.php';
    const formData = new FormData();
    formData.append('personId', id);
    await fetch(url, { method: 'POST', body: formData });
    Swal.fire({
      title: 'Datos eliminados',
      text: 'Datos de persona eliminados correctamente',
      icon: 'success',
      confirmButtonColor: successColor,
      iconColor: successColor
    });
    fillData('all', '');
  } catch (error) {
    Swal.fire({
      icon: 'error',
      title: 'Error',
      text: 'Ocurrió un error al eliminar los datos',
      confirmButtonColor: successColor,
      iconColor: errorColor
    })
  }
}

const renderData = (data) => {
  tableBody.innerHTML = '';
  if (data.length > 0) {
    data.forEach(person => {
      const row = document.createElement('tr');
      row.innerHTML = `
        <td>${person.firstName}</td>
        <td>${person.lastName}</td>
        <td>${person.age}</td>
        <td>${person.address}</td>
        <td>
          <div class="button-group">
            <button class="button button--small error" data-id="${person.personId}" onclick="doDataAction('delete', ${person.personId})">Eliminar</button>
            <button class="button button--small primary" onclick="doDataAction('edit', ${person.personId})">Editar</button>
          </div>
        </td>
      `;
      tableBody.appendChild(row);
    });
  } else {
    const row = document.createElement('tr');
    row.innerHTML = `
      <td colspan="5" style="text-align: center; height: 80px;">No hay datos</td>
    `;
    tableBody.appendChild(row);
  }
}