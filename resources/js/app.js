require('intersection-observer');
IntersectionObserver.prototype.POLL_INTERVAL = 100;

import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
