import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

//  Variables globales
let currentQuarter = 1;
const totalQuarters = 4;
const quarterDuration = 60; // 1 min pour test
let timeRemaining = quarterDuration;
let timerInterval;
let isRunning = false;


//  Démarrer le match
window.startMatch = function () {
    const teamASelect = document.getElementById('teamA');
    const teamBSelect = document.getElementById('teamB');

    const teamAId = teamASelect.value;
    const teamBId = teamBSelect.value;

    

    const teamAName = teamASelect.options[teamASelect.selectedIndex].text;
    const teamBName = teamBSelect.options[teamBSelect.selectedIndex].text;

    document.getElementById('labelA').textContent = teamAName;
    document.getElementById('labelB').textContent = teamBName;

    alert("🏀 Match lancé !");
    currentQuarter = 1;
    timeRemaining = quarterDuration;
    updateTimerDisplay();
    startQuarter();
};


//  Démarrer un quart-temps
function startQuarter() {
    isRunning = true;
    timerInterval = setInterval(() => {
        if (timeRemaining > 0) {
            timeRemaining--;
            updateTimerDisplay();
        } else {
            clearInterval(timerInterval);
            isRunning = false;
            alert(`⏰ Fin du quart-temps ${currentQuarter} !`);

            if (currentQuarter < totalQuarters) {
                currentQuarter++;
                timeRemaining = quarterDuration;
                updateTimerDisplay();
                startQuarter();
            } else {
                endMatch();
            }
        }
    }, 1000);
}

//  Stopper le chrono
window.stopTimer = function () {
    clearInterval(timerInterval);
    isRunning = false;
};

//  Démarrer  le chrono
window.startTimer = function () {
    if (!isRunning) {
        startQuarter();
    }
};

//  Passer au quart suivant 
window.nextQuarter = function () {
    stopTimer();
    if (currentQuarter < totalQuarters) {
        currentQuarter++;
        timeRemaining = quarterDuration;
        updateTimerDisplay();
    } else {
        endMatch();
    }
};

//  Mise a jour de l'affichage
function updateTimerDisplay() {
    const min = String(Math.floor(timeRemaining / 60)).padStart(2, '0');
    const sec = String(timeRemaining % 60).padStart(2, '0');
    document.getElementById('matchTimer').textContent = `${min}:${sec}`;
    document.getElementById('quarter').textContent = currentQuarter;
}

//  Ajouter un point
window.addPoint = function (team) {
    const scoreEl = document.getElementById(`score${team}`);
    scoreEl.textContent = parseInt(scoreEl.textContent) + 1;
};

//  Retirer un point
window.removePoint = function (team) {
    const scoreEl = document.getElementById(`score${team}`);
    const currentScore = parseInt(scoreEl.textContent);
    if (currentScore > 0) {
        scoreEl.textContent = currentScore - 1;
    } else {
        alert("⚠️ Le score ne peut pas être négatif !");
    }
};

//  Ajouter une faute
window.addFoul = function (team) {
    alert(`Faute ajoutée pour l'équipe ${team}`);
};

//  Fin du match
function endMatch() {
    alert("✅ Match terminé !");
    document.getElementById('startMatchBtn').disabled = true;

    // Affiche le résumé si tu as une section dédiée
    const dashboard = document.getElementById('dashboard');
    if (dashboard) {
        document.getElementById('finalScoreA').textContent = document.getElementById('scoreA').textContent;
        document.getElementById('finalScoreB').textContent = document.getElementById('scoreB').textContent;
        dashboard.style.display = 'block';
    }
}
