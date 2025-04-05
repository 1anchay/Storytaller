import React from 'react';
import ReactDOM from 'react-dom';
import Header from './Header';  // Убедитесь, что путь правильный
import MainPage from './MainPage';  // Убедитесь, что путь правильный

// Монтируем компоненты Header и MainPage на страницу
ReactDOM.render(
    <React.StrictMode>
        <div>
            <Header />
            <MainPage />
        </div>
    </React.StrictMode>,
    document.getElementById('app') // Монтируем в элемент с id 'app' в Blade-шаблоне
);
