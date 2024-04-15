<style>
    #donhangdm #hinhdm{
        width: 50px;
        height: 60px;
    }
    #donhangdm #hinhdm img{
        width: 100%;
        height: 100%;
    }
    #donhangdm table{
        width: 1200px;
        text-align: center;
        border-collapse: collapse;
        font-size: 20px;
    }
    #donhangdm .tentd{
        font-size: 20px;
        margin-left: 50px;
        font-weight: bold;
    }
</style>
<main id="donhangdm">
    <div style="width:100%;display: flex;justify-content: center;align-items: center;">
        <table border="1">
            <tr>
                <td class="tentd">Stt</td>
                <td class="tentd">Hình</td>
                <td class="tentd">Tên sản phẩm</td>
                <td class="tentd">Giá tiền</td>
                <td class="tentd">Số lượng</td>
                <td class="tentd">Thành Tiền</td>
                <td class="tentd">Ngày mua</td>
                <td class="tentd">Ngày nhận</td>
                <td class="tentd">Đánh giá</td>
            <tr>
    <?php
    $i=0;
    $tendangnhap = $_SESSION['user'];
    $sql_dg= mysqli_query($ketnoi,"SELECT donhang.masach,hinh,tensach,dongia,soluongmua,tongtien,ngaydathang,
    ngaynhan,ct_donhang.id_ctdh,donhang.id_donhang
    FROM donhang,ct_donhang,sach
    where donhang.tendangnhap = '$tendangnhap' 
    and donhang.masach = sach.masach 
    and donhang.id_donhang= ct_donhang.id_donhang
    and ct_donhang.trangthai = 3
    order by ct_donhang.id_ctdh asc");
    while($donhang = mysqli_fetch_array($sql_dg)){
        $id_donhang = $donhang['id_donhang'];

        $sql_bl = "SELECT sao,id_binhluan
        FROM binhluan
        where id_donhang = '$id_donhang'";
        $sqlbl= mysqli_query($ketnoi,$sql_bl);
        $binhluan= mysqli_fetch_array($sqlbl);

        $i++;
        echo "<tr>";
            echo "<td>".$i."</td>";
            echo "<td>"."<img src='img/".$donhang['hinh']."' id=\"hinhdm\">"."</td>";
            echo "<td>".$donhang['tensach']."</td>";
            echo "<td>";monney($donhang['dongia']);echo "</td>";
            echo "<td>".$donhang['soluongmua']."</td>";
            echo "<td>";monney($donhang['tongtien']);echo "</td>";
            echo "<td>".$donhang['ngaydathang']."</td>";
            echo "<td>".$donhang['ngaynhan']."</td>";
            if($binhluan['sao']<1){
                echo "<td>"."<button style=\"background-color:red;color:white;\" onclick=\"location.href='..//../ren_nghe_lap_trinh_wed/page_home.php?update_customer=comment&conten=".$binhluan['id_binhluan']."'\">"."Chưa đánh giá"."</button>"."</td>";
            }else{
                echo "<td>"."<button style=\"background-color:green;color:white;\" onclick=\"location.href='..//../ren_nghe_lap_trinh_wed/page_home.php?ctsp=".$donhang['masach']."'\">"."Xem đánh giá"."</button>"."</td>";
            }
        echo "</tr>";
    }
    if($i == 0){
        echo "<tr>
            <td colspan=\"9\">
                <div style=\"width: 100%;height: 50px;font-size:40px;text-align: center;\">
                    Chưa mua sản phẩm nào!
                </div>
            </td>
        </tr>";
    }
    ?>
        </table>
    </div>
</main>