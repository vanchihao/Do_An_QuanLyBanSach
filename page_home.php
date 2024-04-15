<?php
    session_start();
    include('../ren_nghe_lap_trinh_wed/connect/connect_data.php');
    class view{
        public $header_home = '../ren_nghe_lap_trinh_wed/view/page_header_home.php';
        public $main_home = '../ren_nghe_lap_trinh_wed/view/page_main_home.php';
        public $footer = '../ren_nghe_lap_trinh_wed/view/footer.php' ;
        public $main_ctsp = '../ren_nghe_lap_trinh_wed/view/page_main_ctsp.php';
        public $main_review = '../ren_nghe_lap_trinh_wed/view/page_main_review.php';
        public $main_login = '../ren_nghe_lap_trinh_wed/view/page_log_in.php';
        public $main_user = '../ren_nghe_lap_trinh_wed/view/page_customer_infor.php';
        public $main_update_user = '../ren_nghe_lap_trinh_wed/view/update_infor_user.php';
        public $main_cart = '../ren_nghe_lap_trinh_wed/view/cart.php';
        public $main_select = '../ren_nghe_lap_trinh_wed/view/main_select_and_search.php';
        public $main_message = '../ren_nghe_lap_trinh_wed/view/main_message.php';
        public $main_order = '../ren_nghe_lap_trinh_wed/view/main_old_order.php';
        public $main_purchased_product = '../ren_nghe_lap_trinh_wed/view/main_purchased_product.php';
        public $login_admin = '../ren_nghe_lap_trinh_wed/view/login_admin.php';
        public $sign_up = '../ren_nghe_lap_trinh_wed/view/page_sign_up.php';
        public $a_product = '../ren_nghe_lap_trinh_wed/view/admin_product.php';
        public $a_publishing = '../ren_nghe_lap_trinh_wed/view/admin_publishing.php';
        public $home_admin = '../ren_nghe_lap_trinh_wed/view/home_admin.php';
        public $update_publishing = '../ren_nghe_lap_trinh_wed/view/update_publishing.php';
    }
    function monney($sach){
        $gia =strval($sach); 
        if(strlen($gia)==6)
            for($i=0;$i<strlen($gia);$i++){    
                if($i==3)
                    echo '.'; 
                echo $gia[$i]; 
            }
        else if(strlen($gia)==7)
            for($i=0;$i<strlen($gia);$i++){    
                if($i==1 || $i==4)
                    echo '.';
                echo $gia[$i]; 
            }
        else if(strlen($gia)==8)
            for($i=0;$i<strlen($gia);$i++){    
                if($i==2 || $i==5)
                    echo '.';
                echo $gia[$i]; 
        }
        else if(strlen($gia)==9)
            for($i=0;$i<strlen($gia);$i++){    
                if($i==3 || $i==6)
                    echo '.';
                echo $gia[$i]; 
        }
        echo" VNĐ";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/css1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Read</title>
</head>
<style>
    #tinnhancho{
    width: 24px;
    height: 24px;
    border-radius: 50%;
    background-color:red;
    color:white;
}
</style>
<body onload="load()">
    <?php 
    $view = new view();
    if(isset($_POST['header'])){
        $header = $_POST['header'];
        switch($header){
            case 'trangchu':
                include($view->header_home);
                include($view->main_home);
                include($view->footer);
            break;
            case 'admin':
                include($view->login_admin);
            break;
            case 'message':
                include($view->header_home);
                include($view->main_message);
                include($view->footer);
            break;
            case 'cart':
                include($view->header_home);
                include($view->main_cart);
                include($view->footer);
            break;
            case 'log_in':
                include($view->main_login);
            break;
            case 'sign_up':
                include($view->sign_up);
            break;
            case 'user':
                include($view->main_user);
                include($view->footer);
            break;
        }
    }else 
        if(isset($_GET['ctsp'])||isset($_POST['ctsp'])){
            include($view->header_home);
            include($view->main_ctsp);
            include($view->footer);
    }else 
        if(isset($_POST['review'])){
            include($view->header_home);
            include($view->main_review);
            include($view->footer);
    }else 
        if(isset($_POST['message'])){

            include($view->header_home);
            include($view->main_message);
            include($view->footer);
    }else 
        if(isset($_POST['select_and_search'])){
            include($view->header_home);
            include($view->main_select);
            include($view->footer);
    }else 
        if(isset($_POST['order'])||isset($_GET['order'])){
            include($view->header_home);
            include($view->main_order);
            include($view->footer);
    }
    else 
        if(isset($_POST['purchased_product'])||isset($_GET['purchased_product'])){
            include($view->header_home);
            include($view->main_purchased_product);
            include($view->footer);
    }else 
        if(isset($_POST['admin']) || isset($_GET['admin'])){
            if(isset($_POST['admin']))
                $admin = $_POST['admin'];
            if(isset($_GET['admin']))
                $admin = $_GET['admin'];
            if(isset($_SESSION['presonnel'])){
                $tendangnhap = $_SESSION['presonnel'];
                $sql = mysqli_query($ketnoi, "SELECT  * FROM quanly where tendangnhap = '$tendangnhap'");
                $presonnel = mysqli_fetch_array($sql);
            }
            switch($admin){
                case 'check_login_admin':
                    $kttendangnhap = $_POST['tendangnhap'];
                    $matkhau = $_POST['matkhau'];
                    $sql = mysqli_query($ketnoi, "SELECT  * FROM quanly where tendangnhap = '$kttendangnhap' and matkhau = '$matkhau'");
                    $presonnel = mysqli_fetch_array($sql);
                    if(isset($presonnel['id'])){
                        $_SESSION['presonnel'] = $kttendangnhap;
                        $tendangnhap = $_SESSION['presonnel'];
                        include('../ren_nghe_lap_trinh_wed/view/home_admin.php');             
                    }else{
                        include('../ren_nghe_lap_trinh_wed/view/login_admin.php');
                        echo "
                        <script>
                                alert('Đăng nhập ko thành công');
                        </script>";
                    }
                break;
                case 'admin_product':
                    include($view->a_product);
                break;
                case 'add_product':
                    $target_dir = "img/";
                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                    move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);
                    $hinh = $_FILES['hinh']['name']; 

                    $tensach = $_POST['tensach'];
                    $theloai = $_POST['theloai'];
                    $tacgia = $_POST['tacgia'];
                    $namxuatban = $_POST['namxuatban'];
                    $nxb = $_POST['nxb'];
                    $soluong = $_POST['soluong'];
                    $gia = $_POST['gia'];
                    $gioithieu = $_POST['gioithieu'];

                    $themtk = "INSERT INTO sach(tensach,theloai,tacgia,namxuatban,nxb,soluong,gia,gioithieu,hinh)
                    VALUES('$tensach','$theloai','$tacgia','$namxuatban','$nxb','$soluong','$gia','$gioithieu','$hinh')";
                    $ketqua= mysqli_query($ketnoi, $themtk);
                    if($ketqua){
                        echo "<script>
                        alert('thêm thành công')
                        </script>";
                    }
                    else{
                        echo "<script>
                        alert('thêm ko thành công')
                        </script>";
                    }
                    include('../ren_nghe_lap_trinh_wed/view/admin_product.php');
                break;
                case 'update_product':
                    include('../ren_nghe_lap_trinh_wed/view/update_product.php');
                break;
                case 'thuc_hien_sua':
                    $target_dir = "img/";
                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                    move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);
                    $hinh = $_FILES['hinh']['name'];

                    if(empty($hinh)){
                        $hinh = $_POST['hinhcu'];
                    }

                    $id = $_POST['id'];
                    $tensach = $_POST['tensach'];
                    $theloai = $_POST['theloai'];
                    $tacgia = $_POST['tacgia'];
                    $namxuatban = $_POST['namxuatban'];
                    $soluong = $_POST['soluong'];
                    $gia = $_POST['gia'];
                    $nxb = $_POST['nxb'];
                    $gioithieu = $_POST['gioithieu'];

                    $sua= "UPDATE sach set tensach='$tensach',theloai='$theloai',tacgia='$tacgia',namxuatban='$namxuatban',
                    soluong='$soluong',gia='$gia',nxb='$nxb',gioithieu='$gioithieu'"."WHERE masach='$id'";
                    $ketqua= mysqli_query($ketnoi, $sua);
                    if($ketqua){
                        echo "<script>
                        alert('Sửa thành công');
                        </script>";
                    }else{
                        echo "<script>
                        alert('Sửa thất bại')
                        </script>";
                    }
                    include('../ren_nghe_lap_trinh_wed/view/admin_product.php');
                break;
                case 'delete_product':
                    $id = $_GET['delete'];
                    $sql="DELETE FROM sach WHERE masach = '$id'";
                    $sqlxoa=mysqli_query($ketnoi,$sql);
                    if($sqlxoa){
                        echo "<script>
                            alert('Xóa thành công');
                            </script>";
                    }else{
                        echo "<script>
                            alert('Xóa thất bại')
                            </script>";
                    }
                    include('../ren_nghe_lap_trinh_wed/view/admin_product.php');
                break;
                case 'admin_search':
                    include($view->a_product);
                break;
                case 'admin_publishing':
                    include($view->a_publishing);
                break;
                case 'add_publishing':
                    $manxb = $_POST['manxb'];
                    $tennxb = $_POST['tennxb'];
                    $sdt = $_POST['sdt'];
                    $diachi = $_POST['diachi'];
                    $email = $_POST['email'];
            
                    $sql = "SELECT  * FROM nxb where manxb = '$manxb' or tennxb = '$tennxb'";
                    $kiemtra = mysqli_query($ketnoi, $sql);
                    $nxb=mysqli_fetch_array($kiemtra);
                    if(isset($nxb['manxb'])){
                        echo "<script>
                        alert('NXB này đã có!');
                        </script>";
                    }else{
                        $themtk = "INSERT INTO nxb(manxb,tennxb,sdt,diachi,email)
                        VALUES('$manxb','$tennxb','$sdt','$diachi','$email')";
                        $ketqua= mysqli_query($ketnoi, $themtk);
                        if($ketqua)
                            echo "<script>
                            alert('thêm thành công');
                            </script>";
                        else
                            echo "<script>
                            alert('thêm ko thành công');
                            </script>";
                    }
                    include('../ren_nghe_lap_trinh_wed/view/admin_publishing.php');
                break;
                case 'update_publishing':
                    include($view->update_publishing);
                break;
                case 'thuc_hien_update_publishing':
                    $id = $_POST['id'];
                    $manxb = $_POST['manxb'];
                    $tennxb = $_POST['tennxb'];
                    $sdt = $_POST['sdt'];
                    $diachi = $_POST['diachi'];
                    $email = $_POST['email'];

                    $sua= "UPDATE nxb set manxb='$manxb',tennxb='$tennxb',sdt='$sdt',diachi='$diachi',email='$email'"."WHERE manxb='$id'";
                    $ketqua= mysqli_query($ketnoi, $sua);
                    if($ketqua){
                        echo "<script>
                        alert('Sửa thành công');
                        </script>";
                    }else{
                        echo "<script>
                        alert('Sửa thất bại')
                        </script>";
                    }
                    include('../ren_nghe_lap_trinh_wed/view/admin_publishing.php');
                break;
                case 'delete_publishing':
                    $id = $_GET['delete'];
                    $sql="DELETE FROM nxb WHERE manxb = '$id'";
                    $sqlxoa=mysqli_query($ketnoi,$sql);
                    if($sqlxoa){
                        echo "<script>
                            alert('Xóa thành công');
                            </script>";
                    }else{
                        echo "<script>
                            alert('Xóa thất bại');
                            </script>";
                    }
                    include('../ren_nghe_lap_trinh_wed/view/admin_publishing.php');
                break;
                case 'admin_order':
                case 'search_order':
                case 'product_sold':
                case 'authenticate':
                case 'delivery':
                case 'pay':
                    include('../ren_nghe_lap_trinh_wed/view/admin_order.php');
                break;
                case 'update_order':
                    if(isset($_GET['authenticate'])){
                        $id_donhang = $_GET['authenticate'];
                        $trangthai = 1;
                        // cap nhat kho
                        $sql = mysqli_query($ketnoi,"SELECT * FROM sach,donhang where donhang.id_donhang = '$id_donhang' and donhang.masach = sach.masach");
                        $donhang = mysqli_fetch_array($sql);
                        $masach = $donhang['masach'];

                        $sl = $donhang['soluong'];
                        $slm = $donhang['soluongmua'];
                        $dongia = $donhang['dongia'];

                        $capnhatkho = $sl - $slm;
                        $tongtien = $slm*$dongia;
                        $nhanvien = $_SESSION['presonnel'];
                        $sua_kho= mysqli_query($ketnoi, "UPDATE sach set soluong='$capnhatkho'"."WHERE masach='$masach'");
                        $sua_don= mysqli_query($ketnoi, "INSERT into ct_donhang(nhanvien,tongtien,trangthai,id_donhang) 
                        values('$nhanvien','$tongtien','$trangthai','$id_donhang')");
                        if($sua_don && $sua_kho){
                            echo "<script>
                                alert('Xác nhận thành công');
                                </script>";
                        }else{
                            echo "<script>
                                alert('Xác nhận thất bại');
                                </script>";
                        }
                        include('../ren_nghe_lap_trinh_wed/view/admin_order.php');
                    }
                    if(isset($_GET['delivery'])){
                        $id_donhang = $_GET['delivery'];
                        $trangthai = 2;
                        $sua_don= mysqli_query($ketnoi, "UPDATE ct_donhang set trangthai='$trangthai'"."WHERE id_donhang='$id_donhang'");
                        include('../ren_nghe_lap_trinh_wed/view/admin_order.php');
                    }
                    if(isset($_GET['pay'])){
                        $id_donhang = $_GET['pay'];
                        $ngaynhan = date('d/m/Y H:i:s');
                        $trangthai = 3;
                        $sao =0;
                        $sua_don= mysqli_query($ketnoi, "UPDATE ct_donhang set trangthai='$trangthai',ngaynhan='$ngaynhan'"."WHERE id_donhang='$id_donhang'");
                        $binhluan = mysqli_query($ketnoi, "INSERT into binhluan(id_donhang,sao) values('$id_donhang','$sao')");
                        include('../ren_nghe_lap_trinh_wed/view/admin_order.php');
                    }
                    if(isset($_GET['delete'])){
                        $id_donhang = $_GET['delete'];
                        $nhanvien = $_SESSION['presonnel'];
                        $tb_khach = mysqli_query($ketnoi, "SELECT * FROM donhang,khach,sach WHERE id_donhang='$id_donhang' 
                        and donhang.tendangnhap = khach.tendangnhap and donhang.masach = sach.masach");
                        $thongbao = mysqli_fetch_array($tb_khach);
                        include('../ren_nghe_lap_trinh_wed/view/delete_order.php');
                    }
                break;
                case 'xac_nhan_xoa':
                    $id_huy_don = $_POST['id_donhang'];
                    $tendangnhap = $_POST['tendangnhap'];
                    $nhanvien = $_POST['nhanvien'];
                    $ngaygui = $_POST['ngaygui'];
                    $noidung = $_POST['noidung'];

                    $tb = "INSERT INTO thongbao(tendangnhap,nhanvien,thoigian,noidung)
                    VALUES('$tendangnhap','$nhanvien','$ngaygui','$noidung')";
                    $gui_tb = mysqli_query($ketnoi,$tb);

                    $xoa_don= mysqli_query($ketnoi, "DELETE from donhang WHERE id_donhang='$id_huy_don'");
                    include('../ren_nghe_lap_trinh_wed/view/admin_order.php');
                break;
                case 'admin_posts':
                    include('../ren_nghe_lap_trinh_wed/view/admin_posts.php');
                break;
                case 'add_posts':
                    $tenbaiviet = $_POST['tenbaiviet'];

                    $target_dir = "img/";
                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                    move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);
                    $hinh = $_FILES['hinh']['name']; 

                    $themtk = "INSERT INTO tintuc(ten_tin,hinh)
                    VALUES('$tenbaiviet','$hinh')";
                    $ketqua= mysqli_query($ketnoi, $themtk); 
                    include('../ren_nghe_lap_trinh_wed/view/admin_posts.php');     
                break;
                case 'update_posts':
                    if(isset($_GET['update'])){
                        include('../ren_nghe_lap_trinh_wed/view/update_posts.php');
                    }
                    if(isset($_GET['delete'])){
                        $id = $_GET['delete'];
                        $sql="DELETE FROM tintuc WHERE id_tintuc = '$id'";
                        $sqlxoa=mysqli_query($ketnoi,$sql);
                        include('../ren_nghe_lap_trinh_wed/view/admin_posts.php');
                    }
                break;
                case 'thuc_hien_sua_posts':
                    $id_baiviet = $_POST['id'];
                    $tentin = $_POST['ten_tin'];
            
                    $target_dir = "img/";
                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                    move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);
                    $hinh = $_FILES['hinh']['name'];

                    if(empty($hinh)){
                        $hinh = $_POST['hinhcu'];
                    }
            
                    $sua= "UPDATE tintuc set ten_tin='$tentin',hinh='$hinh'"."WHERE id_tintuc='$id_baiviet'";
                    $ketqua= mysqli_query($ketnoi, $sua);
                    include('../ren_nghe_lap_trinh_wed/view/admin_posts.php');
                break;
                case 'admin_customer':
                case 'search_customer':
                    include('../ren_nghe_lap_trinh_wed/view/admin_customer.php');
                break;
                case 'admin_msg':
                case 'search_msg':
                    include('../ren_nghe_lap_trinh_wed/view/admin_message.php');
                break;
                case 'admin_send_message':
                    $tendangnhap = $_POST['tendangnhap'];
                    $nhanvien = $_POST['nhanvien'];
                    $ngaygui = $_POST['ngaygui'];
                    $noidung = $_POST['noidung'];

                    $themtk = "INSERT INTO thongbao(tendangnhap,nhanvien,thoigian,noidung)
                    VALUES('$tendangnhap','$nhanvien','$ngaygui','$noidung')";
                    $ketqua= mysqli_query($ketnoi, $themtk);
                    include('../ren_nghe_lap_trinh_wed/view/admin_customer.php');
                break;
                case 'delete_msg':
                    if(isset($_GET['delete'])){
                        $id_dlt = $_GET['delete'];
                        $id = $_GET['tbdg'];
                        $sql="DELETE FROM thongbao WHERE id_thongbao = '$id_dlt'";
                        $sqlxoa=mysqli_query($ketnoi,$sql);
                    }
                    echo "<script>";
                        echo" location.href='../ren_nghe_lap_trinh_wed/page_home.php?admin=admin_msg&tbdg=".$id."';";
                    echo "</script>";
                break;
                case 'admin_category':
                    include('../ren_nghe_lap_trinh_wed/view/admin_category.php');
                break;
                case 'add_category':
                    $matheloai = $_POST['matheloai'];
                    $tentheloai = $_POST['tentheloai'];

                    $sql = "SELECT  * FROM theloai where matheloai = '$matheloai' or tentheloai = '$tentheloai'";
                    $kiemtra = mysqli_query($ketnoi, $sql);
                    $theloai=mysqli_fetch_array($kiemtra);
                    if(isset($theloai['matheloai'])){
                        echo "<script>
                        alert('Thể loại sách này đã có!');
                        </script>";
                    }else{
                        $themtk = "INSERT INTO theloai(matheloai,tentheloai)
                        VALUES('$matheloai','$tentheloai')";
                        $ketqua= mysqli_query($ketnoi, $themtk);
                        if($ketqua)
                            echo "<script>
                            alert('thêm thành công');
                            </script>";
                        else
                            echo "<script>
                            alert('thêm ko thành công');
                            </script>";
                    }
                    include('../ren_nghe_lap_trinh_wed/view/admin_category.php');
                break;
                case 'update_category':
                    if(isset($_GET['update'])){
                        include('../ren_nghe_lap_trinh_wed/view/update_category.php');
                    }
                    if(isset($_GET['delete'])){
                        $id = $_GET['delete'];
                        $sql="DELETE FROM theloai WHERE matheloai = '$id'";
                        $sqlxoa=mysqli_query($ketnoi,$sql);
                        include('../ren_nghe_lap_trinh_wed/view/admin_category.php');
                    }
                break;
                case 'thuc_hien_sua_category':
                    $id = $_POST['id'];
                    $matheloai = $_POST['matheloai'];
                    $tentheloai = $_POST['tentheloai'];

                    $sql = "SELECT  * FROM theloai where matheloai = '$matheloai' or tentheloai = '$tentheloai'";
                    $kiemtra = mysqli_query($ketnoi, $sql);
                    $theloai=mysqli_fetch_array($kiemtra);
                    if(isset($theloai['matheloai'])){
                        echo "<script>
                        alert('Thể loại sách này đã có!')
                        </script>";
                    }else{
                        $sua= "UPDATE theloai set matheloai='$matheloai',tentheloai='$tentheloai'"."WHERE matheloai='$id'";
                        $ketqua= mysqli_query($ketnoi, $sua);
                    }
                    include('../ren_nghe_lap_trinh_wed/view/admin_category.php');
                break;
                case 'admin_presonnel':
                    include('../ren_nghe_lap_trinh_wed/view/admin_presonnel.php');
                break;
                case 'add_presonnel':
                    $ten = $_POST['ten'];
                    $tendangnhap = $_POST['tendangnhap'];
                    $matkhau = $_POST['matkhau'];
                    $chucvu = $_POST['chucvu'];

                    $sql = "SELECT  * FROM quanly where tendangnhap = '$tendangnhap' or matkhau = '$matkhau'";
                    $kiemtra = mysqli_query($ketnoi, $sql);
                    $nhan_vien=mysqli_fetch_array($kiemtra);
                        if(isset($nhanvien['id'])){
                            echo "<script>
                            alert('Tài khoản này đã tồn tại!');
                            </script>";
                        }else{
                            $themtk = "INSERT INTO quanly(ten,tendangnhap,matkhau,chucvu)
                            VALUES('$ten','$tendangnhap','$matkhau','$chucvu')";
                            $ketqua= mysqli_query($ketnoi, $themtk);
                        }
                    include('../ren_nghe_lap_trinh_wed/view/admin_presonnel.php');
                break;
                case 'update_presonnel':
                    if(isset($_GET['update'])){
                        include('../ren_nghe_lap_trinh_wed/view/update_presonnel.php');
                    }
                    if(isset($_GET['delete'])){
                        $id = $_GET['delete'];
                        $sql="DELETE FROM quanly WHERE id = $id";
                        $sqlxoa=mysqli_query($ketnoi,$sql);
                        include('../ren_nghe_lap_trinh_wed/view/admin_presonnel.php');
                    }
                break;
                case 'thuc_hien_sua_presonnel':
                    $id = $_POST['id'];
                    $ten = $_POST['ten'];
                    $tendangnhap = $_POST['tendangnhap'];
                    $matkhau = $_POST['matkhau'];
                    $chucvu = $_POST['chucvu'];

                    $sql = "SELECT  * FROM quanly where tendangnhap = '$tendangnhap' and matkhau = '$matkhau'";
                    $kiemtra = mysqli_query($ketnoi, $sql);
                    $nhan_vien=mysqli_fetch_array($kiemtra);
                    if(isset($nhanvien['id'])){
                        echo "<script>
                        alert('Tài khoản này đã tồn tại!');               
                        location.href='../ren_nghe_lap_trinh_wed/page_home.php?admin=update_category&update=".$id."';
                        </script>";

                    }else{
                        $sua= "UPDATE quanly set ten='$ten',tendangnhap='$tendangnhap',matkhau='$matkhau',chucvu='$chucvu'"."WHERE id='$id'";
                        $ketqua= mysqli_query($ketnoi, $sua);
                        include('../ren_nghe_lap_trinh_wed/view/admin_presonnel.php');
                    }
                break;
                case 'admin_statistical':
                case 'search_statistical':
                    include('../ren_nghe_lap_trinh_wed/view/admin_statistical.php');
                break;
                case 'admin_exit':
                    include('../ren_nghe_lap_trinh_wed/view/page_header_home.php');
                    include('../ren_nghe_lap_trinh_wed/view/page_main_home.php');
                    include('../ren_nghe_lap_trinh_wed/view/footer.php');
                break;
                case 'admin_home':
                    include('../ren_nghe_lap_trinh_wed/view/home_admin.php');
                break;
            }
    }  else 
        if(isset($_POST['update_customer'])||isset($_GET['update_customer'])){
            $update;
            if(isset($_POST['update_customer']))
                $update = $_POST['update_customer'];
            if(isset($_GET['update_customer']))
                $update = $_GET['update_customer'];
            if(isset($_SESSION['user'])){
                $tendangnhap = $_SESSION['user'];
                $sql = mysqli_query($ketnoi, "SELECT  * FROM khach where tendangnhap = '$tendangnhap'");
                $user = mysqli_fetch_array($sql);
            }
            switch($update){
                case 'information':
                    include($view->main_update_user);
                break;
                case 'check_update':
                    $target_dir = "img/";
                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                    move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);
                    $hinh = $_FILES['hinh']['name'];
    
                    if(empty($hinh)){
                        $hinh = $_POST['hinhcu'];
                    }
                    $id = $_POST['id_khach'];
                    $hoten=$_POST['hoten'];
                    $gioitinh=$_POST['gioitinh'];
                    $diachi=$_POST['diachi'];
                    $sdt=$_POST['sdt'];
                    $ten_email=$_POST['ten_email'];
                    $tendangnhap=$_POST['tendangnhap'];
                    $matkhau=$_POST['matkhau'];
    
                    $sua= "UPDATE khach set hoten='$hoten',gioitinh='$gioitinh',diachi='$diachi',sdt='$sdt',ten_email='$ten_email'
                    ,tendangnhap='$tendangnhap',matkhau='$matkhau',hinh='$hinh'"."WHERE id_khach='$id'";
                    $ketqua= mysqli_query($ketnoi, $sua);
                    
                    include('../ren_nghe_lap_trinh_wed/view/page_customer_infor.php');
                    include('../ren_nghe_lap_trinh_wed/view/footer.php');
                    
                    
                break;  
                case 'delete_cart':
                    $cart = $_POST['id_cart'];
                    
                    $sql="DELETE FROM giohang WHERE id_giohang = '$cart' ";
                    $sqlxoa=mysqli_query($ketnoi,$sql);
                    if($sqlxoa){
                        include('../ren_nghe_lap_trinh_wed/view/page_header_home.php');
                        include('../ren_nghe_lap_trinh_wed/view/cart.php');
                        include('../ren_nghe_lap_trinh_wed/view/footer.php');
                    }
                break;
                case 'add_cart':
                    $masach = $_POST['masach'];
                    if(isset($_SESSION['user'])){
                        $sqlgh = "SELECT * FROM giohang where masach = '$masach' and tendangnhap = '$tendangnhap'";
                        $sql_gh= mysqli_query($ketnoi,$sqlgh);
                        $giohang = mysqli_fetch_array($sql_gh);
                        if(isset($giohang['id_giohang'])){
                            echo "<script>
                                alert('Đã có trong giỏ hàng');
                            echo </script>";
                        }
                        else{
                            $themgh = "INSERT INTO giohang(tendangnhap,masach)
                            VALUES('$tendangnhap','$masach')";
                            $ketqua= mysqli_query($ketnoi, $themgh);
                            if($ketqua){
                                echo "<script>
                                    alert('Đã thêm vào giỏ hàng');
                                echo </script>";
                            }
                        }
                    }else{
                        echo "<script>
                            alert('Bạn chưa đăng nhập');
                        </script>";
                    }
                    include('../ren_nghe_lap_trinh_wed/view/page_header_home.php');
                    include '../ren_nghe_lap_trinh_wed/view/page_main_ctsp.php';
                    include('../ren_nghe_lap_trinh_wed/view/footer.php');
                break;
                case 'check_login':
                    $kttendangnhap = $_POST['tendangnhap'];
                    $matkhau = $_POST['matkhau'];
                    $sql = mysqli_query($ketnoi, "SELECT  * FROM khach where tendangnhap = '$kttendangnhap' and matkhau = '$matkhau'");
                    $user = mysqli_fetch_array($sql);
                    if(isset($user['tendangnhap'])){
                        $_SESSION['user'] = $user['tendangnhap'];
                        $tendangnhap = $_SESSION['user'];
                        echo "
                        <script>
                                alert('Đăng nhập thành công');
                        </script>";
                        include('../ren_nghe_lap_trinh_wed/view/page_header_home.php');
                        include('../ren_nghe_lap_trinh_wed/view/page_main_home.php');
                        include('../ren_nghe_lap_trinh_wed/view/footer.php');
                    }else{
                        include('../ren_nghe_lap_trinh_wed/view/page_log_in.php');
                        echo "
                        <script>
                                alert('Đăng nhập ko thành công');
                        </script>";
                    }
                break;
                case 'check_sign_up':
                    $hinh = "avatar.png";
                    $hoten = $_POST['hoten'];
                    $gioitinh = $_POST['gioitinh'];
                    $diachi = $_POST['diachi'];
                    $sdt = $_POST['sdt'];
                    $ten_email = $_POST['ten_email'];
                    $ttendangnhap = $_POST['tendangnhap'];
                    $matkhau = $_POST['matkhau'];
    
                    $sql = "SELECT  * FROM khach where tendangnhap = '$ttendangnhap' or matkhau = '$matkhau'";
                    $kiemtra = mysqli_query($ketnoi, $sql);
                    $row_kt = mysqli_fetch_array($kiemtra);
                    if(isset($row_kt['id_khach'])){
                        include('../ren_nghe_lap_trinh_wed/view/page_sign_up.php');
                        echo "
                        <script>
                                alert('Tên đăng nhập hoặc mật khẩu đã tồn tại');
                        </script>";
                    }else{
                        $themtk = "INSERT INTO khach(hoten,gioitinh,diachi,sdt,ten_email,tendangnhap,matkhau,hinh)
                        VALUES('$hoten','$gioitinh','$diachi','$sdt','$ten_email','$ttendangnhap','$matkhau','$hinh')";
                        $ketqua= mysqli_query($ketnoi, $themtk);
    
                        $_SESSION['user'] = $ttendangnhap;
                        $tendangnhap = $_SESSION['user'];
                        echo "
                        <script>
                                alert('Tạo tài khoản thành công');
                        </script>";
                        include('../ren_nghe_lap_trinh_wed/view/page_header_home.php');
                        include('../ren_nghe_lap_trinh_wed/view/page_main_home.php');
                        include('../ren_nghe_lap_trinh_wed/view/footer.php');
                    }
                break;
                case 'log_out':
                    session_destroy();
                    if(empty($_SESSION['user'])){
                        include('../ren_nghe_lap_trinh_wed/view/page_header_home.php');
                        include('../ren_nghe_lap_trinh_wed/view/page_main_home.php');
                        include('../ren_nghe_lap_trinh_wed/view/footer.php');
                    }else{
                        echo "
                        <script>
                        location.reload();
                        </script>";
                    }
                break;
                case 'quenmk':
                    include('../ren_nghe_lap_trinh_wed/view/quenmatkhau.php');
                break;
                case 'kt_email_sdt':
                    $email_sdt = $_POST['email-sdt'];
                    $sql = mysqli_query($ketnoi,"SELECT * FROM khach where ten_email = '$email_sdt'
                    or sdt = '$email_sdt'");
                    $row_kt = mysqli_fetch_array($sql);
                    if(isset($row_kt['id_khach'])){
                        $_SESSION['idkhach'] = $row_kt['id_khach'];
                        include('../ren_nghe_lap_trinh_wed/view/thaymatkhau.php');
                    }else{
                        echo "
                        <script>
                        alert('Sai email hoặc số điện thoại!');
                        </script>";
                        include('../ren_nghe_lap_trinh_wed/view/quenmatkhau.php');
                    }
                break;
                case 'thaymk':
                    $tendangnhap = $_POST['tendangnhap'];
                    $matkhau = $_POST['matkhau'];
                    if($tendangnhap == "" || $matkhau==""){
                        echo "
                        <script>
                        alert('Sai email hoặc số điện thoại!');
                        </script>";
                        include('../ren_nghe_lap_trinh_wed/view/thaymatkhau.php');
                    }else{
                        $sql = mysqli_query($ketnoi,"SELECT * FROM khach where tendangnhap = '$tendangnhap'
                        or matkhau = '$matkhau'");
                        $row_kt = mysqli_fetch_array($sql);
                        if(isset($row_kt['id_khach'])){
                            echo "
                            <script>
                            alert('Email hoặc số điện thoại đã tồn tại');
                            </script>";
                            include('../ren_nghe_lap_trinh_wed/view/thaymatkhau.php');
                        }else{
                            $idkhach = $_SESSION['idkhach'];
                            $sql = mysqli_query($ketnoi,"UPDATE khach set tendangnhap = '$tendangnhap',matkhau = '$matkhau'"
                        ."WHERE id_khach = '$idkhach'");
                            echo "
                            <script>
                            alert('Thay mật khẩu thành công');
                            </script>";
                            include('../ren_nghe_lap_trinh_wed/view/page_log_in.php');
                        }
                    }
                break;
                case 'buy':
                    $diachi = $_POST['diachi'];
                    $sdt = $_POST['sdt'];
                    $soluongmua = $_POST['soluongmua'];
                    $dongia = $_POST['dongia'];
                    $ngaydathang=$_POST['ngaydathang'];
                    $tendangnhap = $user['tendangnhap'];
                    $masach = $_POST['masach'];
                    $kho = $_POST['kho'];
            
                    if($kho>0){
                        $sql = "INSERT INTO donhang(diachi,sdt,soluongmua,dongia,ngaydathang,tendangnhap,masach)
                        VALUES('$diachi','$sdt','$soluongmua','$dongia','$ngaydathang','$tendangnhap','$masach')";
                        $ketqua= mysqli_query($ketnoi, $sql);
    
                        echo "<script>";
                            echo "alert('Mua hàng thành công!');";
                            echo" location.href='../ren_nghe_lap_trinh_wed/page_home.php?order' ";
                        echo "</script>";
                    }else{
                        echo "<script>";
                            echo"alert('Sản phẩm đã hết hàng');";
                            echo" location.href='../ren_nghe_lap_trinh_wed/page_home.php?order' ";
                        echo "</script>";
                    }
                break;
                case 'delete_order':
                    $id_donhang = $_GET['id_donhang'];
                    $sql="DELETE FROM donhang WHERE id_donhang = '$id_donhang'";
                    $result = mysqli_query($ketnoi,$sql);
                    if($result){
                    echo "<script>";
                        echo "alert('Đã xóa đơn hàng!');";
                        echo" location.href='../ren_nghe_lap_trinh_wed/page_home.php?order';";
                    echo "</script>";}
                break;
                case 'comment':
                    if(isset($_POST['customer_comment'])){
                        $id_comment = $_POST['id'];
                        $sao = $_POST['sao'];
                        $noidung = $_POST['noidung'];
                        $traloi="";
                        switch($sao){
                            case 1:
                                $traloi = "Xin lỗi vì sản phẩm không làm bạn hài lòng!, nếu có vấn đề cần tư vấn quý khách có thể liên hệ với admin ở cuối trang web";
                            break;
                            case 2:
                                $traloi = "Xin lỗi vì sản phẩm không làm bạn hài lòng!, nếu có vấn đề cần tư vấn quý khách có thể liên hệ với admin ở cuối trang web";
                            break;
                            case 3:
                                $traloi = "Xin lỗi vì sản phẩm không làm bạn hài lòng!, nếu có vấn đề cần tư vấn quý khách có thể liên hệ với admin ở cuối trang web";
                            break;
                            case 4:
                                $traloi = "Cảm ơn bạn đã ủng hộ";
                            break;
                            case 5:
                                $traloi = "Cảm ơn bạn đã ủng hộ";
                            break;
                        }
                        $sql = mysqli_query($ketnoi,"UPDATE binhluan set sao = '$sao',noidung = '$noidung',traloi = '$traloi'"
                        ."WHERE id_binhluan = '$id_comment'");

                        include($view->header_home);
                        include('../ren_nghe_lap_trinh_wed/view/main_purchased_product.php');
                        include($view->footer);
                    }else{
                        include($view->header_home);
                        include('../ren_nghe_lap_trinh_wed/view/customer_comment.php');
                        include($view->footer);
                    }
                break;
            }
    }
    else{
        include($view->header_home);
        include($view->main_home);
        include($view->footer);
    }
    ?>
</body>
<script>
    function gui(){
        var sm = document.getElementById("sm");
        sm.click();
    }
</script>
</html>