<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-edit"></i>Modificar Contraseña</h1>
      <p>Ingresa los datos para modificar contraseña.</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">Insertar</li>
      <li class="breadcrumb-item"><a href="#">Modificar Contraseña</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="row">
          <div class="col-lg-6">
            <form method="POST" action="?c=usuario&a=cambiarClave">
              <div class="form-group">

                <div class="form-group">
                    <label for="usu_id">Documento</label>
                    <input id="usu_id" type="text" class="form-control" name="usu_id" placeholder="Documento">
                </div>

                <div class="form-group">
                    <label for="Clave">Nueva Contraseña</label>
                    <input id="clave" type="password" pattern="(?=.*\D)(?=.*[A-Z]).{8,}" class="form-control check-seguridad" name="clave" placeholder="Contraseña" style="color: #A4A4A4" title="La contraseña debe de tener como minimo 8 caracteres uno de ellos un numero, una letra mayuscula y una minuscula">
                    <span class="input-group-addon"></span>
                </div>

                <div class="form-group">
                    <label for="Clave1">Confirmar Contraseña</label>
                    <input id="clave1" type="password" pattern="(?=.*\D)(?=.*[A-Z]).{8,}" class="form-control" name="clave1" placeholder="Confirmar Contraseña" style="color: #A4A4A4" title="La contraseña debe de tener como minimo 8 caracteres uno de ellos un numero, una letra mayuscula y una minuscula">
                </div>
              </div>
              <div class="tile-footer">
              <button id="Cambiar" name="Cambiar" class="btn btn-success btn-xs" onchange="checkPassword()">Cambiar contraseña</button>
              <a id="Volver" href="?c=#&a=#" name="Volver" class="btn btn-danger btn-xs">Regresar</a>
                </div>
            </form>
          </div>                
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
</body>
</html>