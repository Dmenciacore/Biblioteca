<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <div class="modal fade bs-example-modal-lg">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      <div class="modal-header">
        <button class="close" data-dismiss="modal"><span>&times;</span></button><h3 class="modal-title"></h3>
      </div>
      <div class="modal-body">
      <?php
      $a=$_GET['id'];
      print_r($a);
      ?>
      </div>
      <div class="modal-footer">
      </div>
      </div>
    </div>
  </div>
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
        <a class="btn btn-primary" href="?c=libro&a=InsertarLibro"><i class="fa fa-lg fa-plus"></i></a>
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
                    <td><?=$r->edi_nombre?></td>
                    <td value="<?=$r->id_dewey?>"><?=$r->dewey_nomb?></td>
                    <td><?=$r->codigo_isbn?></td>
                    <td><?=$r->fecha_publi?></td>
                    <!--<td>
                    <a class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg" href="?c=libro&a=InsertarLibro&id=<?=$r->libro_id?>"><i class="fa fa-lg fa-plus"></i></a>
                    </td>-->
                    <td><img style="width :50px; height: 50px;" src="assets/images/<?=$r->libro_foto?>" alt="User Image"></td>
                    <td>
                    <a class="btn btn-primary" href="?c=libro&a=InsertarLibro&id=<?=$r->libro_id?>"><i class="fa fa-lg fa-edit"></i></a>
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