'use strict'
// document.addEventListener("DOMContentLoaded", getCommentarys);
let idbook =   document.querySelector(".id").id;
let templateCommentary;

fetch('js/templates/commentary.handlebars')
.then(response => response.text())
.then(template => {
  templateCommentary = Handlebars.compile(template); // compila y prepara el template

  getCommentarys();
});

function getCommentarys() {
  fetch(idbook + "/api/commentary")
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


function saveCommentary(form, event){
  event.preventDefault();

  var form_data = new FormData(form);
  console.log(form, form_data);
  if(form_data){
    fetch("api/commentary",{
      method : 'POST',
      headers:{"Content-Type":"application/json"},
      body: JSON.stringify(form_data)
    }).then(r => getCommentarys())
    .catch(error => console.log(error))
  }
}

function deleteCommentary(id_commentary){
  fetch("api/commentary"+id_commentary, {
    method : 'DELETE',
    headers:{"Content-Type":"application/json"},
  }).then(r => getCommentarys())
}
