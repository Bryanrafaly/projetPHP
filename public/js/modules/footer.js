export function initFooterTicker() {
    const ticker = document.querySelector('.footer-ticker');
    if (!ticker) return;

    const items = Array.from(ticker.querySelectorAll('.ticker-item'));
    let currentIndex = 0;

    function showNextItem() {
        items.forEach((item, index) => {
            item.style.transform = 'translateY(100%)';
        });

        items[currentIndex].style.transform = 'translateY(0)';

        currentIndex = (currentIndex + 1) % items.length;

        setTimeout(showNextItem, 2000);
    }

    items.forEach(item => {
        item.style.transition = 'transform 1s ease';
        item.style.transform = 'translateY(100%)';
    });

    showNextItem();
}
