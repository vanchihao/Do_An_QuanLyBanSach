<style>
    main{
        display: flex;
        justify-content: center;
        font-size: 24px;
    }
    main table{
        border-collapse: collapse;
    }
</style>
<main>
    <dialog id="d_them">
        <form action="..//../ren_nghe_lap_trinh_wed/page_home.php" method="post">
            <table>
                <tr>
                    <td>Mã NXB: <input type="text" name="manxb" value="" multiple required></td>
                </tr>
                <tr>
                    <td>Tên NXB: <input type="text" name="tennxb" value="" multiple required></td>
                </tr>
                <tr>
                    <td>SĐT: <input type="number" name="sdt" value="" multiple required></td>
                </tr>
                <tr>
                    <td>Địa chỉ: <input type="text" name="diachi" value="" multiple required></td>
                </tr>
                <tr>
                    <td>Email: <input type="text" name="email" value="" multiple required></td>
                </tr>
            </table>
            <div id="btn_huy_them">
                <button type="button" onclick="dal(1)">Hủy</button>
                <button type="submit" value="add_publishing" name="admin">Thêm</button>
            </div>
        </form>
    </dialog>
    <table border="1">
        <caption>Danh sách nhà xuất bản</caption>
        <tr style="text-align: center;">
            <td colspan="9">
            <form action="..//../ren_nghe_lap_trinh_wed/page_home.php" method="post">
                <button type="submit" value="admin_home" name="admin">Trang quản lý</button>
                <button type="button" style="background-color: chartreuse;" id="them" onclick="dal(2)">Thêm</button>
            </form>
            </td>
        </tr>
        <tr>
            <td><b>Stt</b></td>
            <td><b>Mã NXB</b></td>
            <td><b>Tên NXB</b></td>
            <td><b>SĐT</b></td>
            <td><b>Địa chỉ</b></td>
            <td><b>Email</b></td>
        </tr>
        <?php
        $i=1;
        $sql = "SELECT  * FROM nxb";
        $kiemtra = mysqli_query($ketnoi, $sql);

        while($nxb=mysqli_fetch_array($kiemtra)){

            echo"<tr>";
                echo"<td>";
                    echo $i;
                echo"</td>";
                echo"<td>";
                    echo $nxb['manxb'];
                echo"</td>";
                echo"<td>";
                    echo $nxb['tennxb'];
                echo"</td>";
                echo"<td>";
                    echo $nxb['sdt'];
                echo"</td>";
                echo"<td>";
                    echo $nxb['diachi'];
                echo"</td>";
                echo"<td>";
                    echo $nxb['email'];
                echo"</td>";
                echo"<td>";
                    echo"<button onclick=\"location.href='..//../ren_nghe_lap_trinh_wed/page_home.php?admin=update_publishing&update=".$nxb['manxb']."'\">Sửa</button>";
                echo"</td>";
                echo"<td>";
                    echo"<button onclick=\"location.href='..//../ren_nghe_lap_trinh_wed/page_home.php?admin=delete_publishing&delete=".$nxb['manxb']."'\">Xóa</button>";
                echo"</td>";
            echo"</tr>";
            $i++;
        }
        ?>
    </table>
</main>
<script>
    function dal(a){
        var d_them = document.getElementById("d_them");
        if (a == 1) {
            d_them.open = false;
        }
        else{
            d_them.open = true;
        }
    }
</script>