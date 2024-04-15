-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 15, 2024 lúc 02:58 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlbansach`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id_binhluan` int(4) NOT NULL,
  `id_donhang` int(5) NOT NULL,
  `noidung` text NOT NULL,
  `traloi` text NOT NULL,
  `sao` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`id_binhluan`, `id_donhang`, `noidung`, `traloi`, `sao`) VALUES
(8, 15, '\r\n             Tốt       ', 'Cảm ơn bạn đã ủng hộ', 5),
(9, 17, '', '', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ct_donhang`
--

CREATE TABLE `ct_donhang` (
  `id_ctdh` int(4) NOT NULL,
  `nhanvien` varchar(15) NOT NULL,
  `tongtien` double NOT NULL,
  `ngaynhan` text NOT NULL,
  `trangthai` int(1) NOT NULL,
  `id_donhang` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `ct_donhang`
--

INSERT INTO `ct_donhang` (`id_ctdh`, `nhanvien`, `tongtien`, `ngaynhan`, `trangthai`, `id_donhang`) VALUES
(15, 'ngvanchu', 6120000, '17/12/2023 22:24:11', 3, 15),
(16, 'ngvanchu', 3060000, '17/12/2023 22:44:47', 3, 17),
(17, 'ngvanchu', 2500000, '', 1, 16);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id_donhang` int(4) NOT NULL,
  `diachi` text NOT NULL,
  `sdt` int(10) NOT NULL,
  `soluongmua` int(5) NOT NULL,
  `dongia` double NOT NULL,
  `ngaydathang` text NOT NULL,
  `tendangnhap` varchar(15) NOT NULL,
  `masach` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`id_donhang`, `diachi`, `sdt`, `soluongmua`, `dongia`, `ngaydathang`, `tendangnhap`, `masach`) VALUES
(15, 'Đồng Tháp', 907968102, 10, 612000, '17/12/2023 22:18:18', 'nvch', 17),
(16, 'Đồng Tháp', 907968102, 5, 500000, '17/12/2023 22:18:49', 'nvch', 16),
(17, 'cần thơ', 12345678, 5, 612000, '17/12/2023 22:44:16', 'taphucthinh', 17),
(18, 'Đồng Tháp', 907968102, 4, 300000, '03/01/2024 15:16:15', 'nvch', 12);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `id_giohang` int(4) NOT NULL,
  `tendangnhap` varchar(15) NOT NULL,
  `masach` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`id_giohang`, `tendangnhap`, `masach`) VALUES
