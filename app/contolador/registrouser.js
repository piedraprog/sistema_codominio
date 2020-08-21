$(document).ready(function() {

    document.getElementById('admin-registro').style.display = "none";

    console.log('jquery is working!');

    //REGISTRO DEL ADMINISTRADOR
    $('#formulario-admin').submit(e => {

        e.preventDefault();

        const postData = {

            //INFORMACION DEL ADMINISTRADOR
            id: $('#admin-id').val(),

            nombre: $('#admin-nombre').val(),

            apellido: $('#admin-ape').val(),

            cedula: $('#admin-ced').val(),

            correo: $('#admin-correo').val(),

            pass: $('#admin-pass').val(),




        };

        const url = '../modelo/registro.php';

        console.log(url, postData);

        $.post(url, postData, (respuesta) => {

            console.log(respuesta);

            $('#formulario').trigger('reset');


        });

    });

    $('#formulario-user').submit(e => {

        e.preventDefault();

        const postData = {

            //INFORMACION DEL USUARIO
            idU: $('#user-id').val(),

            nombreU: $('#user-nombre').val(),

            apellidoU: $('#user-ape').val(),

            cedulaU: $('#user-ced').val(),

            correoU: $('#user-correo').val(),

            passU: $('#user-pass').val(),

        };

        const url = '../modelo/registro.php';

        console.log(url, postData);

        $.post(url, postData, (respuesta) => {

            console.log(respuesta);

            $('#formulario-user').trigger('reset');


        });




    });

})

function user_admin() {

    document.getElementById('user-registro').style.display = "none";
    document.getElementById('admin-registro').style.display = "block";

}

function admin_user() {
    document.getElementById('user-registro').style.display = "block";
    document.getElementById('admin-registro').style.display = "none";

}