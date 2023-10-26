<?php 
class PaymentMethod{
    private $dbh;
    private $payment_method_id;
    private $payment_type;
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
    public function __construct2($payment_method_id,$payment_type){
        $this->payment_method_id = $payment_method_id;
        $this->payment_type = $payment_type;
    }
    // Métodos Setter 
    public function setPaymentMethodId($payment_method_id) {
        $this->payment_method_id = $payment_method_id;
    }

    public function setPaymentType($payment_type) {
        $this->payment_type = $payment_type;
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
    public function getPaymentMethodId() {
        return $this->payment_method_id;
    }

    public function getPaymentType() {
        return $this->payment_type;
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