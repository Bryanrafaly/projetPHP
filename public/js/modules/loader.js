export function initLoader() {
    const loader = document.getElementById('page-loader');

    window.addEventListener('load', () => {
        loader.classList.add('hidden');
    });
}
