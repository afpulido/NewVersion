<?php 
class User{

    private $dbh;
    protected $document;
    protected $name;
    protected $lastName;
    protected $address;
    protected $password;
    protected $phoneNumber;
    protected $email;
    protected $profileImage;
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
    public function __construct2($email, $password){
        $this->email = $email;
        $this->password = $password;
    }

    public function __construct11( 
        $document,
        $name,
        $lastName,
        $address,
        $password,
        $phoneNumber,
        $email,
        $profileImage = null,
        $createdDate = null,
        $lastModification = null,
        $deletedDate = null
        )
        {
        $this->document = $document;
        $this->name = $name;
        $this->lastName = $lastName;
        $this->address = $address;
        $this->password = $password;
        $this->phoneNumber = $phoneNumber;
        $this->email = $email;
        $this->profileImage = $profileImage;
        $this->createdDate = $createdDate ? $createdDate : date('Y-m-d H:i:s');
        $this->lastModification = $lastModification ? $lastModification : date('Y-m-d H:i:s');
        $this->deletedDate = $deletedDate;
        }
            // Document
    public function setDocument($document) {
        $this->document = $document;
    }
        
    public function getDocument() {
        return $this->document;
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
        $sql = 'SELECT * FROM usuario 
                    WHERE email = :email 
                        AND contraseña = :contraseña';
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue('email', $this->getEmail());
        $stmt->bindValue('contraseña', sha1($this->getPassword()));
        $stmt->execute();
        $userDb = $stmt->fetch();
        if ($userDb){
            $user = new User(
                $userDb['usuario_cedula'],
                $userDb['usuario_nombre'],
                $userDb['usuario_apellido'],
                $userDb['usuario_direccion'],
                $userDb['usuario_contraseña'],
                $userDb['usuario_numero'],
                $userDb['usuario_email'],
                $userDb['usuario_imagen'],
                $userDb['usuario_creacion'],
                $userDb['usuario_modificacion'],
                $userDb['usuario_eliminacion']
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
        $sql='INSERT INTO users(email,password) VALUES (:email,:password)';
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue('email', $this->getEmail());
        $stmt->bindValue('password', sha1($this->getPassword()));
        $stmt->execute();
        }catch(PDOException $e){
            die($e->getMessage());}
        }
    // CU05-Update User
    public function updateUser(){
        try{
            $sql= 'UPDATE users SET name = :userName,
                        last_name = :lastName,
                        adress = :adress, 
                        password = :password,
                        phone_number =:phoneNumber
                    WHERE doc_id = :userId';
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue('userName',$this->getName());
            $stmt->bindValue('last_name', $this->getLastName());
            $stmt->bindValue('adress', $this->getAddress());
            $stmt->bindValue('password', sha1($this->getPassword()));
            $stmt->bindValue('phoneNumber', $this->getPhoneNumber());
            $stmt->bindValue('userId', $this->getDocument());
            $stmt->execute();
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    // CU06-Change Profile Image 
    // CU07-Delete Account
    // CU08-Register Employee
    // CU09-Show Employee By Id
    // CU10-Show All Employees
    // CU11-Change User Status
    // CU12-Delete Employee
    }
    

?>