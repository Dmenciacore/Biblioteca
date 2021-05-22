<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Editorial</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Tablas</li>
          <li class="breadcrumb-item active"><a href="#">Editorial</a></li>
        </ul>
      </div>
      <div class="clearfix">
        <div class="btn-group">
        <a class="btn btn-primary" href="?c=editorial&a=InsertarEditorial"><i class="fa fa-lg fa-plus"></i></a>
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
                    <th>Nombre</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                foreach($this->modelo->ListarEditorial() as $r):
                ?>
                  <tr>
                    <td hidden><?=$r->edi_id?></td>
                    <td><?=$r->edi_nombre?></td>
                    <td>
                    <a class="btn btn-primary" href="?c=editorial&a=InsertarEditorial&id=<?=$r->edi_id?>"><i class="fa fa-lg fa-edit"></i></a>
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

</body>
</html>