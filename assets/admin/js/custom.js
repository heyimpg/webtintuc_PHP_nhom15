function del(elementID, id) {
    let control = $("#" + elementID).attr("data-control");
    Swal.fire({
        title: 'Bạn có chắc chắn muốn xóa?',
        text: "Bạn sẽ không thể hoàn tác!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Đồng ý',
        cancelButtonText: 'Hủy bỏ'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: control + "/delete",
                method: "post",
                data: { id: id, elementID: elementID },
                dataType: 'json',
                success: function (response) {
                    if (response.result === true) {
                        Swal.fire(
                            'Đã xóa!',
                            'Xóa thành công danh mục.',
                            'success');
                        $('.even' + id).remove();
                    }
                }
            });
        }
    })
}