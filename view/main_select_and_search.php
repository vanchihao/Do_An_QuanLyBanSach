<style>
    /* main_select_and_search*/
#main_select_and_search{
    position: relative;
    background-color: aliceblue;
    width: 1230px;
}
#main_select_and_search h1{
    width: 100%;
    text-align: center;
    background-color: rgb(0, 0, 94);
    color: white;
    font-size: 30px;
}
#main_select_and_search ul{
    background-color: aquamarine;
    list-style: none;
    margin-left: -25px;
    width: 100%;
}
#main_select_and_search ul li{
    width: 295px;
    height: 380px;
    margin-left: 10px;
    overflow: hidden;
    padding-bottom: 20px;
    float: left;
}
#main_select_and_search a{
    text-decoration: none;
}
#main_select_and_search ul li:hover figcaption{
    background-color: rgb(0, 0, 0);

}
#main_select_and_search ul li img{
    width: 100%;
    height: 320px;
}
#main_select_and_search ul li figcaption{
    margin: 0;
    width: 100%;
    height: 60px;
    background-color: rgb(0, 0, 94);
    margin-top: -5px;
}
#main_select_and_search ul li figcaption #tensach{
    width: 100%;
    height: 40px;
    font-size: 18px;
    color: white;
    display: flex;
    justify-content: center;
    align-items: center;
}
#main_select_and_search ul li figcaption #gia{
    width: 100%;
    height: 20px;
    color: white;
    font-size: 18px;
}
</style>
<main id="main_select_and_search">
    <?php
        if($_POST['select_and_search']=='select'){
            $result = $_POST['result'];          
            $tl = mysqli_query($ketnoi,"SELECT * FROM theloai where matheloai = '$result'");
            while ($theloai = mysqli_fetch_assoc($tl)) {
                echo "<h1>---".$theloai['tentheloai']."---</h1>";
            }       

            echo"<ul>";

            $sql = "SELECT  * FROM sach where theloai = '$result'";
            $sql_sach = mysqli_query($ketnoi, $sql);
            while($sach=mysqli_fetch_array($sql_sach)){
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

            echo"</ul>";
        }
        if($_POST['select_and_search']=='search'){
            $keyword = $_POST['keyword'];
            $i=0;
            if($keyword==""){
                echo "<h1>---Không tìm thấy kết quả---</h1>";
            }else{
                echo "<h1>---".$keyword."---</h1>";
                echo"<ul>";
                $sql = "SELECT  * FROM sach where tensach like '%$keyword%'";
                $sql_sach = mysqli_query($ketnoi, $sql);
                while($sach=mysqli_fetch_array($sql_sach)){
                    $i++;
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
                if($i==0)
                    echo"<li>Không tìm thấy kết quả</li>";
                echo"</ul>";
            }
        }
    ?>
</main>