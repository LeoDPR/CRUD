//Funciones para mostrar u ocultar formularios.
function mostrar_agregarAutor() {
  document.getElementById('agregar__autor').classList.remove("hidden");
  document.getElementById('registrar__articulo').classList.add("hidden");
  document.getElementById('registrar__evento').classList.add("hidden");
  document.getElementById('registrar__libro').classList.add("hidden");
  document.getElementById('registrar__investigacion').classList.add("hidden");
}

function mostrar_registrarArticulo() {
  document.getElementById('agregar__autor').classList.add("hidden");
  document.getElementById('registrar__articulo').classList.remove("hidden");
  document.getElementById('registrar__evento').classList.add("hidden");
  document.getElementById('registrar__libro').classList.add("hidden");
  document.getElementById('registrar__investigacion').classList.add("hidden");
}

function mostrar_registrarEvento() {
  document.getElementById('agregar__autor').classList.add("hidden");
  document.getElementById('registrar__articulo').classList.add("hidden");
  document.getElementById('registrar__evento').classList.remove("hidden");
  document.getElementById('registrar__libro').classList.add("hidden");
  document.getElementById('registrar__investigacion').classList.add("hidden");
}

function mostrar_registrarLibro() {
  document.getElementById('agregar__autor').classList.add("hidden");
  document.getElementById('registrar__articulo').classList.add("hidden");
  document.getElementById('registrar__evento').classList.add("hidden");
  document.getElementById('registrar__libro').classList.remove("hidden");
  document.getElementById('registrar__investigacion').classList.add("hidden");
}

function mostrar_registrarInvestigacion() {
  document.getElementById('agregar__autor').classList.add("hidden");
  document.getElementById('registrar__articulo').classList.add("hidden");
  document.getElementById('registrar__evento').classList.add("hidden");
  document.getElementById('registrar__libro').classList.add("hidden");
  document.getElementById('registrar__investigacion').classList.remove("hidden");
}

//Funcion para activar formulario

function mostrar_ocultar_formulario(clase, id_select) {
  var autorSelect = document.getElementById(id_select);
  var formFields = document.querySelectorAll("label, input, textarea, button, select");

  if (autorSelect.value != "0") {
    formFields.forEach(function (field) {
      field.style.display = "block";
    });
  } else {
    formFields.forEach(function (field) {
      if (field.className == clase && field.id != id_select) {
        field.style.display = "none";
      }
    });
  }
}

//Funcion para guardar temporalmente los valores del select mientras se este en la pagina principal.
//Funcion para Agregar otro autor
let authorIndex = 0;

function agregarAutor(clase, id_select) {
  authorIndex++;
  // --Crea un nuevo elemento de selección de lista desplegable
  var nuevoSelect = document.createElement('select');
  nuevoSelect.name = 'autor' + authorIndex; // Cambia 'autor2' a la columna que corresponda en tu base de datos
  nuevoSelect.id = id_select + authorIndex; // Cambia 'autor2' a un ID único para el elemento de selección de lista desplegable
  nuevoSelect.className = clase

  // --Agrega las opciones del primer dropdownlist
  var opciones = document.getElementById(id_select).innerHTML;
  nuevoSelect.innerHTML = opciones;

  // --Agrega el nuevo elemento de selección de lista desplegable al contenedor
  var contenedor = document.getElementById('autores-container-' + clase);
  contenedor.appendChild(nuevoSelect);
}

//Funcion para Agregar asociados
let asociadoIndex = 0;

function agregarAsociado(clase, id_select) {

  // --Crea un nuevo elemento de selección de lista desplegable
  var nuevoSelect = document.createElement('select');
  if (asociadoIndex == 0) {
    nuevoSelect.name = 'asociado'; // Cambia 'asociado2' a la columna que corresponda en tu base de datos
    nuevoSelect.id = id_select; // Cambia 'asociado2' a un ID único para el elemento de selección de lista desplegable
  } else {
    nuevoSelect.name = 'asociado' + asociadoIndex; // Cambia 'asociado2' a la columna que corresponda en tu base de datos
  nuevoSelect.id = id_select + asociadoIndex; // Cambia 'asociado2' a un ID único para el elemento de selección de lista desplegable
  }
  nuevoSelect.className = clase

  // --Agrega las opciones del primer dropdownlist
  var opciones = document.getElementById(id_select).innerHTML;
  nuevoSelect.innerHTML = opciones;

  // --Agrega el nuevo elemento de selección de lista desplegable al contenedor
  var contenedor = document.getElementById('asociados-container-' + clase);
  contenedor.appendChild(nuevoSelect);
  asociadoIndex++;
}