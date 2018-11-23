'use strict'
let templateComments;
function startApi(){

  fetch('js/templates/commentary.handlebars')
  .then(response => response.text())
  .then(templates => {
    templateComments = Handlebars.compile(templates); // compila y prepara el template
  })
  .then( t => getCommentarys());
}

function getCommentarys() {
  fetch("api/comment")
  .then(response => response.json())
  .then(jsonComment => viewCommentarys(filterComments(jsonComment)));
}

function filterComments(comments){
  let idbook = document.querySelector(".id").id;
  let result=[];
  comments.forEach(r=>{
    if(r.id_book == idbook){
      result.push(r);
    }
  });
  return result;
}

function viewCommentarys(jsonComment) {

  let context = { // como el assign de smarty
    comment: jsonComment,
  }
  let html = templateComments(context);
  $('.listCommentary').html(html);
}


function postComment(form, event){
  event.preventDefault();
  debugger;
  let score = document.getElementById("score");
  let scoreVal= score.options[score.selectedIndex].value;
  let comentario = {
    'id_comment' : document.getElementById("id_comment").value,
    'comment' : document.getElementById("comment").value,
    'score': scoreVal,
    'id_book' : document.getElementById("id_book").value,
    'id_user' : document.getElementById("id_user").value
  };
  // let info = {
  //   thing: comentario
  // };
  if(comentario){
    debugger;
    fetch("api/comment",{
      method : 'POST',
      headers:{"Content-Type":"application/json"},
      body: JSON.stringify(comentario)
    }).then(r => getCommentarys())
    .catch(error => console.log(error))
  }
}

function deleteCommentary(id){
    fetch("api/comment/" + id, {
      method : 'DELETE',
      headers:{"Content-Type":"application/json"}
    }).then(r => getCommentarys())
}

//function editarCommentario(id_comment)
