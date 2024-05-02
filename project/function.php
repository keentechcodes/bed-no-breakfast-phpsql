<?php
require_once "constants.php";
class database {
    private $db_host;
    private $db_name;
    private $db_user;
    private $db_password;
    public function __construct()
    {
        $this->db_host = DB_HOST;
        $this->db_name = DB_NAME;
        $this->db_user = DB_USER;
        $this->db_password = DB_PASSWORD;

        $this->conn = mysqli_connect($this->db_host, $this->db_user, $this->db_password, $this->db_name);

    }

    function get_user_row($email = ""){
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = $this->conn->query($sql);
        if($result) {
            if ($result->num_rows > 0) {
                return $result->fetch_assoc();
            } else {
                return false;
            }
        }

        return false;
    }
    function insert_user_row($firstname = "", $lastname = "", $phonenumber = '', $email = "", $password = "") {
        $sql = "INSERT INTO users (firstname, lastname, phonenumber, email, password) VALUES ('$firstname', '$lastname', '$phonenumber', '$email', '$password')";
        $result = $this->conn->query($sql);
        return $result;
    }
    function get_all_rooms(){
        $sql = "SELECT * FROM rooms";
        $result = $this->conn->query($sql);
        if($result) {
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $result1[] = $row;
                }
                return $result1;
            } else {
                return false;
            }
        }

        return false;
    }

    function insert_order($id, $user_id, $check_in, $check_out) {
        $sql = "INSERT INTO orders (user_id, bnb_id, date_in, date_out) VALUES ('$id', '$user_id', '$check_in', '$check_out' )";
        $result = $this->conn->query($sql);
        return $result;
    }

}

function isLogin(){
    if(isset($_SESSION['userid']) AND $_SESSION['userid'] <> ""){
        return true;
    }
    return false;
}
