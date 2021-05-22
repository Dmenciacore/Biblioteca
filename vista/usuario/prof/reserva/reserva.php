<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i><?=$titulo?> Reserva</h1>
          <p>Ingresa los datos para generar una reserva.</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"></li>
          <li class="breadcrumb-item"><a href="#"><?=$titulo?> Reserva</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="row">
              <div class="col-lg-6">
                <form method="POST" action="?c=reserva&a=ModificarReserva">
                  <div class="form-group">                      
                    <input class="form-control" name="ID" type="hidden" value="<?=$re->getReserva_Id()?>">


                    <div class="form-group">
                        <input disabled required class="form-control" name="libro_id" type="hidden" value="<?=$re->getId_Libro()?>">
                    </div>

                    <div class="form-group">
                        <label for="libro_T">Libro</label>
                        <input disabled required class="form-control" name="libro_T" type="text" value="<?=$re->getLibro_Titulo()?>">
                    </div>

                    <div class="form-group">
                        <label for="Usuario">Usuario</label>
                        <input disabled required class="form-control" name="Usuario" type="text" value="<?=$re->getId_Usuario()?>">
                    </div>

                    <div class="form-group">
                        <input disabled class="form-control" name="Estado" type="hidden" value="<?=$re->getId_Estado()?>">
                    </div>

                    <div class="form-group">
                        <label for="Estado_N">Estado</label>
                        <input disabled class="form-control" name="Estado_N" type="text" value="<?=$re->getEstado_Nomb()?>">
                    </div>

                    <div class="tile-group">
                      <label for="re_f_i">Fecha Reserva</label>
                      <input class="form-control" id="demoDate" name="re_f_i" type="text" value="<?=$re->getReserva_Fecha_Inicio()?>">
                    </div>
                  </div>
                  <div class="tile-footer">
                    <button class="btn btn-primary" type="submit">Modificar</button>
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