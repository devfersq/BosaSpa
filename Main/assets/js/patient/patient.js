$(document).ready(function(){
    
    $('#frmCreate').submit(event => {
        event.preventDefault();
        var idParteRole = "0";
        var _id = $("#patient_id").text();
        if(_id != "Nuevo")
        {
            idParteRole = $("#patient_id").text();
        }
        console.log(idParteRole);
        const postData = {
            id: idParteRole,
            nombres: $("#patient_name").val(),
            paterno: $("#patient_lastname").val(),
            materno: $("#patient_momlastname").val(),
            genero: $("#genderSelect").val(),
            telefono: $("#patient_phone").val(),
            email: $("#patient_email").val(),
            calle: $("#patient_address").val(),
            codigoPostal: $("#patient_pc").val(),
            ciudad: $("#patient_city").val(),
            estado: $("#patient_state").val(),
            fotoPerfil: $("#patient_file").val(),
            fotoPiel: $("#patient_file").val(),
            documento: $("#patient_file").val(),
            activo: 1
        };
        console.log(postData);
        $.ajax({
            url: '../logic/patient/createpatient.php',
            type: 'POST',
            dataType: 'json',
            data: postData,
            beforeSend: function(){
            }
        })
        .done(function(resp){
            if(!resp.error){
                location.href = '../app/dashboard.php';
            }else{
                $('.error').slideDown('slow');
                setTimeout(() => {
                    $('.error').slideUp('slow');
                }, 3000);
            }
        })
        .fail(function(resp){
            if(resp.error){
                $("#modelText").text("Ocurrio un error al procesar el registro")
            }                
            else
            {
                // location.reload();
                $("#modelText").text("Paciente registrado con exito")
            }
            $('#editModal').modal('toggle');
            $('#actionModal').modal('show');
        });

    });

});