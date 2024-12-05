// Xử lý sao được chọn
let stars = document.querySelectorAll('.star');
let selectedStars = 0;

stars.forEach(star => {
    star.addEventListener('click', function () {
        selectedStars = parseInt(star.getAttribute('data-value')); // Lấy giá trị sao được chọn
        updateStars();
    });
});

// Cập nhật màu sắc sao sau khi người dùng chọn
function updateStars() {
    stars.forEach(star => {
        if (parseInt(star.getAttribute('data-value')) <= selectedStars) {
            star.classList.add('selected'); // Thêm class để tô màu vàng
        } else {
            star.classList.remove('selected'); // Loại bỏ màu vàng
        }
    });
}

// Xử lý gửi đánh giá
function submitReview() {
    let reviewContent = document.getElementById('review').value;

    if (selectedStars === 0) {
        alert('Vui lòng chọn số sao.');
        return;
    }

    if (reviewContent.trim() === '') {
        alert('Vui lòng nhập nội dung đánh giá.');
        return;
    }

    // Xử lý gửi dữ liệu (ví dụ: gửi đến server)
    console.log('Đánh giá đã gửi:');
    console.log('Số sao: ' + selectedStars);
    console.log('Nội dung: ' + reviewContent);

    // Hiển thị thông báo thành công hoặc gửi dữ liệu đi
    alert('Cảm ơn bạn đã gửi đánh giá!');

    // Reset form (Tùy chọn)
    resetForm();
}

// Reset form sau khi gửi
function resetForm() {
    selectedStars = 0;
    document.getElementById('review').value = '';
    updateStars();
}
