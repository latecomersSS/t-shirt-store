<?php
	require_once('connectDB.php');

	class stocks{
		private $id;
        private $name;
        private $address;
        private $active;
        private $created_at;
        private $updated_at;


   
    
    public function set($id, $name, $address, $active, $created_at, $updated_at)
    {
        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
        $this->active = $active;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
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


    // word on db
    public function getAll()
    {
        $conn = connectDB::connect("root", "");
        $sql = "SELECT * FROM stocks WHERE 1";
        $result = $conn->query($sql);
        return $result;
    }

    public static function add($stock)
    {
        $name = $stock->getName();
        $address = $stock->getAddress();
        $active = $stock->getActive();
        $created_at = $stock->getCreatedAt();
        $updated_at = $stock->getUpdatedAt();

        $conn = connectDB::connect("root", "");
        $sql = "INSERT INTO stocks (id, name, address, created_at, updated_at, active) VALUES (NULL, '{$name}', '{$address}', '{$created_at}', '{$updated_at}', $active)";
        $value = $conn -> query($sql);

        if ($value) return 1;
        return 0;
    }

    public static function update($stock)
    {
        $id = $stock->getId();
        $name = $stock->getName();
        $address = $stock->getAddress();
        $active = $stock->getActive();
        $updated_at = $stock->getUpdatedAt();

        $conn = connectDB::connect("root", "");
        $sql = "UPDATE stocks SET name = '{$name}', address = '{$address}', active = $active, updated_at = '{$updated_at}' WHERE id = $id";
        $value = $conn -> query($sql);

        if ($value) return 1;
        return 0;
    }


    public static function delByID($id){
        $conn = connectDB::connect("root", "");

        $sql = "DELETE FROM stocks WHERE id = $id";

        $result = $conn -> query($sql);

        if($result)
            return 1;
        return 0;
    }

    public static function getByName($name){
        $conn = connectDB::connect("root", "");

        $sql = "SELECT * FROM stocks s WHERE s.name = '{$name}'";

        $result = $conn -> query($sql);

        return $result;
    }

    public static function getByID($id){
        $conn = connectDB::connect("root", "");

        $sql = "SELECT * FROM stocks WHERE id = $id";

        $result = $conn -> query($sql);

        return $result;
    }
}
?>