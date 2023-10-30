<?php 
require_once "models/User.php";
class Users{
    public function __construct(){}
    public function main(){}
    // Password Recovery
    // Register User Customer
    public function registerUsers(){
        $user = new User('ofbohorquez1@misena.edu.co','1234');
        $user->registerUser();
    }
    // Update User
    public function updateUsers(){
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            $user = new User();
        }
    }
    // Change Profile Image 
    // Delete Account
    // Register Employee
    public function registerEmployees(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $user = new User(
                $_POST['employeeDoc'],
                $_POST['employeeRol'],
                $_POST['employeeName'],
                $_POST['employeeLastName'],
                $_POST['employeeEmail'],
                sha1($_POST['employeePassword']),
                $_POST['employeeAddress'],
                $_POST['employeePhoneNumber']
                );
            $user->registerEmployee();
    }
}
    // Show Employee By Id
    // Show All Employees
    // Change User Status
    // Delete Employee
    
}
?>