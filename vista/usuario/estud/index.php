<!DOCTYPE html>
<html lang="es">
  <head>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Catálogo</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Catálogo</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
            <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>
                    </th>
                  </tr>
                </thead>
                <tbody>                  
                <?php
                foreach($this->modelo->ListarLibro() as $r):
                ?>
                  <tr>
                    <td>
                      <div class="col-lg-4">
                        <div class="bs-component">
                          <div class="card">
                            <h4 class="card-header"><?=$r->libro_titulo?></h4>
                            <div class="card-body">
                              <h5 class="card-title">Editorial: <?=$r->edi_nombre?></h5>
                              <h6 class="card-subtitle text-muted">ISBN: <?=$r->codigo_isbn?></h6>
                            </div><img style="height: 200px; width: 50%; display: block;" src="assets/images/<?=$r->libro_foto?>" alt="Card image">
                            <div class="card-body">
                              <p class="card-text">Categoría: <?=$r->dewey_desc?></p>
                              <a class="card-link" href="?c=reservaEst&a=insertarReserva&id=<?=$r->libro_id?>">Reservar</a>
                            </div>
                          </div>
                        </div>
                      </div>
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