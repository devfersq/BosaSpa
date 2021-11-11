<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Bosa SPA</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="assets/css/login.css" rel="stylesheet" id="bootstrap-css">
  </head>
  <body>

    <div class="sidenav">
      <div class="login-main-text">
        <h2>BOSA SPA<br>Bienvenido</h2>
        <p>Inicia Sesión o solicita tu registro para acceder</p>
      </div>
    </div>
    
    <div class="main">
      <div class="col-md-6 col-sm-12">
        <div class="login-form">
          <div class="error alert alert-warning">
            <span>Usuario y/o Contraseña incorrecta</span>
          </div>
          <form action="" id="frmAutho">
            <div class="form-group">
              <label>Usuario</label>
              <input type="text" class="form-control" id="usernamelg" name="usernamelg" required placeholder="Usuario">
            </div>
            <div class="form-group">
              <label>Contraseña</label>
              <input type="password" class="form-control" id="passwordlg" name="passwordlg" required placeholder="Contraseña">
            </div>
            <button type="submit" class="btn btn-black botonlg">Iniciar Sesión</button>
           </form>
        </div>
      </div>
    </div>

      <script src="//code.jquery.com/jquery-3.5.1.min.js"></script>
      <script src="assets/js/authentication/login.js"></script>
  </body>
</html>