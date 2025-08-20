<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Table de Marque') }}
        </h2>
    </x-slot>

    <!-- Table de marque -->
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Selection des equipes -->
            <div id="matchSetup" class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Sélection des équipes</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="teamA" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Équipe A</label>
                        <select id="teamA" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white">
                            <option value="">-- Choisir Équipe A --</option>
                            @foreach($teams as $team)
                                <option value="{{ $team->id }}">{{ $team->team_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="teamB" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Équipe B</label>
                        <select id="teamB" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white">
                            <option value="">-- Choisir Équipe B --</option>
                            @foreach($teams as $team)
                                <option value="{{ $team->id }}">{{ $team->team_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mt-4">
                    <button id="startMatchBtn" onclick="startMatch()" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 disabled:opacity-50">
                        Lancer le match
                    </button>
                </div>
            </div>

            <!-- Horloge et Quart-temps -->
            <div id="matchControls" class="text-center mt-8 space-y-4 hidden">
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    ⏱️ Temps restant : <span id="matchTimer">01:00</span>
                    &nbsp;|&nbsp; 🟦 Quart-temps : <span id="quarter">1</span>
                </h3>
                <div class="text-center mt-4 space-x-4">
                    <button onclick="startTimer()" id="startBtn" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                        ▶️ Démarrer le chrono
                    </button>
                    <button onclick="stopTimer()" id="stopBtn" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                        ⏸️ Stopper le chrono
                    </button>
                    <button onclick="nextQuarter()" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        ⏭️ Quart suivant
                    </button>
                </div>
            </div>

            <!-- Scoreboard -->
            <div id="scoreboard" class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 hidden">
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Score en direct</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-center">
                    <div>
                        <h4 id="labelA" class="text-xl font-semibold text-indigo-600 dark:text-indigo-400">Équipe A</h4>
                        <p class="text-lg">Score : <span id="scoreA">0</span></p>
                        <button onclick="addPoint('A')" class="mt-2 px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">+1 Point</button>
                        <button onclick="addFoul('A')" class="mt-2 px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">+1 Faute</button>
                        <button onclick="removePoint('A')" class="mt-2 px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">−1 Point</button>
                    </div>
                    <div>
                        <h4 id="labelB" class="text-xl font-semibold text-indigo-600 dark:text-indigo-400">Équipe B</h4>
                        <p class="text-lg">Score : <span id="scoreB">0</span></p>
                        <button onclick="addPoint('B')" class="mt-2 px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">+1 Point</button>
                        <button onclick="addFoul('B')" class="mt-2 px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">+1 Faute</button>
                        <button onclick="removePoint('B')" class="mt-2 px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">−1 Point</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>