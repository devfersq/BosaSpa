
$(document).ready(function () {

	$('.error').hide();
	function showAlert(message) {
		$("#idalert").text(message);
		$('.error').slideDown('slow');
		setTimeout(() => {
			$('.error').slideUp('slow');
		}, 3000);
	}

	function CalculeTotal() {
		$total = 0.0;
		$descuento = 0.00;
		$totalPagar = 0.00;
		$index = 0;
		$("#tblDetails > tbody > tr").each(function () {
			$total += Number($(this).find('td').eq(4).text());
			$index++;
		});
		if ($index >= 3) {
			$totalPagar = Number($total * 0.5);
			$descuento = Number($total * 0.5);
			$("#tblDetails > tbody > tr").each(function () {
				$final = Number($(this).find('td').eq(4).text());
				$(this).find('td').eq(3).text(Number($final * 0.5));
				$(this).find('td').eq(7).text(Number($final * 0.5));
			});
		} else {
			$totalPagar = $total;
			$descuento = 0.00;
		}
		$("#lblSubtotal").text("$ " + $total);
		$("#lblSubtotal").text("$ " + $total);
		$("#lblDescuento").text("$ " + $descuento);
		$("#lblTotalPagar").text("$ " + $totalPagar);
	}

	function CalculeTotalByDiscount() {
		$total = 0.0;
		$descuento = 0.00;
		$totalPagar = 0.00;
		$index = 0;
		$("#tblDetails > tbody > tr").each(function () {
			$total += Number($(this).find('td').eq(4).text());
			$totalPagar += Number($(this).find('td').eq(7).text());
		});
		$descuento = $total - $totalPagar;
		$("#lblSubtotal").text("$ " + $total);
		$("#lblDescuento").text("$ " + $descuento);
		$("#lblTotalPagar").text("$ " + $totalPagar);
	}


	$("#advanceCash").keyup(function () {
		let ingreso = $('#advanceCash').val();
		let totalCash = $('#totalCash').val();
		let resta  = (parseInt(totalCash) - parseInt(ingreso));;
		$('#totalRemaining').val(resta);
	});


	$("#advanceCard").keyup(function () {
		let ingreso = $('#advanceCard').val();
		let totalCash = $('#totalCard').val();
		let resta  = (parseInt(totalCash) - parseInt(ingreso));
		$('#totalRemainingCard').val(resta);
	});

	
	$("#advanceDepo").keyup(function () {
		let ingreso = $('#advanceDepo').val();
		let totalCash = $('#totalCashDepo').val();
		let resta  = (parseInt(totalCash) - parseInt(ingreso));
		$('#totalRemainingDepo').val(resta);
	});

	$("#modalCash").click(function () {
		$total = 0.0;
		$descuento = 0.00;
		$totalPagar = 0.00;
		$index = 0;
		var today = new Date();
		var dd = String(today.getDate()).padStart(2, '0');
		var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
		var yyyy = today.getFullYear();
		today = yyyy + '-' + mm + '-' + dd;
		$fecha = today; //$("#patient_date").val();
		$('#dateCash').val(today);

		$("#tblDetails > tbody > tr").each(function () {
			$total += Number($(this).find('td').eq(4).text());
			$index++;
		});
		if ($index >= 3) {
			$totalPagar = Number($total * 0.5);
			$descuento = Number($total * 0.5);
			$("#tblDetails > tbody > tr").each(function () {
				$final = Number($(this).find('td').eq(4).text());
				$(this).find('td').eq(3).text(Number($final * 0.5));
				$(this).find('td').eq(7).text(Number($final * 0.5));
			});
		} else {
			$totalPagar = $total;
			$descuento = 0.00;
		}
		$('#totalCash').val($totalPagar)
	});

	$("#modalCard").click(function () {
		$total = 0.0;
		$descuento = 0.00;
		$totalPagar = 0.00;
		$index = 0;
		var today = new Date();
		var dd = String(today.getDate()).padStart(2, '0');
		var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
		var yyyy = today.getFullYear();
		today = yyyy + '-' + mm + '-' + dd;
		$fecha = today; //$("#patient_date").val();
		$('#dateCard').val(today);

		$("#tblDetails > tbody > tr").each(function () {
			$total += Number($(this).find('td').eq(4).text());
			$index++;
		});
		if ($index >= 3) {
			$totalPagar = Number($total * 0.5);
			$descuento = Number($total * 0.5);
			$("#tblDetails > tbody > tr").each(function () {
				$final = Number($(this).find('td').eq(4).text());
				$(this).find('td').eq(3).text(Number($final * 0.5));
				$(this).find('td').eq(7).text(Number($final * 0.5));
			});
		} else {
			$totalPagar = $total;
			$descuento = 0.00;
		}
		$('#totalCard').val($totalPagar)
	});

	$("#modalDeposito").click(function () {
		$total = 0.0;
		$descuento = 0.00;
		$totalPagar = 0.00;
		$index = 0;
		var today = new Date();
		var dd = String(today.getDate()).padStart(2, '0');
		var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
		var yyyy = today.getFullYear();
		today = yyyy + '-' + mm + '-' + dd;
		$fecha = today; //$("#patient_date").val();
		$('#dateCashDepo').val(today);

		$("#tblDetails > tbody > tr").each(function () {
			$total += Number($(this).find('td').eq(4).text());
			$index++;
		});
		if ($index >= 3) {
			$totalPagar = Number($total * 0.5);
			$descuento = Number($total * 0.5);
			$("#tblDetails > tbody > tr").each(function () {
				$final = Number($(this).find('td').eq(4).text());
				$(this).find('td').eq(3).text(Number($final * 0.5));
				$(this).find('td').eq(7).text(Number($final * 0.5));
			});
		} else {
			$totalPagar = $total;
			$descuento = 0.00;
		}
		$('#totalCashDepo').val($totalPagar)
	});


	function DetailsCount() {
		$index = 0;
		$("#tblDetails > tbody > tr").each(function () {
			$index++;
		});
		return $index;
	}

	$("#btnAddDetail").click(function () {
		$area = $("#areaSelect").val().split("|");

		var today = new Date();
		var dd = String(today.getDate()).padStart(2, '0');
		var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
		var yyyy = today.getFullYear();
		today = yyyy + '-' + mm + '-' + dd;
		$fecha = today; //$("#patient_date").val();

		var dt = new Date();
		var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
		$hora = time; //$("#patient_hora").val();

		if ($area == "0") {
			showAlert("Seleccione un área");
		} else if ($fecha == "") {
			showAlert("Elige una fecha para tomar el servicio");
		} else if ($hora == "") {
			showAlert("Define una hora para tomar el servicio");
		} else {
			$source =
				'<tr>' +
				'<td>   <input class="form-check-input" type="checkbox" value="1" ></td>' +
				'<td>' + $("#areaSelect  option:selected").text() + '</td>' +
				'<td>' + $area[0] + '</td>' +
				'<td>' + $area[0] + '</td>' +
				'<td style="display:none;">' + $area[0] + '</td>' +
				'<td>' + $fecha + " " + $hora + '</td>' +
				'<td>' + $area[1] + '</td>' +
				'<td style="display:none;">' + $area[0] + '</td>' +
				'</tr>';
			$("#tblDetails tbody").append($source);
		}
		CalculeTotal();
	});

	$("#btnSearch").click(function () {
		$("#customersFount").html("")
		$('#searchModal').modal('show');
	});

	$('body').on('click', '.use-address', function () {
				const postData = {
			id: $(this).attr("Id")
		};
		$.ajax({
			url: '../logic/schedule/searchCustomerById.php',
			type: 'POST',
			dataType: 'json',
			data: postData
		})
			.done(function (resp) {
				$data = resp.data;
				if ($data.length >= 1) {
					$cus = $data[0];
					$("#patient_id").text($($cus).attr("IdParteRole"));
					$('.idCustomer').val($($cus).attr("IdParteRole"));
					$("#patient_name").val($($cus).attr("NombreCompleto"));
					$address = $($cus).attr("Calle") + ', ' + $($cus).attr("Ciudad") + ', ' + $($cus).attr("Estado") + ', ' + $($cus).attr("CodigoPostal");
					$("#patient_address").val($address);
					$("#patient_phone").val($($cus).attr("Telefono"));
					$("#patient_email").val($($cus).attr("Email"));
					$('#searchModal').modal('toggle');
				} else {
					alert("No se pudo recuperar el cliente seleccionado");
				}
			})
			.fail(function (resp) {
				alert("Ocurrio un error al recuperar al cliente");
			});
	})

	function dataUser(numero, string) {
		console.log(numero, string);
	}

	
	$("#btnSearchPatients").click(function () {
		if ($("#inpSearch").val() == "") {
			alert("Debe esècificar un filtro de bùsqueda");
		} else {
			const postData = {
				filter: $("#inpSearch").val()
			};

			$.ajax({
				url: '../logic/schedule/searchCustomer.php',
				type: 'POST',
				dataType: 'json',
				data: postData
			})
				.done(function (resp) {

					$data = resp.data;
					$dataDiv = '<div class="list-group">';
					$.each($data, function () {
						// '+$(this).attr("NombreCompleto")+'
						$dataDiv += '<button type="button" id="' + $(this).attr("IdParteRole") + '" class="btn btn-secondary btn-lg use-address">' + $(this).attr("NombreCompleto") + '</button>';
					});
					$dataDiv += '</div>';
					$("#customersFount").html($dataDiv)
				})
				.fail(function (resp) {
					console.log('Fail');
				});
		}
	});

	function SaveDetails(idVenta) {
		$("#tblDetails > tbody > tr").each(function () {
			$producto = $(this).find('td').eq(1).text();
			$precio = $(this).find('td').eq(4).text();
			$importe = $(this).find('td').eq(3).text();
			$fecha = $(this).find('td').eq(5).text();
			$nota = $(this).find('td').eq(6).text();

			const postDataDetail = {
				idVenta: idVenta,
				producto: $producto,
				precio: $precio,
				importe: $importe,
				fecha: $fecha,
				nota: $nota
			};

			console.log(postDataDetail);

			$.ajax({
				url: '../logic/schedule/appointmentdetail.php',
				type: 'POST',
				dataType: 'json',
				data: postDataDetail
			})
				.done(function (resp) {
					console.log('Done Detail ' + $producto);
					$data = resp.data;
					if ($data.length >= 1) {
						$app = $data[0];
					} else {
						showAlert("Ocurrio un error al agregar detalle a la venta" + idVenta);
					}
				})
				.fail(function (resp) {
					console.log('Fail', resp);
				});

		});
	}

	$("#btnSaveAppointment").click(function () {
		$id = $("#patient_id").text();
		// $fecha = $("#patient_date").val();
		$hora = '00:00'; //$("#patient_hora").val();
		$area = $("#areaSelect").val();
		var d = new Date();
		var month = d.getMonth() + 1;
		var day = d.getDate();

		$fecha = d.getFullYear() + '-' + (month < 10 ? '0' : '') + month + '-' + (day < 10 ? '0' : '') + day;
		if ($id == "") {
			showAlert("Debe seleccionar a un cliente");
		} else if (DetailsCount() <= 0) {
			showAlert("Debe especificar un área a tratar");
		} else {
			const postData = {
				idParteRole: $id,
				fecha: $fecha,
				hora: $hora
			};

			console.log(postData);

			$.ajax({
				url: '../logic/schedule/saveappointment.php',
				type: 'POST',
				dataType: 'json',
				data: postData
			}).done(function (resp) {
					console.log('Done');
					$data = resp.data;
					if ($data.length >= 1) {
						$app = $data[0];
						
						$("#resultModalText").text("Cita agendada correctamente con el folio " + $($app).attr("Folio"));
						$('#resultModal').modal('show');
						var idVenta = $($app).attr("IdVenta");
						SaveDetails(idVenta);
						console.log('test');
						console.log(idVenta);
						$('.idOrder').val(idVenta);
					} else {
						showAlert("Ocurrio un error al agendar la cita, intente más tarde");
					}
				})
				.fail(function (resp) {
					console.log('Fail', resp);
				});
		}
	});

	$("#btnAppointmentCreated").click(function () {
		$("#patient_id").text("");
		$("#patient_date").val("");
		$("#patient_hora").val("");
		$("#patient_name").val("");
		$("#patient_address").val("");
		$("#patient_phone").val("");
		$("#patient_email").val("");
		$("#areaSelect").val("Seleccione");
		$('#resultModal').modal('toggle');
		location.reload();
	});

	$("#btnshowpromos").click(function () {
		var items = DetailsCount();
		$("#promotionsSelect").html("");
		$source = '<option value="0">Seleccione</option>';
		$source += '<option value="0.10">10%</option>';
		$source += '<option value="0.20">20%</option>';
		$source += '<option value="0.30">30%</option>';
		$source += '<option value="0.40">40%</option>';
		if (items == 2 || items == 3) {
			$source += '<option value="0.50">50%</option>';
		}
		if (items >= 4) {
			$source += '<option value="0.50">50%</option>';
			$source += '<option value="0.60">60%</option>';
			// $source += '<option value="0.70">70%</option>';
			// $source += '<option value="0.80">80%</option>';
			// $source += '<option value="0.90">90%</option>';
			// $source += '<option value="1">100%</option>';
		}
		$("#promotionsSelect").append($source);
		$('#promotions').modal('show');
	});

	$("#btnApplyDiscount").click(function () {
		$desc = $("#promotionsSelect").val();
		$("#tblDetails > tbody > tr").each(function () {
			$valor = Number($(this).find('td').eq(7).text());
			$porcent = Number($desc);
			$discount = Number($valor * $porcent);
			$final = Number($valor - $discount);
			$(this).find('td').eq(3).text($final);
			$(this).find('td').eq(7).text($final);
		});
		CalculeTotalByDiscount();
		$('#promotions').modal('toggle');
	});

	$("#btndelete").click(function () {
		$finalRows = 0;
		$("#tblDetails > tbody > tr").each(function () {
			var checked = $(this).find("td:eq(0) input[type='checkbox']").is(':checked');
			if (!checked) {
				$finalRows++;
			}
		});
		$fullSource = "";
		$("#tblDetails > tbody > tr").each(function () {
			var checked = $(this).find("td:eq(0) input[type='checkbox']").is(':checked');
			if (!checked) {
				$importe = 0;
				if ($finalRows >= 3) {
					$importe = Number($(this).find('td').eq(3).text());
				} else {
					$importe = Number($(this).find('td').eq(2).text());
				}
				$fullSource +=
					'<tr>' +
					'<td><input class="form-check-input" type="checkbox"></td>' +
					'<td>' + $(this).find('td').eq(1).text() + '</td>' +
					'<td>' + $(this).find('td').eq(2).text() + '</td>' +
					'<td>' + $importe + '</td>' +
					'<td style="display:none;">' + $(this).find('td').eq(4).text() + '</td>' +
					'<td>' + $(this).find('td').eq(5).text() + '</td>' +
					'<td>' + $(this).find('td').eq(6).text() + '</td>' +
					'<td style="display:none;">' + $importe + '</td>' +
					'</tr>';
			}
		});
		$("#tblDetails tbody").html($fullSource);
		CalculeTotal();
	});
});



