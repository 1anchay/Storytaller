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
            refresh: [
                'resources/views/**',
                'routes/**',
            ],
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
    
    // Настройки для Render.com
    base: '/build/',  // Критически важно для корректных путей
    publicDir: 'public',
    
    resolve: {
        alias: {
            vue: 'vue/dist/vue.esm-bundler.js',
            '@': '/resources/js',  // Добавлен алиас для удобства
        },
    },
    
    // Оптимизация сборки
    build: {
        manifest: true,
        outDir: 'public/build',
        emptyOutDir: true,
        rollupOptions: {
            output: {
                entryFileNames: `[name].[hash].js`,
                chunkFileNames: `[name].[hash].js`,
                assetFileNames: `[name].[hash].[ext]`,
            },
        },
    },
    
    // Настройки сервера разработки (не используются на Render)
    server: {
        hmr: {
            host: 'localhost',
        },
        watch: {
            usePolling: true,
        },
    },
});