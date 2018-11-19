'use strict'
let templateCommentary;

let idbook =   document.querySelector(".id").id;

fetch('js/templates/commentary.handlebars')
.then(response => response.text())
.then(template => {
  templateCommentary = Handlebars.compile(template); // compila y prepara el template

  getCommentarys(idbook);
});

function getCommentarys() {
  fetch("api/commentary" )
  .then(response => response.json())
  .then(jsonComentarios => {
    viewCommentarys(jsonComentarios);
  })
}

function viewCommentarys(jsonCommentarys) {
  let context = { // como el assign de smarty
    commentary: jsonComentarios
  }
  let html = templateComentarios(context);
  document.querySelector("#listCommentary").innerHTML = html;
}
