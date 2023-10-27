<?php 
require_once "models/User.php";
class Users{
    public function __construct(){}
    public function main(){}
    // Password Recovery
    // Register User
    public function registerUsers(){
        $user = new User('ofbohorquez1@misena.edu.co','1234');
        $user->registerUser();
    }
    // Update User
    // Change Profile Image 
    // Delete Account
    // Register Employee
    // Show Employee By Id
    // Show All Employees
    // Change User Status
    // Delete Employee
    
}
?>