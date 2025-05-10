import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',  // добавь сюда другие файлы, если нужно
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
            vue: 'vue/dist/vue.esm-bundler.js',  // используешь сборку vue для разработки
        },
    },
    server: {
        proxy: {
            // Прокси для Laravel API, если используется на другом порту
            '/app': 'http://localhost',
        },
    },
});
