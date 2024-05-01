<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-edit"></i> Formulario Productos</h1>
            <p><?=$titulo?>: Ingrese los datos</p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li>Forms</li>
              <li><a href="#"><?=$titulo?></a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="row">
                <div class="col-lg-6">
                  <div class="well bs-component">
                    <form class="form-horizontal" method="POST" action="?c=producto&a=Guardar">

                      <fieldset>
                        <legend><?=$titulo?></legend>
                        <div class="form-group">
                          <!-- <label class="col-lg-2 control-label" for="pro_id">id</label> -->
                          <!-- <div class="col-lg-10"> -->
                            <input class="form-control" name="ID" type="hidden" value= "<?=$p->getPro_id()?>">

                            <label class="col-lg-2 control-label" for="Nombre">Nombre</label>
                          <div class="col-lg-10">
                            <input required class="form-control" name="Nombre" type="text" placeholder="Nombre Producto" value= "<?=$p->getPro_nom()?>">
                          </div>
                          <!-- </div> -->
                        </div>
                        
                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="Marca">Marca</label>
                          <div class="col-lg-10">
                            <input required class="form-control" name="Marca" type="text" placeholder="Marca Producto" value= "<?=$p->getPro_mar()?>">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="Costo">Costo</label>
                          <div class="col-lg-10">
                            <input required class="form-control" name="Costo" type="number" placeholder="Costo Producto" value= "<?=$p->getPro_cos()?>">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="Precio">Precio</label>
                          <div class="col-lg-10">
                            <input required class="form-control" name="Precio" type="number" placeholder="Precio Producto" value= "<?=$p->getPro_pre()?>">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="Cantidad">Cantidad</label>
                          <div class="col-lg-10">
                            <input required class="form-control" name="Cantidad" type="number" placeholder="Cantidad Producto" value= "<?=$p->getPro_can()?>">
                          </div>
                        </div>

                        <!-- <div class="form-group">
                          <label class="col-lg-2 control-label" for="pro_img">Imagen</label>
                          <div class="col-lg-10">
                            <input class="form-control" id="pro_img" type="text" placeholder="Imagen Producto">
                          </div>
                        </div> -->
                      
                        <div class="form-group">
                          <div class="col-lg-10 col-lg-offset-2">
                            <button class="btn btn-default" type="reset">Cancelar</button>
                            <button class="btn btn-primary" type="submit">Enviar</button>
                          </div>
                        </div>
                      </fieldset>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>