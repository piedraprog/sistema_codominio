$(document).ready(function() {

    //MUESTRA LA PAGINA INICIAL 
    registroprop();

    //FUNCION PARA EL SIDE BAR 
    $('#sidebarCollapse').on('click', function() {
        $('#sidebar').toggleClass('active');
    });


    //FUNCION PARA EL REGISTRO USUARIO COMO PROPIETARIO

    $('#registro_prop').submit(e => {
        e.preventDefault();


        const posData = {


            id_user: $('#id_user').val(),
            id_condo: $('#id_condo').val(),
            nombre: $('#apellido').val(),
            apellido: $('#nombre').val(),
            cedula: $('#cedula').val(),
            tlfn_casa: $('#nro_casa').val(),
            nro_apto: $('#nro_apto').val(),
            estado: $('#estado').val(),


        }

        const url = '../modelo/registroprop.php';
        console.log(posData);
        $.post(url, posData, (respuesta) => {

            console.log(respuesta)

            if (respuesta == "1") {

                $('#succesCondo').html(`<h2>Propietario registrado con exito</h2>`);

            } else {

                $('#succesCondo').html(`<h2>Error al registrar propietario o propietario ya existe</h2>`);
            }

            $('#registro_prop').trigger('reset');
        });
    });






});

function home() {
    $('#home').show();
    $('#registro-prop').hide();
    $('#registro-pago').hide();
    $('#opciones').hide();

    //AQUI ES LA FUNCION PARA MOSTRAR LOS DATOS DEL PROPIETARIO

    const url = '../modelo/infogeneralusuario.php';

    data = {
        id: $('#id_user').val()
    }

    $.post(url, data, (respuesta) => {

        //console.log(respuesta);
        const datos = JSON.parse(respuesta);
        let template = '';

        datos.forEach((datos) => {

            if (datos.estado == 1) {

                datos.estado = "vigente";

            } else {
                datos.estado = "moroso";
            }

            template = `<tr>
            <th style="width:50%">Nombre:</th>
            <td>${datos.nombre}</td>
            </tr>
            <tr>
                <th>Apellido:</th>
                <td>${datos.apellido}</td>
            </tr>
            <tr>
                <th>Cedula:</th>
                <td>${datos.cedula}</td>
            </tr>
            <tr>
                <th>Correo:</th>
                <td>${datos.correo}</td>
            </tr>
            
                    `
            template2 = ` 
            <tr>
                <th>Nombre del condominio</th>
                <td>${datos.nombre_condo}</td>
            </tr>
            <tr>
                <th style="width:50%">Numero de Apartamento</th>
                <td>${datos.nro_casa}</td>
            </tr>
            <tr>
                <th>Numero de casa:</th>
                <td>${datos.tlf_casa}</td>
            </tr>

            `

            template3 = `${datos.estado}`
        });

        $('#datos1').html(template);
        $('#datos2').html(template2);
        $('#estado').html(template3);

    })
}

function registroprop() {
    $('#home').hide();
    $('#registro-prop').show();
    $('#registro-pago').hide();
    $('#opciones').hide();


}

function resgistropago() {
    $('#home').hide();
    $('#registro-prop').hide();
    $('#registro-pago').show();
    $('#opciones').hide();
}

function opciones() {
    $('#home').hide();
    $('#registro-prop').hide();
    $('#registro-pago').hide();
    $('#opciones').show();
}