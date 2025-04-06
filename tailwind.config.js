/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './resources/**/*.{blade.php,js,jsx,ts,tsx,vue}',
  ],
  theme: {
    extend: {
      animation: {
        breathe: 'breathe 2s ease-in-out infinite', // анимация дыхания
        fadeIn: 'fadeIn 2s ease-in-out', // анимация появления
      },
      keyframes: {
        breathe: {
          '0%': {
            transform: 'scale(1)', // начальный размер
            opacity: '1', // начальная видимость
          },
          '50%': {
            transform: 'scale(1.1)', // увеличение размера
            opacity: '0.8', // уменьшение видимости
          },
          '100%': {
            transform: 'scale(1)', // исходный размер
            opacity: '1', // восстанавливается видимость
          },
        },
        fadeIn: {
          '0%': { opacity: '0' }, // начало с прозрачности
          '100%': { opacity: '1' }, // конец с полной видимостью
        },
      },
    },
  },
  plugins: [],
};
