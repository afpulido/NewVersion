<?php 
class User{

    private $dbh;
    protected $document;
    protected $rol_id;
    protected $name;
    protected $lastName;
    protected $email;
    protected $password;
    protected $profileImage;
    protected $address;
    protected $phoneNumber;
    protected $createdDate;
    protected $lastModification;
    protected $deletedDate;
    
    # Sobrecarga de Constructores
    public function __construct(){
        try {
            $this->dbh = Database::connection();
            $a = func_get_args();
            $i = func_num_args();
            if (method_exists($this, $f = '__construct' . $i)) {
                call_user_func_array(array($this, $f), $a);
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    // constructor para crear al usuario
    public function __construct4($doc_id,$rol_id,$email, $password){
        $this->document = $doc_id;
        $this->rol_id = $rol_id;
        $this->email = $email;
        $this->password = $password;
    }
    // constructor para crear el empleado
    public function __construct8( 
        $document,
        $rol,
        $name,
        $lastName,
        $email,
        $password,
        $address,
        $phoneNumber
        )
        {
        $this->document = $document;
        $this->rol_id = $rol;
        $this->name = $name;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
        $this->address = $address;
        $this->phoneNumber = $phoneNumber;
        }
    // constructor para consultar los datos del usuario
    public function __construct11( 
        $document,
        $rol,
        $name,
        $lastName,
        $email,
        $password,
        $profileImage,
        $address,
        $phoneNumber,
        $createdDate,
        $lastModification,
        $deletedDate
        )
        {
        $this->document = $document;
        $this->rol_id = $rol;
        $this->name = $name;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
        $this->profileImage = $profileImage;
        $this->address = $address;
        $this->phoneNumber = $phoneNumber;
        $this->createdDate = $createdDate;
        $this->lastModification = $lastModification;
        $this->deletedDate = $deletedDate;
        }
            // Document
    public function setDocument($document) {
        $this->document = $document;
    }
        
    public function getDocument() {
        return $this->document;
    }

            // Rol
    public function setRolId($rol_id) {
        $this->rol_id = $rol_id;
    }
            
    public function getRolId() {
        return $this->rol_id;
    }
        
            // Name
    public function setName($name) {
        $this->name = $name;
    }
        
    public function getName() {
        return $this->name;
    }
        
            // Last Name
    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }
        
    public function getLastName() {
        return $this->lastName;
    }
        
            // Address
    public function setAddress($address) {
        $this->address = $address;
    }
        
    public function getAddress() {
        return $this->address;
    }
        
            // Password
    public function setPassword($password) {
        $this->password = $password;
    }
        
    public function getPassword() {
        return $this->password;
    }
        
            // Phone Number
    public function setPhoneNumber($phoneNumber) {
        $this->phoneNumber = $phoneNumber;
    }
        
    public function getPhoneNumber() {
        return $this->phoneNumber;
    }
        
            // Email
    public function setEmail($email) {
        $this->email = $email;
    }
        
    public function getEmail() {
        return $this->email;
    }
        
            // Profile Image
    public function setProfileImage($profileImage) {
        $this->profileImage = $profileImage;
    }
        
    public function getProfileImage() {
        return $this->profileImage;
    }
        
            // Created Date
    public function setCreatedDate($createdDate) {
        $this->createdDate = $createdDate;
    }
        
    public function getCreatedDate() {
        return $this->createdDate;
    }
        
            // Last Modification
    public function setLastModification($lastModification) {
        $this->lastModification = $lastModification;
    }
        
    public function getLastModification() {
        return $this->lastModification;
    }
        
            // Deleted Date
    public function setDeletedDate($deletedDate) {
        $this->deletedDate = $deletedDate;
    }
        
    public function getDeletedDate() {
        return $this->deletedDate;
    }

    // 2da parte persistencia a la base de datos

    // CU01.Iniciar Sesion
    public function login(){
        $sql = 'SELECT * FROM users 
                    WHERE email = :email 
                        AND password = :password';
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue('email', $this->getEmail());
        $stmt->bindValue('password', sha1($this->getPassword()));
        $stmt->execute();
        $userDb = $stmt->fetch();
        if ($userDb){
            $user = new User(
                $userDb['userDoc'],
                $userDb['userRol'],
                $userDb['userName'],
                $userDb['userLastName'],
                $userDb['userEmail'],
                $userDb['userPassword'],
                $userDb['userAddress'],
                $userDb['userPhoneNumber'],
            );
            return $user;
        }else{
            return false;
        }
   
    }
    // CU03-Password Recovery
    // CU04-Register User
    public function registerUser(){
        try{
        $sql='INSERT INTO users(doc_id,rol_id,email,password) VALUES (:doc_id,:rol_id,:email,:password)';
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue('doc_id', ($this->getDocument()));
        $stmt->bindValue('rol_id', $this->getRolId());
        $stmt->bindValue('email', $this->getEmail());
        $stmt->bindValue('password', sha1($this->getPassword()));
        $stmt->execute();
        }catch(PDOException $e){
            die($e->getMessage());}
        }
    // CU05-Update User
    public function updateUser(){
        try{
            $sql= 'UPDATE users SET
                        doc_id = :userId, 
                        name = :userName,
                        last_name = :lastName,
                        adress = :adress, 
                        password = :password,
                        phone_number =:phoneNumber
                    WHERE doc_id = :userId';
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue('userId', $this->getDocument());
            $stmt->bindValue('userName',$this->getName());
            $stmt->bindValue('last_name', $this->getLastName());
            $stmt->bindValue('adress', $this->getAddress());
            $stmt->bindValue('password', sha1($this->getPassword()));
            $stmt->bindValue('phoneNumber', $this->getPhoneNumber());
            $stmt->execute();
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    // CU06-Change Profile Image 
    // CU07-Delete Account
    // CU08-Register Employee
    public function registerEmployee(){
        try{
            $sql = 'INSERT INTO users (doc_id,rol_id,name,last_name,email,password,address,phone_number)
                        VALUES (:employeeDocument,:employeeRolId,:employeeName,:employeeLastName,:employeeEmail,
                                    :employeePassword,:employeeAddress,:employeePhoneNumber)';
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue('employeeDocument',$this->getDocument());
            $stmt->bindValue('employeeRolId',$this->getRolId());
            $stmt->bindValue('employeeName',$this->getName());
            $stmt->bindValue('employeeLastName',$this->getLastName());
            $stmt->bindValue('employeeEmail',$this->getEmail());
            $stmt->bindValue('employeePassword', sha1($this->getPassword()));
            $stmt->bindValue('employeeAddress', $this->getAddress());
            $stmt->bindValue('employeePhoneNumber',$this->getPhoneNumber());
            $stmt->execute();
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
    // CU09-Show Employee By Id
    public function showEmployeeById($employeeId){
        try{
            $sql = 'SELECT * FROM users 
                        WHERE doc_id = :employeeDocument';
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue('employeeDocument',$employeeId);
            $stmt->execute();
            $employeeDb = $stmt->fetch();
            $employee = new User(
                $employeeDb['doc_id'],
                $employeeDb['rol_id'],
                $employeeDb['name'],
                $employeeDb['last_name'],
                $employeeDb['email'],
                $employeeDb['password'],
                $employeeDb['address'],
                $employeeDb['phone_number'],
                $employeeDb['created_date'],
                $employeeDb['last_modification'],
                $employeeDb['deleted_date']
            );
            return $employee;
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
    // CU10-Show All Employees
    public function showAllEmployees(){
        try{
            $employeesList = [];
            $sql = 'SELECT * FROM users WHERE rol_id !=3';
            $stmt = $this->dbh->query($sql);
            foreach($stmt->fetchAll() as $employee){
                $employeeList[] = new User(
                    $employee['document'],
                    $employee['rol_id'],
                    $employee['name'],
                    $employee['last_name'],
                    $employee['email'],
                    $employee['password'],
                    $employee['profile_image'],
                    $employee['address'],
                    $employee['phone_number'],
                    $employee['created_date'],
                    $employee['last_modification'],
                    $employee['deleted_date']);
                return $employeeList;
        }

        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
    // CU11-Change User Status
    // CU12-Delete Employee
    public function deleteEmployee($employee_id){
        try{
            $sql = 'DELETE FROM users WHERE doc_id = :employeeDocument';
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute();
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    }
    

?>