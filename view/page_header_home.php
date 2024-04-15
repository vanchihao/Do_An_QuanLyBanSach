<header>
    <div id="head">
        <img src="img/logo.png" alt="" id="logo">
        <h1>Read</h1>
    </div>
    <nav>
        <form action="../ren_nghe_lap_trinh_wed/page_home.php" method="post" >
            <table>
                <tr>
                    <td><button type="submit" name="trangchu" value="trangchu" id="home">Trang chủ</button></td>
                    <td>
                        <select name="result" id="select" onchange="gui()">
                            <?php 
                            $sql = mysqli_query($ketnoi,"SELECT * from theloai");
                            if(isset($_POST['review'])){
                                echo"
                                    <option>Đánh giá</option>
                                    <option value=\"Tất cả\">Tất cả</option>
                                    <option value=\"1\">1 sao</option>
                                    <option value=\"2\">2 sao</option>
                                    <option value=\"3\">3 sao</option>
                                    <option value=\"4\">4 sao</option>
                                    <option value=\"5\">5 sao</option>
                                    <input type=\"submit\" name=\"review\" style=\"display: none;\" id=\"sm\">
                                ";
                            }else{
                                echo"<option>---Chọn---</option>";
                                while ($select = mysqli_fetch_array($sql)) {
                                    echo "<option value=\"".$select['matheloai']."\">".$select['tentheloai']."</option>";
                                }
                                echo"<input type=\"submit\" name=\"select_and_search\" value=\"select\" style=\"display: none;\" id=\"sm\">";
                            }
                            ?>
                        </select>
                    </td>
                    <td><button type="submit" name="header" value="admin" id="admin">Admin</button></td>
                    <td>
                        <button type="submit" name="message" value="1" id="thongbao">
                        <?php 
                        if(isset($_SESSION['user'])){
                            $kt = 0;
                            $tendangnhap = $_SESSION['user'];
                            $sql = mysqli_query($ketnoi,"SELECT * FROM thongbao where tendangnhap = '$tendangnhap'");
                            while($message = mysqli_fetch_array($sql)){
                                if($message['trangthai']==0){
                                    $kt++;
                                }
                            }
                            if($kt!=0){
                                echo "Thông báo
                                <div id=\"tinnhancho\">$kt</div>";
                            }else{
                                echo "Thông báo";
                            }
                        }else{
                            echo "Thông báo";
                        }
                        ?>
                        </button>
                    </td>
                    <td>
                        <input type="search" name="keyword" id="keyword" placeholder="Nhập tên sách cần tìm...">
                        <button type="submit" name="select_and_search" value="search" id="search">Tìm</button>
                    </td>
                    <td><button type="submit" name="header" value="cart" id="giohang"><i class="fa fa-cart-plus"></i></button></td>
                    <td>
                        <?php 
                        if(isset($_SESSION['user'])){
                            $tendangnhap = $_SESSION['user'];
                            $sql = mysqli_query($ketnoi, "SELECT  * FROM khach where tendangnhap = '$tendangnhap'");
                            $user = mysqli_fetch_array($sql);
                            echo " 
                            <button type=\"submit\" name=\"header\" value=\"user\" id=\"avatar\"><img src='img/".$user['hinh']."'></button>
                            ";
                        }
                        else{
                            echo"
                            <button id=\"dangky\" type=\"submit\" name=\"header\" value=\"sign_up\">Đăng ký</button>
                            <button id=\"dangnhap\" type=\"submit\" name=\"header\" value=\"log_in\">Đăng nhập</button>
                            ";
                        }
                        ?>
                    </td>
                </tr>
            </table>       
        </form>
    </nav>
</header>