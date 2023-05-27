<?php
	require_once('connectDB.php');

	class colors{
		private $id;
        private $name;


   
    
    public function set($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
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



    // Get all size
    public function getAll()
    {
        $conn = connectDB::connect("root", "");
        $sql = "SELECT * FROM colors WHERE 1";
        $result = $conn->query($sql);
        return $result;
    }

    public static function add($size)
    {
        $name = $size->getName();
        $conn = connectDB::connect("root", "");
        $sql = "INSERT INTO colors (id, name) VALUES (NULL, '{$name}')";
        $value = $conn -> query($sql);

        if ($value) return 1;
        return 0;
    }

    public static function update($size)
    {
        $id = $size->getId();
        $name = $size->getName();
        $conn = connectDB::connect("root", "");
        $sql = "UPDATE colors SET name = '{$name}' WHERE id = $id";
        $value = $conn -> query($sql);

        if ($value) return 1;
        return 0;
    }


    public static function delByID($id){
        $conn = connectDB::connect("root", "");

        $sql = "DELETE FROM colors WHERE id = $id";

        $result = $conn -> query($sql);

        if($result)
            return 1;
        return 0;
    }

    public static function getByName($name){
        $conn = connectDB::connect("root", "");

        $sql = "SELECT * FROM colors WHERE name = '{$name}'";

        $result = $conn -> query($sql);

        return $result;
    }

    public static function getByID($id){
        $conn = connectDB::connect("root", "");

        $sql = "SELECT * FROM colors WHERE id = $id";

        $result = $conn -> query($sql);

        return $result;
    }

// get name by id

    public static function getNameById($id){
        $conn = connectDB::connect("root", "");
        $sql = "SELECT name FROM colors WHERE id = $id";

        $result = $conn -> query($sql);

        if($result){
            $row = $result->fetch_array();
            return $row[0];
        }
        return 0;
    }    
}
?>