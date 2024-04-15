<?php
    $tendangnhap = $_SESSION['user'];
    $sql = mysqli_query($ketnoi, "SELECT  * FROM khach where tendangnhap = '$tendangnhap'");
    $user = mysqli_fetch_array($sql);
?>
<main id="infor">
    <div>
        <img src="img/<?php echo $user['hinh'];?>" id="dai_dien">
        <h1><?php echo $user['hoten']; ?></h1>
    </div>
    <form action="..//../ren_nghe_lap_trinh_wed/page_home.php" method="post">
        <ul class="infor">
            <li><b>----------Thông tin----------</b></li>
            <li><b>Giới tính: </b><?php echo $user['gioitinh'] ?></li>
            <li><b>Địa chỉ: </b><?php echo $user['diachi'] ?></li>
            <li><b>Số điện thoại: </b><?php echo $user['sdt'] ?></li>
            <li><b>Email: </b><?php echo $user['ten_email'] ?></li>
            <li><b>Tên đăng nhập: </b><?php echo $user['tendangnhap'] ?></li>
            <li><b>Mật khẩu: </b><?php echo $user['matkhau'] ?></li>
        </ul>
        <ul class="setting">
            <li><b>----------Cài đặt----------</b></li>
            <li><button type="submit" name="" value="">Trang chủ</button></li>
            <li><button type="submit" name="update_customer" value="information">Sửa thông tin</button></li>
            <li><button type="submit" name="header" value="cart">Giỏ hàng</button></li>
            <li><button type="submit" name="order" value="">Đơn hàng</button></li>
            <li><button type="submit" name="purchased_product" value="">Sản phẩm đã mua</button></li>
            <li><button type="submit" name="update_customer" value="log_out">Đăng xuất</button></li>
        </ul>
    </form>
</main>