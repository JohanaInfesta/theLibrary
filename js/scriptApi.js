"use strict"
let templateComentarios;
fetch('js/templates/comentarios.handlebars')
.then(response => response.text())
.then(template => { //template = nombre que quiero
  templateComentarios = handlebars.compile(template);//compila y deja listo para usar
  //llamar funcion que muestra las tareas
  getComentarios();
});

function getComentarios(){
  fetch("apli/comentarios")
  .then(response => response.json())
  .then(jsonComentarios =>{
    mostrarComentarios(jsonComentarios);
  })
}

function mostrarComentarios(comentarios){
  let context = {//como el assing de smarty
    comentarios: jsonComentarios
}
let html = templateComentarios(context);
document.querySelector("#").innerHTML = html;
}
