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
          <h1><i class="fa fa-th-list"></i> Reserva</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Tablas</li>
          <li class="breadcrumb-item active"><a href="#">Reserva</a></li>
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
                    <th>Libro</th>
                    <th>Ejemplar</th>
                    <th>Usuario</th>
                    <th>Estado</th>
                    <th>Fecha Reserva</th>
                    <th>Fecha Final Reserva</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                foreach($this->modelo->ObtenerReserva() as $r):
                ?>
                  <tr>
                    <td hidden><?=$r->reserva_id?></td>
                    <td value="<?=$r->id_libro?>"><?=$r->libro_titulo?></td>
                    <td><?=$r->ejemp_codigounico?></td>
                    <td><?=$r->id_usuario?></td>
                    <td value="<?=$r->id_estado?>"><?=$r->estado_nomb?></td>
                    <td><?=$r->reserva_fecha_inicio?></td>
                    <td><?=$r->reserva_fecha_fin?></td>
                    <td>
                    <a class="btn btn-primary" href="?c=reservaProf&a=Reserva&id=<?=$r->reserva_id?>"><i class="fa fa-lg fa-edit"></i></a>
                    <a class="btn btn-primary" href="?c=reservaProf&a=EliminarReserva&id=<?=$r->reserva_id?>&ejemcu=<?=$r->ejemp_codigounico?>"><i class="fa fa-lg fa-trash"></i></a>    
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