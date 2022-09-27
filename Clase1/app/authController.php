<?php
if(isset($_POST['action'])){
    switch ($_POST['action']){
        case 'acess':
            $authController = new authController();
            $email = strip_tags($_POST['email']);
            $password = strip_tags($_POST['password']);

            $authController->login($email,$password);
            var_dump($email);
        break;
    }
}


class authController{
    public function login($email,$password)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/login',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('email' => $email,'password' => $password),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_encode($response);

        if(isset($response->code) && $response->code > 0)
        {
            session_start();
            $_SESSION['name'] = respone->data->name;
            $_SESSION['lastname'] = respone->data->lastname;
            $_SESSION['avatar'] = respone->data->avatar;
            $_SESSION['token'] = respone->data->token;

            header("Location:../productos");
        }else{
            #var_dump($response);
            header("Location:../error=true");
        }
    }
}   
//jdominguez_19@alu.uabcs.mx
//64LpT^z^4sz5GJ
?>