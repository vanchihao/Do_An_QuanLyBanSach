<style>
    #a_product{
    width: 1230px;
    display: flex;
    justify-content: center;
    margin-top: 20px;
}
#a_product h1{
    width: 100%;
    font-size: 30px;
    text-align: center;
}
#a_product table{
    width: 1200px;
    text-align: center;
    font-size: 20px;
    border-collapse: collapse;
}
#a_product dialog{
    background-color: darkgrey;
}
#a_product dialog table{
    font-size: 24px;
}
#a_product dialog input{
    font-size: 24px;
}
#a_product dialog select{
    font-size: 24px;
}
#a_product dialog button{
    font-size: 24px;
}
</style>
<main id="a_product">
    <dialog id="d_them">
        <form action="..//../ren_nghe_lap_trinh_wed/page_home.php" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Tên sách: <input type="text" name="tensach" value="" multiple required></td>
                </tr>
                <tr>
                    <td>Thể loại: 
                        <select name="theloai" id="" required>
                            <?php
                                $sql = "SELECT  * FROM theloai";
                                $kiemtra = mysqli_query($ketnoi, $sql);
                                while($sach=mysqli_fetch_array($kiemtra)){
                                    echo '<option value="'.$sach['matheloai'].'">'.$sach['tentheloai'].'</option>';
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Tác giả: <input type="text" name="tacgia" value="" multiple required></td>
                </tr>
                <tr>
                    <td>Năm Xuất Bản: <input type="date" name="namxuatban" value="" multiple required></td>
                </tr>
                <tr>
                    <td>Nhà xuất bản: 
                        <select name="nxb" id="" required>
                            <?php
                                $sql = "SELECT  * FROM nxb";
                                $kiemtra = mysqli_query($ketnoi, $sql);
                                while($nxb=mysqli_fetch_array($kiemtra)){
                                    echo '<option value="'.$nxb['manxb'].'">'.$nxb['tennxb'].'</option>';
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Hình: <input type="file" name="hinh" value="" multiple required></td>
                </tr>
                <tr>
                    <td>Số lượng: <input type="number" name="soluong" value="" multiple required></td>
                </tr>
                <tr>
                    <td>Giá: <input type="number" name="gia" value="" multiple required></td>
                </tr>
                <tr>
                    <td >
                        Giới thiệu: <textarea name="gioithieu" id="" cols="30" rows="10"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                    <div>
                        <button type="button" onclick="dal(1)">Hủy</button>
                        <button type="submit" name="admin" value="add_product">Thêm</button>
                    </div>
                    </td>
                </tr>
            </table>
        </form>
    </dialog>
    <table border="1">
        <tr><td colspan="12"><h1>Danh sách sản phẩm</h1></td></tr>
        <tr>
            <td colspan="12">
                <form action="..//../ren_nghe_lap_trinh_wed/page_home.php" method="post">
                    <button type="submit" value="admin_home" name="admin">Trang quản lý</button>
                    <input type="search" name="keyword" placeholder="Tìm sản phẩm" value="">
                    <button type="submit" value="admin_search" name="admin">Tìm</button>
                    <button type="submit" value="admin_product" name="admin">Tất cả</button>     
                    <button type="button" style="background-color: chartreuse;" id="them" onclick="dal(2)">Thêm</button>
                </form>
            </td>
        </tr>
        <tr>
            <td>Stt</td>
            <td>Tên Sách</td>
            <td>Hình ảnh</td>       
            <td>Thể loại</td>
            <td>Tác giả</td>
            <td>Năm xuất bản</td>
            <td>Nhà xuất bản</td>
            <td>Giá</td>
            <td>Số lượng</td>
            <td>Giới thiệu</td>
        </tr>    
        <?php
        $i=0;
        if(isset($_POST['admin_search']) || !empty($_POST['keyword'])){
            $i=1;
            $keyword = $_POST['keyword'];
            $sqltl = "SELECT  * FROM theloai where tentheloai like '%$keyword%'";
            $kiemtratl = mysqli_query($ketnoi, $sqltl);
            $kttheloai=mysqli_fetch_array($kiemtratl);
            $matl = $keyword;
            if(isset($kttheloai['matheloai'])){
                $matl = $kttheloai['matheloai'];
            }

            $sqlnxb = "SELECT  * FROM nxb where tennxb like '%$keyword%'";
            $kiemtratl = mysqli_query($ketnoi, $sqlnxb);
            $ktnxb=mysqli_fetch_array($kiemtratl);
            $manxb = $keyword;
            if(isset($ktnxb['manxb'])){
                $manxb = $ktnxb['manxb'];
            }

            $sql="SELECT * FROM sach WHERE tensach LIKE '%$keyword%' OR theloai like '%$matl%' or
            tacgia like '%$keyword%' or nxb like '%$manxb%' or gia like '%$keyword%'";
            $kiemtra = mysqli_query($ketnoi, $sql);

            while($sach=mysqli_fetch_array($kiemtra)){
                if(isset($sach['masach'])){
                    $s_nxb = $sach['nxb'];
                    $s_theloai = $sach['theloai'];

                    $sqltl = "SELECT  * FROM theloai where matheloai = '$s_theloai'";
                    $kiemtratl = mysqli_query($ketnoi, $sqltl);
                    $theloai=mysqli_fetch_array($kiemtratl);

                    $sqlnxb = "SELECT  * FROM nxb where manxb = '$s_nxb'";
                    $kiemtranxb = mysqli_query($ketnoi, $sqlnxb);
                    $nxb=mysqli_fetch_array($kiemtranxb);
                    echo"<tr>";    
                        echo"<td>";
                            echo $i;
                        echo"</td>";
                        echo"<td>";
                            echo $sach['tensach'];
                        echo"</td>";
                        echo"<td>";
                            echo "<img style=\"width:100px;height:120px;\" src='img/".$sach['hinh']."'>";
                        echo"</td>";
                        echo"<td>";
                            echo $theloai['tentheloai'];
                        echo"</td>";
                        echo"<td>";
                            echo $sach['tacgia'];
                        echo"</td>";
                        echo"<td>";
                            echo $sach['namxuatban'];
                        echo"</td>";
                        echo"<td>";
                            echo $nxb['tennxb'];
                        echo"</td>";
                        echo"<td>";
                            echo monney($sach['gia']);
                        echo"</td>";
                        echo"<td>";
                            echo $sach['soluong'];
                        echo"</td>";
                        echo"<td>";
                            echo "
                            <textarea name=\"\" id=\"\" cols=\"10\" rows=\"5\">".$sach['gioithieu']."
                            </textarea>";
                            
                        echo"</td>";
                        echo"<td>";
                            echo"<button onclick=\"location.href='..//../ren_nghe_lap_trinh_wed/page_home.php?admin=update_product&update=".$sach['masach']."'\">Sửa</button>";
                        echo"</td>";
                        echo"<td>";
                            echo"<button onclick=\"location.href='..//../ren_nghe_lap_trinh_wed/page_home.php?admin=delete_product&delete=".$sach['masach']."'\">Xóa</button>";
                        echo"</td>";
                    echo"</tr>";
                    $i++;
                }
            }
        }else{
            $sql = "SELECT  * FROM sach,theloai,nxb where sach.nxb = nxb.manxb and sach.theloai = theloai.matheloai";
            $kiemtra = mysqli_query($ketnoi, $sql);
            while($sach=mysqli_fetch_array($kiemtra)){
                $i++;
                echo"<tr>";    
                    echo"<td>";
                        echo $i;
                    echo"</td>";
                    echo"<td>";
                        echo $sach['tensach'];
                    echo"</td>";
                    echo"<td>";
                        echo "<img style=\"width:100px;height:120px;\" src='img/".$sach['hinh']."'>";
                    echo"</td>";
                    echo"<td>";
                        echo $sach['tentheloai'];
                    echo"</td>";
                    echo"<td>";
                        echo $sach['tacgia'];
                    echo"</td>";
                    echo"<td>";
                        echo $sach['namxuatban'];
                    echo"</td>";
                    echo"<td>";
                        echo $sach['tennxb'];
                    echo"</td>";
                    echo"<td>";
                        echo monney($sach['gia']);
                    echo"</td>";
                    echo"<td>";
                        echo $sach['soluong'];
                    echo"</td>";
                    echo"<td>";
                        echo "
                        <textarea name=\"\" id=\"\" cols=\"10\" rows=\"5\">".$sach['gioithieu']."
                        </textarea>";
                        
                    echo"</td>";
                    echo"<td>";
                        echo"<button onclick=\"location.href='..//../ren_nghe_lap_trinh_wed/page_home.php?admin=update_product&update=".$sach['masach']."'\">Sửa</button>";
                    echo"</td>";
                    echo"<td>";
                        echo"<button onclick=\"location.href='..//../ren_nghe_lap_trinh_wed/page_home.php?admin=delete_product&delete=".$sach['masach']."'\">Xóa</button>";
                    echo"</td>";
                echo"</tr>";
            }
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