<?php
class character
{
    private $fullname;
    private $countrycode;
    /**
 * Phương thức khởi tạo để khởi tạo các thuộc tính của đối tượng.
 *
 * @param string $fullname Tên đầy đủ của đối tượng.
 * @param string $countrycode Mã quốc gia liên quan đến đối tượng.
 */
    public function __construct($fullname, $countrycode)
    {
    $this->fullname = $fullname;
    $this->countrycode = $countrycode;
    }
    public function get_fullname()
    {
    return $this->fullname;
    }
    public function get_countrycode()
    {
    return $this->countrycode;
    }
    }
