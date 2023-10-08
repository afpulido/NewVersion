<?php 
class Dashboard{
    public function __construct(){}
    public function main(){
        require_once "views/rol/admin/header.view.php";
        require_once "views/rol/admin/admin.view.php";
        require_once "views/rol/admin/footer.view.php";
    }
    public function registerEmployee(){
        require_once "views/rol/admin/header.view.php";
        require_once "views/rol/admin/user-new.view.php";
        require_once "views/rol/admin/footer.view.php";
    }
    public function registerRol(){
        require_once "views/rol/admin/header.view.php";
        require_once "views/rol/admin/rol-new.view.php";
        require_once "views/rol/admin/footer.view.php";
    }
    public function registerProduct(){
        require_once "views/rol/admin/header.view.php";
        require_once "views/rol/admin/product-new.view.php";
        require_once "views/rol/admin/footer.view.php";
    }
    public function registerInvoice(){
        require_once "views/rol/admin/header.view.php";
        require_once "views/rol/admin/invoice-new.view.php";
        require_once "views/rol/admin/footer.view.php";
    }
}
?>