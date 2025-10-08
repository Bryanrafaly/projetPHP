import { initNavbar } from './modules/navbar.js';
import { initTables } from './modules/tables.js';
import { initForms } from './modules/forms.js';
import { initFooterTicker } from './modules/footer.js';
import { initLoader } from './modules/loader.js';

document.addEventListener('DOMContentLoaded', () => {
    initNavbar();
    initTables();
    initForms();
    initFooterTicker();
    initLoader();
});
