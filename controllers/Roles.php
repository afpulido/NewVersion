<?php 
    require_once "models/Rol.php";
    class Roles{
        public function __construct(){}
        public function main(){}
        // Register Rol
        public function registerRoles(){
            $rol = new Rol(3,'Customer','Cliente de Real Shoes.');
            $rol->registerRol();
        }
        // Update Rol
        public function updateRoles(){
            if($_SERVER['REQUEST_METHOD'] == 'GET'){
                $rol = new Rol();
                $rol = $rol->getRolById(2);
            }
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $rol = new Rol(
                    2,'Empleado','Empleado de RealShoes.'
                );
                $rol->updateRol();
            }
        }
        // Change Rol Status 
        // Get Rol By Id
        // Consult Roles
        public function consultRoles(){
        $roles = new Rol();
        $roles = $roles->consultRoles();
    }
        // Delete Rol
        public function deleteRoles(){
            $rol = new Rol();
            $rol->deleteRol(3);
        }
}
?>