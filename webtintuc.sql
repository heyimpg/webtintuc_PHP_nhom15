-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2021 at 09:37 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webtintuc`
--

-- --------------------------------------------------------

--
-- Table structure for table `baiviet`
--

CREATE TABLE `baiviet` (
  `ID_BaiViet` int(11) NOT NULL,
  `TieuDe` varchar(50) NOT NULL,
  `NgayDang` date NOT NULL,
  `GioiThieu` varchar(100) NOT NULL,
  `AnhDaiDien` varchar(50) NOT NULL,
  `NoiDung` text NOT NULL,
  `ID_CTTheLoai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `baiviet`
--

INSERT INTO `baiviet` (`ID_BaiViet`, `TieuDe`, `NgayDang`, `GioiThieu`, `AnhDaiDien`, `NoiDung`, `ID_CTTheLoai`) VALUES
(101, 'Khi \'Vị\' không còn là \'vị Việt\'', '2021-09-25', 'Việc từ bỏ quyền tác giả của đạo diễn, từ bỏ quyền sở hữu của nhà sản xuất phim Vị cho thấy một số v', '', 'Ngậm ngùi đổi “quốc tịch”\r\nVị, theo cách nào đó, đã không còn là của Lê Bảo và Đồng Thị Phương Thảo. Theo thông tin từ nhà sản xuất Phương Thảo, cả hai đã ký văn bản từ chối quyền của mình với bộ phim này. Cụ thể, Lê Bảo từ chối quyền tác giả, còn Phương Thảo từ chối quyền sở hữu với tác phẩm.\r\n\r\n“Chúng tôi phải ký một văn bản với các công ty đồng sản xuất ở Pháp, Singapore, Đức và Thái Lan. Chúng tôi phải từ bỏ vì đó là hy vọng duy nhất của chúng tôi. Khi phim không còn “quốc tịch” Việt Nam, không liên quan đến chúng tôi ở Việt Nam nữa thì nó còn cơ hội sống, cơ hội đi. Đó là cách duy nhất chúng tôi có thể nghĩ đến. Tôi cũng không biết điều đó ở Việt Nam có được chấp nhận không”, nhà sản xuất Phương Thảo chia sẻ.\r\n\r\nSau khi văn bản này được ký, công ty tại Singapore của nhà đồng sản xuất Lai Weijie hiện là công ty giữ nhiều quyền nhất với phim Vị. Như vậy, Vị đã không còn “quốc tịch” Việt Nam mà mang “quốc tịch” Singapore.\r\n\r\nTrước đó, Vị đã không được hội đồng duyệt phim quốc gia của Việt Nam cấp phép phổ biến, khiến phim không được chiếu trong nước và cũng không được mang đi nước ngoài với tư cách là một phim Việt Nam. Dù rất buồn, nhà sản xuất Phương Thảo cho biết cô cùng đoàn phim vẫn mong muốn tác phẩm điện ảnh này có cơ hội được hội đồng duyệt phim xem xét lại, để có thể đến với các liên hoan phim (LHP) với danh nghĩa là phim Việt Nam.\r\n\r\nLuật sư Phạm Duy Khương chuyên về lĩnh vực sở hữu trí tuệ cho rằng việc từ bỏ quyền sở hữu với tác phẩm của nhà sản xuất không có vấn đề gì về pháp lý. Tuy nhiên, việc từ bỏ quyền nhân thân của đạo diễn phức tạp hơn nhiều. Ông Khương cho biết hiện tại ở Việt Nam tuy luật không cấm, song không có quy định cụ thể về việc từ bỏ quyền nhân thân. Vì thế, việc từ bỏ quyền tác giả này sẽ khó thực hiện. Tuy nhiên, nếu việc từ bỏ được thực hiện theo pháp luật Singapore thì có thể.\r\nGiám tuyển nghệ thuật Nguyễn Anh Tuấn (chủ của Heritage Space) đánh giá việc Vị không còn mang “quốc tịch” Việt Nam là một điều đáng buồn. Ông cũng nhận định đây là cách “giữ an toàn” khi kiểm định nghệ thuật phải đối mặt với những nội dung “khó hiểu”, “nhạy cảm” mà chưa có thang bậc pháp lý nào quy định rõ ràng.\r\nÔng Vi Kiến Thành, Cục trưởng Cục Điện ảnh (Bộ VH-TT-DL), chiều 27.9 cho biết Cục Điện ảnh đã có buổi làm việc với nhà sản xuất Đồng Thị Phương Thảo và yêu cầu nhà sản xuất có văn bản về vụ việc này.\r\nCần có cơ chế khác cho duyệt phim\r\nLý do để Vị không được cấp phép là cảnh khỏa thân trực diện kéo dài. Điều này đã được mổ xẻ trong cuộc tọa đàm trực tuyến Ai góp ý giơ tay lên về dự thảo luật Điện ảnh sửa đổi, diễn ra chiều 26.9. Thành viên của hội đồng duyệt phim, đạo diễn Nguyễn Hoàng Điệp cho rằng với bà, cảnh khỏa thân đó không kéo dài, nó hợp lý, tuy nhiên với thành viên khác của hội đồng thì không. Thêm vào đó, quy định hiện tại về phân loại phim chỉ có cao nhất là C18 (cấm khán giả dưới 18 tuổi) và nó cũng không áp dụng được với trường hợp của Vị. “Khi chúng ta không thể phân loại cho họ nữa thì họ bị cấm”, bà Điệp nói.\r\n\r\nBà Điệp cũng nuối tiếc, nếu luật Điện ảnh hiện hành khác đi thì câu chuyện cũng có thể khác. Có thể có thêm những phân loại tuổi khác nhau cho phim; hoặc cần có quy định rõ ràng cảnh khỏa thân được kéo dài đến đâu. Quy định này thậm chí còn giúp người làm phim có thể sáng tạo dễ dàng hơn. Đạo diễn Trần Anh Hùng lấy ví dụ về nụ hôn dài nhất trong phim của Alfred Hitchcock. Luật điện ảnh Mỹ thời điểm đó quy định mỗi nụ hôn trên phim không dài quá 3 giây, đạo diễn đã cho nhân vật chạm môi nhau 3 giây lại rời môi rồi chạm lại, cứ thế nụ hôn kéo dài đến hơn 2 phút.\r\nChuyên gia pháp lý Fushihara Hirota cũng cho rằng việc sửa đổi luật Điện ảnh cần tập trung vào phân loại phim trước. Theo đó, nên tập trung xây dựng bộ tiêu chí thay cho điều cấm. Những tiêu chí này được bổ sung liên tục. Cũng theo ông Hirota, hội đồng duyệt chỉ có thể phân loại phim chứ không phải để cấm.\r\n\r\nNhững kiến nghị để có một cơ chế khác cho duyệt phim đi LHP nước ngoài của các nhà làm phim này gợi lại ý kiến cách đây vài ngày của ông Nguyễn Đắc Vinh, Chủ nhiệm Ủy ban Văn hóa - Giáo dục của Quốc hội, trong phiên họp xem xét thẩm tra dự án luật Điện ảnh sửa đổi hôm 24.9. Theo đó, trong báo cáo thẩm tra dự án luật Điện ảnh sửa đổi, ông Vinh yêu cầu “nghiên cứu, có cơ chế cấp phép đặc thù đối với phim Việt Nam tham gia LHP, giải thưởng, cuộc thi phim, chương trình phim, tuần phim tại nước ngoài”.', 1),
(102, 'Lý Nhã Kỳ đáp trả khi bị nói đăng ảnh gợi cảm để \'', '2021-09-17', 'Với những bình luận kém duyên và thiếu văn minh, Lý Nhã Kỳ sẵn sàng lên tiếng đáp trả cũng như mong ', '', 'Trong thời gian giãn cách, Lý Nhã Kỳ chăm chỉ chia sẻ cuộc sống hằng ngày của bản thân trên mạng xã hội. Nữ diễn viên cũng nhận được nhiều lời khen về nhan sắc ngày càng trẻ trung và vóc dáng quyến rũ. Tuy nhiên, cô vẫn không tránh khỏi việc bị một số antifan mỉa mai bằng các câu từ kém duyên.\r\n\r\nMới đây, một số tài khoản bình luận rằng việc Lý Nhã Kỳ đăng ảnh gợi cảm chỉ nhằm mục đích \"cua trai\". Thay vì phớt lờ, nữ diễn viên Gió nghịch mùa quyết định đáp trả. \"Từ \'cua trai\' không dành cho cuộc đời tôi và trong hạnh phúc của tôi. Tôi biết giá trị của mình và mỗi ngày tôi đang làm cho giá trị mình cao hơn, ý nghĩa hơn bằng sự cố gắng, nỗ lực tạo thêm nhiều thành tựu trong sự nghiệp và đóng góp nhiều hơn cho cộng đồng. Từ nhỏ đến hiện tại tôi chưa phải cua trai vì nó luôn là ở phía ngược lại. Bên cạnh đó tôi nghĩ rằng mây tầng nào sẽ gặp mây tầng đó và tầng mây của tôi không phải cứ đẹp trai thôi là được, mà phải có những phẩm chất của một quý ông\", cô nói.\r\n\r\nMặc dù đã quen với \"sóng gió\" dư luận nhưng Cựu đại sứ Du lịch Việt Nam cũng nhiều lần bất bình với những lời lẽ khiếm nhã của dân mạng. Nữ diễn viên cho biết bản thân thường nhận những bình luận tiêu cực, cho rằng chuyện cô bày tiệc, ăn uống trên mạng xã hội là vô cảm với cộng đồng. Đáp lại, Lý Nhã Kỳ nói: “Thực tế, tôi đã đóng góp rất nhiều trong những năm qua và vẫn đang đóng góp cho cộng đồng. Tôi hiểu rằng xã hội nào cũng luôn có một số ít người không làm từ thiện nhưng luôn dạy người khác phải làm từ thiện. Tôi muốn nói rằng họ đã chọn nhầm người để công kích”.\r\nĐồng thời, Lý Nhã Kỳ cho biết cô không ngần ngại lên tiếng để bảo vệ bản thân trước sự phán xét của “anh hùng bàn phím”. Lãnh sự danh dự của Romania nói: “Tôi tôn trọng ý kiến đa chiều của mọi người. Tuy nhiên, bạn không có quyền vào trang cá nhân của người khác để nhục mạ, chửi bới họ bằng những lời lẽ cay nghiệt nhất. Không việc gì phải chịu đựng người khác chửi rủa, lăng mạ mình cả. Nếu góp ý thật lòng thì mọi người sẽ sử dụng câu từ văn minh mang tính xây dựng để nói. Vì chúng ta cần ứng xử có văn hóa trong một xã hội văn minh và ai cũng cần được tôn trọng, bình đẳng như nhau”.', 2),
(103, 'Phát hiện trang sức cổ xưa nhất thế giới', '2021-09-11', 'MOROCCO - Các nhà khoa học tìm thấy hàng chục mảnh vỏ ốc đục lỗ có niên đại 142.000 - 150.000 năm, n', '', 'Con người đã đeo vòng cổ, vòng tay, khuyên tai và các loại trang sức khác từ thời xa xưa. Tuy nhiên, việc phát hiện hàng chục hạt trang sức làm từ vỏ ốc biển trong hang Bizmoune, miền tây Morocco, cho thấy tập tục này xuất hiện sớm hơn nhiều so với những gì các nhà khoa học từng nghĩ. Nghiên cứu mới xuất bản trên tạp chí Science Advances hôm 22/9.\r\n\r\nNhà nhân chủng học Steven Kuhn tại Đại học Arizona phối hợp với các nhà nghiên cứu từ Viện Di sản và Khoa học Khảo cổ Quốc gia Morocco tiến hành các chuyến khai quật từ năm 2014 - 2018 tại hang Bizmoune và tìm thấy tổng cộng 33 hạt trang sức làm từ vỏ ốc biển. Chúng có niên đại 142.000 - 150.000 năm, là trang sức cổ xưa nhất từng được phát hiện trên thế giới.\r\n\r\nCác mảnh vỏ ốc rộng khoảng hơn 1 cm với lỗ tròn đục ở giữa. Chúng có dấu vết bị mòn bên trong, nghĩa là có thể từng xâu vào vòng cổ hoặc vòng tay và được sử dụng thường xuyên. \"Các hạt trang sức có thể là một cách để người xưa thể hiện danh tính của mình qua trang phục. Chúng cho thấy điều này đã xuất hiện từ hàng trăm nghìn năm trước, và con người quan tâm đến việc giao tiếp với những nhóm lớn hơn là chỉ gia đình và bạn bè thân cận\", Kuhn cho biết.\r\n\r\n33 hạt trang sức trong hang Bizmoune cũng giống với nhiều hạt khác được tìm thấy tại châu Phi, nhưng những mẫu vật trước đó có niên đại không quá 130.000 năm. Toàn bộ số hạt ở Bắc Phi đều thuộc nền văn hóa Aterian. Những di chỉ sớm nhất của nền văn hóa này tồn tại từ 150.000 năm trước và muộn nhất là 20.000 năm trước.\r\n\r\nTrang sức hạt mà người Aterian chế tạo và sử dụng có khả năng là một hình thức giao tiếp không lời, theo Kuhn. Các nhà nhân chủng học không chắc chắn về thời điểm ngôn ngữ xuất hiện, nên có thể người Aterian hoàn toàn dựa vào các phương pháp không lời để chia sẻ thông tin.\r\n\r\nKuhn tin rằng thông điệp hoặc ý nghĩa của hạt trang sức rất quan trọng và trường tồn với thời gian, vì người Aterian lựa chọn tạo ra những vật trang trí có thể tồn tại lâu dài để truyền tải thông điệp đó. Trong khi đó, người tiền sử thường tô điểm cho khuôn mặt và cơ thể bằng than hoặc thổ hoàng cho các mục đích nghi lễ hoặc giao tiếp, nhưng chúng chỉ mang tính tạm thời.\r\n\r\nKuhn cùng đồng nghiệp không rõ chính xác người Aterian muốn truyền tải điều gì với trang sức của mình. Giả thuyết thứ nhất là hạt trang sức đóng vai trò giống như thẻ tên hoặc huy hiệu nhận dạng. Những cá nhân, gia đình, thị tộc hoặc làng xóm khác nhau có thể muốn trở nên dễ phân biệt, nhất là khi số lượng dân cư trong vùng tăng lên cùng với sự phát triển của thời kỳ Đồ Đá.\r\n\r\nGiả thuyết thứ hai, trang sức hạt là một biểu tượng cho địa vị. Tùy thuộc vào thiết kế, các hạt vỏ ốc có thể giúp người có quyền lực về chính trị, xã hội, văn hóa, kinh tế, tâm linh hoặc y học trở nên khác biệt. Một khả năng khác là người Aterian đeo trang sức với cùng lý do như đa số mọi người ngày nay, đó là họ thích kiểu dáng của chúng và tin rằng chúng sẽ tôn lên vẻ ngoài của mình.\r\n\r\nThu Thảo (Theo Ancient Origins)', 3),
(104, 'Tây Ban Nha thua đau ở futsal World Cup', '2021-09-27', 'LITHUANIA - Dẫn trước hai bàn nhưng đội tuyển futsal số một thế giới thua ngược Bồ Đào Nha 2-4 và bị', '', 'Anh1\r\nHai đội tuyển thuộc bán đảo Iberia đều là những cường quốc futsal. Trong khi Tây Ban Nha đứng số một, Bồ Đào Nha đang xếp số sáu. Giữa họ cũng có nhiều ân oán. Tây Ban Nha thắng năm trong sáu cuộc đối đầu gần đây, nhưng Bồ Đào Nha từng vượt qua đối thủ láng giếng ở chung kết Euro 2018.\r\n\r\nĐã quá hiểu nhau nên thế trận hai đội tạo ra khá cân bằng. Tây Ban Nha có cơ hội mở tỷ số ngay những giây đầu tiên nhưng Aldofo Fernandez đệm bóng ra ngoài trước khung thành trống. Cuối hiệp một, họ được hưởng phạt đền 10 mét nhưng không tận dụng thành công. Bồ Đào Nha cầm bóng nhiều hơn, tạo nhiều sóng gió về khung thành đối thủ nhưng đều thất bại ở những pha kết thúc.\r\n\r\n18\r\nThể thaoBóng đáCác giải khácThứ ba, 28/9/2021, 06:34 (GMT+7)\r\nTây Ban Nha thua đau ở futsal World Cup\r\nLITHUANIADẫn trước hai bàn nhưng đội tuyển futsal số một thế giới thua ngược Bồ Đào Nha 2-4 và bị loại khỏi tứ kết futsal World Cup 2021 tối 27/9.\r\n\r\nTây Ban Nha (áo đỏ) dẫn đối thủ 2-0 nhưng lại đánh mất lợi thế và thua ngược. Ảnh: FIFA\r\n\r\nBồ Đào Nha thi đấu kiên cường, để khiến Tây Ban Nha (áo đỏ) nhận trái đắng trong trận tứ kết thứ ba của FIFA futsal World Cup 2021. Ảnh: FIFA\r\n\r\nHai đội tuyển thuộc bán đảo Iberia đều là những cường quốc futsal. Trong khi Tây Ban Nha đứng số một, Bồ Đào Nha đang xếp số sáu. Giữa họ cũng có nhiều ân oán. Tây Ban Nha thắng năm trong sáu cuộc đối đầu gần đây, nhưng Bồ Đào Nha từng vượt qua đối thủ láng giếng ở chung kết Euro 2018.\r\n\r\nĐã quá hiểu nhau nên thế trận hai đội tạo ra khá cân bằng. Tây Ban Nha có cơ hội mở tỷ số ngay những giây đầu tiên nhưng Aldofo Fernandez đệm bóng ra ngoài trước khung thành trống. Cuối hiệp một, họ được hưởng phạt đền 10 mét nhưng không tận dụng thành công. Bồ Đào Nha cầm bóng nhiều hơn, tạo nhiều sóng gió về khung thành đối thủ nhưng đều thất bại ở những pha kết thúc.\r\n\r\nĐầu hiệp hai, Tây Ban Nha vượt lên. Aldofo Fernandez lốp bóng qua đầu thủ thành Bebe để mở tỷ số phút 22. Hai phút sau, từ quả đá phạt chếch khung thành, Adri Martinez sút căng, nhân đôi cách biệt cho đội bóng xứ đấu bò.\r\n\r\nBị đẩy vào thế đường cùng, Bồ Đào Nha vùng lên mạnh mẽ, khiến hàng thủ Tây Ban Nha bộc lộ những sai sót. Phút 31, thủ môn Jesus Herrero bắt không dính để bóng bay vào lưới từ cú sút của Andre, rút ngắn tỷ số xuống 1-2. Phút 36, cầu thủ Tây Ban Nha không kèm người, để Bồ Đào Nha thoải mái phối hợp đá biên trước khi Zicky ghi bàn gỡ hoà 2-2.\r\n\r\nHai đội phải bước vào hai hiệp phụ (mỗi hiệp năm phút). Tây Ban Nha một lần nữa phạm sai lầm, khi fixo Jose Raya phá bóng phản lưới nhà ở phút 43. Sang hiệp phụ thứ hai, Tây Ban Nha phải chơi power-play. Nhưng không những không có bàn gỡ mà còn thua thêm ở phút 48 từ cú sút vào lưới trống của Pany.\r\nAnh2\r\n\r\nTrận tứ kết sau đó có kết cục tương tự. Iran dẫn hai bàn ngay trong hiệp một, nhờ công Moslem Oladghobad và Ahmad Esmaeilpour. Nhưng sang hiệp hai, Kazakhstan quân bình được tỷ số 2-2 từ các pha làm bàn của Tursagulov và Arnold Knaub.\r\n\r\nKhi trận đấu còn hơn một phút, Kazakhstan phối hợp đá phạt góc để Taynan đệm bóng vào góc gần, ấn định chiến thắng 3-2 để giành quyền vào bán kết gặp Bồ Đào Nha.\r\nĐức Đồng', 4),
(105, 'Cách Trung Quốc ngăn tác động của khủng hoảng Ever', '2021-09-28', 'Ở nhiều nước, việc một tập đoàn nợ hơn 300 tỷ USD sụp đổ sẽ gây chấn động cả nền kinh tế, nhưng ở Tr', '', 'Ở nhiều nước, việc một tập đoàn nợ hơn 300 tỷ USD sụp đổ sẽ gây chấn động cả nền kinh tế, nhưng ở Trung Quốc thì chưa chắc.\r\n\r\nThế giới tài chính đang dõi theo cuộc khủng hoảng của Evergrande, nhà phát triển bất động sản mắc nợ nhiều nhất thế giới. Tuần trước, thời hạn thanh toán 83 triệu USD cho các nhà đầu tư nước ngoài đã đến, nhưng không có dấu hiệu cho thấy Evergrande đã đáp ứng các nghĩa vụ của mình. Điều này đặt ra câu hỏi về điều gì sẽ tiếp tục xảy ra.\r\n\r\nTheo nguồn tin giấu tên của New York Times, Chính phủ Trung Quốc vẫn chưa có hành động cụ thể vì họ muốn tình huống ngặt nghèo của Evergrande sẽ cảnh tỉnh các công ty khác về việc phải có kỷ luật tài chính.\r\n\r\nTrung Quốc từng kiểm soát rất tốt các cuộc khủng hoảng tài chính trong quá khứ. Các nhà kinh tế trong và ngoài Trung Quốc đánh giá, vì tin vào các biện pháp bảo vệ của chính quyền, nhiều nhà đầu tư vẫn sẵn sàng đặt cược cho các công ty lớn dù có triển vọng trả nợ kém.\r\n\r\nTuy nhiên, về lâu dài, rủi ro của việc này là Trung Quốc có thể đi theo bước chân của Nhật Bản, nơi đã chứng kiến nhiều năm kinh tế trì trệ dưới gánh nặng của khoản nợ khổng lồ và các công ty hoạt động chậm chạp, kém hiệu quả.\r\n\r\nVì vậy, bằng cách không mạnh mẽ đưa ra tín hiệu về một gói cứu trợ Evergrande, chính phủ về cơ bản đang cố gắng buộc cả nhà đầu tư và các công ty ngừng chuyển tiền cho các công ty rủi ro, mắc nợ nhiều. Tất nhiên, cách tiếp cận đó cũng mang lại rủi ro, đặc biệt nếu sự sụp đổ gây bất an cho người mua nhà và các nhà đầu tư tiềm năng của thị trường bất động sản.\r\n\r\nEswar Prasad, Giáo sư kinh tế tại Đại học Cornell, người từng là trưởng bộ phận Trung Quốc tại IMF cho rằng, việc Evergrande đột ngột vỡ nợ \"sẽ là chất xúc tác hữu ích cho kỷ luật thị trường, nhưng cũng có thể làm ảnh hưởng đến tâm lý nhà đầu tư trong và ngoài nước\".\r\nAnh1\r\n\r\nNhưng cho đến nay, các quan chức Trung Quốc tin rằng họ kiểm soát được tình hình bởi vẫn đang sở hữu một loạt các công cụ đủ mạnh để ngăn một cuộc khủng hoảng tài chính, nếu vấn đề của Evergrande trở nên tồi tệ hơn.\r\n\r\nZhu Ning, Phó hiệu trưởng Viện Tài chính Nâng cao Thượng Hải, cho biết chính phủ \"vẫn sẽ cung cấp sự đảm bảo\" cho nhiều hoạt động của Evergrande, \"nhưng các nhà đầu tư sẽ phải đổ mồ hôi\".\r\n\r\nChủ tịch Trung Quốc Tập Cận Bình khi bắt đầu nhiệm kỳ thứ hai vào năm 2017 đã xác định việc kiềm chế rủi ro tài chính là một trong những \"trận chiến lớn\" của chính quyền. Ông sắp bắt đầu nhiệm kỳ thứ ba vào năm sau nên sẽ không để xảy ra bất kỳ sự tổn hại chính trị nào vì khủng hoảng Evergrande.\r\n\r\nĐầu tiên, Bắc Kinh kiểm soát hệ thống ngân hàng của đất nước ở một mức độ vượt xa các quy định ngân hàng ở phương Tây. Các bên cho vay chính là các công ty thuộc sở hữu nhà nước. Những ngân hàng này ưu tiên chính sách kinh tế của chính phủ hơn lợi nhuận của chính họ. Thay vì yêu cầu trả nợ, các ngân hàng của Trung Quốc đã đàm phán các thỏa thuận riêng với Evergrande trong nhiều tháng.\r\n\r\nViệc kiểm soát các ngân hàng cũng cho phép Bắc Kinh tiếp cận nguồn tiền khổng lồ từ các khoản tiền gửi của đất nước, tạo ra một tấm đệm tài chính đủ dày.\r\n\r\nTrung Quốc cũng kiểm soát chặt chẽ việc chuyển tiền qua biên giới. Các nhà đầu tư Trung Quốc và toàn cầu không thể đột ngột tìm lối thoát nếu họ lo lắng. Những biện pháp kiểm soát đó đã giúp cách ly Trung Quốc khỏi cuộc khủng hoảng tài chính châu Á năm 1997 và 1998 gây thiệt hại nặng nề cho các nền kinh tế khác.\r\n\r\nCác tòa án tại nước này cũng phải cần sự chấp thuận của các nhà lãnh đạo cao nhất mới được đưa ra bất kỳ quyết định buộc Evergrande phá sản và tái cấu trúc nào. Vì vậy, nhà chức trách có thể tránh một đợt bán tháo gấp rút như Lehman’s vào năm 2008. Do đó, sẽ không có cú sốc đối với giá đất, căn hộ và các tài sản chấp khác của Evergrande. Việc sa thải hàng loạt cũng sẽ không diễn ra.\r\n\r\nTheo một nguồn tin am hiểu về hoạt động hoạch định chính sách kinh tế Trung Quốc, giới chức nước này đang tin rằng, với việc tái cơ cấu hợp lý, Evergrande có đủ tài sản để trang trải phần lớn các khoản nợ của mình. Thực tế, họ đã từng bình tĩnh giám sát việc tái cơ cấu Anbang và HNA, hai đế chế nợ nần chồng chất, hay buộc thu hẹp quy mô của Dalian Wanda.\r\n\r\nThứ hai, ảnh hưởng của nhà nước với các công ty lớn còn có thể trợ giúp quá trình đó. Một số công ty xây dựng và bất động sản quốc doanh lớn nhất đất nước có thể tham gia để hoàn thành khoảng 800 khu phức hợp dang dở của Evergrande và thanh toán cho các nhà thầu.\r\n\r\nCác quan chức coi đó là một trong những lợi ích của việc mở rộng khu vực kinh tế nhà nước dưới thời ông Tập. \"Các doanh nghiệp nhà nước sẽ đảm bảo giao các căn hộ để tránh bất ổn xã hội\", ông Zhu nói.\r\n\r\nNgoài ra, song song công cụ tài chính và huy động các công ty quốc doanh, nhà chức trách còn có thể quản lý nhận thức và phản ứng của công chúng. Kể từ khi ngành xây dựng trở thành trụ cột của nền kinh tế Trung Quốc vào những năm 1990, tranh chấp giữa người mua nhà và chủ đầu tư đã dẫn đến các cuộc biểu tình.\r\n\r\nNhững người mua nhà thường mua căn hộ trước khi chúng được xây dựng, đã cố gắng đoàn kết để lên tiếng trước những yếu kém về chất lượng và uy tín của chủ đầu tư. Ví dụ, trong tháng này, hàng trăm người mua nhà ở Cảnh Đức Trấn, một thành phố ở miền nam Trung Quốc, đã tổ chức các cuộc biểu tình vì lo ngại Evergrande sẽ sụp đổ trước khi hoàn tất việc bàn giao quyền sở hữu hợp pháp căn hộ của họ.\r\nAnh2\r\n\r\nNhà chức trách đã nhanh chóng vào cuộc. Sau cuộc biểu tình, chính quyền đăng cảnh báo những người mua nhà có thể bị bắt vì biểu tình. Trong năm nay, các địa phương đã thông báo lực lượng chuyên tránh giám sát những người mua nhà bị hại, các nhà thầu không được thanh toán và thậm chí là các nhân viên bán bất động sản bị sa thải.\r\n\r\n\"Hãy theo dõi nhu cầu để phát hiện, giải tỏa, kiểm soát và xử lý sớm\", chính quyền huyện Linh Sơn (Vô Tích, Giang Tô) nêu trong một chỉ thị về các cuộc biểu tình đầu năm nay. \"Người đứng đầu các công ty phát triển bất động sản phải đích thân giải quyết các kiến nghị và duy trì sự ổn định\", chỉ thị nêu.\r\n\r\nMinxin Pei, giáo sư chính phủ tại Claremont McKenna College, đánh giá việc kiểm soát người mua nhà biểu tình có thể dập tắt bất ổn. Nhưng để khôi phục niềm tin bị xói mòn thì khó hơn. \"Không thể kiềm chế tác động kinh tế bằng một cuộc phô trương lực lượng an ninh, bởi vì tác động ảnh hưởng ở mặt niềm tin của người tiêu dùng và các quyết định ở cấp vi mô của hàng triệu doanh nghiệp. Đó là một thách thức khó khăn hơn nhiều, đòi hỏi các phản ứng chính sách kinh tế phù hợp\", ông nói.', 5);

