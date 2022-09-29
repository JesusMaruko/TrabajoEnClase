<?php 

session_start();
$obtenerProductos = [];
if(isset($_SESSION['token'])){
    $productController = new productController();
    $token = strip_tags($_SESSION['token']);
    $obtenerProductos = $productController->obtenerProductoos($token);
}else{
    header("Location:..");
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
                echo "Estoy fallando";
            }

        }
    }


?>