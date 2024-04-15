<?php
    $matheloai=$_GET["update"];
    $sql = "SELECT  * FROM theloai where matheloai = '$matheloai'";
    $kiemtra = mysqli_query($ketnoi, $sql);
    $theloai=mysqli_fetch_array($kiemtra);
?>
<style>
    body{
        margin: 0;
        padding: 0;
    }
    main{
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 100px;
    }
    table{
        font-size: 28px;
    }
    input{
        height: 30px;
        font-size: 20px;
    }
    select{
        height: 30px;
        font-size: 20px;
    }
    #btn_huy_them{
        width: 100%;
        text-align: center;
        margin-top: 20px;
    }
    #btn_huy_them button:nth-child(2){
        margin-right: 30px;
        background-color: red;
        color: aliceblue;
    }
    #btn_huy_them button:nth-child(3){
        background-color: blue;
        color: aliceblue;
    }

</style>
<main>
    <form action="..//../ren_nghe_lap_trinh_wed/page_home.php" method="post">
        <table>
            <tr>
                <td>Mã thể loại: <input type="text" name="matheloai" value="<?php echo $theloai['matheloai']?>"></td>
            </tr>
            <tr>
                <td>Tên thể loại: <input type="text" name="tentheloai" value="<?php echo $theloai['tentheloai']?>" ></td>
            </tr>
        </table>
        <div id="btn_huy_them">
            <input type="hidden" name="id" value="<?php echo $matheloai ?>">
            <button type="submit" name="admin" value="admin_category">hủy</button>
            <button type="submit" name="admin" value="thuc_hien_sua_category">Sửa</button>
        </div>
    </form>
</main>