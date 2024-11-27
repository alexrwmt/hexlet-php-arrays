// Функция перевода
async function translateText() {
    const sourceText = document.getElementById('sourceText').value;
    const fromLang = document.getElementById('fromLang').value;
    const toLang = document.getElementById('toLang').value;
    
    try {
        const translatedText = await window.api.translate({
            text: sourceText,
            fromLang,
            toLang
        });
        document.getElementById('translatedText').value = translatedText;
    } catch (error) {
        document.getElementById('translatedText').value = `Error: ${error.message}`;
        console.error('Translation failed:', error);
    }
}

// Обработчик кнопки перевода
document.getElementById('translateBtn').addEventListener('click', translateText);

// Обработка текста из буфера обмена
window.api.onTranslateClipboard((text) => {
    document.getElementById('sourceText').value = text;
    translateText(); // Автоматически переводим вставленный текст
});

console.log('API object:', window.api); // Проверить, что API доступен
console.log('DOM elements:', {
    sourceText: document.getElementById('sourceText'),
    fromLang: document.getElementById('fromLang'),
    toLang: document.getElementById('toLang'),
    translateBtn: document.getElementById('translateBtn'),
    translatedText: document.getElementById('translatedText')
}); // Проверить, что все элементы найдены
