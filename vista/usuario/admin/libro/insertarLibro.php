<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i><?=$titulo?> Libro</h1>
          <p>Ingresa los datos para agregar un nuevo Libro.</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Insertar</li>
          <li class="breadcrumb-item"><a href="#"><?=$titulo?> Libro</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="row">
              <div class="col-lg-6">
                <form method="POST" action="?c=libro&a=GuardarLibro" enctype="multipart/form-data">
                  <div class="form-group">                      
                    <input class="form-control" name="ID" type="hidden" value="<?=$lb->getLibro_Id()?>">

                    <div class="form-group">
                        <label for="Titulo">Título</label>
                        <i class="fa fa-question-circle" aria-hidden="true" data-toggle="tooltip" title="Ingrese el título del libro en el campo"></i>
                        <input required class="form-control" name="Titulo" type="text" placeholder="Titulo Libro" require value="<?=$lb->getLibro_Titulo()?>">
                    </div>

                    <div class="form-group">
                        <label for="Autor">Autor</label>
                        <i class="fa fa-question-circle" aria-hidden="true" data-toggle="tooltip" title="Ingrese la Autor del libro en el campo"></i>
                          <select class="form-control" name="Autor" require placeholder="Seleccionar">
                            <?php
                            foreach($this->modelo->ListarAutor() as $r):
                            ?>
                              <option value="<?=$r->id_autor?>"><?=$r->nomb_autor?> <?=$r->apelli_autor?></option>                  
                            <?php endforeach;?>
                          </select>
                    </div>

                    <div class="form-group">
                        <label for="Id_Libro">Código Libro</label>
                        <i class="fa fa-question-circle" aria-hidden="true" data-toggle="tooltip" title="Ingrese el código único del libro en el campo"></i>
                        <input required class="form-control" name="Id_Libro" type="text" require placeholder="Código Libro" value="<?=$lb->getLibro_Codigo()?>">
                    </div>

                    <div class="form-group">
                        <label for="Editorial">Editorial</label>
                        <i class="fa fa-question-circle" aria-hidden="true" data-toggle="tooltip" title="Ingrese la editorial del libro en el campo"></i>
                          <select class="form-control" name="Editorial" require placeholder="Seleccionar">
                            <?php
                            foreach($this->modelo->ListarEditorial() as $r):
                            ?>
                              <option value="<?=$r->edi_id?>"><?=$r->edi_nombre?></option>                  
                            <?php endforeach;?>
                          </select>
                    </div>

                    <div class="form-group">
                        <label for="Id_Dewey">Categoría</label>
                        <i class="fa fa-question-circle" aria-hidden="true" data-toggle="tooltip" title="Ingrese la categoría del libro en el campo"></i>
                          <select class="form-control" name="Id_Dewey" require placeholder="Seleccionar">
                            <?php
                            foreach($this->modelo->ListarCategoria() as $r):
                            ?>
                              <option value="<?=$r->dewey_id?>"><?=$r->dewey_nomb?></option>                  
                            <?php endforeach;?>
                          </select>
                    </div>

                    <div class="form-group">
                        <label for="Codigo_Isbn">Código ISBN</label>
                        <i class="fa fa-question-circle" aria-hidden="true" data-toggle="tooltip" title="Ingrese el código ISBN al que pertenece el libro en el campo"></i>
                        <input required class="form-control" name="Codigo_Isbn" type="text" placeholder="Código ISBN" value="<?=$lb->getCodigo_Isbn()?>">
                    </div>

                    <div class="tile-group">
                      <label for="f_p">Fecha Publicación</label>
                      <input class="form-control" id="demoDate" name="f_p" type="text" placeholder="Seleccionar Fecha">
                    </div>

                    <div class="form-group">
                        <label for="Foto">Imágen</label>
                        <i class="fa fa-question-circle" aria-hidden="true" data-toggle="tooltip" title="Ingrese la imágen correspondiente al libro desde el explorador de archivos"></i>
                        <input class="form-control-file" name="Foto" type="file" value="<?=$lb->getLibro_Foto()?>">
                    </div>
                  </div>
                  <div class="tile-footer">
                    <button class="btn btn-primary" type="submit">Insertar</button>
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