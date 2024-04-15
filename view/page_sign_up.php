<main id="sign_up">
    <form action="..//../ren_nghe_lap_trinh_wed/page_home.php" method="post">
        <table>
            <tr>
                <td colspan="2"><h1>Đăng ký tài khoản</h1></td>
            </tr>
            <tr>
                <td><b>Họ tên</b></td>
                <td><input type="text" id="hoten" name="hoten" multiple required></td>
            </tr>
            <tr>
                <td><b>Giới tính</b></td>
                <td>
                    <input type="radio" id="nam" name="gioitinh" value="Nam" multiple required>Nam
                    <input type="radio" id="nu" name="gioitinh" value="Nữ" required>Nữ
                </td>
            </tr>
            <tr>
                <td><b>Địa chỉ</b></td>
                <td><input type="text" id="diachi" name="diachi"multiple required></td>
            </tr>
            <tr>
                <td><b>Số điện thoại</b></td>
                <td><input type="number" id="sdt" name="sdt"multiple required></td>
            </tr>
            <tr>
                <td><b>Email</b></td>
                <td><input type="text" id="ten_email" name="ten_email"multiple required></td>
            </tr>
            <tr>
                <td><b>Tên đăng nhập</b></td>
                <td><input type="text" id="tendangnhap" name="tendangnhap"multiple required></td>
            </tr>
            <tr>
                <td><b>Mật khẩu</b></td>
                <td><input type="text" id="matkhau" name="matkhau"multiple required></td>
            </tr>
            <tr>
                <td colspan="2">
                    <div>
                        <button type="button" onclick="location.href='..//../ren_nghe_lap_trinh_wed/page_home.php'">Quay lại</button>
                        <button type="submit" name="update_customer" value="check_sign_up">Hoàn tất</button>
                    </div>
                </td>
            </tr>
        </table>
    </form>
</main>