<style>
    #home_admin{
    width: 1230px;
    height: 700px;
    display: flex;
    justify-content: center;
    align-items: center;
}
#home_admin div{
    width: 100%;
    height: 82px;
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: 0px 0px 10px;
}
#home_admin span{
    margin-left: 10px;
    font-size: 44px;
    font-weight: bolder;
}
#home_admin img{
    width: 60px;
    height: 60px;
}
#home_admin table tr td{ 
    padding: 10px;
}
#home_admin button{
    width: 250px;
    height: 100px;
    font-size: 26px;
    border-radius: 10px;
    background-color: white;
    border: 0;
    box-shadow: 0px 0px 10px;
}
#home_admin button:hover{
    background-color: rgb(255, 252, 93);
}
</style>
<main id="home_admin">
    <form action="..//../ren_nghe_lap_trinh_wed/page_home.php" method="post">
        <table>
            <tr>
                <td colspan="3">
                    <div>
                        <img src="img/logo.png">
                        <span>
                            Tên: <?php echo $presonnel['ten'] ?>
                        </span>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <button type="submit" name="admin" value="admin_product">Sản phẩm</button>
                </td>
                <td>
                    <button type="submit" name="admin" value="admin_publishing">Nhà xuất bản</button>
                </td>
                <td>
                    <button type="submit" name="admin" value="admin_order">Đơn hàng</button>
                </td>
            </tr>
            <tr>
                <td>
                    <button type="submit" name="admin" value="admin_posts">Bài viết</button>
                </td>
                <td>
                    <button type="submit" name="admin" value="admin_customer">Khách hàng</button>
                </td>
                <td>
                    <button type="submit" name="admin" value="admin_category">Thể loại sách</button>
                </td>
            </tr>
            <tr>
                <td>
                    <button type="submit" name="admin" value="admin_presonnel">Nhân viên</button>
                </td>
                <td>
                    <button type="submit" name="admin" value="admin_statistical">Thống kê</button>
                </td>
                <td>
                    <button type="submit" name="admin" value="admin_exit">Thoát</button>
                </td>
            </tr>
        </table>
    </form>
</main>