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
          <h1><i class="fa fa-th-list"></i> Libros</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Tablas</li>
          <li class="breadcrumb-item active"><a href="#">Libros</a></li>
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
                    <th>Libro Título</th>
                    <th>Autor</th>
                    <th>Editorial</th>
                    <th>Categoría</th>
                    <th>Código ISBN</th>
                    <th>Fecha Publicación</th>
                    <!--<th>Más Info.</th>-->
                    <th>Foto</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                foreach($this->modelo->ListarLibro() as $r):
                ?>
                  <tr>
                  <td hidden><?=$r->libro_id?></td>
                    <td><?=$r->libro_titulo?></td>
                    <td><?=$r->nomb_autor?><br><?=$r->apelli_autor?></td>
                    <td value="<?=$r->id_editorial?>"><?=$r->edi_nombre?></td>
                    <td value="<?=$r->id_dewey?>"><?=$r->dewey_nomb?></td>
                    <td><?=$r->codigo_isbn?></td>
                    <td><?=$r->fecha_publi?></td>
                    <td><img style="width:50px; height:50px;" src="assets/images/<?=$r->libro_foto?>" alt="User Image"></td>
                    <td>
                    <a class="btn btn-primary" href="?c=reservaProf&a=insertarReserva&id=<?=$r->libro_id?>"><i class="fa fa-lg fa-plus"></i></a>
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