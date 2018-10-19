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
            }else{
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
    });
}
