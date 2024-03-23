/* This PHP code snippet is displaying a list of products on a web page. Here's a breakdown of what the
code is doing: */
/* This PHP code snippet is displaying a list of products on a web page. Here's a breakdown of what the
code is doing: */
<?php
// Import lớp Product từ file product.class.php
require_once('entities/product.class.php');
?>
<?php
// Import header
include_once('header.php');

// Lấy danh sách sản phẩm
$prods = Product::list_product();
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table border="1" class="table">
                <tr>
                    <td>Ảnh</td> 
                    <td>Tên Sản phẩm</td> 
                    <td>Mã Loại</td> 
                    <td>Giá</td> 
                    <td>Số lượng</td>
                    <td>Mô tả</td> 
                </tr>
                <?php
                // Duyệt qua từng sản phẩm và hiển thị thông tin
                foreach ($prods as $item) {
                ?>
                    <tr>
                        <td><?php echo $item['Picture'] ?></td> 
                        <td><?php echo $item['ProductName'] ?></td> 
                        <td><?php echo $item['CateID'] ?></td>
                        <td><?php echo $item['Price'] ?></td> 
                        <td><?php echo $item['Quantity'] ?></td>
                        <td><?php echo $item['Description'] ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>

<?php
// Import footer
include_once('footer.php');
