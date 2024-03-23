/* The PHP class "member" represents a member with properties for full name, email, and member ID,
along with methods for initialization, destruction, and accessing member information. */
<?php
require_once("support.php");

class member {

    private $fullname; 
    private $email; 
    private $idmember; 

    // TODO: Phương thức khởi tạo để tạo ra một đối tượng thành viên mới
    public function __construct($fullname, $email) {
        $this->fullname = $fullname;
        $this->email = $email;
        $this->idmember = idcontinue();
    }

    // TODO: Phương thức hủy để giải phóng bộ nhớ khi đối tượng bị hủy
    public function __destruct() {
        $this->fullname = NULL;
        $this->email = NULL;
        $this->idmember = NULL;
    }

    // NOTE: Phương thức để lấy họ và tên của thành viên
    public function get_fullname() {
        return $this->fullname;
    }

    // NOTE: Phương thức để lấy email của thành viên
    public function get_email() {
        return $this->email;
    }

    // NOTE: Phương thức để lấy ID của thành viên
    public function get_id() {
        return $this->idmember;
    }

}
?>
