<?php 
class Order{
    private $dbh;
    private $order_id;
    private $quantity;
    private $subtotal_amount;
    private $payment_method_id;
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
    public function __construct4($order_id,$quantity,$subtotal_amount,$payment_method_id){
        $this->order_id = $order_id;
        $this->quantity = $quantity;
        $this->subtotal_amount = $subtotal_amount;
        $this->payment_method_id = $payment_method_id;
    }
    // Métodos Setter 
    public function setOrderId($order_id) {
        $this->order_id = $order_id;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    public function setSubtotalAmount($subtotal_amount) {
        $this->subtotal_amount = $subtotal_amount;
    }

    public function setPaymentMethodId($payment_method_id) {
        $this->payment_method_id = $payment_method_id;
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
    public function getOrderId() {
        return $this->order_id;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function getSubtotalAmount() {
        return $this->subtotal_amount;
    }

    public function getPaymentMethodId() {
        return $this->payment_method_id;
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