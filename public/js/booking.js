document.addEventListener('DOMContentLoaded', function () {
    const bookingButton = document.querySelector('.btn-booking');
    const popup = document.getElementById('bookingPopup');
    const cancelButton = document.querySelector('.btn-cancel');
    const bookingForm = document.getElementById('bookingForm');

    // Hiển thị popup khi nhấn nút Đặt phòng
    bookingButton.addEventListener('click', function () {
        popup.style.display = 'flex';
    });

    // Đóng popup khi nhấn nút Hủy
    cancelButton.addEventListener('click', function () {
        popup.style.display = 'none';
    });

    // Xử lý form Đặt phòng
    bookingForm.addEventListener('submit', function (e) {
        e.preventDefault();
        const fileInput = document.getElementById('depositImage');
        if (fileInput.files.length > 0) {
            alert('Bạn đã gửi yêu cầu đặt phòng thành công!');
            popup.style.display = 'none';
        } else {
            alert('Vui lòng chọn hình ảnh đặt cọc!');
        }
    });
});
