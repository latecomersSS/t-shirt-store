<?php
	require_once('connectDB.php');

	class invoices_in{
		private $id;
		private $user_id;
		private $pro_id;
		private $quantity;
		private $created_at;
		private $price;

	

	/**
	 * Class Constructor
	 * @param    $id   
	 * @param    $user_id   
	 * @param    $pro_id  
	 * @param    $quantity  
	 * @param    $created_at   
	 * @param    $price   
	 */
	public function set($id, $user_id, $pro_id, $quantity, $created_at, $price)
	{
		$this->id = $id;
		$this->user_id = $user_id;
		$this->pro_id = $pro_id;
		$this->quantity = $quantity;
		$this->created_at = $created_at;
		$this->price = $price;
	}

	
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     *
     * @return self
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getProId()
    {
        return $this->pro_id;
    }

    /**
     * @param mixed $pro_id
     *
     * @return self
     */
    public function setProId($pro_id)
    {
        $this->pro_id = $pro_id;

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
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     *
     * @return self
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

	// Get all invoices_in
    public function getAll()
    {
    	$conn = connectDB::connect("root", "");
    	$sql = "SELECT * FROM invoices_in WHERE 1";

    	$result = $conn -> query($sql);
    	$conn->close();
    	return $result;
    }

    public static function add($invoices_in)
    {
    	$user_id = $invoices_in->getUserId();
    	$pro_id = $invoices_in->getProId();
    	$quantity = $invoices_in->getQuantity();
    	$created_at = $invoices_in->getCreatedAt();
    	$price = $invoices_in->getPrice();

    	$conn = connectDB::connect("root", "");
    	$sql = "INSERT INTO invoices_in VALUES ($user_id, $pro_id, $quantity, '{$created_at}', $price, NULL)";

    	$value = $conn -> query($sql);

        $conn->close();

    	if($value) 
    		return 1;
    	else
    		return 0;
    }
    
    //Delete invoices_in by id
    public static function delByID($id){
    	$conn = connectDB::connect("root", "");

    	$sql = "DELETE FROM invoices_in WHERE id = $id";

    	$result = $conn -> query($sql);

        $conn->close();

    	if($result)
    		return 1;
    	else
    		return 0;
    }

    public static function delByProID($id){
    	$conn = connectDB::connect("root", "");

    	$sql = "DELETE FROM invoices_in WHERE pro_id = $id";

    	$result = $conn -> query($sql);

        $conn->close();

    	if($result)
    		return 1;
    	else
    		return 0;
    }

    // Update invoices_in
    public static function update($invoices_in)
    {
        $id = $invoices_in->getId();
        $user_id = $invoices_in->getUserId();
    	$pro_id = $invoices_in->getProId();
    	$quantity = $invoices_in->getQuantity();
    	$created_at = $invoices_in->getCreatedAt();
    	$price = $invoices_in->getPrice();

        $conn = connectDB::connect("root", "");
        $sql = "UPDATE invoices_in SET user_id = $user_id, pro_id = $pro_id, quantity = $quantity, created_at = '{$created_at}' WHERE id = $id";
        $value = $conn -> query($sql);

        if ($value) return 1;
        return 0;
    }

    public static function getByUserId($user_id){
        $conn = connectDB::connect("root", "");

        $sql = "SELECT * FROM invoices_in WHERE user_id = $user_id";

        $result = $conn -> query($sql);

        $conn->close();

        return $result;
    }

    public static function getByProId($pro_id){
        $conn = connectDB::connect("root", "");

        $sql = "SELECT * FROM invoices_in WHERE pro_id = $pro_id";

        $result = $conn -> query($sql);

        $conn->close();

        return $result;
    }

    public static function getByID($id){
        $conn = connectDB::connect("root", "");

        $sql = "SELECT * FROM invoices_in WHERE id = $id";

        $result = $conn -> query($sql);

        $conn->close();

        return $result;
    }   
}
?>