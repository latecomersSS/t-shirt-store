<?php
	require_once('connectDB.php');

	class payments{
		private $id;
		private $name;
		private $desc;
		private $created_at;
		private $updated_at;
		private $active;

	

	/**
	 * Class Constructor
	 * @param    $id   
	 * @param    $name   
	 * @param    $desc    
	 * @param    $created_at   
	 * @param    $updated_at   
	 * @param    $active   
	 */
	public function set($id, $name, $desc, $created_at, $updated_at, $active)
	{
		$this->id = $id;
		$this->name = $name;
		$this->desc = $desc;
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
    	$sql = "SELECT * FROM payments WHERE 1";

    	$result = $conn -> query($sql);
    	$conn->close();
    	return $result;
    }

    public static function getNameByID($id){
        $conn = connectDB::connect("root", "");

        $sql = "SELECT * FROM payments WHERE id = $id";

        $result = $conn -> query($sql);

        $pm = $result->fetch_array();

        $conn->close();

        return $pm[1];
    }
}
?>