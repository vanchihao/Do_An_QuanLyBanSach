<?php
    if(isset($_SESSION['user'])){
        $tendangnhap = $_SESSION['user'];
        $sql = mysqli_query($ketnoi, "SELECT  * FROM khach where tendangnhap = '$tendangnhap'");
        $user = mysqli_fetch_array($sql);
?>
<dialog id="order">
    <h1><b><?php echo $sach['tensach']; ?></b></h1>
    <form action="..//../ren_nghe_lap_trinh_wed/page_home.php" method="post">
        <table>
            <tr>
                <td rowspan="6"><img src='img/<?php echo $sach['hinh']; ?>'></td>
                <td>Kho: <?php echo $sach['soluong']; ?></td>
            </tr>
            <tr>
                <td>Giá: <?php monney($sach['gia'])?></td>
            </tr>
            <tr>
                <td>
                    Chọn số lượng: <input type="number" name="soluongmua" id="soluong" min="1" 
                    max="<?php echo $sach['soluong']; ?>" value="1" onchange="tinhtien()">
                </td>
            </tr>
            <tr>
                <td>Địa chỉ: <input type="text" name="diachi" value="<?php echo $user['diachi'] ?>"></td>
            </tr>
            <tr>
                <td>Sđt: <input type="number" name="sdt" value="<?php echo $user['sdt'] ?>"></td>
            </tr>
            <tr>
                <td><span id="tongtien">Tổng tiền: <?php monney($sach['gia'])?></span></td>
            </tr>
        </table>
        <input type="hidden" name="kho" value="<?php echo $sach['soluong']; ?>">
        <input type="hidden" id="gia" name="dongia" value="<?php echo $sach['gia']; ?>">
        <input type="hidden" name="ngaydathang" value="<?php echo date('d/m/Y H:i:s')?>">
        <input type="hidden" name="masach" value="<?php echo $sach['masach']; ?>">
        <div>
            <button type="button" onclick="muajs(0)">Hủy</button>
            <button type="submit" name="update_customer" value="buy">Mua</button>
        </div>
    </form>
</dialog>
<?php
    }else{
?>
<dialog id="order">
    <h1><b>Vui lòng đăng nhập để mua hàng !</b></h1>
    <div>
        <button type="button" onclick="muajs(0)">ok</button>
    </div>
</dialog>
<?php
    }
?>