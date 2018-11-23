'use strict';
$(document).ready(function () {
  navigate('http://localhost/theLibrary/booksList');
});

//Funciones Basicas
function navigate(url) {
  $.get(url, function (data) {
    $('.main-content').html(data);
    $('.cboxSuperUser').change(function () {
      let id_user = this.getAttribute('data-id');
      if (this.checked) {
        $.ajax({
          url: 'http://localhost/theLibrary/permisoSuperUser/'+ id_user + '/1',
          type: "POST",
          success: function (res) {
            console.log(JSON.parse(res));
            res = JSON.parse(res);
            if (res.message) {
              $("#mensaje").html($('<div class="alert alert-success" role="alert"></div>').append(res.message));
            } else if (res.error) {
              $("#mensaje").html($('<div class="alert alert-danger" role="alert"></div>').append(res.error));
            }
            //  let tplComments;
          },
          error: function (err) {
            console.error(err);
          }
        })
      }else if(id_user != this.id_user){
        $.ajax({
          url: 'http://localhost/theLibrary/permisoSuperUser/'+ id_user + '/0',
          type: "POST",
          success: function (res) {
            console.log(JSON.parse(res));
            res = JSON.parse(res);
            if (res.message) {
              $("#mensaje").html($('<div class="alert alert-success" role="alert"></div>').append(res.message));
            } else if (res.error) {
              $("#mensaje").html($('<div class="alert alert-danger" role="alert"></div>').append(res.error));
            }
          },
          error: function (err) {
            console.error(err);
          }
        })
      }
    });
  });
}

function navigatePost(url, data) {
  $.post(url, data, function (res) {
    $('.main-content').html(res);
    if(url.indexOf('book') != -1){
      startApi();
    }
  });
}

function login(form, event) {
  event.preventDefault();

  let form_data = new FormData(form);

  $.ajax({
    url: 'http://localhost/theLibrary/verifyUser',
    contentType: false,
    processData: false,
    data: form_data,
    type: "POST",
    success: function (res) {
      console.log(JSON.parse(res));
      res = JSON.parse(res);
      if (res.url) {
        window.location = res.url;
      } else if (res.error) {
        $("#mensajeLogin").html($('<div class="alert alert-danger" role="alert"></div>').append(res.error));
      }
    },
    error: function (err) {
      console.error(err);
    }
  });
}

function crearUser(form, event) {
  event.preventDefault();

  let form_data = new FormData(form);
  console.log(form, form_data);
  $.ajax({
    url: 'http://localhost/theLibrary/addUser',
    contentType: false,
    processData: false,
    data: form_data,
    type: "POST",
    success: function (res) {
      console.log(JSON.parse(res));
      res = JSON.parse(res);
      if (res.url) {
        window.location = res.url;
      } else if (res.error) {
        $("#mensajeRegistro").html($('<div class="alert alert-danger" role="alert"></div>').append(res.error));
      }
    },
    error: function (err) {
      console.error(err);
    }
  });
}

function deleteUser(id_usuario) {

  $.ajax({
    url: 'http://localhost/theLibrary/deleteUser/' + id_usuario,
    type: "DELETE",
    success: function (res) {
      $('#' + id_usuario).remove();
      console.log(JSON.parse(res));
      res = JSON.parse(res);
      if (res.message) {
        $("#mensaje").html($('<div class="alert alert-success" role="alert"></div>').append(res.message));
      } else if (res.error) {
        $("#mensaje").html($('<div class="alert alert-danger" role="alert"></div>').append(res.error));
      }
    },
    error: function (err) {
      console.error(err);
    }
  });
}

//Funciones Items

function deleteBook(id_book) {

  $.ajax({
    url: 'http://localhost/theLibrary/deleteBook/' + id_book,
    type: "DELETE",
    success: function (res) {
      $('#' + id_book).remove();
      console.log(JSON.parse(res));
      reloadBooks();
      res = JSON.parse(res);
      if (res.message) {
        $("#mensaje").html($('<div class="alert alert-success" role="alert"></div>').append(res.message));
      } else if (res.error) {
        $("#mensaje").html($('<div class="alert alert-danger" role="alert"></div>').append(res.error));
      }
    },
    error: function (err) {
      console.error(err);
    }
  })

}

function saveBook(form, event) {
  event.preventDefault();

  var form_data = new FormData(form);
  $.ajax({
    url: 'http://localhost/theLibrary/saveBook',
    contentType: false,
    processData: false,
    data: form_data,
    type: "POST",
    success: function (res) {
      console.log(JSON.parse(res));
      reloadBooks();
      res = JSON.parse(res);
      if (res.message) {
        $("#mensajeForm").html($('<div class="alert alert-success " role="alert"></div>').append(res.message));
      } else if (res.error) {
        $("#mensajeForm").html($('<div class="alert alert-danger" role="alert"></div>').append(res.error));
      }
    },
    error: function (err) {
      console.error(err);
    }
  });
}

function editBook(id_book) {
  navigate('http://localhost/theLibrary/editBook/' + id_book);
}

function deleteImage(id_image) {

  $.ajax({
    url: 'http://localhost/theLibrary/deleteBookImage/' + id_image,
    type: "DELETE",
    success: function (res) {
      $('#' + id_image).remove();
      console.log(JSON.parse(res));
      res = JSON.parse(res);
      if (res.message) {
        $("#mensajeForm").html($('<div class="alert alert-success" role="alert"></div>').append(res.message));
      } else if (res.error) {
        $("#mensajeForm").html($('<div class="alert alert-danger" role="alert"></div>').append(res.error));
      }
    },
    error: function (err) {
      console.error(err);
    }
  })
}

//Funciones Categorias

function saveAuthor(form, event) {
  event.preventDefault();

  let form_data = new FormData(form);
  $.ajax({
    url: 'http://localhost/theLibrary/saveAuthor',
    contentType: false,
    processData: false,
    data: form_data,
    type: "POST",
    success: function (res) {
      console.log(res);
      reloadAuthors();
      if (res.message) {
        $("#mensajeForm").html($('<div class="alert alert-success " role="alert"></div>').append(res.message));
      } else if (res.error) {
        $("#mensajeForm").html($('<div class="alert alert-danger" role="alert"></div>').append(res.error));
      }
    },
    error: function (err) {
      console.error(err);
    }
  });

}

function deleteAuthor(id_author) {

  $.ajax({
    url: 'http://localhost/theLibrary/deleteAuthor/' + id_author,
    type: "DELETE",
    success: function (res) {
      $('#' + id_author).remove();
      console.log(JSON.parse(res));
      reloadAuthors();
      res = JSON.parse(res);
      if (res.message) {
        $("#mensaje").html($('<div class="alert alert-success" role="alert"></div>').append(res.message));
      } else if (res.error) {
        $("#mensaje").html($('<div class="alert alert-danger" role="alert"></div>').append(res.error));
      }
    },
    error: function (err) {
      console.error(err);
    }
  });
}

function editAuthor(id_author) {
  navigate('http://localhost/theLibrary/editAuthor/' + id_author);
}

function reloadAuthors(){
  window.location = 'http://localhost/theLibrary/';
}
function reloadBooks(){
  window.location = 'http://localhost/theLibrary/';
}
