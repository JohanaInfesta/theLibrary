"use strict"
let templateCommentary;
fetch('js/templates/commentary.handlebars')
.then(response => response.text())
.then(template => { //template = nombre que quiero
  templateCommentary = handlebars.compile(template);//compila y deja listo para usar
  //llamar funcion que muestra las tareas
  getCommentarys();
});

function getCommentarys(){
  fetch("api/commentary")
  .then(response => response.json())
  .then(jsonCommentary =>{
    showCommentarys(jsonCommentary);
  })
}

function showCommentary(Commentary){
  let context = {//como el assing de smarty
    Commentary: jsonCommentary
}
let html = templateCommentary(context);
document.querySelector("#").innerHTML = html;
}
