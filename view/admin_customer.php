<style>
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
    #btntb{
        background-color: aqua;
    }
</style>
<main>
    <table border="1">
        <caption>Danh sách khách hàng</caption>
        <tr style="text-align: center;">
            <td colspan="12" style="height: 60px;">
                <form action="..//../ren_nghe_lap_trinh_wed/page_home.php" method="post">
                    <button type="submit" name="admin" value="admin_home">Trang quản lý</button>
                    <input type="search" name="keyword" value="" placeholder="Tìm khách hàng">
                    <button type="submit" name="admin" value="search_customer">Tìm</button>
                    <button type="submit" name="admin" value="admin_customer">Tất cả</button>    
                </form>
            </td>
        </tr>
        <tr>
            <td>Stt</td>
            <td>Hình</td>
            <td>Họ tên</td>       
            <td>Giới tính</td>
            <td>Địa chỉ</td>
            <td>Số ĐT</td>
            <td>Tên email</td>
            <td>Tên đăng nhập</td>
            <td>Mật khẩu</td>
            <td>Thông báo</td>
        </tr>
        <?php
        $kt = true;
        if(isset($_POST['admin'])){
            if($_POST['admin']=='search_customer' && !empty($_POST['keyword'])){
                $keyword = $_POST['keyword'];
                $i=0;
                $sql = "SELECT  * FROM khach where hoten like '%$keyword%'or gioitinh like '%$keyword%'
                or diachi like '%$keyword%' or sdt like '%$keyword%' or ten_email like '%$keyword%'";
                $kiemtra = mysqli_query($ketnoi, $sql);
                while($khach=mysqli_fetch_array($kiemtra)){
                    if(isset($khach['id_khach'])){
                        if($khach['tendangnhap'] || $khach['matkhau']){
                            $khach['tendangnhap']="ẩn";
                            $khach['matkhau']="ẩn";
                        }
                        $i++;
                        echo"<tr>";
                            echo"<td>";
                                echo $i;
                            echo"</td>";
                            echo"<td>";
                                echo "<img style=\"width:60px;height:70px\" src='img/".$khach['hinh']."'>";
                            echo"</td>";
                            echo"<td>";
                                echo $khach['hoten'];
                            echo"</td>";
                            echo"<td>";
                                echo $khach['gioitinh'];
                            echo"</td>";
                            echo"<td>";
                                echo $khach['diachi'];
                            echo"</td>";
                            echo"<td>";
                                echo $khach['sdt'];
                            echo"</td>";
                            echo"<td>";
                                echo $khach['ten_email'];
                            echo"</td>";
                            echo"<td>";
                                echo $khach['tendangnhap'];
                            echo"</td>";
                            echo"<td>";
                                echo $khach['matkhau'];
                            echo"</td>";
                            echo"<td>";
                                echo"<button id=\"btntb\"  onclick=\"location.href='..//../ren_nghe_lap_trinh_wed/page_home.php?admin=admin_msg&tbdg=".$khach['id_khach']."'\">Thông báo đã gửi</button></br>";
                                echo"<button id=\"btntb\"  onclick=\"location.href='..//../ren_nghe_lap_trinh_wed/page_home.php?admin=admin_msg&tb=".$khach['id_khach']."'\">Viết thông báo</button>";
                            echo"</td>";
                        echo"</tr>";
                    }
                }
            }
            else{
                $i=0;
                $sql = "SELECT  * FROM khach";
                $kiemtra = mysqli_query($ketnoi, $sql);
                while($khach=mysqli_fetch_array($kiemtra)){
                    if($khach['tendangnhap'] || $khach['matkhau']){
                        $khach['tendangnhap']="ẩn";
                        $khach['matkhau']="ẩn";
                    }
                    $i++;
                    echo"<tr>";
                        echo"<td>";
                            echo $i;
                        echo"</td>";
                        echo"<td>";
                            echo "<img style=\"width:60px;height:70px\" src='img/".$khach['hinh']."'>";
                        echo"</td>";
                        echo"<td>";
                            echo $khach['hoten'];
                        echo"</td>";
                        echo"<td>";
                            echo $khach['gioitinh'];
                        echo"</td>";
                        echo"<td>";
                            echo $khach['diachi'];
                        echo"</td>";
                        echo"<td>";
                            echo $khach['sdt'];
                        echo"</td>";
                        echo"<td>";
                            echo $khach['ten_email'];
                        echo"</td>";
                        echo"<td>";
                            echo $khach['tendangnhap'];
                        echo"</td>";
                        echo"<td>";
                            echo $khach['matkhau'];
                        echo"</td>";
                        echo"<td>";
                            echo"<button id=\"btntb\"  onclick=\"location.href='..//../ren_nghe_lap_trinh_wed/page_home.php?admin=admin_msg&tbdg=".$khach['id_khach']."'\">Thông báo đã gửi</button></br>";
                            echo"<button id=\"btntb\"  onclick=\"location.href='..//../ren_nghe_lap_trinh_wed/page_home.php?admin=admin_msg&tb=".$khach['id_khach']."'\">Viết thông báo</button>";
                        echo"</td>";
                    echo"</tr>";
                    $i++;
                }
            }
        }
        ?>
    </table>
</main>