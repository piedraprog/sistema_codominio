$(document).ready(function() {

    console.log('jquery is working!');

    $('#form_right').submit(e => {

        e.preventDefault();


        const postdata = {
            user: $('#correo').val(),
            pass: $('#pass').val()
        }


        if ($.trim(postdata.user).length > 0 && $.trim(postdata.pass).length > 0) {

            const url = '../modelo/log_verifica.php';

            console.log(postdata, url);

            $.post(url, postdata, (respuesta) => {

                console.log(respuesta);

                if (respuesta == 1) {

                    console.log("paso user");
                    $(location).attr('href', 'interfazUsuario.php');


                } else if (respuesta == 2) {

                    console.log("paso admin");
                    $(location).attr('href', 'interfazAdministrador.php');

                } else {

                    $('#mensaje').html(`<h3>ERROR EN LAS CREDENCIALES</h3>`);

                }


                $('#form_right').trigger('reset');


            })




        }

    })






});