import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: {
        host: '127.0.0.1', // Bind to localhost
        port: 5173, // Default Vite dev server port
        strictPort: true,
        cors: true, // Enable CORS
        hmr: {
            host: 'webshop.test', // Use your Laravel Herd domain
            protocol: 'http', // Match the protocol used in Herd
        },
    }
});
