<?php
	require_once('connectDB.php');

	class orders{

            private $o_id;
            private $u_id;
            private $cus_id;
            private $address;
            private $payment_id;
            private $active;
            private $phone;
            private $updated_at;
            private $created_at;
            private $note;
            private $cus_name;
            private $total;

        /**
         * Class Constructor
         * @param    $o_id   
         * @param    $u_id
         * @param    $cus_id 
         * @param    $address   
         * @param    $payment_id   
         * @param    $active   
         * @param    $phone   
         * @param    $updated_at   
         * @param    $created_at   
         * @param    $note   
         * @param    $cus_name   
         * @param    $total 
         */
        public function set($o_id, $u_id, $cus_id, $address, $payment_id, $active, $phone, $updated_at, $created_at, $note, $cus_name, $total)
        {
            $this->o_id = $o_id;
            $this->u_id = $u_id;
            $this->address = $address;
            $this->payment_id = $payment_id;
            $this->active = $active;
            $this->phone = $phone;
            $this->updated_at = $updated_at;
            $this->created_at = $created_at;
            $this->note = $note;
            $this->cus_id = $cus_id;
            $this->cus_name = $cus_name;
            $this->total = $total;
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
    public function getUId()
    {
        return $this->u_id;
    }

    /**
     * @param mixed $u_id
     *
     * @return self
     */
    public function setUId($u_id)
    {
        $this->u_id = $u_id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCusId()
    {
        return $this->cus_id;
    }

    /**
     * @param mixed $cus_id
     *
     * @return self
     */
    public function setCusId($cus_id)
    {
        $this->cus_id = $cus_id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     *
     * @return self
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPaymentId()
    {
        return $this->payment_id;
    }

    /**
     * @param mixed $payment_id
     *
     * @return self
     */
    public function setPaymentId($payment_id)
    {
        $this->payment_id = $payment_id;

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

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     *
     * @return self
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCusName()
    {
        return $this->cus_name;
    }

    /**
     * @param mixed $cus_name
     *
     * @return self
     */
    public function setCusName($cus_name)
    {
        $this->cus_name = $cus_name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param mixed $total
     *
     * @return self
     */
    public function setTotal($total)
    {
        $this->total = $total;

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
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param mixed $note
     *
     * @return self
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    // word on db
    public function getAll()
    {
        $conn = connectDB::connect("root", "");
        $sql = "SELECT * FROM orders WHERE 1";

        $result = $conn -> query($sql);
        $conn->close();
        return $result;
    }

    public static function getByID($id){
        $conn = connectDB::connect("root", "");

        $sql = "SELECT * FROM orders WHERE id = $id";

        $result = $conn -> query($sql);
        
        $conn->close();

        return $result;
    }

    public static function update($order)
    {
        $id = $order->getOId();
        $u_id = $order->getUId();
        $cus_id = $order->getCusId();
        $address = $order->getAddress();
        $payment_id = $order->getPaymentId();
        $active = $order->getActive();
        $phone = $order->getPhone();
        $note = $order->getNote();
        $created_at = $order->getCreatedAt();
        $updated_at = $order->getUpdatedAt();
        $cus_name = $order->getCusName();
        $total = $order->getTotal();

        $conn = connectDB::connect("root", "");
        $sql = "UPDATE orders SET address = '{$address}', payment_id = $payment_id, active = $active, phone = $phone,
        note = '{$note}', updated_at = '{$updated_at}', cus_name='{$cus_name}', total=$total WHERE id = $id";

        $value = $conn -> query($sql);

        if ($value) 
            return 1;
        else
            return 0;
    }

    public function getAllbyMonth($month)
    {
        $conn = connectDB::connect("root", "");
        $sql = "SELECT * FROM orders WHERE MONTH(orders.updated_at) = $month";

        $result = $conn -> query($sql);
        
        return $result;

    }



// about price
    public static function getTotalPricebyMonth($month)
    {
        $conn = connectDB::connect("root", "");
        $sql = "SELECT  SUM(order_details.quantity*products.price) as total_sales
                FROM order_details, products
                WHERE order_details.product_id=products.id AND MONTH(order_details.updated_at) = '$month' AND order_details.active = 1";

        $result = $conn -> query($sql);

        if($result){
            $row = $result->fetch_array();
            return $row[0];
        }
        return 0;        
    }

    public static function getTotalPricebyOrderID($orderID, $month){
        $conn = connectDB::connect("root", "");
        $sql = "SELECT SUM(order_details.quantity*products.price)
                FROM order_details, products, orders
                WHERE order_details.product_id=products.id AND order_details.order_id = $orderID AND MONTH(orders.updated_at) = $month";

        $result = $conn -> query($sql);

        if($result){
            $row = $result->fetch_array();
            return $row[0];
        }
        return 0;
    }


    public static function getDetailRevenuebyMonth($month)
    {
        $conn = connectDB::connect("root", "");
        $sql = "SELECT  p.id, p.name, order_details.quantity, p.price, SUM(order_details.quantity*p.price) as total_sales
                FROM order_details, products p
                WHERE order_details.product_id=p.id AND MONTH(order_details.updated_at) = $month AND order_details.active = 1
                GROUP BY p.id";

        $result = $conn -> query($sql);
        
        return $result;

    }

    // end about price

    public static function add($orders)
    {
        
        $u_id = $orders->getUId();
        $cus_id = $orders->getCusId();
        $address = $orders->getAddress();
        $payment_id = $orders->getPaymentId();
        $active = $orders->getActive();
        $phone = $orders->getPhone();
        $note = $orders->getNote();
        $created_at = $orders->getCreatedAt();
        $updated_at = $orders->getUpdatedAt();

        $conn = connectDB::connect("root", "");
        $sql = "INSERT INTO orders VALUES (NULL, NULL, 'No', NULL, 0, NULL, '{$created_at}', '{$updated_at}', 'No', $cus_id, NULL, NULL)";

        $value = $conn -> query($sql);

        if ($value) 
            return 1;
        else
            return 0;
    }

    public static function delByID($o_id){
        $conn = connectDB::connect("root", "");

        $sql = "DELETE FROM orders WHERE id = $o_id";

        $result = $conn -> query($sql);

        if($result)
            return 1;
        else
            return 0;
    }

// list order base on request

    // list for stat
    public static function getOrderTotalbyMonth($month){
        $conn = connectDB::connect("root", "");
        $sql = "SELECT COUNT(orders.id)
                FROM orders
                WHERE MONTH(orders.updated_at) = '$month'";

        $result = $conn -> query($sql);

        if($result){
            $row = $result->fetch_array();
            return $row[0];
        }
        return 0;
    }

    public static function getTotalOrderDonebyMonth($month){
        $conn = connectDB::connect("root", "");
        $sql = "SELECT COUNT(orders.id)
                FROM orders
                WHERE orders.active = 1 AND MONTH(orders.updated_at) = '$month'";

        $result = $conn -> query($sql);

        if($result){
            $row = $result->fetch_array();
        
             return $row[0];
          
        }


        return 0;
    }

    public static function getTotalOrderWaitbyMonth($month){
        $conn = connectDB::connect("root", "");
        $sql = "SELECT COUNT(orders.id)
                FROM orders
                WHERE orders.active = 0 AND MONTH(orders.updated_at) = '$month'";

        $result = $conn -> query($sql);

        if($result){
            $row = $result->fetch_array();
            return $row[0];
        }
        return 0;
    }




     public static function getOrderDone($month){
        $conn = connectDB::connect("root", "");

        $sql = "SELECT * FROM orders WHERE orders.active = 1 AND MONTH(orders.updated_at) = $month";

        $result = $conn -> query($sql);

        return $result;
    }


    public static function getOrderWait($month){
        $conn = connectDB::connect("root", "");

        $sql = "SELECT * FROM orders WHERE orders.active= 0 AND MONTH(orders.updated_at) = $month";

        $result = $conn -> query($sql);

        return $result;
    }

// list for order tag

    public static function getListOrderNew(){

        $conn = connectDB::connect("root", "");

        $sql = "SELECT id, cus_name, phone, address, updated_at, active, total
                FROM orders
                WHERE active = 2";

        $result = $conn -> query($sql);

        return $result;
    }

    public static function getListOrderWait(){

        $conn = connectDB::connect("root", "");

        $sql = "SELECT id, cus_name, phone, address, updated_at, active, total
        FROM orders
        WHERE active = 1";

        $result = $conn -> query($sql);

        return $result;
    }


    public static function getListOrderNewByUser($user_id){

        $conn = connectDB::connect("root", "");

        $sql = "SELECT id, cus_name, phone, address, updated_at, active, total
        FROM orders
        WHERE active = 1 AND customer_id=$user_id";

        $result = $conn -> query($sql);

        return $result;
    }

    public static function getListOrderWaitByUser($user_id){

        $conn = connectDB::connect("root", "");

        $sql = "SELECT id, cus_name, phone, address, updated_at, active, total
        FROM orders
        WHERE active = 2 AND customer_id=$user_id";

        $result = $conn -> query($sql);

        return $result;
    }

    public static function getListOrderDone(){

        $conn = connectDB::connect("root", "");

        $sql = "SELECT id, cus_name, phone, address, updated_at, active, total
        FROM orders
        WHERE active = 3";

        $result = $conn -> query($sql);

        return $result;
    }

    public static function getListOrderCanceled(){

            $conn = connectDB::connect("root", "");

            $sql = "SELECT id, cus_name, phone, address, updated_at, active, total
            FROM orders
            WHERE active = -1";

            $result = $conn -> query($sql);

            return $result;
        }


    public static function getIdOrderNew($user_id){
        $conn = connectDB::connect("root", "");

        $sql = "SELECT id FROM orders o WHERE o.customer_id = $user_id AND o.active=0";

        $result = $conn -> query($sql);
        if($result){
            $row = $result->fetch_array();
            if($row[0]>0) return $row[0];
            else return 0;
        }
        $conn->close();
        return 0;
    }

    public static function getListOrderDoneByUser($user_id){

        $conn = connectDB::connect("root", "");

        $sql = "SELECT * FROM orders WHERE customer_id=$user_id AND active = 1";

        $result = $conn -> query($sql);

        return $result;
    }


    public static function cancelOrder($order_id)
    {
        $conn = connectDB::connect("root", "");
        $sql = "UPDATE orders SET active = -1 WHERE id = $order_id";

        $value = $conn -> query($sql);
        $conn->close();

        if ($value) 
            return 1;
        else
            return 0;
    }

    public static function agreeOrder($order_id){
        $conn = connectDB::connect("root", "");
        $sql = "UPDATE orders SET active = 2 WHERE id = $order_id";

        $value = $conn -> query($sql);
        $conn->close();

        if ($value) 
            return 1;
        else
            return 0;
    }
 
}

?>