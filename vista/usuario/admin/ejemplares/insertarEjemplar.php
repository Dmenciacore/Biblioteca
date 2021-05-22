<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i><?=$titulo?> Ejemplar</h1>
          <p>Ingresa los datos para agregar un nuevo ejemplar.</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Insertar</li>
          <li class="breadcrumb-item"><a href="#"><?=$titulo?> Ejemplar</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="row">
              <div class="col-lg-6">
                <form method="POST" action="?c=ejemplar&a=GuardarEjemplar">
                  <div class="form-group">                      
                    <input class="form-control" name="ID" type="hidden" value="<?=$ej->getEjemp_Id()?>">

                    <div class="form-group">
                        <label for="Codigo">Código</label>
                        <i class="fa fa-question-circle" aria-hidden="true" data-toggle="tooltip" title="Ingrese el còdigo del ejemplar en el campo"></i>
                        <input required class="form-control" name="Codigo" type="text" placeholder="Codigo Ejemplar" value="<?=$ej->getEjemp_Codigounico()?>">
                    </div>

                    <div class="form-group">
                        <label for="Libro">Libro</label>
                        <i class="fa fa-question-circle" aria-hidden="true" data-toggle="tooltip" title="Seleccione el nombre del libro en el campo"></i>
                          <select class="form-control" name="Libro" placeholder="Seleccionar">
                            <?php
                            foreach($this->modelo->ListarLibro() as $r):
                            ?>
                              <option value="<?=$r->libro_id?>"><?=$r->libro_titulo?></option>                  
                            <?php endforeach;?>
                          </select>
                    </div>

                    <div class="form-group">
                        <label for="Ingreso">Ingreso</label>
                        <i class="fa fa-question-circle" aria-hidden="true" data-toggle="tooltip" title="Ingrese el código del ingreso en el campo"></i>
                        <input required class="form-control" name="Ingreso" type="text" placeholder="Ingreso" value="<?=$ej->getId_Ingreso()?>">
                    </div>

                    <div class="form-group">
                        <label for="Fechaingreso">Fecha Ingreso</label>
                        <i class="fa fa-question-circle" aria-hidden="true" data-toggle="tooltip" title="Ingrese la fecha de ingreso en el campo"></i>
                        <input required class="form-control" name="Fechaingreso" type="date" placeholder="Fecha ingreso Ejemplar" value="<?=$ej->getEjemp_Fech_Ingreso()?>">
                    </div>

                    <div class="form-group">
                        <label for="Fechaegreso">Fecha Egreso</label>
                        <i class="fa fa-question-circle" aria-hidden="true" data-toggle="tooltip" title="Ingrese la fecha de egreso en el campo"></i>
                        <input required class="form-control" name="Fechaegreso" type="date" placeholder="Fecha Egreso Ejemplar" value="<?=$ej->getEjemp_Fech_Egreso()?>">
                    </div>

                    <div class="form-group">
                        <label for="Estado">Estado</label>
                        <i class="fa fa-question-circle" aria-hidden="true" data-toggle="tooltip" title="Ingrese el estado en el que se encuentra el ejemplar"></i>                 
                          <select class="form-control" name="Estado" placeholder="Seleccionar">
                            <?php
                            foreach($this->modelo->ListarEstado() as $r):
                            ?>
                              <option value="<?=$r->estado_id?>"><?=$r->estado_nomb?></option>                  
                            <?php endforeach;?>
                          </select>
                    </div>

                    <div class="form-group">
                        <label for="Observacion">Observaciones</label>
                        <i class="fa fa-question-circle" aria-hidden="true" data-toggle="tooltip" title="Ingrese las observaciones que considere pertinentes de este ejemplar."></i>
                        <input required class="form-control" name="Observacion" type="text" placeholder="Observaciones" value="<?=$ej->getEjemp_Obser()?>">
                    </div>
                  </div>
                  <div class="tile-footer">
                    <button class="btn btn-primary" type="submit">Enviar</button>
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