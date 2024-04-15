<?php
    if(isset($_GET['tb'])){
    $kh=$_GET['tb'];
    $nhanvien = $_SESSION['presonnel'];
    $sql = "SELECT  * FROM khach where id_khach = '$kh'";
    $kiemtra = mysqli_query($ketnoi, $sql);
    $khach=mysqli_fetch_array($kiemtra);
?>
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
    #btn_huy_them input:nth-child(2){
        margin-right: 30px;
        background-color: red;
        color: aliceblue;
    }
    #btn_huy_them input:nth-child(3){
        background-color: blue;
        color: aliceblue;
    }
</style>
<main>
    <form action="..//../ren_nghe_lap_trinh_wed/page_home.php" method="post">
        <table>
            <tr>
                <td>Tới khách hàng: <?php echo $khach['hoten'] ?></td>
            </tr>
            <tr>
                <td>Nội dung: <textarea name="noidung" cols="30" rows="10"></textarea></td>
            </tr>
        </table>
        <div id="btn_huy_them">
            <input type="hidden" name="tendangnhap" value="<?php echo $khach['tendangnhap'] ?>">
            <button type="submit" name="admin" value="admin_customer">Hủy</button>
            <button type="submit" value="admin_send_message" name="admin">Gửi</button>
            <input type="hidden" name="nhanvien" value="<?php echo $nhanvien ?>">
            <input type="hidden" name="ngaygui" value="<?php echo date('d/m/Y H:i:s')?>">
        </div>
    </form>
</main>
<?php
    }
    if(isset($_GET['tbdg']) || isset($_POST['tbdg'])){
        if(isset($_GET['tbdg']))
            $id = $_GET['tbdg'];
        if(isset($_POST['tbdg']))
            $id = $_POST['tbdg'];
        $sql = "SELECT  * FROM khach where id_khach = '$id'";
        $kiemtra = mysqli_query($ketnoi, $sql);
        $khach=mysqli_fetch_array($kiemtra);
?>
<style>
    body{
        margin: 0;
        padding: 0;
    }
    header button{
        margin-left: 200px;
        margin-top: 20px;
    }
    main{
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 20px;
    }
    table{
        border-collapse: collapse;
        width: 1000px;
        text-align: center;
        font-size: 20px;
    }
    caption{
        font-size: 40px;
    }
    #btn_ql{
        background-color: blue;
        color: aliceblue;
        height: 30px;
        font-size: 20px;
    }
    #id_thanh_search{
        width: 300px;
        height: 30px;
        font-size: 20px;
    }
    #id_btn_search{
        background-color: blue;
        color: aliceblue;
        height: 30px;
        font-size: 20px;
    }
    #id_btn_all{
        background-color: orangered;
        color: aliceblue;
        height: 30px;
        font-size: 20px;
    }
    dialog{
    width: 400px;
    height: 200px;
    background-color: darkgrey;
    color: black;
    margin-top: 200px;
}
#hop_thoai h2{
    height: 40%;
    width: 100%;
    text-align: center;
    font-size: 30px;
}
#hop_thoai form{
    display: flex;
    align-items: center;
}
#hop_thoai button{
    width: 100px;
    height: 50px;
    background-color: blue;
    color: aliceblue;
    font-size: 30px;
    margin-left: 65px;
}
    #btnxoa{
        background-color: red;
        color: aliceblue;
    }
</style>
<main>
    <table border="1">
        <caption>Khách hàng: <?php echo $khach['hoten']?></caption>
        <tr style="text-align: center;">
            <td colspan="12" style="height: 60px;">
                <form action="..//../ren_nghe_lap_trinh_wed/page_home.php" method="post">
                    <button id="btn_ql" type="submit" name="admin" value="admin_customer">Quay lại</button>
                    <input type="search" name="keyword" value="" placeholder="Tìm nhân viên gửi">
                    <button type="submit" name="admin" value="search_msg">Tìm</button>
                    <button type="submit" name="admin" value="admin_msg">Tất cả</button> 
                    <input type="hidden" name="tbdg" value="<?php echo $id ?>">      
                </form>
            </td>
        </tr>
        <tr>
            <td>Stt</td>
            <td>Từ nhân viên</td>       
            <td>Thời gian</td>
            <td>Trạng thái</td>
            <td>Nội dung</td>
        </tr>
        <?php
        if(isset($_POST['admin'])){
            if($_POST['admin']=='search_msg' && !empty($_POST['keyword'])){
                $tt = $_POST['keyword'];
                $i=0;
                $text = mysqli_query($ketnoi, "SELECT  * FROM quanly where ten like '%$tt%'");
                $row = mysqli_fetch_array($text);
                $nhanvien;
                if(isset($row['id'])){
                    $nhanvien = $row['tendangnhap'];
                    $tendangnhap = $khach['tendangnhap'];
                    $sql = "SELECT  * FROM thongbao,quanly where thongbao.tendangnhap = '$tendangnhap' and thongbao.nhanvien = '$nhanvien' and thongbao.nhanvien = quanly.tendangnhap";
                    $kiemtra = mysqli_query($ketnoi, $sql);
                    while($thongbao=mysqli_fetch_array($kiemtra)){
                        if($thongbao['trangthai']==1){
                            $thongbao['trangthai']="Đã xem";
                        }else{
                            $thongbao['trangthai']="Chưa xem";
                        }
                        $i++;
                        echo"<tr>";
                            echo"<td>";
                                echo $i;
                            echo"</td>";
                            echo"<td>";
                                echo $thongbao['ten'];
                            echo"</td>";
                            echo"<td>";
                                echo $thongbao['thoigian'];
                            echo"</td>";
                            echo"<td>";
                                echo $thongbao['trangthai'];
                            echo"</td>";
                            echo"<td>";
                                echo $thongbao['noidung'];
                            echo"</td>";
                            echo"<td>";
                                echo"<button id=\"btnxoa\" onclick=\"location.href='..//../ren_nghe_lap_trinh_wed/page_home.php?admin=delete_msg&delete=".$thongbao['id_thongbao']."&tbdg=".$id."'\">Xóa</button>";
                            echo"</td>";
                        echo"</tr>";
                    }
                }
            }
            else{
                $i=0;
                $tendangnhap = $khach['tendangnhap'];
                $sql = "SELECT  * FROM thongbao,quanly where thongbao.tendangnhap = '$tendangnhap' and thongbao.nhanvien = quanly.tendangnhap";
                $kiemtra = mysqli_query($ketnoi, $sql);
                while($thongbao=mysqli_fetch_array($kiemtra)){
                    if($thongbao['trangthai']==1){
                        $thongbao['trangthai']="Đã xem";
                    }else{
                        $thongbao['trangthai']="Chưa xem";
                    }
                    $i++;
                    echo"<tr>";
                        echo"<td>";
                            echo $i;
                        echo"</td>";
                        echo"<td>";
                            echo $thongbao['ten'];
                        echo"</td>";
                        echo"<td>";
                            echo $thongbao['thoigian'];
                        echo"</td>";
                        echo"<td>";
                            echo $thongbao['trangthai'];
                        echo"</td>";
                        echo"<td>";
                            echo $thongbao['noidung'];
                        echo"</td>";
                        echo"<td>";
                            echo"<button id=\"btnxoa\" onclick=\"location.href='..//../ren_nghe_lap_trinh_wed/page_home.php?admin=delete_msg&delete=".$thongbao['id_thongbao']."&tbdg=".$id."'\">Xóa</button>";
                        echo"</td>";
                    echo"</tr>";
                }
            }
        }
        ?>
    </table>
</main>
<?php
    }
?>