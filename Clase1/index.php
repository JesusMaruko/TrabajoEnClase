<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso al panel</title>
      <link rel="stylesheet" href="public/css/main.css?v=1"> 
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid bg-secondary" style="--bs-bg-opacity: .5;">
        <div class="row align-items-center d-flex justify-content-center">
            <div class="col-6">
                <form method="POST" action="app/authController.php">
                    <fieldset>
                        <legend>
                            Datos de acceso
                        </legend>
                        <label for="">
                            Email:
                        </label>
                        <input type="text" name="email" placeholder="write here">            
                        <label for="">
                            Password:
                        </label>
                        <input type="password" name="password" placeholder="**********">
                        <input type="hidden" name="" action="action">
                        <button class="btn btn-primary" type="submit">
                            Acceder
                        </button>
                    </fieldset>

                </form>
            </div>
        </div>
    </div>
</body>
</html>