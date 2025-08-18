<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User Dashboard') }}
        </h2>
    </x-slot>

    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
            🎥 Match en direct
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto space-y-6 text-center text-white">
            <h3 class="text-2xl font-bold" id="teamsDisplay">Équipe A vs Équipe B</h3>

            <p class="text-lg">⏱️ Temps restant : <span id="userTimer">--:--</span></p>
            <p class="text-lg">🟦 Quart-temps : <span id="userQuarter">--</span></p>

            <div class="grid grid-cols-2 gap-6 mt-6">
                <div>
                    <h4 class="text-xl font-semibold text-indigo-400" id="userTeamA">Équipe A</h4>
                    <p>Score : <span id="userScoreA">0</span></p>
                    <p>Fautes : <span id="userFoulsA">0</span></p>
                </div>
                <div>
                    <h4 class="text-xl font-semibold text-indigo-400" id="userTeamB">Équipe B</h4>
                    <p>Score : <span id="userScoreB">0</span></p>
                    <p>Fautes : <span id="userFoulsB">0</span></p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
