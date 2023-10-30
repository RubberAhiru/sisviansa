
fetch('../persistencia/viandaJSON.php')
.then(response => response.json())
.then(jsonData => {
//Utilizar jSON
console.log(jsonData); //ej. para ver objeto en consola

})