function del(id) {
    let control = $("#del" + id).attr("data-control");
    Swal.fire({
        title: 'Bạn có chắc chắn muốn xóa?',
        text: "Bạn sẽ không thể hoàn tác!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Có, hãy xóa đi!',
        cancelButtonText: 'Hủy bỏ'
    }).then((result) => {
        if (result.isConfirmed) {
            // Swal.fire(
            //     'Đã xóa!',
            //     'Xóa thành công danh mục.',
            //     'success')
            $.ajax({
                url: control + "/delete",
                method: "post",
                data: { id: id },
                success: function (response) {
                    
                }
            });
        }
    })
}