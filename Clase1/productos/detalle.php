<?php include '../app/productController.php';?>
<!DOCTYPE html>
<html lang="en">
<?php include '../layouts/head.php';?>
<body>
<?php include '../layouts/navbar.php';?>
    <div class="containe-fluid">
        <div class="row">

            <div class="col-lg-2 d-none d-sm-block">
                <aside class="">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                            </li>
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link disabled">Disabled</a>
                            </li>
                    </ul>
                </aside>
            </div>
            <!--Contenido -->
            <div class="col-lg-10 col-sm-12">
                <div class="border-bottom mb-2">
                    <div class="row m-2">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="">
                            <img src="<?php echo $detalleProducto->cover?>" class="card-img-top" alt="...">
                            <h6>
                            <span class="badge bg-primary">
                                <?php if($detalleProducto->brand==null){
                                        echo "Without brand";
                                    } else{
                                        echo $detalleProducto->brand->name;
                                    }
                                ?> 
                            
                            </span>
                            <?php foreach($detalleProducto->tags as $etiqueta) {?>
                                <span class="badge bg-secondary"><?php echo $etiqueta->name; ?></span>
                            <?php }?>
                            
                            <?php foreach($detalleProducto->categories as $categoria) {?>
                                <span class="badge bg-info"><?php echo $categoria->name; ?></span>
                            <?php }?>

                            </h6>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <h3>
                            <?php echo $detalleProducto->name?>
                        </h3>
                        <br>
                        <h4>  Description </h4>
                        <h6>  <?php echo $detalleProducto->description?> </h6>
                        <h4>    Features </h4>
                        <h6> <?php echo $detalleProducto->features?> </h6>
                    </div>
                </div>
                    
            </div>
        </div>
    </div>