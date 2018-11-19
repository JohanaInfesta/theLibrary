"use strict"
let templateCommentary;
fetch('js/templates/commentary.handlebars')
.then(response => response.text())
.then(template => { //template = nombre que quiero
  templateCommentary = Handlebars.compile(template);//compila y deja listo para usar
  //llamar funcion que muestra las tareas
  getCommentarys();
});

function getCommentarys(){
  fetch("api/commentary")
  .then(response => {
    if(response.ok)
    return response.json();
  })
  .then(jsonCommentary => renderCommentary(jsonCommentary));
}

function renderCommentary(comentarios){
  let context = {//como el assing de smarty
    commentary: comentarios
  }
  let html = templateCommentary(context);
  document.querySelector("#listCommentary").innerHTML = html;
}
function postCommentary(form, event){

}
