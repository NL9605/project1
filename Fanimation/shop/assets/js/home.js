document.addEventListener('DOMContentLoaded', () => {
    const slides = document.querySelectorAll('.list-image .slide'); // Chọn tất cả các slide
    const btnRight = document.querySelector('.btns-right');
    const btnLeft = document.querySelector('.btns-left');
    const indicators = document.querySelectorAll('.index-item');
    let current = 0;

    // Hàm thay đổi slide
    const handleChangeSlide = (next = true) => {
        // Ẩn slide hiện tại
        slides[current].classList.remove('active');
        indicators[current].classList.remove('active');

        // Chuyển slide
        if (next) {
            current = (current === slides.length - 1) ? 0 : current + 1; // Chuyển sang slide tiếp theo
        } else {
            current = (current === 0) ? slides.length - 1 : current - 1; // Quay về slide trước
        }

        // Hiển thị slide mới
        slides[current].classList.add('active');
        indicators[current].classList.add('active');
    };

    // Thiết lập auto chuyển slide sau 4 giây
    let interval = setInterval(() => handleChangeSlide(true), 4000);

    // Nút bấm bên phải
    btnRight.addEventListener('click', () => {
        clearInterval(interval); // Dừng auto chuyển slide
        handleChangeSlide(true); // Chuyển tới slide tiếp theo
        interval = setInterval(() => handleChangeSlide(true), 4000); // Khởi động lại auto chuyển slide
    });

    // Nút bấm bên trái
    btnLeft.addEventListener('click', () => {
        clearInterval(interval); // Dừng auto chuyển slide
        handleChangeSlide(false); // Quay về slide trước
        interval = setInterval(() => handleChangeSlide(true), 4000); // Khởi động lại auto chuyển slide
    });
});
