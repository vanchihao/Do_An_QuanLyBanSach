<main id="cart">
    <table border="1">
    <?php
        if(isset($_SESSION['user'])){
            $kt = 0;
            $sql_gh= mysqli_query($ketnoi,"SELECT * FROM giohang,sach where tendangnhap = '$tendangnhap' and giohang.masach = sach.masach");
            while($sach=mysqli_fetch_array($sql_gh)){
            echo"
                <tr>
                    <td>
                        <img src='img/".$sach['hinh']."'>
                    </td>
                    <td>
                        <span id=\"tensach\">".$sach['tensach']."</span>
                    </td>
                    <td>
                        <span id=\"gia\">Giá: ";monney($sach['gia']);echo"</span>
                    </td>
                    <td>
                    <form action=\"..//../ren_nghe_lap_trinh_wed/page_home.php\" method=\"post\">
                        <input type='hidden' name='id_cart' value='".$sach['id_giohang']."'>
                        <button type=\"submit\" name=\"ctsp\" value=\"".$sach['masach']."\">Xem</button>
                        <button type=\"submit\" name=\"update_customer\" value=\"delete_cart\">Xóa</button>
                    </form>
                    </td>
                </tr>
            ";
            $kt++;
            }
            if($kt==0)
                echo "<tr><td>Chưa có sản phẩm!</td></tr>";
        }
        else
            echo "<tr><td>Bạn chưa đăng nhập !</td></tr>";
    ?>
    </table>
</main>