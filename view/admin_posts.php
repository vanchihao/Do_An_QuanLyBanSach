<style>
    main{
        width: 1230px;
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }
    table{
        border-collapse: collapse;
        width: 900px;
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
    #them{
        background-color: green;
        color: black;
        height: 30px;
        font-size: 20px;
    }
    #btnsua{
        height: 30px;
        font-size: 20px;
        background-color: cyan;
    }
    #btnxoa{
        background-color: red;
        color: aliceblue;
        height: 30px;
        font-size: 20px;
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
    #d_them{
        width: 600px;
        height: 400px;
    }
    #d_them form{
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
<main>
    <dialog id="d_them">
        <form action="..//../ren_nghe_lap_trinh_wed/page_home.php" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Tên bài viết: <input type="text" name="tenbaiviet" value="" multiple required></td>
                </tr>
                <tr>
                    <td>Hình: <input type="file" name="hinh" value="" multiple required></td>
                </tr>
                <tr>
                    <td>
                    <div id="btn_huy_them">
                        <button type="button" onclick="dal(1)">Hủy</button>
                        <button type="submit" name="admin" value="add_posts">Thêm</button>
                    </div>
                    </td>
                </tr>
            </table>
        </form>
    </dialog>
    <table border="1">
        <caption>Danh sách bài viết</caption>
        <tr style="text-align: center;">
            <td colspan="9">
                <form action="..//../ren_nghe_lap_trinh_wed/page_home.php" method="post">
                    <button type="submit" name="admin" id="btn_ql"  value="admin_home">Trang admin</button>
                    <button type="button" style="background-color: chartreuse;" id="them" onclick="dal(2)">Thêm</button>
                </form>
            </td>
        </tr>
        <tr>
            <td><b>Stt</b></td>
            <td><b>Tên bài viết</b></td>
            <td><b>Hình</b></td>
        </tr>
        <?php
        $i=1;
        $sql = "SELECT  * FROM tintuc";
        $kiemtra = mysqli_query($ketnoi, $sql);
        while($tintuc=mysqli_fetch_array($kiemtra)){

            echo"<tr>";
                echo"<td>";
                    echo $i;
                echo"</td>";
                echo"<td>";
                    echo $tintuc['ten_tin'];
                echo"</td>";
                echo"<td>";
                    echo "<img style=\"width:300px;height:240px;\" src='img/".$tintuc['hinh']."'>";
                echo"</td>";
                echo"<td>";
                    echo"<button id=\"btnsua\" onclick=\"location.href='..//../ren_nghe_lap_trinh_wed/page_home.php?admin=update_posts&update=".$tintuc['id_tintuc']."'\">Sửa</button>";
                echo"</td>";
                echo"<td>";
                    echo"<button id=\"btnxoa\" onclick=\"location.href='..//../ren_nghe_lap_trinh_wed/page_home.php?admin=update_posts&delete=".$tintuc['id_tintuc']."'\">Xóa</button>";
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