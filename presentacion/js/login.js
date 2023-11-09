let username;

fetch('../persistencia/usuarioJSON.php')
  .then((response) => response.json())
  .then((jsonUser) => {
    username = jsonUser;
    console.log(username);
  });

document.addEventListener('DOMContentLoaded', () => {});

//FUNCIONES