(35, 'nvch', 11),
(36, 'nvch', 18),
(37, 'taphucthinh', 11),
(38, 'nvch', 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach`
--

CREATE TABLE `khach` (
  `id_khach` int(4) NOT NULL,
  `hoten` text NOT NULL,
  `gioitinh` varchar(3) NOT NULL,
  `diachi` text NOT NULL,
  `sdt` varchar(15) NOT NULL,
  `ten_email` varchar(30) NOT NULL,
  `tendangnhap` varchar(30) NOT NULL,
  `matkhau` varchar(15) NOT NULL,
  `hinh` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khach`
--

INSERT INTO `khach` (`id_khach`, `hoten`, `gioitinh`, `diachi`, `sdt`, `ten_email`, `tendangnhap`, `matkhau`, `hinh`) VALUES
(16, 'Nguyễn Văn Chí Hào', 'Nam', 'Đồng Tháp', '0907968102', 'chihao1223@gmail.com', 'nvch', 'nvch', 'img.jpg'),
(20, 'Tạ Phúc Thịnh', 'Nam', 'cần thơ', '12345678', 'Taphucthinh@gmail.com', 'taphucthinh', 'taphucthinh', 'logothuonghieu.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nxb`
--

CREATE TABLE `nxb` (
  `manxb` varchar(10) NOT NULL,
  `tennxb` text NOT NULL,
  `sdt` varchar(15) NOT NULL,
  `diachi` text NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nxb`
--

INSERT INTO `nxb` (`manxb`, `tennxb`, `sdt`, `diachi`, `email`) VALUES
('nxbct', 'Nhà xuất bản Chính trị quốc gia sự thật', '02438221581', '6/86 Duy Tân, Cầu Giấy, Hà Nội', 'phathanh@nxbctqg.vn'),
('nxbgd', 'Nhà xuất bản giáo dục', '02438220801', 'Số 81 Trần Hưng Đạo, Hoàn Kiếm, Hà Nội', 'veph@nxbgd.vn'),
('nxbkd', 'Nhà xuất bản kim đồng', '1900571595', '55 Quang Trung, Hai Bà Trưng, Hà Nội', 'info@nxbkimdong.com.'),
('nxbt', 'nhà xuất bản trẻ', '02839316289', '161B Lý Chính Thắng, Phường Võ Thị Sáu, Quận 3 , TP. Hồ Chí Minh', 'hopthubandoc@nxbtre.'),
('nxbth', 'Nhà xuất bản Tổng hợp thành phố Hồ chí Minh', '02838256804', '62 Nguyễn Thị Minh Khai, Phường Đa Kao, Quận 1, TP HCM', 'nstonghop@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quanly`
--

CREATE TABLE `quanly` (
  `id` int(4) NOT NULL,
  `ten` text NOT NULL,
  `tendangnhap` varchar(15) NOT NULL,
  `matkhau` varchar(15) NOT NULL,
  `chucvu` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `quanly`
--

INSERT INTO `quanly` (`id`, `ten`, `tendangnhap`, `matkhau`, `chucvu`) VALUES
(18, 'Nguyễn Văn Chủ', 'ngvanchu', 'ngvanchu', 1),
(19, 'Nguyễn Văn Quản Lý ', 'nvql', 'nvql', 2),
(20, 'Nguyễn Văn B', 'nvb', 'nvb', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sach`
--

CREATE TABLE `sach` (
  `masach` int(4) NOT NULL,
  `tensach` text NOT NULL,
  `theloai` varchar(8) NOT NULL,
  `tacgia` text NOT NULL,
  `namxuatban` text NOT NULL,
  `soluong` int(4) NOT NULL,
  `gia` double NOT NULL,
  `nxb` varchar(10) NOT NULL,
  `hinh` varchar(100) NOT NULL,
  `gioithieu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sach`
--

INSERT INTO `sach` (`masach`, `tensach`, `theloai`, `tacgia`, `namxuatban`, `soluong`, `gia`, `nxb`, `hinh`, `gioithieu`) VALUES
(10, '7 thói quen thành đạt', 'vanhoc', 'Steven Covey', '2023-12-08', 200, 200000, 'nxbct', '7thoiquenthanhdat.jpg', 'Câu trích hay nhất trong cuốn sách này là: “gieo mầm suy nghĩ sẽ gặt hái hành vi, gieo mầm hành vi sẽ gặt hái thói quen, gieo mầm thói quen sẽ gặt hái tính cách, gieo mầm tính cách sẽ gặt hái số phận”.'),
(11, 'Đắc nhân tâm', 'tamly', 'abc', '2023-12-04', 100, 300000, 'nxbth', 'dacnhantam.jpg', 'Câu trích hay nhất trong cuốn sách này đó là: “Có một sự thật là tất cả những người bạn gặp đều tự cảm thấy họ hơn bạn theo một cách nào đấy, và con đường thẳng dẫn tới trái tim họ là để họ nhận ra rằng bạn công nhận tầm quan trọng của họ, và sự ghi nhận đó là chân thành”.'),
(12, 'Cách nghĩ để thành công', 'ct_pl', 'dcv', '2023-12-17', 400, 300000, 'nxbgd', 'cachnghidethanhcong.jpg', 'Câu trích hay nhất của cuốn sách này đó là: “ Những đột phá cần có trong cuộc đời đang nằm trong chính trí tưởng tượng của bạn. Trí tưởng tượng là xưởng máy trong đầu bạn, có thể biến năng lượng tư duy thành thành tựu và của cải”.'),
(13, 'Cuộc sống không giới hạn', 'ng_thuat', 'Nick Vujic', '2023-12-07', 700, 800000, 'nxbkd', 'cuocsongkhonggioihan.jpg', 'Câu Chuyện Diệu Kỳ Của Chàng Trai Đặc Biệt Nhất Hành Tinh“.\r\n\"Bạn đẹp đẽ và quý giá hơn tất cả những viên kim cương trên thế gian này. Dẫu vậy, chúng ta nên luôn luôn đặt ra cho mình mục tiêu trở thành những con người tốt hơn, toàn thiện hơn, đẩy lùi và loại bỏ những giới hạn bằng cách mơ những giấc mơ lớn lao. Trong hành trình đó, chúng ta luôn cần có những điều chỉnh (bởi vì cuộc đời này không phải lúc nào cũng toàn là màu hồng), nhưng cuộc đời này luôn đáng sống. Tôi đến đây để nói với bạn rằng cho dù bạn đang ở trong hoàn cảnh nào, miễn là bạn còn thở, thì bạn vẫn có thể đóng góp cho cuộc đời này…” '),
(14, ' Hành trình về Phương Đông', 'tl_tg', 'Blair T. Spalding', '2023-04-21', 345, 135000, 'nxbt', 'hanhtrinhvephuongdong.jpg', '“Mọi vật trong vũ trụ đều quân bình tuyệt đối, không dư, không thiếu, từ hạt bụi bé nhỏ đến những dãy thiên hà vĩ đại. Đời người quá ngắn, và luôn bị lôi cuốn vào sinh hoạt quay cuồng. Đâu mấy ai ý thức được sự phung phí hôm nay, dọn đường cho sự đau khổ ngày mai. Tất cả chỉ là những ảo ảnh chập chờn, thế mà người ta cứ coi như thật. Nếu biết thức tỉnh quan sát, ta có thể học hỏi biết bao điều hay. Tiếc rằng khi đắc thời người ta quên đi quá khứ rất nhanh. Chỉ trong đau khổ, nhục nhã ê chề mới chịu học. Có thể đó cũng là lý do luôn luôn có các biến động vô thường, thúc dục con người học hỏi.”'),
(15, 'Người giàu có nhất thành Babylon', 't_thuyet', 'GEORGE', '2023-12-06', 678, 789000, 'nxbgd', 'nguoigiauconhatthanhbabylon.jpg', 'Đối với những độc giả không làm trong môi trường kinh doanh, quyển sách sẽ đưa ra những bí quyết giúp bạn gia tăng số tiền trong tài khoản và giải quyết nhanh chóng được những khó khăn về mặt tài chính. Còn đối với doanh nhân, thì những câu chuyện kể về người thương gia giàu có sẽ trở thành những bài học kinh điển và các bạn có thể áp dụng những nguyên lý sáng giá nhất của nó để đem lại thành công trong các chiến lược kinh doanh của mình.'),
(16, 'Quẳng gánh lo đi mà vui sống', 'kh_cn', 'abc', '2023-12-05', 118, 500000, 'nxbth', 'quangganhlodimavuisong.jpg', 'Cuốn sách cùng bộ với Đắc nhân tâm được đánh giá là cuốn sách rất hay. Mang đến cho bạn sự tự tin, niềm vui, cách vượt lên những nỗi đau.'),
(17, 'Bộ sách – Hạt giống tâm hồn', 'ng_thuat', 'qas', '2023-12-17', 385, 612000, 'nxbkd', 'hatgiongtamhon.jpg', 'Bộ sách Hạt giống tâm hồn là tập hợp những câu truyện hay trong cuộc sống. Những câu truyện thành đạt, những câu truyện về tấm lòng cao đẹp. Nuôi dưỡng một tâm hồn trong sáng, cho bạn một cuộc sống luôn vui tươi với những hạnh phúc giản dị.'),
(18, 'Tốc độ của niềm tin', 't_nhi', 'covey', '2023-12-31', 900, 700000, 'nxbgd', 'tocdocuaniemtin.jpg', 'TIN TỨC HOẠT ĐỘNG\r\nTop 10 cuốn sách hay nhất mọi thời đại\r\nSách là viên ngọc tri thức của nhân loại và có ảnh hưởng rất lớn tới cuộc sống con người. Nhờ đọc được những cuốn sách hay mà người ta có thể thay đổi cách sống, cải thiện tinh thần và có những định hướng đúng đắn cho sự nghiệp. \r\nDưới đây là 10 cuốn sách hay nhất mọi thời đại đã mang lại động lực sống mạnh mẽ cho nhiều người.\r\n\r\n1. Đắc nhân tâm\r\n\r\n\r\nĐắc nhân tâm là quyển sách nổi tiếng nhất, bán chạy nhất và có tầm ảnh hưởng nhất của mọi thời đại. Đây là quyển sách liên tục đứng đầu danh mục sách bán chạy nhất (do báo The New York Times bình chọn suốt 10 năm liền. Tác phẩm được đánh giá là quyển sách đầu tiên và hay nhất, có ảnh hưởng làm thay đổi cuộc đời của hàng triệu người trên thế giới.\r\n\r\nĐắc Nhân Tâm là nghệ thuật thu phục lòng người, là làm cho tất cả mọi người yêu mến mình. Đắc nhân tâm và cái Tài trong mỗi chúng ta.\r\n\r\nĐắc Nhân Tâm trong ý nghĩa đó cần được thụ đắc bằng sự hiểu rõ bản thân, thành thật với chính mình, hiểu biết và quan tâm đến những người xung quanh để nhìn ra và khơi gợi những tiềm năng ẩn khuất nơi họ, giúp họ phát triển lên một tầm cao mới. Đây chính là nghệ thuật cao nhất về con người và chính là ý nghĩa sâu sắc nhất đúc kết từ những nguyên tắc vàng của Dale Carnegie.\r\n\r\nTừ khi “Đắc nhân tâm” đến tay độc giả, nó đã khiến người đọc nhận ra rằng họ có thể tiết chế được các mối quan hệ trong và ngoại lề công việc, và trên thực tế thì hai mối quan hệ ấy không bao giờ tách rời nhau.\r\n\r\nCâu trích hay nhất trong cuốn sách này đó là: “Có một sự thật là tất cả những người bạn gặp đều tự cảm thấy họ hơn bạn theo một cách nào đấy, và con đường thẳng dẫn tới trái tim họ là để họ nhận ra rằng bạn công nhận tầm quan trọng của họ, và sự ghi nhận đó là chân thành”.\r\n\r\n2. Cách nghĩ để thành công\r\n\r\n\r\n\r\nCách nghĩ để thành công là cuốn sách đầu tiên đưa ra triết lý thành đạt - một triết lý đầy đủ và toàn diện về thành công của cá nhân, đồng thời cung cấp cho bạn phương pháp để tạo ra kế hoạch sơ bộ và chi tiết để đạt được thành công đó.\r\n\r\nĐược viết ra từ vô số những câu chuyện có thật của những người vĩ đại như Edison - nhà phát minh lỗi lạcmà thời gian rèn luyện trong trường học chỉ... vỏn vẹn 3 tháng, như Henry Ford - người bị coi là không có học vấn nhưng đã trở thành ông trùm trong nền công nghiệp xe hơi với một gia tài kết xù..., tác phẩm có một sức thuyết phục và lay động rất lớn,. Napoleon Hill đã dành hầu như toàn bộ thời gian và công sức trong suốt gần ba mươi năm để phỏng vấn hơn 500 người nổi tiếng và thành công nhất trong nhiều lĩnh vực khác nhau, cùng hàng ngàn doanh nhân khác - cả những kẻ thất bại và những người thành công.\r\n\r\nVới hơn 60 triệu bản đã được bán trong 70 năm kể từ khi ra đời, những đúc kết về thành công của Napoleon Hill đến nay vẫn không hề bị lỗi thời, ngược lại, thời gian chính là minh chứng sống động cho tính đúng đắn của những bí quyết mà ông chia sẻ.\r\n\r\nCâu trích hay nhất của cuốn sách này đó là: “ Những đột phá cần có trong cuộc đời đang nằm trong chính trí tưởng tượng của bạn. Trí tưởng tượng là xưởng máy trong đầu bạn, có thể biến năng lượng tư duy thành thành tựu và của cải”.\r\n\r\n3. 7 thói quen của người thành đạt \r\n\r\n\r\n\r\nTác giả Steven Covey đã vẽ nên tấm bản đồ hướng đi cho cuộc sống và đưa nó vào trang sách để giúp người đọc không chỉ hình thành những thói quen sinh hoạt hợp lý mà còn giúp họ trở thành người tốt, sống có ích hơn.\r\n\r\nCâu trích hay nhất trong cuốn sách này là: “gieo mầm suy nghĩ sẽ gặt hái hành vi, gieo mầm hành vi sẽ gặt hái thói quen, gieo mầm thói quen sẽ gặt hái tính cách, gieo mầm tính cách sẽ gặt hái số phận”.\r\n\r\n4. Cuộc sống không giới hạn\r\n\r\n\r\n\r\nCuộc Sống Không Giới Hạn - Nick Vujic- Câu Chuyện Diệu Kỳ Của Chàng Trai Đặc Biệt Nhất Hành Tinh“.\r\n\"Bạn đẹp đẽ và quý giá hơn tất cả những viên kim cương trên thế gian này. Dẫu vậy, chúng ta nên luôn luôn đặt ra cho mình mục tiêu trở thành những con người tốt hơn, toàn thiện hơn, đẩy lùi và loại bỏ những giới hạn bằng cách mơ những giấc mơ lớn lao. Trong hành trình đó, chúng ta luôn cần có những điều chỉnh (bởi vì cuộc đời này không phải lúc nào cũng toàn là màu hồng), nhưng cuộc đời này luôn đáng sống. Tôi đến đây để nói với bạn rằng cho dù bạn đang ở trong hoàn cảnh nào, miễn là bạn còn thở, thì bạn vẫn có thể đóng góp cho cuộc đời này…” \r\n\r\n5. Hành trình về Phương Đông\r\n\r\n\r\n\r\nHành trình về phương đông” là một phần trong bộ hồi ký nổi tiếng của giáo sư Blair T. Spalding (1857 – 1953). Cuốn sách kể chuyện một đoàn khoa học gồm các chuyên môn khác nhau Hội Khoa học Hoàng gia Anh (tức Viện Hàn lâm Khoa học) cử sang Ấn Độ nghiên cứu về “huyền học”. Sau hai năm trời lang thang khắp các đền chùa Ấn Độ, chứng kiến nhiều cảnh mê tín dị đoan, thậm chí “làm tiền” du khách, của nhiều pháp sư, đạo sĩ rởm, họ được tiếp xúc với những vị chân tu sống ẩn danh ở thành phố hay trên rặng Tuyết Sơn. Nhờ thế, họ được chứng kiến, hiểu biết đúng đắn về các khoa học cổ xưa và bí truyền của văn hóa Ấn Độ như yoga, thuật chiêm tinh, các phép dưỡng sinh và chữa bệnh, quan niệm về cõi sống và cõi chết.\r\n\r\n“Mọi vật trong vũ trụ đều quân bình tuyệt đối, không dư, không thiếu, từ hạt bụi bé nhỏ đến những dãy thiên hà vĩ đại. Đời người quá ngắn, và luôn bị lôi cuốn vào sinh hoạt quay cuồng. Đâu mấy ai ý thức được sự phung phí hôm nay, dọn đường cho sự đau khổ ngày mai. Tất cả chỉ là những ảo ảnh chập chờn, thế mà người ta cứ coi như thật. Nếu biết thức tỉnh quan sát, ta có thể học hỏi biết bao điều hay. Tiếc rằng khi đắc thời người ta quên đi quá khứ rất nhanh. Chỉ trong đau khổ, nhục nhã ê chề mới chịu học. Có thể đó cũng là lý do luôn luôn có các biến động vô thường, thúc dục con người học hỏi.”\r\n\r\n6. Người giàu có nhất thành Babylon\r\n\r\n\r\n\r\n Những trang sách trong cuốn sách Người giàu có nhất thành Babylon sẽ đưa chúng ta trở lại vương quốc Babylon cổ đại, cái nôi nuôi dưỡng những nguyên lý cơ bản về tài chính mà giờ đây con người hiện đại đã kế thừa và vận dụng trên toàn thế giới. Cuốn sách nói về những thành công, những thành quả đạt được của từng cá nhân sống trong thành Babylon cổ đại. Từ đó, giúp mọi người hiểu rõ hơn về vấn đề tài chính và cống hiến các kế sách và phương pháp làm giàu. Những bí quyết này giúp bạn đánh giá đúng giá trị của đồng tiền, và hướng dẫn bạn cách thực hành theo những nguyên lý tài chính.\r\n\r\nĐối với những độc giả không làm trong môi trường kinh doanh, quyển sách sẽ đưa ra những bí quyết giúp bạn gia tăng số tiền trong tài khoản và giải quyết nhanh chóng được những khó khăn về mặt tài chính. Còn đối với doanh nhân, thì những câu chuyện kể về người thương gia giàu có sẽ trở thành những bài học kinh điển và các bạn có thể áp dụng những nguyên lý sáng giá nhất của nó để đem lại thành công trong các chiến lược kinh doanh của mình.\r\n\r\n7. Quẳng gánh lo đi mà vui sống\r\n\r\n\r\n\r\nCuốn sách cùng bộ với Đắc nhân tâm được đánh giá là cuốn sách rất hay. Mang đến cho bạn sự tự tin, niềm vui, cách vượt lên những nỗi đau.\r\n\r\n 8. Bộ sách – Hạt giống tâm hồn\r\n\r\n\r\n\r\nBộ sách Hạt giống tâm hồn là tập hợp những câu truyện hay trong cuộc sống. Những câu truyện thành đạt, những câu truyện về tấm lòng cao đẹp. Nuôi dưỡng một tâm hồn trong sáng, cho bạn một cuộc sống luôn vui tươi với những hạnh phúc giản dị.\r\n\r\n 9. Tốc độ của niềm tin\r\n\r\n\r\n\r\nNhư những sóng gợn trong hồ nước, Tốc độ của Niềm tin bắt đầu từ bên trong mỗi con người chúng ta, rồi lan sang các mối quan hệ của chúng ta, các tổ chức nơi chúng ta hoạt động, các mối quan hệ trên thương trường và cuối cùng tỏa ra khắp nơi trên thế giới. Covey trình bày bản đồ hành trình để xây dựng niềm tin ở mọi cấp độ, xây dựng tính cách và năng lực, nâng cao mức độ tin cậy và thiết lập sự lãnh đạo truyền cảm hứng cho mọi người.'),
(19, 'sach moi', 'ng_thuat', 'thịnh', '2003-11-12', 11, 1111111, 'nxbkd', 'img.jpg', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloai`
--

CREATE TABLE `theloai` (
  `matheloai` varchar(8) NOT NULL,
  `tentheloai` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `theloai`
--

INSERT INTO `theloai` (`matheloai`, `tentheloai`) VALUES
('ct_pl', 'Chính trị - Pháp luật'),
('kh_cn', 'Khoa học - Công nghệ'),
('ng_thuat', 'Nghệ thuật'),
('tamly', 'Tâm lý'),
('tl_tg', 'Tâm linh - tôn giáo'),
('t_nhi', 'Thiếu nhi'),
('t_thuyet', 'Tiểu thuyết'),
('vanhoc', 'Văn học');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongbao`
--

CREATE TABLE `thongbao` (
  `id_thongbao` int(4) NOT NULL,
  `tendangnhap` varchar(15) NOT NULL,
  `nhanvien` varchar(20) NOT NULL,
  `thoigian` text NOT NULL,
  `noidung` text NOT NULL,
  `trangthai` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `thongbao`
--

INSERT INTO `thongbao` (`id_thongbao`, `tendangnhap`, `nhanvien`, `thoigian`, `noidung`, `trangthai`) VALUES
(21, 'nvch', 'ngvanchu', '18/12/2023 14:53:19', 'đơn hàng của bạn đã giao thành công', 1),
(22, 'nvch', 'nvql', '03/01/2024 14:13:40', '123', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `id_tintuc` int(5) NOT NULL,
  `ten_tin` text NOT NULL,
  `hinh` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tintuc`
--

INSERT INTO `tintuc` (`id_tintuc`, `ten_tin`, `hinh`) VALUES
(9, 'bv1', 'top-10-quyen-sach-hay-ve-cuoc-song-ban-nen-doc-trong-doiabc-800x450-1.jpg'),
(10, 'bv2', 'sach-hay-ve-cuoc-song.jpg'),
(11, 'bv3', 'image3.png');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id_binhluan`);

--
-- Chỉ mục cho bảng `ct_donhang`
--
ALTER TABLE `ct_donhang`
  ADD PRIMARY KEY (`id_ctdh`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id_donhang`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`id_giohang`);

--
-- Chỉ mục cho bảng `khach`
--
ALTER TABLE `khach`
  ADD PRIMARY KEY (`id_khach`);

--
-- Chỉ mục cho bảng `nxb`
--
ALTER TABLE `nxb`
  ADD PRIMARY KEY (`manxb`);

--
-- Chỉ mục cho bảng `quanly`
--
ALTER TABLE `quanly`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sach`
--
ALTER TABLE `sach`
  ADD PRIMARY KEY (`masach`);

--
-- Chỉ mục cho bảng `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`matheloai`);

--
-- Chỉ mục cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  ADD PRIMARY KEY (`id_thongbao`);

--
-- Chỉ mục cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`id_tintuc`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id_binhluan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `ct_donhang`
--
ALTER TABLE `ct_donhang`
  MODIFY `id_ctdh` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id_donhang` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `id_giohang` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `khach`
--
ALTER TABLE `khach`
  MODIFY `id_khach` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `quanly`
--
ALTER TABLE `quanly`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `sach`
--
ALTER TABLE `sach`
  MODIFY `masach` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  MODIFY `id_thongbao` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `id_tintuc` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
