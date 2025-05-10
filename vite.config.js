import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    resolve: {
        alias: {
            vue: 'vue/dist/vue.esm-bundler.js',
        },
    },
    server: {
        host: '0.0.0.0',  // Важно для Render
        port: process.env.PORT || 5173,  // Используем порт из переменной окружения
        strictPort: true,
        proxy: {
            '/': {
                target: `http://localhost:${process.env.PORT || 8000}`,
                changeOrigin: true,
                secure: false,
            },
        },
    },
    build: {
        manifest: true,
        outDir: 'public/build',
        emptyOutDir: true,
    },
});