$(document).ready(function() {

    //CUANDO CARGA LA PAGINA LO MUESTRA AUTOMATICAMENTE
    home();

    //console.log("query funciona");

    //FUNCION DESPLEGABLE DEL MENU LATERAL 
    $('#sidebarCollapse').on('click', function() {

        $('#sidebar').toggleClass('active');

    });

    //FUNCION PARA EL REGISTRO DEL CONDOMINIO 
    $('#registroCon').submit(e => {
        e.preventDefault();

        const postData = {
            idAdmin: $('#idAdmin').val(),
            nombre: $('#nom_condo').val(),
            ubicacion: $('#ubicacion').val(),
            codigoPostal: $('#cod_postal').val()
        }

        url = '../modelo/registrocondo.php'

        $.post(url, postData, (respuesta) => {
            console.log("si");
            console.log(respuesta);

            if (respuesta == "1") {

                $('#succesCondo').html(`<div class="row">
                <h1>Coondominio Creado con Exito</h1>
                <input type="button" value="Volver al inicio">
                </div>`);

                $('#registroCon').hide();
            }
        })
    })

    //REGISTRAR LAS CUOTAS
    $('#registro-cuota').submit(e => {
        e.preventDefault();

        const postData = {
            idCuota: $('#idcuota').val(),
            idAdmin: $('#idAdmin').val(),
            fec_creada: $('#fec_creada').val(),
            fec_vencimiento: $('#fec_vencimiento').val(),
            monto: $('#monto').val(),
            descripcion: $('#descripcion').val(),
            estado: $('#estado').val()
        }

        console.log(postData);
        url = '../modelo/registrocuota.php'

        $.post(url, postData, (respuesta) => {

            console.log(respuesta);

            if (respuesta == "1") {

                $('#succes-cuota').html(`<div class="row">
                <h4>Cuota Agregada con exito</h4>
                
                </div>`);

                $('#registrocuota').trigger('reset');

            }
        });
    });

});


function home() {

    $('#home').show();
    //PROPIETARIO
    $('#general-propietarios').hide();
    $('#deudor-propietario').hide();
    $('#vigente-propietario').hide();
    //CONDOMINIO
    $('#registro-condo').hide();
    $('#general-condo').hide();
    //CUOTAS
    $('#registro-cuota').hide();
    $('#general-cuota').hide();
    //OPCIONES
    $('#opciones').hide();
    //EXTRAS
    $('#perfil-user').hide();

}

/*************************************************** 
PROPIETARIOS// PROPIETARIOS PROPIETARIOS PROPIETARIOS PROPIETARIOS PROPIETARIOS PROPIETARIOS PROPIETARIOS 
**************************************************** */
//FUNCION QUE ME LISTA A TODOS LOS PROPIETARIOS EN MI CONDOMINIO
function propgen() {

    //ESCONDO EL CONTENIDO Y SOLO MUESTRO UNA OPCION 
    $('#home').hide();
    $('#general-propietarios').show();
    $('#deudor-propietario').hide();
    $('#vigente-propietario').hide();
    $('#registro-condo').hide();
    $('#perfil-user').hide();
    $('#general-condo').hide();
    $('#opciones').hide();
    $('#registro-cuota').hide();
    $('#general-cuota').hide();

    //FUNCION PARA LISTAR A LOS PROPIETARIOS
    const url = '../modelo/listarprop.php';
    data = {
            id: $('#idadmin').val()
        }
        //console.log(data)

    $.post(url, data, (respuesta) => {

        //console.log(respuesta)

        const propietarios = JSON.parse(respuesta);
        let template = '';

        propietarios.forEach((propietarios) => {

            if (propietarios.estado == 1) {

                propietarios.estado = "vigente";

            } else {
                propietarios.estado = "moroso";
            }
            template += `<tr>
                <td>${propietarios.id_propietario}</td>
                <td>${propietarios.nombre}</td>
                <td>${propietarios.apellido}</td>
                <td>${propietarios.nro_apto}</td>
                <td>${propietarios.estado}</td>
                </tr>
                `

        });

        $('#propi').html(template);
    });

}

