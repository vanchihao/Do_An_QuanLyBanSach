<main id="message">
    <h1>Thông báo</h1>
    <table>
        <?php
        if(isset($_SESSION['user'])){
            $tendangnhap = $_SESSION['user'];

            $xem = $_POST['message'];
            $sua= "UPDATE thongbao set trangthai = '$xem'"."WHERE tendangnhap='$tendangnhap'";
            $ketqua= mysqli_query($ketnoi, $sua);
            
            $sql = "SELECT  * FROM thongbao where tendangnhap = '$tendangnhap'";
            $sql_tb = mysqli_query($ketnoi, $sql);
            while($tb=mysqli_fetch_array($sql_tb)){
                if(isset($tb['id_thongbao'])){
                    echo"
                    <tr>
                        <td>
                            <b>Thời gian: ".$tb['thoigian']."</b></br>
                            ".$tb['noidung']."                      
                        </td>
                    </tr>
                    ";
                }
                else{
                    echo"<tr><td>Bạn chưa có thong báo nào</td></tr>";
                }
            }
        }else{
            echo"<tr><td>Bạn chưa đăng nhập</td></tr>";
        }
        ?>
    </table>
</main>