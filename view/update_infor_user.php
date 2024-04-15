<?php
    $tendangnhap = $_SESSION['user'];
    $sql = mysqli_query($ketnoi, "SELECT  * FROM khach where tendangnhap = '$tendangnhap'");
    $user = mysqli_fetch_array($sql);
?>
<main id="update_infor_user">
    <form action="../ren_nghe_lap_trinh_wed/page_home.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td><img src="img/<?php echo $user['hinh'];?>" alt=""></td>
                <td><input type="file" name="hinh"></td>
            </tr>
            <tr>
                <td><b>Họ tên: </b></td>
                <td><input type="text" id="hoten" name="hoten" value="<?php echo $user['hoten'] ?>"></td>
            </tr>
            <tr>
                <td><b>Giới tính: </b></td>
                <td><input type="text" id="gioitinh" name="gioitinh" value="<?php echo $user['gioitinh'] ?>"></td>
            </tr>
            <tr>
                <td><b>Địa chỉ: </b></td>
                <td><input type="text" id="diachi" name="diachi" value="<?php echo $user['diachi'] ?>"></td>
            </tr>
            <tr>
                <td><b>Số điện thoại: </b></td>
                <td><input type="number" id="sdt" name="sdt" value="<?php echo $user['sdt'] ?>"></td>
            </tr>
            <tr>
                <td><b>Email: </b></td>
                <td><input type="text" id="ten_email" name="ten_email" value="<?php echo $user['ten_email'] ?>"></td>
            </tr>
            <tr>
                <td><b>Tên đăng nhập: </b></td>
                <td><input type="text" id="tendangnhap" name="tendangnhap" value="<?php echo $user['tendangnhap'] ?>"></td>
            </tr>
            <tr>
                <td><b>Mật khẩu: </b></td>
                <td><input type="text" id="matkhau" name="matkhau" value="<?php echo $user['matkhau'] ?>"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="hidden" name="hinhcu" value="<?php echo $user['hinh'];?>"> 
                    <input type="hidden" name="id_khach" value="<?php echo $user['id_khach'] ?>">   
                    <button type="submit" name='header' value="user">Quay lại</button>
                    <button type="submit" name="update_customer" value="check_update">Cập nhật</button>
                </td>
                <td></td>
            </tr>
        </table>
    </form>
</main>