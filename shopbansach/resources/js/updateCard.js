function addTruyen() {
    $.ajax({
        // Các thông số khác của yêu cầu AJAX
        success: function(data) {
            // Khi thêm truyện thành công, gọi hàm updateCard()
            updateCard();
        }
    });
}

function editTruyen() {
    $.ajax({
        // Các thông số khác của yêu cầu AJAX
        success: function(data) {
            // Khi sửa truyện thành công, gọi hàm updateCard()
            updateCard();
        }
    });
}

function deleteTruyen() {
    $.ajax({
        // Các thông số khác của yêu cầu AJAX
        success: function(data) {
            // Khi xóa truyện thành công, gọi hàm updateCard()
            updateCard();
        }
    });
}
