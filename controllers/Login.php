<?php 
// CU01-Log In
require_once "Models/User.php";
class Login{
    public function __construct(){}
    public function main(){
        $message="";
        /* if($_SERVER['REQUEST_METHOD'] == 'GET'){
            require_once "views/company/header.view.php";
            require_once "views/company/login.view.php";
            require_once "views/company/footer.view.php";
        } */
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            $user = new User($_POST['email'], $_POST['password']);
            $user = $user->login();
            print_r($user);
            if ($user) {
                header('Location:?c=Dashboard');
                }else{
                $message="*Invalid user or password";
                require_once "views/company/header.view.php";
                require_once "views/company/login.view.php";
                require_once "views/company/footer.view.php";
            }
        }
}
}
?>