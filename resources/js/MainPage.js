import React from 'react';
import { CubeIcon, GiftIcon, FireIcon } from '@heroicons/react/24/outline';

function MainPage() {
    return (
        <main className="px-6 py-16 text-center">
            <h2 className="text-4xl font-extrabold mb-4">Открывай кейсы. Выигрывай призы.</h2>
            <p className="text-gray-400 mb-10 max-w-xl mx-auto">
                Уникальные Steam-ключи, аккаунты Minecraft и многое другое! Всё честно и прозрачно. Шанс на топ-дроп у каждого.
            </p>

            {/* Кейсы */}
            <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
                <CaseCard
                    icon={<CubeIcon className="h-10 w-10 text-blue-400" />}
                    title="Steam Key Case"
                    desc="Случайный ключ от игры в Steam. От инди до AAA."
                    price="99₽"
                />
                <CaseCard
                    icon={<GiftIcon className="h-10 w-10 text-green-400" />}
                    title="Minecraft Premium"
                    desc="Аккаунт Minecraft с лицензией. Можно сменить ник."
                    price="199₽"
                />
                <CaseCard
                    icon={<FireIcon className="h-10 w-10 text-red-400" />}
                    title="🔥 Super Drop"
                    desc="Шанс на выпадение сразу нескольких призов!"
                    price="249₽"
                />
            </div>

            {/* Кнопка */}
            <button className="mt-12 px-8 py-4 bg-yellow-400 text-black rounded-lg font-semibold hover:bg-yellow-300 transition">
                Крутить кейс
            </button>
        </main>
    );
}

function CaseCard({ icon, title, desc, price }) {
    return (
        <div className="bg-gray-800 rounded-xl p-6 shadow-lg hover:shadow-yellow-500/20 transition-all duration-200">
            <div className="flex justify-center mb-4">{icon}</div>
            <h3 className="text-xl font-bold mb-2">{title}</h3>
            <p className="text-gray-400 text-sm mb-4">{desc}</p>
            <div className="text-yellow-400 font-semibold">{price}</div>
        </div>
    );
}

export default MainPage;
