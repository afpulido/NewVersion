<?php 
class Inventory{
    private $dbh;
    private $inventory_id;
    private $storage_warehouse;
    private $created_date;
    private $last_modification;
    private $deleted_date;

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

    public function __construct2($inventory_id,$storage_warehouse)
    {
        $this->inventory_id = $inventory_id;
        $this->storage_warehouse = $storage_warehouse;
    }

    // Métodos Setter
    public function setInventoryId($inventory_id) {
        $this->inventory_id = $inventory_id;
    }

    public function setStorageWarehouse($storage_warehouse) {
        $this->storage_warehouse = $storage_warehouse;
    }

    public function setCreatedDate($created_date) {
        $this->created_date = $created_date;
    }

    public function setLastModification($last_modification) {
        $this->last_modification = $last_modification;
    }

    public function setDeletedDate($deleted_date) {
        $this->deleted_date = $deleted_date;
    }

    // Métodos Getter
    public function getInventoryId() {
        return $this->inventory_id;
    }

    public function getStorageWarehouse() {
        return $this->storage_warehouse;
    }

    public function getCreatedDate() {
        return $this->created_date;
    }

    public function getLastModification() {
        return $this->last_modification;
    }

    public function getDeletedDate() {
        return $this->deleted_date;
    }

    # 2da Parte Persistencia a la base de datos
}
?>