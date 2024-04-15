<Style>
    #thaymk{
    position: relative;
    background-color: aliceblue;
    width: 1230px;
    height: 600px;
    display: flex;
    justify-content: center;
    align-items: center;
}
#thaymk form{
    width: 700px;
    height: 500px;
    background-color: rgb(255, 239, 95);
    text-align: center;
}
#thaymk table{
    font-size: 24px;
    width: 600px;
    margin-left: 50px;
    margin-right: 50px;

}
#thaymk table tr td{
    padding-top: 15px;

}
#thaymk input{
    width: 300px;
    height: 30px;
    font-size: 25px;
    border: 0;
    box-shadow: 0 0 8px;
    border-radius: 8px;
}
#thaymk .btn_login{
    font-size: 25px;
    border: 0;
    box-shadow: 0 0 8px;
    border-radius: 8px;
    height: 40px;
    margin-top: 10px;
}
</Style>
<main id="thaymk">
    <form action="..//../ren_nghe_lap_trinh_wed/page_home.php" method="post">
    <h1>Trang thay mật khẩu</h1>
        <table>
            <tr>
                <td><b>Tên đăng nhập mới: </b></td>
                <td><input type="text" id="tendangnhap" name="tendangnhap" ></td>
            </tr>

            <tr>
                <td><b>Mật khẩu mới: </b></td>
                <td><input type="text" id="matkhau" name="matkhau" ></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button class="btn_login" type="submit" name="header" value="log_in">Hủy</button>
                    <button class="btn_login" type="submit" name="update_customer" value="thaymk">Xác nhận</button>
                </td>
                <td></td>
            </tr>
        </table>
    </form>
</main>