$(document).ready(function(){

    const postData = {
        activos: 0
    };

    $.ajax({
        url: '../logic/patient/patientlist.php',
        type: 'POST',
        dataType: 'json',
        data: postData
    })
    .done(function(resp){
        $data = resp.data;
        $source = '';
        $.each($data, function() {
            $source += 
            '<tr>'+
                '<td scope="row" class="nr">'+$(this).attr("IdParteRole")+'</td>'+
                '<td>'+$(this).attr("NombreCompleto")+'</td>'+
                '<td>'+$(this).attr("GeneroFull")+'</td>'+
                '<td>'+$(this).attr("Telefono")+'</td>'+
                '<td>'+$(this).attr("Email")+'</td>'+
                '<td style="display:none;">'+$(this).attr("Nombres")+'</td>'+
                '<td style="display:none;">'+$(this).attr("Paterno")+'</td>'+
                '<td style="display:none;">'+$(this).attr("Materno")+'</td>'+
                '<td style="display:none;">'+$(this).attr("Calle")+'</td>'+
                '<td style="display:none;">'+$(this).attr("CodigoPostal")+'</td>'+
                '<td style="display:none;">'+$(this).attr("Ciudad")+'</td>'+
                '<td style="display:none;">'+$(this).attr("Estado")+'</td>'+
                '<td style="display:none;">'+$(this).attr("Genero")+'</td>'+
                '<td><button type="button" class="btn btn-link use-address"><i class="fa fa-edit"></i></button></td>'+
            '</tr>';
        });
        $("#tblContent tbody").append($source);
    })
    .fail(function(resp){
        console.log('Fail');
    });

    $('body').on('click', '.use-address', function() { 
        var $row = $(this).closest("tr");    // Find the row
        var $tds = $row.find("td");
        $("#patient_id").text($tds.eq(0).text());
        $("#patient_phone").val($tds.eq(3).text());
        $("#patient_email").val($tds.eq(4).text());
        $("#patient_name").val($tds.eq(5).text());
        $("#patient_lastname").val($tds.eq(6).text());
        $("#patient_momlastname").val($tds.eq(7).text());
        $("#patient_address").val($tds.eq(8).text());
        $("#patient_pc").val($tds.eq(9).text());
        $("#patient_city").val($tds.eq(10).text());
        $("#patient_state").val($tds.eq(11).text());
        $("#genderSelect").val($tds.eq(12).text());
        // console.log();
        // var index = 1;
        // $.each($tds, function() {
        //     // switch(index)
        //     console.log(index, $(this).text());
        //     index++;
        // });
        $('#editModal').modal('show');
    });


    // $(".use-address").click(function() {
    //     var $row = $(this).closest("tr");    // Find the row
    //     var $tds = $row.find("td");
    //     $("#patient_id").text($tds.eq(0).text());
    //     $("#patient_phone").val($tds.eq(3).text());
    //     $("#patient_email").val($tds.eq(4).text());
    //     $("#patient_name").val($tds.eq(5).text());
    //     $("#patient_lastname").val($tds.eq(6).text());
    //     $("#patient_momlastname").val($tds.eq(7).text());
    //     $("#patient_address").val($tds.eq(8).text());
    //     $("#patient_pc").val($tds.eq(9).text());
    //     $("#patient_city").val($tds.eq(10).text());
    //     $("#patient_state").val($tds.eq(11).text());
    //     $("#genderSelect").val($tds.eq(12).text());
    //     $('#editModal').modal('show');
    // });
    
    $("#btnAddCustomer").click(function() {
        $("#patient_id").text("Nuevo");
        $("#patient_phone").val("");
        $("#patient_email").val("");
        $("#patient_name").val("");
        $("#patient_lastname").val("");
        $("#patient_momlastname").val("");
        $("#patient_address").val("");
        $("#patient_pc").val("");
        $("#patient_city").val("");
        $("#patient_state").val("");
        $("#genderSelect").val("F");

        $('#editModal').modal('show');
    });
    
    $("#btnReloadPage").click(function() {
        location.reload();
    });

});