$(document).ready(function(){
    
    $('.error').hide();

    function showAlert(message){
        $("#idalert").text(message);
        $('.error').slideDown('slow');
        setTimeout(() => {
            $('.error').slideUp('slow');
        }, 3000);  
    }

    $("#btnSearchCustomer").click(function() {        
        $("#customersFount").html("")
        $('#searchModal').modal('show');
    });

    $("#btnSearchPatients").click(function() {

        if ($("#inpSearch").val() == "")
        {
            alert("Debe esècificar un filtro de bùsqueda");
        }
        else
        {
            const postData = {
                filter: $("#inpSearch").val()
            };

            $.ajax({
                url: '../logic/schedule/searchCustomer.php',
                type: 'POST',
                dataType: 'json',
                data: postData
            })
            .done(function(resp){
                
                $data = resp.data;
                $dataDiv = '<div class="list-group">';
                $.each($data, function() {
                    $dataDiv += '<button type="button" id="'+$(this).attr("IdParteRole")+'" class="btn btn-secondary btn-lg use-address">'+$(this).attr("NombreCompleto")+'</button>';
                });
                $dataDiv += '</div>';
                $("#customersFount").html($dataDiv)
            })
            .fail(function(resp){
                console.log('Fail');
            });
        }
    });
    
    $('body').on('click', '.use-address', function() { 
        const postData = {
            id: $(this).attr("Id")
        };

        $("#patientH5").html("Paciente: " + $(this).text());

        $.ajax({
            url: '../logic/schedule/getfreeservices.php',
            type: 'POST',
            dataType: 'json',
            data: postData
        })
        .done(function(resp){
            console.log(resp.data);
            $data = resp.data;
            $source = '';
            $("#tblFreeServices tbody").html("");
            $("#selectDetalles").html("");
            $source = '<option value="0">--- Seleccione una servicio ---</option>';
            $.each($data, function() {
                $source += 
                '<option value="' + $(this).attr("IdVentaDetalle") + '">'+
                    $(this).attr("Folio") +' | ' +
                    $(this).attr("Nombre") +' | ' +
                    $(this).attr("PorPagar") +
                '</option>'
                // '<tr>'+
                //     '<td>'+$(this).attr("Folio")+'</td>'+
                //     '<td  scope="row" class="nr">'+$(this).attr("Nombre")+'</td>'+
                //     '<td>$ '+$(this).attr("ImportePagado")+'</td>'+
                //     '<td style="display:none;">'+$(this).attr("IdVentaDetalle")+'</td>'+
                //     '<td><button type="button" class="btn btn-link use-address"><i class="fa fa-calendar"></i></button></td>'+
                // '</tr>';
            });
            $("#selectDetalles").append($source);
            // $("#tblFreeServices tbody").append($source);
            $('#searchModal').modal('toggle');
            $("#scheduleModal").modal('show');
        })
        .fail(function(resp){
            console.log(resp);
            alert("Ocurrio un error al recuperar los servicios disponibles del cliente");
        });
    })

    $("#btnSearch").click(function() {
        LoadFullCalendar();
    });

    $("#btnSetSchedule").click(function(){
        $("#inpSearch").val("");
        $("#customersFount").html("")
        $('#searchModal').modal('show');
    });

    $("#btnSetDateTime").click(function(){

        $idVentaDetalle = $("#selectDetalles").val();
        $fecha = $("#schedule_date").val();
        $hora = $("#schedule_hora").val();

        if($idVentaDetalle == "0")
        {
            showAlert("Selecciona un servicio a agendar");
        }
        else if ($fecha == "")
        {
            showAlert("Elige una fecha para tomar el servicio");
        }
        else if ($hora == "")
        {
            showAlert("Define una hora para tomar el servicio");
        }
        else{
            const postData = {
                idVentaDetalle: $idVentaDetalle,
                fecha: $fecha + " " + $hora,
            };
            
            console.log(postData);
    
            $.ajax({
                url: '../logic/schedule/appointmentsetdate.php',
                type: 'POST',
                dataType: 'json',
                data: postData
            })
            .done(function(resp){
                $data = resp.data;
                if($data.length >= 1){
                    LoadFullCalendar();
                    $("#scheduleModal").modal('toggle');
                }else{
                    showAlert("Ocurrio un error al intentar agendar el servicio al cliente");
                }
            })
            .fail(function(resp){
                console.log('Fail');
            });
        }
    });

    $("#btnReagendar").click(function(){

        $idVentaDetalle = $("#lblIdSaleDetail_reg").text();
        $fecha = $("#schedule_date_reg").val();
        $hora = $("#schedule_hora_reg").val();

        if($idVentaDetalle == "0")
        {
            showAlert("Selecciona un servicio a agendar");
        }
        else if ($fecha == "")
        {
            showAlert("Elige una fecha para tomar el servicio");
        }
        else if ($hora == "")
        {
            showAlert("Define una hora para tomar el servicio");
        }
        else{
            const postData = {
                idVentaDetalle: $idVentaDetalle,
                fecha: $fecha + " " + $hora,
            };
console.log(postData);
            $.ajax({
                url: '../logic/schedule/appointmentsetdate.php',
                type: 'POST',
                dataType: 'json',
                data: postData
            })
            .done(function(resp){
                console.log(resp);
                $data = resp.data;
                if($data.length >= 1){
                    $("#reagendarServicio").modal('toggle');
                    LoadFullCalendar();
                }else{
                    showAlert("Ocurrio un error al intentar agendar el servicio al cliente");
                }
            })
            .fail(function(resp){
                console.log(resp);
                $("#reagendarServicio").modal('toggle');
                LoadFullCalendar();
            });
        }
    });

    function LoadFullCalendar(){
        ClearCalendar();
        var montht = $("#monthSelect").val();
        var year = $("#yearSelect").val();
        PreBuildCalendar(year, montht);
    }

    function ClearCalendar(){
        for (var i = 1; i <= 42; i++) {
            $("#d" + i).html("");;
        }
    }

    function PreBuildCalendar(year, month){
        $startindex = 0;
        $maxday = 0;
        if(month == "5" && year == "2021"){
            $startindex = 6;
            $maxday = 31;
        } else if(month == "6" && year == "2021"){
            $startindex = 2;
            $maxday = 30
        } else if(month == "7" && year == "2021"){
            $startindex = 4;
            $maxday = 31
        } else if(month == "8" && year == "2021"){
            $startindex = 0;
            $maxday = 31
        } else if(month == "9" && year == "2021"){
            $startindex = 3;
            $maxday = 30
        } else if(month == "10" && year == "2021"){
            $startindex = 6;
            $maxday = 30
        } else if(month == "11" && year == "2021"){
            $startindex = 1;
            $maxday = 30
        } else if(month == "12" && year == "2021"){
            $startindex = 3;
            $maxday = 31
        } else if(month == "1" && year == "2022"){
            $startindex = 6;
            $maxday = 31
        }
        BuildCalendar($startindex, $maxday);
        GetSource(year, month, $startindex);
    }

    function BuildCalendar(startindex, monthdays){
        for(i = 1; i <= monthdays; i++){
            $source = 
            '<h5 class="row align-items-center">' +
                '<span class="date col-1">'+ i +'</span>' +
            '</h5>';
            $("#d" + (startindex + i)).html($source);
        }
    }

    function GetSource(year, month, startindex){
        const postData = {
            month: month,
            year: year
        };

        $.ajax({
            url: '../logic/schedule/scheduleget.php',
            type: 'POST',
            dataType: 'json',
            data: postData
        })
        .done(function(resp) {           
            $data = resp.data;
            BuildFinalCalendar($data, startindex);
        })
        .fail(function(resp){
            console.log('Fail');
        });
    }

    function BuildFinalCalendar(data, starindex){
        $.each(data, function() {
            $data = $(this).attr("NombreCompleto") + ' ' + $(this).attr("Hora"); 
            $source = '<a id="detailClicked"  class="event d-block p-1 pl-2 pr-2 mb-1 rounded text-truncate small bg-success text-white" onclick="showDetail('+ $(this).attr("IdVentaDetalle")+');" title="' + $data +'">' + $data + '</a>';
            $dia = (Number(starindex) + Number($(this).attr("Dia")));
            $("#d" + $dia).append($source);
        });
    }

    $("#btnSupplyDetail").click(function() {        
        $idVentaDetalle = $("#detailId").val();
        const postData = {
            id: $idVentaDetalle,
            estatus: 3,
        };

        $.ajax({
            url: '../logic/schedule/appointmentchangestatus.php',
            type: 'POST',
            dataType: 'json',
            data: postData
        })
        .done(function(resp){
            $data = resp.data;
            if($data.length >= 1){
                LoadFullCalendar();
                $('#detailService').modal('toggle');
            }else{
                showAlert("Ocurrio un error al intentar surtir el beneficio");
            }
        })
        .fail(function(resp){
            console.log('Fail');
        });
    });

    $("#btnCancelDetail").click(function() {  
        $("#lblIdSaleDetail_reg").text($("#detailId").val());
        $('#detailService').modal('toggle');
        $('#reagendarServicio').modal('show');
        // $idVentaDetalle = $("#detailId").val();
        // const postData = {
        //     id: $idVentaDetalle,
        //     estatus: 4,
        // };

        // $.ajax({
        //     url: '../logic/schedule/appointmentchangestatus.php',
        //     type: 'POST',
        //     dataType: 'json',
        //     data: postData
        // })
        // .done(function(resp){
        //     $data = resp.data;
        //     if($data.length >= 1){
        //         LoadFullCalendar();
        //         $('#detailService').modal('toggle');
        //     }else{
        //         showAlert("Ocurrio un error al intentar surtir el beneficio");
        //     }
        // })
        // .fail(function(resp){
        //     console.log('Fail');
        // });    
    });

});