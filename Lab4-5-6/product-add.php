/* This PHP code snippet is a form for adding a new product to a website. Here's a breakdown of what
the code does: */
<?php
// Import các lớp và tập tin cần thiết
require_once("entities/product.class.php");
require_once('entities/category.class.php');

// Xử lý khi nút submit được nhấn
if (isset($_POST["btnsubmit"])) {
    // Lấy giá trị từ form
    $productName = $_POST["txtname"];
    $cateID = $_POST["txtcateid"];
    $price = $_POST["txtprice"];
    $quantity = $_POST["txtquantity"];
    $description = $_POST["txtdesc"];
    $picture = $_FILES["txtpic"];

    // Khởi tạo đối tượng sản phẩm mới
    $newProduct = new Product(
        $productName,
        $cateID,
        $price,
        $quantity,
        $description,
        $picture
    );

    // Mảng lưu trữ các lỗi
    $loi = array();
    $loi_str = "";

    // Lưu vào cơ sở dữ liệu
    $result = $newProduct->save($loi);

    // Kiểm tra kết quả
    if (!$result) {
        // Trường hợp có lỗi trong truy vấn
        header("Location: product-add.php?status=failure");
    } else {
        // Trường hợp thêm sản phẩm thành công
        header("Location: product-add.php?status=inserted");
    }
}
?>
<?php if ($loi_str != "") {
?>
    <div class="alert alert-danger"><?php echo $loi_str ?></div>
<?php } ?>
<?php require 'header.php'; ?>
<?php
// Hiển thị thông báo tương ứng với trạng thái thêm sản phẩm
if (isset($_GET["status"])) {
    if ($_GET["status"] == 'inserted') {
        echo "<h2>Add successful product.</h2>";
    } else {
        echo "<h2>Add failed product.</h2>";
    }
}
?>
<!-- Form thêm sản phẩm -->
<form method="post" enctype="multipart/form-data">
    <!-- Tên sản phẩm -->
    <div class="row">
        <div class="lbltitle">
            <label> Product's name </label>
        </div>
        <div class="lblinput">
            <input type="text" name="txtname" value="<?php echo isset($_POST["txtname"]) ? $_POST["txtname"] : "" ?>">
        </div>
    </div>
    <!-- Mô tả sản phẩm -->
    <div class="row">
        <div class="lbltitle">
            <label> Product Description </label>
        </div>
        <div class="lblinput">
            <textarea type="text" name="txtdesc" cols="21" rows="10"><?php echo isset($_POST["txtdesc"]) ? $_POST["txtdesc"] : "" ?></textarea>
        </div>
    </div>
    <!-- Số lượng sản phẩm -->
    <div class="row">
        <div class="lbltitle">
            <label> The number of products </label>
        </div>
        <div class="lblinput">
            <input type="number" name="txtquantity" value="<?php echo isset($_POST["txtquantity"]) ? $_POST["txtquantity"] : "" ?>">
        </div>
    </div>
    <!-- Giá sản phẩm -->
    <div class="row">
        <div class="lbltitle">
            <label> Product price </label>
        </div>
        <div class="lblinput">
            <input type="number" name="txtprice" value="<?php echo isset($_POST["txtprice"]) ? $_POST["txtprice"] : "" ?>">
        </div>
    </div>
    <!-- Loại sản phẩm -->
    <div class="row">
        <div class="lbltitle">
            <label> Product Type </label>
        </div>
        <div class="lblinput">
            <select name="txtcateid">
                <option value="" selected>-- Select type --</option>
                <?php $cates = Category::list_category() ?>
                <?php foreach ($cates as $item) { ?>
                    <option value="<?php echo $item['CateID'] ?>"><?php echo $item['CategoryName'] ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <!-- Ảnh sản phẩm -->
    <div class="row">
        <div class="lbltitle">
            <label>Url Image</label>
        </div>
        <div class="lblinput">
            <input type="file" name="txtpic" accept=".png,.gif,.jpg,.jpeg">
        </div>
    </div>
    <!-- Nút thêm sản phẩm -->
    <div class="row">
        <div class="lbltitle">
            Click more
        </div>
        <div class="submit">
            <button type="submit" name="btnsubmit"> More products </button>
        </div>
    </div>
</form>

<!-- Footer -->
<?php require 'footer.php'; ?>
