<?php
	require_once('connectDB.php');

	class categories{
		private $id;
		private $name;
		private $desc;
		private $stock_id;
		private $created_at;
		private $updated_at;
		private $active;

	

	/**
	 * Class Constructor
	 * @param    $id   
	 * @param    $name   
	 * @param    $desc   
	 * @param    $stock_id   
	 * @param    $created_at   
	 * @param    $updated_at   
	 * @param    $active   
	 */
	public function set($id, $name, $desc, $stock_id, $created_at, $updated_at, $active)
	{
		$this->id = $id;
		$this->name = $name;
		$this->desc = $desc;
		$this->stock_id = $stock_id;
		$this->created_at = $created_at;
		$this->updated_at = $updated_at;
		$this->active = $active;
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDesc()
    {
        return $this->desc;
    }

    /**
     * @param mixed $desc
     *
     * @return self
     */
    public function setDesc($desc)
    {
        $this->desc = $desc;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStockId()
    {
        return $this->stock_id;
    }

    /**
     * @param mixed $stock_id
     *
     * @return self
     */
    public function setStockId($stock_id)
    {
        $this->stock_id = $stock_id;

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
    public static function getAll()
    {
    	$conn = connectDB::connect("root", "");
    	$sql = "SELECT * FROM categories WHERE 1";

    	$result = $conn -> query($sql);
    	$conn->close();
    	return $result;
    }

    public static function add($cate)
    {
    	$name = $cate->getName();
    	$desc = $cate->getDesc();
    	$stock_id = $cate->getStockId();
    	$created_at = $cate->getCreatedAt();
    	$updated_at = $cate->getUpdatedAt();
    	$active = $cate->getActive();

    	$conn = connectDB::connect("root", "");
    	$sql = "INSERT INTO categories VALUES (NULL, '{$name}', '{$desc}', $stock_id, '{$created_at}', '{$updated_at}', $active)";

    	$value = $conn -> query($sql);

    	if($value) 
    		return 1;
    	else
    		return 0;
    }

    public static function delByID($cate_id){
    	$conn = connectDB::connect("root", "");

    	$sql = "DELETE FROM categories WHERE id = $cate_id";

    	$result = $conn -> query($sql);

    	if($result)
    		return 1;
    	else
    		return 0;
    }
    public static function update($category)
    {
        $id = $category->getId();
        $name = $category->getName();
        $desc = $category->getDesc();
        $stock_id = $category->getStockId();
        $active = $category->getActive();
        $updated_at = $category->getUpdatedAt();

        $conn = connectDB::connect("root", "");
        $sql = "UPDATE categories SET name = '{$name}', description = '{$desc}', stock_id = $stock_id, active = $active, updated_at = '{$updated_at}' WHERE id = $id";
        $value = $conn -> query($sql);

        if ($value) return 1;
        return 0;
    }


    public static function getByName($name){
        $conn = connectDB::connect("root", "");

        $sql = "SELECT * FROM categories c WHERE c.name = '{$name}'";

        $result = $conn -> query($sql);

        return $result;
    }

    public static function getByID($id){
        $conn = connectDB::connect("root", "");

        $sql = "SELECT * FROM categories WHERE id = $id";

        $result = $conn -> query($sql);

        return $result;
    }   


    // Get name by ID
    public static function getNameById($id){
        $conn = connectDB::connect("root", "");
        $sql = "SELECT name FROM categories WHERE id = $id";

        $result = $conn -> query($sql);

        if($result){
            $row = $result->fetch_array();
            return $row[0];
        }
        return 0;
    }
}
?>