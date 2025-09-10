import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite'

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'],
            refresh: true,
        }),
        tailwindcss(),
    ],
    css: {
        preprocessorOptions: {
            scss: {
                quietDeps: true,  // Suppresses deprecation warnings from dependencies
                silenceDeprecations: ['legacy-js-api', 'global-builtin', 'color-functions', 'import'],  // Corrected identifier
            },
        },
    },
});
