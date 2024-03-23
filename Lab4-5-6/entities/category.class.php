/* The Category class in PHP defines properties and methods for managing categories, including saving a
category to a database and retrieving a list of categories. */
<?php
require_once("config/db.class.php");

class Category
{
    // Thuộc tính của đối tượng Category
    public $cateId; 
    public $cateName;
    public $cateDes; 

    // Phương thức khởi tạo
    public function __construct($cate_name, $cate_des)
    {
        // Thiết lập tên và mô tả cho danh mục
        $this->cateName = $cate_name;
        $this->cateDes = $cate_des;
    }

    // Lưu danh mục vào cơ sở dữ liệu
    public function save()
    {
        // Tạo đối tượng kết nối cơ sở dữ liệu
        $db = new Db();

        // Tạo truy vấn SQL để chèn dữ liệu vào bảng danh mục
        $sql = "INSERT INTO category (CategoryName, Description) VALUES ('$this->cateName','$this->cateDes')";

        // Thực thi truy vấn và trả về kết quả
        $result = $db->query_execute($sql);

        // Trả về kết quả
        return $result;
    }

    // Danh sách các danh mục
    public static function list_category()
    {
        // Tạo đối tượng kết nối cơ sở dữ liệu
        $db = new DB();

        // Tạo truy vấn SQL để lấy danh sách các danh mục
        $sql = "SELECT * FROM category";

        // Thực thi truy vấn và lấy kết quả dưới dạng mảng
        $rs = $db->select_to_array($sql);

        // Trả về kết quả
        return $rs;
    }
}
?>
