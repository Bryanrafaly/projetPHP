export function initNavbar() {
    const navMenu = document.querySelector('.nav-menu');
    const navbar = document.querySelector('.navbar nav');

    const burgerBtn = document.createElement('button');
    burgerBtn.classList.add('burger-btn');
    burgerBtn.innerHTML = '☰';
    navbar.insertBefore(burgerBtn, navMenu);

    function checkWidth() {
        if (window.innerWidth <= 768) {
            navMenu.style.display = 'none';
        } else {
            navMenu.style.display = 'flex';
            navMenu.style.flexDirection = 'row';
        }
    }
    checkWidth();
    window.addEventListener('resize', checkWidth);

    burgerBtn.addEventListener('click', () => {
        navMenu.style.display = navMenu.style.display === 'none' ? 'flex' : 'none';
        navMenu.style.flexDirection = 'column';
    });

    document.querySelectorAll('.has-submenu').forEach(parent => {
        const link = parent.querySelector('a');
        link.addEventListener('click', e => {
            if (window.innerWidth <= 768) {
                e.preventDefault();
                const submenu = parent.querySelector('.submenu');
                submenu.style.display = submenu.style.display === 'block' ? 'none' : 'block';
            }
        });
    });
}
