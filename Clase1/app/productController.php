<?php 

session_start();
$obtenerProductos = [];
$allBrands = [];
$detalleProducto =[];
$urlSlug = "";
if(isset($_SESSION['token'])){
    $productController = new productController();
    $token = strip_tags($_SESSION['token']);
    $obtenerProductos = $productController->obtenerProductoos($token);
    $allBrands = $productController->getBrands();
}
if(isset($_GET['slug'])){
    $urlSlug = $_GET['slug'];
    $detalleProducto = $productController->getDetail($urlSlug);
}
if(isset($_POST['action'])){
    switch ($_POST['action']){
        case 'create':
            $name = strip_tags($_POST['name']);
            $slug = strip_tags($_POST['slug']);
            $description = strip_tags($_POST['description']);
            $features = strip_tags($_POST['features']);
            $brand_id = strip_tags($_POST['brand_id']);
            $img = $_FILES['img']['tmp_name'];
            
            $productController = new productController();
            $productController->createProduct($name,$slug,$description,$features,$brand_id,$img);
        break;
        case 'edit':
            $name = strip_tags($_POST['name']);
            $slug = strip_tags($_POST['slug']);
            $description = strip_tags($_POST['description']);
            $features = strip_tags($_POST['features']);
            $brand_id = strip_tags($_POST['brand_id']);
            $id = strip_tags($_POST['id']);
            $productController = new productController();
            $productController->updateProduct($name,$slug,$description,$features,$brand_id,$id);
        break;
    }
}

    class productController
    {
        public function obtenerProductoos($token)
        {
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://crud.jonathansoto.mx/api/products',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['token'],
                
            ),
            ));

            $response = curl_exec($curl);
            curl_close($curl);
            
            $response = json_decode($response);
            if(isset($response->code) && $response->code > 0){
                return $response->data;
            }else{
                return array();
            }

        }
        public function createProduct($name,$slug,$description,$features,$brand_id,$img)
        {
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://crud.jonathansoto.mx/api/products',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array
            ('name' => $name,
            'slug' => $slug,
            'description' => $description,
            'features' => $features,
            'brand_id' => $brand_id,
            'cover'=> new CURLFILE($img)),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['token'],
            ),
            ));

             $response = curl_exec($curl);
             curl_close($curl);
             $response = json_decode($response);
            
             if(isset($response->code) && $response->code > 0){
                 header("Location:../products?success=true");
             }else{
                 header("Location:../products?error=true");
             }
            
        }
        public function getBrands()
        {
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://crud.jonathansoto.mx/api/brands',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['token'],
            ),
            ));

            $response = curl_exec($curl);
            curl_close($curl);
            $response = json_decode($response);

            if(isset($response->code) && $response->code > 0){
                return $response->data;
            }else{
                return array();
            }
        }
        public function getDetail($urlSlug)
        {
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://crud.jonathansoto.mx/api/products/slug/'.$urlSlug,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['token'],
            ),
            ));

            $response = curl_exec($curl);
            curl_close($curl);
            $response = json_decode($response);

            if(isset($response->code) && $response->code > 0){
                return $response->data;
            }else{
                return array();
            }
        }
        public function updateProduct($name, $slug, $descripcion, $caracteristicas, $marca, $id){

            $curl = curl_init();
    
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://crud.jonathansoto.mx/api/products',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => 
            'name='.$name.'
            &slug='.$slug.'
            &description='.$descripcion.'
            &features='.$caracteristicas.'
            &brand_id='.$marca.'
            &id='.$id,
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '.$_SESSION['token'],
                'Content-Type: application/x-www-form-urlencoded'
            ),
            ));
    
            echo $name;
            echo $slug;
            echo $descripcion;
            echo $caracteristicas;
            echo $marca;
            echo $id;
    
            $response = curl_exec($curl);
            curl_close($curl);
            echo $response;
            $response = json_decode($response);
    
            if(isset($response->code) && $response->code > 0){
                header("Location:../products/?success=true");
            }
            else{
                header("Location:../products/?error=true");
            }
        }
        
    }


?>