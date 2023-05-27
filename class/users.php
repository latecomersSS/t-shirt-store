<?php
	require_once('connectDB.php');
	class users{

        private $id;
        private $name;
        private $email;
        private $phone;
        private $password;
        private $active;
        private $remember_token;
        private $created_at;
        private $updated_at;
        private $role;



    public function __construct(){}

  
   

 public function set($id, $name, $email, $phone, $password, $active, $role, $created_at, $updated_at)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->password = $password;
        $this->active = $active;
        $this->role = $role;
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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     *
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;

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
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     *
     * @return self
     */
    public function setPassword($password)
    {
        $this->password = $password;

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
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     *
     * @return self
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }
    

    /**
     * @return mixed
     */
    public function getRememberToken()
    {
        return $this->remember_token;
    }

    /**
     * @param mixed $remember_token
     *
     * @return self
     */
    public function setRememberToken($remember_token)
    {
        $this->remember_token = $remember_token;

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
        $sql = "SELECT * FROM users WHERE 1";

        $result = $conn -> query($sql);
        $conn->close();
        return $result;
    }
    
    // Add new user
    public static function add($user)
    {
        $name = $user->getName();
        $email = $user->getEmail();
        $phone = $user->getPhone();
        $password = $user->getPassword();
        $active = $user->getActive();
        $created_at = $user->getCreatedAt();
        $updated_at = $user->getUpdatedAt();

        $conn = connectDB::connect("root", "");
        $sql = "INSERT INTO users VALUES (NULL, '{$name}', '{$email}', $phone, '{$password}', 1, '', '{$created_at}', '{$updated_at}')";
        $value = $conn -> query($sql);

        $conn->close();

        if ($value){
            return 1;
        }
        return 0;
    }

    // Get user by role
    public static function addUserRole($user_id, $role_id){
        $conn = connectDB::connect("root", "");
        $created_at = date("Y-m-d");
        $updated_at = date("Y-m-d");
        $sql = "INSERT INTO user_roles VALUES (1, $user_id, $role_id, '{$created_at}', '{$updated_at}')";
        $result = $conn -> query($sql);
        $conn->close();
        if($result) return 1;
        return 0;
    }
    
    // Add role for user
    public static function getUserByRole($role){
        $conn = connectDB::connect("root", "");
        $sql = "SELECT * 
                FROM user_roles r, users s 
                WHERE r.user_id=s.id AND r.role_id=$role";
        $result = $conn -> query($sql);
        $conn->close();
        return $result;

    }



    public static function login($email, $password){
        $conn = connectDB::connect("root", "");

        $sql = "SELECT * FROM users u WHERE u.email = '{$email}' AND u.password = '{$password}'";

        $result = $conn -> query($sql);

        $row = $result->fetch_array();

        if($result->num_rows == 1){
            return 1;
        }
        return 0;
    }

    // Get all user role 
    public static function getRoles(){
        $conn = connectDB::connect("root", "");
        $sql = "SELECT * FROM roles WHERE 1";

        $result = $conn -> query($sql);
        $conn->close();
        return $result;
    }

    // Get user by email
    public static function getByEmail($email){
        $conn = connectDB::connect("root", "");

        $sql = "SELECT * FROM users u WHERE u.email = '{$email}'";

        $result = $conn -> query($sql);
        
        $conn->close();

        return $result;
    }

    // Get user by id
    public static function getByID($id){
        $conn = connectDB::connect("root", "");

        $sql = "SELECT * FROM users WHERE id = $id";

        $result = $conn -> query($sql);

        $conn->close();

        return $result;
    }

    public static function getNameByID($id){
        $conn = connectDB::connect("root", "");

        $sql = "SELECT * FROM users WHERE id = $id";

        $result = $conn -> query($sql);

        $user = $result->fetch_array();

        $conn->close();

        return $user[1];
    }

    // Update user
    public static function update($user)
    {
        $id = $user->getId();
        $name = $user->getName();
        $email = $user->getEmail();
        $phone = $user->getPhone();
        $password = $user->getPassword();
        $active = $user->getActive();
        $created_at = $user->getCreatedAt();
        $updated_at = $user->getUpdatedAt();

        $conn = connectDB::connect("root", "");
        $sql = "UPDATE users SET name = '{$name}', email = '{$email}', phone = $phone, password = '{$password}', 
        active = $active, updated_at = '{$updated_at}' WHERE id = $id";
        $value = $conn -> query($sql);

        if ($value) return 1;
        return 0;
    }

    //Update Role
    public static function updateRole($user_id, $role_id){
        $conn = connectDB::connect("root", "");
        $updated_at = date("Y-m-d");
        $sql = "UPDATE user_roles SET role_id=$role_id, updated_at='{$updated_at}' WHERE user_id=$user_id";
        $result = $conn -> query($sql);
        $conn->close();
        if($result) return 1;
        return 0;
    }

    // Delete user by id
    public static function delByID($id){
        $conn = connectDB::connect("root", "");

        $sql = "DELETE FROM users u WHERE u.id=$id";

        $result = $conn -> query($sql);

        $conn->close();

        if($result) return 1;
        return 0;
    }

    // Delete role by user_id
    public static function delRoleByID($id){
        $conn = connectDB::connect("root", "");

        $sql = "DELETE FROM user_roles WHERE user_id = $id";

        $result = $conn -> query($sql);

        $conn->close();

        if($result) return 1;
        return 0;
    }
}
?>