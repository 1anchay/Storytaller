
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import { defineConfig } from 'vite';

export default defineConfig({
  esbuild: {
    loader: {
      '.js': 'jsx' // Указываем, что файлы .js следует обрабатывать как JSX
    }
  }
});
