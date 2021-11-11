<!doctype html>
<html lang="es">
  <head>
  	<title>Registro Paciente</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/common.css">
    <link rel="stylesheet" href="../assets/css/picture_profile.css">
  </head>
  <body>
    <div id="master"></div>

    <div class="container-fluid margin-top">
        <div class="row">
            <div class="col-lg-10">
                <legend class="d-flex justify-content-center">Registro Paciente</legend>
            </div>
            <div class="col-lg-2">
                <button type="button" class="btn btn-link d-flex justify-content-end">Lista Pacientes</button>
            </div>
        </div>
        
        <form action="" id="frmCreate" >
            <div class="row">
                <div class="col-lg-4">
                    
                    <div class="picture-container">
                        <div class="picture circle">
                            <img src="https://lh3.googleusercontent.com/LfmMVU71g-HKXTCP_QWlDOemmWg4Dn1rJjxeEsZKMNaQprgunDTtEuzmcwUBgupKQVTuP0vczT9bH32ywaF7h68mF-osUSBAeM6MxyhvJhG6HKZMTYjgEv3WkWCfLB7czfODidNQPdja99HMb4qhCY1uFS8X0OQOVGeuhdHy8ln7eyr-6MnkCcy64wl6S_S6ep9j7aJIIopZ9wxk7Iqm-gFjmBtg6KJVkBD0IA6BnS-XlIVpbqL5LYi62elCrbDgiaD6Oe8uluucbYeL1i9kgr4c1b_NBSNe6zFwj7vrju4Zdbax-GPHmiuirf2h86eKdRl7A5h8PXGrCDNIYMID-J7_KuHKqaM-I7W5yI00QDpG9x5q5xOQMgCy1bbu3St1paqt9KHrvNS_SCx-QJgBTOIWW6T0DHVlvV_9YF5UZpN7aV5a79xvN1Gdrc7spvSs82v6gta8AJHCgzNSWQw5QUR8EN_-cTPF6S-vifLa2KtRdRAV7q-CQvhMrbBCaEYY73bQcPZFd9XE7HIbHXwXYA=s200-no" class="picture-src" id="profilePicturePreview" title="">
                            <input type="file" id="profile-picture" class="">
                        </div>
                        <h6 class="">Foto de perfil</h6>
                    </div>
                    <div class="picture-container">
                        <div class="picture">
                            <img src="https://lh3.googleusercontent.com/LfmMVU71g-HKXTCP_QWlDOemmWg4Dn1rJjxeEsZKMNaQprgunDTtEuzmcwUBgupKQVTuP0vczT9bH32ywaF7h68mF-osUSBAeM6MxyhvJhG6HKZMTYjgEv3WkWCfLB7czfODidNQPdja99HMb4qhCY1uFS8X0OQOVGeuhdHy8ln7eyr-6MnkCcy64wl6S_S6ep9j7aJIIopZ9wxk7Iqm-gFjmBtg6KJVkBD0IA6BnS-XlIVpbqL5LYi62elCrbDgiaD6Oe8uluucbYeL1i9kgr4c1b_NBSNe6zFwj7vrju4Zdbax-GPHmiuirf2h86eKdRl7A5h8PXGrCDNIYMID-J7_KuHKqaM-I7W5yI00QDpG9x5q5xOQMgCy1bbu3St1paqt9KHrvNS_SCx-QJgBTOIWW6T0DHVlvV_9YF5UZpN7aV5a79xvN1Gdrc7spvSs82v6gta8AJHCgzNSWQw5QUR8EN_-cTPF6S-vifLa2KtRdRAV7q-CQvhMrbBCaEYY73bQcPZFd9XE7HIbHXwXYA=s200-no" class="picture-src" id="skinPicturePreview" title="">
                            <input type="file" id="skin-picture" class="">
                        </div>
                        <h6 class="">Tono de piel</h6>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="form-group form-inline">
                        <label for="">ID</label>
                        <label for="" class="badge badge-info identifier" id="patient_id">6</label>
                    </div>
                    <div class="form-group">
                        <label for="patient_name">Nombre</label>
                        <input type="text" class="form-control margin-bottom" id="patient_name" required placeholder="Nombre(s)">
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="patient_lastname" required placeholder="Apellido Paterno">
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="patient_momlastname" placeholder="Apellido Materno">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="genderSelect">Género</label>
                                <select class="form-control" required id="genderSelect">
                                    <option value="F" >Femenino</option>
                                    <option value="M" >Masculino</option>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label for="patient_phone">Teléfono</label>  
                                <input type="tel" class="form-control" id="patient_phone" required placeholder="555 555 5555">                          
                            </div>
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <label for="patient_email">Correo Eléctronico</label>
                        <input type="email" class="form-control" id="patient_email" required placeholder="correopaciente@dominio.com">
                    </div>
                    <div class="form-group">
                        <label for="patient_address">Dirección</label>                            
                        <div class="row margin-bottom">
                            <div class="col-lg-9">
                                <input type="text" class="form-control" id="patient_address" required placeholder="Calle y #">
                            </div>
                            <div class="col-lg-3">
                                <input type="text" class="form-control" id="patient_pc" required placeholder="Código Postal">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="patient_city" required required placeholder="Ciudad">
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="patient_state" required placeholder="Región/Provincia/Estado">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="patient_file">Documento Personal</label>
                            <input type="file" class="form-control-file" required id="patient_file" aria-describedby="fileHelp">
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save margin-five-right">   </i>   Registrar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="modal fade" id="actionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registro Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modelText">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Aceptar</button>
            </div>
            </div>
        </div>
    </div>

    <script src="//code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="../assets/js/common/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/common/master.js"></script>
    <script src="../assets/js/common/picture_profile.js"></script>
    <script src="../assets/js/patient/patient.js"></script>
  </body>
</html>