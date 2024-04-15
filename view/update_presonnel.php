<style>
    body{
        margin: 0;
        padding: 0;
    }
    main{
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 100px;
    }
    table{
        font-size: 28px;
    }
    input{
        height: 30px;
        font-size: 20px;
    }
    select{
        height: 30px;
        font-size: 20px;
    }
    #btn_huy_them{
        width: 100%;
        text-align: center;
        margin-top: 20px;
    }
    #btn_huy_them button:nth-child(2){
        margin-right: 30px;
        background-color: red;
        color: aliceblue;
    }
    #btn_huy_them button:nth-child(3){
        background-color: blue;
        color: aliceblue;
    }

</style>
<?php
    $id = $_GET['update'];
    $sql = "SELECT  * FROM quanly where id = '$id'";
    $kiemtra = mysqli_query($ketnoi, $sql);
    $nhan_vien=mysqli_fetch_array($kiemtra);

    $tendangnhap = $_SESSION['presonnel'];
    $sqlcv = mysqli_query($ketnoi, "SELECT  * FROM quanly where tendangnhap = '$tendangnhap'");
    $chucvu = mysqli_fetch_array($sqlcv);
?>
<main>
    <form action="..//../ren_nghe_lap_trinh_wed/page_home.php" method="post">
        <table>
            <tr>
                <td>Tên: <input type="text" name="ten" value="<?php echo $nhan_vien['ten'] ?>" multiple required></td>
            </tr>
            <tr>
                <td>Tên Đăng nhập: <input type="text" name="tendangnhap" value="<?php echo $nhan_vien['tendangnhap'] ?>" multiple required></td>
            </tr>
            <tr>
                <td>Mật khẩu: <input type="text" name="matkhau" value="<?php echo $nhan_vien['matkhau'] ?>" multiple required></td>
            </tr>
            <tr>
                <td><select name="chucvu" id="" required>
                    <?php
                        switch($chucvu['chucvu']){
                            case 1:
                                echo "<option value=\"1\">Chủ</option>";
                                echo "<option value=\"2\">quản lí</option>";
                                echo "<option value=\"3\">nhân viên</option>";
                                break;
                            case 2:
                                echo "<option value=\"2\">quản lí</option>";
                                echo "<option value=\"3\">nhân viên</option>";
                                break;
                        }
                    ?>                          
                </select></td>
            </tr>
        </table>
        <div id="btn_huy_them">
            <input type="hidden" name="id" value="<?php echo $nhan_vien['id'] ?>">
            <button type="submit" name="admin" value="admin_presonnel">hủy</button>
            <button type="submit" name="admin" value="thuc_hien_sua_presonnel">Sửa</button>
        </div>
    </form>
</main>