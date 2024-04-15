<style>
    #login_admin{
    position: relative;
    background-color: aliceblue;
    width: 1230px;
    height: 600px;
    display: flex;
    justify-content: center;
    align-items: center;
}
#login_admin form{
    width: 700px;
    height: 500px;
    background-color: rgb(255, 239, 95);
    text-align: center;
}
#login_admin table{
    font-size: 24px;
    width: 600px;
    margin-left: 50px;
    margin-right: 50px;

}
#login_admin table tr td{
    padding-top: 15px;

}
#login_admin input{
    width: 300px;
    height: 30px;
    font-size: 25px;
    border: 0;
    box-shadow: 0 0 8px;
    border-radius: 8px;
}
#login_admin button{
    font-size: 25px;
    border: 0;
    box-shadow: 0 0 8px;
    border-radius: 8px;
    height: 40px;
    margin-top: 10px;
}
</style>
<main id="login_admin">
    <form action="..//../ren_nghe_lap_trinh_wed/page_home.php" method="post">
    <h1>Trang đăng nhập admin</h1>
        <table>
            <tr>
                <td><b>Tên đăng nhập: </b></td>
                <td><input type="text" id="tendangnhap" name="tendangnhap"></td>
            </tr>

            <tr>
                <td><b>Mật khẩu: </b></td>
                <td><input type="text" id="matkhau" name="matkhau"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" name="admin" value="check_login_admin">Đăng nhập</button>
                    <button type="submit" value="Quay lại">Quay lại</button>
                </td>
                <td></td>
            </tr>
        </table>
    </form>
</main>