function payTotal(typePay) {
	console.log(typePay);
	let objPay = {
		cutomerID: '',
		orderID:'',
		paytotal:'',
		totalRemaining: '',
		dateCash: '',
		type:'',
		status:'',
		totalCash: '',
	}

	switch(typePay) {
		case 'cash':
			objPay.cutomerID = $('.idCustomer').val();
			objPay.orderID = $('.idOrder').val();
			objPay.paytotal = $('#advanceCash').val();
			objPay.totalRemaining = $('#totalRemaining').val();
			objPay.dateCash = $('#dateCash').val();
			objPay.type = typePay;
			objPay.status =  $('#advanceCash').val() == $('#totalCash').val() ? 'Completado' : 'Pendiente';
			objPay.totalCash = $('#totalCash').val();
		
			$.ajax({
				url: "../logic/pay/postPay.php",
				type: "POST",
				data: objPay,
				cache: false,
				success: function(dataResult){
					$('#cash').modal('hide');
				}
			});
			break;
		case 'card':
			objPay.cutomerID = $('.idCustomer').val();
			objPay.orderID = $('.idOrder').val();
			objPay.paytotal = $('#advanceCard').val();
			objPay.totalRemaining = $('#totalRemaining').val();
			objPay.dateCash = $('#dateCash').val();
			objPay.type = typePay;
			objPay.status =  $('#advanceCash').val() == $('#totalCard').val() ? 'Completado' : 'Pendiente';
			objPay.totalCash = $('#totalCard').val();
			$.ajax({
				url: "../logic/pay/postPay.php",
				type: "POST",
				data: objPay,
				cache: false,
				success: function(dataResult){
					$('#card').modal('hide');
				}
			});
			break;
		case 'Deposit':
			objPay.cutomerID = $('.idCustomer').val();
			objPay.orderID = $('.idOrder').val();
			objPay.paytotal = $('#advanceDepo').val();
			objPay.totalRemaining = $('#totalRemainingDepo').val();
			objPay.dateCash = $('#dateCashDepo').val();
			objPay.type = typePay;
			objPay.status =  $('#advanceCash').val() == $('#totalCashDepo').val() ? 'Completado' : 'Pendiente';
			objPay.totalCash = $('#totalCashDepo').val();
			$.ajax({
				url: "../logic/pay/postPay.php",
				type: "POST",
				data: objPay,
				cache: false,
				success: function(dataResult){
					$('#Deposit').modal('hide');
				}
			});
		break;
		default:
			// code block
	}
}



