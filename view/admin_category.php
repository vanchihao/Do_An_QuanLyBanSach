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
        width: 700px;
        text-align: center;
        font-size: 20px;
    }
    caption{
        font-size: 40px;
    }
    #btnsua{
        background-color: cyan;
    }
    #btnxoa{
        background-color: red;
        color: aliceblue;
    }
    #btn_huy_them{
        width: 100%;
        text-align: center;
        margin-top: 20px;
    }
    #btn_huy_them input:nth-child(1){
        margin-right: 30px;
        background-color: red;
        color: aliceblue;
    }
    #btn_huy_them input:nth-child(2){
        background-color: blue;
        color: aliceblue;
    }

</style>
<main>
    <dialog id="d_them">
        <form action="..//../ren_nghe_lap_trinh_wed/page_home.php" method="post">
            <table>
                <tr>
                    <td>Mã thể loại: <input type="text" name="matheloai" value="" multiple required></td>
                </tr>
                <tr>
                    <td>Tên thể loại: <input type="text" name="tentheloai" value="" multiple required></td>
                </tr>
            </table>
            <div id="btn_huy_them">
                <button type="button" onclick="dal(1)">Hủy</button>
                <button type="submit" value="add_category" name="admin">Thêm</button>
            </div>
        </form>
    </dialog>
    <table border="1">
        <caption>Danh sách thể loại sách</caption>
        <tr style="text-align: center;">
            <td colspan="5"> 
            <form action="..//../ren_nghe_lap_trinh_wed/page_home.php" method="post">
                <button type="submit" value="admin_home" name="admin">Trang quản lý</button>
                <button type="button" style="background-color: chartreuse;" id="them" onclick="dal(2)">Thêm</button>
            </form>  
            </td>
        </tr>
        <tr>
            <td><b>Stt</b></td>
            <td><b>Mã thể loại</b></td>
            <td><b>Tên Thể Loại</b></td>
        </tr>
        <?php
        $i=1;
        $sql = "SELECT  * FROM theloai";
        $kiemtra = mysqli_query($ketnoi, $sql);

        while($theloai=mysqli_fetch_array($kiemtra)){

            echo"<tr>";
                echo"<td>";
                    echo $i;
                echo"</td>";
                echo"<td>";
                    echo $theloai['matheloai'];
                echo"</td>";
                echo"<td>";
                    echo $theloai['tentheloai'];
                echo"</td>";
                echo"<td>";
                    echo"<button id=\"btnsua\" onclick=\"location.href='..//../ren_nghe_lap_trinh_wed/page_home.php?admin=update_category&update=".$theloai['matheloai']."'\">Sửa</button>";
                echo"</td>";
                echo"<td>";
                    echo"<button id=\"btnxoa\" onclick=\"location.href='..//../ren_nghe_lap_trinh_wed/page_home.php?admin=update_category&delete=".$theloai['matheloai']."'\">Xóa</button>";
                echo"</td>";
            echo"</tr>";
            $i++;
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