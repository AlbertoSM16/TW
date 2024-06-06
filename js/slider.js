document.addEventListener('DOMContentLoaded', () => {
    const slider = document.getElementById('slider');
    const slides = slider.querySelector('.slider-items');
    const prevButton = document.getElementById('prev');
    const nextButton = document.getElementById('next');

    let currentIndex = 0;

    function showSlide(index) {
        const slideWidth = slider.clientWidth;
        slides.style.transform = `translateX(-${index * slideWidth}px)`;
    }

    prevButton.addEventListener('click', () => {
        currentIndex = (currentIndex === 0) ? slides.children.length - 1 : currentIndex - 1;
        showSlide(currentIndex);
    });

    nextButton.addEventListener('click', () => {
        currentIndex = (currentIndex === slides.children.length - 1) ? 0 : currentIndex + 1;
        showSlide(currentIndex);
    });

    setInterval(() => {
        nextButton.click();
    }, 5000);

    window.addEventListener('resize', () => {
        showSlide(currentIndex);
    });
});