<?php
$id_baiviet=$_GET['update'];
$sql = "SELECT  * FROM tintuc where id_tintuc = '$id_baiviet'";
$kiemtra = mysqli_query($ketnoi, $sql);
$baiviet=mysqli_fetch_array($kiemtra);
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
    #btn_huy_them input:nth-child(2){
        margin-right: 30px;
        background-color: red;
        color: aliceblue;
    }
    #btn_huy_them input:nth-child(3){
        background-color: blue;
        color: aliceblue;
    }

</style>
<main>
    <form action="..//../ren_nghe_lap_trinh_wed/page_home.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Tên bài viết: <input type="text" name="ten_tin" value="<?php echo $baiviet['ten_tin']?>"></td>
            </tr>
            <tr>
                <td><img src="img/<?php echo $baiviet['hinh']?>" style="width: 300px;height:250px" ></td>
            </tr>
            <tr>
                <td>Hình: <input type="file" name="hinh"></td>
            </tr>
        </table>
        <div id="btn_huy_them">
            <input type="hidden" name="hinhcu" value="<?php echo $baiviet['hinh'] ?>">
            <input type="hidden" name="id" value="<?php echo $id_baiviet ?>">
            <button type="submit" value="admin_posts" name="admin">Hủy</button>
            <button type="submit" value="thuc_hien_sua_posts" name="admin">Sửa</button>

        </div>
    </form>
</main>