let translateTimeout;
const loader = document.getElementById('loader');

// Функция для обновления информации о использовании
async function updateUsageInfo() {
    try {
        const usageInfo = await window.api.getUsageInfo();
        document.getElementById('tokenInfo').textContent = `Токены: ${usageInfo.characterCount}/${usageInfo.characterLimit}`;
    } catch (error) {
        console.error('Error fetching usage info:', error);
    }
}

// Функция перевода
async function translateText() {
    const sourceText = document.getElementById('sourceText').value;
    if (!sourceText.trim()) {
        document.getElementById('translatedText').value = '';
        return;
    }

    const fromLang = document.querySelector('input[name="fromLang"]:checked').value;
    const toLang = document.querySelector('input[name="toLang"]:checked').value;
    
    try {
        loader.style.display = 'block';
        
        const translatedText = await window.api.translate({
            text: sourceText,
            fromLang,
            toLang
        });
        document.getElementById('translatedText').value = translatedText;

        // Обновляем информацию о использовании после перевода
        await updateUsageInfo();
    } catch (error) {
        document.getElementById('translatedText').value = `Error: ${error.message}`;
        console.error('Translation failed:', error);
    } finally {
        loader.style.display = 'none';
    }
}

// Обработчик ввода текста с задержкой
document.getElementById('sourceText').addEventListener('input', (e) => {
    clearTimeout(translateTimeout);
    translateTimeout = setTimeout(() => translateText(), 500);
});

// Обработчик изменения языков
document.querySelectorAll('input[name="fromLang"], input[name="toLang"]').forEach(radio => {
    radio.addEventListener('change', () => {
        if (document.getElementById('sourceText').value.trim()) {
            translateText();
        }
    });
});

// Обновляем информацию о использовании при запуске приложения
updateUsageInfo();

// Устанавливаем версию приложения в HTML
(async () => {
    const appVersion = window.api.getAppVersion(); // Получаем версию
    document.getElementById('appVersion').textContent = appVersion; // Устанавливаем версию
})();

// Логика для попапа About
document.getElementById('aboutBtn').addEventListener('click', () => {
    document.getElementById('aboutPopup').classList.remove('hidden');
    document.getElementById('appVersion').textContent = packageJson.version; // Получаем версию из package.json
});

document.getElementById('closePopup').addEventListener('click', () => {
    document.getElementById('aboutPopup').classList.add('hidden');
});
