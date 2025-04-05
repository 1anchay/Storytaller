import { defineConfig } from 'vite';
import react from '@vitejs/plugin-react'; // подключаем плагин для React
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
  plugins: [
    react(), // добавляем плагин для React
    laravel({
      input: [
        'resources/js/app.jsx', // изменили расширение на .jsx
        'resources/css/app.css',
      ],
      refresh: true,
    }),
  ],
  resolve: {
    alias: {
      '@': path.resolve(__dirname, 'resources/js'),
    },
  },
});
