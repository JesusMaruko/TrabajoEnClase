<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
        aside{
            height: 90vh;
            background-color: #C0CFCC;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg" style="background-color: #A9F7EA;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="../public/img/ca50x50.png" alt="Bootstrap" width="30" height="24">
            </a>
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
               <!-- <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
-->
            </div>
        </div>
    </nav>
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

            <div class="col-lg-10 col-sm-12">
                <div class="border-bottom mb-2">
                    <div class="row m-2">
                        <div class="col">
                            <h4>Añadir Productos</h4>
                        </div>
                        <div class="col">
                            <button class="btn btn-info float-end">
                                Añadir Producto
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php for ($i=0; $i < 12; $i++): ?>
                    <div class="col">
                        <div class="card" style="width: 18rem;">
                            <img src="../public/img/ca.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <div class="row">
                                    <a href="#" class="btn btn-danger col-6">Eliminar</a>
                                    <a href="#" class="btn btn-warning col-6">Editar</a>
                                    <a href="#" class="btn btn-info col-12">Detalles</a>
                                </div>
                            </div>
                    </div>
                    
                </div>
                <?php endfor; ?>
            </div>
            </div>
           
        </div>
    </div>

    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js">

        </script>
    
</body>
</html>
