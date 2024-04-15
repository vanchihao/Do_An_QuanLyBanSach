<style>
    /* page review*/
#review{
    position: relative;
    width: 1230px;
    height: 800px;
    overflow: auto;
}
#review h1{
    width: 100%;
    font-size:35px;
    text-align:center;
    background-color:rgb(0, 0, 94);
    color:aliceblue;
}
#review ul{
    list-style: none;
}
#review li{
    margin-top: 10px;
    margin-left: -30px;
    font-size: 25px;
    background-color: rgb(219, 219, 219);
    padding-left: 10px;
    border-radius: 8px;
    box-shadow: 0 0 3px;
    max-width: 1200px;
}
#review div{
    width: 300px;
    height: 50px;
    display: flex;
    align-items: center;
}
#review b{
    margin-left: 10px;
}
#review #daidien{
    width: 40px;
    height: 40px;
    border-radius: 50%;
}
</style>
<main id="review">
    <?php 
    $masach = $_SESSION['masach'];
    $sql = mysqli_query($ketnoi,"SELECT * FROM donhang,binhluan,khach where 
    donhang.masach = '$masach' and donhang.tendangnhap = khach.tendangnhap 
    and donhang.id_donhang = binhluan.id_donhang and binhluan.sao > 0");

    function sosao($sao){
        switch($sao){
            case 1:
                echo "<i class=\"fa fa-star\" style=\"font-size:20px;color: darkorange;\"></i>";
                break;
            case 2:
                echo "<i class=\"fa fa-star\" style=\"font-size:20px;color: darkorange;\"></i>
                <i class=\"fa fa-star\" style=\"font-size:20px;color: darkorange;\"></i>";
                break;
            case 3:
                echo "<i class=\"fa fa-star\" style=\"font-size:20px;color: darkorange;\"></i>
                <i class=\"fa fa-star\" style=\"font-size:20px;color: darkorange;\"></i>
                <i class=\"fa fa-star\" style=\"font-size:20px;color: darkorange;\"></i>";
                break;
            case 4:
                echo "<i class=\"fa fa-star\" style=\"font-size:20px;color: darkorange;\"></i>
                <i class=\"fa fa-star\" style=\"font-size:20px;color: darkorange;\"></i>
                <i class=\"fa fa-star\" style=\"font-size:20px;color: darkorange;\"></i>
                <i class=\"fa fa-star\" style=\"font-size:20px;color: darkorange;\"></i>
                ";
                break;
            case 5:
                echo "<i class=\"fa fa-star\" style=\"font-size:20px;color: darkorange;\"></i>
                <i class=\"fa fa-star\" style=\"font-size:20px;color: darkorange;\"></i>
                <i class=\"fa fa-star\" style=\"font-size:20px;color: darkorange;\"></i>
                <i class=\"fa fa-star\" style=\"font-size:20px;color: darkorange;\"></i>
                <i class=\"fa fa-star\" style=\"font-size:20px;color: darkorange;\"></i>";
                break;
        }
    }
    echo"<h1>";
        if(isset($_POST['result'])){
            if($_POST['result'] == "Tất cả") 
                echo "Tất cả";
            else 
                echo $_POST['result']." <i class=\"fa fa-star\" style=\"font-size:35px;color:yellow\"></i>"; 
        }
        else 
            echo "Tất cả";
    echo"</h1>";
    echo"<ul>";
    while($review = mysqli_fetch_array($sql)){
        if(isset($_POST['result'])){
            if($_POST['result']==$review['sao']){
                echo"<li>
                    <div>
                        <img src='img/".$review['hinh']."' id=\"daidien\">
                        <b>".$review['hoten']."</b>
                    </div>";
                    echo"<td>";sosao($review['sao']);
                echo"<br>
                    <span>".$review['noidung']."</span>
                    <br>
                    <hr>
                    <span>Phản hồi từ người bán: ".$review['traloi']."</span>
                </li>";
            }
            else if($_POST['result']=="Tất cả"){
                echo"<li>
                    <div>
                        <img src='img/".$review['hinh']."' id=\"daidien\">
                        <b>".$review['hoten']."</b>
                    </div>";
                    echo"<td>";sosao($review['sao']);
                echo"<br>
                    <span>".$review['noidung']."</span>
                    <br>
                    <hr>
                    <span>Phản hồi từ người bán: ".$review['traloi']."</span>
                </li>";
            }
        }
        else{
            echo"<li>
                <div>
                    <img src='img/".$review['hinh']."' id=\"daidien\">
                    <b>".$review['hoten']."</b>
                </div>";
                echo"<td>";sosao($review['sao']);
            echo"<br>
                <span>".$review['noidung']."</span>
                <br>
                <hr>
                <span>Phản hồi từ người bán: ".$review['traloi']."</span>
            </li>";
        }
    }
    echo"</ul>";
    ?>
</main>