<?php 
    require_once "models/Rol.php";
    class Roles{
        public function __construct(){}
        public function main(){}
        // Register Rol
        public function registerRoles(){
            $rol = new Rol(1,'Admin','Administrador con todos los privilegios.');
            $rol->registerRol();
        }
        // Update Rol
        // Change Rol Status 
        // Get Rol By Id
        // Consult Roles
        // Delete Rol
    }
?>