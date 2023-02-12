import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/css/app.css',
                'resources/css/cards.css',
                'resources/css/dashboard.css',
                'resources/css/welcome.css',
                'resources/css/preview.css',
                'resources/js/app.js',
                'resources/js/welcome.js',
                'resources/js/accesses.js',
                'resources/js/selectOptions.js',
                'resources/js/tableHours.js',
                'resources/js/nav.js',
                'resources/js/mibian.js',
            ],
            refresh: true,
        }),
    ],
});
