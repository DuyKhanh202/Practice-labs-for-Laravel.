/* The class "staff" extends from the "character" class and represents a staff member with properties
such as staff code and working department. */
<?php
require_once("character.php");

// TODO: Lớp này kế thừa từ lớp character
class staff extends character
{
    private $staffcode; 
    private $part; 

   /**
     * Phương thức khởi tạo để khởi tạo các thuộc tính của nhân viên.
     * 
     * @param string $fullname_staff Tên đầy đủ của nhân viên.
     * @param string $countrycode Mã quốc gia liên quan đến nhân viên.
     * @param string $part Bộ phận làm việc của nhân viên.
     */
    public function __construct($fullname_staff, $countrycode, $part)
    {
        parent::__construct($fullname_staff, $countrycode);
        $this->staffcode = $this->StaffCode_continue();
        $this->part = $part;
    }

    /**
     * Lấy mã nhân viên của nhân viên.
     * 
     * @return int Mã nhân viên.
     */
    public function getStaffCode()
    {
        return $this->staffcode;
    }

     /**
     * Lấy bộ phận làm việc của nhân viên.
     * 
     * @return string Bộ phận làm việc.
     */
    public function getPart()
    {
        return $this->part;
    }

  /**
     * Tạo và lấy mã nhân viên.
     * 
     * @return int Mã nhân viên đã tạo.
     */
    private function StaffCode_continue()
    {
        static $makecode = 1;
        return $makecode++;
    }
}
?>
