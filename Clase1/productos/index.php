<?php include '../app/config.php';?>
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
                            <button class="btn btn-info float-end" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="addProduct()">
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
                                    <a onclick="remove(<?php echo $productos->id ?>)" href="#" class="btn btn-danger col-6">Eliminar</a>
                                    <button  data-product='<?php echo json_encode($productos);?>' onclick="editProduct(this)" href="#"  data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-warning col-6">Editar</button>
                                    <a href="<?= BASE_PATH."product/".$productos->slug ?>" class="btn btn-info col-12">Detalles</a>
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
      <form enctype="multipart/form-data" method="post" action="<?=BASE_PATH?>prod" >
      <div class="modal-body">
      <div class="row align-items-center d-flex justify-content-center">
            <div class="col-6">
                    <fieldset>
                        <input type="text" id="name" name="name" placeholder="product name">
                        <input type="text" id="slug" name="slug" placeholder="product slug">  
                        <input type="text" id="description" name="description" placeholder="product description">  
                        <input type="text" id="features" name="features" placeholder="product features">  
                        <select name="brand_id" id="brand_id">
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
      <input id="inputOculto" type="hidden" name="action" value="create">
      <input id="id" type="hidden" name="id">
      <input type="hidden" name="g_token" value="<?php echo $_SESSION['g_token'] ?>">
      </form>
    </div>
  </div>
</div>
    <?php include '../layouts/scripts.php';?>
    <script type="text/javascript">
         function remove(id)
         {
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    })
                    .then((willDelete) => {
                    if (willDelete) {
                        swal("Poof! Your imaginary file has been deleted!", {
                        icon: "success",
                        });
                        var bodyFormData = new FormData();
                        bodyFormData.append('g_token', '<?= $_SESSION['g_token'] ?>');
                        bodyFormData.append('id', id);
                        bodyFormData.append('action', 'delete');

                        axios.post('<?=BASE_PATH?>prod', bodyFormData)
                        .then(function (response){
                            console.log(response);
                        })
                        .catch(function (error){
                            console.log('error')
                        })

                    } else {
                        swal("Your imaginary file is safe!");
                    }
                    });
        }
        function addProduct()
        {
            const elem = document.getElementById('inputOculto').value = 'create';
            document.getElementById("name").value = "";
            document.getElementById("slug").value = "";
            document.getElementById("description").value = "";
            document.getElementById("features").value = "";
            document.getElementById("brand_id").value = "";
           
        }
        function editProduct(target)
        {
            const elem = document.getElementById('inputOculto').value = 'edit';
            let product = JSON.parse(target.getAttribute('data-product'));

            document.getElementById("name").value = product.name;
            document.getElementById("slug").value = product.slug;
            document.getElementById("description").value = product.description;
            document.getElementById("features").value = product.features;
            document.getElementById("brand_id").value = product.brand_id;
            document.getElementById("id").value = product.id;
        }
    </script>
    
</body>

</html>
