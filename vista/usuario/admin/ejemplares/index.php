<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<section>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Ejemplar</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Tablas</li>
          <li class="breadcrumb-item active"><a href="#">Ejemplar</a></li>
        </ul>
      </div>
      <div class="clearfix">
        <div class="btn-group">
        <a class="btn btn-primary" href="?c=ejemplar&a=InsertarEjemplar"><i class="fa fa-lg fa-plus"></i></a>
      </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th hidden>ID</th>
                    <th>Código Unico</th>
                    <th>Libro</th>
                    <th>No. Ingreso</th>
                    <th>Fecha Ingreso</th>
                    <th>Fecha Egreso</th>
                    <th>Estado</th>
                    <th>Observaciones</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                foreach($this->modelo->ListarEjemplar() as $r):
                ?>
                  <tr>
                    <td hidden><?=$r->ejemp_id?></td>
                    <td><?=$r->ejemp_codigounico?></td>
                    <td value="<?=$r->id_libro?>"><?=$r->libro_titulo?></td>
                    <td><?=$r->id_ingreso?></td>
                    <td><?=$r->ejemp_fech_ingreso?></td>
                    <td><?=$r->ejemp_fech_egreso?></td>
                    <td value="<?=$r->id_estado?>"><?=$r->estado_nomb?></td>
                    <td><?=$r->ejemp_obser?></td>
                    <td>
                    <a class="btn btn-primary" href="?c=ejemplar&a=InsertarEjemplar&id=<?=$r->ejemp_id?>"><i class="fa fa-lg fa-edit"></i></a>
                    </td>
                  </tr>
                <?php endforeach;?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </main>
</section>
</body>
</html>