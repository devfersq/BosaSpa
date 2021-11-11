<!doctype html>
<html lang="es">
  <head>
  	<title>Agenda</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/schedule.css">
    <link rel="stylesheet" href="../assets/css/common.css">
    <script type="text/javascript">
      function showDetail(id) {
        $("#detailService").modal('show');
          const postData = {
                id: id
            };

            $.ajax({
                url: '../logic/schedule/appointmentgetdetail.php',
                type: 'POST',
                dataType: 'json',
                data: postData
            })
            .done(function(resp){
              $data = resp.data;
              if($data.length >= 1){
                $.each($data, function() {
                  $("#detailHeader").html("Folio Reservación: " + $(this).attr("Folio"));
                  $("#detailCliente").html($(this).attr("NombreCompleto"));
                  $("#detailServicio").html($(this).attr("Servicio"));
                  $("#detailPrecio").html("$ "+$(this).attr("Precio"));
                  $("#detailDescuento").html("$ "+$(this).attr("Descuento"));
                  $("#detailFinal").html("$ "+$(this).attr("Importe"));
                  $("#detailPagado").html("$ "+$(this).attr("ImportePagado"));
                  $("#detailPorPagar").html("$ "+$(this).attr("PorPagar"));
                  $("#detailId").val($(this).attr("IdVentaDetalle"));
                });
                }else{
                    showAlert("Ocurrio un error al recuperar la información del servicio");
                }
            })
            .fail(function(resp){
                console.log('Fail');
                console.log(resp);
            });
      }
    </script>

  </head>
  <body>
    <div id="master"></div>
    
    <div class="error alert alert-warning">
      <span id="idalert"></span>
    </div>

    <div class="float-right margin-top-right">
      <a class="btn btn-primary"  id="btnSetSchedule"><i class="fa fa-calendar"></i>  Agendar</a>
      <!-- <a class="btn btn-primary" href="appointment.php" role="button"><i class="fa fa-pen"></i>  Reservar</a> -->
    </div> 

    <div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                  
                  <input class="form-control mr-sm-2" type="text" placeholder="Search" id="inpSearch" />
                  <button class="btn btn-secondary my-2 my-sm-0" id="btnSearchPatients">Buscar</button>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body" id="customersFount" >
              </div>
            </div>
        </div>
    </div>

    <!-- Modal para agregar nueva Cita -->
    <div class="modal" id="scheduleModal">
      <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <legend>
              <h3 class="modal-title" id="patientH5">Cliente</h3>
              <label id="lblIdSaleDetail"></label>
            </legend>            
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <fieldset>
              <div class="form-group">
                <label for="patient_datetime">Servicio sin agendar</label>
                <select id="selectDetalles" class="custom-select">
                </select>
              </div>
              <div class="form-group">
                  <label for="patient_datetime">Fecha y Hora</label>
                  <div class="row margin-bottom">
                    <div class="col-lg-8">
                      <input type="date" class="form-control" id="schedule_date" required placeholder="Fecha">
                    </div>
                    <div class="col-lg-4">
                      <input type="time" class="form-control" id="schedule_hora" required placeholder="Hora">
                    </div>
                  </div>
                </div>
            </fieldset>
            
            <!-- <table id="tblFreeServices" class="table table-hover" >
              <thead>
                  <tr class="table-secondary">
                    <th scope="col">Folio</th>
                    <th scope="col">Servicio</th>
                    <th scope="col">Pagado</th>
                    <th scope="col" style="display:none;">IdVentaDetalle</th>
                    <th scope="col">Acciones</th>
                  </tr>
              </thead>
              <tbody id="tBody">

              </tbody>
          </table> -->
          </div>
          <div class="modal-footer">
            <button id="btnSetDateTime" type="button" class="btn btn-primary">Agendar</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Fin del modal para agrega nueva cita -->

      <!-- Reagendar servicio  -->
    <div class="modal" id="reagendarServicio">
      <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <legend>
              <h3 class="modal-title" id="patientH5">Reagendar Servicio</h3>              
            </legend>            
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <fieldset>
            <input  id="lblIdSaleDetail_reg" type="hidden"></input>
              <div class="form-group">
                  <label for="patient_datetime">Fecha y Hora</label>
                  <div class="row margin-bottom">
                    <div class="col-lg-8">
                      <input type="date" class="form-control" id="schedule_date_reg" required placeholder="Fecha">
                    </div>
                    <div class="col-lg-4">
                      <input type="time" class="form-control" id="schedule_hora_reg" required placeholder="Hora">
                    </div>
                  </div>
                </div>
            </fieldset>
          </div>
          <div class="modal-footer">
            <button id="btnReagendar" type="button" class="btn btn-primary">Reagendar</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal para agregar nueva Cita -->
    <div class="modal" id="detailService">
      <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">         
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <fieldset>
            <div class="card bg-light mb-3">
              <div id="detailHeader" class="card-header"></div>
              <div class="card-body">
                <table class="table table-hover">
                  <tr><td><h4 class="card-title">Cliente</h4></td><td><h4 id="detailCliente" class="card-title"></h4></td></tr>
                  <tr><td><h4 class="card-title">Servicio</h4></td><td><h4 id="detailServicio" class="card-title"></h4></td></tr>
                  <tr><td><h4 class="card-title">Precio</h4></td><td><h4 id="detailPrecio" class="card-title"></h4></td></tr>
                  <tr><td><h4 class="card-title">Descuento</h4></td><td><h4 id="detailDescuento" class="card-title"></h4></td></tr>
                  <tr><td><h4 class="card-title">Importe Final</h4></td><td><h4 id="detailFinal" class="card-title"></h4></td></tr>
                  <tr><td><h4 class="card-title">Importe Pagado</h4></td><td><h4 id="detailPagado" class="card-title"></h4></td></tr>
                  <tr><td><h4 class="card-title">Importe Por Pagar</h4></td><td><h4 id="detailPorPagar" class="card-title"></h4></td></tr>
                </table>
              </div>
            </div>
            </fieldset>
          </div>
          <div class="modal-footer">
            <input id="detailId" name="prodId" type="hidden" >
            <button id="" type="button" class="btn btn-primary">Pagar</button>
            <button id="btnCancelDetail" type="button" class="btn btn-secondary">Reagendar Cita</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Fin del modal para agrega nueva cita -->

      <div class="container-fluid">
  <header>
    <h4 class="display-4 mb-4 text-center">Mi Agenda</h4>
    <div class="row">
    <div class="col-lg-3"></div>
                            <div class="col-lg-3">
                                <select class="form-control" required id="monthSelect">
                                    <option value="1" >Enero</option>
                                    <option value="2" >Febrero</option>
                                    <option value="3" >Marzo</option>
                                    <option value="4" >Abril</option>
                                    <option value="5" >Mayo</option>
                                    <option value="6" >Junio</option>
                                    <option value="7" >Julio</option>
                                    <option value="8" >Agosto</option>
                                    <option value="9" >Septiembre</option>
                                    <option value="10" >Octubre</option>
                                    <option value="11" >Noviembre</option>
                                    <option value="12" >Diciembre</option>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <select class="form-control" required id="yearSelect">
                                    <option value="2021" >2021</option>
                                    <option value="2021" >2022</option>
                                </select>                    
                            </div>
                            <div class="col-lg-3">
                            <a class="btn btn-primary" id = "btnSearch"  role="button"><i class="fa fa-search"></i>  Cargar Agenda</a>
                            </div>
                        </div>
    <div class="row d-none d-sm-flex p-1 bg-dark text-white">
      <h5 class="col-sm p-1 text-center">Domingo</h5>
      <h5 class="col-sm p-1 text-center">Lunes</h5>
      <h5 class="col-sm p-1 text-center">Martes</h5>
      <h5 class="col-sm p-1 text-center">Miércoles</h5>
      <h5 class="col-sm p-1 text-center">Jueves</h5>
      <h5 class="col-sm p-1 text-center">Viernes</h5>
      <h5 class="col-sm p-1 text-center">Sábado</h5>
    </div>
  </header>
  <div class="row border border-right-0 border-bottom-0">
    <div id="d1" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate"></div>
    <div id="d2" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate"></div>
    <div id="d3" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate"></div>
    <div id="d4" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate"></div>
    <div id="d5" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate"></div>
    <div id="d6" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate"></div>
    <div id="d7" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate"></div>
    <div class="w-100"></div>
    <div id="d8" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate"></div>
    <div id="d9" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate"></div>
    <div id="d10" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate"></div>
    <div id="d11" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate"></div>
    <div id="d12" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate"></div>
    <div id="d13" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate"></div>
    <div id="d14" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate"></div>
    <div class="w-100"></div>
    <div id="d15" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate"></div>
    <div id="d16" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate"></div>
    <div id="d17" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate"></div>
    <div id="d18" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate"></div>
    <div id="d19" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate"></div>
    <div id="d20" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate"></div>
    <div id="d21" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate"></div>
    <div class="w-100"></div>
    <div id="d22" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate"></div>
    <div id="d23" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate"></div>
    <div id="d24" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate"></div>
    <div id="d25" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate"></div>
    <div id="d26" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate"></div>
    <div id="d27" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate"></div>
    <div id="d28" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate"></div>
    <div class="w-100"></div>
    <div id="d29" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate"></div>
    <div id="d30" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate"></div>
    <div id="d31" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate"></div>
    <div id="d32" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate"></div>
    <div id="d33" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate"></div>
    <div id="d34" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate"></div>
    <div id="d35" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate"></div>
    <div class="w-100"></div>
    <div id="d36" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate"></div>
    <div id="d37" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate"></div>
    <div id="d38" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate"></div>
    <div id="d39" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate"></div>
    <div id="d40" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate"></div>
    <div id="d41" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate"></div>
    <div id="d42" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate"></div>
  </div>

