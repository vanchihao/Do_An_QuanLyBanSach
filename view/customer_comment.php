<style>
    #comment{
        width: 1230px;
        height: 400px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    #comment form{
        background-color: rgb(0, 0, 94);
        color: white;
    }
    #comment h1{
        width: 100%;
        height: 30px;
        font-size: 30px;
    }
    #comment select{
        width: 100px;
        font-size: 20px;
    }
    #comment textarea{
        font-size: 20px;
    }
    #comment table{
        font-size: 24px;
    }
    #comment div{
        width: 100%;
        display: flex;
        justify-content: center;
    }
    #comment button{
        font-size: 24px;
        margin-left: 10px;
        margin-right: 10px;
    }
</style>
<?php
    $id_comment = $_GET['conten'];
    $sql_bl = "SELECT hoten
    FROM binhluan,donhang,khach
    where binhluan.id_binhluan = '$id_comment' and donhang.id_donhang = binhluan.id_donhang
    and donhang.tendangnhap = khach.tendangnhap";
    $sqlbl= mysqli_query($ketnoi,$sql_bl);
    $binhluan= mysqli_fetch_array($sqlbl);
?>
<main id="comment">
    <form action="..//../ren_nghe_lap_trinh_wed/page_home.php" method="post">
        <table>
            <tr>
                <td>
                    <h1>Khách hàng: <?php echo $binhluan['hoten'] ?></h1>
                </td>
            </tr>
            <tr>
                <td>Chọn số sao: 
                    <select name="sao">
                        <option value="1">
                            1 SAO
                        </option>
                        <option value="2">
                            2 SAO
                        </option>
                        <option value="3">
                            3 SAO
                        </option>
                        <option value="4">
                            4 SAO
                        </option>
                        <option value="5">
                            5 SAO
                        </option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <textarea name="noidung" id="" cols="30" rows="5" placeholder="nhập nội dung...">

                    </textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <div>
                        <input type="hidden" name="customer_comment">
                        <input type="hidden" name="id" value="<?php echo $id_comment ?>">
                        <button type="submit" name="purchased_product" value="">Quay lại</button>
                        <button type="submit" name="update_customer" value="comment">Gửi</button>
                    </div>
                </td>
            </tr>
        </table>
    </form>
</main>