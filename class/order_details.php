<?php
	require_once 'connectDB.php';
    require_once 'products.php';
	class order_details{

        private $o_id;
        private $proID;
        private $quantity;
        private $created_at;
        private $updated_at;
        private $active;


    public function __construct(){}

    /**
     * Class Constructor
     * @param    $o_id   
     * @param    $proID   
     * @param    $quantity   
     * @param    $created_at   
     * @param    $updated_at   
     * @param    $active   
     */
    public function set($o_id, $proID, $quantity, $created_at, $updated_at, $active)
    {
        $this->o_id = $o_id;
        $this->proID = $proID;
        $this->quantity = $quantity;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
        $this->active = $active;
    }


   

    /**
     * @return mixed
     */
    public function getOId()
    {
        return $this->o_id;
    }

    /**
     * @param mixed $o_id
     *
     * @return self
     */
    public function setOId($o_id)
    {
        $this->o_id = $o_id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getProID()
    {
        return $this->proID;
    }

    /**
     * @param mixed $proID
     *
     * @return self
     */
    public function setProID($proID)
    {
        $this->proID = $proID;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     *
     * @return self
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $created_at
     *
     * @return self
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * @param mixed $updated_at
     *
     * @return self
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param mixed $active
     *
     * @return self
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    // word on db
    public function getAll()
    {
        $conn = connectDB::connect("root", "");
        $sql = "SELECT * FROM order_details WHERE 1";

        $result = $conn -> query($sql);
        $conn->close();
        return $result;
    }

    public static function add($details)
    {
        $o_id = $details->getOId();
        $proID = $details->getProID();
        $quantity = $details->getQuantity();
        $active = $details->getActive();
        $created_at = $details->getCreatedAt();
        $updated_at = $details->getUpdatedAt();

        $conn = connectDB::connect("root", "");
        $sql = "INSERT INTO order_details VALUES ($o_id, $proID, $quantity, '{$created_at}', '{$updated_at}', $active)";

        $value = $conn -> query($sql);

        if ($value) 
            return 1;
        else
            return 0;
    }

    public static function delByID($o_id){
        $conn = connectDB::connect("root", "");

        $sql = "DELETE FROM order_details WHERE order_id = $o_id";

        $result = $conn -> query($sql);

        $conn->close();

        if($result)
            return 1;
        else
            return 0;
    }

    public static function getTotalPricebyOrderID($orderID){
        $conn = connectDB::connect("root", "");
        $sql = "SELECT SUM(order_details.quantity*products.price) as total_sales
                FROM order_details, products
                WHERE order_details.product_id=products.id AND order_details.order_id = $orderID";

        $result = $conn -> query($sql);

        return $result;
    }

    public static function addQuantityDetail($id, $add, $pro_id){
        $conn = connectDB::connect("root", "");

        $sql = "UPDATE order_details SET quantity=quantity+$add WHERE order_id= $id AND product_id=$pro_id";

        $result = $conn -> query($sql);

        if($result)
            return 1;
        else
            return 0;
    }


    public static function getDetailExist($order_id, $product_id){
        $conn = connectDB::connect("root", "");
        $sql = "SELECT * FROM order_details WHERE order_id=$order_id AND product_id=$product_id";

        $result = $conn -> query($sql);
        $conn->close();
        if($result->num_rows > 0){
            return 1;
        }
        return 0;
    }

    public static function getByID($id){
        $conn = connectDB::connect("root", "");

        $sql = "SELECT * FROM order_details WHERE order_id = $id";

        $result = $conn -> query($sql);
        
        $conn->close();

        return $result;
    }

    public static function getQuantityDetail($order_id){
        $conn = connectDB::connect("root", "");

        $sql = "SELECT quantity FROM order_details o WHERE o.order_id = $order_id";

        $result = $conn -> query($sql);
        if($result){
            $row = $result->fetch_array();
            if($row[0]>0) return $row[0];
            else return 0;
        }
        $conn->close();
        return 0;
    }

    public static function delDetailByProId($order_id, $pro_id){
        $conn = connectDB::connect("root", "");

        $sql = "DELETE FROM order_details WHERE order_id = $order_id AND product_id = $pro_id";

        $result = $conn -> query($sql);

        if($result)
            return 1;
        else
            return 0;
    }
}
?>