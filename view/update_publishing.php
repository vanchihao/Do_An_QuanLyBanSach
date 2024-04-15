<style>
    #update_publishing{
        display: flex;
        justify-content: center;
        margin-top:30px;
        font-size:24px;
    }
    #update_publishing input{
        width: 300px;
        height: 30px;
        font-size: 24px;
    }
    #update_publishing button{
        font-size: 24px;
    }
</style>
<?php
$manxb=$_GET["update"];
$sql = "SELECT  * FROM nxb where manxb = '$manxb'";
$kiemtra = mysqli_query($ketnoi, $sql);
$nxb=mysqli_fetch_array($kiemtra);
?>
<main id="update_publishing">
    <form action="..//../ren_nghe_lap_trinh_wed/page_home.php" method="post">
        <table>
            <tr>
                <td>Mã NXB: <input type="text" name="manxb" value="<?php echo $nxb['manxb'] ?>"></td>
            </tr>
            <tr>
                <td>Tên NXB: <input type="text" name="tennxb" value="<?php echo $nxb['tennxb'] ?>"></td>
            </tr>
            <tr>
                <td>SĐT: <input type="number" name="sdt" value="<?php echo $nxb['sdt'] ?>"></td>
            </tr>
            <tr>
                <td>Địa chỉ: <input type="text" name="diachi" value="<?php echo $nxb['diachi'] ?>"></td>
            </tr>
            <tr>
                <td>Email: <input type="text" name="email" value="<?php echo $nxb['email'] ?>"></td>
            </tr>
        </table>
        <div id="btn_huy_them">
            <input type="hidden" name="id" value="<?php echo $manxb ?>">
            <button type="submit" value="admin_publishing" name="admin">Hủy</button>
            <button type="submit" value="thuc_hien_update_publishing" name="admin">Sửa</button>
        </div>
    </form>
</main>