
<style>
    #statistical h1{
        width: 100%;
        font-size: 40px;
        text-align: center;
    }
    #search_year{
        width: 300px;
        font-size: 24px;
        height: 30px;
    }
    #search{
        font-size: 24px;
        height:32px;
    }
    #li_nam{
        margin-top: 20px;
        margin-bottom: 20px;
        font-size: 25px;
    }
    #statistical{
        width: 1230px;
        display: flex;
        justify-content: center;
    }
    #statistical li{
        font-size: 21px;
        list-style: none;
    }
    #statistical table{
        font-size: 21px;
        border-collapse: collapse;
        margin-top: 20px;
        margin-bottom: 20px;
        text-align: center;
        
    }
    #statistical table tr td{
        padding-left: 5px;
        padding-right: 5px;
    }
    #statistical .tieude{
        font-size: 30px;
        text-align: center;
        background-color: rgb(0, 0, 94);
        color: white;
    }
    #statistical form div{
        width: 100%;
        display: flex;
        justify-content: center;
    }
</style>
<main id="statistical">
    <div>
        <form action="..//../ren_nghe_lap_trinh_wed/page_home.php" method="post">
            <h1>Thống kê</h1>
            <div>
            <button name="admin" value="admin_home" id="search">Trang Quản lý</button>
            <input type="number" name="keyword" id="search_year" placeholder="Nhập năm cần tìm" min="2020">
            <button name="admin" value="search_statistical" id="search">Tìm</button>
            </div>
        </form>
        <?php
        if(isset($_POST['admin'])){
            if($_POST['admin'] == 'search_statistical'){
                $keyword = $_POST['keyword'];
                
                $sql = mysqli_query($ketnoi,"SELECT COUNT(id_ctdh) as tongsodon,sum(tongtien) as tongtien 
                from donhang,ct_donhang Where donhang.id_donhang = ct_donhang.id_donhang 
                and SUBSTRING(ngaynhan,7,4) = '$keyword' and trangthai = 3");
                $statistical_of_year = mysqli_fetch_array($sql);

                function statistical_of_month($year , $thang, $result, $ketnoi){
                    if($thang <10){
                        $duoi10 = '0'.$thang; 
                        $tim = mysqli_query($ketnoi,"SELECT count(id_ctdh) as soluong , sum(tongtien) as tongtien 
                        from donhang,ct_donhang Where donhang.id_donhang = ct_donhang.id_donhang and
                        SUBSTRING(ngaynhan,7,4) = '$year' and SUBSTRING(ngaynhan,4,2) = '$duoi10'");
                        $ketqua = mysqli_fetch_array($tim);
                    }else{ 
                        $tim = mysqli_query($ketnoi,"SELECT count(id_ctdh) as soluong , sum(tongtien) as tongtien 
                        from donhang,ct_donhang Where donhang.id_donhang = ct_donhang.id_donhang and
                        SUBSTRING(ngaynhan,7,4) = '$year' and SUBSTRING(ngaynhan,4,2) = '$thang'");
                        $ketqua = mysqli_fetch_array($tim);
                    }
                    if($result == "soluong"){
                        return $ketqua['soluong'];
                    }else{
                        return monney($ketqua['tongtien']);
                    }
                }
                function statistical_of_customer($year , $result, $ketnoi){
                    $i=0;
                    $tim = mysqli_query($ketnoi,"SELECT donhang.tendangnhap, sum(soluongmua) as soluong,sum(tongtien) as tongtien,hoten
                    from donhang,ct_donhang,khach
                    Where donhang.id_donhang = ct_donhang.id_donhang 
                    and ct_donhang.trangthai = 3
                    and donhang.tendangnhap = khach.tendangnhap
                    and SUBSTRING(ngaynhan,7,4) = '$year' 
                    group by donhang.tendangnhap
                    order by tongtien desc");
                
                    while($ketqua = mysqli_fetch_array($tim)){
                        if($result == "name_customer"){
                            echo"<td>".$ketqua['hoten']."</td>";
                        }
                        if($result == "soluong"){
                            echo"<td>".$ketqua['soluong']."</td>";
                        }
                        if($result == "tongtien"){
                            echo"<td>";monney($ketqua['tongtien']);echo"</td>";
                        }
                        if($i==5)
                            break;
                        else
                           $i++;
                    }
                }

                function statistical_of_book($year , $result, $ketnoi){                 
                    $i=0;
                    $tim = mysqli_query($ketnoi,"SELECT donhang.masach, sum(soluongmua) as soluong,sum(tongtien) as tongtien,tensach
                    from donhang,ct_donhang,sach
                    Where donhang.id_donhang = ct_donhang.id_donhang 
                    and ct_donhang.trangthai = 3
                    and donhang.masach = sach.masach
                    and SUBSTRING(ngaynhan,7,4) = '$year' 
                    group by donhang.masach
                    order by tongtien desc");
                
                    while($ketqua = mysqli_fetch_array($tim)){
                        if($result == "name_book"){
                            echo"<td>".$ketqua['tensach']."</td>";
                        }
                        if($result == "soluong"){
                            echo"<td>".$ketqua['soluong']."</td>";
                        }
                        if($result == "tongtien"){
                            echo"<td>";monney($ketqua['tongtien']);echo"</td>";
                        }
                        if($i==5)
                            break;
                        else
                           $i++;
                    }
                }
                
        ?>
                <ul>
                    <li class="tieude"><b>Năm <?php echo $keyword?></b></li>
                    <li>
                        <div id="li_nam">
                            <span><b>Tổng số đơn:<b> <?php echo $statistical_of_year['tongsodon'] ?></span><br>
                            <span><b>Tổng lợi nhuận:<b> <?php monney($statistical_of_year['tongtien']) ?></span>
                        </div>
                    </li>
                    <li>
                        <li class="tieude">Tháng</li>
                        <table border="1">
                            <tr>
                                <td></td>
                                <td><b>Tháng 1</b></td>
                                <td><b>Tháng 2</b></td>
                                <td><b>Tháng 3</b></td>
                                <td><b>Tháng 4</b></td>
                                <td><b>Tháng 5</b></td>
                                <td><b>Tháng 6</b></td>
                                <td><b>Tháng 7</b></td>
                                <td><b>Tháng 8</b></td>
                                <td><b>Tháng 9</b></td>
                                <td><b>Tháng 10</b></td>
                                <td><b>Tháng 11</b></td>
                                <td><b>Tháng 12</b></td>
                            </tr>
                            <tr>
                                <td><b>Số lượng</b></td>
                                <?php 
                                for($i = 1;$i<13;$i++){
                                echo "<td>";echo statistical_of_month($keyword, $i ,'soluong',$ketnoi); echo "</td>";
                                }
                                ?>
                            </tr>
                            <tr>
                                <td><b>Tổng tiền</b></td>
                                <?php 
                                for($i = 1;$i<13;$i++){
                                echo "<td>";statistical_of_month($keyword, $i ,'tongtien',$ketnoi); echo "</td>";
                                }
                                ?>
                            </tr>
                        </table>
                    </li>
                    <li>
                        <li class="tieude">Top khách hàng</li>
                        <table border="1">
                            <tr>
                                <td>STT</td>
                                <?php
                                for($i = 1;$i<6;$i++){
                                    echo "<td>";echo $i; echo "</td>";
                                }
                                ?>
                            </tr>
                            <tr>
                                <td><b>Tên khách hàng</b></td>
                                <?php 
                                echo statistical_of_customer($keyword,'name_customer',$ketnoi);
                                ?>
                            </tr>
                            <tr>
                                <td><b>Số lượng mua</b></td>
                                <?php                             
                                echo statistical_of_customer($keyword,'soluong',$ketnoi);                            
                                ?>
                            </tr>
                            <tr>
                                <td><b>Tổng tiền</b></td>
                                <?php    
                                statistical_of_customer($keyword,'tongtien',$ketnoi);                           
                                ?>
                            </tr>
                        </table>
                    </li>
                    <li>
                        <li class="tieude">Top sách</li>
                        <table border="1">
                             <tr>
                                <td>STT</td>
                                <?php
                                for($i = 1;$i<6;$i++){
                                    echo "<td>";echo $i; echo "</td>";
                                }
                                ?>
                            </tr>
                            <tr>
                                <td><b>Tên sách</b></td>
                                <?php 
                                statistical_of_book($keyword,'name_book',$ketnoi);
                                ?>
                            </tr>
                            <tr>
                                <td><b>Số lượng mua</b></td>
                                <?php                             
                                statistical_of_book($keyword,'soluong',$ketnoi);                            
                                ?>
                            </tr>
                            <tr>
                                <td><b>Tổng tiền</b></td>
                                <?php    
                                statistical_of_book($keyword,'tongtien',$ketnoi);                           
                                ?>
                            </tr>
                        </table>
                    </li>
                </ul>
        <?php
        }
            }
        ?>
    </div>
</main>