-- --------------------------------------------------------

--
-- Table structure for table `chitiettheloai`
--

CREATE TABLE `chitiettheloai` (
  `ID_CTTheLoai` int(11) NOT NULL,
  `TenCTTheLoai` varchar(50) NOT NULL,
  `ID_TheLoai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chitiettheloai`
--

INSERT INTO `chitiettheloai` (`ID_CTTheLoai`, `TenCTTheLoai`, `ID_TheLoai`) VALUES
(1, 'Văn hoá', 11),
(2, 'Giải trí', 22),
(3, 'Khoa học', 33),
(4, 'Thể thao', 44),
(5, 'Kinh doanh', 55);

-- --------------------------------------------------------

--
-- Table structure for table `theloai`
--

CREATE TABLE `theloai` (
  `ID_TheLoai` int(11) NOT NULL,
  `TenTheLoai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `theloai`
--

INSERT INTO `theloai` (`ID_TheLoai`, `TenTheLoai`) VALUES
(11, 'VH'),
(22, 'GT'),
(33, 'KH'),
(44, 'TT'),
(55, 'KD');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baiviet`
--
ALTER TABLE `baiviet`
  ADD PRIMARY KEY (`ID_BaiViet`),
  ADD KEY `FK_CTTheLoai` (`ID_CTTheLoai`);

--
-- Indexes for table `chitiettheloai`
--
ALTER TABLE `chitiettheloai`
  ADD PRIMARY KEY (`ID_CTTheLoai`),
  ADD KEY `FK_TheLoai` (`ID_TheLoai`);

--
-- Indexes for table `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`ID_TheLoai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baiviet`
--
ALTER TABLE `baiviet`
  MODIFY `ID_BaiViet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `chitiettheloai`
--
ALTER TABLE `chitiettheloai`
  MODIFY `ID_CTTheLoai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `theloai`
--
ALTER TABLE `theloai`
  MODIFY `ID_TheLoai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `baiviet`
--
ALTER TABLE `baiviet`
  ADD CONSTRAINT `FK_CTTheLoai` FOREIGN KEY (`ID_CTTheLoai`) REFERENCES `chitiettheloai` (`ID_CTTheLoai`);

--
-- Constraints for table `chitiettheloai`
--
ALTER TABLE `chitiettheloai`
  ADD CONSTRAINT `FK_TheLoai` FOREIGN KEY (`ID_TheLoai`) REFERENCES `theloai` (`ID_TheLoai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
