<?php 
class Login{
    public function __construct(){}
    public function main(){
        $message="";
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            require_once "views/company/header.view.php";
            require_once "views/company/login.view.php";
            require_once "views/company/footer.view.php";
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $user = $_POST['email'];
            $password = $_POST['password'];
            if ($user =="ofbohorquez1@misena.edu.co" && $password == 1234 ){
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