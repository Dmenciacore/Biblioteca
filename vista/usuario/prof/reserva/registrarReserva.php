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
          <li class="breadcrumb-item">Insertar</li>
          <li class="breadcrumb-item"><a href="#"><?=$titulo?> Reserva</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="row">
              <div class="col-lg-6">
                <form method="POST" action="?c=reservaProf&a=GuardarReserva">
                  <div class="form-group">                      
                    <input class="form-control" name="ID" type="hidden" value="">

                    <div class="form-group">
                        <input required class="form-control" name="libro_id" type="hidden" value="<?=$re1->libro_id ?>">
                    </div>

                    <div class="form-group">
                        <label for="libro_titulo">Libro</label>
                        <input required class="form-control" name="libro_titulo" type="text" value="<?=$re1->libro_titulo ?>">
                    </div> 

                    <div class="form-group">
                        <label for="codigo">Código Ejemplar</label>
                        <input required class="form-control" name="codigo" type="text" value="<?=$re3->ejemp_codigounico ?>">
                    </div> 

                    <div class="form-group">
                        <label for="Usuario">Usuario</label>
                        <input required class="form-control" name="Usuario" type="text" require placeholder="Usuario" value="">
                    </div>

                    <div class="form-group">
                        <label for="Estado">Estado</label>
                        <input disabled class="form-control" name="Estado" type="text" placeholder="Estado" value="<?=$re2->estado_nomb?>">
                    </div>

                    <div class="tile-group">
                      <label for="re_f_i">Fecha Reserva</label>
                      <input class="form-control" id="demoDate" name="re_f_i" type="text" placeholder="Seleccionar Fecha">
                    </div>
                  </div>
                  <div class="tile-footer">
                    <button class="btn btn-primary" type="submit">Reservar</button>
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