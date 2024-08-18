function hidePreloader() {
    const preloader = document.getElementById('preloader');
    preloader.style.display = 'none';
}

const animation = lottie.loadAnimation({
    container: document.getElementById('preloader'),
    renderer: 'svg',
    loop: true,
    autoplay: true,
    animationData: animationData, 
});

animation.addEventListener('DOMLoaded', hidePreloader);