
<style>
    #presonnel header button{
        margin-left: 200px;
        margin-top: 20px;
    }
    #presonnel{
        width: 1200px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 20px;
    }
    #presonnel table{
        border-collapse: collapse;
        width: 700px;
        text-align: center;
        font-size: 20px;
    }
    #presonnel caption{
        font-size: 40px;
    }
    #presonnel #btnsua{
        background-color: cyan;
    }
    #presonnel #btnxoa{
        background-color: red;
        color: aliceblue;
    }
    #presonnel #btn_huy_them{
        width: 100%;
        text-align: center;
        margin-top: 20px;
    }
    #presonnel #btn_huy_them input:nth-child(1){
        margin-right: 30px;
        background-color: red;
        color: aliceblue;
    }
    #presonnel #btn_huy_them input:nth-child(2){
        background-color: blue;
        color: aliceblue;
    }
    #presonnel dialog{
        margin-top: 100px;
    }

</style>
<?php
$tendangnhap = $_SESSION['presonnel'];
$sqlcv = mysqli_query($ketnoi, "SELECT  * FROM quanly where tendangnhap = '$tendangnhap'");
$chucvu = mysqli_fetch_array($sqlcv);
?>
<main id="presonnel">
    <table border="1">
        <caption>Danh sách nhân viên</caption>
        <tr style="text-align: center;">
            <td colspan="7">
            <form action="..//../ren_nghe_lap_trinh_wed/page_home.php" method="post">
                <button type="submit" value="admin_home" name="admin">Trang quản lý</button>
                <button type="button" style="background-color: chartreuse;" id="them" onclick="dal(2)">Thêm</button>
            </form> 
            </td>
        </tr>
        <tr>
            <td>Stt</td>
            <td>Tên nhân viên</td>       
            <td>Tên đăng nhập</td>
            <td>Mật Khẩu</td>
            <td>Chức vụ</td>
            <td></td>
            <td></td>
        </tr>
        <?php

        $i=1;
        $sql = "SELECT  * FROM quanly";
        $kiemtra = mysqli_query($ketnoi, $sql);
        while($nhan_vien=mysqli_fetch_array($kiemtra)){         
            echo"<tr>";
                echo"<td>";
                    echo $i;
                echo"</td>";
                echo"<td>";
                    echo $nhan_vien['ten'];
                echo"</td>";
                switch($chucvu['chucvu']){
                    case 1:
                        echo"<td>";
                        echo $nhan_vien['tendangnhap'];
                        echo"</td>";
                        echo"<td>";
                        echo $nhan_vien['matkhau'];
                        echo"</td>";
                    break;
                    case 2:
                        if($nhan_vien['chucvu']==1 || $nhan_vien['chucvu']==2){
                            $nhan_vien['tendangnhap']="******";
                            $nhan_vien['matkhau']="******";
                            echo"<td>";
                            echo $nhan_vien['tendangnhap'];
                            echo"</td>";
                            echo"<td>";
                            echo $nhan_vien['matkhau'];
                            echo"</td>";
                        }else{
                            echo"<td>";
                            echo $nhan_vien['tendangnhap'];
                            echo"</td>";
                            echo"<td>";
                            echo $nhan_vien['matkhau'];
                            echo"</td>";
                        }
                    break;
                    case 3:
                        $nhan_vien['tendangnhap']="******";
                        $nhan_vien['matkhau']="******";
                        echo"<td>";
                        echo $nhan_vien['tendangnhap'];
                        echo"</td>";
                        echo"<td>";
                        echo $nhan_vien['matkhau'];
                        echo"</td>";
                    break;
                }
                echo"<td>";
                switch($nhan_vien['chucvu']){
                    case 1: 
                        echo "Chủ";
                    break;
                    case 2: 
                        echo "Quản lý";
                    break;
                    case 3: 
                        echo "Nhân viên";
                    break;
                }
                echo"</td>";
                switch($chucvu['chucvu']){
                    case 1:
                        echo"<td>";
                        echo"<button id=\"btnsua\" onclick=\"location.href='..//../ren_nghe_lap_trinh_wed/page_home.php?admin=update_presonnel&update=".$nhan_vien['id']."'\">Sửa</button>";                   
                        echo"</td>";
                        echo"<td>";
                        echo"<button id=\"btnxoa\" onclick=\"location.href='..//../ren_nghe_lap_trinh_wed/page_home.php?admin=update_presonnel&delete=".$nhan_vien['id']."'\">Xóa</button>";
                        echo"</td>";
                    break;
                    case 2:
                        if($nhan_vien['chucvu']==1 || $nhan_vien['chucvu']==2){
                            echo"<td><button id=\"btnsua\">No</button></td>";
                            echo"<td><button id=\"btnxoa\">No</button></td>";
                        }
                        else{
                            echo"<td>";
                            echo"<button id=\"btnsua\" onclick=\"location.href='..//../ren_nghe_lap_trinh_wed/page_home.php?admin=update_presonnel&update=".$nhan_vien['id']."'\">Sửa</button>";                   
                            echo"</td>";
                            echo"<td>";
                            echo"<button id=\"btnxoa\" onclick=\"location.href='..//../ren_nghe_lap_trinh_wed/page_home.php?admin=update_presonnel&delete=".$nhan_vien['id']."'\">Xóa</button>";
                            echo"</td>";
                        }
                    break;
                    case 3:
                        echo"<td><button id=\"btnsua\">No</button></td>";
                        echo"<td><button id=\"btnxoa\">No</button></td>";
                    break;
                }
            echo"</tr>";
            $i++;
        }
        ?>
    </table>
    <dialog id="d_them">
        <form action="..//../ren_nghe_lap_trinh_wed/page_home.php" method="post">
            <table>
                <tr>
                    <td>Tên: <input type="text" name="ten" value="" multiple required></td>
                </tr>
                <tr>
                    <td>Tên Đăng nhập: <input type="text" name="tendangnhap" value="" multiple required></td>
                </tr>
                <tr>
                    <td>Mật khẩu: <input type="text" name="matkhau" value="" multiple required></td>
                </tr>
                <tr>
                    <td><select name="chucvu" id="" required>
                        <option>-- Chọn chức vụ --</option>
                        <option value="3">Nhân viên</option>
                        <option value="2">Quản lý</option> 
                        <?php
                        if($chucvu['chucvu']==1)
                            echo '<option value="1">Chủ</option>';  
                        ?>                       
                    </select></td>
                </tr>
            </table>
            <div id="btn_huy_them">
                <button type="button" onclick="dal(1)">Hủy</button>
                <button type="submit" value="add_presonnel" name="admin">Thêm</button>
            </div>
        </form>
    </dialog>
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
