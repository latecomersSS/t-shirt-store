<?php 
    require_once 'connectDB.php';

    class suppliers{
        private $sup_id;
        private $sup_name;
        private $sup_address;
        private $sup_email;
        private $sup_phone;
        private $created_at;
        private $updated_at;
        private $active;


    /**
     * Class Constructor
     * @param    $sup_id   
     * @param    $sup_name   
     * @param    $sup_address   
     * @param    $sup_email   
     * @param    $sup_phone   
     * @param    $created_at   
     * @param    $updated_at   
     * @param    $active   
     */
    public function set($sup_id, $sup_name, $sup_address, $sup_email, $sup_phone, $created_at, $updated_at, $active)
    {
        $this->sup_id = $sup_id;
        $this->sup_name = $sup_name;
        $this->sup_address = $sup_address;
        $this->sup_email = $sup_email;
        $this->sup_phone = $sup_phone;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
        $this->active = $active;
    }
    
    /**
     * @return mixed
     */
    public function getSupId()
    {
        return $this->sup_id;
    }

    /**
     * @param mixed $sup_id
     *
     * @return self
     */
    public function setSupId($sup_id)
    {
        $this->sup_id = $sup_id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSupName()
    {
        return $this->sup_name;
    }

    /**
     * @param mixed $sup_name
     *
     * @return self
     */
    public function setSupName($sup_name)
    {
        $this->sup_name = $sup_name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSupAddress()
    {
        return $this->sup_address;
    }

    /**
     * @param mixed $sup_address
     *
     * @return self
     */
    public function setSupAddress($sup_address)
    {
        $this->sup_address = $sup_address;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSupEmail()
    {
        return $this->sup_email;
    }

    /**
     * @param mixed $sup_email
     *
     * @return self
     */
    public function setSupEmail($sup_email)
    {
        $this->sup_email = $sup_email;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSupPhone()
    {
        return $this->sup_phone;
    }

    /**
     * @param mixed $sup_phone
     *
     * @return self
     */
    public function setSupPhone($sup_phone)
    {
        $this->sup_phone = $sup_phone;

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
        $sql = "SELECT * FROM suppliers WHERE 1";

        $result = $conn -> query($sql);
        $conn->close();
        return $result;
    }

    public static function add($supplier)
    {
        $id = $supplier->getSupId();
        $name = $supplier->getSupName();
        $address = $supplier->getSupAddress();
        $email = $supplier->getSupEmail();
        $phone = $supplier->getSupPhone();
        $active = $supplier->getActive();
        $created_at = $supplier->getCreatedAt();
        $updated_at = $supplier->getUpdatedAt();

        $conn = connectDB::connect("root", "");
        $sql = "INSERT INTO suppliers VALUES (NULL, '{$name}', '{$address}', '{$email}', $phone, '{$created_at}', '{$updated_at}', $active)";

        $value = $conn -> query($sql);

        if ($value) 
            return 1;
        else
            return 0;
    }

    // Update supplier
    public static function update($supplier)
    {
        $id = $supplier->getSupId();
        $name = $supplier->getSupName();
        $address = $supplier->getSupAddress();
        $email = $supplier->getSupEmail();
        $phone = $supplier->getSupPhone();
        $active = $supplier->getActive();
        $updated_at = $supplier->getUpdatedAt();


        $conn = connectDB::connect("root", "");
        $sql = "UPDATE suppliers SET name = '{$name}', address = '{$address}', email = '{$email}', phone = $phone, active = $active, updated_at = '{$updated_at}' WHERE id = $id";
        $value = $conn -> query($sql);

        if ($value) return 1;
        return 0;
    }

    public static function delByID($id){
        $conn = connectDB::connect("root", "");

        $sql = "DELETE FROM suppliers WHERE id = $id";

        $result = $conn -> query($sql);

        if($result)
            return 1;
        else
            return 0;
    }

    // Get name by ID
    public static function getNameById($id){
        $conn = connectDB::connect("root", "");
        $sql = "SELECT name FROM suppliers WHERE id = $id";

        $result = $conn -> query($sql);

        if($result){
            $row = $result->fetch_array();
            return $row[0];
        }
        return 0;
    }
    
    // Get supplier by name
    public static function getByName($name){
        $conn = connectDB::connect("root", "");

        $sql = "SELECT * FROM suppliers WHERE name = '{$name}'";

        $result = $conn -> query($sql);

        return $result;
    }

    public static function getByID($id){
        $conn = connectDB::connect("root", "");

        $sql = "SELECT * FROM suppliers WHERE id = $id";

        $result = $conn -> query($sql);

        return $result;
    }
}

?>