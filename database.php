<?php
class Database {
    private $connection;

    function __construct(){
        $this->connect_db();
    }

    public function connect_db(){
        $this->connection = mysqli_connect('172.31.22.43', 'Valmiki200524559', '4VyvxiRXYt', 'Valmiki200524559');
        if (mysqli_connect_error()) {
            die("Database Connection Failed" . mysqli_connect_error());
        }
    }

    public function create($pizzaType, $pizzaSize, $toppings, $deliveryAddress){
        $pizzaType = $this->sanitize($pizzaType);
        $pizzaSize = $this->sanitize($pizzaSize);
        $deliveryAddress = $this->sanitize($deliveryAddress);
        $toppings = implode(", ", $toppings);
        $toppings= $this->sanitize($toppings);

        $sql = "INSERT INTO pizza_orders (pizza_type, pizza_size, toppings, delivery_address) 
                VALUES('$pizzaType', '$pizzaSize', '$toppings', '$deliveryAddress')";
        
        $res = mysqli_query($this->connection, $sql);

        if($res){
            return true;
        } else {
            return false;
        }
    }

    public function sanitize($var){
        $return = mysqli_real_escape_string($this->connection, $var);
        return $return;
    }
}

$database = new Database();
?>
