import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    
    // Bagian server yang penting untuk Docker
    server: {
        host: '0.0.0.0', // Mengizinkan akses dari host manapun
        port: 5173,
        hmr: {
            host: 'localhost',
            port: 5173,
        },
        watch: {
            usePolling: true,
        },
    },
});