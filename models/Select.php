<?php 
class Select{
    private $dbh;
    private $selection_id;
    private $doc_id;
    private $order_id;
    private $quantity;
    private $buy_state;
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
    public function __construct5($selection_id,$doc_id,$order_id,$quantity,$buy_state){
        $this->selection_id = $selection_id;
        $this->doc_id = $doc_id;
        $this->order_id = $order_id;
        $this->quantity = $quantity;
        $this->buy_state = $buy_state;
    }
    // Métodos Setter 
    public function setSelectionId($selection_id) {
        $this->selection_id = $selection_id;
    }

    public function setDocId($doc_id) {
        $this->doc_id = $doc_id;
    }

    public function setOrderId($order_id) {
        $this->order_id = $order_id;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    public function setBuyState($buy_state) {
        $this->buy_state = $buy_state;
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
    public function getSelectionId() {
        return $this->selection_id;
    }

    public function getDocId() {
        return $this->doc_id;
    }

    public function getOrderId() {
        return $this->order_id;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function getBuyState() {
        return $this->buy_state;
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
}
?>