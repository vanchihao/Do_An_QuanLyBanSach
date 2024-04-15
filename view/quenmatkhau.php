<Style>
    #quenmk{
    position: relative;
    background-color: aliceblue;
    width: 1230px;
    height: 600px;
    display: flex;
    justify-content: center;
    align-items: center;
}
#quenmk form{
    width: 700px;
    height: 500px;
    background-color: rgb(255, 239, 95);
    text-align: center;
}
#quenmk table{
    font-size: 24px;
    width: 600px;
    margin-left: 50px;
    margin-right: 50px;

}
#quenmk table tr td{
    padding-top: 15px;

}
#quenmk input{
    width: 300px;
    height: 30px;
    font-size: 25px;
    border: 0;
    box-shadow: 0 0 8px;
    border-radius: 8px;
}
#quenmk .btn_login{
    font-size: 25px;
    border: 0;
    box-shadow: 0 0 8px;
    border-radius: 8px;
    height: 40px;
    margin-top: 10px;
}
</Style>
<main id="quenmk">
    <form action="..//../ren_nghe_lap_trinh_wed/page_home.php" method="post">
        <table>
            <tr>
                <td><b>Nhập email hoặc số điện thoại: </b></td>
                <td><input type="text" id="tendangnhap" name="email-sdt"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button class="btn_login" type="submit" name="header" value="log_in">Quay lại</button>
                    <button class="btn_login" type="submit" name="update_customer" value="kt_email_sdt">Gửi</button>
                </td>
                <td></td>
            </tr>
        </table>
    </form>
</main>