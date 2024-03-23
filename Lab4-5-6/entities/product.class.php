/* The Product class in PHP defines properties and methods for managing product data in a database. */
<?php
require_once("config/db.class.php");

class Product
{
    // Biến lưu trữ ID sản phẩm
    public $productID;

    // Biến lưu trữ tên sản phẩm
    public $productName;

    // Biến lưu trữ ID danh mục sản phẩm
    public $cateID;

    // Biến lưu trữ giá sản phẩm
    public $price;

    // Biến lưu trữ số lượng sản phẩm
    public $quantity;

    // Biến lưu trữ mô tả sản phẩm
    public $description;

    // Biến lưu trữ đường dẫn hình ảnh sản phẩm
    public $picture;

    // Phương thức khởi tạo của lớp Product
    public function __construct(
        $pro_name,
        $cate_id,
        $price,
        $quantity,
        $desc,
        $picture
    ) {
        // Khởi tạo các thuộc tính cho sản phẩm
        $this->productName = $pro_name;
        $this->cateID = $cate_id;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->description = $desc;
        $this->picture = $picture;
    }

    // Phương thức lưu sản phẩm vào cơ sở dữ liệu
    public function save()
    {
        // Khởi tạo đối tượng kết nối cơ sở dữ liệu
        $db = new Db();

        // Tạo truy vấn SQL để chèn dữ liệu vào bảng sản phẩm
        $sql = "INSERT INTO product (ProductName, CateID, Price, Quantity, Description, Picture) 
                VALUES ('$this->productName', '$this->cateID', '$this->price', '$this->quantity', '$this->description', '$this->picture')";

        // Thực thi truy vấn và trả về kết quả
        $result = $db->query_execute($sql);

        // Trả về kết quả
        return $result;
    }

    // Phương thức lấy danh sách các sản phẩm từ cơ sở dữ liệu
    public static function list_product()
    {
        // Khởi tạo đối tượng kết nối cơ sở dữ liệu
        $db = new DB();

        // Tạo truy vấn SQL để lấy danh sách các sản phẩm
        $sql = "SELECT * FROM product";

        // Thực thi truy vấn và lấy kết quả dưới dạng mảng
        $rs = $db->select_to_array($sql);

        // Trả về kết quả
        return $rs;
    }
}
?>
