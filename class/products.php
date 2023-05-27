<?php
	require_once('connectDB.php');

	class products{
		private $proID;
        private $proName;
        private $cate_id;
        private $supplier_id;
        private $price;
        private $quantity;
        private $img;
        private $desc;
        private $created_at;
        private $updated_at;
        private $size; 
        private $color;


   
    
    public function set($proID, $proName, $cate_id, $supplier_id, $price, $quantity, $img, $desc, $created_at, $updated_at)
    {
        $this->proID = $proID;
        $this->proName = $proName;
        $this->cate_id = $cate_id;
        $this->supplier_id = $supplier_id;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->img = $img;
        $this->desc = $desc;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    public function setDetail($proID, $size, $color, $desc, $created_at, $updated_at){
        $this->proID = $proID;
        $this->size = $size;
        $this->color = $color;
        $this->desc = $desc;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;

    }


	

    /**
     * @return mixed
     */
    public function getID()
    {
        return $this->proID;
    }

    /**
     * @param mixed $ID
     *
     * @return self
     */
    public function setID($proID)
    {
        $this->proID = $proID;

        return $this;
    }

     /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param mixed $color
     *
     * @return self
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

     /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param mixed $size     *
     * @return self
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }


    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->proName;
    }

    /**
     * @param mixed $Name
     *
     * @return self
     */
    public function setName($proName)
    {
        $this->proName = $proName;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCateId()
    {
        return $this->cate_id;
    }

    /**
     * @param mixed $cate_id
     *
     * @return self
     */
    public function setCateId($cate_id)
    {
        $this->cate_id = $cate_id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSupplierId()
    {
        return $this->supplier_id;
    }

    /**
     * @param mixed $supplier_id
     *
     * @return self
     */
    public function setSupplierId($supplier_id)
    {
        $this->supplier_id = $supplier_id;

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
    public function getImg()
    {
        return $this->img;
    }

    /**
     * @param mixed $img
     *
     * @return self
     */
    public function setImg($img)
    {
        $this->img = $img;

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


    // word on db
    public static function getAll()
    {
        $conn = connectDB::connect("root", "");
        $sql = "SELECT * FROM products WHERE 1";
        $result = $conn->query($sql);
        return $result;
    }

    // Add new product
    public static function add($product)
    {
        $name = $product->getName();
        $cate_id = $product->getCateId();
        $supplier_id = $product->getSupplierId();
        $price = $product->getPrice();
        $quantity = $product->getQuantity();
        $img = $product->getImg();
        $desc = $product->getDesc();
        $created_at = $product->getCreatedAt();
        $updated_at = $product->getUpdatedAt();

        $conn = connectDB::connect("root", "");
        $sql = "INSERT INTO products VALUES (NULL, '{$name}', $cate_id, $supplier_id, $price, $quantity, '{$img}', '{$desc}', '{$created_at}', '$updated_at')";

        $value = $conn -> query($sql);

        if ($value){
            return 1;
        }
        else
            return 0;
    }
 
    // Update product
    public static function update($product)
    {
        $id = $product->getID();
        $name = $product->getName();
        $cate_id = $product->getCateId();
        $supplier_id = $product->getSupplierId();
        $price = $product->getPrice();
        $quantity = $product->getQuantity();
        $img = $product->getImg();
        $desc = $product->getDesc();
        $updated_at = $product->getUpdatedAt();


        $conn = connectDB::connect("root", "");
        $sql = "UPDATE products SET name = '{$name}', cate_id = $cate_id, supplier_id = $supplier_id, price = $price,
        description = '{$desc}', image = '{$img}', updated_at = '{$updated_at}' WHERE id = $id";

        $value = $conn -> query($sql);

        if ($value) 
            return 1;
        else
            return 0;
    }
     
    //Add Detail product
    public static function addDetail($detail)
    {
        $pro_id = $detail->getID();
        $size = $detail->getSize();
        $color = $detail->getColor();
        $desc = $detail->getDesc();
        $created_at = $detail->getCreatedAt();
        $updated_at = $detail->getUpdatedAt();

        $conn = connectDB::connect("root", "");
        $sql = "INSERT INTO product_details VALUES (NULL, $size, $color, '{$desc}', $pro_id, '{$created_at}', '{$updated_at}')";

        $value = $conn -> query($sql);

        if ($value) 
            return 1;
        else
            return 0;
    }

    // Update product detail
    public static function updateDetail($detail)
    {
        $pro_id = $detail->getProID();
        $size = $detail->getSize();
        $color = $detail->getColor();
        $desc = $detail->getDesc();
        $updated_at = $detail->getUpdatedAt();

        $conn = connectDB::connect("root", "");
        $sql = "UPDATE product_details SET size = $size, color = $color, description = '{$desc}', updated_at = '{$updated_at}' WHERE pro_id = $pro_id";

        $value = $conn -> query($sql);

        if ($value) 
            return 1;
        else
            return 0;
    }

    // Get ProductID by ProductName
    public static function getIdByName($name){
        $conn = connectDB::connect("root", "");
        $sql = "SELECT id FROM products p WHERE p.name='{$name}'";
        $result = $conn->query($sql);
        if($result){
            $row = $result->fetch_array();
            return $row[0];
        }
        return 0;
    }

    // Get product by name
    public static function getByName($name){
        $conn = connectDB::connect("root", "");

        $sql = "SELECT * FROM products p WHERE p.name='{$name}'";

        $result = $conn -> query($sql);

        return $result;
    }

    // Get product by quantity = 0
    public static function getProductOver(){
        $conn = connectDB::connect("root", "");

        $sql = "SELECT * FROM products p WHERE p.quantity=0";

        $result = $conn -> query($sql);

        return $result;
    }
    
    // Delete product by id
    public static function delByID($id){
        $conn = connectDB::connect("root", "");

        $sql = "DELETE FROM products WHERE id = $id";

        $result = $conn -> query($sql);

        $conn->close();

        if($result)
            return 1;
        else
            return 0;
    }

    // Delete product detail by product id
    public static function delDetailByID($p_id){
        $conn = connectDB::connect("root", "");

        $sql = "DELETE FROM product_details WHERE pro_id = $p_id";

        $result = $conn -> query($sql);

        $conn->close();

        if($result)
            return 1;
        else
            return 0;
    }

    
    // Get product by id
    public static function getByID($p_id){
        $conn = connectDB::connect("root", "");

        $sql = "SELECT * FROM products p WHERE p.id = $p_id";

        $result = $conn -> query($sql);

        return $result;
    }

    public static function getNameByID($id){
        $conn = connectDB::connect("root", "");

        $sql = "SELECT * FROM products p WHERE p.id = $id";

        $result = $conn -> query($sql);

        $product = $result->fetch_array();

        $conn->close();

        return $product[1];
    }

     // Get product detail by product id
    public static function getDetailByID($p_id){
        $conn = connectDB::connect("root", "");

        $sql = "SELECT * FROM product_details WHERE pro_id = $p_id";

        $result = $conn -> query($sql);

        return $result;
    }


    // Get product detail by id, color, size
    public static function getDetailByIdColorSize($p_id, $color, $size){
        $conn = connectDB::connect("root", "");

        $sql = "SELECT * FROM product_details WHERE pro_id = $p_id AND color=$color AND size=$size";

        $result = $conn -> query($sql);

        return $result;
    }



    // Add quantity product
    public static function addQuantityPro($id, $add){
        $conn = connectDB::connect("root", "");

        $sql = "UPDATE products SET quantity=quantity+$add WHERE id = $id";

        $result = $conn -> query($sql);

        if($result)
            return 1;
        else
            return 0;
    }


    //Subtract quantity product
    public static function subtractQuantityPro($id, $add){
        $conn = connectDB::connect("root", "");

        $sql = "UPDATE products SET quantity=quantity-$add WHERE id = $id";

        $result = $conn -> query($sql);

        if($result)
            return 1;
        else
            return 0;
    }

    // Select top
    public static function getTop($cond, $limit){
        $conn = connectDB::connect("root", "");
        $sql = "SELECT * FROM products ORDER BY $cond DESC LIMIT $limit;";
        $result = $conn->query($sql);
        $conn->close();
        return $result;  
    }

    public static function getBottom($cond, $limit){
        $conn = connectDB::connect("root", "");
        $sql = "SELECT * FROM products ORDER BY $cond ASC LIMIT $limit;";
        $result = $conn->query($sql);
        $conn->close();
        return $result;  
    }

    // Select top by category
    public static function getTopByCate($cond, $limit, $cate){
        $conn = connectDB::connect("root", "");
        $sql = "SELECT * FROM products WHERE cate_id=$cate ORDER BY $cond DESC LIMIT $limit;";
        $result = $conn->query($sql);
        $conn->close();
        return $result;  
    }

    // Select list products by category
    public static function getByCate($cate){
        $conn = connectDB::connect("root", "");
        $sql = "SELECT * FROM products WHERE cate_id=$cate;";
        $result = $conn->query($sql);
        $conn->close();
        return $result;  
    }

    // SELECT PRODUCT BY LIST CATEGORY ID
    public static function getByListCateID($cateID){
        $conn = connectDB::connect("root", "");
        $sql = "SELECT * FROM products WHERE products.cate_id IN ($cateID)";
        $result = $conn -> query($sql);
        $conn->close();
        return $result;
    }
    public static function countAll()
    {
        $conn = connectDB::connect("root", "");
        $sql = "SELECT COUNT(*) FROM products WHERE 1";
        $result = $conn->query($sql);
        $conn->close();
        if($result){
            $row = $result->fetch_array();
            return $row[0];
        }
        return 0;       
    }
    public static function countByCate($cate_id)
    {
        $conn = connectDB::connect("root", "");
        $sql = "SELECT COUNT(*) FROM products WHERE cate_id=$cate_id";
        $result = $conn->query($sql);
        $conn->close();
        if($result){
            $row = $result->fetch_array();
            return $row[0];
        }
        return 0;       
    }

    public static function getQuantityById($id){
        $conn = connectDB::connect("root", "");
        $sql = "SELECT quantity FROM products WHERE id=$id";
        $result = $conn->query($sql);
        if($result){
            $row = $result->fetch_array();
            return $row[0];
        }
        return 0;
    }
}
?>