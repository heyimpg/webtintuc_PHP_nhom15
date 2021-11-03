# webtintuc_PHP_nhom15
Thiết kế website đọc báo bằng PHP, mySQL

Sử dụng mô hình MVC version 2

24/10/2021
Công việc đã làm:
    + Thêm file config tại core > config vì phần URL dùng chung mà ở mỗi máy lại có đường dẫn khác nhau download code về thay đổi là chạy đc
    + Xây dựng trang chủ và fill data vào
    + Chia lại cấu trúc thư mục (chia header, footer file css, js custom riêng ra)
    + Đặt lại tên một số hàm trong file core > Model
    + Thay đổi cấu trúc bảng trong csdl (thêm bảng LoaiTin - kèm column tương ứng ở bảng khác dùng nó - equal khóa ngoại)
    + Xây dựng trang chi tiết
    + Join bảng để fill dữ liệu nốt những trường cần tới
    + Xây dựng trang danh mục (xem danh sách các bài viết thuộc một danh mục nào đó)
    + Xây dựng trang login, register (fe)
    + Thêm xử logic show/hide login, register (fe)
    + Thêm xử lý login - be (1/3)
Công việc cần làm:
    + Xây dựng cấu trúc bên Admin (Định dạng lại cả cấu trúc thư mục như bên client)
    + Xây dựng trang login, register (be)
    + Thêm phần comments các bài viết
Vướng mắc:
    + Có dùng khóa ngoại k?
