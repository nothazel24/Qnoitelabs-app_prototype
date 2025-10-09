import AOS from 'aos';
import 'aos/dist/aos.css';

const fadeRight = document.querySelectorAll('.box-animated-right');
const fadeLeft = document.querySelectorAll('.box-animated.left');
const fadeDown = document.querySelectorAll('.box-animated-down');
const fadeUp = document.querySelectorAll('.box-animated-up');

// ON-SCROLL ANIMATION
fadeRight.forEach((box, i) => {
    box.dataset.aos = 'fade-right';
    box.dataset.aosDelay = i * 70;
    box.dataset.aosOffset = 350;
});

fadeLeft.forEach((box, i) => {
    box.dataset.aos = 'fade-left';
    box.dataset.aosDelay = i * 70;
    box.dataset.aosOffset = 350;
})

fadeDown.forEach((box, i) => {
    box.dataset.aos = 'fade-down';
    box.dataset.aosDelay = i * 150;
    box.dataset.aosOffset = 150;
    box.dataset.aosAnchorPlacement = 'top-bottom';
});

fadeUp.forEach((box, i) => {
    box.dataset.aos = 'fade-up';
    box.dataset.aosDelay = i * 100;
    box.dataset.aosOffset = 150;
    box.dataset.aosAnchorPlacement = 'center-bottom';
});

AOS.init({
    once: true,
    duration: 800,
});