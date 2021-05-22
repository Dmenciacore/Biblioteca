<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<main class="app-content">
    <div class="app-title">
    <div>
        <h1><i class="fa fa-edit"></i>Importar Usuarios</h1>
        <p>Importe un archivo csv para agregar los usuarios.</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Carga Masíva</li>
        <li class="breadcrumb-item"><a href="#">Usuarios</a></li>
    </ul>
    </div>
    <div class="row">
    <div class="col-md-12">
        <div class="tile">
        <div class="row">
            <div class="col-lg-6">
            <form method="POST" action="?c=cargaM&a=GuardarUsuarios" enctype="multipart/form-data">
                <div class="form-group">

                    <div class="form-group">
                        <label for="Foto">Archivo CSV</label>
                        <i class="fa fa-question-circle" aria-hidden="true" data-toggle="tooltip" title="Seleccione el archivo csv desde el explorador de archivos."></i>
                        <input class="form-control-file" name="archivo" type="file" value="">
                    </div>
                </div>
                <div class="tile-footer">
                    <button class="btn btn-primary" name="submit" type="submit">Cargar</button>
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