<main id="main_home">
    <div id="bai_viet">
        <button id="btn_trai" onclick="btn_trai()"><i class="fa fa-angle-double-left"></i></button>
        <div id="noi_dung">
            <ul id="dichuyen">
                <?php               
                $sql = mysqli_query($ketnoi,"SELECT * FROM tintuc");
                while($tintuc=mysqli_fetch_array($sql)){
                    echo"
                        <li><img src=\"img/".$tintuc['hinh']."\"></li>
                    ";
                }
                ?>
            </ul>
        </div>
        <button id="btn_phai" onclick="btn_phai()"><i class="fa fa-angle-double-right"></i></button>
    </div>
    <div id="ban_chay">
        <h1>Xếp hạng sách</h1>
        <div id="ban_chay2">
            <table>
                <?php 
                $i = 0;
                $sql = mysqli_query($ketnoi,
                "SELECT sum(soluongmua) as sd ,hinh,sach.masach FROM donhang,ct_donhang,sach
                where donhang.id_donhang = ct_donhang.id_donhang
                and donhang.masach = sach.masach
                and ct_donhang.trangthai = 3
                group by donhang.masach
                order by sd desc");
                echo"<tr>";
                while($sach = mysqli_fetch_array($sql)){
                    $i++;
                    echo"
                    <td>
                        <div id=\"ban_chay3\" onclick=\"location.href='../ren_nghe_lap_trinh_wed/page_home.php?ctsp=".$sach['masach']."'\">
                            <b>Top $i</b><br>
                            <img src='img/".$sach['hinh']."'>
                            <span>Lượt mua: ".$sach['sd']."</span>
                        </div>
                    </td>
                    ";
                }
                echo"</tr>";
                ?>
            </table>     
        </div>       
    </div>
    <div id="tat_ca_sach">
        <h1>Sách</h1>
        <ul>
            <?php
            $sql = mysqli_query($ketnoi,"SELECT  * FROM sach");
            while($sach=mysqli_fetch_array($sql)){
                echo"
                <li id=\"thongtin\"><a href=\"../ren_nghe_lap_trinh_wed/page_home.php?ctsp=".$sach['masach']."\" style=\"text-decoration: none;\">";
                    echo "<img src='../ren_nghe_lap_trinh_wed/img/".$sach['hinh']."'>";
                    echo"<figcaption>";
                    echo"<span id=\"tensach\"> ".$sach['tensach']."";echo"</span>";
                    echo"<span id=\"gia\">Giá: ";monney($sach['gia']);
                    echo"</span>
                    </figcaption></a>
                </li>";
            }
            ?>   
        </ul>
    </div>
</main>
<script>
    var dichuyen = 0;
    var so_tt = <?php 
    $sql = mysqli_query($ketnoi,"SELECT count(id_tintuc) as so_tt FROM tintuc");
    $demtt = mysqli_fetch_array($sql);
    echo $demtt['so_tt'];
    ?>;
    var hinh = document.getElementById("dichuyen");
    hinh.style.width= so_tt*850 +"px";
    kt_so =(so_tt-1)*-850;
    function btn_phai(){
        dichuyen -= 850;
        if(dichuyen < (kt_so))
            dichuyen = 0;
        hinh.style.translate = dichuyen + "px";
    }
    function btn_trai(){
        dichuyen += 850;
        if(dichuyen > 0)
            dichuyen = (kt_so);
        hinh.style.translate = dichuyen + "px";
    }
</script>