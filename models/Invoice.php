<?php 
class Invoice{
    private $dbh;
    private $invoice_id;
    private $order_id;
    private $total_amount;
    private $invoice_state;
    private $created_date;
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
    public function __construct3($order_id,$total_amount,$invoice_state){
        $this->order_id = $order_id;
        $this->total_amount = $total_amount;
        $this->invoice_state = $invoice_state;
    }

    // Métodos Setter
    public function setInvoiceId($invoice_id) {
        $this->invoice_id = $invoice_id;
    }

    public function setOrderId($order_id) {
        $this->order_id = $order_id;
    }

    public function setTotalAmount($total_amount) {
        $this->total_amount = $total_amount;
    }

    public function setInvoiceState($invoice_state) {
        $this->invoice_state = $invoice_state;
    }

    public function setCreatedDate($created_date) {
        $this->created_date = $created_date;
    }

    public function setDeletedDate($deleted_date) {
        $this->deleted_date = $deleted_date;
    }

    // Métodos Getter 
    public function getInvoiceId() {
        return $this->invoice_id;
    }

    public function getOrderId() {
        return $this->order_id;
    }

    public function getTotalAmount() {
        return $this->total_amount;
    }

    public function getInvoiceState() {
        return $this->invoice_state;
    }

    public function getCreatedDate() {
        return $this->created_date;
    }

    public function getDeletedDate() {
        return $this->deleted_date;
    }

    #2da parte persistencia a la base de datos
}
?>