<!-- <div id="div_05_2021" class="row border border-right-0 border-bottom-0">
    <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate">
      <h5 class="row align-items-center">
        <span class="date col-1">25</span>
        <small class="col d-sm-none text-center text-muted">Sunday</small>
        <span class="col-1"></span>
      </h5>
      <p class="d-sm-none">No events</p>
    </div>
    <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate">
      <h5 class="row align-items-center">
        <span class="date col-1">26</span>
        <small class="col d-sm-none text-center text-muted">Monday</small>
        <span class="col-1"></span>
      </h5>
      <p class="d-sm-none">No events</p>
    </div>
    <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate">
      <h5 class="row align-items-center">
        <span class="date col-1">27</span>
        <small class="col d-sm-none text-center text-muted">Tuesday</small>
        <span class="col-1"></span>
      </h5>
      <p class="d-sm-none">No events</p>
    </div>
    <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate">
      <h5 class="row align-items-center">
        <span class="date col-1">28</span>
        <small class="col d-sm-none text-center text-muted">Wednesday</small>
        <span class="col-1"></span>
      </h5>
      <p class="d-sm-none">No events</p>
    </div>
    <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate">
      <h5 class="row align-items-center">
        <span class="date col-1">29</span>
        <small class="col d-sm-none text-center text-muted">Thursday</small>
        <span class="col-1"></span>
      </h5>
      <p class="d-sm-none">No events</p>
    </div>
    <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate">
      <h5 class="row align-items-center">
        <span class="date col-1">30</span>
        <small class="col d-sm-none text-center text-muted">Friday</small>
        <span class="col-1"></span>
      </h5>
      <p class="d-sm-none">No events</p>
    </div>
    <div id="d07" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
      <h5 class="row align-items-center">
        <span class="date col-1">1</span>
        <small class="col d-sm-none text-center text-muted">Saturday</small>
        <span class="col-1"></span>
      </h5>
    </div>
    <div class="w-100"></div>
    <div id="div_08" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
      <h5 class="row align-items-center">
        <span class="date col-1">02</span>
        <small class="col d-sm-none text-center text-muted">Sunday</small>
        <span class="col-1"></span>
      </h5>
      <p class="d-sm-none">No events</p>
    </div>
    <div id="div_09" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
      <h5 class="row align-items-center">
        <span class="date col-1">3</span>
        <small class="col d-sm-none text-center text-muted">Monday</small>
        <span class="col-1"></span>
      </h5>
      <p class="d-sm-none">No events</p>
    </div>
    <div id="div_10" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
      <h5 class="row align-items-center">
        <span class="date col-1">4</span>
        <small class="col d-sm-none text-center text-muted">Tuesday</small>
        <span class="col-1"></span>
      </h5>
      <p class="d-sm-none">No events</p>
    </div>
    <div id="div_11" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
      <h5 class="row align-items-center">
        <span class="date col-1">5</span>
      </h5>
      <a class="event d-block p-1 pl-2 pr-2 mb-1 rounded text-truncate small bg-success text-white" title="Test Event 2">Test Event 2</a>
      <a class="event d-block p-1 pl-2 pr-2 mb-1 rounded text-truncate small bg-danger text-white" title="Test Event 3">Test Event 3</a>
    </div>
    <div id="div_12" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
      <h5 class="row align-items-center">
        <span id="span_12" class="date col-1">06</span>
      </h5>
    </div>
    <div id="div_13" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
      <h5 class="row align-items-center">
        <span id="span_13" class="date col-1">07</span>
      </h5>
    </div>
    <div id="div_14" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
      <h5 class="row align-items-center">
        <span id="span_14" class="date col-1">08</span>
      </h5>
    </div>
    <div class="w-100"></div>
    <div id="09_05_2021" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
      <h5 class="row align-items-center">
        <span class="date col-1">9</span>
        <small class="col d-sm-none text-center text-muted">Sunday</small>
        <span class="col-1"></span>
      </h5>
      <p class="d-sm-none">No events</p>
    </div>
    <div id="10_05_2021" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
      <h5 class="row align-items-center">
        <span class="date col-1">10</span>
        <small class="col d-sm-none text-center text-muted">Monday</small>
        <span class="col-1"></span>
      </h5>
      <p class="d-sm-none">No events</p>
    </div>
    <div id="11_05_2021" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
      <h5 class="row align-items-center">
        <span class="date col-1">11</span>
        <small class="col d-sm-none text-center text-muted">Tuesday</small>
        <span class="col-1"></span>
      </h5>
      <p class="d-sm-none">No events</p>
    </div>
    <div id="12_05_2021" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
      <h5 class="row align-items-center">
        <span class="date col-1">12</span>
        <small class="col d-sm-none text-center text-muted">Wednesday</small>
        <span class="col-1"></span>
      </h5>
      <p class="d-sm-none">No events</p>
    </div>
    <div id="13_05_2021" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
      <h5 class="row align-items-center">
        <span class="date col-1">13</span>
        <small class="col d-sm-none text-center text-muted">Thursday</small>
        <span class="col-1"></span>
      </h5>
      <p class="d-sm-none">No events</p>
    </div>
    <div id="14_05_2021" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
      <h5 class="row align-items-center">
        <span class="date col-1">14</span>
        <small class="col d-sm-none text-center text-muted">Friday</small>
        <span class="col-1"></span>
      </h5>
      <p class="d-sm-none">No events</p>
    </div>
    <div id="15_05_2021" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
      <h5 class="row align-items-center">
        <span class="date col-1">15</span>
        <small class="col d-sm-none text-center text-muted">Saturday</small>
        <span class="col-1"></span>
      </h5>
      <p class="d-sm-none">No events</p>
    </div>
    <div class="w-100"></div>
    <div id="16_05_2021" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
      <h5 class="row align-items-center">
        <span class="date col-1">16</span>
        <small class="col d-sm-none text-center text-muted">Sunday</small>
        <span class="col-1"></span>
      </h5>
      <p class="d-sm-none">No events</p>
    </div>
    <div id="17_05_2021" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
      <h5 class="row align-items-center">
        <span class="date col-1">17</span>
        <small class="col d-sm-none text-center text-muted">Monday</small>
        <span class="col-1"></span>
      </h5>
      <a class="event d-block p-1 pl-2 pr-2 mb-1 rounded text-truncate small bg-primary text-white" title="Test Event with Super Duper Really Long Title">Test Event with Super Duper Really Long Title</a>
    </div>
    <div id="18_05_2021" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
      <h5 class="row align-items-center">
        <span class="date col-1">18</span>
        <small class="col d-sm-none text-center text-muted">Tuesday</small>
        <span class="col-1"></span>
      </h5>
      <p class="d-sm-none">No events</p>
    </div>
    <div id="19_05_2021" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
      <h5 class="row align-items-center">
        <span class="date col-1">19</span>
        <small class="col d-sm-none text-center text-muted">Wednesday</small>
        <span class="col-1"></span>
      </h5>
      <p class="d-sm-none">No events</p>
    </div>
    <div id="20_05_2021" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
      <h5 class="row align-items-center">
        <span class="date col-1">20</span>
        <small class="col d-sm-none text-center text-muted">Thursday</small>
        <span class="col-1"></span>
      </h5>
      <p class="d-sm-none">No events</p>
    </div>
    <div id="21_05_2021" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
      <h5 class="row align-items-center">
        <span class="date col-1">21</span>
        <small class="col d-sm-none text-center text-muted">Friday</small>
        <span class="col-1"></span>
      </h5>
      <p class="d-sm-none">No events</p>
    </div>
    <div id="22_05_2021" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
      <h5 class="row align-items-center">
        <span class="date col-1">22</span>
        <small class="col d-sm-none text-center text-muted">Saturday</small>
        <span class="col-1"></span>
      </h5>
      <p class="d-sm-none">No events</p>
    </div>
    <div class="w-100"></div>
    <div id="23_05_2021" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
      <h5 class="row align-items-center">
        <span class="date col-1">23</span>
        <small class="col d-sm-none text-center text-muted">Sunday</small>
        <span class="col-1"></span>
      </h5>
      <p class="d-sm-none">No events</p>
    </div>
    <div id="24_05_2021" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
      <h5 class="row align-items-center">
        <span class="date col-1">24</span>
        <small class="col d-sm-none text-center text-muted">Monday</small>
        <span class="col-1"></span>
      </h5>
      <p class="d-sm-none">No events</p>
    </div>
    <div id="25_05_2021" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
      <h5 class="row align-items-center">
        <span class="date col-1">25</span>
        <small class="col d-sm-none text-center text-muted">Tuesday</small>
        <span class="col-1"></span>
      </h5>
      <p class="d-sm-none">No events</p>
    </div>
    <div id="26_05_2021" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
      <h5 class="row align-items-center">
        <span class="date col-1">26</span>
        <small class="col d-sm-none text-center text-muted">Wednesday</small>
        <span class="col-1"></span>
      </h5>
      <p class="d-sm-none">No events</p>
    </div>
    <div id="27_05_2021" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
      <h5 class="row align-items-center">
        <span class="date col-1">27</span>
        <small class="col d-sm-none text-center text-muted">Thursday</small>
        <span class="col-1"></span>
      </h5>
      <p class="d-sm-none">No events</p>
    </div>
    <div id="28_05_2021" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate">
      <h5 class="row align-items-center">
        <span class="date col-1">28</span>
        <small class="col d-sm-none text-center text-muted">Friday</small>
        <span class="col-1"></span>
      </h5>
      <p class="d-sm-none">No events</p>
    </div>
    <div id="29_05_2021" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate">
      <h5 class="row align-items-center">
        <span class="date col-1">29</span>
        <small class="col d-sm-none text-center text-muted">Saturday</small>
        <span class="col-1"></span>
      </h5>
      <p class="d-sm-none">No events</p>
    </div>
    <div class="w-100"></div>
    <div id="30_05_2021" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate">
      <h5 class="row align-items-center">
        <span class="date col-1">30</span>
        <small class="col d-sm-none text-center text-muted">Sunday</small>
        <span class="col-1"></span>
      </h5>
      <p class="d-sm-none">No events</p>
    </div>
    <div id="31_05_2021" class="day col-sm p-2 border border-left-0 border-top-0 text-truncate">
      <h5 class="row align-items-center">
        <span class="date col-1">31</span>
        <small class="col d-sm-none text-center text-muted">Monday</small>
        <span class="col-1"></span>
      </h5>
      <p class="d-sm-none">No events</p>
    </div>
    <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate d-none d-sm-inline-block bg-light text-muted">
      <h5 class="row align-items-center">
        <span class="date col-1">1</span>
        <small class="col d-sm-none text-center text-muted">Tuesday</small>
        <span class="col-1"></span>
      </h5>
      <p class="d-sm-none">No events</p>
    </div>
    <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate d-none d-sm-inline-block bg-light text-muted">
      <h5 class="row align-items-center">
        <span class="date col-1">2</span>
        <small class="col d-sm-none text-center text-muted">Wednesday</small>
        <span class="col-1"></span>
      </h5>
      <p class="d-sm-none">No events</p>
    </div>
    <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate d-none d-sm-inline-block bg-light text-muted">
      <h5 class="row align-items-center">
        <span class="date col-1">3</span>
        <small class="col d-sm-none text-center text-muted">Thursday</small>
        <span class="col-1"></span>
      </h5>
      <p class="d-sm-none">No events</p>
    </div>
    <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate d-none d-sm-inline-block bg-light text-muted">
      <h5 class="row align-items-center">
        <span class="date col-1">4</span>
        <small class="col d-sm-none text-center text-muted">Friday</small>
        <span class="col-1"></span>
      </h5>
      <p class="d-sm-none">No events</p>
    </div>
    <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate d-none d-sm-inline-block bg-light text-muted">
      <h5 class="row align-items-center">
        <span class="date col-1">5</span>
        <small class="col d-sm-none text-center text-muted">Saturday</small>
        <span class="col-1"></span>
      </h5>
      <p class="d-sm-none">No events</p>
    </div>
  </div> -->

</div>

    <script src="//code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="../assets/js/common/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/common/master.js"></script>
    <script src="../assets/js/schedule/scheduleget.js"></script>
  </body>
</html>