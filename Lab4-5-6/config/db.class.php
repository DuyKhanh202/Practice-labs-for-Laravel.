/* The Db class in PHP establishes a database connection, executes queries, and returns results as
arrays. */
<?php
class Db
{
    // Biến kết nối cơ sở dữ liệu
    protected static $connection;

    // Hàm khởi tạo kết nối
    public function connect()
    {
        // Kết nối đến cơ sở dữ liệu
        $connection = mysqli_connect(
            "localhost",
            "root",
            "",
            "demo_lap3"
        );

        // Thiết lập bảng mã kết nối
        mysqli_set_charset($connection, 'utf8');

        // Kiểm tra kết nối
        if (mysqli_connect_errno()) {
            echo "Kết nối cơ sở dữ liệu thất bại: " . mysqli_connect_error();
        }
        return $connection;
    }

    // Hàm thực thi truy vấn
    public function query_execute($queryString)
    {
        // Khởi tạo kết nối
        $connection = $this->connect();

        // Thực thi truy vấn, query là một hàm của thư viện mysqli
        $result = $connection->query($queryString);

        // Đóng kết nối
        $connection->close();

        return $result;
    }

    // Hàm thực hiện trả về một mảng các kết quả
    public function select_to_array($queryString)
    {
        $rows = array();
        $result = $this->query_execute($queryString);

        // Kiểm tra kết quả truy vấn
        if ($result == false) return false;

        // Sử dụng vòng lặp while để đưa dữ liệu vào mảng
        while ($item = $result->fetch_assoc()) {
            $rows[] = $item;
        }
        return $rows;
    }
}
?>
