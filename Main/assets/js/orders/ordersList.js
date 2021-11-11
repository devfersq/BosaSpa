$(document).ready(function(){

	const postData = {
			activos: 0
	};

	$.ajax({
			url: '../logic/orders/ordersLists.php',
			type: 'POST',
			dataType: 'json',
			data: postData
	})
	.done(function(resp){
		//console.log(resp);
			$data = resp.data;
			$source = '';

			var clients = $data;
 
 
    $("#jsGrid").jsGrid({
        width: "100%",
        height: "400px",
				filtering: false,
        editing: false,
        inserting: true,
        sorting: true,
        paging: true,
        autoload: true,
        pageSize: 15,
        data: clients,
        fields: [
            { name: "IdOrden", title: "ID Orden", type: "text", width: 50, validate: "required" },
            { name: "Status", title: "Status", type: "text", width: 50 },
            { name: "Nombres", title: "Nombre",type: "text", width: 50 },
						{ name: "Paterno", title: "P.Parterno",type: "text", width: 50 },
						{ name: "Materno", title: "P.Materno",type: "text", width: 50 },
						{ name: "remaining", title: "Restante",type: "text", width: 50 },
						{ name: "totalPay",title: "Total a Pagar", type: "text", width: 50 },
						{ name: "Total",title: "Total", type: "text", width: 50 },
        ]
    });
			$.each($data, function() {
					$source += 
					'<tr>'+
							'<td scope="row" class="nr">'+$(this).attr("IdOrden")+'</td>'+
							'<td>'+$(this).attr("Status")+'</td>'+
							'<td>'+$(this).attr("GeneroFull")+'</td>'+
							'<td>'+$(this).attr("Telefono")+'</td>'+
							'<td>'+$(this).attr("Email")+'</td>'+
							'<td>'+$(this).attr("Nombres")+'</td>'+
							'<td>'+$(this).attr("Paterno")+'</td>'+
							'<td>'+$(this).attr("Materno")+'</td>'+
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

			$('#editModal').modal('show');
	});

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