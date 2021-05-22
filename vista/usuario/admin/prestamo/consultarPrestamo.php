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
          <h1><i class="fa fa-th-list"></i> Préstamo</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Tablas</li>
          <li class="breadcrumb-item active"><a href="#">Préstamo</a></li>
        </ul>
      </div>
      <div class="clearfix">
        <div class="btn-group">
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
                    <th>Reserva</th>
                    <th>Libro</th>
                    <th hidden>Ejemplar</th>
                    <th>Usuario</th>
                    <th>Estado</th>
                    <th>Fecha Préstamo</th>
                    <th>Fecha Entrega</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                foreach($this->modelo->ObtenerPrestamo() as $r):
                ?>
                  <tr>
                    <td hidden><?=$r->prestamo_id?></td>
                    <td><?=$r->reserva_id?></td>
                    <td value="<?=$r->id_libro?>"><?=$r->libro_titulo?></td>
                    <td hidden><?=$r->ejemp_codigounico?></td>
                    <td><?=$r->id_usuario?></td>
                    <td value="<?=$r->id_estado?>"><?=$r->estado_nomb?></td>
                    <td><?=$r->prestamo_fecha_inicio?></td>
                    <td><?=$r->prestamo_fecha_fin?></td>
                    <td>
                      <a class="btn btn-primary" href="?c=prestamo&a=Devolver&id=<?=$r->prestamo_id?>&idr=<?=$r->reserva_id?>&ejemcu=<?=$r->ejemp_codigounico?>"><i class="fa fa-lg fa-trash"></i></a>    
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