//FUNCION QUE VA A LISTAR A LOS PROPIETARIOS MOROSOS
function propdeu() {

    $('#home').hide();
    $('#general-propietarios').hide();
    $('#deudor-propietario').show();
    $('#vigente-propietario').hide();
    $('#registro-condo').hide();
    $('#perfil-user').hide();
    $('#general-condo').hide();
    $('#opciones').hide();
    $('#registro-cuota').hide();
    $('#general-cuota').hide();

    //proceso para conseguir los propietarios morosos 

    const url = '../modelo/listarprop.php';
    data = {
        idmoroso: $('#idadmin').val()
    }
    console.log(data)

    $.post(url, data, (respuesta) => {

        //console.log(respuesta)

        const propietarios = JSON.parse(respuesta);
        let template = '';

        propietarios.forEach((propietarios) => {

            if (propietarios.estado == 0) {

                propietarios.estado = "moroso";

            }

            template += `<tr>
                <td>${propietarios.id_propietario}</td>
                <td>${propietarios.nombre}</td>
                <td>${propietarios.apellido}</td>
                <td>${propietarios.nro_apto}</td>
                <td>${propietarios.estado}</td>
                </tr>
                `

        });

        $('#moroso').html(template);
    });
}

//FUNCION QUE VA A LISTAR A LOS PROPIETARIOS VIGENTES
function propvige() {

    $('#home').hide();
    $('#general-propietarios').hide();
    $('#deudor-propietario').hide();
    $('#vigente-propietario').show();
    $('#registro-condo').hide();
    $('#perfil-user').hide();
    $('#general-condo').hide();
    $('#opciones').hide();
    $('#registro-cuota').hide();
    $('#general-cuota').hide();
    //proceso para conseguir los propietarios vigentes 
    const url = '../modelo/listarprop.php';
    data = {
        idvigente: $('#idadmin').val()
    }
    console.log(data)

    $.post(url, data, (respuesta) => {

        console.log(respuesta)

        const propietarios = JSON.parse(respuesta);
        let template = '';

        propietarios.forEach((propietarios) => {

            if (propietarios.estado == 1) {

                propietarios.estado = "vigente";

            }

            template += `<tr>
                <td>${propietarios.id_propietario}</td>
                <td>${propietarios.nombre}</td>
                <td>${propietarios.apellido}</td>
                <td>${propietarios.nro_apto}</td>
                <td>${propietarios.estado}</td>
                </tr>
                `

        });

        $('#vigente').html(template);
    });

}


/*************************************************** 
CONDOMINIO// CONDOMINIO CONDOMINIO CONDOMINIO CONDOMINIO CONDOMINIO CONDOMINIO CONDOMINIO CONDOMINIO 
**************************************************** */
//FUNCION PARA ENVIAR LA INFORMCION DE LOS CONDOMINIOS ADMINISRADOS POR EL MISMO ADMINISTRADOR 
function infogeneralcondo() {

    $('#home').hide();
    $('#general-propietarios').hide();
    $('#deudor-propietario').hide();
    $('#vigente-propietario').hide();
    $('#registro-condo').hide();
    $('#perfil-user').hide();
    $('#general-condo').show();
    $('#opciones').hide();
    $('#registro-cuota').hide();
    $('#general-cuota').hide();
    //console.log("lista")

    const url = '../modelo/listacondo.php';

    data = {
            ID: $('#idadminlist').val()
        }
        //console.log(data)

    $.post(url, data, (respuesta) => {

        //console.log(respuesta);

        const condominio = JSON.parse(respuesta);
        let template = '';

        condominio.forEach(condominio => {

            template += `<div class="row invoice-info">
                                <div class="col-12 ">
                                    <hr>
                                    <p class="lead ">Informacion</p>
                                    <div class="table-responsive ">
                                        <table class="table ">
                                            <tr>
                                                <th style="width:50% ">Nombre del Condominio:</th>
                                                <td>${condominio.name}</td>
                                            </tr>
                                            <tr>
                                                <th>Ubicacion:</th>
                                                <td>${condominio.ubicacion}</td>
                                            </tr>
                                            <tr>
                                                <th>Codigo Postal:</th>
                                                <td>${condominio.cod_postal}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                
                            </div>`
        });

        $('#tabla-infocondo').html(template);

    });

}

