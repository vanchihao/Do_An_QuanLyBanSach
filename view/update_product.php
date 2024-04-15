<?php
$masach=$_GET["update"];
$sql = "SELECT  * FROM sach where masach = '$masach'";
$kiemtra = mysqli_query($ketnoi, $sql);
$sach=mysqli_fetch_array($kiemtra);
?>
<style>
    #update_product{
        display: flex;
        justify-content: center;
        margin-top:30px;
        font-size:24px;
    }
    #update_product input{
        width: 300px;
        height: 30px;
        font-size: 24px;
    }
    #update_product button{
        font-size: 24px;
    }
</style>
<main id="update_product">
    <form action="..//../ren_nghe_lap_trinh_wed/page_home.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Tên sách: <input type="text" name="tensach" value="<?php echo $sach['tensach'] ?>" multiple required></td>
            </tr>
            <tr>
                <td>Thể loại: 
                    <select name="theloai" id="" required>
                        <?php
                            $sql = "SELECT  * FROM theloai";
                            $kiemtra = mysqli_query($ketnoi, $sql);
                            while($theloai=mysqli_fetch_array($kiemtra)){
                                if($theloai['matheloai']==$sach['theloai']){
                                    echo '<option value="'.$theloai['matheloai'].'">'.$theloai['tentheloai'].'</option>';
                                }else{
                                    echo '<option value="'.$theloai['matheloai'].'">'.$theloai['tentheloai'].'</option>';
                                }
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tác giả: <input type="text" name="tacgia" value="<?php echo $sach['tacgia'] ?>" multiple required></td>
            </tr>
            <tr>
                <td>Năm Xuất Bản: <input type="date" name="namxuatban" value="<?php echo $sach['namxuatban'] ?>" multiple required></td>
            </tr>
            <tr>
                <td>Nhà xuất bản: 
                    <select name="nxb" id="" required>
                        <?php
                            $sql = "SELECT  * FROM nxb";
                            $kiemtra = mysqli_query($ketnoi, $sql);
                            while($nxb=mysqli_fetch_array($kiemtra)){
                                if($nxb['manxb']==$sach['nxb']){
                                    echo '<option value="'.$nxb['manxb'].'">'.$nxb['tennxb'].'</option>';
                                }
                                else
                                    echo '<option value="'.$nxb['manxb'].'">'.$nxb['tennxb'].'</option>';
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Hình: <input type="file" name="hinh"></td>
            </tr>
            <tr>
                <td>Số lượng: <input type="number" name="soluong" value="<?php echo $sach['soluong'] ?>" multiple required></td>
            </tr>
            <tr>
                <td>Giá: <input type="number" name="gia" value="<?php echo $sach['gia'] ?>" multiple required></td>
            </tr>
            <tr>
                <td >Giới thiệu: <textarea name="gioithieu" id="" cols="30" rows="10"><?php echo $sach['gioithieu'] ?></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <div>
                        <input type="hidden" name="hinhcu" value="<?php echo $sach['hinh'] ?>">
                        <input type="hidden" name="id" value="<?php echo $masach ?>">
                        <button type="submit" value="admin_product" name="admin">Hủy</button>
                        <button type="submit" value="thuc_hien_sua" name="admin">Sửa</button>
                    </div>
                </td>
            </tr>
        </table>
    </form>
</main>