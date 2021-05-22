<<!DOCTYPE html>
<html>
<head>
</head>
<body>
    
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-file-text-o"></i> Informes</h1>
          <p>Seleccione las diferentes opciones para visualizar informes.</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Informes</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <section class="invoice">
              <div class="row mb-4">
                <div class="col-6">
                  <h2 class="page-header"><i class="fa fa-globe"></i> Informes</h2>
                </div>
              </div>
            <form method="POST" action="?c=informes&a=GenerarInforme">
                <div class="form-group">
                    <select class="form-control" id="exampleSelect1" name="Informe">
                        <option>Seleccione...</option>
                        <option>Libros</option>
                        <option>Reservas</option>
                        <option>Prestamos</option>
                        <option>Devolución</option>
                    </select>
                </div>
                <div class="tile-footer">
                    <button class="btn btn-primary" type="submit" class="fa fa-print">Generar</button>
                </div>
            </form>              
            </div>
            </section>
          </div>
        </div>
      </div>
    </main>
</body>
</html>