//FUNCION PÁRA MOSTRAR EL REGISTRO DE MI CONDOMINIO
function registrocondo() {

    $('#home').hide();
    $('#general-propietarios').hide();
    $('#deudor-propietario').hide();
    $('#vigente-propietario').hide();
    $('#registro-condo').show();
    $('#perfil-user').hide();
    $('#general-condo').hide();
    $('#opciones').hide();
    $('#registro-cuota').hide();
    $('#general-cuota').hide();
}

/*************************************************** 
CUOTAS// CUOTAS//CUOTAS//CUOTAS//CUOTAS//CUOTAS//CUOTAS//CUOTAS//CUOTAS//
**************************************************** */
//REGISTRO DE LA CUOTA
function registrocuota() {

    //PAGINA PRINCIPAL
    $('#home').hide();
    //PROPIETARIO
    $('#general-propietarios').hide();
    $('#deudor-propietario').hide();
    $('#vigente-propietario').hide();
    //CONDOMINIO
    $('#registro-condo').hide();
    $('#general-condo').hide();
    //CUOTAS
    $('#registro-cuota').show();
    $('#general-cuota').hide();
    //OPCIONES
    $('#opciones').hide();
    //EXTRAS
    $('#perfil-user').hide();


}

//INFORMACION GENERAL DE LAS CUOTAS
function generalcuota() {


    //PAGINA PRINCIPAL
    $('#home').hide();
    //PROPIETARIO
    $('#general-propietarios').hide();
    $('#deudor-propietario').hide();
    $('#vigente-propietario').hide();
    //CONDOMINIO
    $('#registro-condo').hide();
    $('#general-condo').hide();
    //CUOTAS
    $('#registro-cuota').hide();
    $('#general-cuota').show();
    //OPCIONES
    $('#opciones').hide();
    //EXTRAS
    $('#perfil-user').hide();

    //FUNCION DE MOSTRAR LAS CUOTAS REGISTRADAS EN EL CONDOMINIO

    const url = '../modelo/listarcuotas.php';

    data = {
        idadmin: $('#idadmin').val()
    }

    $.post(url, data, (respuesta) => {
        //console.log(respuesta);

        const cuota = JSON.parse(respuesta);
        let template = '';

        cuota.forEach((cuota) => {

            if (cuota.estado == 0) {

                cuota.estado = "vigente";

            }

            template += `<tr>
                <td>${cuota.id_cuota}</td>
                <td>${cuota.fecha_emi}</td>
                <td>${cuota.fecha_venci}</td>
                <td>${cuota.monto}</td>
                <td>${cuota.descripcion}</td>
                <td><label class="btn btn-block btn-success">${cuota.estado}</label></td>`


        });

        $('#cuotas').html(template);
    })
}

/*************************************************** 
OPCIONES//// OPCIONES// OPCIONES// OPCIONES// OPCIONES// OPCIONES// OPCIONES// OPCIONES// OPCIONES// 
**************************************************** */

function opciones() {

    $('#home').hide();
    $('#general-propietarios').hide();
    $('#deudor-propietario').hide();
    $('#vigente-propietario').hide();
    $('#registro-condo').hide();
    $('#perfil-user').hide();
    $('#general-condo').hide();
    $('#opciones').show();
    $('#registro-cuota').hide();
    $('#general-cuota').hide();




}




/*************************************************** 
EXTRAS//// EXTRAS// EXTRAS// EXTRAS// EXTRAS// EXTRAS// EXTRAS// EXTRAS// EXTRAS// 
**************************************************** */

function perfiluser() {

    $('#home').hide();
    $('#general-propietarios').hide();
    $('#deudor-propietario').hide();
    $('#vigente-propietario').hide();
    $('#registro-condo').hide();
    $('#perfil-user').hide();
    $('#general-condo').hide();
    $('#opciones').hide();
    $('#registro-cuota').hide();
    $('#general-cuota').hide();

}