"use strict"
let templateCommentary;
fetch('js/templates/commentary.handlebars')
.then(response => response.text())
.then(template => { //template = nombre que quiero
  templateCommentary = handlebars.compile(template);//compila y deja listo para usar
  //llamar funcion que muestra las tareas
  getCommentarys(id_book);
});

function getCommentarys(id_book){
  fetch("api/commentary" + id_book)
  .then(response => {
    if(response.ok)
    return response.json();
  })
  .then(jsonCommentary => renderCommentarys(jsonCommentary);
}

function renderCommentary(comentarios){
  let context = {//como el assing de smarty
    commentary: comentarios
  }
  let html = templateCommentary(context);
  document.querySelector("#listCommentary").innerHTML = html;
}
