<?php 
class Product{
    private $dbh;
    private $product_id;
    private $type;
    private $description;
    private $mark;
    private $collection;
    private $gender;
    private $size;
    private $stock;
    private $purchase_value;
    private $sale_value;
    private $product_image;
    private $inventory_id;
    private $created_date;
    private $last_modification;
    private $deleted_date;

    # Sobrecarga de constructores
    public function __construct(){
        try{
            $this->dbh = Database::connection();
            $a = func_get_args();
            $i = func_num_args();
            if(method_exists($this,$f ='__construct'. $i)){
                call_user_func_array(array($this,$f), $a);
        }
        }catch(Exception $e){
            die($e->getMessage());}
    }

    public function __construct11($product_id,$type,$description,$mark,$collection,$gender,$size,$stock,$purchase_value,
                                    $sale_value,$product_image,$inventory_id){
        $this->product_id = $product_id;
        $this->type = $type;
        $this->description = $description;
        $this->mark = $mark;
        $this->collection = $collection;
        $this->gender = $gender;
        $this->size = $size;
        $this->stock = $stock;
        $this->purchase_value = $purchase_value;
        $this->sale_value = $sale_value;
        $this->product_image = $product_image;
        $this->inventory_id = $inventory_id;
        }

    // Métodos Setter 
    public function setProductId($product_id) {
        $this->product_id = $product_id;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setMark($mark) {
        $this->mark = $mark;
    }

    public function setCollection($collection) {
        $this->collection = $collection;
    }

    public function setGender($gender) {
        $this->gender = $gender;
    }

    public function setSize($size) {
        $this->size = $size;
    }

    public function setStock($stock) {
        $this->stock = $stock;
    }

    public function setPurchaseValue($purchase_value) {
        $this->purchase_value = $purchase_value;
    }

    public function setSaleValue($sale_value) {
        $this->sale_value = $sale_value;
    }

    public function setProductImage($product_image) {
        $this->product_image = $product_image;
    }

    public function setInventoryId($inventory_id) {
        $this->inventory_id = $inventory_id;
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
    public function getProductId() {
        return $this->product_id;
    }

    public function getType() {
        return $this->type;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getMark() {
        return $this->mark;
    }

    public function getCollection() {
        return $this->collection;
    }

    public function getGender() {
        return $this->gender;
    }

    public function getSize() {
        return $this->size;
    }

    public function getStock() {
        return $this->stock;
    }

    public function getPurchaseValue() {
        return $this->purchase_value;
    }

    public function getSaleValue() {
        return $this->sale_value;
    }

    public function getProductImage() {
        return $this->product_image;
    }

    public function getInventoryId() {
        return $this->inventory_id;
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

    # 2da parte persistencia a la base de datos
}
?>