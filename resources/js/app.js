//
import.meta.glob([
    '../images/**',
], { eager: true });

// Remove or comment out the bootstrap line below:
// import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

