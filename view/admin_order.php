<style>
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
        width: 1200px;
        text-align: center;
        font-size: 20px;
    }
    caption{
        font-size: 40px;
    }
    dialog{
    position: absolute;
    width: 400px;
    height: 200px;
    background-color: darkgrey;
    color: black;
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
#hop_thoai input{
    width: 100px;
    height: 50px;
    background-color: blue;
    color: aliceblue;
    font-size: 30px;
    margin-left: 65px;
}
main button{
   font-size: 14px;
}
</style>
<main>
    <table border="1">
        <caption>
            <?php
            if(isset($_POST['admin'])){
                if($_POST['admin']=='authenticate')
                    echo "Chờ xác thực";
                else if($_POST['admin']=='delivery')
                    echo "Giao hàng";
                else if($_POST['admin']=='pay')
                    echo "Chờ thanh toán";
                else if($_POST['admin']=='search_order')
                    echo "Tìm đơn của khách hàng";
                else if($_POST['admin']=='product_sold')
                    echo "Đã bán";
                else
                    echo "Đơn hàng";
            }
            ?>
        </caption>
        <tr style="text-align: center;">
            <td colspan="12" style="height: 60px;">
                <form action="..//../ren_nghe_lap_trinh_wed/page_home.php" method="post"> 
                    <button type="submit" name="admin" value="admin_home">Trang admin</button>
                    <input type="search" name="keyword" value="" placeholder="Tìm đơn hàng">
                    <button type="submit" name="admin" value="search_order">Tìm</button>
                    <button type="submit" name="admin" value="authenticate">Chờ xác thực</button>
                    <button type="submit" name="admin" value="delivery">Giao hàng</button>
                    <button type="submit" name="admin" value="pay">Chờ thanh toán</button>
                    <button type="submit" name="admin" value="product_sold">Đã bán</button>
                </form>
            </td>
        </tr>
        <tr>
            <td>Stt</td>
            <td>Khách hàng</td>
            <td>Tên sách</td>
            <td>Địa chỉ</td>
            <td>Số ĐT</td>
            <td>Số lượng</td>
            <td>Giá</td>
            <td>Tổng tiền</td>
            <td>Ngày mua</td>
            <td>Ngày Nhận</td>
        </tr>
        <?php
    
        if(isset($_POST['admin'])){
            if($_POST['admin']=='authenticate'){
                $i=0;
                $dh = mysqli_query($ketnoi,"SELECT * FROM donhang,khach,sach where donhang.tendangnhap = khach.tendangnhap and donhang.masach = sach.masach");
                while($donhang = mysqli_fetch_array($dh)){
                    if(isset($donhang['id_donhang'])){
                        $id_dh = $donhang['id_donhang'];
                        $ct_dh = mysqli_query($ketnoi,"SELECT * from ct_donhang where id_donhang = '$id_dh'");
                        $ct_donhang = mysqli_fetch_array($ct_dh);
                        if(!isset($ct_donhang['id_ctdh'])){
                            $i++;
                            echo"
                            <tr>
                                <td>$i</td>
                                <td>".$donhang['hoten']."</td>
                                <td>".$donhang['tensach']."</td>
                                <td>".$donhang['diachi']."</td>
                                <td>".$donhang['sdt']."</td>
                                <td>".$donhang['soluongmua']."</td>
                                <td>";monney($donhang['dongia']);
                                echo"</td>
                                <td>";monney($donhang['soluongmua']*$donhang['dongia']);echo"</td>
                                <td>".$donhang['ngaydathang']."</td>
                                <td></td>
                                <td><button onclick=\"location.href='..//../ren_nghe_lap_trinh_wed/page_home.php?admin=update_order&authenticate=".$donhang['id_donhang']."'\">Xác nhận</button></td>
                                <td><button onclick=\"location.href='..//../ren_nghe_lap_trinh_wed/page_home.php?admin=update_order&delete=".$donhang['id_donhang']."'\">Hủy</button></td>
                            </tr>
                            ";
                        }
                    }
                }
            }
            if($_POST['admin']=='delivery'){
                $i=0;
                $dh = mysqli_query($ketnoi,"SELECT * FROM donhang,khach,sach where donhang.tendangnhap = khach.tendangnhap and donhang.masach = sach.masach");
                while($donhang = mysqli_fetch_array($dh)){
                    if(isset($donhang['id_donhang'])){
                        $id_dh = $donhang['id_donhang'];
                        $ct_dh = mysqli_query($ketnoi,"SELECT * from ct_donhang where id_donhang = '$id_dh'");
                        $ct_donhang = mysqli_fetch_array($ct_dh);
                        if(isset($ct_donhang['id_ctdh']) && $ct_donhang['trangthai']==1){
                            $i++;
                            echo"
                            <tr>
                                <td>$i</td>
                                <td>".$donhang['hoten']."</td>
                                <td>".$donhang['tensach']."</td>
                                <td>".$donhang['diachi']."</td>
                                <td>".$donhang['sdt']."</td>
                                <td>".$donhang['soluongmua']."</td>
                                <td>";monney($donhang['dongia']);
                                echo"</td>
                                <td>";monney($donhang['soluongmua']*$donhang['dongia']);echo"</td>
                                <td>".$donhang['ngaydathang']."</td>
                                <td></td>
                                <td><button onclick=\"location.href='..//../ren_nghe_lap_trinh_wed/page_home.php?admin=update_order&delivery=".$donhang['id_donhang']."'\">Giao hàng</button></td>
                            </tr>
                            ";
                        }
                    }
                }
            }
            if($_POST['admin']=='pay'){
                $i=0;
                $dh = mysqli_query($ketnoi,"SELECT * FROM donhang,khach,sach where donhang.tendangnhap = khach.tendangnhap and donhang.masach = sach.masach");
                while($donhang = mysqli_fetch_array($dh)){
                    if(isset($donhang['id_donhang'])){
                        $id_dh = $donhang['id_donhang'];
                        $ct_dh = mysqli_query($ketnoi,"SELECT * from ct_donhang where id_donhang = '$id_dh'");
                        $ct_donhang = mysqli_fetch_array($ct_dh);
                        if(isset($ct_donhang['id_ctdh']) && $ct_donhang['trangthai']==2){
                            $i++;
                            echo"
                            <tr>
                                <td>$i</td>
                                <td>".$donhang['hoten']."</td>
                                <td>".$donhang['tensach']."</td>
                                <td>".$donhang['diachi']."</td>
                                <td>".$donhang['sdt']."</td>
                                <td>".$donhang['soluongmua']."</td>
                                <td>";monney($donhang['dongia']);
                                echo"</td>
                                <td>";monney($donhang['soluongmua']*$donhang['dongia']);echo"</td>
                                <td>".$donhang['ngaydathang']."</td>
                                <td></td>
                                <td><button onclick=\"location.href='..//../ren_nghe_lap_trinh_wed/page_home.php?admin=update_order&pay=".$donhang['id_donhang']."'\">Thanh toán</button></td>
                            </tr>
                            ";
                        }
                    }
                }
            }
            if($_POST['admin']=='product_sold'){
                $i=0;
                $dh = mysqli_query($ketnoi,"SELECT * FROM donhang,khach,sach where donhang.tendangnhap = khach.tendangnhap and donhang.masach = sach.masach");
                while($donhang = mysqli_fetch_array($dh)){
                    if(isset($donhang['id_donhang'])){
                        $id_dh = $donhang['id_donhang'];
                        $ct_dh = mysqli_query($ketnoi,"SELECT * from ct_donhang where id_donhang = '$id_dh'");
                        $ct_donhang = mysqli_fetch_array($ct_dh);
                        if(isset($ct_donhang['id_ctdh']) && $ct_donhang['trangthai']==3){
                            $i++;
                            echo"
                            <tr>
                                <td>$i</td>
                                <td>".$donhang['hoten']."</td>
                                <td>".$donhang['tensach']."</td>
                                <td>".$donhang['diachi']."</td>
                                <td>".$donhang['sdt']."</td>
                                <td>".$donhang['soluongmua']."</td>
                                <td>";monney($donhang['dongia']);
                                echo"</td>
                                <td>";monney($ct_donhang['tongtien']);echo"</td>
                                <td>".$donhang['ngaydathang']."</td>
                                <td>".$ct_donhang['ngaynhan']."</td>
                            </tr>
                            ";
                        }
                    }
                }
            }
            if($_POST['admin']=='search_order' && !empty($_POST['keyword'])){
                $i=0;$search = $_POST['keyword'];

                $dh = mysqli_query($ketnoi,"SELECT * FROM donhang,khach,sach where
                donhang.tendangnhap = khach.tendangnhap and donhang.masach = sach.masach");
                while($donhang = mysqli_fetch_array($dh)){
                    if(isset($donhang['id_donhang'])){             
                        $id_dh = $donhang['id_donhang'];
                        $ct_dh = mysqli_query($ketnoi,"SELECT * from ct_donhang where id_donhang = '$id_dh'");
                        $ct_donhang = mysqli_fetch_array($ct_dh);
                        if($donhang['hoten']==$search || $donhang['tensach']==$search){
                            if(isset($ct_donhang['id_ctdh'])){
                                $i++;
                                echo"
                                <tr>
                                    <td>$i</td>
                                    <td>".$donhang['hoten']."</td>
                                    <td>".$donhang['tensach']."</td>
                                    <td>".$donhang['diachi']."</td>
                                    <td>".$donhang['sdt']."</td>
                                    <td>".$donhang['soluongmua']."</td>
                                    <td>";monney($donhang['dongia']);
                                    echo"</td>
                                    <td>";monney($ct_donhang['tongtien']);echo"</td>
                                    <td>".$donhang['ngaydathang']."</td>
                                    <td>".$ct_donhang['ngaynhan']."</td>
                                </tr>
                                ";
                            }
                            else{
                                $i++;
                                echo"
                                <tr>
                                    <td>$i</td>
                                    <td>".$donhang['hoten']."</td>
                                    <td>".$donhang['tensach']."</td>
                                    <td>".$donhang['diachi']."</td>
                                    <td>".$donhang['sdt']."</td>
                                    <td>".$donhang['soluongmua']."</td>
                                    <td>";monney($donhang['dongia']);
                                    echo"</td>
                                    <td>";monney($donhang['soluongmua']*$donhang['dongia']);echo"</td>
                                    <td>".$donhang['ngaydathang']."</td>
                                    <td></td>
                                </tr>
                                ";
                            }    
                        }
                    }
                }
            }
        }
        ?>
    </table>
</main>
