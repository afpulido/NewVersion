<?php 
class Rol{
private $dbh;
private $rolCode;
private $rolName;
private $rolDescription;

private $createdDate;
private $lastModification;
private $deletedDate;

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
    public function __construct3($rolCode, $rolName, $rolDescription){
        $this->rolCode = $rolCode;
        $this->rolName = $rolName;
        $this->rolDescription = $rolDescription;
}
public function setRolCode ($rolCode){
    $this->rolCode = $rolCode;
}

public function getRolCode (){
    return $this->rolCode;
}

public function setRolName($rolName){
    $this->rolName = $rolName;
}

public function getRolName(){
    return $this->rolName;
}
public function setRolDescription($rolDescription){
    $this->rolDescription = $rolDescription;
}

public function getRolDescription(){
    return $this->rolDescription;
}

public function setCreatedDate($createdDate) {
    $this->createdDate = $createdDate;
}

public function getCreatedDate() {
    return $this->createdDate;
}

public function setLastModification($lastModification) {
    $this->lastModification = $lastModification;
}

public function getLastModification() {
    return $this->lastModification;
}

public function setDeletedDate($deletedDate) {
    $this->deletedDate = $deletedDate;
}

public function getDeletedDate() {
    return $this->deletedDate;
}

# 2da parte persistencia a la base de datos

    // CU13-Register Rol
    public function registerRol(){
        try{
            $sql = 'INSERT INTO roles(rol_id,name,description) VALUES(:rolCode,:rolName,:rolDescription)';
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue('rolCode',$this->getRolCode());
            $stmt->bindValue('rolName',$this->getRolName());
            $stmt->bindValue('rolDescription',$this->getRolDescription());
            $stmt->execute();
        }catch(Exception $e){
            die($e->getMessage());
    }
    }
    // CU14-Update Rol
    public function updateRol(){
        try{
            $sql = 'UPDATE ROLES SET
                        rol_id = :rolCode,
                        name   = :rolName,
                        description = :rolDescription
                    WHERE rol_id = :rolCode';
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue('rolCode',$this->getRolCode());
            $stmt->bindValue('rolName',$this->getRolName());
            $stmt->bindValue('rolDescription',$this->getRolDescription());
            $stmt->execute();
        }catch(Exception $e){
            die($e->getMessage());
    }
    }
    // CU15-Change Rol Status

    // CU16-Get Rol By Id
    public function getRolById( $rol_id){
        try{
            $sql = 'SELECT * FROM ROLES 
                        WHERE rol_id = :rolCode';
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue('rolCode',$rol_id);
            $stmt->execute();
            $rolDb = $stmt->fetch();
            $rol = new Rol(
                $rolDb['rol_id'],
                $rolDb['name'],
                $rolDb['description']
            );
            return $rol;
        } 
        catch(Exception $e){
            die($e->getMessage());
        }
    }
    // CU17-Consult Roles
    public function consultRoles(){
        try{
            $rolList = [];
            $sql = 'SELECT * FROM roles';
            $stmt = $this->dbh->query($sql);
            foreach($stmt->fetchAll() as $rol){
                $rolList[] = new Rol(
                    $rol['rol_id'],
                    $rol['name'],
                    $rol['description']
                );
            }
            return $rolList;
            {
    }
        }catch(Exception $e){
            die($e->getMessage());
    }
}
    // CU18-Delete Rol
    public function deleteRol($rol_id){
        try{
            $sql = 'DELETE FROM ROLES 
                        WHERE rol_id = :rolCode';
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue('rolCode',$rol_id);
            $stmt->execute();
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
}



?>