<!doctype html>
<html lang="es">

<head>
	<title>Crear Cita</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/common.css">
</head>

<body>
	<div id="master"></div>
	<div class="error alert alert-warning">
		<span id="idalert"></span>
	</div>
	<div class="row">
		<div class="col col-md-12">
			<div class="float-right margin-top-right margin-bottom">
				<a class="btn btn-primary" href="schedule.php" role="button"><i class="fa fa-calendar"></i> Consultar Agenda</a>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row justify-content-md-center">
			<div class="col col-md-5">
				<fieldset>
					<legend>Paciente</legend>
					<div class="row">
						<div class="col col-md-6 float-right">
							<label>Cliente ID:</label><label for="" class="badge badge-info identifier" id="patient_id"></label>
						</div>
						<div class="col col-md-6">
							<button type="button" class="btn btn-primary" id="btnSearch"><i class="fa fa-search"></i> Buscar paciente </button>
						</div>
					</div>
					<div class="form-group">
						<label for="patient_name">Nombre Completo</label>
						<input type="text" class="form-control" id="patient_name" disabled="">
					</div>
					<div class="form-group">
						<label for="patient_address">Dirección</label>
						<input type="text" class="form-control" id="patient_address" disabled="">
					</div>
					<div class="form-group">
						<label for="patient_phone">Teléfono</label>
						<input type="phone" class="form-control" id="patient_phone" disabled="">
					</div>
					<div class="form-group">
						<label for="patient_email">Correo Eléctronico</label>
						<input type="email" class="form-control" id="patient_email" disabled="">
					</div>
				</fieldset>
			</div>
			<div class="col col-md-5">
				<fieldset>
					<div class="card text-white bg-success mb-3">
						<div class="card-header">Totales</div>
						<div class="card-body">
							<Table class="">
								<tr>
									<td>Subtotal</td>
									<td>
										<label id="lblSubtotal">$ 0.00</label>
									</td>
								</tr>
								<tr>
									<td>IVA</td>
									<td>
										<label id="lblIva">$ 0.00</label>
									</td>
								</tr>
								<tr>
									<td>Descuento</td>
									<td>
										<label id="lblDescuento">$ 0.00</label>
									</td>
								</tr>
								<tr>
									<td>Total a Pagar </td>
									<td>
										<label id="lblTotalPagar">$ 0.00</label>
									</td>
								</tr>
							</Table>
						</div>
					</div>
				</fieldset>
				<fieldset>
					<legend>Tratamiento</legend>
					<div class="form-group">
						<label for="areaSelect">Área a tratar</label>
						<select class="form-control" id="areaSelect">
							<option value='0'>Seleccione</option>
							<option value='13600|15 Min'>ESPALDA </option>
							<option value='13600|10 Min'>PECHO</option>
							<option value='13600|15 Min'>ABDOMEN</option>
							<option value='13600|15 Min'>BRAZOS COMPLETOS</option>
							<option value='13600|25 Min'>PIERNAS COMPLETAS</option>
							<option value='11900|5 Min'>AXILA</option>
							<option value='11900|10 Min'>BIKINI</option>
							<option value='11900|15 Min'>MEDIA PIERNA</option>
							<option value='11900|10 Min'>MEDIOS BRAZOS</option>
							<option value='11900|10 Min'>MEDIA ESPALDA</option>
							<option value='11900|10 Min'>MEDIO ABDOMEN</option>
							<option value='11900|10 Min'>GLUTEO</option>
							<option value='11900|5 Min'>ENTREPECHO</option>
							<option value='11900|10 Min'>CARA COMPLETA</option>
							<option value='10400|5 Min'>MANOS</option>
							<option value='10400|5 Min'>PIES</option>
							<option value='10400|5 Min'>INTERGLUTEO</option>
							<option value='10400|5 Min'>PEZONES</option>
							<option value='10400|5 Min'>HOMBROS</option>
							<option value='10400|5 Min'>PATILLAS</option>
							<option value='10400|5 Min'>MEJILLAS</option>
							<option value='10400|5 Min'>BIGOTE</option>
							<option value='10400|5 Min'>MENTON</option>
							<option value='10400|5 Min'>FRENTE</option>
							<option value='10400|5 Min'>OREJAS</option>
							<option value='10400|5 Min'>NARIZ</option>
							<option value='10400|5 Min'>COXIS</option>
							<option value='10400|10 Min'>MEDIA CARA</option>
							<option value='10400|5 Min'>BARBA</option>
							<option value='10400|5 Min'>CUELLO</option>
							<option value='10400|5 Min'>NUCA</option>
						</select>
					</div>
					<div class="form-group">
						<!-- <label for="patient_datetime">Fecha y Hora</label> -->
						<div class="row margin-bottom">
							<!-- <div class="col-lg-6">
                  <input type="date" class="form-control" id="patient_date" required placeholder="Fecha">
                  </div>
                  <div class="col-lg-3">
                  <input type="time" class="form-control" id="patient_hora" required placeholder="Hora">
                  </div> -->
							<div class="col-lg-3">
								<button type="button" class="btn btn-primary margin-five" id="btnAddDetail"><i class="fa fa-plus">Agregar</i></button>
							</div>
						</div>
					</div>
					<legend>Formas de Pago</legend>
					<div class="form-group">
						<div class="row">
							<div class="col-lg-4">
								<button type="button" class="btn btn-primary margin-five" id="modalCash" type="button" data-toggle="modal" data-target="#cash"><i class="fa fa-plus">Efectivo</i></button>
							</div>
							<div class="col-lg-4">
								<button type="button" class="btn btn-primary margin-five"  id="modalCard"  type="button" data-toggle="modal" data-target="#card"><i class="fa fa-plus">Tarjeta</i></button>
							</div>
							<div class="col-lg-4">
								<button type="button" class="btn btn-primary margin-five" id="modalDeposito"  type="button" data-toggle="modal" data-target="#Deposit"><i class="fa fa-plus">Deposito</i></button>
							</div>
						</div>
					</div>
				</fieldset>
			</div>
		</div>
		<div class="row justify-content-md-center">
			<fieldset>
				<legend>Áreas a tratar</legend>
				<div class="row yellow">
				</div>
			</fieldset>
			<table id="tblDetails" class="table table-hover">
				<thead>
					<tr class="">
						<th scope="col" colspan="8">
							<button type="button" class="btn btn-link" id="btnshowpromos">Aplicar Descuento</button>
							<button type="button" class="btn btn-link" id="btndelete">Eliminar</button>
						</th>
					</tr>
				</thead>
				<thead>
					<tr class="table-secondary">
						<th scope="col"></th>
						<th scope="col">Área a tratar</th>
						<th scope="col">P. Unitario</th>
						<th scope="col">P. Final</th>
						<th scope="col" style="display:none;">valor</th>
						<th scope="col">Fecha</th>
						<th scope="col">Duración</th>
						<th scope="col" style="display:none;">importe</th>
					</tr>
				</thead>
				<tbody id="tBody">
				</tbody>
			</table>
		</div>
		<div class="row justify-content-end">
			<div class="col col-md-2 align-self-end">
				<button type="button" class="btn btn-primary margin-five" id="btnSaveAppointment"><i class="fa fa-save"> </i> Registrar</button>
			</div>
		</div>
	</div>
	<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="cashLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<input class="form-control mr-sm-2" type="text" placeholder="Search" id="inpSearch" />
					<button class="btn btn-secondary my-2 my-sm-0" id="btnSearchPatients">Buscar</button>
					<button type="button" class="Cancelar" data-dismiss="modal" aria-label="Cancelar">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body" id="customersFount">
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="resultModal" tabindex="-1" role="dialog" aria-labelledby="cashLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="cashLabel">Registro de Cita</h5>
					<button type="button" class="Cancelar" data-dismiss="modal" aria-label="Cancelar">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body" id="resultModalText">
				</div>
				<div class="modal-footer">
					<button type="button" id="btnAppointmentCreated" class="btn btn-secondary">Aceptar</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal" id="promotions">
		<div class="modal-dialog modal-md" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<legend>
						Agregar Descuento adicional
					</legend>
					<button type="button" class="Cancelar" data-dismiss="modal" aria-label="Cancelar">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="areaSelect">Descuento</label>
						<select class="form-control" id="promotionsSelect">
							<!-- <option value= '0'>Seleccione</option>
                  <option value='0.05'>5 %</option>
                  <option value='0.10'>10 %</option>
                  <option value='0.20'>20 %</option>
                  <option value='0.30'>30 %</option> 
                  <option value='0.40'>40 %</option> 
                  <option value='0.50'>50 %</option> 
                  <option value='0.60'>60 %</option> 
                  <option value='0.70'>70 %</option> 
                  <option value='0.80'>80 %</option> 
                  <option value='0.90'>90 %</option> 
                  <option value='1'>100 %</option>              -->
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button id="btnApplyDiscount" type="button" class="btn btn-primary">Aplicar</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="cash" tabindex="-1" role="dialog" aria-labelledby="cashLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="cashLabel">Pago en efectivo</h5>
					<button type="button" class="Cancelar" data-dismiss="modal" aria-label="Cancelar">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="target">
					<div class="form-group">
							<label>Id del Pedido</label>
							<input type="text" class="form-control idOrder" disabled>
						</div>
					<div class="form-group">
							<label>Id del Cliente</label>
							<input type="text" class="form-control idCustomer" disabled>
						</div>
						<div class="form-group">
							<label>Anticipo</label>
							<input type="number" class="form-control" id="advanceCash" >
						</div>
						<div class="form-group">
							<label>Saldo Restante</label>
							<input type="number" class="form-control" id="totalRemaining" disabled>
						</div>
						<div class="form-group">
							<label>Fecha de pago</label>
							<input type="date" class="form-control" id="dateCash" disabled>
						</div>
						<div class="form-group">
							<label>Costo total</label>
							<input type="number" class="form-control" id="totalCash">
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary btn-pay" onclick="payTotal('cash')">Pagar</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="card" tabindex="-1" role="dialog" aria-labelledby="cardLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="cardLabel">Pago con DIDI</h5>
					<button type="button" class="Cancelar" data-dismiss="modal" aria-label="Cancelar">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
					<div class="form-group">
							<label>Id del Pedido</label>
							<input type="text" class="form-control idOrder" disabled>
						</div>
					<div class="form-group">
							<label>Id del Cliente</label>
							<input type="text" class="form-control idCustomer" disabled>
						</div>
						<div class="form-group">
							<label>Anticipo</label>
							<input type="number" class="form-control" id="advanceCard" >
						</div>
						<div class="form-group">
							<label>Saldo Restante</label>
							<input type="number" class="form-control" id="totalRemainingCard" disabled>
						</div>
						<div class="form-group">
							<label>Fecha de pago</label>
							<input type="date" class="form-control" id="dateCard" disabled>
						</div>
						<div class="form-group">
							<label>Costo total</label>
							<input type="number" class="form-control" id="totalCard">
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary btn-pay" onclick="payTotal('card')">Pagar</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="Deposit" tabindex="-1" role="dialog" aria-labelledby="DepositLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="DepositLabel">Deposito</h5>
					<button type="button" class="Cancelar" data-dismiss="modal" aria-label="Cancelar">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
					<div class="form-group">
							<label>Id del Pedido</label>
							<input type="text" class="form-control idOrder" disabled>
						</div>
					<div class="form-group">
							<label>Id del Cliente</label>
							<input type="text" class="form-control idCustomer" disabled>
						</div>
						<div class="form-group">
							<label>Anticipo</label>
							<input type="number" class="form-control" id="advanceDepo">
						</div>
						<div class="form-group">
							<label>Saldo Restante</label>
							<input type="number" class="form-control" id="totalRemainingDepo" disabled>
						</div>
						<div class="form-group">
							<label>Fecha de pago</label>
							<input type="date" class="form-control" id="dateCashDepo" disabled>
						</div>
						<div class="form-group">
							<label>Costo total</label>
							<input type="number" class="form-control" id="totalCashDepo">
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary btn-pay" onclick="payTotal('Deposit')">Pagar</button>

				</div>
			</div>
		</div>
	</div>
	<script src="//code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="../assets/js/common/bootstrap.bundle.min.js"></script>
	<script src="../assets/js/common/master.js"></script>
	<script src="../assets/js/schedule/appointment.js"></script>
</body>

</html>