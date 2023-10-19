<?php 
class Rol{

private $rolCode;
private $rolName;
private $rolDescription;

private $createdDate;
private $lastModification;
private $deletedDate;

# Sobrecarga de Constructores
public function __construct(){
    try {
        $a = func_get_args();
        $i = func_num_args();
        if (method_exists($this, $f = '__construct' . $i)) {
            call_user_func_array(array($this, $f), $a);
        }
    } catch (Exception $e) {
        die($e->getMessage());
    }
}
    public function __construct6($rolCode, $rolName, $rolDescription, 
        $createdDate, $lastModification,$deletedDate = null){
        $this->rolCode = $rolCode;
        $this->rolName = $rolName;
        $this->rolName = $rolDescription;
        $this->createdDate = $createdDate ? $createdDate : date('Y-m-d H:i:s');
        $this->lastModification = $lastModification ? $lastModification : date('Y-m-d H:i:s');
        $this->deletedDate = $deletedDate;
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


}



?>