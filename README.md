# webtintuc_PHP_nhom15
Thiết kế website đọc báo bằng PHP, mySQL

Sử dụng mô hình MVC version 2

24/10/2021  

-----------PHUONG---------------
Công việc đã làm:  
    + Thêm file config tại core > config vì phần URL dùng chung mà ở mỗi máy lại có đường dẫn khác nhau download code về thay đổi là chạy đc  
    + Xây dựng trang chủ và fill data vào  
    + Chia lại cấu trúc thư mục (chia header, footer file css, js custom riêng ra)  
    + Đặt lại tên một số hàm trong file core > Model  
    + Thay đổi cấu trúc bảng trong csdl (thêm bảng LoaiTin - kèm column tương ứng ở bảng khác dùng nó - equal khóa ngoại)  
    + Xây dựng trang chi tiết  
    + Join bảng để fill dữ liệu nốt những trường cần tới
    + Xây dựng trang danh mục (xem danh sách các bài viết thuộc một danh mục nào đó)  
    + Login Form
        + Xây dựng trang login, register (fe)
        + Thêm xử logic show/hide login, register (fe)
        + Thêm xử lý login - be (1/3)
        + Thêm xử lý signIn - be (2/3)
        + Thêm xử lý logout
        + Thêm xử lý signIn - be (100%)
        + Thêm mã hóa mật khẩu cho account
        + Thêm phần xử lý đăng ký trùng tên tài khoản
        + Thêm xử validate fe cho register
        + Done!
    + Chỉnh sửa lại câu query select *, review lại 1 số page thiếu link
    + Thêm phần phân trang cho trang danh mục
    + Thêm phần tìm kiếm bài viết (1/2 - chưa làm phân trang cho tìm kiếm)
    + Thanh navigation (1/5) - chuyển đổi query sang bảng thể loại thay vì chi tiết thể loại
Công việc cần làm:  
    + Thêm phần tìm kiếm bài viết (hoàn thiện nốt phân trang)
    + Thêm phần comments các bài viết 
    + Thêm trang xem thông tin user, đổi password
Vướng mắc:  
    + Có dùng khóa ngoại k?  
-----------HAI------------
Công việc đã làm: 
    +Đọc code của phần client, chỉnh sửa lại cấu trúc của project và ghép code phần client vào nhánh hai-dev  
    +Thêm hai column slug and type vào trong bảng chitiettheloai  
    +Thêm class Redirect vào phần core, cho ra thông báo khi thêm danh mục bài viết thành công 
    +Tốn mấy tiếng fix session_start();
        category: danh mục cha
        subcategory: danh mục con  
Công việc cần làm:  
    +Hoàn thiện phần danh mục
    +Hoàn thiện phần bài viết
    +Thêm phần xử lý loại tin
**Note: 
Những method có thể tái sử dụng được để trong core/Model  
slug: dùng để thêm vào phía sau url ví dụ: http://localhost/CNPM/webtintuc_PHP_nhom15/kinh-doanh
type: chưa rõ dùng để làm gì

Thầy góp ý:
    Làm đầy đủ:
        phần navigation
        các phần chưa được convert sang tiếng việt
        Thêm chút cho phần chi tiết bài viết
    Phần chức năng thêm:
        Liên kết với bảng login -> show ra tên tác giả
        Thêm phần comments, likes