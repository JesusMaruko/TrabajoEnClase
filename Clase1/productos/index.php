<?php include '../app/productController.php';?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include '../layouts/head.php';?>
</head>
<body>
<?php include '../layouts/navbar.php';?>

    <div class="containe-fluid">
    
        <div class="row">
        <?php include '../layouts/sidebar.php';?>
            
            <!--Contenido -->
            <div class="col-lg-10 col-sm-12">
                <div class="border-bottom mb-2">
                    <div class="row m-2">
                        <div class="col">
                            <h4>Añadir Productos</h4>
                        </div>
                        <div class="col">
                            <button class="btn btn-info float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Añadir Producto
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php foreach ($obtenerProductos as $productos) {?>
                    <div class="col-md-3">
                        <div class="card" style="width: 20rem;">
                            <img src="<?php echo $productos->cover ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $productos->name; ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted">
                                    <?php if($productos->brand==null){
                                        echo "Without brand";
                                    } else{
                                        echo $productos->brand->name;
                                    }
                                    ?> 
                                </h6>
                                <p class="card-text"><?php echo $productos->description; ?>.</p>
                                <div class="row">
                                    <a onclick="remove()" href="#" class="btn btn-danger col-6">Eliminar</a>
                                    <a href="#" class="btn btn-warning col-6">Editar</a>
                                    <a href="detalle.php?slug=<?php echo $productos->slug;?>" class="btn btn-info col-12">Detalles</a>
                                </div>
                            </div>
                    </div>
                    
                </div>
                <?php } ?>
            </div>
            </div>
           
        </div>
    </div>

                        


        


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
    
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form enctype="multipart/form-data" method="post" action="../app/productController.php" >
      <div class="modal-body">
      <div class="row align-items-center d-flex justify-content-center">
            <div class="col-6">
                    <fieldset>
                        <input type="text" name="name" placeholder="product name">
                        <input type="text" name="slug" placeholder="product slug">  
                        <input type="text" name="description" placeholder="product description">  
                        <input type="text" name="features" placeholder="product features">  
                        <select name="brand_id" id="">
                            <option disable selected="">Select a brand</option>
                            <?php foreach($allBrands as $brand){?>
                                <option value="<?php echo $brand->id;?>">  <?php echo $brand->name; ?> </option>
                            <?php } ?>
                        </select>
                       <!-- <input type="text" name="brand_id" placeholder="product brand"> -->
                        <input type="file" name="img" placeholder="product cover">
                    </fieldset>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      <input type="hidden" name="action" value="create">
      </form>
    </div>
  </div>
</div>
    <?php include '../layouts/scripts.php';?>
        
    
</body>

</html>
