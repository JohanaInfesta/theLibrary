'use strict'
// document.addEventListener("DOMContentLoaded", getCommentarys);
let idbook =   document.querySelector(".id").id;
let templateComments;

fetch('js/templates/commentary.handlebars')
.then(response => response.text())
.then(templates => {
  templateComments = Handlebars.compile(templates); // compila y prepara el template

  getCommentarys();
});

function getCommentarys() {
  fetch("api/comment")
  .then(response => response.json())
  .then(jsonComment =>{
    viewCommentarys(jsonComment);
  })
  // .catch(error => console.log(error))
}

function viewCommentarys(jsonComment) {

  let context = { // como el assign de smarty
    comment: jsonComment
    }
  let html = templateComments(context);
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

//function editarCommentario(id_comment)
