<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i><?=$titulo?> Préstamo</h1>
          <p>Ingresa los datos para generar una reserva.</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Insertar</li>
          <li class="breadcrumb-item"><a href="#"><?=$titulo?> Reserva</a></li>
        </ul>
      </div>
      <!-- Modal -->
      <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Error</h3>
        </div>
        <div class="modal-body">
          <p>No puede prestar en fines de semana.</p>
        </div>
        <div class="modal-footer">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="row">
              <div class="col-lg-6">
                <form method="POST" action="?c=prestamo&a=GuardarPrestamo">
                  <div class="form-group">                      
                    <input class="form-control" name="ID" type="hidden" value="">

                    <div class="form-group">
                        <input required class="form-control" name="libro_id" type="hidden" value="<?=$pr1->libro_id ?>">
                    </div>

                    <div class="form-group">
                        <label for="libro_titulo">Libro</label>
                        <input required class="form-control" name="libro_titulo" type="text" value="<?=$pr1->libro_titulo ?>">
                    </div> 

                    <div class="form-group">
                        <label for="codigo">Código Ejemplar</label>
                        <input required class="form-control" name="codigo" type="text" value="<?=$pr3->ejemp_codigounico ?>">
                    </div> 

                    <div class="form-group">
                        <label for="Usuario">Usuario</label>
                        <input required class="form-control" name="Usuario" type="text" require placeholder="Usuario" value="">
                    </div>

                    <div class="form-group">
                        <label for="Estado">Estado</label>
                        <input disabled class="form-control" name="Estado" type="text" placeholder="Estado" value="<?=$pr2->estado_nomb?>">
                    </div>

                    <div class="tile-group">
                      <label for="pr_f_i">Fecha Préstamo</label>
                      <input class="form-control" id="demoDate" name="pr_f_i" type="text" placeholder="Seleccionar Fecha">
                    </div>
                  </div>
                  <div class="tile-footer">
                    <button class="btn btn-primary" type="submit">Prestar</button>
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