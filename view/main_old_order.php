<style>
    #old_order{
    width: 1230px;
    
    display: flex;
    justify-content: center;
}
#old_order table{
    width: 1010px;
    margin-top: 20px;
}
#old_order img{
    width: 90px;
    height: 100px;
}
#old_order #thanhtientrinh{
    width: 900px;
    height: 40px;
    overflow: hidden;
    border: 2px solid black;
    background-color: rgb(226, 226, 226);
}
#old_order #tientrinh{
    width: 0;
    height: 40px;
    background-color: rgb(0, 199, 0);
}
#old_order .tentt{
    margin-left: 175px;
}
#old_order span{
    font-size: 20px;
    font-weight: bold;
    background-color: rgb(216, 216, 216);
    color: rgb(0, 0, 0);
}
#old_order button{
    font-size: 18px;
    font-weight: bold;
    background-color: rgb(0, 0, 94);
    color: rgb(255, 255, 255);
}
#old_order hr{
    width: 100%;
    border: 1px solid black;
}
</style>
<main id="old_order">
    <table>
    <?php
    if(isset($_SESSION['user'])){
        $i=0;
        $tientrinh="";
        $nhacnho="";
        $tendangnhap = $_SESSION['user'];

        $sqldh = "SELECT donhang.id_donhang,donhang.masach,sach.hinh
        FROM donhang,khach,sach
        where khach.tendangnhap = '$tendangnhap' 
        and khach.tendangnhap = donhang.tendangnhap
        and donhang.masach = sach.masach
        ORDER by donhang.id_donhang asc ";

        $sql_dh= mysqli_query($ketnoi,$sqldh);

        while($donhang = mysqli_fetch_array($sql_dh)){
            $id_donhang = $donhang['id_donhang'];

            $sql_ctdh = "SELECT trangthai,id_ctdh
            FROM ct_donhang
            where id_donhang = '$id_donhang'";
            $sqlctdh= mysqli_query($ketnoi,$sql_ctdh);
            $ctdh= mysqli_fetch_array($sqlctdh);

            if(isset($ctdh['id_ctdh'])){
                if($ctdh['trangthai']>0 && $ctdh['trangthai']<3){
                    $i++;
                    switch($ctdh['trangthai']){
                        case 1:
                            $tientrinh="580px";
                        break;
                        case 2:
                            $tientrinh="900px";
                            $nhacnho="Thanh toán để hoàn thành đơn!";
                        break;
                        default:
                            $tientrinh="20px";
                        break;
                    }
                    echo"
                    <tr>
                        <td rowspan=\"4\"><img src='img/".$donhang['hinh']."'></td>             
                    </tr>
                    <tr>
                        <td>
                            <span>Xác thực</span>
                            <span class=\"tentt\">Đã xác thực</span>
                            <span class=\"tentt\">Đang Giao</span>
                            <span class=\"tentt\">Thanh toán</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div id=\"thanhtientrinh\">
                                <div id=\"tientrinh\" style=\"width:$tientrinh;\"></div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span id=\"tendon\">STT: $i</span>                         
                            <button type=\"button\" onclick=\"location.href='..//../ren_nghe_lap_trinh_wed/page_home.php?ctsp=".$donhang['masach']."'\">Xem sản phẩm</button>
                            $nhacnho
                        </td>
                    </tr>
                    <tr><td colspan=\"2\"><hr></td></tr><tr>
                    ";
                }
            }else{
                $i++;
                echo"
                <tr>
                    <td rowspan=\"4\"><img src='img/".$donhang['hinh']."'></td>             
                </tr>
                <tr>
                    <td>
                        <span>Xác thực</span>
                        <span class=\"tentt\">Đã xác thực</span>
                        <span class=\"tentt\">Đang Giao</span>
                        <span class=\"tentt\">Thanh toán</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div id=\"thanhtientrinh\">
                            <div id=\"tientrinh\" style=\"width:20px;\"></div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span id=\"tendon\">STT: $i</span>   
                        <button type=\"button\" onclick=\"location.href='../ren_nghe_lap_trinh_wed/page_home.php?update_customer=delete_order&id_donhang=".$donhang['id_donhang']."'\" style=\"background-color: red;\">Hủy</button>                        
                        <button type=\"button\" onclick=\"location.href='../ren_nghe_lap_trinh_wed/page_home.php?ctsp=".$donhang['masach']."'\">Xem sản phẩm</button>
                    </td>
                </tr>
                <tr><td colspan=\"2\"><hr></td></tr><tr>
                ";
            }
        }
        if($i == 0){
            echo"Bạn chưa có đơn hàng nào!";
        }
    }else{
        echo"Bạn chưa đăng nhập!";
    }
    ?>
    </table>
</main>