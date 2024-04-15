<style>
    main{
        width: 1200px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    form{
        width: 600px;
        height: 500px;
    }
    form input{
        width: 100px;
        height: 50px;
        font-size: 24px;
    }
</style>
<main id="hop_thoai">
    <form action="..//../ren_nghe_lap_trinh_wed/page_home.php" method="post">
        <table>
            <tr>
                <td>
                    <h2>Tới khách hàng : <?php echo $thongbao['hoten'] ?></h2>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <textarea name="noidung" id="" cols="30" rows="10" placeholder="Lý do hủy đơn hàng" required></textarea>
                </td>
                <td></td>
            </tr>
        </table>
        <input type="hidden" name="tendangnhap" value="<?php echo $thongbao['tendangnhap'] ?>">
        <input type="hidden" name="nhanvien" value="<?php echo $nhanvien ?>">
        <input type="hidden" name="ngaygui" value="<?php echo date('d/m/Y H:i:s')?>">
        <input type="hidden" name="id_donhang" value="<?php echo $id_donhang ?>">
        <button type="submit" name="admin" value="admin_order">Hủy</button>
        <button type="submit" name="admin" value="xac_nhan_xoa">Gửi</button>
    </form>
</main>