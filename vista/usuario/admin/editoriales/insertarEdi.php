<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i><?=$titulo?> Editorial</h1>
          <p>Ingresa los datos para agregar un nuevo editorial.</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Insertar</li>
          <li class="breadcrumb-item"><a href="#"><?=$titulo?> Editorial</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="row">
              <div class="col-lg-6">
                <form method="POST" action="?c=editorial&a=GuardarEditorial">
                  <div class="form-group">                      
                    <input class="form-control" name="ID" type="hidden" value="<?=$ed->getEdi_Id()?>">

                    <div class="form-group">
                        <label for="Nombre">Nombre</label>
                        <i class="fa fa-question-circle" aria-hidden="true" data-toggle="tooltip" title="Ingrese el nombre de la editorial en el campo"></i>
                        <input required class="form-control" name="Nombre" type="text" placeholder="Nombre Editorial" value="<?=$ed->getEdi_Nombre()?>">
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