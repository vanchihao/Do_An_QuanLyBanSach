<?php 
    $masach=0;
    if(isset($_POST['ctsp'])){
        $_SESSION['masach'] = $_POST['ctsp'];
    }
    if(isset($_GET['ctsp'])){
        $_SESSION['masach'] = $_GET['ctsp'];
    }
    $masach = $_SESSION['masach'];
    $sql = mysqli_query($ketnoi,"SELECT * FROM sach,theloai,nxb 
    where masach = '$masach' and sach.theloai = theloai.matheloai and sach.nxb = nxb.manxb");
    $sach = mysqli_fetch_array($sql);
?>
<main id="ctsp">
    <div>
        <article>
            <figure>
                <?php echo"<img src='img/".$sach['hinh']."'>"; ?>
            </figure>
            <figcaption>
                <form action="../../ren_nghe_lap_trinh_wed/page_home.php" method="post">
                    <input type="hidden" name="masach" value="<?php echo $sach['masach'];?>">
                    <button type="submit" value="review" name="review">Đánh giá</button>
                    <button type="submit" value="add_cart" name="update_customer">Giỏ hàng</button>
                    <button type="button" onclick="muajs(1)">Mua</button>
                </form>
            </figcaption>
        </article>          
        <ul>
            <li><b>Tên sách: </b><?php echo $sach['tensach']; ?></li>
            <li><b>Thể loại: </b><?php echo $sach['tentheloai']; ?></li>
            <li><b>Tác giả: </b><?php echo $sach['tacgia']; ?></li>
            <li><b>Năm xuất bản: </b><?php echo $sach['namxuatban']; ?></li>
            <li><b>Nhà xuất bản: </b><?php echo $sach['tennxb']; ?></li>
            <li><b>Số Lượng: </b><?php echo $sach['soluong']; ?></li>
            <li><b>Giá: </b><?php monney($sach['gia']) ?></li>
            <li><b>Giới thiệu: </b><?php echo $sach['gioithieu']; ?></li>
        </ul>
    </div>
    <?php
        include('../ren_nghe_lap_trinh_wed/view/dialog_order.php');
    ?>
</main>
<script>
    function tinhtien(){
        var sl=document.getElementById('soluong').value;
        var tongtien =document.getElementById("tongtien");
        var gia =  document.getElementById('gia').value;
        var tien = sl*gia;
        var tien2 = tien.toString()
        var tien3 =""
        if(tien2.length == 6)
            for(var i=0;i<tien2.length;i++){
                if(i==3)
                    tien3 = tien3 +"."
                tien3 = tien3 + tien2.charAt(i);
            }
        if(tien2.length == 7)
            for(var i=0;i<tien2.length;i++){
                if(i==1)
                    tien3 = tien3 +"."
                else if(i==4)
                    tien3 = tien3 +"."
                tien3 = tien3 + tien2.charAt(i);
            }
        if(tien2.length == 8)
            for(var i=0;i<tien2.length;i++){
                if(i==2)
                    tien3 = tien3 +"."
                else if(i==5)
                    tien3 = tien3 +"."
                tien3 = tien3 + tien2.charAt(i);
            }
        tongtien.innerHTML = "Tổng tiền: "+tien3+" VNĐ"
    }
    function muajs(kq){
        var mua = document.getElementById("order");
        if(kq==1){
            mua.open = true;
        }else
            mua.open = false;
    }
</script>
