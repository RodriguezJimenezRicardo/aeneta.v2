import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.scss','resources/css/FAQ.css',
                    'resources/css/custom.css',
                    'resources/css/fontawesome.css',
                    'resources/css/fontawesome.min.css',
                    'resources/css/slick-theme.css',
                    'resources/css/slick-theme.min.css',
                    'resources/css/templatemo.css',
                    'resources/css/templatemo.min.css',
                    'resources/css/perfil.css',
                    'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
